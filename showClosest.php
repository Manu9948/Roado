<html>
<head>
  <style>
  th, td {
    border-bottom: 1px solid #ddd;
}
tr:hover {background-color: #f5f5f5;}
th {
    background-color: #000000;
    color: white;
}
  </style>
</head>
<body>
  <h2>Nearest service centers</h2>
</body>

<?PHP
include("db.php"); // Include database connection function
$db = new database(); // Initiate a new MySQL connection
$tableName = "stores1";
$origLat = $_POST['postlat'];
$origLon = $_POST['postlong'];
//echo $origLat." ".$origLon;
$dist = 10000; // This is the maximum distance (in miles) away from $origLat, $origLon in which to search
$query = "SELECT nameOfOutlet, SUBSTRING_INDEX(location,',',1) as latitude, SUBSTRING_INDEX(location,',',-1) as longitude, ROUND(2*3956 * 2 *
          ASIN(SQRT( POWER(SIN(($origLat - SUBSTRING_INDEX(location,',',1))*pi()/180/2),2)
          +COS($origLat*pi()/180 )*COS(SUBSTRING_INDEX(location,',',1)*pi()/180)
          *POWER(SIN(($origLon-SUBSTRING_INDEX(location,',',-1))*pi()/180/2),2))),2)
          as distance FROM $tableName WHERE location IS NOT NULL and
          SUBSTRING_INDEX(location,',',-1) between ($origLon-$dist/cos(radians($origLat))*69)
          and ($origLon+$dist/cos(radians($origLat))*69)
          and SUBSTRING_INDEX(location,',',1) between ($origLat-($dist/69))
          and ($origLat+($dist/69))
          having distance < $dist ORDER BY distance limit 5";
$result = mysqli_query($db->databaseLink,$query) or die(mysqli_error($db->databaseLink));
echo "<table>
  <tr>
    <th>Name</th>
    <th>Latitude</th>
    <th>Longitude</th>
    <th>Distance from current Location</th>
  </tr>";
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>".$row['nameOfOutlet']."</td><td>".$row['latitude']."</td><td>".$row['longitude']."</td><td>".$row['distance']." Kms"."</td></tr>";
}
echo "</table>";
mysqli_close($db->databaseLink);
// select nameOfOutlet, SUBSTRING_INDEX(location,',',1) as latitude, SUBSTRING_INDEX(location,',',-1) as longitude from stores1;
?>
</html>
