<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid mx-2">
        <a class="navbar-brand homeImag" href="{{ route('home') }}" style="color: blue;">
            <img src="/img/u-press-logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}"> {{ __('lang.bosh_sahifa') }} </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('aboutus') }}" class="nav-link">{{ __('lang.biz_haqimizda') }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('news') }}" class="nav-link">{{ __('lang.yangiliklar') }}</a>
                </li>
                @if (session()->has('user'))
                <li class="nav-item">
                    <a href="{{ route('profile.subscribers') }}" class="nav-link">{{ __('lang.obunalarim') }}</a>
                </li>
                @endif
                @if (!session()->has('user'))
                <li class="nav-item">
                    <a href="{{route('register')}}" class="nav-link"> {{ __('lang.ruyhatdan_utish') }} </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('login')}}" class="nav-link">{{ __('lang.kirish') }}</a>
                </li>
                @endif
            </ul>
            <form class="d-flex" style="margin-left: 10px;">
                @csrf
                <input class="form-control me-2" type="search" placeholder="{{ __('lang.kalit_suz') }}" aria-label="Search" id="keyWords">
                <a type="button" id="search_1">
                    <img src="{{ asset('img/search-outline.svg') }}" style="width: 30px;height:30px;margin-right:20px;color:green;" alt="" />
                </a>
                <a href="{{ route('search') }}" class="btn btn-outline-success" type="submit">{{ __('lang.batafsil') }}</a>
            </form>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <select name="lang" id="lang" class="form-select ms-2">
                        <option value="uzb" {{ session()->get('locale') == 'uzb' ? 'selected' : '' }}>UZ</option>
                        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>EN</option>
                        <option value="ru" {{ session()->get('locale') == 'ru' ? 'selected' : '' }}>RU</option>
                    </select>
                </li>
            </ul>
            @if (session()->has('user'))
            <ul class="navbar-nav ms-auto me-5">
                <div class="dropdown">
                    <button class="btn btn-success dropdown-toggle rounded-" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <strong class="text-uppercase p-0"> {{ substr(session('user')[0]->firstname, 0, 1) }}{{ substr(session('user')[0]->lastname, 0, 1) }}</strong>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ route('profile') }}" style="font-size: 15px !important; margin-left:0px !important"><i class="fa-solid fa-user me-2"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" style="font-size: 15px !important; margin-left:0px !important"><i class="fa-solid fa-right-from-bracket me-2"></i>Chiqish</a></li>
                    </ul>
                </div>
            </ul>
            @endif
        </div>
    </div>
</nav>