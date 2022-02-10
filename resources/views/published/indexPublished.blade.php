<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nashrlar</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
    
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{ route('published.index') }}"><h3>Upress</h3></a>
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
            <a class="nav-link" href="{{ route('published.create') }}">Nashr qilinadigan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('article.create') }}">Maqola qo'shish</a>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div style="width: 86%;display:inline-block;" class="header">
                            <h3>Hamma Nashrlar</h3>
                        </div>
                        <a href="{{ route('publish.create') }}" class="btn btn-primary ml-4">Nashr qo'shish</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nashr nomi</th>
                                    <th>Nashr turi</th>
                                    <th>Nashriyot nomi</th>
                                    <th>Nashr soxasi </th>
                                    <th>Sanasi</th>
                                    <th>Nashr tomi</th>
                                    <th>Nashr raqami</th>
                                    <th>Nashr rasmi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($publishedList as $published)
                                    <tr>
                                        <td> {{ ($loop->index) + 1 }} </td>
                                        <td> {{ $published->publishname }} </td>
                                        <td> {{ $published->typename }} </td>
                                        <td> {{ $published->publishername }} </td>
                                        <td> {{ $published->rubrikaname }} </td>
                                        <td> {{ $published->date }} </td>
                                        <td> {{ $published->tom }} </td>
                                        <td> {{ $published->number }} </td>
                                        <td>
                                            <img src="/public/images/{{ $published->image }}" width="40px" height="40px" alert="Rasm yuq" />
                                        </td>
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