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

                    <div class="col-sm-12 col-md-12">
   
                    <form class="editProduct" enctype="multipart/form-data" method="POST">
                        <input type="text" name="productName" value="<?= $editProduct->name ?>"><br>
                        <img style="height: 250px; width: auto" class=producten img-responsive card-img-top2 src="<?= $editProduct->picture ?>"><br>
                        
                        
                        <input name="userfile" type="file" /> 
                        <textarea name="productDescription"><?=$editProduct->description?></textarea><br>
                        <input class="btn btn-primary" type="submit" name="update" value="UPDATE">
                    </form>
                    <div class=""></div>

                </div>
            </div>
    </body>
</html>
