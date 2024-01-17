<?php
if (isset($_GET['page_title']) && isset($_GET['page_id']) && isset($_GET['page_content']) && isset($_GET['status'])) {
    $id = htmlspecialchars($_GET['page_id']);
    $inittitle = htmlspecialchars($_GET['page_title']);
    $initcontent = htmlspecialchars($_GET['page_content']);
    $status = htmlspecialchars($_GET['status']);
} else {
    $inittitle = '';
    $initcontent = '';
    $initstatus = '';
}
?>
<div>
<form method="post" action="">
<label for="tytul">Tytul:</label>
    <input type="text" name="tytul" value="<?php echo $inittitle; ?>" required>
    <br>
    <label for="kontent">kontent:</label>
    <textarea name="kontent"  required><?php echo $initcontent; ?></textarea>
    <br>
    <label for="status">Status:</label>
    <input type="checkbox" name="status" value="<?php echo $initstatus ; ?>">
    <br>
    <button type="submit">Edytuj</button>
    </form>
    <a href="index.php?idp=sklep&idp1=pokaz"> Wroc</a>
</div>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $tytul=$_POST['tytul'];
        $kontent=$_POST['kontent'];
        $status=$_POST['status'];
$conn = dbConnect();
$res = $conn->query("update page_list set page_title=$tytul, page_content=$kontent, status=$status where id=$id limit 1;");

mysqli_close($conn);
header("Location: index.php?idp=sklep&idp1=pokaz");
exit;
}
?>