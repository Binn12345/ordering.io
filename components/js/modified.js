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
            timer: 2000,
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

            // Play the notification sound
            playNotificationSound();
        } else if (usernameInput === "") {
            Swal.fire({...SwalConfig, icon: 'warning', title: 'Username or email must be required.'});
            // Play the notification sound
            playNotificationSound();
        } else if (passwordInput === "") {
            Swal.fire({...SwalConfig, icon: 'warning', title: 'Password must be required.'});
            // Play the notification sound
            playNotificationSound();
        } else {
            $('#submitform').submit();
            // Submit the form after a 2-second delay
            // setTimeout(function() {
            //     $('#submitform').submit();
            // }, 1000); // 2 seconds delay
            // Play the notification sound
            // playNotificationSoundDenied();
        }

        function playNotificationSound() {
            // Create an audio element to play the notification sound
            var audio = new Audio('path/sound/error.mp3');
    
            // Play the sound
            audio.play().catch(function(error) {
                // Handle playback errors
                console.error('Error playing notification sound: ' + error);
            });
        }

        function playNotificationSoundDenied() {
            // Create an audio element to play the notification sound
            var audiogrant = new Audio('path/sound/denied.mp3');
    
            // Play the sound
            audiogrant.play().catch(function(error) {
                // Handle playback errors
                console.error('Error playing notification sound: ' + error);
            });
        }
        
    });
    
    

});




