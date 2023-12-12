<div>
    <h2>czy na pewno chcesz usunac?</h2>
    <form method="post" action="">
        <button type="submit">usun</button>
    </form>
    <a href="index.php?idp=lab7&idp1=pokaz"> Wroc</a>
</div>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $conn = dbConnect();
$id=$_GET['page_id'];
$res = $conn->query("delete from page_list where id=$id limit 1");
  mysqli_close($conn);
  header("Location: index.php?idp=lab7&idp1=pokaz");
        exit;
    }
?>