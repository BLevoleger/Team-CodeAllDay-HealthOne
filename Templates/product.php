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
            
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/categories">Categories</a></li>
                </ol>
            </nav>

            <div class="row gy-3">
                <?php 
                echo "<div class='col-sm-12 col-md-12'>";
                    echo "<h3>" . $product->name . "</h3> <br>";
                    echo '<img class=producten img-responsive' . 'card-img-top2' . ' ' . 'src=' . $product->picture . '><br>';
                    echo '<p>' . $product->description .'</p>';
                echo "</div>";
                ?>
            </div>

            <br>
                <hr>
            <br>
            <?php if(isset($_SESSION['username'])): ?>
                <div class="row gy-3">
                    <div class='col-sm-4'>
                        <?php
                        global $getProductReview;
                        if(!$getProductReview){
                            echo "<h4>no user reviews yet!</h4>";
                        } else {
                            echo "
                            <nav class='reviewList'>
                                <ul style='width: 30vw'>
                            ";
                                echo "
                                    <table style='width: 25vw'>
                                        <tr>
                                            <th>User</th>
                                            <th>Review</th>
                                        </tr>
                                ";
                                foreach ($getProductReview as &$data) {
                                    echo "
                                        <tr>
                                            <li>
                                                <td style='border: 1px solid black; width:100px'>
                                                    <p style='font-size: 11px'>$data->username <br><b>$data->stars sterren</p>
                                                </td>
                                                <td style='border: 1px solid black; width: 200px'>
                                                    <p style='font-size: 11px'>$data->description</p>
                                                </td>
                                                <td style='border: 1px solid black;'>
                                                    <p style='font-size: 9px'>$data->time</p>
                                                </td>
                                            </li>
                                        </tr>
                                    ";
                                }
                                echo "
                                    </table>
                                </ul>
                            </nav>
                            ";
                        }
                    ?>
                    </div>
                    <div class="col-sm-8">
                        <form method="POST">
                            <div class="form-group">
                              <label>Name:</label>
                              <label class="col-form-label">
                                  <?php if(isset($_SESSION["username"])) {
                                    echo $_SESSION["username"];
                                  } ?>
                              </label>
                            </div>
                            <div class="form-group">
                              <label>Review</label>
                              <textarea name="review" id="name2" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Waardering:</label>
                                <select class="custom-select" name="stars">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <hr>
                            <div class="form-group">
                                <input type="submit" name="addReview" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>

            <?php elseif (!isset($_SESSION["username"])): ?>
                <div class="row gy-3">
                    <div class='col-sm-4'>
                        <?php
                        global $getProductReview;
                        if(!$getProductReview){
                            echo "<h4>no user reviews yet!</h4>";
                        } else {
                            echo "
                            <nav class='reviewList NoLoginUl'>
                                <ul style='width: 50vw'>
                            ";
                                echo "
                                    <table class='NoLoginTable' style='width: 25vw' >
                                        <tr>
                                            <th>User</th>
                                            <th>Review</th>
                                        </tr>
                                ";
                                foreach ($getProductReview as &$data) {
                                    echo "
                                        <tr>
                                            <li>
                                                <td style='border: 1px solid black; width:100px'>
                                                    <p style='font-size: 11px'>$data->username <br><b>$data->stars sterren</p>
                                                </td>
                                                <td style='border: 1px solid black; width: 200px'>
                                                    <p style='font-size: 11px'>$data->description</p>
                                                </td>
                                                <td style='border: 1px solid black;'>
                                                    <p style='font-size: 9px'>$data->time</p>
                                                </td>
                                            </li>
                                        </tr>
                                    ";
                                }
                                echo "
                                    </table>
                                </ul>
                            </nav>
                            ";
                        }
                    ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php
            include_once ('defaults/footer.php');
            ?>
        </div>
    </body>
</html>
