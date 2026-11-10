<?php
$host = 'localhost';
$port = '3307';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $username, $password);
$country = isset($_GET['country']) ? trim($_GET['country']) : '';



if(isset($_GET['lookup']) && $_GET['lookup'] === 'cities'):
  
    $stmt = $conn->prepare('SELECT c.name,c.district,c.population FROM cities c JOIN countries cs ON c.country_code=cs.code WHERE cs.name = ? ');
    $stmt->execute([$country]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<table>
  <tr>
    <th>City Name</th>
    <th>District</th>
    <th>Population</th>
  </tr>
<?php foreach ($results as $row): ?>
  <tr>
    <td><?= $row['name'] ?></td>
    <td><?= $row['district'] ?></td>
    <td><?= $row['population'] ?></td>
  </tr>
<?php endforeach; ?>
</table>

<?php else:

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
    <td><?= $row['name'] ?></td>
    <td><?= $row['continent'] ?></td>
    <td><?= $row['independence_year'] ?></td>
    <td><?= $row['head_of_state'] ?></td>
  </tr>
<?php endforeach; ?>
</table>

<?php endif; ?>