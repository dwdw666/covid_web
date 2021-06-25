
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
        <input type="hidden" name='action' value='patientResult_1'>
        <input type="hidden" name='patient_id' value='<?php echo ($id); ?>'>
        <input type="hidden" name='vaccin_id' value='<?php echo ($vaccin_id); ?>'>
        <input type="hidden" name='injection' value='<?php echo ($injection); ?>'>
        <h3>Choisir un centre de vaccination parmi la liste des centres.</h3>
        <h3>Il vous faut encore un vaccin</h3>
        <select class="form-control" id='id' name='id' style="width: 600px">
            <?php
            foreach ($specialCentre as $element) {
                $text = sprintf("Id:%d , Label:%s", $element['id'], $element['label']);
                printf("<option value='%d'>%s</option>",$element['id'],$text);
            }
            ?>
        </select>
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewId -->


    
    