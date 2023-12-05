<div>
    <form method="post" action="">
        <button type="submit">pokaz</button>
    </form>
</div>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$conn = dbConnect();
$res = $conn->query("select * from page_list order by id desc limit 100");

while ($row = mysqli_fetch_array($res)) {
    echo $row['id'] . ' ' . $row['page_title'] . '<a href="index.php?idp=lab7&idp1=edytuj&page_id=' . $row['id'] . '&page_title=' . $row['page_title'] . '&page_content=' . $row['page_content'] . '&status=' . $row['status'] .'"> Edytuj </a>' .
    '<a href="index.php?idp=lab7&idp1=usun&page_id=' . $row['id'] . '"> usun </a>' . ' <br />';
}

mysqli_close($conn);
}
?>