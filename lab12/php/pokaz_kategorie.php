<div>
    <form method="post" action="">
        <button type="submit">pokaz</button>
    </form>
</div>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$conn = dbConnect();
$res = $conn->query("select * from categories");

$data = [];
while ($row = $res->fetch_assoc()) {
    $data[] = $row;
}

function buildNestedList($items, $parentId = null) {
    $result = '<div style="display: flex; justify-content: center; align-items: center; text-align: center;"><ul>';

    foreach ($items as $item) {
        if ($item['mother'] == $parentId) {
            $result .= '<li>' . $item['category_name'] . '<a href="index.php?idp=sklep&idp1=edytuj_kategorie&id=' . $item['id'] . '&category_name=' . $item['category_name'] . '&mother=' . $item['mother'] .'"> Edytuj </a>';
            $result .= '<a href="index.php?idp=sklep&idp1=usun_kategorie&id=' . $item['id'] .'"> Usuń </a>';
            $result .= buildNestedList($items, $item['id']);
            $result .= '</li>';
        }
    }

    $result .= '</ul></div>';
    return $result;
}

$htmlOutput = buildNestedList($data);

echo $htmlOutput;

mysqli_close($conn);
}
?>