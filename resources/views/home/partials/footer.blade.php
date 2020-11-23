<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-3">
                <div class="row">
                    <div class="col-12"> <img src="{{URL::to('users/assets/images/logo.svg')}}" alt=""> </div>
                    <div class="col-12 pt-3"> <span class="copyright-text">© 2020 Branding Mockups</span> </div>
                </div>
            </div>
            <div class="col-12 col-sm-2">
                <div class="row navigation">
                    <div class="col-12">
                        <h5> Products</h5>
                    </div>
                    <div class="col-12">
                        <ul class="nav flex-column">
                        @foreach($menus['products']['Pages'] as $item)
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('home/'.$item->slug)}}">{{ $item->name }}<span class="sr-only">(current)</span></a>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-2">
                <div class="row navigation">
                    <div class="col-12">
                        <h5>Support</h5>
                    </div>
                    <div class="col-12">
                        <ul class="nav flex-column">
                        @foreach($menus['support']['Pages'] as $item)
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('home/'.$item->slug)}}">{{ $item->name }}<span class="sr-only">(current)</span></a>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-2">
                <div class="row navigation">
                    <div class="col-12">
                        <h5>Further Information</h5>
                    </div>
                    <div class="col-12">
                        <ul class="nav flex-column">
                        @foreach($menus['further-information']['Pages'] as $item)
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('home/'.$item->slug)}}">{{ $item->name }}<span class="sr-only">(current)</span></a>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-3">
                <div class="row social-navigation">
                    <div class="col-12">
                        <h5>Follows us</h5>
                    </div>
                    <div class="col-12">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-dribbble"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#"><i class="fa fa-facebook-square"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>