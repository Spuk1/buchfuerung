<?php
require_once 'main.php';
//User home; auswählen von Jahresbilanzen bzw erstellen einer neuen


$id = $_REQUEST['id'];
$data = get_user_data($id);
$user = $data[0];
$tables = get_tables($id);
$submit = "";

if (isset($_REQUEST["submit"])) $submit = $_REQUEST["submit"];

if ($submit == "insert") {
    $dupl = false;
    foreach ($tables as $year) {
        if (substr($year[1], 0, 4) == substr($_REQUEST["date"], 0, 4)) {
            $dupl = true;
        }
    }
    if (!$dupl) {
        create_new_year($_REQUEST["date"], $id);
        print("Erstellt!");
        header("Location:./home.php?id=$id");
        
    } else
        print("Existiert bereits!");

}

?>

<html>

<head>
    <link rel="stylesheet" href="main.css">
    <title>Home</title>
</head>

<body style="width: 600px; margin: auto;">
    <h1 id="header">Willkommen
        <?php echo $user[1] ?>
    </h1>
    <h3>Wähle aus welches Jahr du bearbeiten möchtest</h3>
    <div id="grid">
        <form method="POST" action="balance.php">
            <select name="balanceId">
                <?php foreach ($tables as $balance): ?>
                    <option value="<?php echo $balance[0] ?>"><?php echo $balance[1] ?></option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" value="edit" name="submit" />
        </form>
        <form method="post">
            <input type="date" name="date">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" value="insert" name="submit" />
        </form>
    </div>
</body>

</html>