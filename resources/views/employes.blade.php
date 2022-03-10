<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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
<section>
    <div class="container">
        <h3>Admin Panel</h3>
        <h5><a href="{{ route('admin.logout') }}">Chiqish</a></h5>
    </div>
</section>

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
</body>
</html>