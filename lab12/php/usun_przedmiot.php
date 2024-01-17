<?php
$id=$_GET['id'];
?>
<div>
    <h2>czy na pewno chcesz usunac?</h2>
    <form method="post" action="">
        <button type="submit">usun</button>
    </form>
    <a href="index.php?idp=sklep&idp1=pokaz"> Wroc</a>
</div>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $conn = dbConnect();
        $res = $conn->query("delete from products where id=$id limit 1");
        mysqli_close($conn);
        header("Location: index.php?idp=sklep&idp1=pokaz_prze");
        exit;
    }
?>