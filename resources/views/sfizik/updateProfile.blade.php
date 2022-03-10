<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    
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
        <!-- <form class="d-flex" style="margin-left: 10px;">
        @csrf
          <input class="form-control me-2" type="search" placeholder="Kalit so'z" aria-label="Search" id="keyWords_1">
          <a type="button" id="search_1" >
            <img src="{{ asset('img/search-outline.svg') }}" style="width: 30px;height:30px;margin-right:20px;color:green;" alt="" />
          </a>
          <a href="{{ route('search') }}" class="btn btn-outline-success" type="submit">Batafsil</a>
        </form> -->
      </div>
    </div>
  </nav>
    <div class="container my-3">
       <div class="row">
           <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-header text-center bg-primary text-white">
                        <h3>{{ $title }}</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            @csrf
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Ismingiz:</label>
                                <input type="text" class="form-control" id="firstname" value="{{ $editProfile[0]->firstname }}">
                            </div>
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Familiyangiz:</label>
                                <input type="text" class="form-control" id="lastname" value="{{ $editProfile[0]->lastname }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" value="{{ $editProfile[0]->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Parolingiz:</label>
                                <input type="text" class="form-control" id="password" >
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="mb-3">
                                  <button class="btn btn-primary px-4 py-2" id="updateProfile" user_id = "{{ $editProfile[0]->user_id }}" type="button">O'zgartirish</button>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="mb-3">
                                 <a href="{{ route('profile') }}">
                                    <button class="btn btn-secondary px-4 py-2" type="button">Orqaga</button>
                                 </a>
                                </div>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
           </div>
       </div>
    </div>

<script src="{{ asset('js/ajax.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">

    const updateProfile = document.getElementById("updateProfile");
    let user_id = updateProfile.getAttribute('user_id');

    updateProfile.addEventListener('click', () => {
      const firstname = document.getElementById('firstname').value;    
      const lastname = document.getElementById('lastname').value;
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
      const _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            
            url: "{{ route('profile') }}/update/" + user_id,
            type: 'PUT',
            data: {
                firstname: firstname,
                lastname: lastname,
                email: email,
                password: password,
                _token: _token
            },
            dataType: "JSON",
            success: function({ status }) {
              if (status == 1) {
                window.location.href = "/profile";
              } 
            },
            error: function(err) {
                console.log(err)    
            }
        })
    });

</script>
</body>
</html>