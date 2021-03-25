<div class="pagehead inner row">
    <div class="col-12 col-md-8">
        <h1>{{ $PageData['mockup']->name }}</h1>
        <p class="h5">{{ $PageData['mockup']->description }}</p>
    </div>
    <div class="col-12 col-sm-4 add-to-cart">
        <div class="w-100 d-flex">
            <button type="button" class="btn btn-success" onClick="AddToCart({{ $PageData['mockup']->id }})"> <i data-feather="shopping-cart" width="18"  height="18"></i> Add to Cart | ${{ $PageData['mockup']->price }}</button>
        </div>
    </div>
</div>