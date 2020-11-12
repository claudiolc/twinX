<?php

/* @var $this View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\web\View;
use common\widgets\Alert;

AppAsset::register($this);
$this->beginContent('@backend/views/layouts/base.php');
?>

<main class="d-flex">
    <?php echo $this->render('_sidebar_calendario.php') ?>

    <div class="container p-3 w-100">
        <?= Alert::widget(); ?>
        <div class="w-100"><?= $content ?></div>
    </div>

</main>

<?php $this->endContent(); ?>

