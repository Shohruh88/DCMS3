@include('layouts.head')

<body>

  @include('layouts.navbar')

  <section>
    <div class="container-fluid podmenu">
      <div class="d-flex justify-content-center" style="margin-top: 27.5px;">
        <div class="px-2"><a href="{{route('profile')}}" class="podmenuword borderbot">{{__('lang.profil')}}</a></div>
        <div class="px-2"><a href="{{ route('profile.subscribers') }}" class="podmenuword">{{__('lang.obunalar')}}</a></div>
      </div>
    </div>
  </section>

  <section>

    <div class="container mt-5" style="margin-bottom: 270px;">
      <div class="row">
        <div class="col-xs-12
      col-sm-12 col-md-12 col-lg-12 colxl-12">
          <div class="card">
            <div class="card-header">
              <h4>{{__('lang.profil_boshqaruvi')}}</h4>
            </div>
            <div class="card-body">
              <ul class="list-group">
                <li class="list-group-item mb-3"><strong>{{__('lang.profil_egasi')}}:</strong>&nbsp;&nbsp;&nbsp;{{$profileList[0]->firstname}} &nbsp;{{ $profileList[0]->lastname }} <a href="" class="" style="color: red; float:right">{{__('lang.tahrirlash')}}</a></li>
                <li class="list-group-item"><strong>{{__('lang.elektron_pochta')}}:</strong>&nbsp;&nbsp;&nbsp; {{ $profileList[0]->email }} <a href="" class="" style="color: red; float:right">{{__('lang.tahrirlash')}}</a> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
  @include('layouts.footer')
  
  @include('layouts.script')
  <script type="text/javascript">
    const url = "{{ route('changeLang') }}";
    $('#lang').change(function() {
      window.location.href = url + '?lang=' + $(this).val();
    })
  </script>

</body>

</html>