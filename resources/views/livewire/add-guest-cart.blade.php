<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-body pt-4 p-3">

                <form wire:submit.prevent="save" action="#" method="POST" role="form text-left" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="d-flex flex-column h-100">
                            <h5 class="font-weight-bolder">{{ $music->title }}</h5>
                            <p class="mb-1 pb-2 text-bold">by {{ $music->singer }}</p>
                            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer iaculis dolor tristique, pharetra tellus at, ullamcorper libero. Etiam justo sapien, pulvinar eget mauris in, laoreet dapibus diam. Aenean fermentum dapibus justo a lobortis. Fusce condimentum lorem neque, non tempor neque laoreet in. Pellentesque odio lectus, laoreet et erat eu, consectetur fringilla risus. Morbi sit amet eros a augue ultrices aliquam ut sit amet augue. Donec gravida odio ac tristique faucibus. Aliquam lacus nisl, ullamcorper et pellentesque sit amet, varius at dui. Nam nec lobortis nisi.</p>
                            
                        </div>
                        </div>
                        <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                        <div class="bg-gradient-primary border-radius-lg">
                            <div class="position-relative d-flex align-items-center justify-content-center h-100">
                            <img class="w-60 position-relative z-index-2 pt-4 pb-4" src="/assets/img/music/music004.png">
                            </div>
                        </div>
                        </div>
                    </div>
                    
                    
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('browse-music') }}" class="btn bg-gradient-primary btn-sm mt-4 mb-4" type="button">Continue Browsing</a>&nbsp;
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ __('Add to cart') }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
