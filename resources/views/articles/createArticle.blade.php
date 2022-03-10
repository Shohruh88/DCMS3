<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maqola qo'shish</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <style>
        label {
            font-size: 18px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{route('published.index')}}">
                <h3>Upress</h3>
            </a>
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
                        <div class="header" style="width: 86%; display:inline-block;">
                            <h3>Maqola Qo'shish</h3>
                        </div>
                        <a href="{{ route('article.logout') }}" class="btn btn-primary ml-4">Orqaga</a>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('article.store') }}" method="post">
                            @csrf
                            <div class="article mb-3">
                                <strong>Tanlangan nashriyot</strong>:&nbsp;&nbsp;<span id="publisher">{{ $article->publishername }}</span> &nbsp;&nbsp;|&nbsp;&nbsp;
                                <strong>Tanlangan nashr</strong>:&nbsp;&nbsp;<span id="published">{{ $article->publishname }}</span>
                                <input type="hidden" name="publishedname"  value="{{ $article->id }}">
                            </div>
                            <div class="form-group">
                                <label for="title">Maqola mavzusi</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>
                            <div class="form-group">
                                <label for="author">Mualliflar</label>
                                <textarea name="author" id="author" cols="10" rows="2" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="description">Maqolangiz mazmuni</label>
                                <textarea name="description" id="description" cols="10" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="form-group" style="width: 50%;">
                                <div class="row">
                                    <div class="col-4 text-right">
                                        <label for="author_count">Mualliflar soni</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" name="author_count" id="author_count">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="width: 50%;">
                                <div class="row">
                                    <div class="col-4 text-right">
                                        <label for="page_count">Sahifalar soni</label>
                                    </div>
                                    <div class="col-8">
                                        <input type="text" class="form-control" name="page_count" id="page_count">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Maqola Qo'shish" class="btn btn-primary">
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