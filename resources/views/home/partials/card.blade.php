<div class="mockup card">
  <div class="card-body">
    <div class="image-holder row no-gutters d-flex align-items-center">
      <img src="{{URL::to('users/assets/images/rectangle.jpg')}}" class="card-img-top" alt="...">
      <div class="col-8 offset-2 product-information">
        <a class="" href="{{URL::to('home/mockup', $mockup->id)}}">
          <h5>High Quality Pemium wine mockups</h5>
          <hr>
          <h6>26 Scence</h6>
        </a>
      </div>
      <div class="product-add-cart">
        <div class="d-flex align-items-center">
          <div class="button-holder">
            <button type="button" class="btn btn-warning"><i data-feather="shopping-cart" width="18"  height="18"></i> Add to cart</button>
          </div>
        </div>
      </div>
    </div>
    <a class="row no-gutters product-description" href="{{URL::to('home/mockup', $mockup->id)}}">
      <div class="col-10">
          <h5 class="card-title">{{ $mockup->name }}</h5>
          <p class="card-text">in Packaging</p>
      </div>
      <div class="col-2">
          <h4 class="text-success float-right">${{ $mockup->price }}</h4>
      </div>
    </a>
  </div>
  </a>
</div>