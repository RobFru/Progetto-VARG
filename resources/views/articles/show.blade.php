<x-layout>
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-3">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="https://picsum.photos/400" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="https://picsum.photos/400" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="https://picsum.photos/400" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
                  <div class="fs-2 text-center mt-3">${{ $article->price }}</div>
            </div>
            <div class="col-12 col-md-4 text-center">
                <h1>{{ $article->title }}</h1>
                <p class="fs-3 text-center mt-3">{{ $article->description }}</p>
            </div>
            <div class="col-12 col-md-3 vh-100 text-center">
              <div class="fs-3">placeholder per buy menu</div>
            </div>
        </div>
    </div>
</x-layout>