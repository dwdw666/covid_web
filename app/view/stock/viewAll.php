
<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
      
      $cols = $results[0]; 
      $datas = $results[1];
      ?>

    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
            <?php
                foreach($cols as $element){
                    printf("<th scope = 'col'>%s</th>", $element);
                }
            ?>
        </tr>
      </thead>
      <tbody>
          <?php
          foreach ($datas as $row){
            echo ("<tr>");
            foreach ($row as $valeur){
                printf (" <td>$valeur</td>");
                }
                echo ("</tr>");
            }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  