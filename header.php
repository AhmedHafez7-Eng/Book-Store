<?php

include 'config.php';

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
    $update_image_folder = 'users_img/' . $update_image;
    $update_old_image = $_POST['update_old_image'];

    if (!empty($update_image)) {
        if ($update_image_size > 2000000) {
            $message[] = 'Image size is too big';
        } else {
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
            mysqli_query($conn, "UPDATE users SET p_image = '$update_image' WHERE id = '$updated_user_id'") or die("Query failed: " . mysqli_connect_error());
            unlink('users_img/' . $update_old_image);
        }
    }
    $message[] = 'Profile Info updated successfully';
    session_start();
    session_unset();
    session_destroy();
    header('Location: login.php');
} else {
    $message[] = 'Profile Info Failed to update, Please try again';
}
?>


<header class="header">
    <div class="top-header">
        <div class="flex">
            <div class="share">
                <a href="https://www.facebook.com/profile.php?id=100005116839262" class="fab fa-facebook-square"
                    target="_blank"></a>
                <a href="https://github.com/AhmedHafez7-Eng" class="fab fa-github-square" target="_blank"></a>
                <a href="https://www.linkedin.com/in/ahmedhafez247/" class="fab fa-linkedin" target="_blank"></a>
            </div>
            <!-- <p>new <a href="login.php">login</a> | <a href="register.php">register</a></p> -->
            <p>
                <a href="https://wa.me/+201010495597">WhatsApp <i class="fab fa-whatsapp"></i></a> |
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=ahmedhafezoffic@gmail.com" target="_blank">Gmail
                    <i class="fas fa-envelope"></i></a>
            </p>
        </div>
    </div>

    <div class="main-header">
        <div class="flex">
            <a href="home.php" class="logo">EGY<span>BOOK</span></a>

            <nav class="navbar">
                <a href="home.php">home</a>
                <a href="about.php">about</a>
                <a href="shop.php">shop</a>
                <a href="contact.php">contact</a>
                <a href="orders.php">orders</a>
            </nav>

            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <a href="search-books.php" class="fas fa-search"></a>
                <div id="user-btn" class="fas fa-user"></div>
                <a href="cart.php"><i class="fas fa-shopping-cart"></i> <span>(00)</span></a>
            </div>

            <div class="user-box">
                <div class="imgBx">
                    <img src="users_img/<?php echo $_SESSION['user_p_image']; ?>"
                        alt="<?php echo $_SESSION['user_p_image']; ?>">
                </div>
                <p>Username: <span><?php echo $_SESSION['user_name']; ?></span></p>
                <p>Email: <span><?php echo $_SESSION['user_email']; ?></span></p>
                <a href="logout.php" class="delete-btn">Logout</a>
                <a href="home.php?updateprofile=<?php echo $_SESSION['user_id']; ?>" class="option-btn">Edit
                    Profile</a>
            </div>
        </div>
    </div>
</header>


<!-- Edit Profile -->
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

        <img src="users_img/<?php echo $row['p_image']; ?>" alt="<?php echo $row['p_image']; ?>">

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

<script>
document.querySelector('#cancel-edit-profile').onclick = () => {
    document.querySelector('.edit-profile').style.display = 'none';
    window.location.href = 'home.php';
}
</script>