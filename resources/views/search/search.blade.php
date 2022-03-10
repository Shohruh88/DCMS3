@include('layouts.head')

<body style="overflow-x: hidden;">

  @include('layouts.navbar')

  <section>
    <div class="modal-body container">
      <h3 class="text-center text-success mb-3">{{ __('lang.qidirish') }}</h3>
      <form>
        @csrf
        <div class="row">
          <div class="col-6">
            <div class="input-group mb-3 ">
              <span class="input-group-text" style="background-color: #1a9169; color: aliceblue;" id="basic-addon1">{{__('lang.muallif')}}</span>
              <input type="text" class="form-control" placeholder="{{__('lang.muallif_nomi')}}..." id="author_1">
            </div>
          </div>
          <div class="col-3">
            <div class="input-group mb-3">
              <label class="input-group-text" style="background-color: #1a9169; color: aliceblue;" for="rubrikaname">{{__('lang.nashr_sohasi')}}</label>
              <select class="form-select" id="rubrikaname_1">
                <option value="-1" selected disabled>{{__('lang.tanlang')}}</option>
                @foreach ($searchList as $search)
                <option value="{{ $search->id }}"> {{ $search->rubrikaname }} </option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" style="background-color: #1a9169; color: aliceblue;" id="basic-addon1">{{__('lang.mavzu')}}</span>
          <input type="text" class="form-control" placeholder="{{__('lang.mavzu')}}..." aria-label="Username" aria-describedby="basic-addon1" id="title_1">
        </div>
        <div class="input-group flex-nowrap">
          <span class="input-group-text" style="background-color: #1a9169; color: aliceblue;" id="addon-wrapping">{{__('lang.kalit_suz')}}</span>
          <input type="text" class="form-control" placeholder="{{__('lang.kalit_suz')}}" aria-label="Username" aria-describedby="addon-wrapping" id="keyWords">
        </div>
        <div class="row my-3">
          <div class="col-md-4">
            <div class="input-group mb-3">
              <span class="input-group-text" style="background-color: #1a9169; color: aliceblue;">{{__('lang.chop_etilgan')}} </span>
              <input type="date" class="form-control" placeholder="Username" aria-label="Username" id="startDate">
              <span class="input-group-text" style="background-color: #1a9169; color: aliceblue;">{{__('lang.dan')}}</span>
            </div>
          </div>
          <div class="col-md-4">
            <div class="input-group mb-3">
              <input type="date" class="form-control" placeholder="Server" aria-label="Server" id="endDate">
              <span class="input-group-text" style="background-color: #1a9169; color: aliceblue;">{{__('lang.gacha')}}</span>
              <button class="btn btn-warning" style="color: aliceblue;margin-left:15px;border-radius:3px;padding-left:15px;padding-right:15px;" id="search" type="button">{{__('lang.qidirish')}}</button>
            </div>
          </div>
        </div>


    </div>
    </form>
    </div>
  </section>
  <section style="margin-bottom: 175px;">
    <div class="container my-3">
      <div class="row align-items-start" id="cards">
        @if(session('error'))
        <h3> {{ session('error') }} </h3>
        @else
        <h3 id="error" style="display: none;"></h3>
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
  <script type="text/javascript">
    // method get 
    var search = document.querySelector('#search');
    var error = document.getElementById("error");
    search.addEventListener('click', getSearchResult);

    function getSearchResult() {
      var author = document.querySelector('#author_1').value;
      var title = document.querySelector('#title_1').value;
      var rubrikaname = document.querySelector('#rubrikaname_1').value;
      var keyWords = document.querySelector('#keyWords').value;
      var startDate = document.querySelector('#startDate').value;
      var endDate = document.querySelector('#endDate').value;
      let _token = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: "{{route('home')}}/search",
        type: 'POST',
        data: {
          author: author,
          title: title,
          rubrikaname: rubrikaname,
          keyWords: keyWords,
          _token: _token
        },
        dataType: "json",
        success: function({
          searchList,
          status,
          message
        }) {
          let html = "";

          if (status == 1) {


            searchList.forEach((post) => {
              html += `
              <div class='col-md-2'>
                
              </div>
              <div class='col-md-10'>
                <div class="card my-2 p-3">
                  <span style="color: rgb(119, 117, 117);"><span style='font-weight:550; padding-right:6px;'>Mavzusi: </span> <a href='{{route('home')}}/search/${post.published_id}' >${post.publishname}</a> </span>
                  <span style="color: rgb(128, 128, 128); font-size: 15px;"><span style='font-weight:550; padding-right:6px;'>Mualliflar: </span> ${post.author}</span><br>
                  <span style="color: rgb(128, 128, 128); font-size: 15px;"><span style='font-weight:550; padding-right:6px;'>Nashriyotchilar: </span> <i>${post.publishername}</i></span><br>
                  <span style="color: rgb(128, 128, 128); font-size: 15px;"><span style='font-weight:550; padding-right:6px;'>Qisqacha ma'lumot: </span> <i>${post.description}</i></span><br>
                  <hr>
                  <span style="color: rgb(128, 128, 128); font-size: 14px;"><span style='font-weight:550; padding-right:6px;'>Sanasi: </span> ${post.date}</span>
                </div>
              </div>
                `;
            });
            document.getElementById("cards").innerHTML = html;

          } else if (status == -1) {
            errorData(message);
          } else {
            errorData(message);
          }
        },

        error: function(error) {
          console.log(error)
        }
      })

    }

    function errorData(message) {
      error.style.display = "block";
      error.innerHTML = message;
    }
  </script>
</body>

</html>