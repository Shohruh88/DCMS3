
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>
<body style="overflow-x: hidden;">
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 navmenu">
                      <li class="nav-item onemenu">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}"><button type="button" class="btn btn-outline-dark fw-bold">Kataloglar</button></a>
                      </li>
                      <li class="nav-item dropdown fw-bold text-dark" style="margin-top: 0.45rem;">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: black;">
                            Yana
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="{{route('search')}}">Qidirish</a></li>
                          <li><a class="dropdown-item" href="{{route('profile')}}">Profile</a></li>
                        </ul>
                      </li>
                <a href="" class="navbar-brand">
                    <strong class="brandu">uPress</strong>
                </a>
                <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0 twomenu">
                    <li class="nav-item">
                      <a class="nav-link icon" aria-current="page" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16" style="color: black;">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                          </svg>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link navuser" href="#"><p>SM</p></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link icon" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16" style="color: black;">
                                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                              </svg>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>  
                          </ul>
                        </li>
                </ul> -->
                </ul>
            </div>
            </div>
        </nav>      
    </header>

    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <nav class="fw-bold" style="--bs-breadcrumb-divider: '>'; margin-left: 30px;" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a style="font-size: 13px; color: rgba(0, 0, 0, 0.6); font-weight: 600;" href="#">KATALOG</a></li>
                          <li class="breadcrumb-item"><a style="font-size: 13px; color: rgba(0, 0, 0, 0.6); font-weight: 600;" href="#">JURNALI</a></li>
                          <li class="breadcrumb-item" aria-current="page"><a style="font-size: 13px; color: rgba(0, 0, 0, 0.3); font-weight: 600;" href="#">{{ $searchList[0]->publishname }}</a></li>
                        </ol>
                      </nav>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
              <div class="col" style="width: 5rem;">
                <div class="row">
                    <div class="col-6">
                      <img class="journal11" src="/public/images/{{ $searchList[0]->image }}" alt="">
                    </div>
                    <div class="col-6 mt-4">
                      <ul class="list-group">
                        <li class="list-group-item">
                            <span style="font-weight: bold;margin-right: 10px;">Nashriyot:</span>{{ $searchList[0]->publishername }}
                        </li>
                        <li class="list-group-item">
                          <span style="font-weight: bold;margin-right: 10px;">Nashr soxasi:</span>{{ $searchList[0]->rubrikaname }}
                        </li>
                        <li class="list-group-item">
                            <span style="font-weight: bold;margin-right: 10px;">Nashr nomi:</span>{{ $searchList[0]->publishname }}
                        </li>
                        <li class="list-group-item">
                            <span style="font-weight: bold;margin-right: 10px;">Nashr soni:</span>{{ $searchList[0]->number }}
                        </li>
                        <li class="list-group-item">
                            <span style="font-weight: bold;margin-right: 10px;">Nashr tomi:</span>{{ $searchList[0]->tom }}
                        </li>
                        <li class="list-group-item">
                            <span style="font-weight: bold;margin-right: 10px;">Nashr turi(kitob, gazeta, jurnal):</span>{{ $searchList[0]->typename }}
                        </li>
                        <li class="list-group-item">
                            <span style="font-weight: bold;margin-right: 10px;">Nashr sanasi:</span>{{ $searchList[0]->date }}
                        </li>
                      </ul>
                    </div>
                </div>
              </div>
              <div class="col-5 text-center">
                  <div class="card mt-3">
                    <div class="card-body">
                      <h4>Siz obuna bo'lishni xohlaysizmi?</h4>
                      <p></p>
                      <button id="obuna" publish_id="{{ $searchList[0]->publish_id }}" class="btn btn-primary">
                        Obuna bo'lish
                      </button>
                      <!-- <select name="" id="" class="select custom-select">
                        <option value="1">6 oy</option>
                        <option value="1">12 oy</option>
                      </select> -->
                    </div>
                  </div>
              </div>
            </div>
          </div>
    </section>

    <section>
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-6"><p style="font-weight: 500; font-size: 24px; line-height: 28px;">Nashrning boshqa sonlari </p></div>
            </div>
        </div>
        <div class="container ">
            <div class="row">
              
              @foreach ($publishedList as $published)
              <div class="col-4">
                <div class="card card-body">
                  <div class="image">
                    <img src="/public/images/{{ $published->image }}" alt="">
                  </div>
                  <div class="card-text text-center mt-2">
                    <p>{{ $published->publishname }} &nbsp;{{$published->tom}}-tom &nbsp;{{$published->number}}-soni </p>
                  </div>
                </div>
              </div>
              @endforeach
               
            </div>
          </div>
    </section>

    <section>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12"><p style="font-weight: 500; font-size: 24px; line-height: 28px;">Shu mavzudagi nashrlar</p></div>
               @foreach ($rubrikaList as $rubrika)
               <div class="col-4">
                  <div class="card card-body">
                    <div class="image">
                      <img src="/public/images/{{$rubrika->image}}" alt="">
                    </div>
                    <div class="card-text text-center mt-2">
                    <p>{{ $rubrika->rubrikaname }} &nbsp;{{$rubrika->tom}}-tom &nbsp;{{$rubrika->number}}-soni </p>
                    <p>{{ $rubrika->publishname }}</p>
                  </div>
                  </div>
                </div>
               @endforeach
            </div>
        </div>
    </section>

    <footer>
        <div class="container mt-5">
          <div class="row align-items-center">
            <div class="col"><p class="footbrand"><a class="navbar-brand" href="#" style="left: 18%; color: #355CE7; font-size: 24px; font-weight: 500; margin-top: -6.5%;">uPress</a></p></div>
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
      </footer>
      <footer>
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
      </footer>
      <br>


      <style>
        @media (max-width: 2560px) {
          .podpisinfo {
            margin-left: -20rem;
          }
          .margintop {
            margin-left: -20rem;
          }
          .twomenu {
            margin-left: 125rem;
          }
          .footbrand {
            margin-top: 4rem;
          }
          .brandu {
            margin-left: 4.5rem;
          }
        }
        @media (max-width: 1440px) {
          .twomenu {
            margin-left: 58rem;
          }
          .podpisinfo {
            margin-left: 0rem;
          }
          .margintop {
            margin-left: 0rem;
          }
          .freebutton {
            margin-left: 13.4rem;
          }
          .ili {
            margin-left: 9rem;
          }
          .downjournal {
            margin-left: 10rem;
          }
          .journal11 {
            width: 15rem;
            margin-top: 5px;
            margin-right: 2px;
          }
        }
        @media (max-width: 1366px) {
          .twomenu {
            margin-left: 55rem;
          }
          .journal11 {
            width: 13.5rem;
          
          }
        }
        
      </style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script type="text/javascript">

          // $.ajax({
          //   url:"http://127.0.0.1:8000/publishsubscriber",
          //   type: "GET",
          //   data: "",
          //   dataType: "JSON",
          //   success: function(data) {
          //     console.log(data)
          //   },
          //   error: function(err) {
          //     console.log(err)
          //   }
          // })

          let obuna = document.getElementById("obuna");
          
          let options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };  
          let d = new Date();

          let datestring = d.toLocaleDateString('uz', options);

        
          let publish_id = obuna.getAttribute("publish_id");
          
          let _token = $('meta[name="csrf-token"]').attr('content');
            obuna.addEventListener("click", (e) => {
              
              $.ajax({
                url:"{{route('home')}}/publishsubscriber",
                type: "POST",
                data: {
                  publish_id: publish_id,
                  date: datestring,
                  _token: _token
                },
                dataType: "JSON",
                success: function({ success, status, error }) {
                  // console.log(message)
                  if (status == 1) {
                    swal("Juda yaxshi", success, "success", {
                        button: "Qaytish",
                    })
                  }
                  else {
                    swal('Afsus', error, 'error', {
                      button: 'Qaytish'
                    })
                }
                  
                },
                error:function(err) {
                  console.log(err)
                }
              })

            })

          

        </script>
</body>
</html>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Search Result</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
</head>
<body>
    <div class="container my-4">
        <div class="row">
            <div class="col-10">
                <div class="card shadow">
                    <div class="card-header">
                        <h3> Sizning maqolangiz </h3>
                    </div>
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
    </div>


<script src="{{ asset('js/ajax.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
<script type="text/javascript">

    // function getDataForSearch(id) {

    //     $.ajax({
    //         url:'http://127.0.0.1:8000/search' + id,
    //         type: 'GET',
    //         dataType: 'JSON',
    //         success: function(data) {
    //             console.log(data)
    //         },
    //         error: function(err) {
    //             console.log(err)
    //         }
    //     })

    // }

    // getDataForSearch(3);

</script>
</body>
</html> -->