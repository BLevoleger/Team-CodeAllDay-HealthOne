<?php
// TODO Zorg dat de methodes goed ingevuld worden met de juiste queries.
function getCategories()
{
    global $pdo;
    $query = $pdo->prepare("SELECT * FROM category");
    $query->execute();
    $result = $query->fetchALl(PDO::FETCH_ASSOC);
    return $result;
}

function getCategoryName(int $id)
{
    
}
