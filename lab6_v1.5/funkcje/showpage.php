<?php
function showSubsite($id, $conn) {
    $stmt = $conn->prepare("SELECT * FROM page_list WHERE id=? LIMIT 1");

    if ($stmt === false) {
        die("Error in query: " . $conn->error);
    }
    
    $stmt->bind_param("i", $id_clear);
    $id_clear = htmlspecialchars($id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $web = $row['page_content'];
    } else {
        $web = '[nie_znaleziono_strony]';
    }

    $stmt->close(); 

    return $web; 
}
?>