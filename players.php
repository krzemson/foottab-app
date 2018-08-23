<?php
session_start();

if(isset($_POST['submit'])){
    $number = $_POST['number'];
    
     $_SESSION['number'] = $number;
}else{
    header("Location: index.php");
}

?>



<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilkarzyki</title>
</head>

<body>
   
   <form method="post" action="shuffle.php">
        <?php
        for ($i = 1; $i <= $number; $i++) { ?>
      <label for="nick">Podaj nazwę gracza:
       <input type="text" name="nick<?php echo $i?>">
      </label><br><br>
       
       <?php } ?>
       
       <input type="submit" name="submit">
   </form>
    
</body>
</html>