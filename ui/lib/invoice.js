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
    $(document).ready(function () {
        $('#submit').click(function (e) {
            e.preventDefault();
    
            console.log('Submitting Invoice Form...'); // Debugging Log
    
            // Collecting form data
            var idate = $('#idate').val();
            var item_codes = [];
            var descriptions = [];
            var qtys = [];
            var amounts = [];
    
            // Validate if at least one item is added
            if ($('#invoice_items tbody tr').length === 0) {
                alert('Please add at least one item to the invoice.');
                console.error('ERROR: No items in the invoice.');
                return;
            }
    
            // Collect item details
            $('#invoice_items tbody tr').each(function () {
                var itemCode = $(this).find('.item_codes').val();
                var itemName = $(this).find('.item_name').val();
                var itemQty = $(this).find('.qty').val();
                var itemPrice = $(this).find('.item_price').val();
    
                // Validation checks
                if (!itemCode || !itemName || !itemQty || !itemPrice) {
                    console.error('ERROR: Missing item details. Code:', itemCode, 'Name:', itemName, 'Qty:', itemQty, 'Price:', itemPrice);
                    alert('All item fields must be filled.');
                    return false; // Exit loop
                }
    
                item_codes.push(itemCode);
                descriptions.push(itemName);
                qtys.push(itemQty);
                amounts.push(itemPrice);
            });
    
            // Validate invoice date
            if (!idate) {
                alert('Invoice date is required.');
                console.error('ERROR: Invoice date is missing.');
                return;
            }
    
            // Prepare data to be sent via POST
            var postData = {
                idate: idate,
                item_code: item_codes,
                desc: descriptions,
                qty: qtys,
                amount: amounts
            };
    
            console.log('Sending AJAX request with data:', postData); // Debugging Log
    
            // Send data via AJAX
            $.ajax({
                url: _url + 'invoices/add-post/',
                method: "POST",
                data: postData,
                success: function (response) {
                    console.log('SUCCESS: Invoice added successfully:', response);
                    window.location.href = _url + 'invoices/list/';
                },
                error: function (xhr, status, error) {
                    console.error('AJAX ERROR:', error);
                    console.error('Status:', status);
                    console.error('Response:', xhr.responseText);
    
                    // Show error message to user
                    alert('Error: Unable to save invoice. Check console logs for details.');
                }
            });
        });
    });
    

    // Update the invoice items from modal selection
    // Update the invoice items from modal selection
$modal.on('click', '.update', function () {
    var tableControl = document.getElementById('items_table');
    $modal.modal('loading');

    $('input:checkbox:checked', tableControl).each(function () {
        var item_code = $(this).closest('tr').find('td:eq(1)').text(); // Extract the item code from the table cell
        var item_name = $(this).closest('tr').find('td:eq(2)').text();
        var item_price = $(this).closest('tr').find('td:eq(3)').text();

        // Remove commas and format price as number with two decimal places
        item_price = item_price.replace(/,/g, '');  // Remove commas
        item_price = parseFloat(item_price).toFixed(2);  // Convert to number and keep two decimal places

        // Add new row with item_code input
        $("#invoice_items tbody")
            .append(
                '<tr>' +
                '<td><input type="hidden" class="form-control item_codes" name="item_codes[]" value="' + item_code + '">' + item_code + '</td>' +
                '<td><input type="text" class="form-control item_name" name="desc[]" value="' + item_name + '"></td>' +
                '<td><input type="text" class="form-control qty" name="qty[]" value="1" min="1" oninput="this.value = Math.max(1, this.value)"></td>' +
                '<td><input type="text" class="form-control item_price" name="amount[]" value="' + item_price + '" readonly></td>' +  <!-- Price as number and read-only -->
                '<td class="ltotal"><input type="text" class="form-control lvtotal" readonly value="' + (item_price * 1).toFixed(2) + '"></td>' +
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
