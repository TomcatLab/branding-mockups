@extends('master')

@section('page')
@if(count($page['header']))
  @include('dashboard.partials.pageHeader')
@endif
@include('dashboard.partials.alerts')

<div class="row">
    <div class="col-6">
      {{ Form::open(array('url' => 'admin/cms/page-add')) }}
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">New Page</h6>
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
          <div class="row">
            <div class="col-6">
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="bannerSlider" checked="" value="banners" >
                    Home
                  <i class="input-frame"></i></label>
              </div>
            </div>
            <div class="col-6">
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input bannerSlider" name="bannerSlider" checked="" value="banners" >
                    Banner
                  <i class="input-frame"></i></label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input type="radio" class="form-check-input bannerSlider" name="bannerSlider" value="sliders">
                    Slider
                  <i class="input-frame"></i></label>
              </div>
            </div>
          </div>          
          <div class="form-group banner-slider-option" id="banners">
            <label for="Type">Banner:</label>
            <select class="form-control action" id="Type" name="Type">
              <option value="0" selected>Select Banner</option>
              @foreach($Resource['Banners'] as $Banner)
              <option value="{{ $Banner->id }}">{{ $Banner->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group banner-slider-option d-none" id="sliders">
            <label for="Type">Slider:</label>
            <select class="form-control action" id="Type" name="Type">
              <option value="0" selected>Select Slider</option>
              @foreach($Resource['Sliders'] as $Slider)
              <option value="{{ $Slider->id }}">{{ $Slider->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="ParentPage">Parent Page (Optional):</label>
            <select class="form-control" id="ParentPage" name="ParentPage">
              <option value="0" selected>Select Parent page</option>
              @foreach($Resource["Pages"] as $Pages)
                <optgroup label="{{ $Pages['Group']->name }}">
                @foreach($Pages['Pages'] as $Item)
                <option value="{{ $Item->page_id }}">{{ $Item->name }}</option>
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
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
      {{ Form::close() }}
    </div>
</div>
@endsection