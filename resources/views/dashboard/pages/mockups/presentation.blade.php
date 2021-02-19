@extends('master')

@section('page')
@include('dashboard.partials.alerts')
<div class="row">
    <div class="col-lg-6">
        <div class="row">
            @foreach($Presentation['Structure']['Images'] as $Image)
            <div class="col-12  grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $Image['Name'] }}</h4>
                        @foreach($Image['Cols'] as $Col)
                        <div class="row border-top">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ $Col['Title'] }}</label>
                                    <input type="file" class="myDropify" class="border"/>
                                    <!-- <input type="file" name="img[]" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                        </span>
                                    </div> -->
                                </div>
                            </div>
                            @if($Col['Hover'])
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Hover Image</label>
                                    <input type="file" class="myDropify" class="border"/>
                                </div>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection