@extends('master')

@section('page')
@if(count($page['header']))
  @include('dashboard.partials.pageHeader')
@endif
@include('dashboard.partials.alerts')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Basic Example</h6>
        <div class="profile-header">
          <div class="cover">
            <figure>
              <img src="https://via.placeholder.com/1148x272" class="img-fluid" alt="profile cover">
            </figure>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection