<?php
$host = 'localhost';
$port = '3307';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $username, $password);
$country = isset($_GET['country']) ? trim($_GET['country']) : '';

$stmt = $conn->prepare('SELECT * FROM countries WHERE name LIKE ?');
$stmt->execute(['%' . $country . '%']);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<table>
  <tr>
    <th>Country Name</th>
    <th>Continent</th>
    <th>Independence Year</th>
    <th>Head of State</th>
  </tr>
<?php foreach ($results as $row): ?>
  <tr>
    <td><?= $row['name'] ?> </td>
    <td><?= $row['continent'] ?></td>
    <td><?= $row['independence_year'] ?></td>
    <td><?= $row['head_of_state'] ?></td>
  </tr>
<?php endforeach; ?>
</table>
