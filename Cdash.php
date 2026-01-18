


<?php
include "connect.php";

$products = [
    ["Rainbow Six", 200, "R6.jpeg"],
    ["Naruto", 350, "naruto.webp"],
    ["Luffy", 300, "luffy.webp"],
    ["Sasuke", 320, "sasuke.jpg"],
    ["Goku", 400, "goku.jpg"],
    ["Ichigo", 280, "ichigo.jpeg"],
    ["Death Note", 280, "dt.jpeg"],
    ["JOJO", 280, "jojo.jpg"],
    ["Demon Slayer", 280, "ds.jpg"]
];

$stmt = $conn->prepare("INSERT INTO product (name, price, image) VALUES (?, ?, ?)");

foreach ($products as $p) {
    $stmt->bind_param("sis", $p[0], $p[1], $p[2]);
    $stmt->execute();
}

echo "Products inserted successfully!";
$stmt->close();
$conn->close();
?>























<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Cdash.css">
    
</head>
<body>
    <div class="side-bar">
        <h1>Dashboard</h1>
        <ul>
            <li><a href="">Catagories</a></li>
            <li><a href="">View Cart</a></li>
            <li><a href="">Offers</a></li>
            <li><a href="">Wishlist</a></li>
            <li><a href="">Payment Policy</a></li>
            <li><a href="">Log out</a></li>

            
        </ul>
    </div>
    <div class="content">
        <img src="SAVYZ TEXT LOGO.png">
       <div class="srcbar">
    <form method="GET" action="">
        <input type="search" name="search" placeholder="Search products..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>">
        <button type="submit">Search</button>
    </form>
</div>

        </div>
        
            

        
    </div>
    <div class="main">

    <?php
include "connect.php";

// Default query: fetch all products
$sql = "SELECT * FROM product";

// Check if search is set
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']); // prevent SQL injection
    $sql = "SELECT * FROM product WHERE name LIKE '%$search%'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { ?>
        <div class="procard">
            <div class="product-img">
                <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
            </div>
            <h3><?php echo $row['name']; ?></h3>
            <p><?php echo $row['price']; ?> BDT</p>
            <button>Add to Cart</button>
        </div>
<?php }
} else {
    echo "<p>No products found.</p>";
}
?>



</div>


</body>
</html>