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
    <meta name="description"
        content="EGYBOOK Bookstore is one of the leading book seller in Egypt. Boasting more than 7,000 Arabic and foreign titles and aiming to provide the best book shopping experience." />
    <title>EGYBOOK | About</title>
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
        <h3>About Us</h3>
        <p><a href="home.php">home</a> / about</p>
    </div>

    <section class="home-about">
        <!-- <h1 class="title">About EGYBOOK</h1> -->
        <div class="flex">
            <div class="imgBx">
                <img src="img/about-img.jpg" alt="about">
            </div>
            <div class="content">
                <h3>why choose us ?</h3>
                <p><span>EGY<span>BOOK</span></span> Bookstore is one of the leading book seller in Egypt. Boasting more
                    than 7,000
                    Arabic and
                    foreign
                    titles and aiming to provide the best book shopping experience.</p>
                <a href="contact.php" class="white-btn">contact us</a>
            </div>
        </div>
    </section>

    <section class="reviews">
        <h1 class="title">client's reviews</h1>

        <div class="box-container">
            <div class="box">
                <img src="img/pic-1.png" alt="client">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem!</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Omar Zaghlol</h3>
            </div>
            <div class="box">
                <img src="img/pic-2.png" alt="client">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem!</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Laila Ibrahim</h3>
            </div>
            <div class="box">
                <img src="img/pic-3.png" alt="client">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem!</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Mahmoud Ashraf</h3>
            </div>
            <div class="box">
                <img src="img/pic-4.png" alt="client">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem!</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Noha Fawzy</h3>
            </div>
            <div class="box">
                <img src="img/pic-5.png" alt="client">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem!</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Amr Elsayed</h3>
            </div>
        </div>
    </section>

    <section class="authors">
        <h1 class="title">our authors</h1>
        <div class="box-container">
            <div class="box">
                <img src="img/pic-5.png" alt="author">
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                    <a href="#" class="fab fa-github"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
                <h3>Amr Elsayed</h3>
            </div>
            <div class="box">
                <img src="img/pic-5.png" alt="author">
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                    <a href="#" class="fab fa-github"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
                <h3>Amr Elsayed</h3>
            </div>
            <div class="box">
                <img src="img/pic-5.png" alt="author">
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                    <a href="#" class="fab fa-github"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
                <h3>Amr Elsayed</h3>
            </div>
            <div class="box">
                <img src="img/pic-5.png" alt="author">
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                    <a href="#" class="fab fa-github"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
                <h3>Amr Elsayed</h3>
            </div>
            <div class="box">
                <img src="img/pic-5.png" alt="author">
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                    <a href="#" class="fab fa-github"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
                <h3>Amr Elsayed</h3>
            </div>
            <div class="box">
                <img src="img/pic-5.png" alt="author">
                <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                    <a href="#" class="fab fa-github"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div>
                <h3>Amr Elsayed</h3>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="js/main.js"></script>
</body>

</html>