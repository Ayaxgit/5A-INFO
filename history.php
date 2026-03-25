<?php
require_once "config.php";

$sql = "SELECT question, answer, score, created_at
        FROM conversations
        ORDER BY created_at DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8">
<title>Cronologia Conversazioni</title>

<link rel="stylesheet" href="style.css">

</head>
<body>

<div class="container">

<h1>Cronologia Conversazioni</h1>

<?php

if ($result && $result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        echo "<div class='card'>";

        echo "<div class='question-box'>";
        echo "<strong>Domanda:</strong><br>";
        echo nl2br(htmlspecialchars($row["question"]));
        echo "</div>";

        echo "<div class='answer-box'>";
        echo "<strong>Risposta:</strong><br><br>";
        echo nl2br(htmlspecialchars($row["answer"]));
        echo "</div>";

        echo "<div class='answer-box'>";
        echo "<strong>Punteggio consapevolezza digitale:</strong> ";
        echo intval($row["score"]) . "/5";
        echo "</div>";

        
        echo "</div>";
    }

} else {

    echo "<p>Nessuna conversazione trovata.</p>";

}

$conn->close();

?>

<div class="footer">
    <p>
        <button type="submit"><a href="index.html"><strong>Torna alla chat</strong></a></button>
    </p>
</div>

</div>

</body>
</html>
