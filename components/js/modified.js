// Add an event listener to detect when the modal is hidden
$(document).ready(function() {

    $('#exampleModal').on('hidden.bs.modal', function () {
        // Clear the input fields using jQuery
        $('#floatingInput, #floatingPassword').val('');
    });


    

    // $('#access').on('click', function () {
    //     // Clear the input fields using jQuery
    //     $('#floatingInput, #floatingPassword').val('');
    // });

});




  