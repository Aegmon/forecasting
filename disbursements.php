<?php
session_start(); // Ensure session is started

$host = 'localhost';
$dbname = 'forecast';
$username = 'root';
$password = '';

// Connect to the database
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to Create a Disbursement Entry
function createDisbursement($user_id, $particulars, $amount, $status) {
    global $conn;

    // Check if "initial balance" exists for the user
    if ($particulars == 'initial balance') {
        $checkSql = "SELECT * FROM disbursements WHERE user_id = ? AND particulars = 'initial balance'";
        $stmt = $conn->prepare($checkSql);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('Initial balance has already been entered for this user.');</script>";
            return;
        }
    }

    // Prepare the insert statement
    $sql = "INSERT INTO disbursements (user_id, particulars, amount, status) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('isds', $user_id, $particulars, $amount, $status);
    
    if ($stmt->execute()) {
        echo "<script>alert('Disbursement entry created successfully!');</script>";
    } else {
        echo "<script>alert('Error inserting record: " . $stmt->error . "');</script>";
    }
}

// Function to Read All Disbursements
function getDisbursements($user_id) {
    global $conn;
    $sql = "SELECT * FROM disbursements WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $disbursements = [];
    while ($row = $result->fetch_assoc()) {
        $disbursements[] = $row;
    }
    return $disbursements;
}

// Function to Update a Disbursement Entry
function updateDisbursement($id, $particulars, $amount, $status) {
    global $conn;

    // Check if "initial balance" entry is being updated
    if ($particulars == 'initial balance') {
        echo "<script>alert('You cannot change the status of the initial balance.');</script>";
        return;
    }

    $sql = "UPDATE disbursements SET particulars = ?, amount = ?, status = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sdsi', $particulars, $amount, $status, $id);
    
    if ($stmt->execute()) {
        echo "<script>alert('Disbursement entry updated successfully!');</script>";
    } else {
        echo "<script>alert('Error updating record: " . $stmt->error . "');</script>";
    }
}

// Function to Delete a Disbursement Entry
function deleteDisbursement($id) {
    global $conn;
    
    $sql = "DELETE FROM disbursements WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    
    if ($stmt->execute()) {
        echo "<script>alert('Disbursement entry deleted successfully!');</script>";
    } else {
        echo "<script>alert('Error deleting record: " . $stmt->error . "');</script>";
    }
}

// Handling form submission for Create, Update, Delete actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $user_id = $_SESSION['uid']; // Logged in user ID
    $particulars = $_POST['particulars'] ?? '';
    $amount = $_POST['amount'] ?? 0;
    $status = $_POST['status'] ?? 'add';
    if ($action == 'delete') {
        $id = $_POST['id'];
        deleteDisbursement($id);
    } else {
    if (empty($particulars) || empty($status) || empty($amount)) {
        echo "<script>alert('All fields are required.');</script>";
    }
}

    // Handle Create Action
    if ($action == 'create') {
        createDisbursement($user_id, $particulars, $amount, $status);
    }
    // Handle Update Action
    elseif ($action == 'update') {
        $id = $_POST['id'];
        updateDisbursement($id, $particulars, $amount, $status);
    }
    // Handle Delete Action
   
}

