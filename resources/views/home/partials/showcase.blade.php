<div class="mockup card">
  <div class="card-body">
    <div class="image-holder row no-gutters d-flex align-items-center">
        @if( $showcase->full_url)
            <img src="{{URL::to( $showcase->full_url )}}" class="card-img-top" alt="...">
        @else
            <img src="{{URL::to('users/assets/images/rectangle.jpg')}}" class="card-img-top" alt="...">
        @endif
      <div class="col-8 offset-2 product-information">
        <a class="" href="{{URL::to('home/mockup', $showcase->id)}}">
          <h5>High Quality Pemium wine mockups</h5>
          <hr>
          <h6>26 Scence</h6>
        </a>
      </div>
    </div>
    <a class="row no-gutters product-description" href="{{URL::to('home/mockup', $showcase->id)}}">
      <div class="col-12">
          <h5 class="card-title">{{ $showcase->label }}</h5>
          <p class="card-text">in Packaging</p>
      </div>
    </a>
  </div>
  </a>
</div>