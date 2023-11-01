// Add an event listener to detect when the modal is hidden
$(document).ready(function() {

    $('#exampleModal').on('hidden.bs.modal', function () {
        // Clear the input fields using jQuery
        $('#floatingInput, #floatingPassword').val('');
    });
     
    $('#access').on('click', function(e) {
        e.preventDefault();
    
        var usernameInput = $('#floatingInput').val().trim();
        var passwordInput = $('#floatingPassword').val().trim();
    
        const SwalConfig = {
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 4000,
            background: '#f64341',
            color: '#ffff',
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.resumeTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        };
    
        if (usernameInput === "" && passwordInput === "") {
            Swal.fire({...SwalConfig, icon: 'warning', title: 'Both fields must be required.'});
        } else if (usernameInput === "") {
            Swal.fire({...SwalConfig, icon: 'warning', title: 'Username or email must be required.'});
        } else if (passwordInput === "") {
            Swal.fire({...SwalConfig, icon: 'warning', title: 'Password must be required.'});
        } else {
            $('#submitform').submit();
        }
        
    });
    

    

    // $('#access').on('click', function () {
    //     // Clear the input fields using jQuery
    //     $('#floatingInput, #floatingPassword').val('');
    // });

});




  