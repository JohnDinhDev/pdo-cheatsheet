<?php

$host = 'localhost';
$user = 'root';
$password = 'SendPie44544541!';
$dbname = 'pdoposts';

// Set DSN
$dsn = 'mysql:host=' . $host . ';';
$dsn .= 'dbname=' . $dbname;

// Create a PDO instance
$pdo = new PDO($dsn, $user, $password);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
// Use this to use user inputed LIMITs
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
# PDO QUERY

// $stmt = $pdo->query('SELECT * FROM posts');

// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//     echo $row['title'] . '<br>';
// }

// while ($row = $stmt->fetch()) {
//     echo $row->body . '<br>';
// }

# PREPARED STATEMENTS (prepare & execute)

// UNSAFE!!!!
// $sql = "SELECT * FROM Posts WHERE author='$author'";


// FETCH MULTIPLE POSTS

// User Input
$author = 'John';
$is_published = true;
$id = 1;

// Positional Params
// $sql = 'SELECT * FROM posts WHERE author= ?';
// $stmt = $pdo->prepare($sql);
// $stmt->execute([$author]);
// $posts = $stmt->fetchAll();

// Named Params
// $sql = 'SELECT * FROM posts WHERE id = :id';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['id' => $id]);
// $post = $stmt->fetch();

// echo $post->body;

// GET ROW COUNT
// $stmt = $pdo->prepare('SELECT * FROM posts WHERE author = ?');
// $stmt->execute([$author]);
// $postCount = $stmt->rowCount();

// echo $postCount;

// INSERT DATA
// $title = 'Post Five';
// $body = 'This is post five';
// $author = 'John Dinh';

// $sql = 'INSERT INTO posts (title, body, author) ';
// $sql .= 'VALUES (:title, :body, :author)';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['title' => $title, 'body' => $body, 'author' => $author]);
// echo 'Post Added';

// UPDATE DATA

// $id = 1;
// $body = 'This is the updated post';

// $sql = 'UPDATE posts SET body = :body WHERE id = :id';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['body' => $body, 'id' => $id]);
// echo 'Post Updated';

// DELETE DATA

// $id = 3;

// $sql = 'DELETE FROM posts WHERE id = :id';
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['id' => $id]);
// echo 'Post Deleted';

// SEARCH DATA
$search = "%e%";
$sql = 'SELECT * FROM posts WHERE title LIKE ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$search]);
$posts = $stmt->fetchAll();

foreach($posts as $post) {
    echo $post->title . '<br>';
}

?>