@extends("home.layout")

@section('content')
<div class="container"><div class="container"><div class="container"><div class="pagehead"><h1 id="i0vw">High Quality Free &amp; Premium Mockups Home</h1><div class="h4">Showcase Your Work With Professional Mockup</div></div></div></div><section class="page">
    <div class="container">
    <div class="row">
        @foreach($PageData['mockups'] as $mockup )
        <div class="col-12 col-sm-6 mb-5">
            @include('home.partials.card')
        </div>
        @endforeach
    </div>
    @include('home.partials.pagination')
</div>
</section></div>
@endsection