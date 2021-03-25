@extends("home.layout")

@section('content')
<div class="container">
    <div class="row">
        @if(!$Produts->isEmpty())
            <div class="col-12 col-md-8">
            @foreach($Produts as $Produt)
                <div class="card mt-3 mb-3" id="{{ $Produt->product_id }}">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img class="card-img-top" src="{{URL::to($Produt->full_url)}}" alt="">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $Produt->name }}</h5>
                                <p class="card-text">{{ $Produt->description }}</p>
                                <p class="card-text"><small class="text-muted">{{  $Produt->category_name }}</small></p>
                                <div class="row">
                                    <div class="col-6">
                                        <button type="button" onClick="RemoveFromCart({{ $Produt->product_id }})" class="btn btn-danger">Remove</button>
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
                        <div class="col-12">
                            <div class="card mt-3 mb-3 selectPayment" id="option-paypal" data-payment="paypal">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{URL::to('users/assets/images/paypal.png')}}" class="img-fluid my-2 mx-2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Paypal</h5>
                                            <p class="card-text">Paypal amount</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card mt-3 mb-3 selectPayment" id="option-card" data-payment="card">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{URL::to('users/assets/images/cards-brank.png')}}" class="img-fluid my-2 mx-2">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Card/Bank</h5>
                                            <p class="card-text">Paypal amount</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <a type="button" class="btn btn-danger btn-block" href="{{ route('user.cart.clear.items') }}">Clear Cart</a>
                        </div>
                        <div class="col-6">
                        @if (Route::has('login'))
                            @auth
                            <button type="button" class="btn btn-primary btn-block btn-payment" disabled>Checkout</button>
                            <form class="btn-payment d-none" method="POST" id="paypal" action="{!! URL::to('paypal') !!}">
                                {{ csrf_field() }}
                                <input type="hidden" name="amount" value="{{ $BillingInformaion['GrandTotal'] }}">
                                <input type="submit" class="btn btn-primary btn-block" value="Checkout">
                            </form>
                            <form action="{{ route('payment') }}" class="btn-payment" method="POST" id="card" >
                                @csrf
                                <script src="https://checkout.razorpay.com/v1/checkout.js"
                                        data-key="{{ env('RAZOR_KEY') }}"
                                        data-amount="{{ $BillingInformaion['GrandTotal'] * 100 }}"
                                        data-buttontext="Checkout"
                                        data-name="Pay with Rozerpay"
                                        data-description="Visa, Mastercard, Bank"
                                        data-image="{{URL::to('users/assets/images/logo.svg')}}"
                                        data-prefill.name="{{ $Resources['UserInfo']['name'] }}"
                                        data-prefill.email="{{ $Resources['UserInfo']['email'] }}">
                                </script>
                            </form>
                            @else
                            <a class="btn btn-primary btn-block" href="{{ route('login') }}">Login</a>
                            @endif
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
<style>
    .selectPayment.active{
        border:1px solid #007bff;
        background-color:#f0f8ff;
    }
</style>
@endsection