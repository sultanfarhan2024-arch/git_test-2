<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Product Management System";?></title>
    <link rel="stylesheet" href="../css/productStyle.css">
</head>
<body>
<div class="container">
    <form class="product-listing-form" method="post">
        <h1>Product Listing Form</h1>
        <ul>
            <li><input class="product-input" type="text" placeholder="Product Name" name="product-name" id="product-name" required></li>
            <li><input class="product-input" type="number" placeholder="Price" name="product-price" id="product-price" required></li>
            <li><input class="product-input" placeholder="Quantity" type="number" name="product-quantity" id="product-quantity" required></li>
            <li><input class="product-input" type="text" placeholder="Category" name="category" id="category" required></li>
            <li><input class="product-input" placeholder="Discount" type="number" name="discount" id="discount"></li>
            <li><input class="order-btn" type="submit" name="order-btn" value="Order"></li>
        </ul>
<?php
if(isset($_POST['order-btn'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $mysql_linked = mysqli_connect($server, $username, $password, "farlexo");

    $product = $_POST['product-name'];
    $price = $_POST['product-price'];
    $quantity = $_POST['product-quantity'];
    $category = $_POST['category'];
    $discount = $_POST['discount'];
    $sub_price = $price * $quantity;
    $_discount = $sub_price * $discount / 100;
    $total_price = $sub_price - $_discount;
    $product = ucfirst($product);
    $category = ucfirst($category);

    if(!$mysql_linked){
        die("Connecting Failed". mysqli_connect_error());
    }

    $mysql_root = "INSERT INTO `product_management_sheet` (`Product`, `Price`, `Quantity`, `Category`, `Discount`, `Total Price`) VALUES ('$product', '$price', '$quantity', '$category', '$discount', '$total_price');";

    if($mysql_linked->query($mysql_root) == true){
        echo "<h1 id='formMSG'>Sucessfully Send</h1>";
    }else{
        echo "ERROR".mysqli_error($conn);
    }

    $mysql_linked->close();

}

?>
    </form>
</div>



    
</body>
</html>

<!-- INSERT INTO `product_management_sheet` (`Product`, `Price`, `Quantity`, `Category`, `Discount`, `Total Price`) VALUES ('I Phone 17 Pro Max 2026', '650000', '2', 'Apple', '20%', '5200000'); -->