@extends('master')

@section('page')
@if(count($page['header']))
  @include('dashboard.partials.pageHeader')
@endif
@include('dashboard.partials.alerts')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Pages</h6>
        <div id="accordion" class="accordion" role="tablist">
          @foreach($Resource["Pages"] as $Page)
          <div class="card">
            <div class="card-header" role="tab" id="{{ $Page['Group']->key }}">
              <h6 class="mb-0">
                <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                {{ $Page['Group']->name }}
                </a>
              </h6>
            </div>
            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="{{ $Page['Group']->key }}" data-parent="#accordion">
              <div class="card-body">
              @foreach($Page['Pages'] as $Item)
                <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
									<div class="d-flex align-items-center hover-pointer">
                    <i data-feather="file"></i>												
										<div class="ml-2">
                      <p>{{$Item->name}}</p>
                      <p class="tx-11 text-muted">[unknown]</p>
                    </div>
                  </div>
                  <div class="d-flex align-items-center hover-pointer">
                    <a class="btn btn-link disabled" href="{{ $Item->id }}" role="button" >
                      <i data-feather="send" data-toggle="tooltip" title="Publish" width="16" height="16" ></i>
                    </a>
                    <a class="btn btn-link" href="{{ route('admin.cms.page-edit',$Item->id) }}" role="button">
                      <i data-feather="align-left" data-toggle="tooltip" title="Manage Content" width="16" height="16" ></i>
                    </a>
                    <a class="btn btn-link" href="{{ $Item->id }}" role="button">
                      <i data-feather="edit" data-toggle="tooltip" title="Edit Page Propertis" width="16" height="16" ></i>
                    </a>
                    <a class="btn btn-link" href="{{ $Item->id }}" role="button">
                      <i data-feather="delete" data-toggle="tooltip" title="Delete Page" width="16" height="16" ></i>
                    </a>
                  </div>
								</div>
              @endforeach
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="newGroupModal" tabindex="-1" role="dialog" aria-labelledby="newGroupModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {{ Form::open(array('url' => route('admin.cms.page-group'))) }}
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      {{ Form::close() }}
    </div>
  </div>
</div>

<div class="modal fade" id="newPageModal" tabindex="-1" role="dialog" aria-labelledby="newPageModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {{ Form::open(array('url' => 'admin/cms/page-add')) }}
      <div class="modal-header">
        <h5 class="modal-title" id="newPageModalLabel">New Page</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="PageName" class="col-form-label">Page Name:</label>
            <input type="text" class="form-control" id="PageName" name="PageName">
          </div>
          <div class="form-group">
            <label for="PageSlug" class="col-form-label">Page Slug:</label>
            <input type="text" class="form-control" id="PageSlug" name="PageSlug">
          </div>
          <div class="form-group">
            <label for="Type">Page Type:</label>
            <script>
              var actions = {
                @foreach($Resource['PageTypes'] as $PageType)
                  "{{ $PageType->id }}" : {
                    "show" : "{{ $PageType->show }}",
                    "hide" : "{{ $PageType->hide }}"
                  },
                @endforeach
              };
            </script>
            <select class="form-control action" id="Type" name="Type">
              <option value="0" selected>Page Type</option>
              @foreach($Resource['PageTypes'] as $PageType)
              <option value="{{ $PageType->id }}">{{ $PageType->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group link">
            <label for="link" class="col-form-label">Link:</label>
            <input type="text" class="form-control" id="link" name="link">
          </div>
          <div class="form-group keywords">
            <label for="Keywords">Keywords</label>
            <textarea class="form-control" id="Keywords" name="Keywords" rows="5"></textarea>
          </div>
          <div class="form-group description">
            <label for="Description">Description</label>
            <textarea class="form-control" id="Description" name="Description" rows="5"></textarea>
          </div>
          <div class="form-group">
            <label for="ParentPage">Parent Page (Optional):</label>
            <select class="form-control" id="ParentPage" name="ParentPage">
              <option value="0" selected>Select Parent page</option>
              @foreach($Resource["Pages"] as $Pages)
                <optgroup label="{{ $Page['Group']->name }}">
                @foreach($Pages['Pages'] as $Page)
                <option value="{{ $Page->page_id }}">{{ $Page->name }}</option>
                @endforeach
                </optgroup>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="Group">Group/Menu Location:</label>
            <select class="form-control" id="Group" name="Group">
              <option  value="0" selected disabled>Select catagory</option>
              @foreach($Resource['Groups'] as $Group)
                <option value="{{ $Group->id }}">{{ $Group->name }}</option>
              @endforeach
            </select>
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