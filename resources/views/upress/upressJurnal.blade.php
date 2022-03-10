<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>Jurnallar</title>
</head>

<body style="overflow-x: hidden;">

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid mx-3">
      <a class="navbar-brand" href="{{ route('home') }}" style="color: blue;">uPress</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('home') }}">Bosh sahifa</a>
          </li>
          @if (session()->has('user'))
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
          @if (!session()->has('user'))
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
          <input class="form-control me-2" type="search" placeholder="Kalit so'z" aria-label="Search" id="keyWords_1">
          <a type="button" id="search_1">
            <img src="{{ asset('img/search-outline.svg') }}" style="width: 30px;height:30px;margin-right:20px;color:green;" alt="" />
          </a>
          <a href="{{ route('search') }}" class="btn btn-outline-success" type="submit">Batafsil</a>
        </form>
      </div>
    </div>
  </nav>
  <br>
  <section>
    <div class="container-fluid mt-3">
      <div class="row">
      <div class="col">
          <p style="font-weight: 500; font-size: 24px; line-height: 28px;margin-bottom:20px;margin-left: 12px;">Jurnallar</p>
        </div>
      </div>
    </div>
    <div class="container-fluid px-4">
      <div class="row gx-3 library" id="search">
        @foreach ($jurnalList as $jurnal)
        <div class="col-2">
          <div class="p-1 border bg-light journal">
            <a href="{{route('home')}}/search/{{$jurnal->id}}">
              <img src="/public/images/{{$jurnal->image}}" alt="" />
            </a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    </div>
  </section>
  <br>
  <br>
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
  <!-- <script type="text/javascript">
    const search_1 = document.getElementById('search_1');


    search_1.addEventListener("click", () => {
      const keyWords_1 = document.getElementById('keyWords_1').value;
      let _token = $('meta[name="csrf-token"]').attr('content');
      console.log(keyWords_1)
      $.ajax({
        url: "http://127.0.0.1:8000/searchKey",
        type: "POST",
        data: {
          keyWords_1: keyWords_1,
          _token: _token
        },
        dataType: "JSON",
        success: function({
          searchKey,
          status, 
          error
        }) {
          let html = "";
          if (status == 1 && keyWords_1 !== '') {
            // window.location = 'http://127.0.0.1:8000/search';
            searchKey.forEach((search) => {
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
          else if (status == 0) {
            // alert(error);
            document.getElementById('search').innerHTML = error;
          }
          else {
            window.location = "{{ route('home') }}/search";
          }
          
        },
        error: function(err) {
          console.log(err)
        }
      })
    })
  </script> -->

</body>

</html>