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