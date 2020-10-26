@extends('master')

@section('page')
@if(count($page['header']))
  @include('dashboard.partials.pageHeader')
@endif
<div class="row">
<div class="col-md-12 grid-margin stretch-card">
  <div class="card">
      <div class="card-body">
          <h6 class="card-title">Pages</h6>
          <script>
          var pages = [
                        { "text" : "Root",
                          "state" : { "opened" : true },
                          "children" : [
                            @foreach($Resource["Pages"] as $Page)
                              { "text" : "{{ $Page['Group']->group_name }}",
                                  "children" : [
                                    @foreach($Page['Pages'] as $Item)
                                    {
                                      "text" : "{{ $Item->page_name }}",
                                      "icon" : "jstree-file"
                                    }
                                    @endforeach        
                                  ],
                              },
                            @endforeach
                          ],
                        }
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
    {{ $validator  ?? '' }}
      {{ Form::open(array('url' => 'admin/cms/page-add')) }}
      <div class="modal-header">
        <h5 class="modal-title" id="newPageModalLabel">New Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="page-name" class="col-form-label">Group Name:</label>
            <input type="text" class="form-control" id="page-name" name="page-name">
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
    {{ $validator  ?? '' }}
      {{ Form::open(array('url' => 'admin/cms/page-add')) }}
      <div class="modal-header">
        <h5 class="modal-title" id="newPageModalLabel">New Page</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="page-name" class="col-form-label">Page Name:</label>
            <input type="text" class="form-control" id="page-name" name="page-name">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Page Type:</label>
            <select class="form-control" id="exampleFormControlSelect1" name="parent-page">
              <option value="0" selected>Select Parent type</option>
              @foreach($Resource['PageTypes'] as $PageType)
              <option value="{{ $PageType->type_id }}">{{ $PageType->type_name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="keywords">Keywords</label>
            <textarea class="form-control" id="keywords" name="keywords" rows="5"></textarea>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Parent Page (Optional):</label>
            <select class="form-control" id="exampleFormControlSelect1" name="parent-page">
              <option value="0" selected>Select Parent page</option>
              @foreach($Resource["Pages"] as $Page)
                <optgroup label="{{ $Page['Group']->group_name }}">
                @foreach($Page['Pages'] as $Item)
                <option value="{{ $Item->page_id }}">{{ $Item->page_name }}</option>
                @endforeach
                </optgroup>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Category/Menu Location:</label>
            <select class="form-control" id="exampleFormControlSelect1" name="category">
              <option  value="0" selected disabled>Select catagory</option>
              @foreach($Resource['Groups'] as $Group)
                <option value="{{ $Group->group_id }}">{{ $Group->group_name }}</option>
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