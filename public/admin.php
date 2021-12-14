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
                if(isset($_GET['product_id'])){
                    
                    if(isset($_GET['delete'])) {
                        $productId = $_GET['product_id'];
                        $delete = $_GET['delete'];
                        if($delete){
                            deleteProduct($productId);
                        }
                    }

                }
                $allProducts = getAllProducts();
                include_once TEMPLATE_ROOT . '/admin/products.php';
                break;
            case 'users':

                $allUsers = getAllUsers();
                include_once TEMPLATE_ROOT . '/admin/users.php';
                break;
            case 'editProduct':
                $productId = $_GET['product_id'];
                $editProduct = getProduct($productId);

                if(isset($_POST['update'])) {
                    if(empty($_POST['productName'] || $_POST['imgPath'] || $_POST['productDescription'])) {
                        echo "Vul alle velden in!";
                    }else {
                        updateProduct($_POST['productName'], $_POST['imgPath'], $_POST['productDescription'], $productId);
                        header('Location: /admin/products');
                    }
                }
                include_once TEMPLATE_ROOT . '/admin/editProduct.php';
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