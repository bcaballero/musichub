<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('New User') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">

                <form wire:submit.prevent="save" action="#" method="POST" role="form text-left">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">{{ __('Full Name') }}</label>
                                <div class="@error('name')border border-danger rounded-3 @enderror">
                                    <input wire:model="name" class="form-control" type="text" placeholder="Name"
                                        id="user-name">
                                </div>
                                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-email" class="form-control-label">{{ __('Email') }}</label>
                                <div class="@error('email')border border-danger rounded-3 @enderror">
                                    <input wire:model="email" class="form-control" type="email"
                                        placeholder="@example.com" id="user-email">
                                </div>
                                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-phone" class="form-control-label">{{ __('Phone') }}</label>
                                <div class="@error('phone')border border-danger rounded-3 @enderror">
                                    <input wire:model="phone" class="form-control" type="tel"
                                        placeholder="40770888444" id="user-phone">
                                </div>
                                @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-location" class="form-control-label">{{ __('Location') }}</label>
                                <div class="@error('location') border border-danger rounded-3 @enderror">
                                    <input wire:model="location" class="form-control" type="text"
                                        placeholder="Location" id="user-location">
                                </div>
                                @error('location') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user-about">{{ __('About Me') }}</label>
                        <div class="@error('about')border border-danger rounded-3 @enderror">
                            <textarea wire:model="about" class="form-control" id="user-about" rows="3"
                                placeholder="Say something about yourself"></textarea>
                        </div>
                        @error('about') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <div class="@error('isadmin')border border-danger rounded-3 @enderror">
                            <div class="form-check">
                            <input wire:model="isadmin" class="form-check-input" type="checkbox" value="" id="user-isadmin" />
                            <label for="user-isadmin">{{ __('Admin Account') }}</label>
                            </div>
                        </div>
                        @error('isadmin') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
