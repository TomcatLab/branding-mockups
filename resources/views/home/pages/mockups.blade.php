@extends("home.layout")

@section('content')
<section class="page">
    <div class="container">
        @include('home.partials.pagehead')
        <div class="row">
            <div class="col-12 col-sm-6 mb-5">
                @include('home.partials.card')
            </div>
        </div>
        @include('home.partials.pagination')
    </div>
</section>
@endsection