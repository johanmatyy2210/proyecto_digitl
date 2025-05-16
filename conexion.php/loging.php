<?php
// Database connection parameters
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "test";

// Create connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize user input
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Query to check user credentials
    $query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $count = mysqli_num_rows($result);
        
        if ($count == 1) {
            // Start session and store user info
            session_start();
            $_SESSION['username'] = $username;
            
            // Successful login
            echo "Bienvenido " . htmlspecialchars($username);
            // Redirect to home page after 2 seconds
            header("refresh:2;url=../index.html");
        } else {
            // Failed login
            echo "Usuario o contraseña incorrectos";
            // Redirect back to login page after 2 seconds
            header("refresh:2;url=loging.html");
        }
    } else {
        // Query error
        echo "Error en la consulta: " . mysqli_error($conn);
    }
}

// Close the connection
mysqli_close($conn);
?>