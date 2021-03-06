@extends('master')

@section('page')
@include('dashboard.partials.alerts')
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">New Mockup</h6>
                {{ Form::open(array('url' => route('admin.products.mockups.edit', $Resources['MockupId']), "method" => "post",'files' => 'true')) }}
                    <input type="hidden" name="MockupAuthor">
                    <input type="hidden" name="id" value="{{ $Resources['MockupId'] }}">
                    <div class="form-group">
                        <label for="MockupName">Name</label>
                        <input type="text" class="form-control" id="MockupName" value="{{ $Resources['Mockup']->name }}" name="MockupName" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="MockupKeywords">Keywords</label>
                        <textarea class="form-control" id="MockupKeywords" name="MockupKeywords" rows="5">{{ $Resources['Mockup']->keywords }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="MockupDescription">Description</label>
                        <textarea class="form-control" id="MockupDescription" name="MockupDescription" rows="5">{{ $Resources['Mockup']->description }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="MockupCategory">Category</label>
                                <select class="form-control" id="MockupCategory" name="MockupCategory">
                                    <option selected disabled>Select Category</option>
                                    @foreach($Resources['MockupCategories'] as $MockupCategory)
                                    <option value="{{ $MockupCategory->id }}" {{ $MockupCategory->id  == $Resources['Mockup']->category_id ? 'selected' : '' }} >{{ $MockupCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="MockupTypes">Types</label>
                                <select class="form-control" id="MockupTypes" name="MockupType">
                                    <option selected disabled>Select Category</option>
                                    @foreach($Resources['MockupTypes'] as $MockupType)
                                    <option value="{{ $MockupType->id }}" {{ $MockupType->id  == $Resources['Mockup']->type_id ? 'selected' : '' }} >{{ $MockupType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="MockupSlug">Slug</label>
                        <input type="text" class="form-control" id="MockupSlug" value="{{ $Resources['Mockup']->slug }}" name="MockupSlug" placeholder="highway-blue">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <label>Package</label>
                                        <input type="file" name="MockupPackage" class="file-upload-default" accept=".zip,.rar,.7zip">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Package">
                                            <span class="input-group-append">
                                                <button class="file-upload-browse btn btn-primary" type="button">Zip</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 d-flex align-items-center">
                                    <a href="#" class="btn btn-link btn-block">{{ $Resources['Package']->filename }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label>Thumbnail image</label>
                                <input type="file" name="MockupImage" class="file-upload-default" accept="image/png, image/jpeg,image/jpg">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="MockupPrice">Price</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="number" class="form-control" id="MockupPrice" name="MockupPrice" value="{{ $Resources['Mockup']->price }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="MockupExtension">File Extension</label>
                                <select class="form-control" id="MockupExtension" name="MockupExtension">
                                    <option selected disabled>Select File Extension</option>
                                    @foreach($Resources['FileExtensions'] as $FileExtension)
                                    <option value="{{ $FileExtension->id }}" {{ $FileExtension->id  == $Resources['Mockup']->file_extension	? 'selected' : '' }} >{{$FileExtension->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="MockupInformations">Informations</label>
                        <textarea class="form-control" id="MockupInformations" name="MockupInformations" rows="5">{{ $Resources['Mockup']->info }}</textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Submit form</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection