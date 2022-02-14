<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nashr mavzulari</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{route('published.index')}}"><h3>uPress</h3></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('published.index') }}">Nashrlar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('publisher.create') }}">Nashriyot qo'shish</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('publisher.index') }}">Nashriyotlar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('rubrika.index') }}">Nashr mavzulari</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('published.create') }}">Nashr qilinadigan</a>
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
    <div class="my-4 mx-2">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-header">
                        <div style="display:inline-block;width:68%;" class="header">
                            <h3>Nashr mavzulari(Rubrika)</h3>
                        </div>
                        <a href="{{ route('rubrika.create') }}" class="btn btn-primary ml-4">Nashr mavzusi qo'shish</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nashr mavzusi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rubrikaList as $rubrika)
                                    <tr>
                                        <td> {{ ($loop->index) + 1 }} </td>
                                        <td> {{ $rubrika->rubrikaname }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
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