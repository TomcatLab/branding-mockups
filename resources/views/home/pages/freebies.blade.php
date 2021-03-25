@extends("home.layout")

@section('content')
<div class="pagehead"><h1>High Quality Free & Premium Mockups</h1><div class="h4">Showcase Your Work With Professional Mockup</div></div><div class="container"><section class="page">
    <div class="container">
    <div class="row">
        @foreach($PageData['freebies'] as $mockup )
        <div class="col-12 col-sm-6 mb-5">
            @include('home.partials.card')
        </div>
        @endforeach
    </div>
    @include('home.partials.pagination')
</div>
</section></div>
@endsection