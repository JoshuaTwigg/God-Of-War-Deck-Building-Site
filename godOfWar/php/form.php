<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>God Of War</title>
    <meta name="author" content="Joshua Twigg">
    <link rel="stylesheet" href="../css/form.css">
    <script src="../js/form.js" defer></script>
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

    <div id="list" >
        <h1>Monster Name List</h1>
        <ul>
            <li>Draugr</li>
            <li>Dark elf</li>
            <li>Stone ancient</li>
            <li>Nightmare</li>
            <li>Revenant</li>
        </ul>
    </div>

    <form action="form.php" method="post">
        <div class="form-group">
        <div class="line"></div>
        <label>Select 3 beast names from the list above to add them to your deck</label>
        <div class="line"></div>
        <input type="text" class="form-control" name="deckName" id="monsterOne" aria-describedby="emailHelp" placeholder="Deck Name" required>
        <select class="form-select" id="dropdown" aria-label="Default select example" name="dropdownOne" >
          <option value="Draugr">Draugr</option>
          <option value="Dark Elf">Dark Elf</option>
          <option value="Stone Ancient">Stone Ancient</option>
          <option value="Nightmare">Nightmare</option>
          <option value="Revenant">Revenant</option>
          </select>
          <select class="form-select" id="dropdown2" aria-label="Default select example" name="dropdownTwo" >
          <option value="Draugr">Draugr</option>
          <option value="Dark Elf">Dark Elf</option>
          <option value="Stone Ancient">Stone Ancient</option>
          <option value="Nightmare">Nightmare</option>
          <option value="Revenant">Revenant</option>
          </select>
          <select class="form-select" id="dropdown3" aria-label="Default select example" name="dropdownThree" >
          <option value="Draugr">Draugr</option>
          <option value="Dark Elf">Dark Elf</option>
          <option value="Stone Ancient">Stone Ancient</option>
          <option value="Nightmare">Nightmare</option>
          <option value="Revenant">Revenant</option>
          </select>
        </div>
        <button type="submit" id="buttonSave" name="submitButton" class="btn btn-primary">Save Deck</button>
    </form>

  <div><h2 id="deckHeading" >New Deck:</h2></div>
    <div class="line"></div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>

<?php
if(isset($_POST['submitButton'])){
  // get monster values from form
  $monsterOne = $_POST['dropdownOne'];
  $monsterTwo = $_POST['dropdownTwo'];
  $monsterThree = $_POST['dropdownThree'];
  $deck = $_POST['deckName'];

  //connect to database
  include 'connect.php';

  //sql query. Insert chosen monsters into database table columns
  $stmt = $conn->prepare("INSERT INTO monsters(deckName,monsterOne,monsterTwo,monsterThree) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss",$deck,$monsterOne,$monsterTwo,$monsterThree);

  // send query to server
  $stmt->execute();
  $stmt->close();

  // get latest row entry (last row) to display most recent deck entry images
  $selectionEnemyQuery = "SELECT monsterOne,monsterTwo,monsterThree FROM monsters ORDER BY id DESC LIMIT 1"; // get latest row (last row)
  $resultTwo = $conn->query($selectionEnemyQuery);
  $checkTwo = mysqli_num_rows($resultTwo);

  if($checkTwo > 0){
    while($row = mysqli_fetch_assoc($resultTwo)){
    // *testing print $row['monsterOne']." ";

    $srcMonsterOne = "'../images/{$row["monsterOne"]}.png'";
    $srcMonsterTwo = "'../images/{$row["monsterTwo"]}.png'";
    $srcMonsterThree = "'../images/{$row["monsterThree"]}.png'";
  
    //print header and images with database table src data
    print "<div style='text-align:center; font-size:30px'><h2 style='font-size:40px; text-decoration:underline;' >$deck</h2></div>";
    print "<div style='background-color:yellow; text-align:center; background-image: url(../images/pattern2.jpg); background-repeat:x; background-size: 120px ;padding-bottom:80px;padding-top:80px'><img src = {$srcMonsterOne} style='width:200px;height:200px'><img src = {$srcMonsterTwo} style='width:200px;height:200px'><img src = {$srcMonsterThree} style='width:200px;height:200px'></div>";
  
  }
}


}

?>




