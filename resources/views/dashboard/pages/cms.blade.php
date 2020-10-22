@extends('master')

@section('page')
@if(count($page['header']))
  @include('dashboard.partials.pageHeader')
  <pre>
  @php
    print_r($resource)
  @endphp
  </pre>
  @foreach($resource['pages'] as $page)
 
  @endforeach
@endif

@endsection