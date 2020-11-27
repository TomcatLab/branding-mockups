<section class="page">
    <div class="container">
        @include('home.blocks.pagehead')
        <div class="row">
            @foreach($PageData['mockups'] as $mockup )
            <div class="col-12 col-sm-6 mb-5">
                @include('home.partials.card')
            </div>
            @endforeach
        </div>
        @include('home.partials.pagination')
    </div>
</section>