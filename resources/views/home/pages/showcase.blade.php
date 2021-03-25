@extends("home.layout")

@section('content')
<div class="container"><div class="pagehead"><h1>High Quality Free & Premium Mockups</h1><div class="h4">Showcase Your Work With Professional Mockup</div></div><div class="container"><section class="page">
    <div class="container">
    <div class="row">
        @foreach($PageData['showcase'] as $showcase )
        <div class="col-12 col-sm-6 mb-5">
            @include('home.partials.showcase')
        </div>
        @endforeach
    </div>
    @include('home.partials.pagination')
</div>
</section></div></div>
@endsection