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