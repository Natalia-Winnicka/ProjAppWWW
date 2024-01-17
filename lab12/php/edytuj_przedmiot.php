<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header("Location: index.php?idp=sklep&idp1=pokaz_prze");
    
}
?>
<?php
$dateTime = new DateTime($_GET['expiration_date']);
$formattedexpdate = $dateTime->format("Y-m-d\TH:i:s");
if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
} 
?>
<div>
    <form method="post" action="">
        <label for="tytul">Tytul:</label>
        <input type="text" name="tytul" maxlength="20" value="<?php echo htmlspecialchars($_GET['title']); ?>">
        <br>
        <label for="description">Description:</label>
        <textarea name="description"><?php echo htmlspecialchars($_GET['description']); ?></textarea>
        <br>
        <label for="expiration_date">Expiration Date:</label>
        <input type="datetime-local" name="expiration_date" value="<?php echo $formattedexpdate; ?>">
        <br>
        <label for="price">Price:</label>
        <input type="number" name="price" value="<?php echo htmlspecialchars($_GET['price']); ?>">
        <br>
        <label for="vat">VAT:</label>
        <input type="number" name="vat" value="<?php echo htmlspecialchars($_GET['vat']); ?>">
        <br>
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" value="<?php echo htmlspecialchars($_GET['quantity']); ?>">
        <br>
        <label for="is_available">Is Available:</label>
        <input type="checkbox" name="is_available" <?php echo ($_GET['is_available'] ? 'checked' : ''); ?>>
        <br>
        <label for="mother">Category:</label>
        <?php
            $categoryid = $_GET['category'];
            $conn = dbConnect(); 
            $categoryname = $conn->query("select category_name from categories where id=$categoryid");
            mysqli_close($conn);
        ?>
        <input list="categories" id="mother" name="mother" autocomplete="off" required >
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
        <label for="weight">Weight:</label>
        <input type="number" name="weight" value="<?php echo htmlspecialchars($_GET['weight']); ?>">
        <br>
        <label for="photo">Photo:</label>
        <input type="text" name="photo" value="<?php echo htmlspecialchars($_GET['photo']); ?>">
        <br>
        <button type="submit">Update Product</button>
    </form>
    <a href="index.php?idp=sklep&idp1=pokaz_prze"> Wroc</a>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newcategory = $_POST['mother'];
    

    $conn = dbConnect();

    $newcategoryidres = $conn->query("SELECT id FROM categories WHERE category_name='$newcategory'");

    if ($newcategoryidres && $newcategoryidres->num_rows > 0) {
        $newcategoryid = $newcategoryidres->fetch_assoc()['id'];

        $title = htmlspecialchars($_POST['tytul']);
        $description = htmlspecialchars($_POST['description']);
        $expiration_date = htmlspecialchars($_POST['expiration_date']);
        $price = htmlspecialchars($_POST['price']);
        $vat = htmlspecialchars($_POST['vat']);
        $quantity = htmlspecialchars($_POST['quantity']);
        $is_available = isset($_POST['is_available']) ? 1 : 0;
        $category = htmlspecialchars($newcategoryid);
        $weight = htmlspecialchars($_POST['weight']);
        $photo = htmlspecialchars($_POST['photo']);

        $res = $conn->query("UPDATE products SET 
                title = '$title', 
                description = '$description', 
                expiration_date = '$expiration_date', 
                price = '$price', 
                vat = '$vat', 
                quantity = '$quantity', 
                is_available = '$is_available', 
                category = '$category', 
                weight = '$weight', 
                photo = '$photo' 
                WHERE id = '$id'
                ");

        if ($res === TRUE) {
            echo "Product updated successfully";
        } else {
            echo "Error updating product: " . $conn->error;
        }

        mysqli_close($conn);
        
        exit;
    } else {
        echo "Error: Category not found";
    }
}
?>