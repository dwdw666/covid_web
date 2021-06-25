
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
     echo ("<h3>Le vaccin a été mise à jour</h3>");
 //butom back to the list
    echo ("<form role='form' method='get' action='router2.php'><input type='hidden' name='action' value='innovation_2'> <button class='btn btn-primary' type='submit'>Back to the list</button></form>");
   
    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    