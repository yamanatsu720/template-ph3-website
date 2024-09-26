<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
</head>
<body>
    <h1>Users List</h1>
    <!-- ユーザーのリストをここに表示 -->
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?= $user['name'] ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
