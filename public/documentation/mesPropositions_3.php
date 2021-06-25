
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
    <h2>Augmentation du vaccin</h2>
      <ul>
         <li>Sélectionnez d'abord le centre</li>
          <li>Ensuite, choisissez le type de vaccin.</li>
          <li>Lorsque vous augmentez le stock de vaccins, les changements de temps correspondants suivent.</li>
          <li>Cela permet à l'utilisateur de voir la dernière fois que le changement a été effectué.</li>
      </ul>
  </div>
  </div>
     
  
    
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  


