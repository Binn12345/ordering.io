$(document).ready(function() {
    

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
    var idleTimeout = 1800000;
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

    // $('#access').on('click', function () {
    //     // Clear the input fields using jQuery
    //     $('#floatingInput, #floatingPassword').val('');
    // });
     
    
    // // Function to show the ad modal
    // function showAdModal() {
    //     var adModal = document.getElementById('adModal');
    //     adModal.style.display = 'block';

    //     // Close the modal after 2 seconds
    //     setTimeout(function () {
    //         adModal.style.display = 'none';
    //     }, 2000); // 2 seconds
    // }

    // // Close the ad modal when the close button is clicked
    // var closeAd = document.getElementById('closeAd');
    // closeAd.onclick = function () {
    //     var adModal = document.getElementById('adModal');
    //     adModal.style.display = 'none';
    // };

    // // Show the ad modal when the page loads
    // window.onload = showAdModal;

    
    
});