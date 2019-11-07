<?php

require_once('connection.php');

$conn = OpenCon();
$query = "SELECT * FROM userdata";
$result = $conn->query($query);
if (!$result) die  ("Сбой при доступе к базе данных: " . $conn->error());
$rows = $result->num_rows;
while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["login"] . "</td><td>". $row['password']."</td><td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td><td>" . $row["e-mail"] . "</td><td>" . $row["role"] . "</td><td><img src=\"" . $row["url"] . "\" width=\"40\" height=\"40\" /></td><td><button style=\"align: center\" type=\"button\" class=\"btn btn-secondary\" onclick=\"window.location.href = '/editAdmin.php?id= " . $row['id'] . "'\">Edit</button></td><td><button style=\"align: center\" type=\"button\" class=\"btn btn-secondary\" onclick=\"window.location.href = '/php/delete.php?id= " . $row['id'] ."'\">Delete</button></td></tr>";

};
echo "</table>";

CloseCon($conn);

?><?php
