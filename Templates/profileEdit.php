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
                    <div class=" img d-flex flex-column justify-content-center align-items-center"> <button class="btn btn-secondary rounded"><img src="<?= $user->PfPic ?>" class="rounded-circle" height="100" width="100" /></button>
                    <div class="d-flex flex-row justify-content-center align-items-center gap-2"> <span class="idd1">UserId <?=$user->id?></span></div>
                    <div class="d-flex flex-row justify-content-center align-items-center mt-3"><b> EDIT </b></div>
                    <div class="d-flex flex-row justify-content-center align-items-center mt-3">
                        <form method="POST" enctype="multipart/form-data">
                            <input type="file" name="userfile" id="fileToUpload"><br><br>
                            <label>Username: </label><br>
                            <input type="text" name="username" value="<?= $user->username ?>">
                            <input type="submit" name="update" value="UPDATE">
                        </form>
                        <form method="post">
                            <input type="password" placeholder="Current Password" name="password"><br>
                            <input type="password" placeholder="New password" name="newpass"><br>
                            <input type="password" placeholder="Repeat new password" name="newpassRP"><br>
                            <input type="submit" name="UpdatePass" value="Update password">
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
                                                <a href='/profileEdit/$data->id/delete' class='btn btn-danger'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                                <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                                <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                                                </svg></a>
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
                        <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> <span><i class="fa fa-twitter"></i></span> <span><i class="fa fa-facebook-f"></i></span> <span><i class="fa fa-instagram"></i></span> <span><i class="fa fa-linkedin"></i></span> </div>
                        <div class=" px-2 rounded mt-4 date "> <span class="join"><?="Joined since $user->memberSince"?></span> </div>
                    </div>
                </div>
            </div>

            <?php
            include_once ('defaults/footer.php');
            ?>
        </div>
        <script>
            const deleteButtons = document.querySelectorAll('.btn-danger');
            for(const deleteButton of deleteButtons) {
                deleteButton.addEventListener('click', () => {
                    const result = window.confirm("weet je het zeker?");
                    if (result === false) {
                        event.preventDefault();
                    }
                })
            }
        </script>
    </body>
</html>
