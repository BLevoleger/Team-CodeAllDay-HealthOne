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
                <br />
                     <div class="container" style="width:500px;">
                          <?php
                          if (isset($message)) {
                               echo '<label class="text-danger">' . $message . '</label>';
                          }
                          ?>
                          <h3 style="align-items:center">LOGIN</h3><br />
                          <form method="post">
                               <label>Username</label>
                               <input type="text" name="username" class="form-control" />
                               <br />
                               <label>Password</label>
                               <input type="password" name="password" class="form-control" />
                               <br />
                               <input type="submit" name="login" class="btn btn-info" value="Login" />
                               <br />
                               <br />
                               <p>Nog geen account? <a href="pdo_register.php" class="btn btn-info">Registreer</a></p>
                          </form>
                     </div>
                     <br />
                
                
                <?php
            include_once ('defaults/footer.php');
            ?>
        </div>
    </body>
</html>
