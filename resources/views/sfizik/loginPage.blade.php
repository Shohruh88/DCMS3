@include('layouts.head')

<body>

  <div class="container mt-5">
    <div class="row">
      <div class="col-6 offset-3">
        <div class="card">
          <div class="card-header text-center text-white bg-primary">
            <h3>{{ __('lang.kirish') }}</h3>
          </div>
          <div class="card-body">
            <form>
              <div class="alert alert-danger text-center" style="display: none;" id="errorLogin"></div>

              @csrf
              <div class="mb-3">
                <label for="email" class="form-label" style="font-weight: 600;">{{ __('lang.email') }}</label>
                <input type="email" class="form-control" id="email">
                <small id="errorEmail"></small>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label" style="font-weight: 600;">{{ __('lang.parolingiz') }}</label>
                <input type="password" class="form-control" id="password">
                <small id="errorPassword"></small>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary px-4 py-2" type="button" id="login">{{ __('lang.kirish') }}</button>
              </div>
              <p> {{ __('lang.ruyhatdan_utmadingizmi') }} <a href="{{route('register')}}">{{ __('lang.ruyhatdan_utish') }}</a> </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="{{ asset('js/ajax.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="{{ asset('js/validation.js') }}"></script>
  <script type="text/javascript">
    const login = document.getElementById("login");

    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const errorEmail = document.getElementById('errorEmail');
    const errorPassword = document.getElementById('errorPassword');
    const errorLogin = document.getElementById('errorLogin');

    const _token = $('meta[name="csrf-token"]').attr('content');

    login.addEventListener('click', () => {

      if (email.value == '' || password.value == '') {
        const checkLogin = new CheckForm();
        checkLogin.checkLogin(email.value, password.value, errorEmail, errorPassword);
      } else {
        $.ajax({
          url: "/login",
          type: "POST",
          data: {
            email: email.value,
            password: password.value,
            _token: _token
          },
          dataType: "JSON",
          success: function({
            status
          }) {
            if (status == 1) {
              window.location.href = '/profile'
            }

            if (status == 0) {
              errorLogin.innerHTML = 'Login yoki parol xato';
              errorLogin.style.display = 'block';
            }
          },
          error: function(err) {
            console.log(err)
          }
        })
      }



    })
  </script>
</body>

</html>