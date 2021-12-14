<!DOCTYPE html>
<html>
<?php
include_once('defaults/head.php');
?>

<body>

<div class="container-fluid main">
    <?php
    include_once('defaults/menu.php');
    ?>

    <?php
    echo "<div class='row gy-3 Cat'>";
    foreach ($categories as &$data) {    
     echo "
            <div class='col-sm-4 col-md-3'>
                <div class='card'>
                    <div class='card-body text-center'>
                        <a href='/categories/$data->id'>
                            <img class='product-img img-responsive center-block' src='/img/categories/" . $data->image . "'/>
                        </a>
                        <div class='card-title mb-3'>" . $data->title . "</div>
                    </div>
                </div>
            </div>
            ";
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

