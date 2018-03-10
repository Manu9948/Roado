<html>
<head>
    <title>Add Data</title>
</head>

<body>
<?php
include_once("config.php");

if(isset($_POST['Submit'])) {
  $nameOfOutlet=$_POST['nameOfOutlet'];
  $nameOfProvider = $_POST['nameOfProvider'];
  $smartphone = $_POST['smartphone'];
  $phone1 = $_POST['phone1'];
  $phone2 = $_POST['phone2'];
  $location = $_POST['location'];
  $openingTime = $_POST['openingTime'];
  $closingTime = $_POST['closingTime'];
  $establishedYear = $_POST['establishedYear'];
  $photo1 = $_POST['photo1'];
  $photo2 = $_POST['photo2'];


        $result = mysqli_query($mysqli, "INSERT INTO stores1 VALUES('','$nameOfOutlet','$nameOfProvider','$smartphone','$phone1','$phone2',
        '$location','$openingTime','$closingTime','$establishedYear','$photo1','$photo2')");
        if($result==TRUE)
        {
        echo "<font color='green'>Data added successfully.";
        header("Location:index.php");
      }
      else {
        echo $mysqli->error;
      }
}
?>
</body>
</html>
