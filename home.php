<?php
require_once 'main.php';
//User home; auswählen von Jahresbilanzen bzw erstellen einer neuen


$id = $_REQUEST['id'];
$data = get_user_data($id);
$user = $data[0];
$tables = get_tables($id);

?>

<html>
    <head>
        <link rel="stylesheet" href="main.css">
        <title>Home</title>
    </head>
    <body>
        <h1 id="header">Willkommen <?php echo $user[1]?></h1>
        <div id="grid">
        <form method="POST" action="balance.php">
                    <select name="balanceId">
                        <?php foreach ($tables as $balance): ?>
                        <option value="<?php echo $balance[0]?>"><?php echo $balance[1]?></option>
                        <?php endforeach;?>
                    </select>
                    <input type="submit" value="edit" name="submit" />
                    <input type="submit" value="insert" name="submit" />
                </form>
        </div>
    </body>
</html>