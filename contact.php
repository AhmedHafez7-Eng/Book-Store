<?php

include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('Location: login.php');
}

if (isset($_POST['send_message'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = $_POST['number'];
    $msg = mysqli_real_escape_string($conn, $_POST['message']);

    $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name='$name' AND email='$email' AND number='$number' AND message='$msg'") or die("Query failed: " . mysqli_connect_error());

    if (mysqli_num_rows($select_message) > 0) {
        $message[] = 'Message already sent';
    } else {
        $insert_message = mysqli_query($conn, "INSERT INTO `message` (user_id,name, email, number, message, msg_status) VALUES ('$user_id','$name', '$email', '$number', '$msg', 'unread')") or die("Query failed: " . mysqli_connect_error());
        if ($insert_message) {
            $message[] = 'Message sent successfully';
        } else {
            header('Location: contact.php');
            $message[] = 'Something went wrong, Please try again';
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
    <title>EGYBOOK | Contact Us</title>
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
        <h3>contact us</h3>
        <p><a href="home.php">home</a> / contact</p>
    </div>

    <section class="contact">
        <form action="" method="post">
            <h3>get in touch!</h3>
            <input type="text" name="name" id="name" placeholder="full name" class="box" required>
            <input type="number" name="number" id="number" placeholder="phone number" class="box" required>
            <input type="email" name="email" id="email" placeholder="email address" class="box" required>
            <textarea name="message" id="message" placeholder="your message" cols="30" rows="10" class="box"
                required></textarea>
            <input type="submit" name="send_message" value="send message" class="btn">
        </form>
    </section>


    <?php include 'footer.php'; ?>

    <script src="js/main.js"></script>
</body>

</html>