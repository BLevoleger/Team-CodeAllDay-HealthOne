<!DOCTYPE html>
<html>
<?php
include_once('defaults/head.php');
?>

<body>

<div class="container-fluid">
    <?php
    include_once('defaults/header.php');
    include_once('defaults/menu.php');
    ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a href="/categories">Categories</a></li>
        </ol>
    </nav>
            <?php
                // echo json_encode($categories);
                echo "<div class='row gy-3'>";
                foreach ($categories as &$data) {
                    echo "
                    <div class='col-sm-4 col-md-3'>
                        <div class='card'>
                            <div class='card-body text-center'>";
                                echo "<a href='" . $data['id'] . "'>
                                    <img class='product-img img-responsive center-block' src='" . $data['image'] . "'/>
                                </a>";
                                echo "<div class='card-title mb-3'>" . $data['title'] . "</div>";
                        echo "</div>
                        </div>
                    </div>
                    
                    ";

                    // echo "title: " . $data['title'] . "<br>";
                    // echo "img: " . $data['image'] . "<br>";
                    // echo "id: " . $data['id'] . 
                }
                echo "</div>";
            ?>
            
    

    <hr>
    <?php
    include_once('defaults/footer.php');

    ?>
</div>

</body>
</html>

