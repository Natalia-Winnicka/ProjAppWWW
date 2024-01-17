<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header("Location: index.php?idp=sklep&idp1=pokaz_kat");
    
}
?>
<div>
    <form method="post" action="">
        <label for="mother">wybierz kategorię nadrzędną:</label> 
        <input list="categories" id="mother" name="mother" autocomplete="off">
        <datalist id="categories">
            <?php
            $conn = dbConnect(); 

            $categories = $conn->query("SELECT * FROM categories WHERE mother IS NULL ORDER BY category_name");

            echo "<option value='brak' selected></option>";

            foreach ($categories as $category) {
                echo "<option value='" . htmlspecialchars($category['category_name']) . "'>" . htmlspecialchars($category['category_name']) . "</option>";
            }
            ?>
        </datalist>
        <br>
        <label for="nazwa">nazwa:</label>
        <input type="text" name="nazwa" maxlength="20">
        <br>
        <button type="submit">Dodaj kategorię</button>
    </form>
    <a href="index.php?idp=sklep&idp1=pokaz"> Wroc</a>
</div>

 <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = dbConnect();
    $mother_id = null;
    
    if ($_POST['mother'] != "brak") {
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

    $stmt_insert = $conn->prepare("INSERT INTO categories(mother, category_name) VALUES (?, ?)");

    if ($stmt_insert === false) {
        die("Error in query: " . $conn->error);
    }

    $stmt_insert->bind_param("ss", $mother_id, $nazwa);
    $nazwa = htmlspecialchars($_POST['nazwa']);

    if ($stmt_insert->execute()) {
        $stmt_insert->close();
        mysqli_close($conn);

        
    } else {
        die("Error in query execution: " . $stmt_insert->error);
    }
}
?>