document.addEventListener('DOMContentLoaded', function () {
    // Get a reference to the button element
    if (response === 'success'){
            iziToast.success({ 
            title: "Success", 
            message: "Successfully logged in.", 
            position: "topCenter", 
            timeout: 1000,
        }); 
        setTimeout(function (){
            window.location.href = 'homePage.php';
        }, 1000);

    } else if (response === 'error'){
        iziToast.error({ 
            title: "Error", 
            message: "Account does not exists. ", 
            position: "topCenter", 
            timeout: 1000,
        }); 
        setTimeout(function (){
            window.location.href = 'login.php';
        }, 1000);
       
    }

    console.log(response);

    var btnReg = document.getElementById('btnReg');

    btnReg.addEventListener('click', function () {
        // Code to execute when the button is clicked
        window.location.href = 'signUp.php';
    });

});