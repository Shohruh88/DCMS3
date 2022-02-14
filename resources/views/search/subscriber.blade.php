<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>uPress</title>
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
          <li class="nav-item">
            <a href="{{ route('search') }}" class="nav-link">Qidirish</a>
          </li>
          @endif
        </ul>
        <form class="d-flex" style="margin-left: 10px;">
          @csrf
          <input class="form-control me-2" type="search" placeholder="Kalit so'z" aria-label="Search" id="keyWords_1">
          <a type="button" href="{{ route('search') }}" id="search_1">
            <img src="{{ asset('img/search-outline.svg') }}" style="width: 30px;height:30px;margin-right:20px;color:green;" alt="" />
          </a>
          <a href="{{ route('search') }}" class="btn btn-outline-success" type="submit">Batafsil</a>
        </form>
      </div>
    </div>
  </nav>


  <section>
    <div class="container" style=" width: 980px; margin-top: 53px;">

      <div class="container" style="width: 980px;">
        <p class="uzapis">Mening obunalarim</p>
        <hr style="border: 1px solid rgb(0, 0, 0); ">
        @foreach ($subscriberList as $subscriber)
        <div class="row align-items-center py-2">
          <div class="col d-flex">
            <div><span class="personinfo"><img src="/public/images/{{$subscriber->image }}" style="width: 100px; height: 130px; margin-right: 8px;" alt=""></span></div>
            <div style="margin-top: 10px;">
              <table>
                <tbody>
                  <tr>
                    <td class="tmodel">Nashriyotchi:{{ $subscriber->publishername }}</td>
                  </tr>
                  <tr>
                    <td class="tmodel">Mavzu:{{ $subscriber->publishname }}</td>
                  </tr>
                  <tr>
                    <td class="tmodel"> Nashr soni:{{ $subscriber->number }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="col text-center d-flex">
            <div><a type="button" class="btn btn-danger px-4 py-1" style="font-size: 18px;" id="subscriber" publish_id="{{ $subscriber->publish_id }}">Bekor qilish</a></div>
          </div>
        </div>
        <hr style="margin-top: -4px; border: 1px solid black;">
        @endforeach
      </div>

    </div>
  </section>
  <br><br>

  <!-- JavaScript Bundle with Popper -->
  <script src="{{ asset('js/ajax.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{ asset('script/search.js') }}"></script>
  <script type="text/javascript">
    let subscriber = document.getElementById("subscriber");
    let publish_id = subscriber.getAttribute("publish_id");

    let _token = $('meta[name="csrf-token"]').attr('content');

    subscriber.addEventListener('click', () => {
      $.ajax({
        url: "http://127.0.0.1:8000/profile/subscribers",
        type: "POST",
        data: {
          publish_id: publish_id,
          _token: _token
        },
        dataType: "JSON",
        success: function({
          success,
          error,
          status
        }) {
          if (status == 1) {
            swal("Juda yaxshi", success, "success", {
                button: "Qaytish",
              })
              .then(() => {
                window.location = "{{ route('home') }}/profile/subscribers";
              })
          } else {
            swal('Afsus', error, 'error', {
              button: 'Qaytish'
            })
          }
        },
        error: function(err) {
          console.log(err)
        }
      })
    })
  </script>
</body>

</html>