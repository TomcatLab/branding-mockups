<nav class="navbar navbar-expand-lg fixed-top navbar-main">
  <div class="container">
    <a class="navbar-brand" href="./">
      <img class="logo" src="{{URL::to('users/assets/images/logo-branding.svg')}}">
      <img class="logo-invert" src="{{URL::to('users/assets/images/logo-branding-revert.svg')}}">
    </a>
    <button class="navbar-toggler border-0 p-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <i data-feather="more-vertical"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        @foreach($menus['main-menu']['Pages'] as $item)
        <li class="nav-item">
          <a class="nav-link" href="{{URL::to('home/'.$item->slug)}}">{{ $item->name }}<span class="sr-only">(current)</span></a>
        </li>
        @endforeach
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#"><i data-feather="search" width="18"  height="18"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}"><i data-feather="user" width="18"  height="18"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i data-feather="shopping-cart" width="18"  height="18"></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>