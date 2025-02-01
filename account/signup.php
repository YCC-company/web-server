<?php
include('db.php');

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = 'user'; // デフォルトはユーザー
    
    // メール認証機能などを追加

    $query = "INSERT INTO users (USERNAME, PASSWORD, ROLE) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username, $password, $role]);

    // メールで認証リンクを送信（PHPのmail()関数などを使って送信）
}
?>
<form method="POST">
    <input type="text" name="username" required placeholder="Username">
    <input type="password" name="password" required placeholder="Password">
    <button type="submit" name="register">Register</button>
</form>
