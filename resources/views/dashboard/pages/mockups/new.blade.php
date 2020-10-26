@extends('master')

@section('page')
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">New Mockup</h6>
                {{ Form::open(array('url' => route('admin.products.mockups.new'))) }}
                    <input type="hidden" name="MockupAuthor">
                    <div class="form-group">
                        <label for="MockupName">Name</label>
                        <input type="text" class="form-control" id="MockupName" value="" name="MockupName" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="MockupKeywords">Keywords</label>
                        <textarea class="form-control" id="MockupKeywords" name="MockupKeywords" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="MockupDescription">Description</label>
                        <textarea class="form-control" id="MockupDescription" name="MockupDescription" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="MockupCategory">Category</label>
                        <select class="form-control" id="MockupCategory" name="MockupCategory">
                            <option selected disabled>Select Category</option>
                            @foreach($Resources['MockupCategories'] as $MockupCategory)
                            <option value="{{ $MockupCategory->category_id }}" >{{ $MockupCategory->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="MockupSlug">Slug</label>
                        <input type="text" class="form-control" id="MockupSlug" value="" name="MockupSlug" placeholder="highway-blue">
                    </div>
                    <div class="form-group">
                        <label for="MockupPrice">Price</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <input type="number" class="form-control" id="MockupPrice" name="MockupPrice" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="MockupInformations">Informations</label>
                        <textarea class="form-control" id="MockupInformations" name="MockupInformations" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="MockupExtension">File Extension</label>
                        <select class="form-control" id="MockupExtension" name="MockupExtension">
                            <option selected disabled>Select File Extension</option>
                            @foreach($Resources['FileExtensions'] as $FileExtension)
                            <option value="{{ $FileExtension->extension_id }}">{{$FileExtension->extension_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit form</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection