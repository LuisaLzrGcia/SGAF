<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View File</title>
</head>
<body>
    <h1>View File</h1>
    <?php
    if (isset($_GET['file'])) {
        $file = "uploads/" . $_GET['file']; // Directorio donde están los archivos
        if (file_exists($file)) {
            echo "<iframe src='" . $file . "' width='100%' height='500'></iframe>";
        } else {
            echo "<p>El archivo no existe.</p>";
        }
    } else {
        echo "<p>No se especificó ningún archivo.</p>";
    }
    ?>
</body>
</html>
