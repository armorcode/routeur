<?php
include 'view/base/base.php';
?>

<?php
foreach ($tabFruits as $key => $fruit) { ?>


    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"> <?= $fruit['nom'] ?></h5>
    <p class="card-text"><?= $fruit['description'] ?></p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
   

<?php 
} ?>
