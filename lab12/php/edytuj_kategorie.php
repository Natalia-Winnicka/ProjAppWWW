<?php
if (isset($_GET['id']) && isset($_GET['category_name']) && isset($_GET['mother'])) {
    $id = htmlspecialchars($_GET['id']);
    $initmotherid = htmlspecialchars($_GET['mother']);
    $initname = htmlspecialchars($_GET['category_name']);
} else {
    $initmotherid = '';
    $initname = '';
}
?>
<div>
<form method="post" action="">
    <?php
        if($initmotherid != ''){
            $conn = dbConnect();
            $mothername = $conn->query("select category_name from categories where id=$initmotherid");
            mysqli_close($conn);
        }else{
            $mothername = "brak" ;
        }
    ?>
    <label for="mother">wybierz kategorię nadrzędną:</label> 
    <input list="categories" id="mother" name="mother" autocomplete="off">
        <datalist id="categories">
            <?php
            $conn = dbConnect(); 

            $categories = $conn->query("SELECT * FROM categories WHERE mother IS NULL ORDER BY category_name");

            echo "<option value='brak'></option>";

            foreach ($categories as $category) {
                echo "<option value='" . htmlspecialchars($category['category_name']) . "'>" . htmlspecialchars($category['category_name']) . "</option>";
            }
            ?>
        </datalist>
    <br>
    <label for="nazwa">nazwa:</label>
    <input type="text" name="nazwa" maxlength="20" value="<?php echo $initname; ?>">
    <br>
    <button type="submit">Edytuj</button>
    </form>
    <a href="index.php?idp=sklep&idp1=pokaz_kat"> Wroc</a>
</div>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newmother=$_POST['mother'];
        $newname=$_POST['nazwa'];
    $newmotherid = null;

        $conn = dbConnect();

    if($newmother != 'brak'){
            $newmotheridres = $conn->query("select id from categories where category_name='$newmother'");
            $newmotherid = $newmotheridres->fetch_assoc()['id'];
    }

    if($newmotherid != null && $newmother != 'brak'){
        $res = $conn->query("update categories set mother='$newmotherid', category_name='$newname' where id=$id limit 1;");
    } else{
    $res = $conn->query("update categories set mother=null, category_name='$newname' where id=$id limit 1;");
    } 

        mysqli_close($conn);
        header("Location: index.php?idp=sklep&idp1=pokaz_kat");
        exit;
}
?>