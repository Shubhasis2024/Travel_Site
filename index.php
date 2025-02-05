<?php
$insert = false;
if(isset($_POST['FullName'])){

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$con = new mysqli($servername, $username, $password);

// Check connection
if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
}


$fullname = $_POST['FullName'];
$contactno = $_POST['Contactno'];
$emailid = $_POST['Emailid'];
$boarding = $_POST['Boarding'];
$droping = $_POST['Droping'];
$datetime = $_POST['datetime'];
$description = $_POST['Description'];

$sql = "INSERT INTO `shivadb`.`booking` ( `FullName`, `Contactno`, `Emailid`, `Boarding`, `Droping`, `datetime`, `Description`, `DATE`) VALUES ( '$fullname', '$contactno', '$emailid', '$boarding', '$droping', '$datetime','$description', current_timestamp());";
// echo $sql;


if ($con->query($sql) === TRUE) {
    // echo "New record created successfully";
    $insert = true;
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
$con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To The Shiva Travels</title>
    
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <img class="bg"src="mini-bus-travel.jpg" alt="Busimg">
    <div class="container">
        <h1>Welcome to the Shiva Travel Agency </h1>
        <p class="heading">For Booking Enter your all details</p>
        <?php
        if($insert == true){
            echo "<p class='Submitmsg'>Thanks for Submitting the From we will contact you as soon as possible</p>";
        }
       
        ?>
        <form action="index.php" method="post">
            <input type="text" name="FullName" id="FullName" placeholder="Enter your Full name">
            <input type="text" name="Contactno" id="contactno" placeholder="Enter your Contact no">
            <input type="text" name="Emailid" id="Emailid" placeholder="Enter your Email id">
            <input type="text" name="Boarding" id="Boarding" placeholder="Enter Boarding point">
            <input type="text" name="Droping" id="Droping" placeholder="Enter Droping point">
            <input type="datetime" name="datetime" id="datetime"placeholder="Type your booking date">
            <textarea name="Description" id="" cols="30" rows="10"placeholder="Enter Other Details"></textarea>
            <button class="btn">Sumbit</button>
        </form>
    </div>
    
</body>
</html>