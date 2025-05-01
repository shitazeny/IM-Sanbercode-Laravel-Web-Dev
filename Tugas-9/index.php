<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP</title>
  </head>

  <body>
    <?php
      require_once 'animal.php';

      $sheep = new Animal("Shaun");
      echo "Name : " . $sheep->name; // "shaun"
      echo "<br>";
      echo "Legs : " . $sheep->legs; // 4
      echo "<br>";
      echo "Cold Blooded : " . $sheep->cold_blooded; // "no"
      echo "<br>";
      echo "<br>";

      $kodok = new Frog("Buduk");
      echo "Name : " . $kodok->name;
      echo "<br>";
      echo "Legs : " . $kodok->legs;
      echo "<br>";
      echo "Cold Blooded : " . $kodok->cold_blooded;
      echo "<br>";
      echo "Jump : " . $kodok->jump(); // "hop hop"
      echo "<br>";
      echo "<br>";

      $sungokong = new Ape("Kera Sakti");
      echo "Name : " . $sungokong->name;
      echo "<br>";
      echo "Legs : " . $sungokong->legs;
      echo "<br>";
      echo "Cold Blooded : " . $sungokong->cold_blooded;
      echo "<br>";
      echo "Yell : " . $sungokong->yell(); // "Auooo"
    ?>
  </body>
</html>