<?
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $cPicture = $_FILES['cPicture']['name'];

    // destination of the file on the server
    $destination = 'upload/' . $cPicture;

    // get the file extension
    $extension = pathinfo($cPicture, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['cPicture']['tmp_name'];
    $size = $_FILES['cPicture']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['cPicture']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO files (name, size, downloads) VALUES ('$cPicture', $size, 0)";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}
?>