<?php
global $params;
if(isset($_SESSION['role']) === 2) {
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
                        // header("Location: /admin/products");
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
                // echo date('H:i:s Y-m-d');
                // header("Refresh");
                
                $allUsers = getAllUsers();
                if(isset($_GET['user_id'])){
                    $userId = $_GET['user_id'];
                    if(isset($_GET['addAdmin'])){
                        header("Location: /admin/users");
                        $addAdmin = $_GET['addAdmin'];
                        if($addAdmin){
                            admin(2, $userId);
                        }
                    }else if(isset($_GET['removeAdmin'])){
                        header("Location: /admin/users");
                        $removeAdmin = $_GET['removeAdmin'];
                        if($removeAdmin){
                            admin(0, $userId);
                        }
                    }
                }
                include_once TEMPLATE_ROOT . '/admin/users.php';
                break;
            case 'editProduct':
                $productId = $_GET['product_id'];
                $editProduct = getProduct($productId);

                if(isset($_POST['update'])) {
                    if(empty($_POST['productName'] || $_POST['imgPath'] || $_POST['productDescription'])) {
                        echo "Vul alle velden in!";
                    }else {
                        
                        $message=""; 
                        if (isset($_POST['update'])) 
                        updateProduct($_POST['productName'], $editProduct->picture, $_POST['productDescription'], $productId);
                        { $result=fileupload(); 
                            if($result===false) {
                                updateProduct($_POST['productName'], $editProduct->picture, $_POST['productDescription'], $productId);
                            } else{ //als de IMG leeg is dan alleen de titel bijwerken ..  if (empty())
                                updateProduct($_POST['productName'], $result, $_POST['productDescription'], $productId);
                            } 
                        }
                        // header('Location: /admin/products');
                    }
                }

                include_once TEMPLATE_ROOT . '/admin/editProduct.php';
                break;
                case 'addProduct':
                if(isset($_POST['add'])){
                    if($_POST['categoryId'] == NULL){ //If categoryId not selected
                        echo "Select a Category!";
                    }else{
                        if(empty($_POST['productName'] || $_POST['productDescription'] || $_POST['categoryId'])){
                            echo "Name, productDescription, CategoryId not filled in!";
                        }else{
                            $result=fileupload(); 
                                if($result===false) {
                                    echo "Image niet bewaard!"; 
                                } else{ 
                                    addProduct($_POST['productName'], $result, $_POST['productDescription'], $_POST['categoryId']);
                                } 
                                addProduct($_POST['productName'], "", $_POST['productDescription'], $_POST['categoryId']);
                                header('Location: /admin/products');
                        }
                    }
                }
                $categories = getCategories();

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