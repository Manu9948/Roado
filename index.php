<?php
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM stores1");
?>

<html>
<head>
    <title>Homepage</title>
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
        <a href="#">Our service centers</a>
          <a href="add.html">Add a new store data</a>
        <a href="#" style="float:right">Contact Us</a>
  </div>
  <br/><br/>

    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Id</td>
            <td>Name of Outlet</td>
            <td>Name of the provider</td>
            <td>Smart phone</td>
            <td>Phone 1</td>
            <td>phone 2</td>
            <td>Location</td>
            <td>Opening time</td>
            <td>Closing time</td>
            <td>Established year</td>
            <td>Photo 1</td>
            <td>Photo 2</td>
            <td>Update</td>
        </tr>
        <?php
        while($res = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$res['id']."</td>";
            echo "<td>".$res['nameOfOutlet']."</td>";
            echo "<td>".$res['nameOfProvider']."</td>";
            echo "<td>".$res['smartphone']."</td>";
            echo "<td>".$res['phone1']."</td>";
            echo "<td>".$res['phone2']."</td>";
            echo "<td>".$res['location']."</td>";
            echo "<td>".$res['openingTime']."</td>";
            echo "<td>".$res['closingTime']."</td>";
            echo "<td>".$res['establishedYear']."</td>";
            echo "<td>".$res['photo1']."</td>";
            echo "<td>".$res['photo2']."</td>";
            echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        }
        ?>
    </table>
</body>
</html>