// Fetch all disbursements for display
$disbursements = getDisbursements($_SESSION['uid']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Disbursements</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: white;
            margin: 20px;
            padding: 10px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .table {
            width: 100%;
            margin-top: 20px;
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

        .modal-header {
            background-color: #2575fc;
            color: #003366;
        }

        .modal-body label {
            color: #003366;
        }

        .btn-primary, .btn-danger {
            color: #003366;
        }
    </style>
</head>
<body>
    <h2>Manage Disbursements</h2>

    <!-- Button to trigger modal for adding disbursement -->
    <button class="btn btn-primary" data-toggle="modal" data-target="#addDisbursementModal">Add Disbursement</button>


    <button class="btn btn-secondary" data-toggle="modal" data-target="#viewDisbursementModal">View Disbursement</button>

<!-- View Disbursement Modal -->
<div class="modal fade" id="viewDisbursementModal" tabindex="-1" role="dialog" aria-labelledby="viewDisbursementModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewDisbursementModalLabel">View Disbursement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Table to display disbursements -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Particulars</th>
                            <th>Amount</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $disbursements = getDisbursements($_SESSION['uid']);
                            $initialBalance = 0;
                            $total = 0;
                            $balance = 0;

                            foreach ($disbursements as $disbursement) {
                                if ($disbursement['particulars'] == 'initial balance') {
                                    $initialBalance = $disbursement['amount'];
                                    $balance = $initialBalance;
                                    echo "<tr>
                                            <td>Initial Balance</td>
                                            <td>{$disbursement['amount']}</td>
                                            <td>{$balance}</td>
                                          </tr>";
                                }
                            }

                            // Display "Add" and "Less" entries
                            foreach ($disbursements as $disbursement) {
                                if ($disbursement['particulars'] != 'initial balance') {
                                    if ($disbursement['status'] == 'add') {
                                        $balance += $disbursement['amount'];
                                    } else if ($disbursement['status'] == 'less') {
                                        $balance -= $disbursement['amount'];
                                    }
                                    echo "<tr>
                                            <td>{$disbursement['particulars']}</td>
                                            <td>{$disbursement['amount']}</td>
                                            <td>{$balance}</td>
                                          </tr>";
                                }
                            }

                            // Final balance row
                            echo "<tr>
                                    <td><strong>Balance</strong></td>
                                    <td></td>
                                    <td><strong>{$balance}</strong></td>
                                  </tr>";
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




    <!-- Add Disbursement Modal -->
    <div class="modal fade" id="addDisbursementModal" tabindex="-1" role="dialog" aria-labelledby="addDisbursementModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDisbursementModalLabel">Add Disbursement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="action" value="create">
                        <div class="form-group">
                            <label for="particulars">Particulars</label>
                            <input type="text" class="form-control" name="particulars" id="particulars" required>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" class="form-control" name="amount" required step="0.01">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value="add">Add</option>
                                <option value="less">Less</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Disbursement Table -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Particulars</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($disbursements as $disbursement): ?>
                    <tr>
                        <td><?= $disbursement['id']; ?></td>
                        <td><?= $disbursement['particulars']; ?></td>
                        <td><?= $disbursement['amount']; ?></td>
                        <td><?= $disbursement['status']; ?></td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editDisbursementModal" onclick="editDisbursement(<?= $disbursement['id']; ?>)">Edit</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteDisbursement(<?= $disbursement['id']; ?>)">Delete</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Edit Disbursement Modal (Hidden for now, opened via JavaScript) -->
    <div class="modal fade" id="editDisbursementModal" tabindex="-1" role="dialog" aria-labelledby="editDisbursementModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editDisbursementModalLabel">Edit Disbursement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id" id="editId">
                        <div class="form-group">
                            <label for="editParticulars">Particulars</label>
                            <input type="text" class="form-control" name="particulars" id="editParticulars" required>
                        </div>
                        <div class="form-group">
                            <label for="editAmount">Amount</label>
                            <input type="number" class="form-control" name="amount" id="editAmount" required step="0.01">
                        </div>
                        <div class="form-group">
                            <label for="editStatus">Status</label>
                            <select class="form-control" name="status" id="editStatus" required>
                                <option value="add">Add</option>
                                <option value="less">Less</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Populate the edit modal with data
        function editDisbursement(id) {
            const disbursement = <?php echo json_encode($disbursements); ?>.find(item => item.id === id);
            
            if (disbursement) {
                document.getElementById('editId').value = disbursement.id;
                document.getElementById('editParticulars').value = disbursement.particulars;
                document.getElementById('editAmount').value = disbursement.amount;
                document.getElementById('editStatus').value = disbursement.status;
            }
        }

        // Delete disbursement entry
        function deleteDisbursement(id) {
            if (confirm('Are you sure you want to delete this disbursement entry?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '';
                const actionField = document.createElement('input');
                actionField.type = 'hidden';
                actionField.name = 'action';
                actionField.value = 'delete';
                form.appendChild(actionField);
                const idField = document.createElement('input');
                idField.type = 'hidden';
                idField.name = 'id';
                idField.value = id;
                
                form.appendChild(idField);
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</body>
</html>
