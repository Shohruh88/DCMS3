<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- CSS only -->
  <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>uPress</title>
</head>

<body style="overflow-x: hidden;">
  <!-- <header>
    <nav class="navbar navbar-expand-sm navbar-light" style="background-color: white;">
      <div class="container-fluid">
        <button class="navbar-toggler mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="row collapse navbar-collapse" id="navbarSupportedContent">
          <div class="col-md-4">
            <ul class="navbar-nav me-auto mt-3 mb-lg-0 justify-content-start" style="margin-left: 2rem;">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{route('home')}}"  ><button type="button" class="btn btn-outline-dark fw-bold" style="font-size: 15px; line-height: 18px; padding: 12px 19px; margin-top: -6.8px;">Kataloglar</button></a>
              </li>
              <li class="nav-item">
                <a href="{{ route('profile') }}" class="nav-link " style="font-size: 20px;">Profile</a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <nav class="navbar navbar-light">
              <div class="container-fluid justify-content-center">
                <span class="navbar-brand mb-0 fw-bold" style="color: #355CE7; font-size: 24px;">uPress</span>
              </div>
            </nav>
          </div>
          <div class="col-md-4">
            <div class="row">
              <ul class="navbar-nav me-auto mt-3 mb-lg-0" style="margin-left: 16.5rem;">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="#"><button type="button" class="btn outline-dark fw-bold" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="border-radius: 50%; line-height: 18px; padding: 12px 19px; margin-top: -6.8px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                      </svg></button>
                  </a>
                </li>
                <li class="nav-item" style="margin-left: -1rem;">
                  <a class="nav-link fw-bold" href="#">
                    <p class="text-uppercase"><button type="button" class="btn outline-dark fw-bold" style="font-size: 15px; line-height: 18px; background-color:#380FDC; color: white; border-radius: 50%; padding: 6px 5px;">SM</button></p>
                  </a>
                </li>
                <li class="nav-item dropdown" style="margin-left: -0.8rem;">
                  <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <button type="button" class="btn outline-dark fw-bold" style="font-size: 15px; line-height: 18px;"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                      </svg></button>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header> -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}" style="color: blue;" >uPress</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active"  href="{{ route('home') }}">Bosh sahifa</a>
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
    <div class="modal-body container">
      <nav class="navbar navbar">
        <div class="container justify-content-center">
          <span class="navbar-brand mb-4" style="color: #355CE7; font-size: 2rem;">Qidirish</span>
        </div>
      </nav>
      <form>
        @csrf
        <div class="row">
          <div class="col-6">
            <div class="input-group mb-3 ">
              <span class="input-group-text" style="background-color: #1a9169; color: aliceblue;" id="basic-addon1">Muallif</span>
              <input type="text" class="form-control" placeholder="Muallif nomi" id="author_1">
            </div>
          </div>
          <div class="col-3">
            <div class="input-group mb-3">
              <label class="input-group-text" style="background-color: #1a9169; color: aliceblue;" for="rubrikaname">Nashr sohasi</label>
              <select class="form-select" id="rubrikaname_1">
                @foreach ($searchList as $search)
                <option value="{{ $search->id }}"> {{ $search->rubrikaname }} </option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" style="background-color: #1a9169; color: aliceblue;" id="basic-addon1">Mavzu</span>
          <input type="text" class="form-control" placeholder="Mavzu..." aria-label="Username" aria-describedby="basic-addon1" id="title_1">
        </div>
        <div class="input-group flex-nowrap">
          <span class="input-group-text" style="background-color: #1a9169; color: aliceblue;" id="addon-wrapping">Kalit so'z</span>
          <input type="text" class="form-control" placeholder="Kalit so'z..." aria-label="Username" aria-describedby="addon-wrapping" id="keyWords">
        </div>
        <div class="row my-3">
          <div class="col-md-4">
            <div class="input-group mb-3">
              <span class="input-group-text" style="background-color: #1a9169; color: aliceblue;">Chop etilgan </span>
              <input type="date" class="form-control" placeholder="Username" aria-label="Username" id="startDate">
              <span class="input-group-text" style="background-color: #1a9169; color: aliceblue;">dan</span>
            </div>
          </div>
          <div class="col-md-4">
            <div class="input-group mb-3">
              <input type="date" class="form-control" placeholder="Server" aria-label="Server" id="endDate">
              <span class="input-group-text" style="background-color: #1a9169; color: aliceblue;">gacha</span>
               <button class="btn" style="background-color: #1a9169; color: aliceblue;margin-left:15px;border-radius:3px;padding-left:15px;padding-right:15px;" id="search" type="button">Qidirish</button>
            </div>
          </div>
        </div>

        
    </div>
    </form>
    </div>
  </section>

  <section>
    <div class="container my-3">
      <div class="row align-items-start" id="cards">
          
      </div>
  </section>

  <br><br>

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script type="text/javascript">
    var search = document.querySelector('#search');
    search.addEventListener('click', () => {
      var author = document.querySelector('#author_1').value;
      var title = document.querySelector('#title_1').value;
      var rubrikaname = document.querySelector('#rubrikaname_1').value;
      var keyWords = document.querySelector('#keyWords').value;
      var startDate = document.querySelector('#startDate').value;
      var endDate = document.querySelector('#endDate').value;
      let _token = $('meta[name="csrf-token"]').attr('content');
      
      $.ajax({
        url: "{{route('home')}}/search", 
        type: 'POST',
        data: {
          author: author,
          title: title,
          rubrikaname: rubrikaname,
          keyWords: keyWords,
          _token: _token
        },
        dataType: "json",
        success: function({searchList, message}) {
          let html = "";
          if (message > 0) {
            // console.log(searchList);
        
          searchList.forEach((post) => {

            console.log(post);
            html += `
              <div class='col-md-2'>
                
              </div>
              <div class='col-md-10'>
                <div class="card my-2 p-3">
                  <span style="color: rgb(119, 117, 117);"><span style='font-weight:550; padding-right:6px;'>Mavzusi: </span> <a href='{{route('home')}}/search/${post.publish_id}' >${post.publishname}</a> </span>
                  <span style="color: rgb(128, 128, 128); font-size: 15px;"><span style='font-weight:550; padding-right:6px;'>Mualliflar: </span> ${post.author}</span><br>
                  <span style="color: rgb(128, 128, 128); font-size: 15px;"><span style='font-weight:550; padding-right:6px;'>Nashriyotchilar: </span> <i>${post.publishername}</i></span><br>
                  <span style="color: rgb(128, 128, 128); font-size: 15px;"><span style='font-weight:550; padding-right:6px;'>Qisqacha ma'lumot: </span> <i>${post.description}</i></span><br>
                  <hr>
                  <span style="color: rgb(128, 128, 128); font-size: 14px;"><span style='font-weight:550; padding-right:6px;'>Sanasi: </span> ${post.date}</span>
                </div>
              </div>
                `;
          });

        }


        else {
            // console.log(message);
            html += `
              <h1>${message}</h1>
            `;
          }

          document.getElementById("cards").innerHTML = html;
    
        },
        error: function(error) {
          console.log(error)
        }
      })

    })
  </script>
</body>

</html>