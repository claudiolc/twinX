
<?php /* @var $idRel int */ ?>
<?php include('_view.php') ?>

<?= $relExpFase->actionUpdate($idRel, $model) ?>

<?php $this->title = 'Expediente #' . $model->id; ?>
