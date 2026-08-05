What we want!! !! 
- The attacks displayed here!!! 
^^^ To do this we must go into the code of the kejmin equipped currently and get the attacks from the database.
- When they click on an attack;;; they go to an updated encounter page with the attack possibly announced // 
and the opponent's health lowers.

- (xtra - any effects)
<?php include "../battlenavbar.php" ?>
<!DOCTYPE html>
<html>
<head>
  <style>
    .bottom-right-nava {
      position: fixed;
      bottom: 100px;
      right: 100px;
      display: flex !important;
      flex-direction: row !important;
      flex-wrap: nowrap !important;
      gap: 10px;
      border: 2px solid black;
    }
    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #B9A5E2;
      font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
    }
    .bottom-right-nava button {
      white-space: nowrap !important;
      width: auto !important;
      margin: 0 !important;
    }
    button {
      background-color: #B9A5E2;
      color: white;
      font-family: Impact;
      -webkit-text-stroke: 0.5px black;
      font-size: 16px;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }
    .bottom-right-nava button:hover {
      background-color: #a898ce;
    }
    .hidden {
  display: none !important;
}
  </style>
</head>
<body>

 
  <nav id="movebar" class="bottom-right-nava">
    <ul>
      <li><button class="move" data-id="1"> Move 3: </button></li>
      <li><button class="move" data-id="2"> Move 2: </button></li>
      <li><button class="move" data-id="3"> Move 1: </button></li>
    </ul>
  </nav>
  <script src="attackbar.js"></script>
</body>
</html>