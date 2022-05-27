<?php

include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('Location: login.php');
}

if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $check_cart_number = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id' AND name = '$product_name'") or die("Query failed: " . mysqli_connect_error());

    if (mysqli_num_rows($check_cart_number) > 0) {
        $message[] = "Product already in cart";
    } else {
        $insert_cart = mysqli_query($conn, "INSERT INTO cart (user_id, name, price, image, quantity) VALUES ('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die("Query failed: " . mysqli_connect_error());
        $message[] = "Product added to cart";
    }
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
    <title>EGYBOOK | Home</title>
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


    <section class="home">
        <div class="content">
            <h3>Hand Picked book to your door.</h3>
            <p>EGYBOOK Bookstore is one of the leading book seller in Egypt. Boasting more than 7,000 Arabic and foreign
                titles and aiming to provide the best book shopping experience.</p>
            <a href="about.php" class="white-btn">discover more</a>
        </div>
    </section>

    <section class="home-products">
        <h1 class="title">latest Books</h1>
        <div class="box-container">
            <?php
            $number_to_show = 3;
            $select_products = mysqli_query($conn, "SELECT * FROM products LIMIT 0,$number_to_show") or die("Query failed: " . mysqli_connect_error());

            if (mysqli_num_rows($select_products) > 0) {
                while ($row = mysqli_fetch_assoc($select_products)) {

            ?>

            <form action="" method="post" class="box" id="result_para">
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
        <input type="hidden" id="result_no" value="3">
        <input type="button" id="load" value="Load More Results" class="option-btn">
    </section>

    <section class="home-about">
        <h1 class="title">About EGYBOOK</h1>
        <div class="flex">
            <div class="imgBx">
                <img src="img/about-img.jpg" alt="about">
            </div>
            <div class="content">
                <p><span>EGY<span>BOOK</span></span> Bookstore is one of the leading book seller in Egypt. Boasting more
                    than 7,000
                    Arabic and
                    foreign
                    titles and aiming to provide the best book shopping experience.</p>
                <a href="about.php" class="white-btn">discover more</a>
            </div>
        </div>
    </section>

    <section class="home-contact">
        <div class="content">
            <h3>have any questions</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores, deleniti dolor. Voluptates assumenda,
                iusto, et quos, quasi tempore totam nihil commodi illo suscipit optio eos ex dignissimos magnam
                praesentium
                hic distinctio obcaecati animi accusamus debitis. Assumenda, ut! Tenetur, dolores veritatis!</p>
            <a href="contact.php" class="white-btn">contact us</a>
        </div>
    </section>


    <?php include 'footer.php'; ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>


    <!-- Load more 3 products each time clicking on load more button -->
    <script type="text/javascript">
    $(document).ready(function() {
        $("#load").click(function() {
            loadmore();
        });
    });

    function loadmore() {
        var val = document.getElementById("result_no").value;
        $.ajax({
            type: 'post',
            url: 'load_more.php',
            data: {
                getresult: val
            },
            success: function(response) {
                var content = document.getElementById("result_para");
                content.parentElement.insertAdjacentHTML('beforeend', response);

                // We increase the value by 2 because we limit the results by 2
                document.getElementById("result_no").value = Number(val) + 3;
            }
        });
    }
    </script>




    <script src="js/main.js"></script>
</body>

</html>