<?php
// Connect to the database
$host = "localhost";
$username = "root";
$password = "12345678";
$dbname = "admin";
$conn = new mysqli($host, $username, $password, $dbname);

// Get the search query from the form
$query = $_GET["query"];

// Prepare a SQL statement to search for matching records
$sql = "SELECT * FROM travel WHERE Country LIKE '%".$query."%' OR City LIKE '%".$query."%'";

// Execute the SQL statement and get the results
$result = $conn->query($sql);

// Display the search results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Display the title and content of each matching record
        echo "<h2>".$row["Country"]."</h2>";
        echo "<p>".$row["City"]."</p>";
        echo "<p>".$row["Content"]."</p>";
        $image_path = 'tmp/'.$row["image_file"];
        echo '<img src="' . $image_path . '" alt="Image Description">';
       

        
    }
} else {
    // Display a message if no matching records were found
    echo "No results found.";
}

// Close the database connection
$conn->close();
?>
