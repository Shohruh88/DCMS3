@include('layouts.head')

<body style="overflow-x: hidden;">
  @include('layouts.navbar')
  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <nav class="fw-bold" style="--bs-breadcrumb-divider: '>'; margin-left: 15px;" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a style="font-size: 13px; color: rgba(0, 0, 0, 0.6); font-weight: 600;" href="#">KATALOG</a></li>
              <li class="breadcrumb-item"><a style="font-size: 13px; color: rgba(0, 0, 0, 0.6); font-weight: 600;" href="#">JURNALI</a></li>
              <li class="breadcrumb-item" aria-current="page"><a style="font-size: 13px; color: rgba(0, 0, 0, 0.3); font-weight: 600;" href="#">{{ $searchList->publishname }}</a></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <div class="container-fluid ml-5">
      <div class="row">
        <div class="col-xs-12 col-md-5 col-sm-7 col-lg-4 col-xl-4 col-xxl-2">
          <div class="block">
            <img class="journal11" src="/public/images/{{ $searchList->image }}" alt="">
          </div>
        </div>
        <div class="col-xs-12 col-md-7 col-sm-5 col-lg-4 col-xl-4 col-xxl-3 mt-3 showbookName">
          <ul class="list-group">
            <li class="list-group-item">
              <span style="font-weight: bold;margin-right: 10px;">Nashriyot:</span>{{ $searchList->publishername }}
            </li>
            <li class="list-group-item">
              <span style="font-weight: bold;margin-right: 10px;">Nashr soxasi:</span>{{ $searchList->rubrikaname }}
            </li>
            <li class="list-group-item">
              <span style="font-weight: bold;margin-right: 10px;">Nashr nomi:</span>{{ $searchList->publishname }}
            </li>
            <li class="list-group-item">
              <span style="font-weight: bold;margin-right: 10px;">Nashr turi:</span>{{ $searchList->typename }}
            </li>
            <li class="list-group-item">
              <span style="font-weight: bold;margin-right: 10px;">Nashr sanasi:</span>{{ $searchList->date }}
            </li>
          </ul>
        </div>

        <div class="col-xs-12 text-center col-md-12 col-sm-12 col-lg-4 col-xl-4 col-xxl-4 showbookSubscription">
          <div class="card mt-3">

            <div class="card-body">
              <h4>Siz obuna bo'lishni xohlaysizmi?</h4>
              <p></p>
              @if (session()->has('user'))
              @if (!empty($isSubscriberAll) && !empty($isSubscriber))
              @if ($isSubscriberAll[0]->isSubscriber == 0 && $isSubscriber[0]->isSubscriber == 0)
              <button class="btn btn-primary" id="obuna" publish_id="{{ $searchList->publish_id }}" published_id="{{ $searchList->id }}">Obuna bo'lish</button>
              @endif
              @if ($isSubscriberAll[0]->isSubscriber == 1 || $isSubscriber[0]->isSubscriber == 1)
              <button class="btn btn-secondary" disabled>Obuna qilingan</button>
              @endif
              @elseif (empty($isSubscriberAll) && !empty($isSubscriber) && $isSubscriber[0]->isSubscriber == 0 || empty($isSubscriber) && !empty($isSubscriberAll) && $isSubscriberAll[0]->isSubscriber == 0)
              <button class="btn btn-primary" id="obuna" publish_id="{{ $searchList->publish_id }}" published_id="{{ $searchList->id }}">Obuna bo'lish</button>

              @elseif(empty($isSubscriberAll) && !empty($isSubscriber) && $isSubscriber[0]->isSubscriber == 1 || empty($isSubscriber) && !empty($isSubscriberAll) && $isSubscriberAll[0]->isSubscriber == 1)
              <button class="btn btn-secondary" disabled>Obuna qilingan</button>
              @else
              <button class="btn btn-primary" id="obuna" publish_id="{{ $searchList->publish_id }}" published_id="{{ $searchList->id }}">Obuna bo'lish</button>
              @endif
              @else
              <button class="btn btn-primary mb-2" id="obuna" disabled>Obuna bo'lish</button>
              <p>Obuna bo'lish uchun ro'yhatdan o'ting</p><a href="{{ route('register') }}">Ro'yhatdan o'tish</a>
              @endif

            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container-fluid mt-3 showbookText">
      <div class="row">
        <div class="col-md-6">
          <p style="font-weight: 500; font-size: 24px; line-height: 28px;">Nashrning boshqa sonlari </p>
        </div>
      </div>
    </div>
    <div class="container-fluid px-4 showbookImag">
      <div class="row gx-3 library">
        @foreach ($publishedList as $published)
        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2">
          <div class="p-1 border bg-light journal">
            <a href="{{route('home')}}/search/{{$published->id}}">
              <img src="/public/images/{{$published->image}}" alt="" />
            </a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <section>
    <div class="container-fluid mt-3 showbookText">
      <div class="row">
        <div class="col-md-6">
          <p style="font-weight: 500; font-size: 24px; line-height: 28px;">Shu mavzudagi boshqa nashrlar </p>
        </div>
      </div>
    </div>
    <div class="container-fluid px-4 showbookImag">
      <div class="row gx-3 library">
        @foreach ($rubrikaList as $rubrika)
        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 col-xxl-2">
          <div class="p-1 border bg-light journal">
            <a href="{{route('home')}}/search/{{$rubrika->id}}">
              <img src="/public/images/{{$rubrika->image}}" alt="" />
            </a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <br>

@include('layouts.footer')

  <style>
    @media (max-width: 2560px) {
      .podpisinfo {
        margin-left: -20rem;
      }

      .margintop {
        margin-left: -20rem;
      }

      .twomenu {
        margin-left: 125rem;
      }

      .footbrand {
        margin-top: 4rem;
      }

      .brandu {
        margin-left: 4.5rem;
      }
    }

    @media (max-width: 1440px) {
      .twomenu {
        margin-left: 58rem;
      }

      .podpisinfo {
        margin-left: 0rem;
      }

      .margintop {
        margin-left: 0rem;
      }

      .freebutton {
        margin-left: 13.4rem;
      }

      .ili {
        margin-left: 9rem;
      }

      .downjournal {
        margin-left: 10rem;
      }

      .journal11 {
        width: 15rem;
        margin-top: 5px;
        margin-right: 2px;
      }
    }

    @media (max-width: 1366px) {
      .twomenu {
        margin-left: 55rem;
      }

      .journal11 {
        width: 13.5rem;

      }
    }
  </style>

@include('layouts.script')

  <script type="text/javascript">
    let obuna = document.getElementById("obuna");

    let options = {
      weekday: 'long',
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    };
    let d = new Date();

    let datestring = d.toLocaleDateString('uz', options);


    let publish_id = obuna.getAttribute("publish_id");
    let published_id = obuna.getAttribute('published_id');

    let _token = $('meta[name="csrf-token"]').attr('content');

    obuna.addEventListener("click", (e) => {

      $.ajax({
        url: "{{route('home')}}/publishsubscriber",
        type: "POST",
        data: {
          publish_id: publish_id,
          date: datestring,
          _token: _token
        },
        dataType: "JSON",
        success: function({
          success,
          status,
          error
        }) {
          // console.log(session)
          if (status == 1) {
            swal("Juda yaxshi", success, "success", {
                button: "Qaytish",
              })
              .then(() => {
                window.location = "{{ route('home') }}/search/" + published_id;
              })
          }
          if (status == -1) {
            swal('Afsus', error, 'error', {
              button: 'Qaytish'
            })

          }

        },
        error: function(err) {
          console.log(err)
        }
      })

    })
  </script>

</body>

</html>