@extends('master')

@section('page')
@include('dashboard.partials.pageHeader')

<div class="row">
    @foreach($resources['Mockups'] as $Mockup)
    <div class="col-12 col-md-2 stretch-card">
        @include('dashboard.partials.mockup')
    </div>
    @endforeach
</div>
<div class="modal fade" id="newGroupModal" tabindex="-1" role="dialog" aria-labelledby="newGroupModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {{ Form::open(array('url' => route('admin.cms.mockups-group'))) }}
      <div class="modal-header">
        <h5 class="modal-title" id="newPageModalLabel">New Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="GroupName" class="col-form-label">Group Name:</label>
            <input type="text" class="form-control" id="GroupName" name="GroupName">
          </div>
          <div class="row">
            <div class="col-12">
              <h6>Categories</h6>
              <ul class="list-group list-group-flush">
                @foreach($resources['Categories'] as $Category)
                <li class="list-group-item">{{ $Category->name }}</li>
                @endforeach
              </ul>
            </div>
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
<div class="modal fade" id="newExtensionModal" tabindex="-1" role="dialog" aria-labelledby="newExtensionModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {{ Form::open(array('url' => route('admin.cms.mockups-extension'))) }}
      <div class="modal-header">
        <h5 class="modal-title" id="newPageModalLabel">New Extension</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="ExtensionName" class="col-form-label">Extension Name:</label>
            <input type="text" class="form-control" id="ExtensionName" name="ExtensionName">
          </div>
          <div class="row">
            <div class="col-12">
              <h6>Extensions</h6>
              <ul class="list-group list-group-flush">
                @foreach($resources['Extensions'] as $Extension)
                <li class="list-group-item">{{ $Extension->name }}</li>
                @endforeach
              </ul>
            </div>
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