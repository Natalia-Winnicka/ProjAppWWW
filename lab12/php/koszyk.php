<?php

function removeFromCart($productId) {
    if (isset($_SESSION['cart'][$productId])) {
        unset($_SESSION['cart'][$productId]);
    }
}

function clearCart() {
    $_SESSION['cart'] = array();
}
echo "<a href='index.php?idp=sklep&idp1=koszyk&action=clearCart'>Clear</a>";

echo "<div id='cartDialog' title='Shopping Cart'>";
if (empty($_SESSION['cart'])) {
    echo "<p>Your cart is empty.</p>";
} else {
    echo "<form method='post' action=''>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Product ID</th>
            <th>Title</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Action</th>
          </tr>";

    foreach ($_SESSION['cart'] as $productId => $item) {
        $quantity = $item['quantity'];
        $title = $item['title'];
        $totalPrice = $item['totalPrice'];

        echo "<tr>";
        echo "<td>$productId</td>";
        echo "<td>$title</td>";
        echo "<td>
                <input type='number' name='quantity[$productId]' value='$quantity' min='1'>
              </td>";
        echo "<td>$totalPrice</td>";
        echo "<td>
                <a href='index.php?idp=sklep&idp1=koszyk&action=remove&productId=$productId'>Remove</a>
              </td>";
        echo "</tr>";
    }

    echo "</table>";

    $cartTotal = array_sum(array_column($_SESSION['cart'], 'totalPrice'));
    echo "<p>Total Cart Price: $cartTotal</p>";

    echo "<button type='submit' name='action' value='updateQuantities'>Zmień ilość produktów</button>";

    echo "</form>";
}
echo "</div>";

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'remove') {
        $productId = $_GET['productId'];
        removeFromCart($productId);
        echo '<script type="text/javascript">window.location.href = "index.php?idp=sklep&idp1=koszyk";</script>';
    } elseif ($_GET['action'] === 'clearCart') {
        clearCart();
        echo '<script type="text/javascript">window.location.href = "index.php?idp=sklep&idp1=koszyk";</script>';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'updateQuantities') {
    foreach ($_POST['quantity'] as $productId => $newQuantity) {
        $_SESSION['cart'][$productId]['quantity'] = max(1, intval($newQuantity));
        $_SESSION['cart'][$productId]['totalPrice'] = $_SESSION['cart'][$productId]['price'] * $_SESSION['cart'][$productId]['quantity'];
    }
    echo '<script type="text/javascript">window.location.href = "index.php?idp=sklep&idp1=koszyk";</script>';
}
?>
