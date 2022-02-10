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
                    <div class="card-header text-center bg-primary text-white">
                        <h3>{{ $title }}</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            @csrf
                            <div class="form-group">
                                <label for="firstname">Ismingiz:</label>
                                <input type="text" class="form-control" id="firstname" >
                            </div>
                            <div class="form-group">
                                <label for="lastname">Familiyangiz:</label>
                                <input type="text" class="form-control" id="lastname" >
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" >
                            </div>
                            <div class="form-group">
                                <label for="password">Parolingiz:</label>
                                <input type="text" class="form-control" id="password" >
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary px-4 py-2" id="register" type="button">Ro'yhatdan o'tish</button>
                            </div>
                            <p> Ro'yhatdan o'tdingizmi? <a href="{{route('login')}}">Login</a> </p>
                        </form>
                    </div>
                </div>
           </div>
       </div>
    </div>

<script src="{{ asset('js/ajax.min.js') }}"></script>
<script src="{{asset('js/bootstrap.bundle.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('script/ajax.js') }}" type="text/javascript"></script>
</body>
</html>