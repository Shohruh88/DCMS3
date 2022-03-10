<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Maqola qo'shish</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha256-IdfIcUlaMBNtk4Hjt0Y6WMMZyMU0P9PN/pH+DFzKxbI=" crossorigin="anonymous" /> -->

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
                        <a href="{{ route('select.index') }}" class="btn btn-primary ml-4">Orqaga</a>
                    </div>
                    <div class="card-body">
                        <form>
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <label for="publishername">Nashriyotni tanlang</label>
                                    <input type="text" class="form-control" id="publishername">
                                </div>
                                <div class="col-md-5">
                                    <label for="publishname">Nashrni tanlang</label>
                                    <input type="text" class="form-control" id="publishedname">
                                </div>
                                <div class="col-md-2">
                                    <a>
                                        <input type="button" class="btn btn-primary" style="margin-top: 35px;" id="tanlash" value="Tanlash">
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->

    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
    <script src="{{ asset('js/ajax.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script> -->

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>


    <script type="text/javascript">

        var path = "{{ route('publisher.select') }}";
        let _token = $('meta[name="csrf-token"]').attr('content');
        let tanlash = document.getElementById("tanlash");
        $(document).ready(function() {

            $("#publishername").autocomplete({

                source: function(request, response) {
                    console.log(request)
                    console.log(response)
                    $.ajax({

                        url: path,

                        type: 'post',

                        dataType: "json",

                        data: {

                            _token: _token,

                            publishername: request.term

                        },

                        success: function({
                            publisherList
                        }) {

                            response($.map(publisherList, function(obj, key) {

                                return {
                                    label: obj.publishername,
                                    id: obj.id // Value
                                }

                            }));
                        },

                    });

                },

                select: function(event, ui) {
                    // console.log(ui.item.id);
                    publisher_id = ui.item.id;

                    $("#publishedname").autocomplete({
                        source: function(request, response) {
                            $.ajax({
                                url: "{{ route('published.select') }}",
                                type: 'POST',
                                data: {
                                    publisher_id: ui.item.id,
                                    publishedname: request.term,
                                    _token: _token
                                },
                                dataType: 'JSON',
                                success: function({
                                    publishedList
                                }) {
                                    // console.log(data)
                                    response($.map(publishedList, function(obj, key) {

                                        return {
                                            label: obj.publishname,
                                            id: obj.id // Value
                                        }

                                    }));

                                },
                                error: function(err) {
                                    console.log(err)
                                }
                            })
                        },
                        select: function(event, ui) {
                            published_id = ui.item.id;

                            tanlash.addEventListener('click', () => {
                                $.ajax({
                                    url: "{{ route('article.select') }}",
                                    type: 'POST',
                                    data: {
                                        published_id: published_id,
                                        _token: _token
                                    },
                                    dataType: "JSON",
                                    success: function({ status }) {
                                        // console.log(data)
                                        if (status == 1) {
                                            window.location.href = '/admin/article/create'
                                        } 
                                    },
                                    error: function(err) {
                                        console.log(err)
                                    }
                                })
                            })
                        }
                    })
                }


            });


        });
    </script>


</body>

</html>