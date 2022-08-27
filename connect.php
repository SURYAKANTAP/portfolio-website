<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    //Connecting to the Database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "portfolio";

    // Database connection
    $conn = new mysqli($servername, $username, $password, $databasename);
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into requests(name, email, subject, message) values(?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $subject, $message);
        $execval = $stmt->execute();
        echo $execval;
        echo "Thanks For Contacting Us...";
        $stmt->close();
        $conn->close();
    }
?>