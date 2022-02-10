<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Subsciber Fizik </title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
    
</head>
<body>
    <div class="container my-4">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="header" style="width: 80%; display:inline-block;">
                            <h3>Update Subscriber Fizik</h3>
                        </div>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('subscriberfizik.update') }}" method="post" >
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <input type="text" class="form-control" name="firstname" id="firstname" value="{{ $subscriber->firstname }}" >
                            </div>
                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <input type="text" class="form-control" name="lastname" id="lastname" value="{{ $subscriber->lastname }}" >
                            </div>
                            <div class="form-group">
                                <label for="middlename">Middlename</label>
                                <input type="text" class="form-control" name="middlename" id="middlename" value="{{ $subscriber->middlename }}" >
                            </div>
                            <div class="form-group">
                                <label for="tel">Tel Number</label>
                                <input type="tel" name="tel" id="tel" class="form-control" value="{{ $subscriber->tel }}" >
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email" value="{{ $subscriber->email }}" >
                            </div>
                            <div class="form-group">
                                <label for="user_id">User ID</label>
                                <input type="text" class="form-control" name="user_id" id="user_id" value="{{ $subscriber->user_id }}" >
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Add Creator" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>