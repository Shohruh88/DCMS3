@include('layouts.head')

<body>
  @include('layouts.navbar')


  <section>
    <div class="container-fluid podmenu">
      <div class="d-flex justify-content-center" style="margin-top: 27.5px;">
        <div class="px-2"><a href="{{route('profile')}}" class="podmenuword">{{__('lang.profil')}}</a></div>
        <div class="px-2"><a href="{{ route('profile.subscribers') }}" class="podmenuword borderbot">{{__('lang.obunalar')}}</a></div>
      </div>
    </div>
  </section>
  <section>
    <div class="container" style="width: 980px;margin-top: 30px;margin-bottom: 30px;">
      <div class="mb-4">
        <div class="mb-2 d-flex align-items-center">
          @if (!empty($isSubscriberGazeta))
          @if ($isSubscriberGazeta[0]->isSubscriber == 1)
          <a href="{{route('upress.gazeta')}}" class="mb-2">
            <button class="btn btn-primary">{{__('lang.gazetalar')}}</button>
          </a>
          <div class="form-check form-switch" style="margin-left: 150px;">
            <input class="form-check-input" type="checkbox" role="switch" id="gazetaObuna" publish_id="{{ $publishID[0]->id }}" checked>
            <label class="form-check-label" for="gazetaObuna">Gazetalarga obuna qilindi</label>
          </div>
          @elseif ($isSubscriberGazeta[0]->isSubscriber == 0)
          <button class="btn btn-primary mb-2" disabled>{{__('lang.gazetalar')}}</button>
          <div class="form-check form-switch" style="margin-left: 150px;">
            <input class="form-check-input" type="checkbox" role="switch" id="gazetaObuna" publish_id="{{ $publishID[0]->id }}">
            <label class="form-check-label" for="gazetaObuna">{{__('lang.gazetalarga_obuna')}}</label>
          </div>
          @endif
          @else
          <button class="btn btn-primary mb-2" disabled>{{__('lang.gazetalar')}}</button>
          <div class="form-check form-switch" style="margin-left: 150px;">
            <input class="form-check-input" type="checkbox" role="switch" id="gazetaObuna" publish_id="{{ $publishID[0]->id }}">
            <label class="form-check-label" for="gazetaObuna">{{__('lang.gazetalarga_obuna')}}</label>
          </div>
          @endif
        </div>
        <!-- Upress jurnal boshlandi -->
        <div class="mb-2 d-flex align-items-center">
          @if (!empty($isSubscriberJurnal))
          @if ($isSubscriberJurnal[0]->isSubscriber == 1)
          <a href="{{ route('upress.jurnal') }}" class="btn btn-primary mb-2" style="padding: 6px 18px;">{{__('lang.jurnallar')}}</a>
          <div class="form-check form-switch" style="margin-left: 150px;">
            <input class="form-check-input" type="checkbox" role="switch" id="jurnalObuna" publish_id="{{ $publishID[2]->id }}" checked>
            <label class="form-check-label" for="jurnalObuna">Jurnallarga obuna qilindi</label>
          </div>
          @elseif ($isSubscriberJurnal[0]->isSubscriber == 0)
          <button class="btn btn-primary mb-2" style="padding: 6px 18px;" disabled>{{__('lang.jurnallar')}}</button>
          <div class="form-check form-switch mt-2" style="margin-left: 150px;">
            <input class="form-check-input" type="checkbox" role="switch" id="jurnalObuna" publish_id="{{ $publishID[2]->id }}">
            <label class="form-check-label" for="jurnalObuna">{{__('lang.jurnallarga_obuna')}}</label>
          </div>
          @endif
          @else
          <button class="btn btn-primary mb-2" style="padding: 6px 18px;" disabled>{{__('lang.jurnallar')}}</button>
          <div class="form-check form-switch" style="margin-left: 150px;">
            <input class="form-check-input" type="checkbox" role="switch" id="jurnalObuna" publish_id="{{ $publishID[2]->id }}">
            <label class="form-check-label" for="jurnalObuna">{{__('lang.jurnallarga_obuna')}}</label>
          </div>
          @endif
        </div>

        <!-- Upress Jurnal yakunlandi -->

        <!-- Upress Kitoblarga Obuna -->
        <div class="mb-2 d-flex align-items-center">
          @if (!empty($isSubscriberKitob))
          @if ($isSubscriberKitob[0]->isSubscriber == 1)
          <a href="{{ route('upress.kitob') }}" class="btn btn-primary mb-2" style="padding: 6px 20px;">{{__('lang.kitoblar')}}</a>
          <div class="form-check form-switch" style="margin-left: 150px;">
            <input class="form-check-input" type="checkbox" role="switch" id="kitobObuna" publish_id="{{ $publishID[1]->id }}" checked>
            <label class="form-check-label" for="kitobObuna">Kitoblarga obuna qilindi</label>
          </div>
          @elseif ($isSubscriberKitob[0]->isSubscriber == 0)
          <button class="btn btn-primary mb-2" style="padding: 6px 20px;" disabled>{{__('lang.kitoblar')}}</button>
          <div class="form-check form-switch" style="margin-left: 150px;">
            <input class="form-check-input" type="checkbox" role="switch" id="kitobObuna" publish_id="{{ $publishID[1]->id }}">
            <label class="form-check-label" for="kitobObuna">{{__('lang.kitoblarga_obuna')}}</label>
          </div>
          @endif
          @else 
          <button class="btn btn-primary mb-2" style="padding: 6px 20px;" disabled>{{__('lang.kitoblar')}}</button>
          <div class="form-check form-switch" style="margin-left: 150px;">
            <input class="form-check-input" type="checkbox" role="switch" id="kitobObuna" publish_id="{{ $publishID[1]->id }}">
            <label class="form-check-label" for="kitobObuna">{{__('lang.kitoblarga_obuna')}}</label>
          </div>
          @endif
        </div>

        <!-- Upress Kitoblar tugadi -->

      </div>
      <p class="uzapis">{{__('lang.obunalarim')}}</p>
      <hr style="border: 1px solid rgb(0, 0, 0); ">
      @if (!empty($subscriberList))
      @foreach ($subscriberList as $subscriber)
      <div class="row align-items-center py-2">
        <hr>  
        <div class="col d-flex">
          <div><span class="personinfo"><img src="/public/images/{{$subscriber->image }}" style="width: 100px; height: 130px; margin-right: 8px;" alt=""></span></div>
          <div style="margin-top: 10px;">
            <table>
              <tbody>
                <tr>
                  <td class="tmodel">{{__('lang.nashriyotchi')}}:{{ $subscriber->publishername }}</td>
                </tr>
                <tr>
                  <td class="tmodel">{{__('lang.mavzu')}}:{{ $subscriber->publishname }}</td>
                </tr>
                <tr>
                  <td class="tmodel"> {{__('lang.nashr_soni')}}:{{ $subscriber->number }}</td>
                </tr>
                <tr>
                  <td class="tmodel"> {{__('lang.nashr_turi')}}:{{ $subscriber->typename }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="col text-center d-flex">
          <div><a type="button" class="btn btn-danger px-4 py-1" style="font-size: 18px;" id="subscriber" publish_id="{{ $subscriber->publish_id }}">{{__('lang.bekor_qilish')}}</a></div>
        </div>
      </div>
      <hr style="margin-top: -4px; border: 1px solid black;">
      @endforeach
      @endif
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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script type="text/javascript">
    const gazetaObuna = document.getElementById('gazetaObuna');
    const jurnalObuna = document.getElementById('jurnalObuna');
    const kitobObuna = document.getElementById('kitobObuna');
    const jPublish_id = jurnalObuna.getAttribute('publish_id');
    const gPublish_id = gazetaObuna.getAttribute('publish_id');
    const kPublish_id = kitobObuna.getAttribute('publish_id');
    gazetaObuna.addEventListener('change', postUpressGazeta);
    jurnalObuna.addEventListener('change', postUpressJurnal);
    kitobObuna.addEventListener('change', postUpressKitob);
    let _token = $('meta[name="csrf-token"]').attr('content');
    let options = {
      weekday: 'long',
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    };
    let d = new Date();

    let datestring = d.toLocaleDateString('uz', options);

    function postUpressGazeta() {
      if (this.checked) {
        $.ajax({
          url: '/upress/gazeta',
          type: 'POST',
          data: {
            publish_id: gPublish_id,
            date: datestring,
            _token: _token
          },
          dataType: 'JSON',
          success: function({
            status
          }) {
            // console.log(status)
            if (status == 1) {
              swal("Juda yaxshi", "Siz hamma gazetalarga obuna bo'ldingiz!", "success", {
                  button: "Qaytish",
                })
                .then(() => {
                  window.location.href = "/profile/subscribers";
                })
              // console.log(status)
            }
          }
        })
      } else {
        $.ajax({
          url: '/profile/subscribers',
          type: 'POST',
          data: {
            publish_id: gPublish_id,
            date: datestring,
            _token: _token
          },
          dataType: 'JSON',
          success: function({
            status
          }) {
            // console.log(status)
            if (status == 1) {
              swal("Juda yaxshi", "Obunani bekor qildingiz!", "success", {
                  button: "Qaytish",
                })
                .then(() => {
                  window.location.href = "/profile/subscribers";
                })
            }
          }
        })
      }
    }

    function postUpressJurnal() {
      if (this.checked) {
        $.ajax({
          url: '/upress/jurnal',
          type: 'POST',
          data: {
            publish_id: jPublish_id,
            subscriberDate: datestring,
            _token: _token
          },
          dataType: 'JSON',
          success: function({
            status
          }) {
            // console.log(data)
            if (status == 1) {
              swal("Juda yaxshi", "Siz hamma jurnallarga obuna bo'ldingiz!", "success", {
                  button: "Obuna",
                })
                .then(() => {
                  window.location = "/profile/subscribers";
                })
            }
          }
        })
      } else {
        $.ajax({
          url: '/profile/subscribers',
          type: 'POST',
          data: {
            publish_id: jPublish_id,
            date: datestring,
            _token: _token
          },
          dataType: 'JSON',
          success: function({
            status
          }) {
            // console.log(status)
            if (status == 1) {
              swal("Juda yaxshi", "Obunani bekor qildingiz!", "success", {
                  button: "Qaytish",
                })
                .then(() => {
                  window.location.href = "/profile/subscribers";
                })
            }
          }
        })
      }
    }

    function postUpressKitob() {
      if (this.checked) {
        $.ajax({
          url: '/upress/kitob',
          type: 'POST',
          data: {
            publish_id: kPublish_id,
            subscriberDate: datestring,
            _token: _token
          },
          dataType: 'JSON',
          success: function({
            status
          }) {
            // console.log(data)
            if (status == 1) {
              swal("Juda yaxshi", "Siz hamma kitoblarga obuna bo'ldingiz!", "success", {
                  button: "Obuna",
                })
                .then(() => {
                  window.location = "/profile/subscribers";
                })
            }
          }
        })
      } else {
        $.ajax({
          url: '/profile/subscribers',
          type: 'POST',
          data: {
            publish_id: kPublish_id,
            date: datestring,
            _token: _token
          },
          dataType: 'JSON',
          success: function({
            status
          }) {
            // console.log(status)
            if (status == 1) {
              swal("Juda yaxshi", "Obunani bekor qildingiz!", "success", {
                  button: "Qaytish",
                })
                .then(() => {
                  window.location.href = "/profile/subscribers";
                })
            }
          }
        })
      }
    }
  </script>
  <script type="text/javascript">
    let subscriber = document.getElementById("subscriber");
    let publish_id = subscriber.getAttribute("publish_id");
    subscriber.addEventListener('click', postSubscriber)

    function postSubscriber() {
      let options = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
      };
      let d = new Date();

      let datestring = d.toLocaleDateString('uz', options);

      let _token = $('meta[name="csrf-token"]').attr('content');

      subscriber.addEventListener('click', () => {
        $.ajax({
          url: "{{ route('home') }}/profile/subscribers",
          type: "POST",
          data: {
            publish_id: publish_id,
            date: datestring,
            _token: _token
          },
          dataType: "JSON",
          success: function({
            success,
            error,
            status
          }) {
            if (status == 1) {
              swal("Juda yaxshi", success, "success", {
                  button: "Qaytish",
                })
                .then(() => {
                  window.location = "{{ route('home') }}/profile/subscribers";
                })
            } else {
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
    }
  </script>
</body>

</html>