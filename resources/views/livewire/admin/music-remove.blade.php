<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Delete Music') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">

                <form wire:submit.prevent="save" action="#" method="POST" role="form text-left" enctype="multipart/form-data">
                    
                    
                    <div class="form-group">
                        <label>{{ __('This will delete "' . $music->title . '" by ' . $music->singer . '.') }}</label>
                        <label>{{ __('Change will be permanent.')}}</label>
                    </div>
                        
                    
                    <div class="d-flex justify-content-end">
                    <a href="{{ route('music-management') }}" class="btn bg-gradient-primary btn-sm mt-4 mb-4" type="button">Cancel</a>&nbsp;
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ __('Delete') }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
