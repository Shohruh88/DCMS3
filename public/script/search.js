const search_1 = document.getElementById('search_1');


search_1.addEventListener("click", () => {
    const keyWords_1 = document.getElementById('keyWords_1').value;
    let _token = $('meta[name="csrf-token"]').attr('content');
    console.log(keyWords_1)
    $.ajax({
        url: "http://127.0.0.1:8000/searchKey",
        type:"POST",
        data: {
            keyWords_1: keyWords_1,
            _token: _token
        },
        dataType: "JSON",
        success: function({ searchKey, status }) {
            let html = "";
          if (status == 1) {
            // window.location = 'http://127.0.0.1:8000/search';
            searchKey.forEach((search) => {
                
              console.log(search);
              html += `
              <div class='col-md-2'>
                
              </div>
              <div class='col-md-10'>
                <div class="card my-2 p-3">
                  <span style="color: rgb(119, 117, 117);"><span style='font-weight:550; padding-right:6px;'>Mavzusi: </span> <a href='http://127.0.0.1:8000/search/${search.publish_id}' >${search.publishname}</a> </span>
                  <span style="color: rgb(128, 128, 128); font-size: 15px;"><span style='font-weight:550; padding-right:6px;'>Mualliflar: </span> ${search.author}</span><br>
                  <span style="color: rgb(128, 128, 128); font-size: 15px;"><span style='font-weight:550; padding-right:6px;'>Nashriyotchilar: </span> <i>${search.publishername}</i></span><br>
                  <span style="color: rgb(128, 128, 128); font-size: 15px;"><span style='font-weight:550; padding-right:6px;'>Qisqacha ma'lumot: </span> <i>${search.description}</i></span><br>
                  <hr>
                  <span style="color: rgb(128, 128, 128); font-size: 14px;"><span style='font-weight:550; padding-right:6px;'>Sanasi: </span> ${search.date}</span>
                </div>
              </div>
                `;
            });
           
        }
        document.getElementById("cards").innerHTML = html;
    },
        error: function(err) {
            console.log(err)
        }
    })
})