<?php
if (isset($_POST["username"]) && isset($_POST["number"])) {
      
    $conn = new mysqli("localhost", "root", "root", "js_ekzamen");
    if($conn->connect_error){
        die("Помилка: " . $conn->connect_error);
    }
    $name = $conn->real_escape_string($_POST["username"]);
    $number = $conn->real_escape_string($_POST["number"]);
    $dt = date('d-m-y h:i:s');
    $sql = "INSERT INTO requests (name, phone, time) VALUES ('$name', '$number', '$dt')";
    if($conn->query($sql)){
        readfile('newpage.html');
    } else{
        echo "Помилка: " . $conn->error;
    }
    $conn->close();
}
?>