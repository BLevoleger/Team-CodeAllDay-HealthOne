<?php
global $params;
if(isset($_SESSION['role']) == '2') {
    switch ($params[2]) {
        case 'products':
            $allProducts = getAllProducts();
            include_once '../Templates/admin/products.php';
            break;
    }
    if(isset($params[2])) {
        switch ($params[2]) {
            case 'products':
                if(isset($_GET['product_id']) && isset($_GET['delete'])){
                    $productId = $_GET['product_id'];
                    $delete = $_GET['delete'];
                    if($delete){
                        deleteProduct($productId);
                    }
                }
                if(isset($_GET['product_id']) && isset($_GET['edit'])){
                    $productId = $_GET['product_id'];
                    $edit = $_GET['edit'];
                    if($edit){
                        // include_once (TEMPLATE_ROOT . '/admin/home.php');
                        //ZORG VOOR EEN EDIT PAGE
                    }
                }
                $allProducts = getAllProducts();
                include_once TEMPLATE_ROOT . '/admin/products.php';
                break;
            case 'users':

                $allUsers = getAllUsers();
                include_once TEMPLATE_ROOT . '/admin/users.php';
                break;
            default:
                include_once TEMPLATE_ROOT . '/admin/home.php';
        }
    } else {
        include_once TEMPLATE_ROOT . '/admin/home.php';
    }
} else {
        header("Location: /home");
}

?>