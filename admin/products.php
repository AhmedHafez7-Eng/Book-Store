<?php

include '../config.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('Location: ../login.php');
};

if (isset($_POST['add_product'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = $_POST['price'];
    $image = basename($_FILES['image']['name']);
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../uploaded_img/' . $image;

    $select_product_name = mysqli_query($conn, "SELECT name FROM products WHERE name = '$name'") or die("Query failed: " . mysqli_connect_error());

    if (mysqli_num_rows($select_product_name) > 0) {
        $message[] = 'Product name already exists';
    } else {
        $insert_product = mysqli_query($conn, "INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$image')") or die("Query failed: " . mysqli_connect_error());
        if ($insert_product) {
            if ($image_size > 2000000) {
                $message[] = 'Image size is too big';
            } else {
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'Product Added Successfully';
            }
        } else {
            $message[] = 'Product not added, Try again';
        }
    }
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

    <!-- Product CRUD Section Start -->
    <section class="add-products">
        <h1 class="title">shop products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Add New Product</h3>
            <input type="text" name="name" id="name" class="box" placeholder="Enter Product Name" required>
            <input type="number" name="price" min="0" id="price" class="box" placeholder="Enter Product Price" required>
            <input type="file" name="image" id="image" class="box" accept="image/jpg, image/jpeg, image/png" required>
            <input type="submit" value="Add Product" name="add_product" class="btn" placeholder="Enter Product Name"
                required>
        </form>
    </section>

    <!-- Show Products -->
    <section class="show-products">
        <div class="box-container">
            <?php
            $select_products = mysqli_query($conn, "SELECT * FROM products") or die("Query failed: " . mysqli_connect_error());

            if (mysqli_num_rows($select_products) > 0) {
                while ($row = mysqli_fetch_assoc($select_products)) {
            ?>
            <div class="box">
                <img src="../uploaded_img/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                <div class="name"><?php echo $row['name']; ?></div>
                <div class="price">$<?php echo $row['price']; ?>/_</div>
                <a href="products.php?update=<?php echo $row['id']; ?>" class="option-btn">Edit</a>
                <a href="products.php?delete=<?php echo $row['id']; ?>" class="delete-btn"
                    onclick="return confirm('Are You Sure To Delete This Product?!');">Delete</a>
            </div>

            <?php
                }
            } else {
                echo '<h3 class="empty">No Products Added Yet!</h3>';
            }
            ?>
        </div>
    </section>


    <!-- Custom admin js file -->
    <script src="../js/admin_script.js"></script>
</body>

</html>