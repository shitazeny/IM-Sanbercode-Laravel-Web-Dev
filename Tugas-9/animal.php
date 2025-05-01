<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP</title>
  </head>

  <body>
    <?php
      class Animal {
        public $name;
        public $legs = 4;
        public $cold_blooded = "no";
        public function __construct($name) 
        {
          $this->name= $name;
        }
      }

      class Ape {
        public $name;
        public $legs = 2;
        public $cold_blooded = "no";
        public function __construct($name) 
        {
          $this->name= $name;
        }
        public function yell() {
          return "Auooo";
        }
      }

      class Frog {
        public $name;
        public $legs = 4;
        public $cold_blooded = "no";
        public function __construct($name) 
        {
          $this->name= $name;
        }
        public function jump() {
          return "hop hop";
        }
      }
    ?>
  </body>
</html>
