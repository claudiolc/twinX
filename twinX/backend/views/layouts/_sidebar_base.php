<?php
/**
 * @var $content string
 * @var $items []
 */
?>
<div class="align-items-center ml-5">
    <div class="flex-column">
        <h1>Menú</h1>

        <div class="list-group">
            <aside class="shadow">
                <?php echo \yii\bootstrap4\Nav::widget([
                    'options' => [
                        'class' => 'list-group-item list-group-item-actions d-flex flex-column',
                        'id' => 'sidebar'
                    ],
                    'items' => $items,
//                    'submenuTemplate' => "\n<ul class='treeview-menu'>\n{items}\n</ul>\n",
//                    'encodeLabels' => false, //allows you to use html in labels
//                    'activateParents' => false,
                //list-group-item list-group-item-actions d-flex flex-column

                ]) ?>
            </aside>
        </div>
    </div>
</div>