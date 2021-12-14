<!DOCTYPE html>
    <html>
    <?php
    include_once(TEMPLATE_ROOT . "/defaults/head.php");
    ?>
    <body>
        <div class="container-fluid main">
            <?php
            include_once (TEMPLATE_ROOT . "/defaults/menu.php");
            ?>

            <div class="row gy-3">
                <?php 
                    echo "<div class='col-sm-12 col-md-12'>";
                    echo "
                    <form class='editProduct' method='POST'>
                        <input type='text' name='productName' value='$editProduct->name'><br>
                        <img style='height: 250px; width: auto' class=producten img-responsive card-img-top2 src='$editProduct->picture'><br>
                        <input type='text' name='imgPath' value='$editProduct->picture' ><br>
                        <textarea name='productDescription'>$editProduct->description</textarea>
                        <input class='btn btn-primary' type='submit' name='update' value='UPDATE'>
                    </form>
                    ";
                    echo "</div>";


                ?>
            </div>
    </body>
</html>
