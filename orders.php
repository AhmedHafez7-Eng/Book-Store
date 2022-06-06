<?php

include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="EGYBOOK Bookstore is one of the leading book seller in Egypt. Boasting more than 7,000 Arabic and foreign titles and aiming to provide the best book shopping experience." />
    <title>EGYBOOK | Orders</title>
    <!-- Tab Icon -->
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS Style File -->
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="heading">
        <h3>your orders</h3>
        <p><a href="home.php">home</a> / orders</p>
    </div>

    <section class="placed-orders">
        <h1 class="title">placed orders</h1>

        <div class="box-container">
            <?php

            $select_orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE user_id = '$user_id'") or die("Query failed: " . mysqli_connect_error());

            if (mysqli_num_rows($select_orders) > 0) {
                while ($row = mysqli_fetch_assoc($select_orders)) {
            ?>

            <div class="box">
                <p>placed on : <span><?php echo $row['name']; ?></span></p>
                <p>email : <span><?php echo $row['email']; ?></span></p>
                <p>phone : <span><?php echo $row['number']; ?></span></p>
                <p>address : <span><?php echo $row['address']; ?></span></p>
                <p>payment method : <span><?php echo $row['method']; ?></span></p>
                <p>your orders : <span><?php echo $row['total_products']; ?></span></p>
                <p>total price : <span>$<?php echo $row['total_price']; ?>/-</span></p>
                <p>payment status : <span style="color:<?php if ($row['payment_status'] == 'pending') {
                                                                    echo 'var(--orange)';
                                                                } else {
                                                                    echo 'var(--purple)';
                                                                } ?>"><?php echo $row['payment_status']; ?></span></p>
            </div>

            <?php
                }
            } else {
                echo "<p class='empty'>You have no orders placed</p>";
            }
            ?>
        </div>
    </section>



    <?php include 'footer.php'; ?>

    <script src="js/main.js"></script>
</body>

</html>