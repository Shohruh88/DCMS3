<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
    <div class="container my-3">
       <div class="row">
           <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-header text-center text-white bg-primary">
                        <h3>{{ $title }}</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            @csrf
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" >
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" >
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary px-4 py-2" type="button" id="login">Login</button>
                            </div>
                            <p> Ro'yhatdan o'tmadingizmi? <a href="{{route('register')}}">Register</a> </p>
                        </form>
                    </div>
                </div>
           </div>
       </div>
    </div>


<script src="{{ asset('js/ajax.min.js') }}"></script>
<script src="{{asset('js/bootstrap.bundle.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" >

    const login = document.getElementById("login");

    login.addEventListener('click', () => {

        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: "{{ route('home') }}/login",
            type: "POST",
            data: {
                email: email,
                password: password,
                _token: _token
            },
            dataType: "JSON",
            success: function({ success, error, status }) {
                if (status) {
                    swal("Juda yaxshi", success, "success", {
                        button: "Kirish!",
                    })
                    .then(() => {
                        document.location.href = '/profile'
                    })
                }
                else {
                    swal('Afsus', error, 'error')
                    .then(() => {
                        document.location.href = '/login'
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