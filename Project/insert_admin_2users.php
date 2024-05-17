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

echo $hashedPassword . '<br>';

echo $sql . '<br>';

//mots de passe cryptés pour les users fictifs
$passwords = [
    'user1' => password_hash('password1', PASSWORD_DEFAULT),
    'user2' => password_hash('password2', PASSWORD_DEFAULT),
];

foreach ($passwords as $user => $hash) {
    echo "$user: $hash<br>";
}
