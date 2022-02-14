<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Profile</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}" style="color: blue;" >uPress</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link"  href="{{ route('home') }}">Bosh sahifa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('profile') }}">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.subscribers') }}">Obunalarim</a>
          </li>
          <li class="nav-item">
              <a href="{{ route('search') }}" class="nav-link">Qidirish</a>
            </li>
          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link">Chiqish</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <!-- <header style="border-bottom: 1px solid rgba(219, 218, 218, 0.6);">
      <div class="container-fluid">
        <div class="row align-items-start">
          <div class="col navbarmenu">
            <p>
              <button class="btn outline-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample" style="margin-top: 13px;">
                  <img class="listimg" src="img/list.svg" alt="">
              </button>  
            </p>
            <div style="min-height: 120px;">
              <div class="collapse collapse-horizontal" id="collapseWidthExample">
                <div class="card card-body" style="width: 230px;">
                  <button type="button" class="btn btn-outline-dark fw-bold">Kataloglar</button>
                  <button type="button" class="btn outline-dark">
                  </button>
                </div>  
              </div>
            </div>
          </div>
          <div class="col navbarmenu text-center align-middle">
            <div class="mt-3">
              <a href=""><span class="prname fw-bold">uPress</span></a>
            </div>
          </div>
          <div class="col d-flex navbarmenu justify-content-end">
              <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid" style="margin-top: -12px;">
                  <button class="navbar-toggler" style="margin-top: -10px;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <button type="button" class="btn btn-success rounded-circle p-2 fw-bold" style="color: white; background: #380FDC;">SM</button>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link toggle " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="img/three-dots-vertical.svg" width="25px" alt="">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                          <li><a class="dropdown-item" href="{{route('logout')}}">Chiqish</a></li>
                          <li><a class="dropdown-item" href="{{route('search')}}">Qidirish</a></li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
          </div>
        </div>
      </div>
    </header> -->

  <!-- <section>
    <div class="container-fluid podmenu">
      <div class="d-flex justify-content-center" style="margin-top: 27.5px;">
        <div class="px-2"><a href="{{route('profile')}}" class="podmenuword borderbot">PROFILE</a></div>
        <div class="px-2"><a href="{{ route('profile.subscribers') }}" class="podmenuword">OBUNALAR</a></div>
      </div>
    </div>
  </section> -->

<section>
  <div class="container" style="width: 980px; margin-top: 30px;">
    <p class="uzapis">Profile boshqaruvi</p><hr style="border: 1px solid rgb(0, 0, 0); ">
    <div class="row align-items-center">
      <div class="col">
        <span class="personinfo">Profile egasi</span>
      </div>
      <div class="col">
        <span class="personinfo1">{{$profileList[0]->firstname}} &nbsp;{{ $profileList[0]->lastname }} </span> 
      </div>
      <div class="col text-center">
        <a href="" style="font-size: 15px;">Tahrirlash</a>
      </div>
    </div><hr>
    <div class="row align-items-center">
      <div class="col">
        <span class="personinfo">Elektron Pochta</span>
      </div>
      <div class="col">
        <span class="personinfo1">{{ $profileList[0]->email }}</span> 
      </div>
      <div class="col text-center">
        <a href="" style="font-size: 15px;">Tahrirlash</a>
      </div>
    </div><hr>

  </div>
</section>

<!-- <section>
  <div class="container" style="width: 980px; margin-top: 100px;">
    <p class="uzapis">Социальные сети</p><hr style="border: 1px solid rgb(0, 0, 0); ">
    <div class="row align-items-center">
      <div class="col">
        <span><img src="img/Ellipse 9.svg" width="35px" style="margin-right: 19px;" alt=""></span>
        <span class="personinfo">Facebook</span>
      </div>
      <div class="col">
        <span class="personinfo1">Sevara Matkarimova</span> 
      </div>
      <div class="col text-center">
        <a href="" style="font-size: 15px;">Связать</a>
      </div>
    </div><hr>
    <div class="row align-items-center">
      <div class="col">
        <span><img src="img/Ellipse 11.svg" width="35px" style="margin-right: 19px;" alt=""></span>
        <span class="personinfo">Twitter</span>
      </div>
      <div class="col">
        <span class="personinfo1"></span> 
      </div>
      <div class="col text-center">
        <a href="" style="font-size: 15px;">Связать</a>
      </div>
    </div><hr>
    <div class="row align-items-center">
      <div class="col">
        <span><img src="img/Ellipse 26.svg" width="35px" style="margin-right: 19px;" alt=""></span>
        <span class="personinfo">Google</span>
      </div>
      <div class="col">
        <span class="personinfo1">matkarimova@gmail.com</span>
      </div>
      <div class="col text-center">
        <a href="" style="font-size: 15px;">Изменить</a>
      </div>
    </div><hr>
    <div class="row align-items-center">
      <div class="col">
        <span><img src="img/Ellipse 27.svg" width="35px" style="margin-right: 19px;" alt=""></span>
        <span class="personinfo">Библиотека или группа</span>
      </div>
      <div class="col">
        <span class="personinfo1"></span>
      </div>
      <div class="col text-center">
        <a href="" style="font-size: 15px;">Связать</a>
      </div>
    </div><hr>
    <div class="row align-items-center">
      
      <div class="col mt-4">
        <a href="" style="font-size: 15px;">Другие сервисы</a>
      </div>
    </div><hr>
  </div>
</section> -->

<!-- <section>
  <div class="container" style="width: 980px; margin-top: 100px;">
    <p class="uzapis">Авторизованные устройства</p><hr style="border: 1px solid rgb(0, 0, 0); ">
    <div class="row align-items-center">
      <div class="col">
        <span class="personinfo">SM-J610FN</span>
      </div>
      <div class="col">
        <span class="personinfo1">6.4.211129</span> 
      </div>
      <div class="col text-center">
        <a href="" style="font-size: 15px;">Изменить</a>
      </div>
    </div><hr>
  </div>
</section> -->

<!-- <section>
  <div class="container" style="width: 980px; margin-top: 100px;">
    <p class="uzapis">Account management</p><hr style="border: 1px solid rgb(0, 0, 0); ">
    <div class="row align-items-center">
      <div class="col">
        <a href="" style="font-size: 15px;">Delete account</a>
      </div>
    </div><hr>
  </div>
</section>
<br><br> -->



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>