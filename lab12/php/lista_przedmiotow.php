<div>
    <form method="post" action="">
        <button type="submit">pokaz</button>
    </form>
</div>

<?php

function addToCart($productId, $quantity, $title, $price, $vat) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $totalPrice = ($price + ($price * ($vat / 100))) * $quantity;

    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity'] += $quantity;
        $_SESSION['cart'][$productId]['totalPrice'] += $totalPrice;
    } else {
        $_SESSION['cart'][$productId] = array(
            'quantity' => $quantity,
            'title' => $title,
            'price' => $price + ($price * ($vat / 100)), 
            'totalPrice' => $totalPrice
        );
    }
}

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$conn = dbConnect();
$res = $conn->query("SELECT products.id, products.title, products.description, products.create_date, products.modification_date, 
                    products.expiration_date, products.price, products.vat, products.quantity, products.is_available,
                    products.category, products.weight, products.photo,
                    categories.id AS category_id, categories.mother, categories.category_name
                    FROM products
                    INNER JOIN categories ON products.category = categories.id
                    ORDER BY products.id DESC
                    LIMIT 100;
                    ");


if ($res->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr>
            <th>Nazwa</th>
            <th>Opis</th>
            <th>Cena</th>
            <th>VAT</th>
            <th>Ilość</th>
            <th>Dostępność</th>
            <th>Kategoria</th>
            <th>Waga</th>
            <th>Zdjęcie</th>
            <th>Dodaj do koszyka</th> <!-- New column header -->
          </tr>";

    while ($row = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['vat'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "<td>" . ($row['is_available'] ? 'Yes' : 'No') . "</td>";
        echo "<td>" . $row['category_name'] . "</td>";
        echo "<td>" . $row['weight'] . "</td>";
        echo "<td><img src='" . $row['photo'] . "' alt='" . $row['title'] . "' style='width:100px; height:150px;'></td>";
        echo "<td>
                <form method='post' action=''>
                    <input type='hidden' name='productId' value='{$row['id']}'>
                    <input type='hidden' name='title' value='{$row['title']}'>
                    <input type='hidden' name='price' value='{$row['price']}'>
                    <input type='hidden' name='vat' value='{$row['vat']}'>
                    <input type='number' name='quantity' value='1' min='1'>
                    <button type='submit' name='action' value='addToCart'>Add to Cart</button>
                </form>
              </td>";

        echo "</tr>";
    }

    if (isset($_POST['action'])) {
        $productId = $_POST['productId'];
        $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
        $title = $_POST['title']; 
        $price = $_POST['price']; 
        $vat = $_POST['vat'];    


        if ($_POST['action'] === 'addToCart') {
            addToCart($productId, $quantity, $title, $price, $vat);
        }
    }

    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($conn);
}
?>