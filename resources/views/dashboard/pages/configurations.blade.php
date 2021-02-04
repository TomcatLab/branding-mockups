@extends('master')

@section('page')
    @include('dashboard.partials.alerts')
<div class="row">
    @foreach($resources['Configurations'] as $Configurations)
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">{{ $Configurations['GroupName'] }}</h6>
                {{ Form::open(array('url' => route('admin.settings'))) }}
                    <input type="hidden" name="group" value="{{  $Configurations['GroupId'] }}">
                    @foreach($Configurations['Configurations'] as $Configuration)
                    <div class="form-group">
                        <label for="{{ $Configuration['id'] }}">{{ $Configuration['name'] }}</label>
                        <input 
                            type="text"
                            class="form-control"
                            id="{{ $Configuration['id'] }}"
                            value="{{ $Configuration['value'] ? $Configuration['value'] : $Configuration['default'] }}"
                            name="{{ Str::slug($Configuration['name']) }}"
                        >
                    </div>
                    @endforeach
                    <button class="btn btn-primary" type="submit">Save</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection