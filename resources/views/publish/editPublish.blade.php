<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Creator </title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
    
</head>
<body>
    <div class="container my-4">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="header" style="width: 80%; display:inline-block;">
                            <h3>Update Creator</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('creator.update', ['creator' => $creator->id]) }}" method="post" >
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <input type="text" class="form-control" name="firstname" id="firstname" value="{{ $creator->firstname }}" >
                            </div>
                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <input type="text" class="form-control" name="lastname" id="lastname" value="{{ $creator->lastname }}" >
                            </div>
                            <div class="form-group">
                                <label for="description">Desription</label>
                                <textarea name="description" id="description" class="form-control" cols="30" rows="10"  >{{ $creator->description }}</textarea>
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

<script>

</script>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>z
</body>
</html>