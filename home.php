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
    <meta name="description" content="EGYBOOK Bookstore is one of the leading book seller in Egypt. Boasting more than 7,000 Arabic and foreign titles and aiming to provide the best book shopping experience." />
    <title>EGYBOOK | Home</title>
    <!-- Tab Icon -->
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS Style File -->
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php include 'header.php'; ?>


    <section class="home">
        <div class="content">
            <h3>Hand Picked book to your door.</h3>
            <p>EGYBOOK Bookstore is one of the leading book seller in Egypt. Boasting more than 7,000 Arabic and foreign
                titles and aiming to provide the best book shopping experience.</p>
            <a href="about.php" class="white-btn">discover more</a>
        </div>
    </section>

    <section class="home-products">
        <h1 class="title">Our Books</h1>
        <div class="box-container">
            <?php
            $select_products = mysqli_query($conn, "SELECT * FROM products") or die("Query failed: " . mysqli_connect_error());

            if (mysqli_num_rows($select_products) > 0) {
                while ($row = mysqli_fetch_assoc($select_products)) {

            ?>

                    <form action="" method="post" class="box">
                        <img src="uploaded_img/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>">
                        <div class="name"><?php echo $row['name']; ?></div>
                        <div class="price">EGP <?php echo $row['price']; ?>/-</div>
                        <input type="number" name="product_quantity" min="1" value="1" class="quantity">
                        <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
                        <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                    </form>

            <?php
                }
            } else {
                echo '<p class="empty">No products added yet!</p>';
            }
            ?>
        </div>
    </section>

















    <?php include 'footer.php'; ?>

    <script src="js/main.js"></script>
</body>

</html>