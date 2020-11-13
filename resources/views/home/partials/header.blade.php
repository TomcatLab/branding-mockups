<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="{{URL::to('users/assets/images/logo-branding.svg')}}">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        @foreach($menu as $item)
        <li class="nav-item">
          <a class="nav-link" href="{{ $item['link'] }}">{{ $item['label'] }}<span class="sr-only">(current)</span></a>
        </li>
        @endforeach
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#"><i data-feather="search"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i data-feather="user"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i data-feather="shopping-cart"></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>