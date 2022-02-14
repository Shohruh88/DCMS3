<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>Upress</title>
</head>

<body style="overflow-x: hidden;">

  <!-- <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 navmenu">
                      <li class="nav-item onemenu">
                        <a class="nav-link" aria-current="page" href="#"><button type="button" class="btn btn-outline-dark fw-bold">КАТАЛОГ</button></a>
                      </li>
                      <li class="nav-item dropdown fw-bold text-dark" style="margin-top: 0.45rem;">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">
                            Yana
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="{{ route('search') }}">Qidirish</a></li>
                          <li><a class="dropdown-item" href="{{route('profile')}}">Profile</a></li>
                        </ul>
                      </li>
                <a href="" class="navbar-brand">
                    <strong class="brandu">uPress</strong>
                </a>
                </ul>
            </div>
            </div>
        </nav>      
    </header> -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}" style="color: blue;">uPress</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('home') }}">Bosh sahifa</a>
          </li>
          @if (session()->has('subscriber'))
          <li class="nav-item">
            <a href="{{ route('profile') }}" class="nav-link">Profile</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('profile.subscribers') }}" class="nav-link">Obunalarim</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('search') }}" class="nav-link">Qidirish</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">Chiqish</a>
          </li>
          @endif
          @if (!session()->has('subscriber'))
          <li class="nav-item">
            <a href="{{ route('search') }}" class="nav-link">Qidirish</a>
          </li>
          <li class="nav-item">
            <a href="{{route('register')}}" class="nav-link">Register</a>
          </li>
          <li class="nav-item">
            <a href="{{route('login')}}" class="nav-link">Login</a>
          </li>
          @endif
          <!-- <li class="nav-item">
            <a class="nav-link" href="{{ route('profile') }}">Profile</a> 
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.subscribers') }}">Obunalarim</a>
          </li>
          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link">Chiqish</a>
          </li> -->
        </ul>
      </div>
    </div>
  </nav>
  <section>
    <div class="container-fluid mt-3 px-4" style="width: 100%; height: 200px;">
      <div class="row">
        <div class="col-md-12" style="background-color: rgba(53, 92, 231, 0.6); overflow: hidden;">
          <p class="text-center fw-bold" style="font-size: 64px; line-height: 75px; color: #355CE7; margin-top: 3rem;">uPress</p>
          <img src="img/books114.png" alt=" " style="margin-top: -8.6rem; margin-left: 88rem;">
        </div>

      </div>
    </div>

  </section>

  <section>
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col">
          <p style="font-weight: 500; font-size: 24px; line-height: 28px;margin-bottom:20px;">Ko'p izlanganlar</p>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        @foreach($homeList as $home)
        <div class="col-3 mb-2">
          <div class="card card-body">
            <div class="journal">
              <img src="/public/images/{{$home->image}}" alt="">
            </div>
            <div class="card-text text-center mt-3">
              <a href="{{route('home')}}/search/{{$home->publish_id}}"><p> {{ $home->publishname }} </p></a>
              <p>{{ $home->tom }}-tom {{" "}} {{ $home->number }}-son</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- <div class="col">
                <div class="p-3 border bg-light journal"><img src="" alt="Sizda rasm qushilmagan" /></div>
              </div>
              <div class="col">
                <div class="p-3 border bg-light journal"></div>
              </div>
              <div class="col">
                <div class="p-3 border bg-light journal"></div>
              </div>
              <div class="col">
                <div class="p-3 border bg-light journal"></div>
              </div> -->
  <!-- <section>
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col"><p style="font-weight: 500; font-size: 24px; line-height: 28px;">Издания</p></div>
                <div class="col">
                    <div class="row">
                        <div class="col allcoun">
                            <div class="dropdown" style="margin-left: 40rem;">
                                <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                  Все страны
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                  <li><button class="dropdown-item" type="button">Action</button></li>
                                  <li><button class="dropdown-item" type="button">Another action</button></li>
                                  <li><button class="dropdown-item" type="button">Something else here</button></li>
                                </ul>
                              </div>
                        </div>
                        <div class="col alllang">
                            <div class="dropdown" style="margin-left: 20rem;">
                                <button class="btn btn-outline-dark dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                  Все языки
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                  <li><button class="dropdown-item" type="button">Action</button></li>
                                  <li><button class="dropdown-item" type="button">Another action</button></li>
                                  <li><button class="dropdown-item" type="button">Something else here</button></li>
                                </ul>
                              </div>
                        </div>
                    </div>
            </div>
            </div>
        </div>
    </section> -->

  <!-- <section>
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col"><p style="font-weight: 500; font-size: 24px; line-height: 28px;">Газеты</p></div>
                <div class="col showall"> <a href="" style="margin-left: 49rem; text-decoration: none; color: rgba(0, 0, 0, 0.5);;">Показать всё  ></a></div>
            </div>
        </div>
        <div class="container-fluid px-4">
            <div class="row gx-5">
              <div class="col">
               <div class="p-3 border bg-light journal journal1"></div>
              </div>
              <div class="col">
                <div class="p-3 border bg-light journal journal1"></div>
              </div>
              <div class="col">
                <div class="p-3 border bg-light journal journal1"></div>
              </div>
              <div class="col">
                <div class="p-3 border bg-light journal journal1"></div>
              </div>
              <div class="col">
                <div class="p-3 border bg-light journal journal1"></div>
              </div>
            </div>
          </div>
    </section> -->

  <!-- <section>
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col"><p style="font-weight: 500; font-size: 24px; line-height: 28px;">Журналы</p></div>
                <div class="col showall"> <a href="" style="margin-left: 49rem; text-decoration: none; color: rgba(0, 0, 0, 0.5);;">Показать всё  ></a></div>
            </div>
        </div>
        <div class="container-fluid px-4">
            <div class="row gx-5">
              <div class="col">
               <div class="p-3 border bg-light journal journal2"></div>
              </div>
              <div class="col">
                <div class="p-3 border bg-light journal journal2"></div>
              </div>
              <div class="col">
                <div class="p-3 border bg-light journal journal2"></div>
              </div>
              <div class="col">
                <div class="p-3 border bg-light journal journal2"></div>
              </div>
              <div class="col">
                <div class="p-3 border bg-light journal journal2"></div>
              </div>
            </div>
          </div>
    </section> -->

  <!-- <section>
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col"><p style="font-weight: 500; font-size: 24px; line-height: 28px;">Книги</p></div>
                <div class="col showall"> <a href="" style="margin-left: 49rem; text-decoration: none; color: rgba(0, 0, 0, 0.5);;">Показать всё  ></a></div>
            </div>
        </div>
        <div class="container-fluid px-4">
            <div class="row gx-5">
              <div class="col">
               <div class="p-3 border bg-light journal journal3"></div>
              </div>
              <div class="col">
                <div class="p-3 border bg-light journal journal3"></div>
              </div>
              <div class="col">
                <div class="p-3 border bg-light journal journal3"></div>
              </div>
              <div class="col">
                <div class="p-3 border bg-light journal journal3"></div>
              </div>
              <div class="col">
                <div class="p-3 border bg-light journal journal3"></div>
              </div>
            </div>
          </div>
    </section> -->
  <br><br>
  <hr><br>


  <section>
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-md-12">
          <p style="font-weight: 500; font-size: 24px; line-height: 28px;">Рубрики</p>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col">
          <ul class="list-group">
            <li class="list-group-item border-0"><a href=""><img src="img/Vector.svg" class="" alt="" style="margin-right: 1rem;"><span class="spans">Автомобили</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (1).svg" alt="" style="margin-right: 1rem;"><span class="spans">Для дома и сада</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (2).svg" alt="" style="margin-right: 1rem;"><span class="spans">Искусство</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (3).svg" alt="" style="margin-right: 1rem;"><span class="spans">Мода</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (4).svg" alt="" style="margin-right: 1rem;"><span class="spans">Отдых на свежем воздухе</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (5).svg" alt="" style="margin-right: 1rem;"><span class="spans">Фотография</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (6).svg" alt="" style="margin-right: 1rem;"><span class="spans">Игры</span></a></li>
          </ul>
        </div>
        <div class="col">
          <ul class="list-group">
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (7).svg" alt="" style="margin-right: 1rem;"><span class="spans">Бизнес и финансы</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (8).svg" alt="" style="margin-right: 1rem;"><span class="spans">Женские интересы</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (9).svg" alt="" style="margin-right: 1rem;"><span class="spans">Компьютеры и технологии</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (10).svg" alt="" style="margin-right: 1rem;"><span class="spans">Мужские интересы</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (11).svg" alt="" style="margin-right: 1rem;"><span class="spans">Путешествие и туризм</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (12).svg" alt="" style="margin-right: 1rem;"><span class="spans">Хобби</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (13).svg" alt="" style="margin-right: 1rem;"><span class="spans">Новости</span></a></li>
          </ul>
        </div>
        <div class="col">
          <ul class="list-group">
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (14).svg" alt="" style="margin-right: 1rem;"><span class="spans">Воспитание и семья</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (15).svg" alt="" style="margin-right: 1rem;"><span class="spans">Животные</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (16).svg" alt="" style="margin-right: 1rem;"><span class="spans">Кулинария</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (17).svg" alt="" style="margin-right: 1rem;"><span class="spans">Музыка</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (18).svg" alt="" style="margin-right: 1rem;"><span class="spans">Развлечения и ТВ</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (19).svg" alt="" style="margin-right: 1rem;"><span class="spans">Яхты и авиация</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (20).svg" alt="" style="margin-right: 1rem;"><span class="spans">Спорт</span></a></li>
          </ul>
        </div>
        <div class="col">
          <ul class="list-group">
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (21).svg" alt="" style="margin-right: 1rem;"><span class="spans">Дети</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (22).svg" alt="" style="margin-right: 1rem;"><span class="spans">Здоровье и фитнес</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (23).svg" alt="" style="margin-right: 1rem;"><span class="spans">Местная жизнь</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (24).svg" alt="" style="margin-right: 1rem;"><span class="spans">Наука и история</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (25).svg" alt="" style="margin-right: 1rem;"><span class="spans">Религия и духовность</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (26).svg" alt="" style="margin-right: 1rem;"><span class="spans">Дизайн</span></a></li>
            <li class="list-group-item border-0"><img src="" alt=""></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <br><br>
  <hr>
  <!-- <footer>
    <div class="container mt-5">
      <div class="row align-items-center">
        <div class="col">
          <p class="footbrand"><a class="navbar-brand" href="#" style="left: 18%; color: #355CE7; font-size: 24px; font-weight: 500; margin-top: -6.5%;">uPress</a></p>
        </div>
        <div class="col">
          <p class="pmenu">uPress</p>
          <p><a href="" class="footermenu">About</a></p>
          <p><a href="" class="footermenu">Подписаться</a></p>
          <p><a href="" class="footermenu">Отдел новостей</a></p>
          <p><a href=""><img src="" alt=""></a></p>
          <p><a href=""><img src="" alt=""></a></p>
        </div>
        <div class="col">
          <p class="pmenu">Работать с нами</p>
          <p><a href="" class="footermenu">Бизнес решения</a></p>
          <p><a href="" class="footermenu">Решения для издателей</a></p>
          <p><a href="" class="footermenu">Фирменные издания</a></p>
          <p><a href="" class="footermenu">Партнеры логин</a></p>
          <p><a href="" class="footermenu">Деловые запросы</a></p>
        </div>
        <div class="col">
          <p class="pmenu">Ресурсы</p>
          <p><a href="" class="footermenu">Справка</a></p>
          <p><a href="" class="footermenu">Контактная поддержка</a></p>
          <p><a href=""><img src="" alt=""></a></p>
          <p><a href=""><img src="" alt=""></a></p>
          <p><a href=""><img src="" alt=""></a></p>
        </div>
        <div class="col" style="margin-top: -7%;">
          <p class="pmenu">Получить приложение</p>
          <span><a href=""><img src="img/Ellipse 9.svg" class="footerlink" alt=""></a></span>
          <span><a href=""><img src="img/Ellipse 11.svg" class="footerlink" alt=""></a></span>
          <span><a href=""><img src="img/Ellipse 10.svg" class="footerlink" alt=""></a></span><br>
          <span><a href=""><img src="img/Ellipse 12.svg" class="footerlink" alt=""></a></span>
          <span><a href=""><img src="img/Ellipse 13.svg" class="footerlink" alt=""></a></span>
        </div>
      </div>
    </div>
  </footer> -->
  <!-- <footer>
    <nav class="nav justify-content-center">
      <a class="nav-link politic" href="#">2022 uPress</a>
      <a class="nav-link politic" href="#">Наши Условия</a>
      <a class="nav-link politic" href="#">Политика конфиденциальности</a>
      <a class="nav-link politic" href="#">Доступность</a>
      <a class="nav-link politic" href="#">Карта сайта</a>
      <a class="nav-link politic" href="#">
        <div class="dropdown" style="width: 75px; height: 26px; margin-top: -12px;">
          <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="img/Vector (27).svg" alt=""> ru
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <li><button class="dropdown-item" type="button">Action</button></li>
            <li><button class="dropdown-item" type="button">Another action</button></li>
            <li><button class="dropdown-item" type="button">Something else here</button></li>
          </ul>
        </div>
      </a>
    </nav>
  </footer> -->
  <br>






  <style>
    @media (max-width: 1366px) {
      .twomenu {
        margin-left: 54rem;
      }

      .showall {
        margin-left: 26rem;
        margin-top: -35px;
      }

      .alllang {
        margin-left: 12rem;
        margin-top: -38px;
      }
    }

    @media (max-width: 1440px) {
      .twomenu {
        margin-left: 58rem;
      }

      .showall {
        margin-left: -30rem;
        margin-top: 0px;
      }

      .alllang {
        margin-left: 12rem;
        margin-top: -38px;
      }
    }

    @media (max-width: 1920px) {
      .twomenu {
        margin-left: 83rem;
      }

      .showall {
        margin-left: 0rem;
        margin-top: 0px;
      }

      .alllang {
        margin-left: 29rem;
        margin-top: -38px;
      }
    }

    @media (max-width: 2560px) {
      .twomenu {
        margin-left: 125rem;
      }

      .footbrand {
        margin-top: 4rem;
      }

      .brandu {
        margin-left: 4.5rem;
      }

      .showall {
        margin-left: 40rem;
        margin-top: 0px;
      }

      .alllang {
        margin-left: 48rem;
        margin-top: -38px;
      }

      .allcoun {
        margin-left: 19rem;
      }
    }
  </style>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>







<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{route('home')}}"><h3>Upress</h3></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">Register</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('search') }}" class="nav-link">Search</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">Login</a>
            </li>
        </ul>
    </div>
  </div>
</nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10">
                
            </div>
        </div>
    </div>
<script src="{{ asset('js/ajax.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
<script type="text/javascript">

    // function getHomeData() {
    //     $.ajax({
    //         url: "http://127.0.0.1:8000/api/home",
    //         type: "GET",
    //         dataType: "JSON",
    //         success: function(data) {
    //             console.log(data)
    //         },
    //         error: function(err) {
    //             console.log(err)
    //         }
    //     })
    // }

    // getHomeData();
    

</script>
</body>
</html> -->