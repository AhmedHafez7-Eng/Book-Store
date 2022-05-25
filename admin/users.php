<?php

include '../config.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('Location: ../login.php');
};

if (isset($_GET['delete_user'])) {
    $user_delete_id = $_GET['delete_user'];
    mysqli_query($conn, "DELETE FROM `users` WHERE id='$user_delete_id'") or die("Query failed: " . mysqli_connect_error());
    $message[] = 'User has been Canceled successfully';

    header('Location: users.php');
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

    <section class="users">

        <h1 class="title">Users Accounts</h1>

        <div class="box-container">
            <?php

            $select_users = mysqli_query($conn, "SELECT * FROM users") or die("Query failed: " . mysqli_connect_error());

            while ($row = mysqli_fetch_assoc($select_users)) {
            ?>

            <div class="box">
                <img src="../users_img/<?php echo $row['p_image']; ?>" alt="<?php echo $row['p_image'] ?>">

                <p><?php echo $row['name']; ?></p>
                <p><?php echo $row['email']; ?></p>
                <p style="color:<?php if ($row['user_type'] == 'admin') {
                                        echo 'var(--orange) !important';
                                    } else {
                                        echo 'var(--purple) !important';
                                    } ?>"><?php echo $row['user_type']; ?></p>
                <a href="users.php?delete_user=<?php echo $row['id']; ?>" class="delete-btn"
                    onclick="return confirm('Are you sure to delete this user?');">Delete User</a>
            </div>

            <?php }; ?>
        </div>
    </section>







    <!-- Custom admin js file -->
    <script src="../js/admin_script.js"></script>
</body>

</html>