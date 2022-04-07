<?php
function CheckLogin(string $username, string $password) {
    global $pdo;
    try {
        if (isset($_POST["login"])) {
             if (empty($username /*$_POST["username"]*/) || empty($password /*$_POST["password"]*/)) {
                  $message = '<label>All fields are required</label>';
             } else {
                  $query = "SELECT * FROM users WHERE username = :username AND password = :password";
                  $statement = $pdo->prepare($query);
                  $statement->execute(
                       array(
                            'username'     =>     $username, //$_POST["username"],
                            'password'     =>     $password //$_POST["password"]
                       )
                  );
                  $count = $statement->rowCount();
                  if ($count > 0) {
                       $_SESSION["username"] = $username; //$_POST["username"];
                       header("location: /home");
                  } else {
                       $message = '<label>Wrong Data</label>';
                  }
             }
        }
   } catch (PDOException $error) {
        $message = $error->getMessage();
   }
}


function RegUser(string $username, string $email, string $password) {
    global $pdo;
    try {
        if (isset($_POST["registreren"])) {
            if (empty($username) || empty($password) || empty($_POST["pwdrepeat"])) {
                $message = '<label>All fields are required</label>';
            } else if ($password !== $_POST["pwdrepeat"]) {
                $message = '<label>Passwords do not match!</label>';
            } else {
                $query = 'SELECT * FROM users WHERE username = :username OR email = :email'; //CHECKT OF DE EMAIL OF USERNAME AL IN GEBRUIK IS
                $statement = $pdo->prepare($query);
                $statement->execute(
                    array(
                        'username' => $username,
                        'email' => $email
                    )
                );
                $count = $statement->rowCount();
                if ($count > 0) {
                    $message = "Username of Email is al in gebruik";
                } else { //ALS DE USERNAME EN EMAIL NIET AL GEBRUIKT ZIJN GAAT HET DE DATABASE IN
    
                    $query = 'INSERT INTO users (username, password, email) VALUES (:username, :password, :email)';
                    $statement = $pdo->prepare($query);
                    $statement->execute(
                        array(
                            'username' => $username,
                            'password' => $password,
                            'email' => $email
                        )
                    );
                    header("location: /inloggen");  //NADAT JE PROFIEL IS GEMAAKT GA JE NAAR DE LOGIN PAGINA
                }
            }
        }
    } catch (PDOException $error) {
        $message = $error->getMessage();
    }
}


function getUserName(){
    if(isset($_SESSION['username'])) {
        $seshU_N = $_SESSION['username'];
        global $pdo;
        $query = $pdo->prepare("SELECT id, username, PfPic, role, memberSince, email FROM users WHERE username = '$seshU_N'");
        $query->execute();
        $user = $query->fetchAll(PDO::FETCH_CLASS, "user");
        return $user[0];
    }
}

function getUser(){
    if(isset($_SESSION['username'])) {
        $seshU_N = $_SESSION['username'];
        global $pdo;
        $query = $pdo->prepare("SELECT * FROM users WHERE username = '$seshU_N'");
        $query->execute();
        $user = $query->fetchAll(PDO::FETCH_CLASS, "user");
        return $user[0];
    }
}

function getAllUsers() {
    global $pdo;
    $sth = $pdo->prepare("SELECT * FROM users");
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_CLASS, "user");
    return $result;
}

function updateProfile(string $username, string $img, int $id){
    global $pdo;
    $sth = $pdo->prepare("UPDATE users SET username = :u, PfPic = :img WHERE id = $id");
    $sth->execute(
        array(
            "u" => $username,
            "img" => $img
        )
    );
    $_SESSION['username'] = $username;
}

function admin($value, $id){
    global $pdo;
    $sth = $pdo->prepare("UPDATE users SET role = :ia WHERE id = $id");
    $sth->execute(
        array(
            "ia" => $value
        )
    );
}

?>