<?php
        $name = $_POST['name'] ?? '';
        $rating = $_POST['rating'] ?? '';
        $commentText = $_POST['commentText'] ?? '';
        $commentImage = $_POST['commentImage'] ?? '';


        
        // Imprimimos los datos
        echo "<h2>Datos recibidos:</h2>";
        echo "<p><strong>Nombre:</strong> " . htmlspecialchars($name) . "</p>";
        echo "<p><strong>puntuacion:</strong> " . htmlspecialchars($rating) . "</p>";
        echo "<p><strong>comentario:</strong> " . nl2br(htmlspecialchars($commentText)) . "</p>";
        echo "<p><strong>imagen:</strong> " . nl2br(htmlspecialchars($commentImage)) . "</p>";

    
    

?>