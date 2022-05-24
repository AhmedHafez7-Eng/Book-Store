<?php

include '../config.php';

if (isset($message)) {
    foreach ($message as $msg) {
        echo '
            <div class="message">
                <span>' . $msg . '</span>
                <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>
            ';
    }
}

if (isset($_POST['update_profile'])) {
    $updated_user_id = $_POST['update_user_id'];
    $update_name = $_POST['update_name'];
    $update_email = $_POST['update_email'];
    $update_password = $_POST['update_password'];

    if (!empty($update_name)) {
        mysqli_query($conn, "UPDATE users SET name = '$update_name' WHERE id = '$updated_user_id'") or die("Query failed: " . mysqli_connect_error());
    }

    if (!empty($update_email)) {
        mysqli_query($conn, "UPDATE users SET email = '$update_email' WHERE id = '$updated_user_id'") or die("Query failed: " . mysqli_connect_error());
    }

    if (!empty($update_password)) {
        $hashed_updated_password = md5($update_password);
        mysqli_query($conn, "UPDATE users SET password = '$hashed_updated_password' WHERE id = '$updated_user_id'") or die("Query failed: " . mysqli_connect_error());
    }

    $update_image = $_FILES['update_user_image']['name'];
    $update_image_tmp_name = $_FILES['update_user_image']['tmp_name'];
    $update_image_size = $_FILES['update_user_image']['size'];
    $update_image_folder = '../users_img/' . $update_image;
    $update_old_image = $_POST['update_old_image'];

    if (!empty($update_image)) {
        if ($update_image_size > 2000000) {
            $message[] = 'Image size is too big';
        } else {
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
            mysqli_query($conn, "UPDATE users SET p_image = '$update_image' WHERE id = '$updated_user_id'") or die("Query failed: " . mysqli_connect_error());
            unlink('../users_img/' . $update_old_image);
        }
    }
    $message[] = 'Profile Info updated successfully';
    session_start();
    session_unset();
    session_destroy();
    header('Location: ../login.php');
} else {
    $message[] = 'Profile Info Failed to update, Please try again';
}


?>


<header class="header">
    <div class="flex">
        <a href="./home.php" class="logo">Admin <span>Panel</span></a>
        <nav class="navbar">
            <a href="./home.php">home</a>
            <a href="./products.php">products</a>
            <a href="./orders.php">orders</span></a>
            <a href="./users.php">users</a>
            <a href="./contacts.php">messages</a>
        </nav>

        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
            <div class="fas fa-user" id="user-btn"></div>
        </div>

        <div class="account-box">
            <div class="imgBx">
                <img src="../users_img/<?php echo $_SESSION['admin_p_image']; ?>"
                    alt="<?php echo $_SESSION['admin_p_image']; ?>">
            </div>
            <p>Username: <span><?php echo $_SESSION['admin_name']; ?></span></p>
            <p>Email: <span><?php echo $_SESSION['admin_email']; ?></span></p>
            <a href="../logout.php" class="delete-btn">Logout</a>
            <a href="home.php?updateprofile=<?php echo $_SESSION['admin_id']; ?>" class="option-btn">Edit
                Profile</a>
        </div>
    </div>
</header>


<!-- Edit Product -->
<section class="edit-profile">
    <?php
    if (isset($_GET['updateprofile'])) {
        $id = $_GET['updateprofile'];
        $select_user = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'") or die("Query failed: " . mysqli_connect_error());
        if (mysqli_num_rows($select_user) > 0) {
            while ($row = mysqli_fetch_assoc($select_user)) {

    ?>

    <h3>Update Profile Info</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="update_user_id" value="<?php echo $row['id']; ?>">
        <input type="hidden" name="update_old_image" value="<?php echo $row['p_image']; ?>">

        <img src="../users_img/<?php echo $row['p_image']; ?>" alt="<?php echo $row['p_image']; ?>">

        <input type="text" name="update_name" id="update_name" class="box" placeholder="Update Your Name"
            value="<?php echo $row['name']; ?>">

        <input type="email" name="update_email" id="update_email" class="box" placeholder="Change Your Email"
            value="<?php echo $row['email']; ?>">

        <input type="password" name="update_password" id="update_password" class="box"
            placeholder="Change Your Password">

        <input type="file" name="update_user_image" id="update_user_image" class="box"
            accept="image/jpg, image/jpeg, image/png">

        <input type="submit" value="Update" name="update_profile" class="btn">
        <input type="reset" value="Cancel" id="cancel-edit-profile" class="option-btn">
    </form>

    <?php
            }
        }
    } else {
        echo "<script>document.querySelector('.edit-profile').style.display = 'none';</script>";
    }
    ?>
</section>

<script src="../js/admin_script.js"></script>