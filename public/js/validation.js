
class CheckForm {

    // Ro'yhatdan o'tish qismini tekshirish

     checkRegister(firstname, lastname, email, password, errorFirstname, errorLastname, errorEmail, errorPassword) {
        if (firstname == '') {
            errorFirstname.innerHTML = 'Ismingizni kiriting...!!!';
            errorFirstname.style.color = 'red';
        } else {
            errorFirstname.innerHTML = '';
        }

        if (lastname == '') {
            errorLastname.innerHTML = 'Familiyangizni kiriting...!!!';
            errorLastname.style.color = 'red';
        } else {
            errorLastname.innerHTML = '';
        }

        if (email == '') {
            errorEmail.innerHTML = 'Emailingizni kiriting...!!!';
            errorEmail.style.color = 'red';
        } else {
            errorEmail.innerHTML = '';
        }

        if (password == '') {
            errorPassword.innerHTML = 'Parolingizni kiriting...!!!';
            errorPassword.style.color = 'red';
        } else {
            errorPassword.innerHTML = '';
        }


        // if (cpassword == '' || password !== cpassword) {
        //     errorArray[4].innerHTML = 'Parolingiz xato...!!!';
        //     errorArray[4].style.color = 'red';
        // } else {
        //     errorArray[4].innerHTML = '';
        // }
        
    }

    checkLogin(email, password, errorEmail, errorPassword) {
        if (email == '') {
            errorEmail.innerHTML = 'Emailingizni kiriting...!!!';
            errorEmail.style.color = 'red';
        } else {
            errorEmail.innerHTML = '';
        }

        if (password == '') {
            errorPassword.innerHTML = 'Parolingizni kiriting...!!!';
            errorPassword.style.color = 'red';
        } else {
            errorPassword.innerHTML = '';
        }

     
    }

}