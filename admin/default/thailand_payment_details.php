<?php
include "../../connection.php";
session_start();
if (!isset($_SESSION["userid"])) {
    header("Location:../index");
}
?>
<?php $page = "";
include("./incluede/header.php") ?>
<!-- Main Content -->
<style>
    .form-row {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 10px;
        text-align: center;
    }

    .form-row label {
        margin-bottom: 5px;
    }

    .form-row select,
    .form-row input[type="date"] {
        width: 200px;
    }
</style>
<?php
function sanitize_input($conn, $data)
{
    $data = trim($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $pay_id = $_POST['pay_id'];
    if (!empty($_POST['status']) && !empty($_POST['wallet_id']) && !empty($_POST['amount'])) {
        $status = sanitize_input($conn, $_POST['status']);
        $wallet_id = sanitize_input($conn, $_POST['wallet_id']);
        $amount = sanitize_input($conn, $_POST['amount']);
        $transactions_id = sanitize_input($conn, $_POST['transactions_id']);
        $wallet_balance = sanitize_input($conn, $_POST['wallet_balance']);
        $remaining_balance = $wallet_balance + $amount;
        $type = sanitize_input($conn, $_POST['type']);
        $update_query = "UPDATE thailand_payment SET status = '$status' WHERE pay_id = $pay_id";
        $sql2 = "UPDATE wallets SET wallet_balance = wallet_balance + $amount WHERE id_wallet = $wallet_id";
        $sql3 = "INSERT INTO transactions (wallet_id,amount,transactions_id,remaining_balance,type) VALUES ('$wallet_id','$amount','$transactions_id','$remaining_balance','$type')";
        if (mysqli_query($conn, $sql2)) {
            if (mysqli_query($conn, $sql3)) {
                if (mysqli_query($conn, $update_query)) {
                    echo "<script>alert('Add updated successfully.');
                        window.location.href = 'thailand_payment';
                        </script>";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            }
        }
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $pay_id = $_POST['pay_id'];
    $status = sanitize_input($conn, $_POST['status']);
    $feedback = sanitize_input($conn, $_POST['feedback']);

    // $prices = sanitize_input($conn, $_POST['prices']);
    $update_query = "UPDATE thailand_payment SET status = '$status',feedback = '$feedback' WHERE pay_id = $pay_id";
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('status updated successfully.');
        window.location.href = 'thailand_payment';
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }  
} elseif (isset($_GET['pay_id'])) {
    $pay_id = $_GET['pay_id'];
    // Retrieve trans details from the database
    $query = "SELECT * FROM thailand_payment WHERE pay_id = $pay_id";
    $result = mysqli_query($conn, $query);
    // $row = mysqli_fetch_assoc($result);
    $trans = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
} else {
    header("Location:thailand_payment");
    exit;
}
?>
<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <div class="pb-3">
                <h1><b><i>User Payment Details</i></b></h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-grid">
                        <div class="card-body collapse show" id="card1">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <input type="hidden" name="pay_id" value="<?php echo $trans['pay_id']; ?>">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="">Account Email</label>
                                            <input type="text" class="form-control" placeholder="" name="" value="<?php echo htmlspecialchars($trans['account_details']); ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="">Description</label>
                                            <input type="text" class="form-control" placeholder="" name="" value="<?php echo htmlspecialchars($trans['description']); ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="">Payment Date</label>
                                            <input type="text" class="form-control" placeholder="" name="" value="<?php echo htmlspecialchars($trans['payment_date']); ?>" required readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="">Payment Details</label>
                                            <input type="text" class="form-control" placeholder="" name="transactions_id" value="<?php echo htmlspecialchars($trans['payment_id']); ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="">User Ammount</label>
                                            <input type="text" class="form-control" placeholder="" name="" value="<?php echo htmlspecialchars($trans['user_ammount']); ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="">Payments Details</label>
                                            <td><a href="../../users/payment/<?php echo $trans['file'] ?>" target="_blank"><img src="../../users/payment/<?php echo $trans['file'] ?>" alt="" width="250px" height="150px" style="border-radius: 10px;"></a></td>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <!-- <div class="form-group">
                                                <label class="form-label" for="">Payment Details</label>
                                                <input type="text" class="form-control" placeholder="" name="" value="<?php echo htmlspecialchars($trans['payment_id']); ?>" required readonly>
                                            </div> -->
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="">Status :</label>
                                            <input type="radio" name="status" value="Pending" <?php if ($trans['status'] == 'Pending') echo 'checked'; ?>> Pending
                                            <input type="radio" name="status" value="Denied" id="denied_radio" <?php if ($trans['status'] == 'Denied') echo 'checked'; ?>> Denied
                                            <input type="radio" name="status" value="Accept" id="accept_radio" <?php if ($trans['status'] == 'Accept') echo 'checked'; ?>> Accept
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- <div class="form-group">
                                                <label class="form-label" for=""></label>
                                                <input type="text" class="form-control" placeholder="" name="" value="<?php echo htmlspecialchars($trans['payment_date']); ?>" required readonly>
                                            </div> -->
                                    </div>
                                </div>
                                <div class="row" id="denied" style="display: none;">
                                    <div class="col-sm-4 mb-3 ">
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="">Message</label>
                                            <input type="text" class="form-control" placeholder="" name="feedback" value=" <?php if (isset($trans['feedback'])) echo htmlspecialchars($trans['feedback']) ?>" required y>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="accept" style="display: none;">
                                    <?php
                                    $sql = "SELECT * FROM `wallets`
                                            JOIN `users` ON `users`.`email` = `wallets`.`user_id`
                                            WHERE `wallets`.`user_id` = '$trans[account_details]'";

                                    $result = mysqli_query($conn, $sql);
                                    $user = mysqli_fetch_assoc($result);
                                    ?>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="">Name</label>
                                            <input type="text" class="form-control" placeholder="" name="" value="<?php echo htmlspecialchars($user['name']); ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="">Account Email</label>
                                            <input type="text" class="form-control" placeholder="" name="" value="<?php echo htmlspecialchars($user['user_id']); ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="">Wallet Balance</label>
                                            <input type="text" class="form-control" placeholder="" name="wallet_balance" id="initial_balance" value="<?php echo htmlspecialchars($user['wallet_balance']); ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="">Type</label>
                                            <input type="text" class="form-control" placeholder="" name="type" value="credit" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="">Add Wallet Balance</label>
                                            <input type="number" class="form-control" placeholder="" id="add_ammount" name="amount" value="" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="">Message</label>
                                            <input type="text" class="form-control" placeholder="" name="message" value="" required>
                                        </div>
                                        <input type="hidden" name="wallet_id" id="" value="<?php echo $user['id_wallet'] ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 offset-4">
                                        <button type="submit" class="btn btn-sm btn-primary btn-block" name="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php include("./incluede/footer.php") ?>
                    <script>
                        $(document).ready(function() {
                            function toggleDeniedVisibility() {
                                if ($('#denied_radio').is(':checked')) {
                                    $('#denied').show();
                                } else {
                                    $('#denied').hide();
                                }
                            }
                            toggleDeniedVisibility();
                            $('input[type=radio][name=status]').change(function() {
                                if ($(this).val() !== 'Denied') {
                                    $('#denied').hide();
                                } else {
                                    toggleDeniedVisibility();
                                }
                            });
                        });
                    </script>
                    <script>
                        $(document).ready(function() {
                            function toggleDeniedVisibility() {
                                if ($('#accept_radio').is(':checked')) {
                                    $('#accept').show();
                                } else {
                                    $('#accept').hide();
                                }
                            }
                            toggleDeniedVisibility();
                            $('input[type=radio][name=status]').change(function() {
                                if ($(this).val() !== 'Accept') {
                                    $('#accept').hide();
                                } else {
                                    toggleDeniedVisibility();
                                }
                            });
                        });
                    </script>
                    <!-- <script>
    // Get initial balance from the initial_balance input
    var initialBalance = parseFloat(document.getElementById('initial_balance').value);
    
    // Function to update remaining balance
    function updateRemainingBalance() {
        // Get the value of amount to add
        var addAmount = parseFloat(document.getElementById('add_amount').value);
        
        // Calculate remaining balance
        var remainingBalance = initialBalance + addAmount;
        
        // Update remaining balance input value
        document.getElementById('remaining_balance').value = remainingBalance.toFixed(2); // Adjust decimal places as needed
    }
    
    // Update remaining balance on input change
    document.getElementById('add_amount').addEventListener('input', updateRemainingBalance);
</script> -->
                    <script>
                        // Function to insert data
                        function insertData() {
                            // Your code to insert data goes here
                            // For demonstration purposes, I'm just logging the message
                            console.log("Data inserted");
                        }

                        // Function to calculate remaining balance and display it on mouseover
                        function calculateAndDisplay() {
                            // Get initial balance from the initial_balance input
                            var initialBalance = parseFloat(document.getElementById('initial_balance').value);

                            // Get the value of amount to add
                            var addAmount = parseFloat(document.getElementById('add_amount').value);

                            // Calculate remaining balance
                            var remainingBalance = initialBalance + addAmount;

                            // Display calculation result
                            alert("Remaining Balance: " + remainingBalance.toFixed(2)); // Adjust decimal places as needed
                        }

                        // Add click event listener to the element with id "add_amount" for inserting data
                        document.getElementById('add_amount').addEventListener('click', insertData);

                        // Add mouseover event listener to the element with id "add_amount" for calculating and displaying remaining balance
                        document.getElementById('add_amount').addEventListener('mouseover', calculateAndDisplay);
                    </script>