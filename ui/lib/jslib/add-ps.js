$(document).ready(function () {
    $(".progress").hide();
    $("#emsg").hide();

    $("#submit").click(function (e) {
        e.preventDefault();

        console.log('🚀 Submit button clicked, starting form processing...');

        $('#ibox_form').block({ message: null });

        var _url = $("#_url").val();
        var formData = new FormData();

        // Append form fields
        formData.append('name', $('#name').val());
        formData.append('sales_price', $('#sales_price').val());
        formData.append('item_number', $('#item_number').val());
        formData.append('description', $('#description').val());
        formData.append('stock', $('#stock').val());
        formData.append('type', $('#type').val());

        // Append image file (if selected)
        var imageFile = $('#image')[0].files[0];
        if (imageFile) {
            console.log('🖼️ Image selected:', imageFile.name);
            formData.append('image', imageFile);
        } else {
            console.log('⚠️ No image selected.');
        }

        // Debug: Log form data content
        console.log('📤 Sending form data:', formData);

        // Send AJAX request with `FormData`
        $.ajax({
            url: _url + 'ps/add-post/',
            type: 'POST',
            data: formData,
            contentType: false, // Required for `FormData`
            processData: false, // Prevent jQuery from auto-processing
            beforeSend: function () {
                $(".progress").show(); // Show progress indicator
                console.log('⏳ Upload in progress...');
            },
            success: function (response) {
                console.log('✅ Response received:', response);

                setTimeout(function () {
                    $('#ibox_form').unblock();
                    $(".progress").hide();

                    if ($.isNumeric(response)) {
                        console.log('✔️ Item added successfully, reloading page...');
                        location.reload();
                    } else {
                        console.log('❌ Error message received:', response);
                        $("#emsgbody").html(response);
                        $("#emsg").show("slow");
                    }
                }, 2000);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('🚨 AJAX Error:', textStatus, errorThrown);
                console.log('🔴 Server Response:', jqXHR.responseText);

                $('#ibox_form').unblock();
                $(".progress").hide();
                $("#emsgbody").html('An error occurred: ' + textStatus);
                $("#emsg").show("slow");
            }
        });
    });
});
