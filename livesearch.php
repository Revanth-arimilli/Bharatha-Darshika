<?php include "db.php"; ?>

<?php
$q = $_GET["q"];

$sql="SELECT * FROM places WHERE description like '%$q%' ";
$result = mysqli_query($conn,$sql);
echo $sql;

echo "<table>
<tr>
<th>Name</th>
<th>Description</th>
<th>Location</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['description'] . "</td>";
  echo "<td>" . $row['location'] . "</td>";
  echo "</tr>";
}
echo "</table>";
