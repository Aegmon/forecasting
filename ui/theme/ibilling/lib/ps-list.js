$(document).ready(function () {
    var $progressBar = $('#progressbar');
    var $searchButton = $("#search");
    var $modal = $('#ajax-modal'); // Ensure this element exists in your HTML
    var $sysRender = $('#application_ajaxrender');
    var $iboxForm = $('#ibox_form');
    var searchUrl = $("#_url").val() + 'search/ps/';
    var deleteUrl = $("#_url").val() + 'delete/ps/';
    var editFormUrl = $("#_url").val() + 'ps/edit-form/';
    var editPostUrl = $("#_url").val() + 'ps/edit-post/';

    // Initialize the progress bar but hide it initially
    $progressBar.hide().progressbar({
        warningMarker: 100,
        dangerMarker: 100,
        maximum: 100,
        step: 15
    });

    // Function to perform the search and update results
    function performSearch() {
        $iboxForm.block({ message: null });
        $progressBar.show();

        // Start updating the progress bar
        var timer = setInterval(function () {
            $progressBar.progressbar('stepIt');
        }, 250);

        $.post(searchUrl, {
            txtsearch: $('#txtsearch').val(),
            stype: $('#stype').val()
        }).done(function (data) {
            setTimeout(function () {
                clearInterval(timer); // Stop progress bar updates
                $progressBar.hide();
                $iboxForm.unblock();
                $("#application_ajaxrender").html(data).show();
            }, 2000);
        });
    }

    // Trigger the search on page load and when search button is clicked
    performSearch();
    $searchButton.click(function (e) {
        e.preventDefault();
        performSearch();
    });

    // Event handler for delete functionality
    $sysRender.on('click', '.cdelete', function (e) {
        e.preventDefault();
        var id = this.id;
        var confirmationMessage = $("#_lan_are_you_sure").val();
        bootbox.confirm(confirmationMessage, function (result) {
            if (result) {
                window.location.href = deleteUrl + id + '/';
            }
        });
    });

    // Event handler for edit functionality
    $sysRender.on('click', '.cedit', function (e) {
        e.preventDefault();
        var itemId = this.id.replace(/[^0-9]/g, ''); // Extract ID by removing non-numeric characters
        
        // Log the item ID to make sure it's being captured correctly
        console.log("Editing item with ID:", itemId);

        // Ensure modal is loading properly
        $('body').modalmanager('loading'); 

        setTimeout(function () {
            $modal.load(editFormUrl + itemId, '', function () {
                console.log('Modal loaded with form for ID:', itemId);
                // Open the modal after the form is loaded
                $modal.modal('show'); // Using Bootstrap modal 'show' method
            });
        }, 1000);
    });

    // Handle the update action in the modal
    $modal.on('click', '#update', function () {
        $modal.modal('loading');
        setTimeout(function () {
            $.post(editPostUrl, $('#edit_form').serialize(), function (data) {
                setTimeout(function () {
                    if ($.isNumeric(data)) {
                        location.reload();
                    } else {
                        $modal.modal('loading').find('.modal-body').prepend('<div class="alert alert-danger fade in">' + data + '</div>');
                    }
                }, 2000);
            });
        }, 1000);
    });
});
