<?php
@include 'database.php';

if (isset($_POST['add-file-respondent'])) { {
          $file_name = $_POST['file-respondent'];
     };
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href='../assets/uploadfile.css'>
     <title>Tabel Respondent</title>
</head>

<body>
     <h1>Upload File Kamu Shaggy</h1>
     <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
          <h3>add File Respondent</h3>
          <input type="text" placeholder="Masukan Nama Anda" name="username">
          <input type="number" placeholder="Masukan NPM Anda" name="username">
          <input type="file" id="file-responden" name="file-responden" accept=".jpg, .jpeg, .png, .pdf">
          <input type="submit" value="add a file respondent" name="add_file">
     </form>
</body>

</html>