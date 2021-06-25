
<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
      ?>
      
      <div>
    <h2>Les vaccins le plus populaires</h2>
      <ul>
          <li>Vaccin pour lequel le nombre d'injections est le plus élevé</li>
          <li>Ensuite, choisissez le type de vaccin.</li>
          <li>Une fois que vous avez obtenu le résultat, vous pouvez passer à l'écran pour augmenter le nombre de vaccins.</li>
      </ul>
  </div>
  </div>
     
  
    
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  


