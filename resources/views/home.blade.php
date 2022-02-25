<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>Upress</title>
</head>

<body style="overflow-x: hidden;">

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}" style="color: blue;">uPress</a>  
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
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
            <a href="{{ route('logout') }}" class="nav-link">Chiqish</a>
          </li>
          @endif
          @if (!session()->has('subscriber'))
          <li class="nav-item">
            <a href="{{route('register')}}" class="nav-link">Register</a>
          </li>
          <li class="nav-item">
            <a href="{{route('login')}}" class="nav-link">Login</a>
          </li>
          @endif
        </ul>
        <form class="d-flex" style="margin-left: 10px;">
          @csrf
          <input class="form-control me-2" type="search" placeholder="Kalit so'z" aria-label="Search" id="keyWords">
          <a type="button" id="search_1">
            <img src="{{ asset('img/search-outline.svg') }}" style="width: 30px;height:30px;margin-right:20px;color:green;" alt="" />
          </a>
          <a href="{{ route('search') }}" class="btn btn-outline-success" type="submit">Batafsil</a>
        </form>
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
    <div class="container-fluid px-4">
      <div class="row gx-3 library" id="search">
        @foreach ($homeList as $home)
        <div class="col-2">
          <div class="p-1 border bg-light journal">
            <a href="{{route('home')}}/search/{{$home->publish_id}}">
              <img src="/public/images/{{$home->image}}" alt="" />
            </a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    </div>
  </section>
  <br><br><br>
  <section>
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-md-12">
          <p style="font-weight: 500; font-size: 24px; line-height: 28px;">Sarlavhalar</p>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row align-items-center">
        <div class="col">
          <ul class="list-group">
            <li class="list-group-item border-0"><a href=""><img src="img/Vector.svg" class="" alt="" style="margin-right: 1rem;"><span class="spans">Avtomobillar</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (1).svg" alt="" style="margin-right: 1rem;"><span class="spans">Uy uchun</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (2).svg" alt="" style="margin-right: 1rem;"><span class="spans">San'at</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (3).svg" alt="" style="margin-right: 1rem;"><span class="spans">Moda</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (4).svg" alt="" style="margin-right: 1rem;"><span class="spans">Toza havoda dam olish</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (5).svg" alt="" style="margin-right: 1rem;"><span class="spans">Rasmlar</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (6).svg" alt="" style="margin-right: 1rem;"><span class="spans">O'yinlar</span></a></li>
          </ul>
        </div>
        <div class="col">
          <ul class="list-group">
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (7).svg" alt="" style="margin-right: 1rem;"><span class="spans">Biznes va moliya</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (8).svg" alt="" style="margin-right: 1rem;"><span class="spans">Ayollar uchun</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (9).svg" alt="" style="margin-right: 1rem;"><span class="spans">Kompyuter va texnologiyalar</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (10).svg" alt="" style="margin-right: 1rem;"><span class="spans">Erkaklar uchun</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (11).svg" alt="" style="margin-right: 1rem;"><span class="spans">Sayohat va turizm</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (12).svg" alt="" style="margin-right: 1rem;"><span class="spans">Xobbi</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (13).svg" alt="" style="margin-right: 1rem;"><span class="spans">Yangiliklar</span></a></li>
          </ul>
        </div>
        <div class="col">
          <ul class="list-group">
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (14).svg" alt="" style="margin-right: 1rem;"><span class="spans">Oila va tarbiya</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (15).svg" alt="" style="margin-right: 1rem;"><span class="spans">Hayvonlar haqida</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (16).svg" alt="" style="margin-right: 1rem;"><span class="spans">Pazandachilik</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (17).svg" alt="" style="margin-right: 1rem;"><span class="spans">Musiqa</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (18).svg" alt="" style="margin-right: 1rem;"><span class="spans">Televizor va o'yin-kulgu</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (19).svg" alt="" style="margin-right: 1rem;"><span class="spans">Yaxta va aviatsiya</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (20).svg" alt="" style="margin-right: 1rem;"><span class="spans">Sport</span></a></li>
          </ul>
        </div>
        <div class="col">
          <ul class="list-group">
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (21).svg" alt="" style="margin-right: 1rem;"><span class="spans">Bolalar uchun</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (22).svg" alt="" style="margin-right: 1rem;"><span class="spans">Salomatlik va fitnes</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (23).svg" alt="" style="margin-right: 1rem;"><span class="spans">Mahalliy hayot</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (24).svg" alt="" style="margin-right: 1rem;"><span class="spans">Fan va tarix</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (25).svg" alt="" style="margin-right: 1rem;"><span class="spans">Din va ma'naviyat</span></a></li>
            <li class="list-group-item border-0"><a href=""><img src="img/Vector (26).svg" alt="" style="margin-right: 1rem;"><span class="spans">Dizayn</span></a></li>
            <li class="list-group-item border-0"><img src="" alt=""></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <br><br>
  <hr>

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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script type="text/javascript">

    const search_1 = document.getElementById('search_1');

    function homeSearchResult() {
      search_1.addEventListener("click", () => {
        const keyWords = document.getElementById('keyWords').value;
        let author = "";
        let title = "";
        let rubrikaname = -1;
        let _token = $('meta[name="csrf-token"]').attr('content');
        console.log(keyWords)
        $.ajax({
          url: "http://127.0.0.1:8000/search",
          type: "POST",
          data: {
            author: author,
            title: title,
            rubrikaname: rubrikaname,
            keyWords: keyWords,
            _token: _token
          },
          dataType: "JSON",
          success: function({ searchList, status, message }) {
            let html = "";
            if (status == 1 && keyWords !== '') {
              
              searchList.forEach((search) => {
                html += `
                  <div class="col-2">
                    <div class="p-1 border bg-light journal">
                      <a href="{{route('home')}}/search/${search.publish_id}">
                        <img src="/public/images/${search.image}" alt="" />
                      </a>
                    </div>
                </div>
                  `;
              });
              document.getElementById("search").innerHTML = html;
            }
            else {
              window.location.href = "{{ route('home') }}/search";
            }
            
          },
          error: function(err) {
            console.log(err)
          }
        })
      })
    }

    homeSearchResult();
    
  </script>

</body>

</html>