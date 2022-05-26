<?php

include '../config.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('Location: ../login.php');
};

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="EGYBOOK Bookstore is one of the leading book seller in Egypt. Boasting more than 7,000 Arabic and foreign titles and aiming to provide the best book shopping experience." />
    <title>EGYBOOK</title>
    <!-- Tab Icon -->
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS Style File -->
    <link rel="stylesheet" href="../css/admin_styles.css">
</head>

<body>
    <?php include 'admin_header.php'; ?>

    <!-- Start Admin Dashboard -->
    <section class="dashboard">
        <h1 class="title">Dashboard</h1>
        <div class="box-container">

            <!-- Pending Orders -->
            <div class="box">
                <?php
                $total_pendings = 0;
                $select_pending = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'pending'") or die("Query failed: " . mysqli_connect_error());

                if (mysqli_num_rows($select_pending) > 0) {
                    while ($fetch_pendings = mysqli_fetch_assoc($select_pending)) {
                        $total_price = $fetch_pendings['total_price'];
                        $total_pendings += $total_price;
                    };
                };
                ?>
                <h3>$<?php echo $total_pendings; ?>/-</h3>
                <p>total pendings</p>
            </div>

            <!-- Completed Orders -->
            <div class="box">
                <?php

                $total_completed = 0;
                $select_completed = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'completed'") or die("Query failed: " . mysqli_connect_error());

                if (mysqli_num_rows($select_completed) > 0) {
                    while ($fetch_completed = mysqli_fetch_assoc($select_completed)) {
                        $total_price = $fetch_completed['total_price'];
                        $total_completed += $total_price;
                    };
                };
                ?>
                <h3>$<?php echo $total_completed; ?>/-</h3>
                <p>completed payments</p>
            </div>

            <!-- All Orders -->
            <div class="box">
                <?php
                $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die("Query failed: " . mysqli_connect_error());
                $number_of_orders = mysqli_num_rows($select_orders);
                ?>
                <h3><?php echo $number_of_orders; ?></h3>
                <p>orders placed</p>
            </div>

            <!-- Products -->
            <div class="box">
                <?php
                $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die("Query failed: " . mysqli_connect_error());
                $number_of_products = mysqli_num_rows($select_products);
                ?>
                <h3><?php echo $number_of_products; ?></h3>
                <p>products added</p>
            </div>

            <!-- Users -->
            <div class="box">
                <?php
                $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type='user'") or die("Query failed: " . mysqli_connect_error());
                $number_of_users = mysqli_num_rows($select_users);
                ?>
                <h3><?php echo $number_of_users; ?></h3>
                <p>registered users</p>
            </div>

            <!-- Admins -->
            <div class="box">
                <?php
                $select_admins = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type='admin'") or die("Query failed: " . mysqli_connect_error());
                $number_of_admins = mysqli_num_rows($select_admins);
                ?>
                <h3><?php echo $number_of_admins; ?></h3>
                <p>admins</p>
            </div>

            <!-- Accounts -->
            <div class="box">
                <?php
                $select_accounts = mysqli_query($conn, "SELECT * FROM `users`") or die("Query failed: " . mysqli_connect_error());
                $number_of_accounts = mysqli_num_rows($select_accounts);
                ?>
                <h3><?php echo $number_of_accounts; ?></h3>
                <p>Total Accounts</p>
            </div>

            <!-- Messages -->
            <div class="box">
                <?php
                $select_messages = mysqli_query($conn, "SELECT * FROM `message` WHERE msg_status='unread'") or die("Query failed: " . mysqli_connect_error());
                $number_of_messages = mysqli_num_rows($select_messages);
                ?>
                <h3><?php echo $number_of_messages; ?></h3>
                <p>new messages</p>
            </div>
        </div>
    </section>









    <!-- Custom admin js file -->
    <script src="../js/admin_script.js"></script>
</body>

</html>