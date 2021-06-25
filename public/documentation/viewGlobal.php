
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
    <h2>mes points de vue sur mon projet</h2>
      <ul>
          <li>Ce cours m'a donné une impression intuitive du développement de pages.</li>
          <li>Après avoir appris le html et le css en classe, je suis allé apprendre quelques js et react.js par moi-même, et avec ces connaissances j'ai obtenu un stage en direction frontale.</li>
          <li>Ce cours combiné à l'utilisation de bases de données m'a permis de me rappeler certaines connaissances en matière de bases de données (j'ai suivi le cours LO14).</li>
          <li>Je pense que le cours serait plus complet s'il pouvait inclure des connaissances en javascript.</li>
      </ul>
  </div>
  </div>
     
  
    
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  


