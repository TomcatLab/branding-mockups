<div class="mockup card">
  <div class="card-body pr-0 pl-0">
    <div class="image-wrapper row no-gutters mb-3">
      <div class="col-12">
        <a href="{{URL::to('home/mockup', $mockup->id)}}">
          <img src="{{URL::to('users/assets/images/rectangle.jpg')}}" class="card-img-top" alt="...">
        </a>
      </div>
      <div class="product-description">
        <h5>High Quality Pemium wine mockups</h5>
        <hr>
        <h6>26 Scence</h6>
      </div>
    </div>
    <div class="row no-gutters">
        <div class="col-10">
            <h5 class="card-title">{{ $mockup->name }}</h5>
            <p class="card-text">in Packaging</p>
        </div>
        <div class="col-2">
            <h4 href="#" class="text-success float-right">${{ $mockup->price }}</h4>
        </div>
    </div>
  </div>
</div>