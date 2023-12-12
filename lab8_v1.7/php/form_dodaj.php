<div>
    <form method="post" action="">
        <label for="tytul">Tytul:</label>
        <input type="text" name="tytul" required>
        <br>
        <label for="kontent">kontent:</label>
        <textarea name="kontent" required></textarea>
        <br>
        <label for="status">Status:</label>
        <input type="checkbox" name="status">
        <br>
        <button type="submit">Dodaj pods</button>
    </form>
    <a href="index.php?idp=lab7&idp1=pokaz"> Wroc</a>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = dbConnect();
    $stmt = $conn->prepare("INSERT INTO page_list (page_title, page_content, status) VALUES (?, ?, ?)");

    if ($stmt === false) {
        die("Error in query: " . $conn->error);
    }

    $stmt->bind_param("sss", $tytul, $kontent, $status);
    $tytul = htmlspecialchars($_POST['tytul']);
    $kontent = htmlspecialchars($_POST['kontent']);
    $status = htmlspecialchars($_POST['status']);

    $stmt->execute();

    $stmt->close();
    mysqli_close($conn);

    header("Location: index.php?idp=lab7&idp1=pokaz");
    exit;
}
?>