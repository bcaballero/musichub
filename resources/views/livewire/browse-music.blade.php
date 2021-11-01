<main>  
    <div class="container-fluid py-4">
        <div class="row mt-4">
        @foreach ($musics as $music)
            <div class="col-lg-6 mb-lg-0 mb-4 pb-4">
                <div class="card">
                    <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="d-flex flex-column h-100">
                            <p class="mb-1 pt-2 text-bold">{{ $music->singer }}</p>
                            <h5 class="font-weight-bolder">{{ $music->title }}</h5>
                            <!-- <p class="mb-5">From colors, cards, typography to complex elements, you will find the full documentation.</p>-->
                            <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                            Add to Cart
                            <i class="fas fa-plus text-sm ms-1" aria-hidden="true"></i>
                            </a>
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
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
  </main>

  