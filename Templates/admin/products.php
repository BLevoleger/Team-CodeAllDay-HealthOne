<!DOCTYPE html>
    <html>
    <?php
    include_once(TEMPLATE_ROOT . "/defaults/head.php");
    ?>
    <body>
        <div class="container-fluid main">
            <?php
            include_once (TEMPLATE_ROOT . "/defaults/menu.php");
            global $name, $products;
            ?>
            <table class="table">
                <thead>
                    <a href="/admin/addProduct" style="text-decoration:none; color: black">
                        <p style="text-align:center">
                        <b>Add 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                        </b>
                        </p>
                    </a>
                </thead>
                <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Image</th>
                      <th scope="col">Title</th>
                      <th scope="col">Category</th>
                      <th scope="col">EDIT</th>
                  </tr>
                </thead>
            <?php foreach($allProducts as &$data): ?>
                <tbody>
                  <tr>
                    <td><?= $data->id ?></td>
                    <td><img src="<?= $data->picture?>" alt="Product Picture" height="80px" width="auto"></td>
                    <th><?=$data->name?></th>
                    <td>
                        <?=$data->category?>
                    </td>
                    <td>
                        <a href="/admin/products/<?= $data->id?>/delete" class='btn btn-danger'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                        <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                        </svg></a>
                        <a href='/admin/editProduct/<?= $data->id?>' class='btn btn-success'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg></a>
                    </td>                          
                  </tr>
                </tbody>
                <?php endforeach; ?>
            </table>

            <?php
            include_once (TEMPLATE_ROOT . '/defaults/footer.php');
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
