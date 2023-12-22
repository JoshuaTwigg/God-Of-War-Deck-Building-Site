<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>God Of War</title>
    <meta name="author" content="Joshua Twigg">
    <link rel="stylesheet" href="../css/yourDecks.css">
    <script src="../js/yourDecks.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">  
</head>
<body>
    <nav class="navbar navbar-expand-lg ">
        <a class="navbar-brand" href="../index.html"><img src="../images/icon.png" id="brandIcon"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../index.html">Home<span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../php/form.php">Build Your Deck</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../php/yourDecks.php">Your Decks</a>
            </li>
          </ul>
        </div>
    </nav>

      <div class="line"></div>
        <div id="deckDiv" ><label>Your Decks</label></div>
        <div class="line"></div>

<?php

//connect to database
include 'connect.php';

if(isset($_POST['display'])){

  //// Get deckNames from the database table
  $selectionQuery = "SELECT deckName FROM monsters";
  $result = $conn->query($selectionQuery);
  $check = mysqli_num_rows($result);

  //retrieve table values as assoc array and loop display them in a list
  print "<ul style='padding:0 !important'; list-style: none !important;>";
  
  if($check > 0){
    while($row = mysqli_fetch_assoc($result)){
    //*testing print $row['deckName'];
    print '<div style=""; padding:0 !important;list-style: none !important;><li style="text-align:center;list-style: none !important; font-size:22px;">'."deck:" ." ".$row['deckName'].'<li></div>';
    
  }
}

  print "<ul>";

}


?>

    <form action="../php/yourDecks.php" method="post">
        <button type="submit" id="buttonSaveTwo" name="display" class="btn btn-primary">Display all decks</button>
        <div class="form-group">
        <input type="text" class="form-control" name="delete" id="monsterOne" aria-describedby="emailHelp" placeholder="Deck Name Delete">
        </div>
        <button type="button" id="buttonSaveThree" name="update" onclick="show()" class="btn btn-primary">Update Deck</button>
        <button type="submit" id="buttonSave" name="remove" class="btn btn-primary">Remove Deck</button>
    </form>
    
    <input type="text" class="form-control" name="deckName" id="updateInput" aria-describedby="emailHelp" placeholder="Name of Deck to update" required>
    <select class="form-select" id="dropdown" class="opt" aria-label="Default select example" name="dropdownOne" >
          <option value="Draugr">Draugr</option>
          <option value="Dark Elf">Dark Elf</option>
          <option value="Stone Ancient">Stone Ancient</option>
          <option value="Nightmare">Nightmare</option>
          <option value="Revenant">Revenant</option>
          </select>
          <select class="form-select" id="dropdown2" class="opt" aria-label="Default select example" name="dropdownTwo" >
          <option value="Draugr">Draugr</option>
          <option value="Dark Elf">Dark Elf</option>
          <option value="Stone Ancient">Stone Ancient</option>
          <option value="Nightmare">Nightmare</option>
          <option value="Revenant">Revenant</option>
          </select>
          <select class="form-select" id="dropdown3" class="opt" aria-label="Default select example" name="dropdownThree" >
          <option value="Draugr">Draugr</option>
          <option value="Dark Elf">Dark Elf</option>
          <option value="Stone Ancient">Stone Ancient</option>
          <option value="Nightmare">Nightmare</option>
          <option value="Revenant">Revenant</option>
          </select>
          <button type="submit" id="buttonSaveFinal" name="updateButtonTwo" onclick="hide()" class="btn btn-primary">Update Db Deck</button> 

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>

<?php

if(isset($_POST['updateButtonTwo'])){
  //Demo purposes only

  //*testing print "clicked update";
  //Demo purposes only
  // $monsterOne = $_POST['dropdownOne'];
  // $monsterTwo = $_POST['dropdownTwo'];
  // $monsterThree = $_POST['dropdownThree'];
  // $deck = $_POST['deckName'];

  //UPDATE SQL CODE LINES

}

if(isset($_POST['remove'])){
  //*testing print "REMOVE";

  $input = $_POST['delete'];
  // print "INPUT VALUE".$input;

  //sql query to delete deck of users choice from database table
  $sql = "DELETE FROM monsters WHERE deckName= ?";
  $delete = $conn->prepare($sql);
  $delete->bind_param('s',$input);
  
  // send query to server
  $result = $delete->execute();

  // if($result){
  //   print "record deleted successfully";
  // }else{
  //   print "delete failed";
  // }

  $stmt->close();

}

?>
