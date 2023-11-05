<?php
$page_title = 'MedTrack - Description';
include('./components/connect.php');
include('./components/customer_header.php');
$id = $_GET['show'];
?>

<!-- Vendor CSS Files -->
<link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="./assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="./assets/css/admin_style.css" rel="stylesheet">


<!-- font awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- css file Link -->
<link rel="stylesheet" href="style.css">

<style>
    *{
        font-size: 1.7rem;
    }
</style>

<main>

    <!-- Product section-->
    <!-- fetching from database -->
    <?php

    $select_query = "select * from `products` where id ='$id'";
    $result_query = mysqli_query($conn, $select_query);
    $row = mysqli_fetch_assoc($result_query);

    $name = $row['name'];
    $category = $row['category'];
    $price = $row['price'];
    $image_01 = $row['image_01'];
    $image_02 = $row['image_02'];
    $image_03 = $row['image_03'];
    $details = $row['details'];
    $stock = $row['stock'];
    $shop_name = $row['shop_name'];
    $shop_id = $row['shop_id'];

    $query = "select * from `shopkeeper_ac` where id = '$shop_id'";
    $exe = mysqli_query($conn, $query);
    $value = mysqli_fetch_assoc($exe);
    $add = $value['address'];


    echo "
        <section class='py-5'>
            <div class='container px-4 px-lg-5 my-5'>
                <div class='row gx-4 gx-lg-5 align-items-center'>
                    <div class='col-md-6'>
                        <!-- Main Image -->
                        <img class='card-img-top mb-5 mb-md-0' src='./uploaded_img/$image_01' alt='Main Image' id='mainImage' />

                        <!-- Thumbnail Images -->
                        <br><br>
                        <div class='d-flex m-10%'>
                            <div style='width: 30%;'>
                                <img class='img-thumbnail' src='./uploaded_img/$image_01' alt='Thumbnail 1' onclick='changeMainImage(this)' />
                            </div>
                            <div style='width: 30%;'>
                                <img class='img-thumbnail' src='./uploaded_img/$image_02' alt='Thumbnail 2' onclick='changeMainImage(this)' />
                            </div>
                            <div style='width: 30%;'>
                                <img class='img-thumbnail' src='./uploaded_img/$image_03' alt='Thumbnail 3' onclick='changeMainImage(this)' />
                            </div>
                        </div>
                    </div>

                    <div class='col-md-6'>
                        <h1 class='display-5 fw-bolder'>$name</h1>
                        <br>
                        <p>Price : &#8377;$price</p>
                        <p>Disease : $category</p>
                        <p>Quantity : $stock</p>
                        <div>Shop Name:  <a href='map.php?shop=$shop_id' target='_blank'>$shop_name</a></div>
                        <br>
                        <p>Shop Address : <code>$add</code></p>
                        <p>Location on Map : <a href='map.php?shop=$shop_id' target='_blank'><i class='bi bi-geo-alt-fill'></i></a> </p>
                        <p>Product details : $details</p>
                    </div>
                </div>
            </div>

            <script>
                // JavaScript function to change the main image when a thumbnail is clicked
                function changeMainImage(thumbnail) {
                    var mainImage = document.getElementById('mainImage');
                    mainImage.src = thumbnail.src;
                }
            </script>

        </section>

          ";
    ?>



</main>







<?php
include('./components/customer_footer.php');
?>