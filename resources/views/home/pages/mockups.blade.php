@extends("home.layout")

@section('page')
<section>
    <div class="container">
        @include('home.partials.heading')
        <div class="row">
            <div class="col-12 col-sm-6">
                @include('home.partials.card')
            </div>
        </div>
    </div>
</section>
@endsection