<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>uPress</title>
</head>
<body>
    <header style="border-bottom: 1px solid rgba(219, 218, 218, 0.6);">
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
                    <button type="button" class="btn btn-outline-dark fw-bold">КАТАЛОГ</button>
                    <button type="button" class="btn outline-dark fw-bold">ДЛЯ ВАС</button>
                    <button type="button" class="btn outline-dark">
                      <div class="dropdown">
                          <a class="btn dropdown-toggle fw-bold" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            ЕЩЁ
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                          </ul>
                      </div>
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
                          <button type="button" class="btn btn-success rounded-circle p-2 fw-bold" style="color: white; background: #380FDC;">Upress</button>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link toggle " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="img/three-dots-vertical.svg" width="25px" alt="">
                          </a>
                          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Chiqish</a></li>
                            <li><a class="dropdown-item" href="{{ route('search') }}">Qidirish</a></li>
                            
                          </ul>
                        </li>
                      </ul>
                    </div>
                  </div>
                </nav>
            </div>
          </div>
        </div>
      </header>
    
      <section>
        <div class="container-fluid podmenu">
          <div class="d-flex justify-content-center" style="margin-top: 27.5px;">
            <div class="px-2"><a href="{{ route('profile') }}" class="podmenuword ">PROFILE</a></div>
            <div class="px-2"><a href="{{ route('profile.subscribers') }}" class="podmenuword borderbot">OBUNALAR</a></div>
          </div>
        </div>
      </section>

      <section>
          <div class="container" style=" width: 980px; margin-top: 53px;">               
          
           <div class="container" style="width: 980px; margin-top: 100px;">
                <p class="uzapis">Mening obunalarim</p><hr style="border: 1px solid rgb(0, 0, 0); ">
                @foreach ($subscriberList as $subscriber) 
                <div class="row align-items-center py-2">
                    <div class="col d-flex">
                        <div><span class="personinfo"><img src="/public/images/{{$subscriber->image }}" style="width: 100px; height: 130px; margin-right: 8px;" alt=""></span></div>
                        <div style="margin-top: 40px;">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="tmodel">Nashriyotchi:{{ $subscriber->publishername }}</td>
                                    </tr>
                                </tbody>       
                            </table>
                        </div>
                    </div>
                 
                    <div class="col text-center d-flex">
                        <div><button type="button" class="btn btn-danger px-4 py-1" style="font-size: 18px;">Bekor qilish</button></div>
                    </div>
                </div><hr style="margin-top: -4px; border: 1px solid black;">
                @endforeach
            </div> 
           
          </div>    
      </section>
<br><br>
        
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>