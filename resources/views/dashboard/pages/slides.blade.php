@extends('master')

@section('page')
@if(count($page['header']))
  @include('dashboard.partials.pageHeader')
@endif
@include('dashboard.partials.alerts')
<div class="row">
  @foreach($Resources['Sliders'] as $Slider)
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title"> {{ $Slider->name }} </h6>
        <div class="row">
          <div class="col-12 col-md-10">
            <div class="owl-carousel owl-theme owl-basic">
            @foreach($Resources['SliderImages'][$Slider->id] as $SliderImage)
              <div class="item">
                <img src="{{URL::to($SliderImage->url)}}" class="card-img-top" alt="...">
              </div>
            @endforeach
            </div>
          </div>
          <div class="col-12 col-md-2">
            {{ Form::open(array('url' => route('admin.cms.slide-add-image'), "method" => "post",'files' => 'true')) }}
            <input type="hidden" name="SliderId" value="{{ $Slider->id }}">
            <div class="form-group">
              <input type="file" name="SliderImage" class="file-upload-default">
              <div class="input-group col-xs-12">
                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                <span class="input-group-append"> 
                  <button class="file-upload-browse btn btn-primary block" type="button">Upload</button>
                </span>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>

<div class="modal fade" id="newSlideModal" tabindex="-1" role="dialog" aria-labelledby="newSlideModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {{ Form::open(array('url' => route('admin.cms.slide-list'))) }}
      <div class="modal-header">
        <h5 class="modal-title" id="newPageModalLabel">New Slide</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="SliderName" class="col-form-label">Slide Name:</label>
            <input type="text" class="form-control" id="SliderName" name="SliderName">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      {{ Form::close() }}
    </div>
  </div>
</div>

@endsection