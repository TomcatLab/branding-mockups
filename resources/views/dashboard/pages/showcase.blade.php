@extends('master')

@section('page')
@include('dashboard.partials.pageHeader')

@include('dashboard.partials.alerts')

<div class="row">
    @foreach($resources['Showcases'] as $Showcase)
    <div class="col-12 col-md-2 stretch-card">
      @include('dashboard.partials.showcase')
    </div>
    @endforeach
</div>

<div class="modal fade" id="NewShowcaseModal" tabindex="-1" role="dialog" aria-labelledby="NewShowcaseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newPageModalLabel">New Page</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {{ Form::open(array('url' => route('admin.products.showcases'), "method" => "post",'files' => 'true')) }}
        <div class="modal-body">
            <div class="form-group">
              <label for="ShowcaseLabel" class="col-form-label">Showcase Label:</label>
              <input type="text" class="form-control" id="ShowcaseLabel" name="ShowcaseLabel">
            </div>
            <!-- <div class="form-group">
              <label for="ShowcaseUser" class="col-form-label">Showcase User:</label>
              <input type="text" class="form-control" id="ShowcaseUser" name="ShowcaseUser">
            </div> -->
            <div class="form-group">
              <label for="ShowcaseCategory">Showcase category:</label>
              <select class="form-control" id="ShowcaseCategory" name="ShowcaseCategory">
                <option value="0" selected>Select showcase category</option>
                @foreach($resources['MockupCategories'] as $MockupCategory)
                <option value="{{ $MockupCategory->id }}" >{{ $MockupCategory->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
                <label>Thumbnail image</label>
                <input type="file" name="ShowcaseImage" class="file-upload-default" accept="image/png, image/jpeg,image/jpg">
                <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                    </span>
                </div>
            </div>
            <div class="form-group">
              <label for="BehanceProjectUrl" class="col-form-label">Behance Project URL:</label>
              <input type="text" class="form-control" id="BehanceProjectUrl" name="BehanceProjectUrl">
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