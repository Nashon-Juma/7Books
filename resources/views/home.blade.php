@extends('layouts.app')

@section('title', 'Home')

@section('main')
  <section id="hero" class="min-vh-100 d-flex flex-column">
    <x-svb-navigation-bar :menus=true active="home" :logo=true :login=true :avatar=true
      class="sticky-top"></x-svb-navigation-bar>

    <div class="flex-fill d-flex flex-column container">
      <div class="row flex-fill">
        <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
          <article class="d-flex flex-column align-items-center align-items-md-start">
            <h1 class="text-md-start text-lg-h1 text-md-h2 text-h3 fw-bold mb-4 text-center">Welcome back
              {{ auth()->user()->name }}!</h1>

            <p class="w-75 text-body-secondary text-md-start text-center">
              Here are some quick suggestions for new book
              series that you might want to check
            </p>
          </article>
        </div>

        <div class="col-md-6 d-none d-md-flex flex-column justify-content-center">
          <div class="h-75 d-flex flex-column justify-content-center">
            <div id="homeHeroSwiper" class="swiper h-75 w-50 my-auto">
              <div class="swiper-wrapper">
                <div class="swiper-slide bg-primary ratio-book-cover">Slide 1</div>
                <div class="swiper-slide bg-secondary ratio-book-cover">Slide 2</div>
                <div class="swiper-slide bg-primary ratio-book-cover">Slide 3</div>
                <div class="swiper-slide bg-secondary ratio-book-cover">Slide 4</div>
                <div class="swiper-slide bg-primary ratio-book-cover">Slide 5</div>
                <div class="swiper-slide bg-secondary ratio-book-cover">Slide 6</div>
                <div class="swiper-slide bg-primary ratio-book-cover">Slide 7</div>
                <div class="swiper-slide bg-secondary ratio-book-cover">Slide 8</div>
                <div class="swiper-slide bg-primary ratio-book-cover">Slide 9</div>
              </div>

              <div class="swiper-pagination text-white"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="trending" class="d-flex align-items-center justify-content-center py-5">
    <div class="container">
      <div class="d-flex flex-column gap-1 mb-3">
        <h3 class="text-h4 text-md-h3 fw-semibold">Recommended for you</h3>
        
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
          <span class="text-tertiary"> 
            Recommended for you based on your reading history 
          </span>

          <div class="d-md-flex align-items-center gap-1 d-none">
            <button type="button" class="btn btn-light" id="recomenddedPrev">
              <i class="fa-solid fa-chevron-left"></i>
              Previous
            </button>

            <button type="button" class="btn btn-light" id="recomenddedNext">
              Next
              <i class="fa-solid fa-chevron-right"></i>
            </button>
          </div>
        </div>
      </div>

      <div id="recommendedBookSlider" class="swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">
        
              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">
        
              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">
        
              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">
        
              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">
        
              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">
        
              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">
        
              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>
        </div>

        <div class="swiper-pagination" id="recommendedBookSliderPagination"></div>
      </div>
    </div>
  </section>

  <section id="trending" class="d-flex align-items-center justify-content-center py-5">
    <div class="container">
      <div class="d-flex flex-column gap-1 mb-3">
        <h3 class="text-h4 text-md-h3 fw-semibold">Trending Reads</h3>
        
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
          <span class="text-tertiary"> 
            Current trends in papers
          </span>

          <div class="d-md-flex align-items-center gap-1 d-none">
            <button type="button" class="btn btn-light" id="trendingPrev">
              <i class="fa-solid fa-chevron-left"></i>
              Previous
            </button>

            <button type="button" class="btn btn-light" id="trendingNext">
              Next
              <i class="fa-solid fa-chevron-right"></i>
            </button>
          </div>
        </div>
      </div>

      <div id="trendingBookSlider" class="swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">
        
              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">
        
              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">
        
              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">
        
              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">
        
              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">
        
              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">
        
              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>
        </div>

        <div class="swiper-pagination" id="trendingBookSliderPagination"></div>
      </div>
    </div>
  </section>

  <section id="new" class="d-flex align-items-center justify-content-center py-5">
    <div class="container">
      <div class="d-flex flex-column gap-1 mb-3">
        <h3 class="text-h4 text-md-h3 fw-semibold">New Releases</h3>
        
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
          <span class="text-tertiary"> 
            Newly released in libraries
          </span>

          <div class="d-md-flex align-items-center gap-1 d-none">
            <button type="button" class="btn btn-light" id="newestPrev">
              <i class="fa-solid fa-chevron-left"></i>
              Previous
            </button>

            <button type="button" class="btn btn-light" id="newestNext">
              Next
              <i class="fa-solid fa-chevron-right"></i>
            </button>
          </div>
        </div>
      </div>
      
      <div id="newestBookSlider" class="swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">
        
              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">
        
              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">
        
              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">
        
              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">
        
              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">
        
              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="card svb-card svb-transition-fast hover-darkened hover-grow active-shrink">
              <img src="{{ URL::asset('assets/imgs/book.jpg') }}" class="card-img-top" alt="Image not available">
        
              <div class="title svb-transition-fast">
                Harry potter
              </div>
            </div>
          </div>
        </div>

        <div class="swiper-pagination" id="newestBookSliderPagination"></div>
      </div>
    </div>
  </section>

  <section id="browseAction" class="py-5">
    <div class="container">
      <article class="d-flex flex-column align-items-center py-5">
        <h3 class="text-md-start mb-3 text-h3 fw-semibold text-center">Can't find anything you like?</h3>

        <span class="text-body-secondary mb-4 text-center">
          Check out our browse page instead by clicking the button below
        </span>

        <a href="{{ route('browse') }}" class="btn btn-primary">
          Go to browse
        </a>
      </article>
    </div>
  </section>

  <x-svb-footer></x-svb-footer>
@endsection
