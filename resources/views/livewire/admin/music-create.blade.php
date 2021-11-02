<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Upload New Music') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">

                <form wire:submit.prevent="save" action="#" method="POST" role="form text-left" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="music-title" class="form-control-label">{{ __('Title') }}</label>
                                <div class="@error('title')border border-danger rounded-3 @enderror">
                                    <input wire:model="title" class="form-control" type="text" placeholder="Title"
                                        id="music-title">
                                </div>
                                @error('title') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="music-singer" class="form-control-label">{{ __('Singer') }}</label>
                                <div class="@error('singer')border border-danger rounded-3 @enderror">
                                    <input wire:model="singer" class="form-control" type="text"
                                        placeholder="Singer" id="music-singer">
                                </div>
                                @error('singer') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="music-file">{{ __('Mp3') }}</label>
                                <div class="@error('file')border border-danger rounded-3 @enderror">
                                    <input type="file" wire:model="file">
                                </div>
                                @error('file') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="music-amount">{{ __('Amount') }}</label>
                                <div class="@error('amount')border border-danger rounded-3 @enderror">
                                    <input wire:model="amount" class="form-control" type="decimal" value="0.00" id="music-price">
                                </div>
                                @error('amount') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <div class="form-check">
                                    <div>
                                        <input wire:model="public" class="form-check-input" type="checkbox" id="music-public" />
                                        <label for="music-public">{{ __('Public') }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="d-flex justify-content-end">
                    <a href="{{ route('music-management') }}" class="btn bg-gradient-primary btn-sm mt-4 mb-4" type="button">Cancel</a>&nbsp;
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Upload' }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
