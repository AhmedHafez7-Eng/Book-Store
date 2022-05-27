<?php
include 'config.php';
$no = $_POST['getresult'];
$select_more = mysqli_query($conn, "SELECT * FROM products LIMIT $no,3") or die("Query failed: " . mysqli_connect_error());
if (mysqli_num_rows($select_more) > 0) {
    while ($row = mysqli_fetch_assoc($select_more)) {
?>
<form action="" method="post" class="box" id="result_para">
    <img src="uploaded_img/<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>">
    <div class="name"><?php echo $row['name']; ?></div>
    <div class="price">EGP <?php echo $row['price']; ?>/-</div>
    <input type="number" name="product_quantity" min="1" value="1" class="quantity">
    <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
    <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
    <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
    <input type="submit" value="add to cart" name="add_to_cart" class="btn">
</form>
<?php
    }
} else {
    echo '<style>#load{display:none;}</style>';
}
?>