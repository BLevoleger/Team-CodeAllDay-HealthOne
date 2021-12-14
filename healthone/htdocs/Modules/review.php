<?php
    function getUserReviews(int $userId){
        global $pdo;
        $query = $pdo->prepare(
            "SELECT review.description, review.stars, review.time, review.user_id,
            users.username,
            product.id AS 'product_id', product.name AS 'product_name', product.picture
            FROM review
            LEFT JOIN users
            ON review.user_id=users.id
            LEFT JOIN product
            ON review.product_id=product.id
            WHERE user_id = '$userId'
            ORDER BY 'date' DESC;
            ");
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_CLASS, "review");
        return $result;
    }

    //maak een function waar die alle recensies gaat ophalen van een bepaald sportapparaat
    function getProductReviews(int $product_id){
        global $pdo;
        $sth = $pdo->prepare(
            "SELECT review.stars, review.description, review.time, users.username
            FROM review
            LEFT JOIN users
            ON review.user_id=users.id 
            WHERE product_id = '$product_id'");
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_CLASS, "review");
        return $result;
    }

    function saveReview(int $userId, string $review, int $stars, int $productId) {
        global $pdo;
        $sth = $pdo->prepare("INSERT INTO review (description, stars, product_id, user_id) VALUES (:d, :s, :pi, :ui)");
        $sth->execute(
            array(
                "d" => $review,
                "s" => $stars,
                "pi" => $productId,
                "ui" => $userId
            )
        );
    }
?>