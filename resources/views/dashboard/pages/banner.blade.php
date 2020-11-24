@extends('master')

@section('page')
@if(count($page['header']))
  @include('dashboard.partials.pageHeader')
@endif
@include('dashboard.partials.alerts')

@endsection