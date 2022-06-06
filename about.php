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

    <!-- Swiper Slider CDN Link -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

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

    <section class="reviews swiper">
        <h1 class="title">client's reviews</h1>

        <div class="box-container swiper-wrapper">

            <?php

            $select_reviews = mysqli_query($conn, "SELECT m.user_id, m.name, m.message, u.p_image FROM message m LEFT JOIN users u on u.id = m.user_id GROUP BY(m.user_id)") or die("Query failed: " . mysqli_connect_error());

            if (mysqli_num_rows($select_reviews) > 0) {
                while ($row = mysqli_fetch_assoc($select_reviews)) {

            ?>

            <div class="box swiper-slide">
                <img src="users_img/<?php echo $row['p_image']; ?>" alt="client">
                <p><?php echo $row['message']; ?></p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3><?php echo $row['name']; ?></h3>
            </div>

            <?php
                }
            } else {
                echo "<p class='empty'>No reviews found yet!</p>";
            }
            ?>
        </div>

        <!-- <div class="swiper-pagination"></div> -->
    </section>

    <section class="authors">
        <h1 class="title">our authors</h1>
        <div class="box-container">
            <div class="box">
                <img src="img/author-1.jpg" alt="author">
                <div class="share">
                    <a href="https://www.facebook.com/profile.php?id=100005116839262" class="fab fa-facebook-f"></a>
                    <a href="https://www.linkedin.com/in/ahmedhafez247/" class="fab fa-linkedin"></a>
                    <a href="https://github.com/AhmedHafez7-Eng" class="fab fa-github"></a>
                    <a href="https://www.instagram.com/ahmedhafez247/" class="fab fa-instagram"></a>
                </div>
                <h3>William Shakespeare</h3>
            </div>
            <div class="box">
                <img src="img/author-2.jpg" alt="author">
                <div class="share">
                    <a href="https://www.facebook.com/profile.php?id=100005116839262" class="fab fa-facebook-f"></a>
                    <a href="https://www.linkedin.com/in/ahmedhafez247/" class="fab fa-linkedin"></a>
                    <a href="https://github.com/AhmedHafez7-Eng" class="fab fa-github"></a>
                    <a href="https://www.instagram.com/ahmedhafez247/" class="fab fa-instagram"></a>
                </div>
                <h3>Virginia Woolf</h3>
            </div>
            <div class="box">
                <img src="img/author-3.jpg" alt="author">
                <div class="share">
                    <a href="https://www.facebook.com/profile.php?id=100005116839262" class="fab fa-facebook-f"></a>
                    <a href="https://www.linkedin.com/in/ahmedhafez247/" class="fab fa-linkedin"></a>
                    <a href="https://github.com/AhmedHafez7-Eng" class="fab fa-github"></a>
                    <a href="https://www.instagram.com/ahmedhafez247/" class="fab fa-instagram"></a>
                </div>
                <h3>George Orwell</h3>
            </div>
            <div class="box">
                <img src="img/author-4.jpg" alt="author">
                <div class="share">
                    <a href="https://www.facebook.com/profile.php?id=100005116839262" class="fab fa-facebook-f"></a>
                    <a href="https://www.linkedin.com/in/ahmedhafez247/" class="fab fa-linkedin"></a>
                    <a href="https://github.com/AhmedHafez7-Eng" class="fab fa-github"></a>
                    <a href="https://www.instagram.com/ahmedhafez247/" class="fab fa-instagram"></a>
                </div>
                <h3>Agatha Christie</h3>
            </div>
            <div class="box">
                <img src="img/author-5.jpg" alt="author">
                <div class="share">
                    <a href="https://www.facebook.com/profile.php?id=100005116839262" class="fab fa-facebook-f"></a>
                    <a href="https://www.linkedin.com/in/ahmedhafez247/" class="fab fa-linkedin"></a>
                    <a href="https://github.com/AhmedHafez7-Eng" class="fab fa-github"></a>
                    <a href="https://www.instagram.com/ahmedhafez247/" class="fab fa-instagram"></a>
                </div>
                <h3>Kurt Vonnegut</h3>
            </div>
            <div class="box">
                <img src="img/author-6.jpg" alt="author">
                <div class="share">
                    <a href="https://www.facebook.com/profile.php?id=100005116839262" class="fab fa-facebook-f"></a>
                    <a href="https://www.linkedin.com/in/ahmedhafez247/" class="fab fa-linkedin"></a>
                    <a href="https://github.com/AhmedHafez7-Eng" class="fab fa-github"></a>
                    <a href="https://www.instagram.com/ahmedhafez247/" class="fab fa-instagram"></a>
                </div>
                <h3>Celeste Ng</h3>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
    var swiper = new Swiper(".swiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
            // pauseOnMouseEnter: true,
        },
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
            el: ".swiper-pagination",
        },
    });
    </script>
    <script src="js/main.js"></script>
</body>

</html>