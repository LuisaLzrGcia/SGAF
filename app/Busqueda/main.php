<?php
if (session_status() !== 2) session_start();
if ($_SESSION['user']) {
    if ($_SESSION['rol'] == "admin") {
        include_once "../Componets/Navbar/NavbarAdmin.php";
    } else {
        include_once "../Componets/Navbar/NavbarUser.php";
    }
} else {
    header("Location: ../../index.html");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGAF</title>
    <link rel="stylesheet" href="../../public/CSS/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
</head>

<body class="bg-general">
    <div class="bg-body-secondary m-5 p-3">
        <form method="post">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="inputPassword6" class="col-form-label">Buscar archivos:</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="search" name="search" class="form-control" required>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>

        <?php
        function searchFiles($directory, $searchTerm)
        {
            $matchingFiles = [];
            $files = scandir($directory);

            foreach ($files as $file) {
                if ($file != '.' && $file != '..') {
                    $filePath = $directory . DIRECTORY_SEPARATOR . $file;
                    if (is_dir($filePath)) {
                        // Si es una carpeta, llamamos recursivamente a la función
                        $matchingFiles = array_merge($matchingFiles, searchFiles($filePath, $searchTerm));
                    } else {
                        // Si es un archivo, comprobamos si coincide con el término de búsqueda
                        if (strpos($file, $searchTerm) !== false) {
                            $matchingFiles[] = [
                                'file' => $file,
                                'directory' => $directory
                            ];
                        }
                    }
                }
            }

            return $matchingFiles;
        }

        if (isset($_POST['search'])) {
            $searchTerm = $_POST['search'];
            $directory = 'C:\Users\luisa\Downloads\sgaf'; // Especifica la ruta al directorio que deseas buscar
        
            // Realizamos la búsqueda recursiva
            $matchingFiles = searchFiles($directory, $searchTerm);

            // Mostrar los resultados
            if (count($matchingFiles) > 0) {
                echo "<h2>Resultados de la búsqueda:</h2>";
                foreach ($matchingFiles as $fileInfo) {
                    $filePath = realpath($fileInfo['directory'] . DIRECTORY_SEPARATOR . $fileInfo['file']); // Obtiene la ruta absoluta del archivo
                    echo "<div class='direccionFile'>";
                    echo "<a class='nombreFile w-100 ms-3 text-black' href='descargarArchivo.php?file=" . urlencode($filePath) . "' target='_blank'>";
                    echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-file-earmark-text' viewBox='0 0 16 16'>";
                    echo "<path d='M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5'/>";
                    echo "<path d='M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z'/>";
                    echo "</svg>";
                    echo $fileInfo['file'] . " <span class='text-white bg-black px-3 py-1 ms-3'>[Carpeta: " . basename($fileInfo['directory']) . "]</span>";
                    echo "</a>";
                    echo "<form action='descargarArchivo.php' method='post'>";
                    echo "<input type='hidden' name='file' value='" . urlencode($filePath) . "'>";
                    echo "<button class='btn-files btn-descargar p-1 my-1 w-100 ' type='submit'>Descargar</button>";
                    echo "</form>";
                    echo "</div>";
                }
                
            } else {
                echo "<p>No se encontraron archivos que coincidan con el término de búsqueda.</p>";
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>