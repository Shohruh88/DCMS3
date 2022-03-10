@include('layouts.head')

<body>

  <div class="container mt-5">
    <div class="row">
      <div class="col-6 offset-3">
        <div class="card">
          <div class="card-header text-center bg-primary text-white">
            <h3>{{ __('lang.ruyhatdan_utish') }}</h3>
          </div>
          <div class="card-body">
            <form>
              @csrf
              <div class="mb-3">
                <label for="firstname" class="form-label">{{ __('lang.ismingiz') }}</label>
                <input type="text" class="form-control" id="firstname">
                <small id="errorFirstname"></small>
              </div>
              <div class="mb-3">
                <label for="lastname" class="form-label">{{ __('lang.familiyangiz') }}</label>
                <input type="text" class="form-control" id="lastname">
                <small id="errorLastname"></small>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">{{ __('lang.email') }}</label>
                <input type="email" class="form-control" id="email">
                <small id="errorEmail"></small>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">{{ __('lang.parolingiz') }}</label>
                <input type="text" class="form-control" id="password">
                <small id="errorPassword"></small>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary px-4 py-2" id="register" type="button">{{ __('lang.ruyhatdan_utish') }}</button>
              </div>
              <p> {{ __('lang.ruyhatdan_utdingizmi') }} <a href="{{route('login')}}">{{ __('lang.kirish') }}</a> </p>
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
    const register = document.getElementById("register");
    const firstname = document.getElementById('firstname');
    const lastname = document.getElementById('lastname');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const errorFirstname = document.getElementById("errorFirstname");
    const errorLastname = document.getElementById("errorLastname");
    const errorEmail = document.getElementById("errorEmail");
    const errorPassword = document.getElementById("errorPassword");

    const _token = $('meta[name="csrf-token"]').attr('content');



    register.addEventListener('click', () => {

      if (firstname.value == '' || lastname.value == '' || email.value == '' || password.value == '') {
        const checkRegister = new CheckForm();
        checkRegister.checkRegister(firstname.value, lastname.value, email.value, password.value, errorFirstname, errorLastname, errorEmail, errorPassword);

      } else {

        $.ajax({

          url: "/register",
          type: 'POST',
          data: {
            firstname: firstname.value,
            lastname: lastname.value,
            email: email.value,
            password: password.value,
            _token: _token
          },
          dataType: "JSON",
          success: function({
            status
          }) {
            if (status == 1) {
              window.location.href = '/login'
            }
          },
          error: function(err) {
            console.log(err)
          }
        })

      }
    });
  </script>
</body>

</html>