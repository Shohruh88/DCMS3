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
    <div class="container-fluid mt-4">
      <div class="row">
        <div class="col">
          <p style="font-weight: 500; font-size: 24px; line-height: 28px;margin-bottom:20px;">{{ __('lang.yangiliklar') }}</p>
        </div>
      </div>
    </div>
    <div class="container-fluid px-4">
      <div class="row gx-3 library" id="search">
        @foreach ($datePublishedList as $published) 
        <div class="col-2">
          <div class="p-1 border bg-light journal">
            <a href="{{route('home')}}/search/{{$published->id}}">
              <img src="/public/images/{{$published->image}}" alt="" />
            </a>
          </div>
        </div>  
        @endforeach
      </div>
    </div>
    </div>
  </section>

  <br>

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