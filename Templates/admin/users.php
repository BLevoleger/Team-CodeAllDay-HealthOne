<!DOCTYPE html>
    <html>
    <?php
    include_once(TEMPLATE_ROOT . '/defaults/head.php');
    ?>
    <body>
        <div class="container-fluid main">
            <?php
            include_once (TEMPLATE_ROOT . '/defaults/menu.php');
            ?>

            <table class="table">
                <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Username</th>
                      <th scope="col">E-mail</th>
                      <th scope="col">Role</th>
                      <th scope="col">Member Since</th>
                      <th scope="col">Edit</th>
                  </tr>
                </thead>
            <?php foreach($allUsers as &$user): ?>
                <tbody>
                  <tr>
                    <td><?= $user->id ?></td>
                    <th><?=$user->username?></th>
                    <td><?=$user->email?></td>
                    <td><?=$user->role?></td>
                    <td><?=$user->memberSince?></td>
                    <td>-</td>
                  </tr>
                </tbody>
                <?php endforeach; ?>
            </table>


            <?php
            include_once (TEMPLATE_ROOT . '/defaults/footer.php');
            ?>
        </div>
    </body>
</html>
