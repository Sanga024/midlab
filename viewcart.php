<?php
session_start();
include "connect.php";

$session_id = session_id();

// Handle adding products to cart (if Add button sends via GET)
if (isset($_GET['add'])) {
    $product_id = intval($_GET['add']);

    $check = $conn->prepare("SELECT * FROM cart WHERE product_id=? AND session_id=?");
    $check->bind_param("is", $product_id, $session_id);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        $update = $conn->prepare("UPDATE cart SET quantity = quantity + 1 WHERE product_id=? AND session_id=?");
        $update->bind_param("is", $product_id, $session_id);
        $update->execute();
        $update->close();
    } else {
        $insert = $conn->prepare("INSERT INTO cart (product_id, quantity, session_id) VALUES (?, 1, ?)");
        $insert->bind_param("is", $product_id, $session_id);
        $insert->execute();
        $insert->close();
    }

    $check->close();
}

// Handle Confirm Order
if (isset($_POST['confirm'])) {
    echo "<script>alert('Order Confirmed!'); window.location.href='Cdash.php';</script>";
    exit();
}

// Fetch cart items
$cart_items = $conn->query("
    SELECT c.*, p.name, p.price, p.image 
    FROM cart c 
    JOIN product p ON c.product_id = p.id 
    WHERE session_id = '$session_id'
");

$total = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Cart</title>
    <link rel="stylesheet" href="viewcart.css">
</head>
<body>
    <div class="cart-container">
        <h2>Your Cart</h2>
        <?php if($cart_items->num_rows > 0){ ?>
        <form method="POST">
        <table>
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Price (BDT)</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            <?php while($item = $cart_items->fetch_assoc()){ 
                $subtotal = $item['price'] * $item['quantity'];
                $total += $subtotal;
            ?>
            <tr>
                <td><img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>"></td>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['price']; ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td><?php echo $subtotal; ?></td>
            </tr>
            <?php } ?>
            <tr class="total-row">
                <td colspan="4">Grand Total</td>
                <td><?php echo $total; ?> BDT</td>
            </tr>
        </table>

        <div class="payment-method">
            <label for="payment">Payment Method: </label>
            <select id="payment" name="payment">
                <option value="cash">Cash on Delivery</option>
                <option value="bkash">bKash</option>
                <option value="card">Card</option>
            </select>
        </div>

        <button type="submit" name="confirm" class="confirm-btn">Confirm Order</button>
        </form>

        <?php } else { ?>
            <p style="text-align:center; font-size:18px;">Your cart is empty.</p>
        <?php } ?>
    </div>
</body>
</html>
