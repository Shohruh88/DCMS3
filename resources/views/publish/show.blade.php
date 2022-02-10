<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Creator </title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
    
</head>
<body>
    <div class="container my-4">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="card">
                    <div class="card-header">
                        <div style="width: 80%;display:inline-block;" class="header">
                            <h3>All Creators</h3>
                        </div>
                        <a href="{{ route('creator.index') }}" class="btn btn-primary ml-4">Back</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                                <tr>
                                    <td>ID</td>
                                    <td> {{ $creator->id }} </td>
                                </tr>
                                <tr>
                                    <td> Firstname </td>
                                    <td> {{ $creator->firstname }} </td>
                                </tr>
                                <tr>
                                    <td> Lastname </td>
                                    <td> {{ $creator->lastname }} </td>
                                </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>