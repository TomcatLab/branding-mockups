@extends('master')

@section('page')
@if(count($page['header']))
  @include('dashboard.partials.pageHeader')
@endif
@include('dashboard.partials.alerts')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Basic Example</h6>
        <div class="owl-carousel owl-theme owl-basic">
          <div class="item">
            <img src="{{URL::to('users/assets/images/products/1/Rectangle-43.png')}}" class="card-img-top" alt="...">
          </div>
          <div class="item">
            <img src="{{URL::to('users/assets/images/products/1/Rectangle-43.png')}}" class="card-img-top" alt="...">
          </div>
          <div class="item">
            <img src="{{URL::to('users/assets/images/products/1/Rectangle-43.png')}}" class="card-img-top" alt="...">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="newSlideModal" tabindex="-1" role="dialog" aria-labelledby="newSlideModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {{ Form::open(array('url' => route('admin.cms.page-group'))) }}
      <div class="modal-header">
        <h5 class="modal-title" id="newPageModalLabel">New Slide</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="SlideName" class="col-form-label">Slide Name:</label>
            <input type="text" class="form-control" id="SlideName" name="SlideName">
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