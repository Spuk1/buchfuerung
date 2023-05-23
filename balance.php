<?php
require_once 'main.php';
$yearId = 0;
$submit = "";
$id = $_REQUEST["id"];
if (isset($_REQUEST["balanceId"]))
    $yearId = $_REQUEST['balanceId'];
$year = get_table($yearId)[0];

$start_balance_id = get_balance_id($year[2])[0][0];
$end_balance_id = get_balance_id($year[3])[0][0];
$start_activa = get_activa($start_balance_id);
$start_passiva = get_passiva($start_balance_id);
$end_activa = get_activa($end_balance_id);
$end_passiva = get_passiva($end_balance_id);
$items = get_items();

if (isset($_REQUEST["submit"]))
    $submit = $_REQUEST["submit"];
if ($submit == "add-start-balance") {
    add_balance($start_balance_id, $_REQUEST["start_activa_number"], $_REQUEST["start_activa_value"], $_REQUEST["start_passiva_number"], $_REQUEST["start_passiva_value"]);
    header("Location:./balance.php?balanceId=$yearId&id=$id");
} else if ($submit == "delete-start-balance") {
    delete_balance($start_balance_id, $_REQUEST["start_activa_number"], $_REQUEST["start_activa_value"], $_REQUEST["start_passiva_number"], $_REQUEST["start_passiva_value"]);
    header("Location:./balance.php?balanceId=$yearId&id=$id");
} else if ($submit == "delete-end-balance") {
    delete_balance($end_balance_id, $_REQUEST["end_activa_number"], $_REQUEST["end_activa_value"], $_REQUEST["end_passiva_number"], $_REQUEST["end_passiva_value"]);
    header("Location:./balance.php?balanceId=$yearId&id=$id");
} else if ($submit == "add-end-balance") {
    add_balance($end_balance_id, $_REQUEST["end_activa_number"], $_REQUEST["end_activa_value"], $_REQUEST["end_passiva_number"], $_REQUEST["end_passiva_value"]);
    header("Location:./balance.php?balanceId=$yearId&id=$id");
}


?>

<html>

<head>
    <link rel="stylesheet" href="main.css">
    <title>balance</title>
</head>

<body>
    <!-- form fürs erstellen einer neuen Jahresbilanz bzw fürs bearbeiten-->
    <header>
        <h1>Jahr:
            <?php echo $year[1] ?>
        </h1>
        <form action="accounts.php">
            <input type="hidden" value="<?php echo $yearId ?>" name="yearId">
            <input type="hidden" value="<?php echo $_REQUEST["id"] ?>" name="id">
            <input type="submit" value="Kontos" name="submit">
        </form>
        <form action="home.php">
            <input type="hidden" value="<?php echo $_REQUEST["id"] ?>" name="id">
            <input type="submit" value="Home" name="submit">
        </form>
        <form action="index.php">
            <input type="submit" value="Logout" name="submit">
        </form>
    </header>
    
    <div id="main">
        <!-- Start bilanz-->
        <h2>Start Bilanz</h2>
        <div id="start_balance" class="balance">

            <div class="items">
                <h3>Nr.</h3>
                <h3>Activa</h3>
                <?php foreach ($start_activa as $activa): ?>
                    <p>
                        <?php echo $activa[0] ?>
                    </p>
                    <p>
                        <?php echo $activa[1] ?>
                    </p>
                <?php endforeach; ?>
            </div>

            <div class="items">
                <h3>Nr.</h3>
                <h3>Passiva</h3>
                <?php foreach ($start_passiva as $passiva): ?>
                    <p>
                        <?php echo $passiva[0] ?>
                    </p>
                    <p>
                        <?php echo $passiva[1] ?>
                    </p>
                <?php endforeach; ?>
            </div>

        </div>

        <form class="inputs" method="post">
            <input type="hidden" value="<?php echo $yearId ?>" name="balanceId">
            <input type="hidden" value="<?php echo $_REQUEST["id"] ?>" name="id">
            <input type="text" name="start_activa_number"><input type="text" name="start_activa_value"><input
                type="text" name="start_passiva_number"><input type="text" name="start_passiva_value">
            <input style="grid-column: 2;" type="submit" value="add-start-balance" name="submit"><input type="submit"
                value="delete-start-balance" name="submit">
        </form>



        <!-- End bilanz-->
        <h2>Schluss Bilanz</h2>
        <div id="end_balance" class="balance">

            <div class="items">
                <h3>Nr.</h3>
                <h3>Activa</h3>
                <?php foreach ($end_activa as $activa): ?>
                    <p>
                        <?php echo $activa[0] ?>
                    </p>
                    <p>
                        <?php echo $activa[1] ?>
                    </p>
                <?php endforeach; ?>
            </div>

            <div class="items">
                <h3>Nr.</h3>
                <h3>Passiva</h3>
                <?php foreach ($end_passiva as $passiva): ?>
                    <p>
                        <?php echo $passiva[0] ?>
                    </p>
                    <p>
                        <?php echo $passiva[1] ?>
                    </p>
                <?php endforeach; ?>
            </div>

        </div>

        <form class="inputs" method="post">
            <input type="hidden" value="<?php echo $yearId ?>" name="balanceId">
            <input type="hidden" value="<?php echo $_REQUEST["id"] ?>" name="id">
            <input type="text" name="end_activa_number"><input type="text" name="end_activa_value"><input type="text"
                name="end_passiva_number"><input type="text" name="end_passiva_value">
            <input style="grid-column: 2;" type="submit" value="add-end-balance" name="submit"><input type="submit"
                value="delete-end-balance" name="submit">
        </form>
        <h3 class="kontenrahmen">Kontenrahmen</h3>
        <div id="item-list">
            <?php foreach ($items as $item): ?>
                <p>
                    <?php echo $item[0]; ?>
                </p>
                <p>
                    <?php echo $item[1]; ?>
                </p>
            <?php endforeach; ?>
        </div>
</body>

</html>