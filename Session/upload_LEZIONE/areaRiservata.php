
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Area Riservata</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <script>

      function FaseInput(){

        nuovaPSString=document.getElementById("nuovaPS").value;
        confermaPSString=document.getElementById("confermaNuovaPS").value;
        document.getElementById("erroreConferma").innerHTML="";

        errore=false;

        if (confermaPSString!=nuovaPSString) {

          document.getElementById("erroreConferma").innerHTML="errore conferma password";

          errore=true;

        }



      }


      function eseguiCambio(){
        FaseInput();
        if (errore==false) {
          formRiservata.submit();
        }

      }

      </script>
   </head>
   <body>


     <!-- PHP -->

     <?php

        $vecchiaPSSQL=$_POST['vecchiaPS'];
        $nuovaPSSQL=$_POST['nuovaPS'];
        $confermaPSSQL=$_POST['confermaNuovaPS'];
        $emailSQL=$_POST['emailForm'];
        $idSQL=$_POST['campoID'];


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
                $strSQL2="UPDATE Tusers SET FilePathImageAvatar='$target_file' WHERE Email='$emailSQL' ";
                $query=mysqli_query($conn,$strSQL2);
                $row=mysqli_fetch_assoc($query);
                echo $strSQL2;


                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }








      ?>

     <!-- FORM CAMBIA PASSWORD -->

    <div class="container">


      <div class="">

      </div>



        <form action="areaRiservata.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <label>Digita Email</label>
            <input type="email" name="emailForm" id="emailForm" value="">
            <br>
            <br>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>


        <div class="">
          <img src="" alt="">
        </div>


    </div>



     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
   </body>
 </html>
