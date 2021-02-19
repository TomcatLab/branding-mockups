@extends("home.layout")

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <ul class="nav nav-tabs mt-4">
                <li class="nav-item">
                    <a class="nav-link {{ $Configs['page'] == 'orders' ? 'active' : '' }}" aria-current="page" href="{{ route('user.account','orders') }}">Order History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $Configs['page'] == 'profile' ? 'active' : '' }}" href="{{ route('user.account','profile') }}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $Configs['page'] == 'password' ? 'active' : '' }}" href="{{ route('user.account','password') }}">Password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>
            <div class="row mt-4 mb-4">
                @include($Configs['blade'])
            </div>
        </div>
        <div class="col-4">
        </div>
    </div>
</div>
@endsection