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
                global $categories;

                    echo "<div class='col-sm-12 col-md-12'>";
                    echo "
                    <form class='editProduct' method='POST' enctype='multipart/form-data'>
                        <input type='text' name='productName' placeholder='ProductName'><br>
                        <input type='file' name='imgPath' placeholder='img' ><br>
                        <textarea name='productDescription'></textarea><br>

                        <select name='categoryId' value='categoryId'>
                        <option selected disabled>Category</option>
                        ";
                        foreach($categories as &$category) {
                            echo "
                                <option name='category' value='$category->id'>$category->title</option>
                                ";    
                            }
                            echo "
                            </select><br><br>
                        <input class='btn btn-primary' type='submit' name='add' value='ADD'>
                    </form>
                        
                        ";
                    echo "</div>";


                ?>
            </div>
    </body>
</html>
