<div>
    <form method="post" action="">
        <button type="submit">pokaz</button>
    </form>
</div>

<?php

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
            <th>ID</th>
            <th>Nazwa</th>
            <th>Opis</th>
            <th>Data utworzenia</th>
            <th>Data modyfikacji</th>
            <th>Termin ważności</th>
            <th>Cena</th>
            <th>VAT</th>
            <th>Ilość</th>
            <th>Dostępność</th>
            <th>Kategoria</th>
            <th>Waga</th>
            <th>Zdjecie</th>
            <th>Aktualizuj</th>
            <th>Usuń</th>
          </tr>";

    
    while ($row = $res->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . $row['create_date'] . "</td>";
        echo "<td>" . $row['modification_date'] . "</td>";
        echo "<td>" . $row['expiration_date'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['vat'] . "</td>";
        echo "<td>" . $row['quantity'] . "</td>";
        echo "<td>" . ($row['is_available'] ? 'Yes' : 'No') . "</td>";
        echo "<td>" . $row['category_name'] . "</td>";
        echo "<td>" . $row['weight'] . "</td>";
        echo "<td><img src='" . $row['photo'] . "' alt='" . $row['title'] . "' style='width:100px; height:150px;'></td>";

        
        echo "<td><a href='index.php?idp=sklep&idp1=edytuj_przedmiot";
        echo "&id=" . $row['id'];
        echo "&title=" . $row['title'];
        echo "&description=" . $row['description'];
        echo "&create_date=" . $row['create_date'];
        echo "&modification_date=" . $row['modification_date'];
        echo "&expiration_date=" . $row['expiration_date'];
        echo "&price=" . $row['price'];
        echo "&vat=" . $row['vat'];
        echo "&quantity=" . $row['quantity'];
        echo "&is_available=" . ($row['is_available'] ? '1' : '0');
        echo "&category=" . $row['category'];
        echo "&weight=" . $row['weight'];
        echo "&photo=" . $row['photo'];
        echo "'>Update</a></td>";

        echo "<td><a href='index.php?idp=sklep&idp1=usun_przedmiot";
        echo "&id=" . $row['id'];
        echo "'>Delete</a></td>";

        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($conn);
}
?>