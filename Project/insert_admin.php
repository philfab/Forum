<?php
$username = 'phil_admin';
$password = 'philadmin';
$email = 'phil_admin@gmail.com';
$roles = 'ROLE_ADMIN';
$status = 'active'; //ou inactive

$hashedPassword = password_hash($password, PASSWORD_DEFAULT); // PASSWORD_DEFAULT=bcrypt

$sql = "
INSERT INTO User (userName, password, registrationDate, email, roles, status)
VALUES ('$username', '$hashedPassword', NOW(), '$email', '$roles', '$status');
";

echo $sql; //à copier et exécuter dans la bdd
