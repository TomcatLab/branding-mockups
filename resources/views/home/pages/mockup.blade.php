@extends("home.layout")

@section('content')
<div class="pagehead"><h1>High Quality Free & Premium Mockups</h1><div class="h4">Showcase Your Work With Professional Mockup</div></div><section class="page">
    <div class="container mockup">
    @include('home.partials.pageheadleft')
    <div class="row text-center">
        <div class="col-12 text-left">
            <p class="text-center mb-0 pb-0">16 Scenes</p>
            <p class="text-center mb-0 pb-0">Hover to see the changes</p>
        </div>
    </div>
    @foreach($PageData['structure']['Images'] as $Row)
        @if(count($Row['Cols']) == 1)
            @foreach($Row['Cols'] as $Col)
            <div class="row mb-5 mt-2">
                <div class="col-12 mockup-image">
                    @if($PageData['presentation']['img_'.$Row['Id'].'_'.$Col['ImgColId']])
                    <img src="{{URL::to('users/assets/images/products/'.$PageData['presentation']['mockup_id'].'/'.$PageData['presentation']['img_'.$Row['Id'].'_'.$Col['ImgColId']])}}" class="card-img-top" >
                    @endif
                    <div class="overlap">
                        @if($PageData['presentation']['img_h_'.$Row['Id'].'_'.$Col['ImgColId']])
                        <img src="{{URL::to('users/assets/images/products/'.$PageData['presentation']['mockup_id'].'/'.$PageData['presentation']['img_h_'.$Row['Id'].'_'.$Col['ImgColId']])}}" class="card-img-top" >
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        @elseif(count($Row['Cols']) == 2)
            <div class="row mb-5 mt-5">
                @foreach($Row['Cols'] as $Col)
                <div class="col-6 mockup-image">
                    @if($PageData['presentation']['img_'.$Row['Id'].'_'.$Col['ImgColId']])
                    <img src="{{URL::to('users/assets/images/products/'.$PageData['presentation']['mockup_id'].'/'.$PageData['presentation']['img_'.$Row['Id'].'_'.$Col['ImgColId']])}}" class="card-img-top" >
                    @endif
                    <div class="overlap">
                        @if($PageData['presentation']['img_h_'.$Row['Id'].'_'.$Col['ImgColId']])
                        <img src="{{URL::to('users/assets/images/products/'.$PageData['presentation']['mockup_id'].'/'.$PageData['presentation']['img_h_'.$Row['Id'].'_'.$Col['ImgColId']])}}" class="card-img-top" >
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    @endforeach
    @foreach($PageData['structure']['Slider'] as $Row)
        <div class="row mb-5 mt-5">
            <div class="col-12">
                <div id="slider" class="beer-slider w-100">
                    @foreach($Row['Cols'] as $Col)
                        @if($PageData['presentation']['img_'.$Row['Id'].'_'.$Col['ImgColId']])
                            <img src="{{URL::to('users/assets/images/products/'.$PageData['presentation']['mockup_id'].'/'.$PageData['presentation']['img_'.$Row['Id'].'_'.$Col['ImgColId']])}}" class="card-img-top" >
                        @endif
                        <div class="beer-reveal">
                            @if($PageData['presentation']['img_h_'.$Row['Id'].'_'.$Col['ImgColId']])
                                <img src="{{URL::to('users/assets/images/products/'.$PageData['presentation']['mockup_id'].'/'.$PageData['presentation']['img_h_'.$Row['Id'].'_'.$Col['ImgColId']])}}" class="card-img-top" >
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
    <div class="row thumbs no-gutters mb-5">
        <div class="col-3">
            <img src="{{URL::to('users/assets/images/products/1/thumbs/Rectangle-52.png')}}" class="card-img-top" >
        </div>
        <div class="col-3">
            <img src="{{URL::to('users/assets/images/products/1/thumbs/Rectangle-53.png')}}" class="card-img-top" >
        </div>
        <div class="col-3">
            <img src="{{URL::to('users/assets/images/products/1/thumbs/Rectangle-54.png')}}" class="card-img-top" >
        </div>
        <div class="col-3">
            <img src="{{URL::to('users/assets/images/products/1/thumbs/Rectangle-64.png')}}" class="card-img-top" >
        </div>
        <div class="col-3">
            <img src="{{URL::to('users/assets/images/products/1/thumbs/Rectangle-56.png')}}" class="card-img-top" >
        </div>
        <div class="col-3">
            <img src="{{URL::to('users/assets/images/products/1/thumbs/Rectangle-57.png')}}" class="card-img-top" >
        </div>
        <div class="col-3">
            <img src="{{URL::to('users/assets/images/products/1/thumbs/Rectangle-58.png')}}" class="card-img-top" >
        </div>
        <div class="col-3">
            <img src="{{URL::to('users/assets/images/products/1/thumbs/Rectangle-59.png')}}" class="card-img-top" >
        </div>
        <div class="col-3">
            <img src="{{URL::to('users/assets/images/products/1/thumbs/Rectangle-60.png')}}" class="card-img-top" >
        </div>
        <div class="col-3">
            <img src="{{URL::to('users/assets/images/products/1/thumbs/Rectangle-61.png')}}" class="card-img-top" >
        </div>
        <div class="col-3">
            <img src="{{URL::to('users/assets/images/products/1/thumbs/Rectangle-62.png')}}" class="card-img-top" >
        </div>
        <div class="col-3">
            <img src="{{URL::to('users/assets/images/products/1/thumbs/Rectangle-63.png')}}" class="card-img-top" >
        </div>
    </div>
</div>

</section>
@endsection