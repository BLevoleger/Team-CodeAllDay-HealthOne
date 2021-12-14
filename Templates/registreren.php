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

            <br>
            <div class="container" style="width:500px;">
                    <?php
                    if (isset($message)) {
                        echo '<label class="text-danger">' . $message . '</label>';
                    }
                    ?>
                    <h3 style="align=center">REGISTREREN</h3><br />
                    <form method="POST">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" />
                        <br />
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" />
                        <br />
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" />
                        <br />
                        <label>Repeat Password</label>
                        <input type="password" name="pwdrepeat" class="form-control" />
                        <br />
                        <input type="submit" name="registreren" class="btn btn-info" value="Registreer" />
                        <br />
                        <br />
                        <p>Al een account? <a href="pdo_login.php" class="btn btn-info">Login</a></p>
                    </form>
                </div>
                        <?php
                        include_once ('defaults/footer.php');
                        ?>
                    </div>
        </body>
        </html>
