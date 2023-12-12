<?php
function FileReader(string $filepath, $mode)
{
    if ($mode == 0) {
        if (count(FileInfo($filepath, 1)) != 0) {
            return file_get_contents($filepath);
        }

    }

    if ($mode == 1) {
        if (count(FileInfo($filepath, 1)) != 0) {
            return readfile($filepath);
        }
    }

    if ($mode == 2) {
        if (count(FileInfo($filepath, 1)) != 0) {
            $file_content = "";
            $file = fopen($filepath, 'r');
            while ($char = fgetc($file)) {
                $file_content .= $char;
            }
            return $file_content;
        }
    }

    if ($mode == 3) {
        if (count(FileInfo($filepath, 1)) != 0) {
            $file_content = "";
            $file = fopen($filepath, 'r');
            while ($line = fgets($file)) {
                $file_content .= $line;
            }
            return $file_content;
        }
    }
}

// ? File Info
// ! Assumed it Exist Logic
function FileInfo(string $path, $info = 0, $exsist = 1): array
{
    // ! if nor then exsist ?
    if (!$exsist) {
        // echo "<br>$path For Creation<br>";
        return array('file_creation' => true);
    }

    if (!file_exists($path)) {
        echo "<br><span class='m-3 alert alert-danger'>File does not exist</span></br>";
        return array();
    }

    if (filesize($path) == 0) {
        echo "<br>File is empty</br>";
        return array();
    }

    $arrInfo = array(
        'file_exsist' => file_exists($path),
        'file_size' => filesize($path) / 1024 . " KB",
        'file_type' => filetype($path),
    );

    if ($info == 0) {
        echo "<br><br>File Exists " . file_exists($path) . "<br>";
        echo "File Size " . filesize($path) / 1024 . " KB " . "<br>";
        echo "File Type " . filetype($path) . "<br>";
        echo "<br>";
    }

    return $arrInfo;
}

// ? File Resource
function FileResource($filepath, $mode)
{
    if (count(FileInfo($filepath, 0, 0)) != 0) {
        // echo "<br>File-Resource";
        // ? if not exist create and W/R
        $file = fopen($filepath, $mode) or die("Error opening file");
        // echo "<br>" . $file;
        return $file;
    }
}

function FileWrite($filepath, $content, $mode)
{
    if ($mode == "r") {
        echo "File Resouce for Reading 🤡";
    } else {
        $file = FileResource($filepath, $mode);
        fwrite($file, $content);
        return $content;
    }

}


function list_files()
{
    $dirPath = './file';
    $files = scandir($dirPath);
    echo "<ul>";
    foreach ($files as $file) {
        $filePath = $dirPath . '/' . $file;
        if (is_file($filePath)) {
            echo "<li>" . $file . "</li>";
        }
    }
    echo "</ul>";
}
// // file write
// FileResource('./file/temp2.txt', 'r');
// echo "<br>";
// FileReader('./file/temp2.txt', 2);

// echo "<br>";
// FileWrite('./file/temp1.txt', 'LOL', 'a');
// FileReader('./file/temp1.txt', 2);
$content = "";
$filepath = "";

// todo ReadFile
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['action'])) {
    // ? Read
    if ($_GET['action'] == "Read") {
        $filepath = $_GET['filepath'];
        // ! assume file exisit
        $content = FileReader($filepath, 0); //Change as per need
    }

    // ? Write
    if ($_GET['action'] == "Write" && isset($_GET['content'])) {
        $filepath = $_GET['filepath'];
        $content = $_GET['content'];
        $content = FileWrite($filepath, $content, 'w'); //Change as per need
    }

    // ? Append
    if ($_GET['action'] == "Append" && isset($_GET['content'])) {
        $filepath = $_GET['filepath'];
        $content = $_GET['content'];
        FileWrite($filepath, $content, 'a');
        $content = FileReader($filepath, 0); //Append File Change as per need
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File W/R</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container p-3">
        <form action="content_writer.php">
            <div class="mb-3">
                <h1>Files</h1>
                <div class="contianer">
                    <?php list_files(); ?>
                </div>
                <h1 class="display-6">File Path</h1>
                <label for="File_Path" class="form-label">File Path</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">./../../</span>
                    <input type="text" name="filepath" class="form-control" id="filepath"
                        value="<?php echo $filepath; ?>" required>
                </div>
            </div>

            <div class="mb-3">
                <h1 class="display-6">File Content</h1>
                <label for="Content" class="form-label">Example Content</label>
                <select class="form-select" name="action" id="action" required>
                    <option value="Read" selected>Read</option>
                    <option value="Write">Write</option>
                    <option value="Append">Append</option>
                </select>
                <br>
                <textarea name="content" class="form-control" id="Content"
                    rows="15"><?= ($content ? $content : ''); ?></textarea>
            </div>
            <br>
            <input class="btn btn-outline-info " type="submit" value="Do action">
        </form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</html>