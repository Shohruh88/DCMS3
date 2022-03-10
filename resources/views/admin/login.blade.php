<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Admin Kirish</title>
    <!-- <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container" style="margin-top: 120px;">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-header text-center text-white bg-primary">
                        <h4>Admin Kirish</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="alert alert-danger text-center" style="display: none;" id="error"></div>
                            @csrf
                            <div class="mb-3">
                                <label for="login" class="form-label" style="font-weight: 600;">Login</label>
                                <input type="text" class="form-control" id="login">
                                <small id="errorLogin"></small>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label" style="font-weight: 600;">Parol</label>
                                <input type="password" class="form-control" id="password">
                                <small id="errorPassword"></small>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary px-4 py-2" type="button" id="kirish">Kirish</button>
                            </div>
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
        const kirish = document.getElementById("kirish");

        const login = document.getElementById('login');
        const password = document.getElementById('password');
        const errorLogin = document.getElementById('errorLogin');
        const errorPassword = document.getElementById('errorPassword');
        const error = document.getElementById('error');

        const _token = $('meta[name="csrf-token"]').attr('content');

        kirish.addEventListener('click', () => {

            if (login.value == '' || password.value == '') {
                const checkLogin = new CheckForm();
                checkLogin.checkLogin(login.value, password.value, errorLogin, errorPassword);
            } else {
                $.ajax({
                    url: "/admin/login",
                    type: "POST",
                    data: {
                        login: login.value,
                        password: password.value,
                        _token: _token
                    },
                    dataType: "JSON",
                    success: function({
                        status
                    }) {
                        if (status == 1) {
                            window.location.href = '/admin'
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