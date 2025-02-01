<?php
session_start();
include '../web-bungee/config/config.php';
include '../web-bungee/functions/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // DBからユーザー情報をチェック
    $conn = new mysqli($host, $user, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM users WHERE USERNAME = '$username' AND PASSWORD = '$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("Location: ../web-bungee/admin/dashboardBungeecord.php");
    } else {
        echo "ログイン情報が正しくありません。";
    }
    $conn->close();
}
?>
<html>
<body>
    <form method="POST">
        <input type="text" name="username" placeholder="ユーザー名" required><br>
        <input type="password" name="password" placeholder="パスワード" required><br>
        <button type="submit">ログイン</button>
    </form>
</body>
</html>
