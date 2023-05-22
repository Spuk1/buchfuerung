<?php
require_once 'main.php';
//login und user erstellen


$id = 0;
$message = "";
if (($_REQUEST["submit"] == "login")) {
    $id = get_id($_REQUEST["name"], $_REQUEST["password"]);
    if ($id) {
        header("Location:./home.php?id=$id");
    } else
        $message = 'Wrong password or username!';
} elseif ($_REQUEST["submit"] == "register") {
    if (!check_username($_REQUEST["name"])) {
        $message = create_user($_REQUEST["name"], $_REQUEST["password"]);
        $message = "created";
    } else
        $message = "user allready exists";
}



?>

<html>

<head>
    <link rel="stylesheet" href="main.css">
    <title>login</title>
</head>

<body>
    <h1 id="header">Willkommen zum digitalen
        Buchhaltungsprogramm</h1>
    <div id="grid">
        <form id="table">
            <h2>Login</h2>
            <p style="color:red;">
                <?php echo $message ?>
            </p>
            <p1>Name:</p1>
            <input type="text" name="name">
            <p1>Passwort:</p1>
            <input type="password" name="password">
            <input type="submit" value="login" name="submit">
            <input type="submit" value="register" name="submit">
        </form>
    </div>
</body>

</html>