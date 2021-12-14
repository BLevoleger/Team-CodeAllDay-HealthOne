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


            <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                <div class="card p-4">
                    <div class=" image d-flex flex-column justify-content-center align-items-center"> <button class="btn btn-secondary rounded"><img src="img/logo/profile.png" class="rounded-circle" height="100" width="100" /></button>
                    <div class="d-flex flex-row justify-content-center align-items-center gap-2"> <span class="idd1">UserId <?=$user->id?></span></div>
                    <div class="d-flex flex-row justify-content-center align-items-center mt-3"><b> EDIT </b></div>
                    <div class="d-flex flex-row justify-content-center align-items-center mt-3">
                        <form action="" method="post">
                            <label>Username: </label><br>
                            <input type="text" name="" value="<?= $user->username ?>"><br>
                        </form>
                    </div>
                    <div class="d-flex flex-row justify-content-center align-items-center mt-3">
                    <?php 
                    $userReviews = getUserReviews($user->id);
                    if(!$userReviews){
                        echo "<h3>no user reviews yet!</h3>";
                    } else {
                        echo "
                        <nav class='reviewList'>
                            <ul>
                        ";
                            echo "
                                <table>
                                    <tr>
                                        <th>Product</th>
                                        <th>Review</th>
                                    </tr>
                            ";
                            foreach ($userReviews as &$data) {
                                echo "
                                    <tr>
                                        <li>
                                            <td style='border: 1px solid black; width:100px'>
                                                <p style='font-size: 11px'>$data->product_name</p>
                                                <img src='$data->picture' alt='Product Img' width='75px' height='auto'/><br>
                                                <p style='font-size: 11px'>Stars : $data->stars</p>
                                            </td>
                                            <td style='border: 1px solid black; width: 200px'>
                                                <p style='font-size: 11px'>$data->username</p>
                                                <p style='font-size: 11px'>$data->description</p>
                                            </td>
                                            <td style='border: 1px solid black;'>
                                                <p style='font-size: 9px'>$data->time</p>
                                            </td>
                                            <td style='align-items:center'>
                                                <a href=''>DELETE</a>
                                            </td>
                                            <br><br>
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
                        <div class=" d-flex mt-2"> <a href="/profileEdit" class="btn1" style="text-decoration:none; background: rgba(0, 255, 0, 1);">Confirm Changes</a> </div>
                        <!-- <div class="text mt-3"> Description area </div> -->
                        <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> <span><i class="fa fa-twitter"></i></span> <span><i class="fa fa-facebook-f"></i></span> <span><i class="fa fa-instagram"></i></span> <span><i class="fa fa-linkedin"></i></span> </div>
                        <div class=" px-2 rounded mt-4 date "> <span class="join"><?="Joined since $user->memberSince"?></span> </div>
                    </div>
                </div>
            </div>


            <?php
            include_once ('defaults/footer.php');
            ?>
        </div>
    </body>
</html>
