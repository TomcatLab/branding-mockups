@extends("home.layout")

@section('content')
<div class="container">
    <div class="row">
        @foreach($Produts as $Produt)
        <div class="col-12 col-md-8">
            <div class="card mt-3 mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="..." alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $Produt->name }}</h5>
                            <p class="card-text">{{ $Produt->description }}</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            <p class="card-text"><button type="button" onClick="RemoveFromCart({{ $Produt->id }})" class="btn btn-danger">Remove</button></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-12 col-md-4">
            <div class="card text-dark mt-3 mb-3">
                <div class="card-header">Billing Information</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Price {{ $BillingInformaion['Quantity'] }} {{ $BillingInformaion['Price'] }}</li>
                        <li class="list-group-item">Tax</li>
                        <li class="list-group-item">Discount</li>
                        <li class="list-group-item">Additional Charges</li>
                        <li class="list-group-item"><h5>Total</h5></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection