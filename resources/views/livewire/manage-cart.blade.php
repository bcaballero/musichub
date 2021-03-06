<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                @if ($showSuccesRemove)
                    <div wire:model="showSuccesRemove"
                        class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                        <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                        <span
                            class="alert-text text-white">{{ $removedMusic }} {{ __(' was deleted') }}</span>
                        <button wire:click="$set('showSuccesRemove', false); return;" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endif
                <div class="clear">&nbsp;</div>
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Cart</h5>
                        </div>
                        <a href="{{ route('browse-music') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button">Continue Browsing</a>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-left text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Music
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Amount
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @if ($cart->count() > 0)
                            @foreach ($cart as $music)
                                <tr>
                                    <td class="text-left">
                                        <p class="text-xs font-weight-bold mb-0">"{{ $music->title }}" by {{ $music->singer }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">$ {{ number_format($music->amount,2) }}</p>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('remove-from-cart') }}?id={{$music->id}}" class="mx-3" data-bs-toggle="tooltip"
                                            data-bs-original-title="Remove from Cart">
                                            <i class="fas fa-trash text-secondary"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                                <tr>
                                    <td class="text-center">
                                        TOTAL AMOUNT
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">$ {{ number_format($totalAmount,2) }}</p>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('checkout') }}" class="btn bg-gradient-primary btn-sm mb-0" type="button">$ Checkout</a>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td class="text-center">&nbsp;</td>
                                    <td class="text-center">Your cart is empty.</td>
                                    <td class="text-center">&nbsp;</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
