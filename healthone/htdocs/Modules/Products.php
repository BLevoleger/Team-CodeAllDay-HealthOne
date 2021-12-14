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
    return $result; 
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