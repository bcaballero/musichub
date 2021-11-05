<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Session;

use Omnipay\Omnipay;
use Omnipay\PayPal\RestGateway;
use App\Payment;

class Checkout extends Component
{
    public $name = '';
    public $email = '';
    public $phone = '';
    public $register = 0;
    public $totalAmount = 0.00;
    public $currentsession;

    // Paypal
    private $paypalgateway;
    private $paymentId;
    private $PayerID;

    protected $rules = [
        'name' => 'required|max:40|min:3',
        'email' => 'required|email:rfc,dns',
        'phone' => 'required|digits:11'
    ];

    public function pay()
    {
        $paypalgateway = Omnipay::create('PayPal_Rest');
        $paypalgateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $paypalgateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $paypalgateway->setTestMode(true); //set it to 'false' when go live

        try {
            $response = $paypalgateway->purchase(array(
                'amount' => $this->totalAmount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('paymentsuccess'),
                'cancelUrl' => url('paymenterror'),
            ))->send();
            
            // dd($response);

            if ($response->isRedirect()) {
                dd($response->redirect());
                return $response->redirect(); // this will automatically forward the customer
            } else {
                // not successful
                // return $response->getMessage();
                $this->addError('email', $response->getMessage());
            }
        } catch(Exception $e) {
            // return $e->getMessage();
            $this->addError('email', $response->getMessage());
        }
    }

    public function placeOrder()
    {
        $this->validate();

        $transaction = Transaction::create([
            'name'          => $this->name,
            'sessionid'     => $this->currentsession,
            'userid'        => auth()->user() ? auth()->user->id : 0,
            'email'         => $this->email,
            'phone'         => $this->phone,
            'registered'    => $this->register,
            'totalamount'   => $this->totalAmount
        ]);

        foreach ($this->cart as $item) {
            TransactionItem::create([
                'transactionid' => $transaction->id,
                'musicid' => $item->musicid
            ]);
        }

        Cart::where([
            'sessionid' => $this->currentsession,
            'userid' => auth()->user() ? auth()->user->id : 0
        ])->delete();
    }

    /*public function payment_success()
    {
        // Once the transaction has been approved, we need to complete it.
        if ($this->paymentId && $this->PayerID)
        {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'             => $this->PayerID,
                'transactionReference' => $this->paymentId,
            ));
            $response = $transaction->send();
          
            if ($response->isSuccessful())
            {
                // The customer has successfully paid.
                $arr_body = $response->getData();
          
                // Insert transaction data into the database
                $isPaymentExist = Payment::where('payment_id', $arr_body['id'])->first();
          
                if(!$isPaymentExist)
                {
                    $payment = new Payment;
                    $payment->payment_id = $arr_body['id'];
                    $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                    $payment->payer_email = $arr_body['payer']['payer_info']['email'];
                    $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                    $payment->currency = env('PAYPAL_CURRENCY');
                    $payment->payment_status = $arr_body['state'];
                    $payment->save();
                }
          
                return "Payment is successful. Your transaction id is: ". $arr_body['id'];
            } else {
                return $response->getMessage();
            }
        } else {
            return 'Transaction is declined';
        }
    } */

    public function render()
    {
        $this->currentsession = Session::getId();
        $this->cart = Cart::join('music', 'music.id', '=', 'carts.musicid')
                                ->where('carts.sessionid','=',$this->currentsession)
                                ->get(['carts.id','music.title','music.singer','music.amount']);
        $this->totalAmount = Cart::join('music', 'music.id', '=', 'carts.musicid')
                                ->where('carts.sessionid','=',$this->currentsession)
                                ->sum('music.amount');

        return view('livewire.checkout',[
            'transactionitems' => $this->cart
        ]);
    }
}
