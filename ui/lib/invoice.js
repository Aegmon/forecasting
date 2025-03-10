$(document).ready(function () {

    // Initialize Redactor for notes section
    $('#notes').redactor({
        minHeight: 200, // pixels
        plugins: ['fontcolor']
    });

    var _url = $("#_url").val();

    // Function to update the total amount
    function updateTotal() {
        var total = 0;
        var tbl = $('#invoice_items');

        // Loop through all items to calculate total
        tbl.find('.lvtotal').each(function () {
            var val = parseFloat($(this).val().replace(',', '.'));
            if (!isNaN(val)) {
                total += val;
            }
        });

        // Format the total with the correct decimal separator
        var _dec_point = $("#_dec_point").val();
        total = (_dec_point === ',') ? total.toFixed(2).replace(".", ",") : total.toFixed(2);

        $('#total').html(total); // Update the total
    }

    // Function to calculate subtotal and update the total
    function calculateTotal() {
        var sum = 0;
        var tbl = $('#invoice_items');

        tbl.find('.lvtotal').each(function () {
            var val = parseFloat($(this).val().replace(',', '.'));
            if (!isNaN(val)) {
                sum += val;
            }
        });

        // Update the sub-total
        var _dec_point = $("#_dec_point").val();
        sum = (_dec_point === ',') ? sum.toFixed(2).replace(".", ",") : sum.toFixed(2);
        $("#sub_total").html(sum);

        updateTotal(); // Update the total after calculating sub-total
    }

    // Event listener for when quantity or price changes
    $('#invoice_items').on('keyup', '.qty, .item_price', function () {
        var u_qty = $(this).closest('tr').find(".qty").val().replace(',', '.');
        var u_price = $(this).closest('tr').find(".item_price").val().replace(',', '.');

        if (!isNaN(u_qty) && !isNaN(u_price)) {
            var n_ltotal = (u_qty * u_price).toFixed(2);
            var _dec_point = $("#_dec_point").val();
            n_ltotal = (_dec_point === ',') ? n_ltotal.replace(".", ",") : n_ltotal;

            $(this).closest('tr').find(".lvtotal").val(n_ltotal); // Update line total
            calculateTotal(); // Recalculate total after change
        }
    });

    // Add new item row to the invoice
    $('#blank-add').on('click', function () {
        $("#invoice_items tbody")
            .append(
                '<tr>' +
                '<td></td>' +
                '<td><input type="text" class="form-control item_name" name="desc[]" value=""></td>' +
                '<td><input type="text" class="form-control qty" name="qty[]"></td>' +
                '<td><input type="text" class="form-control item_price" name="amount[]" value=""></td>' +
                '<td class="ltotal"><input type="text" class="form-control lvtotal" readonly value=""></td>' +
                '<td><button class="btn btn-danger delete-item">Delete</button></td>' +
                '</tr>'
            );
        calculateTotal(); // Recalculate total after adding new item
    });

    // Calculate total whenever there's a change in the invoice items
    $('#invoice_items').on('change', '.item_name, .qty, .item_price', function () {
        calculateTotal();
    });

    // Add new items through modal
    var $modal = $('#ajax-modal');
    $('#item-add').on('click', function () {
        $('body').modalmanager('loading');
        $modal.load(_url + 'ps/modal-list/', '', function () {
            $modal.modal();
        });
    });

    // Delete item and recalculate total
    $('#invoice_items').on('click', '.delete-item', function () {
        $(this).closest('tr').remove(); // Remove the row
        calculateTotal(); // Recalculate total after deletion
    });

    // Submit the form and send data via AJAX
    $('#submit').click(function (e) {
        e.preventDefault();

        // Collecting form data
        var idate = $('#idate').val();
        var item_codes = [];
        var descriptions = [];
        var qtys = [];
        var amounts = [];

        // Add item code data
        $('#invoice_items tbody tr').each(function () {
            // Ensure you collect item_code from the hidden input field
            item_codes.push($(this).find('.item_codes').val()); // 'item_codes' is the hidden input
            descriptions.push($(this).find('.item_name').val());
            qtys.push($(this).find('.qty').val());
            amounts.push($(this).find('.item_price').val());
        });

        // Prepare data to be sent via POST
        var postData = {
            idate: idate,
            item_code: item_codes, // Send the item_codes array correctly
            desc: descriptions,
            qty: qtys,
            amount: amounts
        };

        // Send data via AJAX
        $.ajax({
            url: _url + 'invoices/add-post/',
            method: "POST",
            data: postData, // Send the updated postData object
            success: function (response) {
                console.log('Invoice added successfully: ' + response);
                window.location.href = _url + 'invoices/list/';
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ' + error);
                console.error('Status: ' + status);
                console.error('Response: ' + xhr.responseText);
            }
        });
    });

    // Update the invoice items from modal selection
    $modal.on('click', '.update', function () {
        var tableControl = document.getElementById('items_table');
        $modal.modal('loading');

        $('input:checkbox:checked', tableControl).each(function () {
            var item_code = $(this).closest('tr').find('td:eq(1)').text(); // Extract the item code from the table cell
            var item_name = $(this).closest('tr').find('td:eq(2)').text();
            var item_price = $(this).closest('tr').find('td:eq(3)').text();

            // Add new row with item_code input
            $("#invoice_items tbody")
                .append(
                    '<tr>' +
                    '<td><input type="hidden" class="form-control item_codes" name="item_codes[]" value="' + item_code + '">' + item_code + '</td>' +
                    '<td><input type="text" class="form-control item_name" name="desc[]" value="' + item_name + '"></td>' +
                    '<td><input type="text" class="form-control qty" name="qty[]" value="1"></td>' +
                    '<td><input type="text" class="form-control item_price" name="amount[]" value="' + item_price + '"></td>' +
                    '<td class="ltotal"><input type="text" class="form-control lvtotal" readonly value="' + item_price + '"></td>' +
                    '<td><button class="btn btn-danger delete-item">Delete</button></td>' +
                    '</tr>'
                );
        });

        calculateTotal();
        $modal.modal('hide');
    });

    // Initial calculation of total
    calculateTotal();
});
