@extends('master')

@section('page')
@include('dashboard.partials.pageHeader')

<div class="row">
    @if($Resources)
    @foreach($Resources['Mockups'] as $Mockup)
    <div class="col-12 col-md-3 stretch-card">
        @include('dashboard.partials.mockup')
    </div>
    @endforeach
    @endif
</div>
@endsection