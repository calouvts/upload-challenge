<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

if (isset($POST) && !empty($_POST)) {


    if ($_FILES['avatars']['error'] == 0) {
        ?>
        <pre><?php print_r($_FILES) ?> </pre> <?php
        if ($_FILES['monfichier']['size'] > 8000) {
            $error = "Votre image est trop volumineuse";
        }
        $extension = strrchr($_FILES['monfichier']['name'],'.');
        if($extension !='.jpg') {
            $error = "votre fichier n'est pas conforme.";
        }

        if(!isset($error)){
            move_uploaded_file($_FILES['avatars']['tmp_name'], 'uploads/'.$_FILES['monfichier']['name']);
            echo "le chargement du fichier est effectif";
        }
    } else {
        $error = 'problème formulaire';
    }
}
?>


<div style="color:red;"><p><?php if (isset($error)) echo $error; ?></p></div>
<form method="POST" action="" enctype="multipart/form-data">
    <label for="imageUpload">Upload an profile image</label>
    <input type="file" name="avatars[]" multiple="multiple" />
    <button>Send</button>
</form>

</body>
</html>

