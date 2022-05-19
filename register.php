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
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS Style File -->
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <section class="form-container">
        <form action="" method="post">
            <h3>Register Now</h3>
            <input type="text" name="name" placeholder="Enter Your Full Name" class="box" required>
            <input type="email" name="email" placeholder="Enter Your Email Address" class="box" required>
            <input type="password" name="password" placeholder="Enter A Password" class="box" required>
            <input type="password" name="cpassword" placeholder="Confirm Password" class="box" required>
            <select name="user_type" required class="box">
                <option value="">Select User Type</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            <input type="submit" name="submit" value="Register" class="btn">
            <p>Already have an account? <a href="login.php">Login from here</a></p>
        </form>
    </section>
</body>

</html>