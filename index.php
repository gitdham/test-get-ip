<?php
// Create database connection using config file
include_once("config.php");
include_once("get-ip.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>

<html>

<head>
  <title>Homepage</title>
</head>

<body>
  <table border=1>

    <tr>
      <th>no</th>
      <th>id</th>
      <th>ip</th>
    </tr>
    <?php
    $i = 1;
    while ($user_data = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $i++ . "</td>";
      echo "<td>" . $user_data['id'] . "</td>";
      echo "<td>" . $user_data['ip'] . "</td>";
    }
    ?>
  </table>
</body>

</html>
