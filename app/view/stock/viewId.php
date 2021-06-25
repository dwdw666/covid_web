
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
        <input type="hidden" name='action' value='centreAttributed'>
        <label>Centre : </label> <select class="form-control" id='centre_id' name='centre_id' style="width: 300px">
            <?php
            foreach ($results_centre as $element) {
                $text = sprintf("%d : %s", $element->getId(), $element->getLabel());
                printf("<option value='%d'>%s</option>",$element->getId(),$text);
            }
            ?>
        </select>
            <?php
            foreach ($results_vaccin as $element) {
                printf("<label>%s :</label><p><input type='number' step='any' name='%d' value='0'></p>",$element->getLabel(),$element->getId());
            }
            ?>
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Add</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewId -->