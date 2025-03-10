<?php
// Database connection (update with your DB credentials)
$host = 'localhost';
$dbname = 'forecast';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to Create (Insert) a Chart of Account
function createChartAccount($account_number, $description, $asset_type, $statement) {
    global $conn;
    
    // Prepare SQL query
    $sql = "INSERT INTO chartsaccount (account_number, description, asset_type, statement) 
            VALUES (?, ?, ?, ?)";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    
    // Check if preparation was successful
    if ($stmt === false) {
        die("Error preparing query: " . $conn->error);
    }

    // Bind parameters to the SQL query
    $stmt->bind_param('ssss', $account_number, $description, $asset_type, $statement);

    // Execute the query
    if ($stmt->execute()) {
        return $conn->insert_id;
    } else {
        die("Error inserting record: " . $stmt->error);
    }
}

// Function to Read (Get) all Chart Accounts
function getChartAccounts() {
    global $conn;
    $sql = "SELECT * FROM chartsaccount";
    $result = $conn->query($sql);
    $accounts = [];
    while ($row = $result->fetch_assoc()) {
        $accounts[] = $row;
    }
    return $accounts;
}

// Function to Read (Get) Chart Accounts by Asset Type
function getChartAccountsByType($type) {
    global $conn;
    $sql = "SELECT * FROM chartsaccount WHERE asset_type = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $type);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $accounts = [];
    while ($row = $result->fetch_assoc()) {
        $accounts[] = $row;
    }
    return $accounts;
}

// Function to Update a Chart of Account
function updateChartAccount($id, $account_number, $description, $asset_type, $statement) {
    global $conn;
    
    $sql = "UPDATE chartsaccount 
            SET account_number = ?, description = ?, asset_type = ?, statement = ?, updated_at = CURRENT_TIMESTAMP
            WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssi', $account_number, $description, $asset_type, $statement, $id);
    
    if ($stmt->execute()) {
        return $stmt->affected_rows;
    } else {
        die("Error updating record: " . $stmt->error);
    }
}

// Check if the delete parameter is set in the URL
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    // Validate and sanitize the ID
    $id = (int)$id;  // Ensure the ID is an integer

    // Call delete function
    if ($id > 0) {
        deleteChartAccount($id);
        echo "<p>Account deleted successfully!</p>";
    } else {
        echo "<p>Invalid account ID.</p>";
    }
}


// Function to Delete a Chart of Account
function deleteChartAccount($id) {
    global $conn;
    
    $sql = "DELETE FROM chartsaccount WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    
    if ($stmt->execute()) {
        return $stmt->affected_rows;
    } else {
        die("Error deleting record: " . $stmt->error);
    }
}

// Handling form submission for Create, Update, Delete actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input data
    $action = $_POST['action'] ?? '';
    $account_number = $_POST['account_number'] ?? '';
    $description = $_POST['description'] ?? '';
    $asset_type = $_POST['asset_type'] ?? '';
    $statement = $_POST['statement'] ?? '';

    // Validate required fields
    if (empty($account_number) || empty($description) || empty($asset_type) || empty($statement)) {
        die("All fields are required.");
    }

    // Handle Create Action
    if ($action == 'create') {
        createChartAccount($account_number, $description, $asset_type, $statement);
        echo "<p>Account created successfully!</p>";
    } 
    // Handle Update Action
    elseif ($action == 'update') {
        $id = $_POST['id'];
        updateChartAccount($id, $account_number, $description, $asset_type, $statement);
        echo "<p>Account updated successfully!</p>";
    } 
    // Handle Delete Action
    elseif ($action == 'delete') {
        $id = $_POST['id'];
        deleteChartAccount($id);
        echo "<p>Account deleted successfully!</p>";
    }
}

// Fetch all chart accounts for display
$accounts = getChartAccounts();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart of Accounts</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            margin: 20px;
            padding: 10px;
        }

        h2, h3 {
            color: #fff;
            text-align: center;
            margin-bottom: 30px;
        }

        .tab-content {
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #2575fc;
            color: white;
        }

        td {
            background-color: #f9f9f9;
            color: #333;
        }

        .btn {
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #2575fc;
            border-color: #2575fc;
        }

        .btn-primary:hover {
            background-color: #6a11cb;
            border-color: #6a11cb;
        }

        .btn-danger {
            background-color: #e74a3b;
            border-color: #e74a3b;
        }

        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }

        .form-container {
            margin: 20px 0;
        }

        .form-container input, .form-container select {
            border-radius: 5px;
            padding: 10px;
        }

        .modal-content {
            background-color: #ffffff;
            color: #333;
            border-radius: 8px;
        }

        .modal-header {
            background-color: #2575fc;
            color: white;
            border-radius: 8px 8px 0 0;
        }

        .modal-body {
            background-color: #f7f7f7;
        }
    </style>
</head>
<body>

    <h2>Chart of Accounts Management</h2>

    <!-- Button to trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#accountModal">Add New Account</button>

    <!-- Nav Tabs for filtering account types -->
    <ul class="nav nav-tabs" id="accountTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">List All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="asset-tab" data-toggle="tab" href="#asset" role="tab" aria-controls="asset" aria-selected="false">Asset</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="liability-tab" data-toggle="tab" href="#liability" role="tab" aria-controls="liability" aria-selected="false">Liability</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="expense-tab" data-toggle="tab" href="#expense" role="tab" aria-controls="expense" aria-selected="false">Expense</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="equity-tab" data-toggle="tab" href="#equity" role="tab" aria-controls="equity" aria-selected="false">Equity</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="revenue-tab" data-toggle="tab" href="#revenue" role="tab" aria-controls="revenue" aria-selected="false">Revenue</a>
        </li>
    </ul>

    <!-- Tab Contents -->
    <div class="tab-content" id="accountTabsContent">
        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <h3>Chart of Accounts</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Account #</th>
                        <th>Description</th>
                        <th>Asset Type</th>
                        <th>Statement</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($accounts as $account) : ?>
                        <tr>
                            <td><?= $account['account_number'] ?></td>
                            <td><?= $account['description'] ?></td>
                            <td><?= $account['asset_type'] ?></td>
                            <td><?= $account['statement'] ?></td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#accountModal" data-id="<?= $account['id'] ?>" data-account_number="<?= $account['account_number'] ?>" data-description="<?= $account['description'] ?>" data-asset_type="<?= $account['asset_type'] ?>" data-statement="<?= $account['statement'] ?>">Edit</button>
                                <a href="?delete=<?= $account['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

       <!-- Filtered Tabs -->
<div class="tab-pane fade" id="asset" role="tabpanel" aria-labelledby="asset-tab">
    <h3>Asset Accounts</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Account #</th>
                <th>Description</th>
                <th>Asset Type</th>
                <th>Statement</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (getChartAccountsByType('Asset') as $account) : ?>
                <tr>
                    <td><?= $account['account_number'] ?></td>
                    <td><?= $account['description'] ?></td>
                    <td><?= $account['asset_type'] ?></td>
                    <td><?= $account['statement'] ?></td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#accountModal" data-id="<?= $account['id'] ?>" data-account_number="<?= $account['account_number'] ?>" data-description="<?= $account['description'] ?>" data-asset_type="<?= $account['asset_type'] ?>" data-statement="<?= $account['statement'] ?>">Edit</button>
                        <a href="?delete=<?= $account['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="tab-pane fade" id="liability" role="tabpanel" aria-labelledby="liability-tab">
    <h3>Liability Accounts</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Account #</th>
                <th>Description</th>
                <th>Asset Type</th>
                <th>Statement</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (getChartAccountsByType('Liability') as $account) : ?>
                <tr>
                    <td><?= $account['account_number'] ?></td>
                    <td><?= $account['description'] ?></td>
                    <td><?= $account['asset_type'] ?></td>
                    <td><?= $account['statement'] ?></td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#accountModal" data-id="<?= $account['id'] ?>" data-account_number="<?= $account['account_number'] ?>" data-description="<?= $account['description'] ?>" data-asset_type="<?= $account['asset_type'] ?>" data-statement="<?= $account['statement'] ?>">Edit</button>
                        <a href="?delete=<?= $account['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="tab-pane fade" id="expense" role="tabpanel" aria-labelledby="expense-tab">
    <h3>Expense Accounts</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Account #</th>
                <th>Description</th>
                <th>Asset Type</th>
                <th>Statement</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (getChartAccountsByType('Expense') as $account) : ?>
                <tr>
                    <td><?= $account['account_number'] ?></td>
                    <td><?= $account['description'] ?></td>
                    <td><?= $account['asset_type'] ?></td>
                    <td><?= $account['statement'] ?></td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#accountModal" data-id="<?= $account['id'] ?>" data-account_number="<?= $account['account_number'] ?>" data-description="<?= $account['description'] ?>" data-asset_type="<?= $account['asset_type'] ?>" data-statement="<?= $account['statement'] ?>">Edit</button>
                        <a href="?delete=<?= $account['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="tab-pane fade" id="equity" role="tabpanel" aria-labelledby="equity-tab">
    <h3>Equity Accounts</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Account #</th>
                <th>Description</th>
                <th>Asset Type</th>
                <th>Statement</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (getChartAccountsByType('Equity') as $account) : ?>
                <tr>
                    <td><?= $account['account_number'] ?></td>
                    <td><?= $account['description'] ?></td>
                    <td><?= $account['asset_type'] ?></td>
                    <td><?= $account['statement'] ?></td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#accountModal" data-id="<?= $account['id'] ?>" data-account_number="<?= $account['account_number'] ?>" data-description="<?= $account['description'] ?>" data-asset_type="<?= $account['asset_type'] ?>" data-statement="<?= $account['statement'] ?>">Edit</button>
                        <a href="?delete=<?= $account['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="tab-pane fade" id="revenue" role="tabpanel" aria-labelledby="revenue-tab">
    <h3>Revenue Accounts</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Account #</th>
                <th>Description</th>
                <th>Asset Type</th>
                <th>Statement</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (getChartAccountsByType('Revenue') as $account) : ?>
                <tr>
                    <td><?= $account['account_number'] ?></td>
                    <td><?= $account['description'] ?></td>
                    <td><?= $account['asset_type'] ?></td>
                    <td><?= $account['statement'] ?></td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#accountModal" data-id="<?= $account['id'] ?>" data-account_number="<?= $account['account_number'] ?>" data-description="<?= $account['description'] ?>" data-asset_type="<?= $account['asset_type'] ?>" data-statement="<?= $account['statement'] ?>">Edit</button>
                        <a href="?delete=<?= $account['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this account?')">Delete</a>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

        <!-- Similarly add for Liability, Expense, Equity, Revenue tabs -->
    </div>

    <!-- Modal for Create/Update -->
    <div class="modal fade" id="accountModal" tabindex="-1" role="dialog" aria-labelledby="accountModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="accountModalLabel">Add / Update Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <input type="hidden" name="id" id="accountId">
                        <input type="hidden" name="action" id="action">

                        <div class="form-group">
                            <label for="account_number">Account Number</label>
                            <input type="text" class="form-control" name="account_number" id="account_number" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description" required>
                        </div>

                        <div class="form-group">
                            <label for="asset_type">Asset Type</label>
                            <select class="form-control" name="asset_type" id="asset_type" required>
                                <option value="Asset">Asset</option>
                                <option value="Liability">Liability</option>
                                <option value="Equity">Equity</option>
                                <option value="Expense">Expense</option>
                                <option value="Revenue">Revenue</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="statement">Statement</label>
                            <select class="form-control" name="statement" id="statement" required>
                                <option value="Balance Sheet">Balance Sheet</option>
                                <option value="Income Statement">Income Statement</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal JS and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Populate modal for editing existing accounts
        $('#accountModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id');
            var account_number = button.data('account_number');
            var description = button.data('description');
            var asset_type = button.data('asset_type');
            var statement = button.data('statement');

            var modal = $(this);
            modal.find('.modal-title').text(id ? 'Edit Account' : 'Add New Account');
            modal.find('#accountId').val(id);
            modal.find('#account_number').val(account_number);
            modal.find('#description').val(description);
            modal.find('#asset_type').val(asset_type);
            modal.find('#statement').val(statement);
            modal.find('#action').val(id ? 'update' : 'create');
        });
    </script>
</body>
</html>
