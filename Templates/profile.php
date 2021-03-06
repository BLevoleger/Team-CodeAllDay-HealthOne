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
                    <div class=" image d-flex flex-column justify-content-center align-items-center"> <button class="btn btn-secondary rounded"> <img src=" <?= $user->PfPic ?> " class="rounded-circle" height="115" width="125" /></button> <span class="name mt-3"><?=$user->username?></span>
                        <div class="d-flex flex-row justify-content-center align-items-center gap-2"> <span class="idd1">UserId <?=$user->id?></span></div>
                        <div class="d-flex flex-row justify-content-center align-items-center mt-3"><b> User reviews </b></div>
                        <div class="d-flex flex-row justify-content-center align-items-center mt-3"> 
                            <?php 

                            //VOEG AAN DE INNER JOIN DE TABEL PRODUCTEN OM PRODUCT 
                            //IMG, ID, TITLE
                            //OP TE HALEN!


                                $userReviews = getUserReviews($user->id);
                                if(!$userReviews){
                                    echo "<h3>no user reviews yet!</h3>";
                                } else {
                                    echo "
                                    <nav class='reviewList'>
                                    <ul>
                                        <table>
                                            <tr>
                                                <th>Product</th>
                                                <th>Review</th>
                                            </tr>
                                    ";
                                    foreach ($userReviews as &$data) {
                                        echo "
                                        <li>
                                            <tr>
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

                                            </tr>
                                        </li>
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
                        <div class=" d-flex mt-2"> <a href="/profileEdit" class="btn1 btn-dark" style="text-decoration:none">Edit Profile</a> </div>
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
