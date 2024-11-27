<?php
@include 'db_conect.php';

// if (isset($_POST['add-file-respondent'])) { {
//           $file_name = $_POST['file-respondent'];
//      };
// }

session_start();

$username = $_SESSION['user_id'];

if (!isset($username)) {
     header('location:login.php');
};

if (isset($_POST['add_product'])) {
     $npm = mysqli_real_escape_string($conn, $_POST['npm']);
     $name = mysqli_real_escape_string($conn, $_POST['name']);
     $details = mysqli_real_escape_string($conn, $_POST['details']);
     $image = $_FILES['image']['name'];
     $image_size = $_FILES['image']['size'];
     $image_tmp_name = $_FILES['image']['tmp_name'];
     $image_folter = 'uploaded_img/' . $image;

     $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');

     if (mysqli_num_rows($select_product_name) > 0) {
          $message[] = 'product name already exist!';
     } else {
          $insert_product = mysqli_query($conn, "INSERT INTO `products`(npm,name, details, image) VALUES('$npm','$name', '$details', '$image')") or die('query failed');

          if ($insert_product) {
               if ($image_size > 2000000) {
                    $message[] = 'image size is too large!';
               } else {
                    move_uploaded_file($image_tmp_name, $image_folter);
                    $message[] = 'product added successfully!';
               }
          }
     }
}

// if (isset($_GET['delete'])) {

//      $delete_id = $_GET['delete'];
//      $select_delete_image = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
//      $fetch_delete_image = mysqli_fetch_assoc($select_delete_image);
//      unlink('uploaded_img/' . $fetch_delete_image['image']);
//      mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
//      mysqli_query($conn, "DELETE FROM `wishlist` WHERE pid = '$delete_id'") or die('query failed');
//      mysqli_query($conn, "DELETE FROM `cart` WHERE pid = '$delete_id'") or die('query failed');
//      header('location:admin_products.php');
// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href='./uploadfile.css'>
     <title>Tabel Respondent</title>
</head>

<body>
     <div class="box-container">

          <section class="add-products">

               <form action="" method="POST" enctype="multipart/form-data">
                    <h3>product penelitian</h3>
                    <input type="text" class="box" required placeholder="masukan npm" name="npm">
                    <input type="text" class="box" required placeholder="masukan nama peneliti" name="name">
                    <textarea name="details" class="box" required placeholder="masukan details penelitian" cols="30" rows="10"></textarea>
                    <input type="file" accept="image/jpg, image/jpeg, image/png" required class="box" name="image">
                    <input type="submit" value="add product" name="add_product" class="btn">
               </form>

          </section>


     </div>
     </div>

     </div>

     </div>
</body>

</html>