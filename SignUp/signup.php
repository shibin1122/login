<?php
$host = 'localhost';  // Change this to your database host
$dbname = 'demo-login';  // Change this to your database name
$username = 'root';  // Change this to your database username
$password = '';  // Change this to your database password

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } else {
//     echo "Connected successfully using mysqli.";
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customername = $_POST['name'];
    $Username = $_POST['username'];
    $Password = $_POST['password'];


    // echo $customername;
    // echo $Username;
    // echo $Password;


  // Prepare and execute the SQL INSERT query using mysqli
  $sql = "INSERT INTO signup (NAME, USERNAME, PASSWORD) VALUES (?, ?, ?)";  //ENTER TABLE NAME HERE
  $stmt = $conn->prepare($sql);

  if ($stmt) {
      $stmt->bind_param("sss", $customername, $Username, $Password);
      if ($stmt->execute()) {
          echo "<script>
            alert('Registration Succesfully complted');
            window.location.reload('./index.html');
          </script>";
      } else {
          echo "Error: " . $stmt->error;
      }
      $stmt->close();
  } else {
      echo "Error: " . $conn->error;
  }
}
?>
