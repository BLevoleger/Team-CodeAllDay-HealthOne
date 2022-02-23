<?php
global $params;
if(isset($_SESSION['role']) == 2) {
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
                if(isset($_GET['user_id'])){
                    $userId = $_GET['user_id'];
                    if(isset($_GET['addAdmin'])){
                        $addAdmin = $_GET['addAdmin'];
                        if($addAdmin){
                            admin(2, $userId);
                        }
                    }else if(isset($_GET['removeAdmin'])){
                        $removeAdmin = $_GET['removeAdmin'];
                        if($removeAdmin){
                            admin(0, $userId);
                        }
                    }
                }
                break;
            case 'editProduct':
                $productId = $_GET['product_id'];
                $editProduct = getProduct($productId);

                if(isset($_POST['update'])) {
                    if(empty($_POST['productName'] || $_POST['imgPath'] || $_POST['productDescription'])) {
                        echo "Vul alle velden in!";
                    }else {
                        
                        if(isset($_POST['update'])){
                            print_r($_FILES);
                        }
                        
                        $message=""; 
                        if (isset($_POST['update'])) 
                        { $result=fileupload(); 
                            if($result===false) {
                                echo "Image niet bewaard!"; 
                            } else{ //als de IMG leeg is dan alleen de titel bijwerken ..  if (empty())
                                updateProduct($_POST['productName'], $result, $_POST['productDescription'], $productId);
                                echo $message; 
                            } 
                        }
                        // header('Location: /admin/products');
                    }
                }
                include_once TEMPLATE_ROOT . '/admin/editProduct.php';
                break;
                case 'addProduct':
                    include_once TEMPLATE_ROOT . '/admin/addProduct.php';
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