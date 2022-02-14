<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yangi nashr qo'shish</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
    
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{route('published.index')}}"><h3>Upress</h3></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{route('published.index')}}">Nashrlar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('publisher.create')}}">Nashriyot qo'shish</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('publisher.index') }}">Nashriyotlar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('rubrika.index') }}">Nashr mavzulari</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('published.create')}}">Nashr qilinadigan</a>
        </li> 
        <li class="nav-item">
            <a class="nav-link" href="{{route('article.create')}}">Maqola qo'shish</a>
        </li> 
        <li class="nav-item">
            <a class="nav-link" href="{{ route('article.index') }}">Maqolalar</a>
        </li>
        </ul>
    </div>
  </div>
</nav>

    <div class="container my-4">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="header" style="width: 80%; display:inline-block;">
                            <h3>Yangi Nashr Qo'shish</h3>
                        </div>
                        <a href="{{ route('published.index') }}" class="btn btn-primary ml-4">Orqaga</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('publish.store') }}" method="post" >
                            @csrf
                            <div class="form-group">
                                <label for="publishname">Nashr nomi</label>
                                <input type="text" class="form-control" name="publishname" id="publishname" >
                            </div>
                            <div class="form-group">
                                <label for="publishtype">Nashr turi</label>
                                <select name="publishtype" id="publishtype" class="select custom-select">
                                    @foreach ($typeList as $type)
                                        <option value="{{$type->id}}">{{ $type->typename }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="publishername">Nashriyot nomi</label>
                                <select name="publishername" id="publishername" class="select custom-select">
                                   @foreach ($publisherList as $publisher)
                                        <option value="{{$publisher->id}}">{{ $publisher->publishername }}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="rubrikaname">Nashr mavzusi</label>
                                <select name="rubrikaname" id="rubrikaname" class="select custom-select">
                                @foreach ($rubrikaList as $rubrika)
                                        <option value="{{$rubrika->id}}">{{ $rubrika->rubrikaname }}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Nashr Qo'shish " class="btn btn-primary">
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