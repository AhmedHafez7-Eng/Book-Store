<?php

include '../config.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('Location: ../login.php');
};


if (isset($_GET['read_msg'])) {
    $msg_id = $_GET['read_msg'];
    $msg_status = "read";
    mysqli_query($conn, "UPDATE `message` SET msg_status='$msg_status' WHERE id='$msg_id'") or die("Query failed: " . mysqli_connect_error());
    $message[] = 'Message has been marked as read successfully';
    header('Location: contacts.php');
}

if (isset($_GET['unread_msg'])) {
    $msg_id = $_GET['unread_msg'];
    $msg_status = "unread";
    mysqli_query($conn, "UPDATE `message` SET msg_status='$msg_status' WHERE id='$msg_id'") or die("Query failed: " . mysqli_connect_error());
    $message[] = 'Message has been marked as unread successfully';
    header('Location: contacts.php');
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

    <section class="messages">
        <h1 class="title">New Messages</h1>

        <form action="" method="post">
            <select name="msg_type">
                <option value="unread" selected>Unread</option>
                <option value="read">Read</option>
            </select>
            <input type="submit" value="Show Messages" name="search_msg" class="option-btn">
        </form>

        <div class="box-container">

            <?php

            $select_messages = mysqli_query($conn, "SELECT * FROM `message` WHERE msg_status = 'unread'") or die("Query failed: " . mysqli_connect_error());

            if (isset($_POST['search_msg'])) {
                $msg_type = $_POST['msg_type'];

                if ($msg_type == 'unread') {
                    $select_messages = mysqli_query($conn, "SELECT * FROM `message` WHERE msg_status='unread'") or die("Query failed: " . mysqli_connect_error());
                } else {
                    $select_messages = mysqli_query($conn, "SELECT * FROM `message` WHERE msg_status='read'") or die("Query failed: " . mysqli_connect_error());
                }
            }

            if (mysqli_num_rows($select_messages) > 0) {
                while ($row = mysqli_fetch_assoc($select_messages)) {

            ?>

            <div class="box">
                <p><?php echo $row['name']; ?></p>
                <p><?php echo $row['email']; ?></p>
                <p><?php echo $row['number']; ?></p>
                <p><?php echo $row['message']; ?></p>

                <?php
                        if ($row['msg_status'] == 'unread') {
                        ?>
                <a href="contacts.php?read_msg=<?php echo $row["id"]; ?>" class="btn">Mark as read</a>;

                <?php
                        } else {

                        ?>
                <a href="contacts.php?unread_msg=<?php echo $row["id"]; ?>" class="btn">Mark as
                    unread</a>

                <?php
                        }
                        ?>
            </div>

            <?php
                }
            } else {
                echo "<h3 class='empty'>No new messages yet!</h3>";
            }
            ?>
        </div>
    </section>







    <!-- Custom admin js file -->
    <script src="../js/admin_script.js"></script>
</body>

</html>