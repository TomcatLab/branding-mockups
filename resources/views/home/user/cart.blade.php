@extends("home.layout")

@section('content')
<div class="container">
    <div class="row">
        @if(!$Produts->isEmpty())
            <div class="col-12 col-md-8">
            @foreach($Produts as $Produt)
                <div class="card mt-3 mb-3" id="{{ $Produt->id }}">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="..." alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $Produt->name }}</h5>
                                <p class="card-text">{{ $Produt->description }}</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                <div class="row">
                                    <div class="col-6">
                                        <button type="button" onClick="RemoveFromCart({{ $Produt->id }})" class="btn btn-danger">Remove</button>
                                    </div>
                                    <div class="col-6">
                                    <h5 class="card-title">{{ $Config['CURRENCY']}}{{ $Produt->price }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        @else
        <div class="col-12 col-md-12">
            <div class="row">
                <div class="col-4 offset-4">
                    <div class="mt-3 mb-3 text-center"><img src="{{URL::to('users/assets/images/emptycart.png')}}" class="card-img-top"></div>
                </div>
            </div>
        </div>
        @endif
        @if($BillingInformaion['Price'] !== 0)
        <div class="col-12 col-md-4">
            <div class="card text-dark mt-3 mb-3">
                <div class="card-header">Billing Information</div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Price (Qty - {{ $BillingInformaion['Quantity'] }} )</td>
                                <td>{{ $Config['CURRENCY'] }} {{ $BillingInformaion['Price'] }}</td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td>{{ $Config['CURRENCY'] }} {{ $BillingInformaion['Tax'] }}</td>
                            </tr>
                            <tr>
                                <td>Discount</td>
                                <td>{{ $Config['CURRENCY'] }} {{ $BillingInformaion['Discount'] }}</td>
                            </tr>
                            <tr>
                                <td>Additional Charges</td>
                                <td>{{ $Config['CURRENCY'] }} {{ $BillingInformaion['ExtraCharge'] }}</td>
                            </tr>
                        </tbody>
                        <tfooter>
                            <tr>
                                <th scope="col">Total</th>
                                <th scope="col">{{ $Config['CURRENCY'] }} {{ $BillingInformaion['GrandTotal'] }}</th>
                            </tr>
                        </tfooter>
                    </table>
                    <div class="row">
                        <div class="col-6">
                            <a type="button" class="btn btn-danger btn-block" href="{{ route('user.cart.clear.items') }}">Clear Cart</a>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-primary btn-block">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection