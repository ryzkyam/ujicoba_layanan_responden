<?php

@include 'db_conect.php';

session_start();

$username = $_SESSION['user_id'];

if (!isset($admin_id)) {
     header('location:product_penelitian.php');
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
    <title>Product Penelitian</title>
    <link rel="stylesheet" href="./product.css">
</head>
<body>
    <?php @include 'admin_header.php'; ?>

    <!-- Container untuk sidebar dan konten utama -->
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Dashboard</h2>
            <ul>
                <li><a href="dashboard.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="#"><i class="fas fa-plus-circle"></i> Add Product</a></li>
                <li><a href="#"><i class="fas fa-database"></i> View Products</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </aside>

        <!-- Main content -->
        <main>
            <section class="add-products">
                <form action="" method="POST" enctype="multipart/form-data">
                    <h3>Add Product Penelitian</h3>
                    <input type="text" class="box" required placeholder="Masukan NPM" name="npm">
                    <input type="text" class="box" required placeholder="Enter Product Name" name="name">
                    <textarea name="details" class="box" required placeholder="Enter Product Details" cols="30" rows="10"></textarea>
                    <input type="file" accept="image/jpg, image/jpeg, image/png" required class="box" name="image">
                    <input type="submit" value="Add Product" name="add_product" class="btn">
                </form>
            </section>

            <section class="show-products">
                <h2>Product List</h2>
                <div class="box-container">
                    <?php
                    $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('Query failed');
                    if (mysqli_num_rows($select_products) > 0) {
                        while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                    ?>
                            <div class="box">
                                <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="Product Image">
                                <div class="info">
                                    <p><strong>NPM:</strong> <?php echo $fetch_products['npm']; ?></p>
                                    <p><strong>Name:</strong> <?php echo $fetch_products['name']; ?></p>
                                    <p><strong>Details:</strong> <?php echo $fetch_products['details']; ?></p>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo '<p class="empty">No products added yet!</p>';
                    }
                    ?>
                </div>
            </section>
        </main>
    </div>

    <script src="js/admin_script.js"></script>
</body>

</html>
