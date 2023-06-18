<?php
// Establish database connection (replace with your own credentials)
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// API endpoint to handle comment submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate and sanitize user inputs (add more validation as needed)
    $name = $_POST["name"] ?? "";
    $comment = $_POST["comment"] ?? "";

    $name = htmlspecialchars(trim($name));
    $comment = htmlspecialchars(trim($comment));

    // Insert comment into the database
    $sql = "INSERT INTO comments (name, comment) VALUES ('$name', '$comment')";
    if ($conn->query($sql) === true) {
        // Comment insertion successful
        $response = array("status" => "success");
        echo json_encode($response);
    } else {
        // Comment insertion failed
        $response = array("status" => "error", "message" => "Failed to insert comment");
        echo json_encode($response);
    }
}

// API endpoint to fetch comments
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Fetch comments from the database
    $sql = "SELECT * FROM comments";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Comments found
        $comments = array();
        while ($row = $result->fetch_assoc()) {
            $comment = array(
                "name" => $row["name"],
                "comment" => $row["comment"]
            );
            array_push($comments, $comment);
        }
        echo json_encode($comments);
    } else {
        // No comments found
        $response = array("status" => "empty", "message" => "No comments found");
        echo json_encode($response);
    }
}

// Close database connection
$conn->close();
?>
