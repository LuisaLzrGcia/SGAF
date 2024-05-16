<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Explorer</title>
</head>

<body>
    <h1>File Explorer</h1>
    <ul>
        <?php
        $directory = "C:\Users\luisa\Downloads\sgaf"; // Directorio donde están los archivos
        $files = scandir($directory); // Obtiene una lista de archivos en el directorio
        foreach ($files as $file) {
            if ($file != "." && $file != "..") { // Ignora los directorios "." y ".."
                echo "<li><a href='view.php?file=" . urlencode($file) . "' target='_blank'>" . $file . "</a></li>";
            }
        }
        ?>
    </ul>
</body>

</html>