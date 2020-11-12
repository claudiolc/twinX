<?php
/**
 * @var $content string
 * @var $items []
 */

use kartik\nav\NavX;
\backend\assets\PanelAsset::register($this);
?>
<div class="align-items-center mt-5" style="margin-left:5em">
    <div class="flex-column">
        <h1>Menú</h1>

        <div class="list-group">
            <aside class="shadow">
                <?php echo NavX::widget([
                    'options' => [
                        'class' => 'list-group-item list-group-item-actions d-flex flex-column',
                        'id' => 'sidebar'
                    ],
                    'items' => $items,

                    'encodeLabels' => false,


                ]) ?>
            </aside>
        </div>
    </div>
</div>