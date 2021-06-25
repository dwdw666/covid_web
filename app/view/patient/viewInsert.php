
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?> 

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='patientCreated'>        
        <label for="nom">nom : </label><br><input type="text" name='nom' size='25' value='gao'><br>   
        <label for="prenom">prenom : </label><br><input type="text" name='prenom' size='25' value='shiqi'><br>
        <label for="adresse">adresse : </label><br><input type="text" name='adresse' size='75' value='Troyes'>         
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewInsert -->



