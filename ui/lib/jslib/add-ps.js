$(document).ready(function () {
    $(".progress").hide();
    $("#emsg").hide();

    // Ensure we do not attach multiple event listeners
    $("#productform").off("submit").on("submit", function (e) {
        e.preventDefault();

        console.log('🚀 Form submitted, processing...');
        
        var submitButton = $("#submit");

        // Prevent multiple submissions
        if (submitButton.prop('disabled')) {
            console.log('⚠️ Submission blocked: Already processing...');
            return;
        }
        submitButton.prop('disabled', true); // Disable button immediately

        $('#ibox_form').block({ message: null });

        var _url = $("#_url").val();
        console.log('URL'. _url);
        var formData = new FormData(this);

        // Debug: Log form data (excluding file)
        for (var pair of formData.entries()) {
            if (pair[0] !== 'image') {
                console.log(`📤 ${pair[0]}: ${pair[1]}`);
            }
        }

        // Send AJAX request
        $.ajax({
            url: _url + 'ps/add-post/',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(".progress").show();
                console.log('⏳ Upload in progress...');
            },
            success: function (response) {
                console.log('✅ Response received:', response);
                $('#ibox_form').unblock();
                $(".progress").hide();
                submitButton.prop('disabled', false); // Re-enable button
        
                try {
                    let res = JSON.parse(response);
                    
                    if (res.success) {
                        console.log('✔️ Item added successfully, redirecting...');
                        window.location.href = _url + 'ps/p-list';
                    } else {
                        console.log('❌ Error message received:', res.message);
                        $("#emsgbody").html(res.message);
                        $("#emsg").show("slow");
                    }
                } catch (e) {
                    console.log('🚨 JSON Parsing Error:', e);
                    console.log('🔴 Raw Server Response:', response);
                    $("#emsgbody").html('An unexpected error occurred.');
                    $("#emsg").show("slow");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('🚨 AJAX Error:', textStatus, errorThrown);
                console.log('🔴 Server Response:', jqXHR.responseText);
        
                $('#ibox_form').unblock();
                $(".progress").hide();
                submitButton.prop('disabled', false); // Re-enable button on error
                $("#emsgbody").html('An error occurred: ' + textStatus);
                $("#emsg").show("slow");
            }
        });
        
    });
});
