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

</html>


<form action="" method="post" enctype="multipart/form-data">
    <label for="imageUpload">Upload an profile image</label>
    <input type="file" name="avatar" id="imageUpload"/>
    <input type="hidden" name="MAX_FILE_SIZE" value="100000">
    <button>Send</button>
</form>

<?php
const AUTHORIZED_MIMES = ['image/jpeg', 'image/gif', 'image/png'];
$uploadDir = 'uploads/';

$myIterator = new FilesystemIterator($uploadDir);


foreach ($myIterator as $myFile) {
    ?>
<figure>
    <img src="<?= $uploadDir . $myFile->getFilename() ?>" alt="<?= $myFile->getFilename() ?>" style="width:10%">
    <figcaption><?= $myFile->getFilename() ?></figcaption>
</figure>
<?php
}

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $extensions = array('png', 'gif', 'jpg', 'jpeg');

    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);

    $filename = uniqid() . '.' . $extension;




    if (empty($errors)) {

        $uploadFile = $uploadDir . $filename;
        move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);
        echo 'Upload effectué avec succès !';

    } else //Sinon (la fonction renvoie FALSE).
    {
        echo $errors;
        echo 'Echec de l\'upload !';
    }
}