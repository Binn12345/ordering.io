$(document).ready(function() {
    
    $('#saveregform').on('click', function(e){
        e.preventDefault();

        var data = $('#updform').serialize();

        $.ajax({
          type    : "POST",
          data    :  data,
          url     : 'process/updateform.php',
          success : function(response){

          }


        });


      });

    $('#user_destory').on('click', function () {
     
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to sign out",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
            
          }).then((result) => {
            if (result.isConfirmed) {
                window.location = "../functions/logoutconnection.php";
            }
          });
  
    });
    // var to 30 minutes (30 * 60 * 1000 milliseconds)
    // var idleTimeout = 300000; // 5 minutes (adjust as needed)
    var idleTimeout = 300000;
    var timeout;
    
    function startTimer() {
        clearTimeout(timeout);
        timeout = setTimeout(logout, idleTimeout);
    }
    
    function logout() {
        window.location.href = '../functions/logoutconnection.php';
    }
    
    document.addEventListener('mousemove', startTimer);
    document.addEventListener('keydown', startTimer);
    
    startTimer();
    
    
});
