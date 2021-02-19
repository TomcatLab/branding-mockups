@extends('master')

@section('page')
@include('dashboard.partials.pageHeader')

@include('dashboard.partials.alerts')

<div class="row">
    @foreach($resources['Showcases'] as $Showcase)
    <div class="col-12 col-md-3 stretch-card">
      @include('dashboard.partials.showcase')
    </div>
    @endforeach
</div>
@endsection