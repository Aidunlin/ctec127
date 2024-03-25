<?php
require 'db_connect.inc.php';

// PDO Query

// $id = $_GET['id'];

// $stmt = $pdo->query('SELECT * FROM posts WHERE id = ' . $id);
// $stmt = $pdo->query('SELECT * FROM posts');

// var_dump($stmt);

// Fetching data as an associative array one database row at a time

// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//     // echo "<pre>";
//     // var_dump($row);
//     // echo "</pre>";
//     echo "<h1>" . "ID:" . $row["id"] . " | " . $row["title"] . "</h1>";
//     echo "<p>" . $row["author"] . "</p>";
//     echo "<hr>";
//     echo "<p>" . $row["body"] . "</p>";
//     echo "<p>" . $row["created_at"] . "</p>";
//     echo "<br><br>";
// }

// while ($row = $stmt->fetch()) {
//     echo "<h1>" . $row->title . "</h1>";
//     echo "<p>" . $row->author . "</p>";
//     echo "<hr>";
//     echo "<p>" . $row->body . "</p>";
//     echo "<p>" . $row->created_at . "</p>";
//     echo "<br><br>";
// }

// Using Prepared Statements (prepare and execute)
// UNSAFE WAY TO DO
// $sql = "SELECT * FROM posts WHERE author = '$author'";
// Prepared Statements separate the query instructions from the data

// Now lets fetch some data like we did above but now using Prepared Statements
// Fetch Multiple Posts
// Positional Parameters

// $author = "Aidan Linerud";
// $is_published = 1;
// $sql = "SELECT * FROM posts WHERE author = ? && is_published = ?";
// $stmt = $pdo->prepare($sql);
// $stmt->execute([$author, $is_published]);
// $posts = $stmt->fetchAll();

// // var_dump($posts);

// foreach ($posts as $post) {
//     echo "<h1>" . $post->title . "</h1>";
//     echo "<p>" . $post->author . "<p>";
//     if ($post->author == "Bruce Elgort") {
//         echo "<div><img src='https://secure.gravatar.com/avatar/329e472e9bfec2350f9afcfb5cebc8e0?s=200&d=blank&r=g'></div>";
//     } elseif ($post->author == "Robert Ballenger") {
//         echo "<div><img src='https://i.pinimg.com/280x280_RS/b7/08/a1/b708a120781cb20b4df881eea33c35d0.jpg'></div>";
//     }
//     echo "<hr>";
//     echo "<p>" . $post->body . "</p>";
//     echo "<br><br>";
// }

// Now lets fetch some data like we did above but now using Prepared Statements
// Fetch Multiple Posts
// Named Parameters

$author = "Aidan Linerud";
$is_published = false;


$sql = "SELECT * FROM posts WHERE author = :author && is_published = :is_published";
$stmt = $pdo->prepare($sql);
$stmt->execute(["author" => $author, "is_published" => $is_published]);
$posts = $stmt->fetchAll();

// var_dump($posts);
foreach ($posts as $post) {
    echo "<h1>" . $post->title . "</h1>";
    echo "<p>" . $post->author . "</p>";
    if ($post->author == "Bruce Elgort") {
        echo "<div><img src='https://secure.gravatar.com/avatar/329e472e9bfec2350f9afcfb5cebc8e0?s=200&d=blank&r=g'></div>";
    } elseif ($post->author == "Gayle Elgort") {
        echo "<div><img src='https://i.pinimg.com/280x280_RS/b7/08/a1/b708a120781cb20b4df881eea33c35d0.jpg'></div>";
    }
    echo "<hr>";
    echo "<p>" . $post->body . "</p>";
    echo "<br><br>";
}

// Getting a single post using Fetch
// =================================
// $id = 4;
// $sql = "SELECT * FROM posts WHERE id=:id";
// $stmt = $pdo->prepare($sql);
// $stmt->execute(["id" => $id]);
// $post = $stmt->fetch();

// echo $post->title;

// How to get the row count of a table
// ====================================
// $sql = "SELECT * FROM posts WHERE author = ?";
// $stmt = $pdo->prepare($sql);
// $stmt->execute([$author]);
// $postCount = $stmt->rowCount();

// echo "Post Count is $postCount";
