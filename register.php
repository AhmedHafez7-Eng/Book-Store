<?php

include 'config.php';


if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

    $p_image = basename($_FILES['p_image']['name']);
    if (empty($p_image)) {
        $p_image = "default_avatar.jpg";
    } else {
        $p_image_size = $_FILES['p_image']['size'];
        $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
        $p_image_folder = 'users_img/' . $p_image;
    }

    // $user_type = $_POST['user_type'];
    $user_type = 'user';

    $select_users = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' OR password = '$pass'") or die("Query failed: " . mysqli_connect_error());

    if (mysqli_num_rows($select_users) > 0) {
        $message[] = "User Already Exists!";
        // echo "<script>alert('User already exists');</script>";
    } else {
        if ($pass != $cpass) {
            $message[] = "Confirm password does not match!";
        } else {
            $insert_users = mysqli_query($conn, "INSERT INTO users (name, email, password, user_type, p_image) VALUES ('$name', '$email', '$pass', '$user_type', '$p_image')") or die("Query failed: " . mysqli_connect_error());
            if ($insert_users) {
                if (!empty($p_image)) {
                    if ($p_image_size > 2000000) {
                        $message[] = 'Image size is too big';
                    } else {
                        move_uploaded_file($p_image_tmp_name, $p_image_folder);
                        $message[] = "User Registered Successfully";
                        // echo "<script>alert('User registered successfully');</script>";
                    }
                } else {
                    $message[] = "User Registered Successfully";
                    // echo "<script>alert('User registered successfully');</script>";
                }

                header('location: login.php');
            } else {
                $message[] = "User Registration Failed";
                // echo "<script>alert('User registration failed');</script>";
            }
        }
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
    <title>EGYBOOK | Register</title>
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

    <?php

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

    ?>

    <section class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Register Now</h3>
            <input type="text" name="name" placeholder="Enter Your Full Name" class="box" required>
            <input type="email" name="email" placeholder="Enter Your Email Address" class="box" required>
            <input type="password" name="password" placeholder="Enter A Password" class="box" required>
            <input type="password" name="cpassword" placeholder="Confirm Password" class="box" required>
            <input type="file" name="p_image" id="p_image" class="box" accept="image/jpg, image/jpeg, image/png">

            <!-- <select name="user_type" required class="box">
                <option value="admin" selected>Admin</option>
                <option value="user">User</option>
            </select> -->
            <input type="submit" name="submit" value="Register" class="btn">
            <p>Already have an account? <a href="login.php">Login from here</a></p>
        </form>
    </section>
</body>

</html>