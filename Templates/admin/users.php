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
                    <td>
                      <?php if($user->role === 2){echo "<b><p style='color: red'>Admin</p></b>";} else {echo "Member";}?>
                    </td>
                    <td><?=$user->memberSince?></td>
                    <td>
                        <div class="dropdown2">
                          <button class=" btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-border-width" viewBox="0 0 16 16">
                            <path d="M0 3.5A.5.5 0 0 1 .5 3h15a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-2zm0 5A.5.5 0 0 1 .5 8h15a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1zm0 4a.5.5 0 0 1 .5-.5h15a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                        </button>
                          <div class="dropdown2-content">
                            <?php 
                            if($user->role === 2) {
                              echo "<a href='/admin/users/$user->id/removeAdmin'>Remove Admin</a>";
                            }else{
                              echo "<a href='/admin/users/$user->id/addAdmin'>Add Admin</a>";
                            }
                          ?>
                          </div>
                        </div>
                    </td>
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
