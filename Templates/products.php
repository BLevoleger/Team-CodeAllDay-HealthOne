<!DOCTYPE html>
    <html>
    <?php
    include_once('defaults/head.php');
    ?>
    <body>
        <div class="container-fluid main">
            <?php
            include_once ('defaults/menu.php');
            ?>

            <?php
             echo "<div class='row gy-6 '>";
            foreach($products as &$data) {
                echo "
                
                    <div class='col-sm-4 col-md-4'>
                        <div class='card cards producten'>
                            <div class='card-body text-center'>
                                <a href='$categoryId/product/$data->id'>
                                    <img class='product-img img-responsive center-block' src='$data->picture'/>
                                </a>
                                <div class='card-title mb-3'>$data->name</div>
                            </div>
                        </div>
                    </div>
                ";
            }
            echo "</div>";
            ?>

            <?php
            include_once ('defaults/footer.php');
            ?>
        </div>
    </body>
</html>
