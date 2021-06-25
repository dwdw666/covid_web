
<!-- ----- début viewId -->
<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';

      // $results contient un tableau avec la liste des clés.
      ?>

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='vaccinUpdated'>
        <label for="id">id : </label> <select class="form-control" id='id' name='id' style="width: 300px">
            <?php
            foreach ($results as $element) {
                $text = sprintf("%d : %s", $element->getId(), $element->getLabel());
                printf("<option value='%d'>%s</option>",$element->getId(),$text);
            }
            ?>
        </select>
        <label for="doses">doses :</label><p><input type="number" step='any' name='doses' value='0'></p>  
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewId -->