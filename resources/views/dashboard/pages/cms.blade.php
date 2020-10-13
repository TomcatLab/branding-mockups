@extends('master')

@section('page')
@if(count($page['header']))
    @include('dashboard.partials.pageHeader')
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h6 class="card-title">Bordered table</h6>
            <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Page Name</th>
                      <th class="text-right">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>1</th>
                      <td>Mark</td>
                      <td class="text-right">
                        <a type="button" class="btn btn-icon-text" href="#">
                          <i class="btn-icon-prepend" data-feather="eye"></i>
                        </a>
                        <a type="button" class="btn btn-icon-text" href="#">
                          <i class="btn-icon-prepend" data-feather="edit"></i>
                        </a>
                        <a type="button" class="btn btn-icon-text" href="#">
                          <i class="btn-icon-prepend" data-feather="delete"></i>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
            </div>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary float-right">Delete</a>
          </div>
        </div>
      </div>
    </div>
@endif
  <div class="modal fade" id="newPageModal" tabindex="-1" role="dialog" aria-labelledby="newPageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newPageModalLabel">New Page</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="page-name" class="col-form-label">Page Name:</label>
              <input type="text" class="form-control" id="page-name">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Parent Page:</label>
              <select class="form-control" id="exampleFormControlSelect1">
                <option selected disabled>Select your age</option>
                <option>12-18</option>
                <option>18-22</option>
                <option>22-30</option>
                <option>30-60</option>
                <option>Above 60</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Category/Menu Location:</label>
              <select class="form-control" id="exampleFormControlSelect1">
                <option selected disabled>Select your age</option>
                <option>12-18</option>
                <option>18-22</option>
                <option>22-30</option>
                <option>30-60</option>
                <option>Above 60</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>
@endsection