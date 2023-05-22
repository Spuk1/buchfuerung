<?php
require_once 'main.php';
$yearId = 0;
$submit = "";
if (isset($_REQUEST["yearId"]))
    $yearId = $_REQUEST['yearId'];

$accounts = get_accounts($yearId);

if(isset($_REQUEST["submit"]))
    $submit = $_REQUEST["submit"];
if ($submit == "add") {
    add_account($_REQUEST["account_id"],$_REQUEST["start_activa_number"],$_REQUEST["start_activa_value"],$_REQUEST["start_passiva_number"], $_REQUEST["start_passiva_value"]);
    header("Location:./accounts.php?yearId=$yearId");
}
else if($submit == "delete"){
    delete_account($_REQUEST["account_id"],$_REQUEST["start_activa_number"],$_REQUEST["start_activa_value"],$_REQUEST["start_passiva_number"], $_REQUEST["start_passiva_value"]);
    header("Location:./accounts.php?yearId=$yearId");
}
else if($submit == "Neues Konto"){
    $dupl = false;
    foreach($accounts as $acc){
      if  ($_REQUEST["number"] == get_account_nr($acc[0])[0][1]){
        $dupl = true;
      }
    }
    if(!$dupl){
        create_new_account($_REQUEST["number"], $yearId);
        header("Location:./accounts.php?yearId=$yearId");
    }
    else print("Existiert bereits");
    
}

?>



<html>
    <head>
        <link rel="stylesheet" href="main.css">
        <title>Kontos</title>
    </head>
    <body>
        <!-- form fürs erstellen einer neuen Jahresbilanz bzw fürs bearbeiten-->
        <header>

        <form action="balance.php">
        <input type="hidden" value="<?php echo $yearId?>" name="balanceId">
        <input type="hidden" name="id" value="<?php echo $_REQUEST["id"]?>">
        <input type="submit" value="bilanz" name="submit" >
        </form>
        <form action="home.php">
        <input type="hidden" name="id" value="<?php echo $_REQUEST["id"]?>">
        <input type="submit" value="home" name="submit" >
        </form>
        </header>

        <div style="width: 600px;">
            <form method="post">
                <p>Konto nummer: </p>
                <input type="number" name="number">
                <input type="submit" name="submit" value="Neues Konto">
            </form>
        </div>
        
        <div id="main">
 <!-- Start accounts-->


        <?php foreach($accounts as $account): ?>
            <?php $account_activa = get_account_activa($account[0]);?>
            <?php $account_passiva = get_account_passiva($account[0]);?>
            <h2><?php echo get_account_nr($account[0])[0][1]?></h2>
            <div class="balance">
                
                <div class="items">
                <h3>Nr.</h3><h3>Soll</h3>
                <?php foreach ($account_activa as $activa): ?>
                        <p><?php echo $activa[0]?></p><p><?php echo $activa[1]?></p>
                        <?php endforeach;?>
                </div>
            
                <div class="items">
                <h3>Nr.</h3><h3>Haben</h3>
                <?php foreach ($account_passiva as $passiva): ?>
                        <p><?php echo $passiva[0]?></p><p><?php echo $passiva[1]?></p>
                        <?php endforeach;?>
            </div>
            </div>
            <form class="inputs" method="post">
                <input type="hidden" name="account_id" value="<?php echo $account[0];?>">
                <input type="text"  name="start_activa_number"><input type="text"  name="start_activa_value"><input type="text"  name="start_passiva_number"><input type="text"  name="start_passiva_value">
                <input style="grid-column: 2;" type="submit" value="add" name="submit"><input type="submit" value="delete" name="submit">
            </form>
            <?php endforeach;?>
        
            <img id="image" src="./Kontenplan.png">
    </body>
<html>