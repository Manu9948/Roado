<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{
    $id = $_POST['id'];
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

        $result = mysqli_query($mysqli, "UPDATE stores1 SET nameOfOutlet='$nameOfOutlet',nameOfProvider='$nameOfProvider',smartphone='$smartphone',phone1='$phone1',
          phone2='$phone2',location='$location',openingTime='$openingTime',closingTime='$closingTime',establishedYear='$establishedYear',photo1='$photo1',photo2='$photo2' WHERE id=$id");
        header("Location: index.php");
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM stores1 WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $nameOfOutlet = $res['nameOfOutlet'];
    $nameOfProvider = $res['nameOfProvider'];
    $smartphone = $res['smartphone'];
    $phone1 = $res['phone1'];
    $phone2 = $res['phone2'];
    $location = $res['location'];
    $openingTime = $res['openingTime'];
    $closingTime = $res['closingTime'];
    $establishedYear = $res['establishedYear'];
    $photo1 = $res['photo1'];
    $photo2 = $res['photo2'];
}
?>
<html>
<head>
    <title>Edit Data</title>
    <style>
    .header {
    padding: 0px;
    font-size: 40px;
    text-align: center;
    background: white;
    }

    .topnav {
    overflow: hidden;
    background-color: #333;
    }

    .topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    }

    .topnav a:hover {
    background-color: #ddd;
    color: black;
    }
    </style>
</head>

<body>
  <div class="header">
    <h2>Roado</h2>
  </div>

  <div class="topnav">
        <a href="lookup.php">Look Up Nearest service centers</a>
        <a href="index.php">Our service centers</a>
          <a href="add.html">Add a new store data</a>
        <a href="#" style="float:right">Contact Us</a>
  </div>
    <br/><br/>

    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr>
                <td>Name of the Outlet</td>
                <td><input type="text" name="nameOfOutlet" value="<?php echo $nameOfOutlet;?>"></td>
            </tr>
            <tr>
                <td>Name of the provider</td>
                <td><input type="text" name="nameOfProvider" value="<?php echo $nameOfProvider;?>"></td>
            </tr>
            <tr>
                <td>Smart Phone</td>
                <td><input type="text" name="smartphone" value="<?php echo $smartphone;?>"></td>
            </tr>
            <tr>
                <td>Phone 1</td>
                <td><input type="text" name="phone1" value="<?php echo $phone1;?>"></td>
            </tr>
            <tr>
                <td>Phone 2</td>
                <td><input type="text" name="phone2" value="<?php echo $phone2;?>"></td>
            </tr>
            <tr>
                <td>Location</td>
                <td><input type="text" name="location" value="<?php echo $location;?>"></td>
            </tr>
            <tr>
                <td>Opening Time</td>
                <td><input type="text" name="openingTime" value="<?php echo $openingTime;?>"></td>
            </tr>
            <tr>
                <td>Closing Time</td>
                <td><input type="text" name="closingTime" value="<?php echo $closingTime;?>"></td>
            </tr>
            <tr>
                <td>Established year</td>
                <td><input type="text" name="establishedYear" value="<?php echo $establishedYear;?>"></td>
            </tr>
            <tr>
                <td>Photo 1</td>
                <td><input type="text" name="photo1" value="<?php echo $photo1;?>"></td>
            </tr>
            <tr>
                <td>Photo 2</td>
                <td><input type="text" name="photo2" value="<?php echo $photo2;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
