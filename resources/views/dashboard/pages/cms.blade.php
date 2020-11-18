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
            <h6 class="card-title">Pages</h6>
            <script>
            var editor = "{{route('admin.cms.page-edit','xxx')}}";
            var pages = [
                          { "text" : "Root",
                            "state" : { "opened" : true },
                            "children" : [
                              @foreach($Resource["Pages"] as $Page)
                                { "text" : "{{ $Page['Group']->name }} [{{ $Page['Group']->key }}]",
                                    "children" : [
                                      @foreach($Page['Pages'] as $Item)
                                      {
                                        "text" : "{{ $Item->name }}",
                                        "icon" : "jstree-file",
                                        "data" : "{{ $Item->id }}",
                                      },
                                      @endforeach        
                                    ],
                                },
                              @endforeach
                            ],
                          },
                          { "text" : "Trash" }
                        ];
          </script>
          <div id="pages" class="demo"></div>
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
            <select class="form-control" id="Type" name="Type">
              <option value="0" selected>Page Type</option>
              @foreach($Resource['PageTypes'] as $PageType)
              <option value="{{ $PageType->id }}">{{ $PageType->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="Keywords">Keywords</label>
            <textarea class="form-control" id="Keywords" name="Keywords" rows="5"></textarea>
          </div>
          <div class="form-group">
            <label for="Description">Description</label>
            <textarea class="form-control" id="Description" name="Description" rows="5"></textarea>
          </div>
          <div class="form-group">
            <label for="ParentPage">Parent Page (Optional):</label>
            <select class="form-control" id="ParentPage" name="ParentPage">
              <option value="0" selected>Select Parent page</option>
              @foreach($Resource["Pages"] as $Page)
                <optgroup label="{{ $Page['Group']->name }}">
                @foreach($Page['Pages'] as $Item)
                <option value="{{ $Item->id }}">{{ $Item->name }}</option>
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