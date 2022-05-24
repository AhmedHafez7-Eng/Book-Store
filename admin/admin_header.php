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
        </div>
    </div>
</header>