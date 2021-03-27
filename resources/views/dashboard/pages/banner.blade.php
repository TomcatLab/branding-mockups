@extends('master')

@section('page')
@if(count($page['header']))
  @include('dashboard.partials.pageHeader')
@endif
@include('dashboard.partials.alerts')
<div class="row">
  @foreach($Resources['Banners'] as $Banner)
  <div class="col-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">{{ $Banner->name }}</h6>
        <div class="row">
          <div class="col-12">
            <div class="profile-header">
              <div class="cover">
                @if(isset($Resources['BannerImages'][$Banner->id]))
                <figure>
                  <img src="{{ URL::to($Resources['BannerImages'][$Banner->id]->url) }}" class="img-fluid" alt="profile cover">
                </figure>
                @endif
              </div>
            </div>
          </div>
          <div class="col-12">
            {{ Form::open(array('url' => route('admin.cms.banner-add-image'), "method" => "post",'files' => 'true')) }}
            <input type="hidden" name="BannerId" value="{{ $Banner->id }}">
            <div class="row">
              <div class="col-8">
                <div class="form-group">
                  <input type="file" name="BannerImage" class="file-upload-default">
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                    <span class="input-group-append"> 
                      <button class="file-upload-browse btn btn-primary block" type="button">Upload</button>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
              </div>
            </div>
            {{ Form::close() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>

<div class="modal fade" id="newBannerModal" tabindex="-1" role="dialog" aria-labelledby="newBannerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {{ Form::open(array('url' => route('admin.cms.banner-list'))) }}
      <div class="modal-header">
        <h5 class="modal-title" id="newPageModalLabel">New Banner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="BannerName" class="col-form-label">Banner Name:</label>
            <input type="text" class="form-control" id="BannerName" name="BannerName">
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