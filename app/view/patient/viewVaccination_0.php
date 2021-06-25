
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
        <input type="hidden" name='action' value='patientResult_0'>
        <input type="hidden" name='patient_id' value='<?php echo ($id); ?>'>
        <h3>Choisir un centre de vaccination parmi la liste des centres.</h3>
        <h3>Vous n'avez jamais été vacciné</h3>
        <select class="form-control" id='id' name='id' style="width: 600px">
            <?php
            foreach ($allcentres as $element) {
                $text = sprintf("Id:%d , Label:%s, Nombre de doses:%s", $element['id'], $element['label'], $element['doses']);
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