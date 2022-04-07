<?php
// TODO Zorg dat de methodes goed ingevuld worden met de juiste queries.
function getProducts(int $categoryId)
{
    global $pdo;
    $sth = $pdo->prepare(" SELECT * FROM product WHERE category_id = $categoryId ");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_CLASS, "product");
    return $result;
}

function getProduct(int $productId)
{
    global $pdo;
    $sth = $pdo->prepare(" SELECT * FROM product WHERE id = $productId ");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_CLASS, "product");
    return $result[0]; 
}

function getAllProducts() {
    global $pdo;
    $sth = $pdo->prepare(
        "SELECT product.id, product.name, product.picture, product.category_id, category.title AS category FROM product
        LEFT JOIN category
        ON product.category_id=category.id
        ORDER BY category_id");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_CLASS, "product");
    return $result;
}

function deleteProduct(int $id){
    global $pdo;
    $sth = $pdo->prepare('DELETE FROM product WHERE id = ?');
    $sth->bindParam(1, $id);
    $sth->execute();
}

function updateProduct(string $title, string $imgPath, string $productDescription, int $productId){
    global $pdo;
    $sth = $pdo->prepare(
        "UPDATE product SET
        name= :t,
        picture= :ip,
        description = :d
        WHERE id = :pi"
    );
    $sth->execute(
        array(
            "t" => $title,
            "ip" => $imgPath,
            "d" => $productDescription,
            "pi" => $productId
        )
    );
}

function addProduct(string $productName, string $image, string $description, int $category_id){
    global $pdo;
    $sth = $pdo->prepare("INSERT INTO product (name, picture, description, category_id) VALUES (:pN, :img, :desc, :category)");
    $sth->execute(
        array(
            "pN" => $productName,
            "img" => $image,
            "desc" => $description,
            "category" => $category_id
        )
    );
}

function getAllTimes() {
    global $pdo;
    $sth = $pdo->prepare(
        "SELECT days.id, days.name, hours.hour AS hour FROM days
        LEFT JOIN hours
        ON hours.dayId=days.id
        ORDER BY days.id");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_CLASS, "time");
    return $result;
}