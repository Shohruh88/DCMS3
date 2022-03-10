<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>Upress</title>
</head> -->
@include('layouts.head')

<body style="overflow-x: hidden;">

  @include('layouts.navbar')

  <section>
    <div class="container-fluid mt-3 px-4" style="width: 100%; height: 200px;">
      <div class="row">
        <div class="col-md-12" style="width: 100%;height: 200px;">
          <img src="/img/upress.jpg" alt="asdasda" style="width: 100%;height: 100%;">
        </div>

      </div>
    </div>

  </section>

  <section>
    <div class="container-fluid mt-2">
      <div class="row">
        <div class="col">
          <p style="font-weight: 500; font-size: 24px; line-height: 28px;margin-bottom:20px;">{{ __('lang.jurnallar') }}</p>
        </div>
      </div>
    </div>
    <div class="container-fluid px-4">
      <div class="row gx-3 library" id="search">
        @foreach ($jurnalList as $jurnal)
        <div class="col-2">
          <div class="p-1 border bg-light journal">
            <a href="{{route('home')}}/search/{{$jurnal->id}}">
              <img src="/public/images/{{$jurnal->image}}" alt="" />
            </a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    </div>
  </section>
  <br>
  <section>
    <div class="container-fluid mt-2">
      <div class="row">
        <div class="col">
          <p style="font-weight: 500; font-size: 24px; line-height: 28px;margin-bottom:20px;">{{ __('lang.gazetalar') }}</p>
        </div>
      </div>
    </div>
    <div class="container-fluid px-4">
      <div class="row gx-3 library" id="search">
        @foreach ($gazetaList as $gazeta)
        <div class="col-2">
          <div class="p-1 border bg-light journal">
            <a href="{{route('home')}}/search/{{$gazeta->id}}">
              <img src="/public/images/{{$gazeta->image}}" alt="" />
            </a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    </div>
  </section>
  <br>
  <section>
    <div class="container-fluid mt-2">
      <div class="row">
        <div class="col">
          <p style="font-weight: 500; font-size: 24px; line-height: 28px;margin-bottom:20px;">{{ __('lang.kitoblar') }}</p>
        </div>
      </div>
    </div>
    <div class="container-fluid px-4">
      <div class="row gx-3 library" id="search">
        @foreach ($kitobList as $kitob)
        <div class="col-2">
          <div class="p-1 border bg-light journal">
            <a href="{{route('home')}}/search/{{$kitob->id}}">
              <img src="/public/images/{{$kitob->image}}" alt="" />
            </a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    </div>
  </section>
  <br>
  <section>
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-md-12">
          <p style="font-weight: 500; font-size: 24px; line-height: 28px;">{{ __('lang.sarlavhalar') }}</p>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row align-items-center">
        @foreach ($rubrikaList as $rubrika)
        <div class="col-3">
          <ul class="list-group">
            <li class="list-group-item border-0">
              <a href="{{ route('home') }}/search/{{ $rubrika->id }}">
                <img src="/public/icons/{{ $rubrika->icons }}" class="" alt="" style="margin-right: 1rem;"><span class="spans"> {{ $rubrika->rubrikaname }} </span>
              </a>
            </li>
          </ul>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <br><br>
  @include('layouts.footer')


  @include('layouts.script')

  <script type="text/javascript">
    const url = "{{ route('changeLang') }}";
    $('#lang').change(function() {
      window.location.href = url + '?lang=' + $(this).val();
    })
  </script>
  <script type="text/javascript">
    const search_1 = document.getElementById('search_1');
    search_1.addEventListener("click", homeSearchResult);
    function homeSearchResult() {
        const keyWords = document.getElementById('keyWords').value;
        let author = "";
        let title = "";
        let rubrikaname = -1;
        let _token = $('meta[name="csrf-token"]').attr('content');
      
        const url = "{{ route('searchError') }}";

        $.ajax({
          url: "/search",
          type: "POST",
          data: {
            author: author,
            title: title,
            rubrikaname: rubrikaname,
            keyWords: keyWords,
            _token: _token
          },
          dataType: "JSON",
          success: function({
            searchList,
            status,
            message
          }) {
            let html = "";
            if (status == 1 && keyWords !== '') {

              searchList.forEach((search) => {
                html += `
                  <div class="col-2">
                    <div class="p-1 border bg-light journal">
                      <a href="{{route('home')}}/search/${search.publish_id}">
                        <img src="/public/images/${search.image}" alt="" />
                      </a>
                    </div>
                </div>
                  `;
              });
              document.getElementById("search").innerHTML = html;
            } else {
              window.location.href = url + "?message=" + message;
            }

          },
          error: function(err) {
            console.log(err)
          }
        })
    }

  </script>

</body>

</html>