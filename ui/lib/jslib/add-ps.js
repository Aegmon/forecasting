$(document).ready(function () {
    $(".progress").hide();
    $("#emsg").hide();
    $("#submit").click(function (e) {
        e.preventDefault();

        // Log when the submit button is clicked
        console.log('Submit button clicked');

        $('#ibox_form').block({ message: null });

        var _url = $("#_url").val();
        
        // Log the form data before sending the request
        console.log('Sending data to:', _url + 'ps/add-post/');
        console.log('Form data:', {
            name: $('#name').val(),
            sales_price: $('#sales_price').val(),
            item_number: $('#item_number').val(),
            description: $('#description').val(),
            stock: $('#stock').val(),
            type: $('#type').val()
        });

        $.post(_url + 'ps/add-post/', {
            name: $('#name').val(),
            sales_price: $('#sales_price').val(),
            item_number: $('#item_number').val(),
            description: $('#description').val(),
            stock: $('#stock').val(),
            type: $('#type').val()
        })
        .done(function (data) {
            // Log response data after the POST request
            console.log('Response data:', data);

            setTimeout(function () {
                var sbutton = $("#submit");
                var _url = $("#_url").val();

                if ($.isNumeric(data)) {
                    // Log if the data is numeric (assumed success)
                    console.log('Numeric response, reloading page...');
                    location.reload();
                } else {
                    $('#ibox_form').unblock();

                    // Log the error message
                    console.log('Error message received:', data);
                    $("#emsgbody").html(data);
                    $("#emsg").show("slow");
                }
            }, 2000);
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            // Log any errors with the request
            console.log('Error with the request:', textStatus, errorThrown);
        });
    });
});
