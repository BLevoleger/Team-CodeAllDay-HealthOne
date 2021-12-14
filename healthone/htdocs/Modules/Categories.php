<?php
// TODO Zorg dat de methodes goed ingevuld worden met de juiste queries.
function getCategories()
{
    global $pdo;
    $sth = $pdo->prepare("SELECT * FROM category");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_CLASS,"category");
    return $result;
}

function getCategoryName(int $id)
{
    global $pdo;
    $sth = $pdo->prepare("SELECT title FROM category WHERE id = $id ");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_CLASS, "category");
    return $result;
}
