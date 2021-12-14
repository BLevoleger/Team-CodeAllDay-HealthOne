<?php
require '../Modules/Categories.php';
require '../Modules/Products.php';
require '../Modules/Database.php';
require '../Modules/user.php';
require '../Modules/review.php';

define("DOC_ROOT", realpath(dirname(__DIR__)));
define("TEMPLATE_ROOT", realpath(DOC_ROOT . "/Templates"));

session_start();  
$user = getUserName();
if(isset($_SESSION['username'])) {
    $_SESSION["role"] = $user->role;
}

$request = $_SERVER['REQUEST_URI'];
$params = explode("/", $request);
$title = "HealthOne";
$titleSuffix = "";

switch ($params[1]) {
    case 'categories':
        $titleSuffix = ' | Categories';
        
        
        if (isset($_GET['category_id'])) {
            $categoryId = $_GET['category_id'];
            $products = getProducts($categoryId);
            $name = getCategoryName($categoryId);

            if (isset($_GET['product_id'])) {
                $productId = $_GET['product_id'];
                $product = getProduct($productId);
                $titleSuffix = ' | ' . $product->name;

                if(isset($_POST['addReview'])) {
                    $review = filter_input(INPUT_POST, "review");
                    $stars = filter_input(INPUT_POST, "stars");
                    if(!isset($stars) || $stars == false) {
                        echo "Not all fields were filled in!";
                    } else {
                        saveReview($user->id, $review, $stars, $productId);
                    }
                }

                $getProductReview = getProductReviews($productId);
                include_once '../Templates/product.php';
            } else {
                include_once '../Templates/products.php';
            }
        } else {
            $categories = getCategories();
            include_once "../Templates/categories.php";
        }
        break;
    case 'contact':
        $titleSuffix = ' | Contact';
            include_once "../Templates/contact.php";
        break;
    case 'registreren':
        $titleSuffix = ' | Registreren';
        if(isset($_POST['registreren'])) {
            RegUser($_POST['username'], $_POST['email'], $_POST['password']);
        }
            include_once "../Templates/registreren.php";


        break;
    case 'inloggen':
        $titleSuffix = ' | Inloggen';
        if(isset($_POST['login'])) {
            CheckLogin($_POST['username'], $_POST['password']);
        }
            include_once "../Templates/inloggen.php";
        break;
        case 'logout':
            session_destroy();
            header("Location: /inloggen");
            break;
        case 'admin':
            include_once 'admin.php';
            break;
        case 'profile':
            $titleSuffix = ' | Profile';
            if(!isset($_SESSION['username'])) {
                include_once "../Templates/error404.php";
            }else {
                include_once "../Templates/profile.php";

            }
            break;
        case 'profileEdit':
            if(!isset($_SESSION['username'])) {
                include_once "../Templates/error404.php";
            } else {
                
                $titleSuffix = ' | profileEdit';
                include_once "../Templates/profileEdit.php";
            }
            break;
        default:
            $titleSuffix = ' | Home';
            include_once "../Templates/home.php";
}

function getTitle() {
    global $title, $titleSuffix;
    return $title . $titleSuffix;
}
