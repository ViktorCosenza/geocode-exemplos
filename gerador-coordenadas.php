<script language ="javascript"> src = "gerador_coordenadas.js" </script>

<?php
$servername = "SERVERNAME";
$username = "username";
$password = "password";
$dbname = "rfleck10";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $count = "SELECT COUNT(*) FROM table_name;
    for($id = 0; $i < $count; $i++){
        $sql = "SELECT adress FROM table_name WHERE Id = " . $id . "LIMIT 1;";
        $res = $conn->query($sql);
        $adress = $res->fetch_assoc()["adress"];
        // CHAMA API DO MAPS

        // UPDATE adress SET coordinates 
        $sql = "UPDATE adress SET coordinates" . $lat . " ". $lng . "WHERE Id = " . $id . ";";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

$conn->close();
?>