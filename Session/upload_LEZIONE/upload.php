<?php
// la variabile per la cartella
$target_dir = "uploads/";

// questo è un array che costruisce il nome del file da salare sul  server
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);


$uploadOk = 1;

// PATHINFO_EXTENSION  è un istruzione che trasforma in stringa l'estensione del FILE
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

// per capire se è stato fatto un submit
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . "."; // mime è per capire che tipologia di file
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {


// ARRIVATI A QUESTO PUNTO SI POTREBBE INSERIRE ULTERIORI TEST

  // QUESTO PUNTO È LA VERA PARTE DELL'UPLOAD= L'ESSENZIALE
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        // È QUI CHE VADO A INSERIRE LA PROCEDURA DI INSERT CON MYSQL

        $conn=mysqli_connect(localhost,"stefanophp7", "3pasquaman3", "my_stefanophp7");
        $strSQL2="UPDATE Tusers SET FilePathImageAvatar='$target_file' ";
        $query=mysqli_query($conn,$strSQL2);
        echo $strSQL2;

        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
