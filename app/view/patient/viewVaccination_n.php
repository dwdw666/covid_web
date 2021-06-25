
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

    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">id</th>
          <th scope = "col">label</th>
          <th scope = "col">doses</th>
        </tr>
      </thead>
      <tbody>
          <?php
              printf ("<h3>Les vaccinations supplémentaires ne sont pas recommandées.</h3>");
          // La liste des vins est dans une variable $results             
          foreach ($vaccinInfo as $element) {
           printf("<tr><td>%d</td><td>%s</td><td>%d</td></tr>", $element['id'], $element['label'], $element['doses']);
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
    
    