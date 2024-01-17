<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header("Location: index.php?idp=sklep&idp1=pokaz_prze");
    
}
?>
<div>
    <form method="post" action="">
        <label for="tytul">Tytul:</label>
        <input type="text" name="tytul" maxlength="20">
        <br>
        <label for="description">Opis:</label>
        <textarea name="description"></textarea>
        <br>
        <label for="expiration_date">Termin ważności:</label>
        <input type="datetime-local" name="expiration_date">
        <br>
        <label for="price">Cena:</label>
        <input type="number" name="price" step=".01">
        <br>
        <label for="vat">VAT:</label>
        <input type="number" name="vat">
        <br>
        <label for="quantity">Ilość:</label>
        <input type="number" name="quantity">
        <br>
        <label for="is_available">Dostępny:</label>
        <input type="checkbox" name="is_available">
        <br>
        <label for="quantity">Ilość:</label>
        <input type="number" name="quantity">
        <br>
        <label for="mother">Kategoria:</label> 
        <input list="categories" id="mother" name="mother" autocomplete="off" required>
        <datalist id="categories">
            <?php
            $conn = dbConnect(); 

            $categories = $conn->query("SELECT * FROM categories WHERE mother IS NULL ORDER BY category_name");

            

            foreach ($categories as $category) {
                echo "<option value='" . htmlspecialchars($category['category_name']) . "'>" . htmlspecialchars($category['category_name']) . "</option>";
            }
            ?>
        </datalist>
        <br>
        <label for="weight">Waga:</label>
        <input type="number" name="weight" step=".01">
        <br>
        <label for="photo">Zdjęcie:</label>
        <input type="text" name="photo">
        <br>
        <button type="submit">Dodaj przedmiot</button>
    </form>
    <a href="index.php?idp=sklep&idp1=pokaz"> Wroc</a>
</div>

 <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = dbConnect();
    $mother_id = null;
    
    if ($_POST['mother']) {
        $mother_name = htmlspecialchars($_POST['mother']);
        
        $stmt_select = $conn->prepare("SELECT id FROM categories WHERE category_name = ?");
        $stmt_select->bind_param("s", $mother_name);
        $stmt_select->execute();
        $result_select = $stmt_select->get_result();
        
        if ($result_select->num_rows > 0) {
            $row = $result_select->fetch_assoc();
            $mother_id = $row['id'];
        } else {
            die("Error in query: " . $conn->error);
        }

        $stmt_select->close();
    }

    $stmt_insert = $conn->prepare("INSERT INTO products(title, description, expiration_date, price, vat, quantity, is_available, category, weight, photo) VALUES(?,?,?,?,?,?,?,?,?,?);");

    if ($stmt_insert === false) {
        die("Error in query: " . $conn->error);
    }

    $stmt_insert->bind_param("ssssssssss", $tytul, $description, $expiration_date, $price, $vat, $quantity, $is_available, $mother_id, $weight, $photo);
    $tytul = htmlspecialchars($_POST['tytul']);
    $description = htmlspecialchars($_POST['description']);
    $expiration_date = htmlspecialchars($_POST['expiration_date']);
    $price = htmlspecialchars($_POST['price']);
    $vat = htmlspecialchars($_POST['vat']);
    $quantity = htmlspecialchars($_POST['quantity']);
    $is_available = htmlspecialchars($_POST['is_available']);
    $weight = htmlspecialchars($_POST['weight']);
    $photo = htmlspecialchars($_POST['photo']);

    if ($stmt_insert->execute()) {
        $stmt_insert->close();
        mysqli_close($conn);

        
        exit;
    } else {
        die("Error in query execution: " . $stmt_insert->error);
    }
}
?>