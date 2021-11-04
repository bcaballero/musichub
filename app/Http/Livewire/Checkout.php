<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Session;
use Illuminate\Http\Request;

class Checkout extends Component
{
    public $name = '';
    public $email = '';
    public $phone = '';
    public $register = 0;
    public $totalAmount = 0.00;
    public $currentsession;

    protected $rules = [
        'name' => 'required|max:40|min:3',
        'email' => 'required|email:rfc,dns',
        'phone' => 'required|digits:11'
    ];

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
