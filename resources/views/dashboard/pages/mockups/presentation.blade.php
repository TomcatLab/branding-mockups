@extends('master')

@section('page')
@include('dashboard.partials.alerts')
<div class="row">
    <div class="col-lg-6">
        <div class="row">
            @foreach($Presentation['Structure']['Images'] as $Image)
            <div class="col-12  grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $Image['Name'] }}</h4>
                        @foreach($Image['Cols'] as $Col)
                        <div class="row border-top">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ $Col['Title'] }}</label>
                                    {{ Form::open(array('url' => route('admin.products.mockups.presentation-save'), "method" => "post",'files' => 'true')) }}
                                        <input type="hidden" name="row" value="{{ $Image['Id'] }}">
                                        <input type="hidden" name="col" value="{{ $Col['ImgColId'] }}">
                                        <input type="hidden" name="mockup_id" value="{{ $Presentation['MockupId'] }}">
                                        @if($Presentation['Images']['img_'.$Image['Id'].'_'.$Col['ImgColId']])
                                            <input type="file" name="Image" class="myDropify" class="border" accept="images/*" data-default-file="{{URL::to('users/assets/images/products/'. $Presentation['MockupId'].'/'. $Presentation['Images']['img_'.$Image['Id'].'_'.$Col['ImgColId']] )}}"/>
                                        @else
                                           <input type="file" name="Image" class="myDropify" class="border" accept="images/*"/>
                                        @endif
                                    {{ Form::close() }}
                                    <!-- 
                                    
                                    <input type="file" name="img[]" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                        </span>
                                    </div>
                                    -->
                                </div>
                            </div>
                            @if($Col['Hover'])
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Hover Image</label>
                                    {{ Form::open(array('url' => route('admin.products.mockups.presentation-save'), "method" => "post",'files' => 'true')) }}
                                        <input type="hidden" name="row" value="{{ $Image['Id'] }}">
                                        <input type="hidden" name="col" value="{{ $Col['ImgColId'] }}">
                                        <input type="hidden" name="hov" value="1">
                                        <input type="hidden" name="mockup_id" value="{{ $Presentation['MockupId'] }}">
                                        @if($Presentation['Images']['img_h_'.$Image['Id'].'_'.$Col['ImgColId']])
                                            <input type="file"  name="Image" class="myDropify" class="border" accept="images/*"  data-default-file="{{URL::to('users/assets/images/products/'. $Presentation['MockupId'].'/'. $Presentation['Images']['img_h_'.$Image['Id'].'_'.$Col['ImgColId']] )}}"/>
                                        @else
                                           <input type="file" name="Image" class="myDropify" class="border" accept="images/*"/>
                                        @endif

                                    {{ Form::close() }}
                                </div>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
            @foreach($Presentation['Structure']['Slider'] as $Image)
            <div class="col-12  grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $Image['Name'] }}</h4>
                        @foreach($Image['Cols'] as $Col)
                        <div class="row border-top">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ $Col['Title'] }}</label>
                                    {{ Form::open(array('url' => route('admin.products.mockups.presentation-save'), "method" => "post",'files' => 'true')) }}
                                        <input type="hidden" name="row" value="{{ $Image['Id'] }}">
                                        <input type="hidden" name="col" value="{{ $Col['ImgColId'] }}">
                                        <input type="hidden" name="mockup_id" value="{{ $Presentation['MockupId'] }}">
                                        @if($Presentation['Images']['img_'.$Image['Id'].'_'.$Col['ImgColId']])
                                            <input type="file" name="Image" class="myDropify" class="border" accept="images/*" data-default-file="{{URL::to('users/assets/images/products/'. $Presentation['MockupId'].'/'. $Presentation['Images']['img_'.$Image['Id'].'_'.$Col['ImgColId']] )}}"/>
                                        @else
                                           <input type="file" name="Image" class="myDropify" class="border" accept="images/*"/>
                                        @endif
                                    {{ Form::close() }}
                                    <!-- 
                                    
                                    <input type="file" name="img[]" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                        </span>
                                    </div>
                                    -->
                                </div>
                            </div>
                            @if($Col['Hover'])
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Hover Image</label>
                                    {{ Form::open(array('url' => route('admin.products.mockups.presentation-save'), "method" => "post",'files' => 'true')) }}
                                        <input type="hidden" name="row" value="{{ $Image['Id'] }}">
                                        <input type="hidden" name="col" value="{{ $Col['ImgColId'] }}">
                                        <input type="hidden" name="hov" value="1">
                                        <input type="hidden" name="mockup_id" value="{{ $Presentation['MockupId'] }}">
                                        @if($Presentation['Images']['img_h_'.$Image['Id'].'_'.$Col['ImgColId']])
                                            <input type="file"  name="Image" class="myDropify" class="border" accept="images/*"  data-default-file="{{URL::to('users/assets/images/products/'. $Presentation['MockupId'].'/'. $Presentation['Images']['img_h_'.$Image['Id'].'_'.$Col['ImgColId']] )}}"/>
                                        @else
                                           <input type="file" name="Image" class="myDropify" class="border" accept="images/*"/>
                                        @endif

                                    {{ Form::close() }}
                                </div>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection