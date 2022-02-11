const register = document.getElementById("register");

register.addEventListener('click', () => {
   const firstname = document.getElementById('firstname').value;    
   const lastname = document.getElementById('lastname').value;
   const email = document.getElementById('email').value;
   const password = document.getElementById('password').value;
   const _token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        
        url: "{{route('home')}}/register",
        type: 'POST',
        data: {
            firstname: firstname,
            lastname: lastname,
            email: email,
            password: password,
            _token: _token
        },
        dataType: "JSON",
        success: function({success, error, status}) {
           if (status) {
            // console.log(success)
            swal("Juda yaxshi", success, "success", {
                button: "Qabul qilish!",
              })
              .then(() => {
                document.location.href = '/profile'
              })
            
           }

           else {
            swal({
                title: error,
                icon: "error",
              });
           }
          
        },
        error: function(err) {
            console.log(err)    
        }
    })
});