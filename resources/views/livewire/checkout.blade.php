<div>
    <div class="container-fluid py-4">
        
<div>
    <div class="row">
        <div class="col-md-6 mt-4">
            <div class="card h-100 mb-4">
                <div class="card-header pb-0 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0">Your Music downloads</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    
                    <ul class="list-group">
                        @foreach($cart as $music)
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-icon-only btn-rounded btn-outline-info mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-music" aria-hidden="true"></i></button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">{{ $music->title }}</h6>
                                    <span class="text-xs">{{ $music->singer }}</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-info text-gradient text-sm font-weight-bold">
                                $ {{ number_format($music->amount,2) }}
                            </div>
                        </li>
                        @endforeach
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 pt-4 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">$</button>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Total Amount</h6>
                                </div>
                            </div>
                            <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                $ {{ number_format($totalAmount,2) }}
                            </div>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-4">
            <div class="card h-100 mb-4">
                <div class="card-header pb-0 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0">Transaction details</h6>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                            <i class="far fa-calendar-alt me-2" aria-hidden="true"></i>
                            <small>{{ Carbon\Carbon::now()->format('Y-m-d')}}</small>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <form wire:submit.prevent="save" action="#" method="POST" role="form text-left">
                        
                        <div class="form-group">
                            <label for="user-name" class="form-control-label">{{ __('Full Name') }}</label>
                            <div class="@error('name')border border-danger rounded-3 @enderror">
                                <input wire:model="name" class="form-control" type="text" placeholder="Name"
                                    id="user-name">
                            </div>
                            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="user-email" class="form-control-label">{{ __('Email') }}</label>
                            <div class="@error('email')border border-danger rounded-3 @enderror">
                                <input wire:model="email" class="form-control" type="email"
                                    placeholder="@example.com" id="user-email">
                            </div>
                            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                
                        <div class="form-group">
                            <label for="user-phone" class="form-control-label">{{ __('Phone') }}</label>
                            <div class="@error('phone')border border-danger rounded-3 @enderror">
                                <input wire:model="phone" class="form-control" type="tel"
                                    placeholder="40770888444" id="user-phone">
                            </div>
                            @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ __('Proceed') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

           
    </div>
</div>