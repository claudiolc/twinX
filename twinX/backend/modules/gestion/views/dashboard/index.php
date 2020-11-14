<?php

/* @var $this yii\web\View */

$this->title = 'Dashboard';

$notificaciones = \common\models\Recordatorio::find()->notificaciones();
$mensajes = \common\models\Mensaje::find()->noLeidos();
$expedientes = \common\models\RelExpFase::find()->expedientesSinProcesar();

\backend\assets\GestionAsset::register($this);
?>

<h1 class="mb-5"><?php echo $this->title ?></h1>

<div class="d-flex flex-wrap align-items-start justify-content-around">
    <div class="card shadow mb-3" style="min-width: 25%">
        <div class="card-header d-flex flex-column align-items-center justify-content-between">
            <h2 class="rounded-circle pr-3 pl-3 pb-1 pt-1" style="background-color: #883997; color: white;"><?php echo  $notificaciones->count() ?></h2>
            <h6><?= $notificaciones->count() == 1 ? 'Notificación pendiente' : 'Notificaciones pendientes' ?></h6>
        </div>
        <div class="card-body">
            <?php
            foreach ($notificaciones->all() as $notificacion) {
                echo '<div class="card p-3 notificacion-dashboard mb-1">';
                $output = '<h5>Recordatorio</h5>';
                $output .= '<h6>' . $notificacion->titulo . '</h6> ';
                $output .= '<p>' . $notificacion->descripcion . '</p>';
                $output .= '<p class="text-muted d-flex flex-row-reverse">' . Yii::$app->formatter->asRelativeTime($notificacion->timestamp) . '</p>';
                echo \yii\helpers\Html::a($output, ['/calendario/recordatorio/view', 'id' => $notificacion->id]);
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <div class="card shadow mb-3" style="min-width: 25%">
        <div class="card-header d-flex flex-column align-items-center justify-content-between">
            <h2 class="rounded-circle pr-3 pl-3 pb-1 pt-1" style="background-color: #883997; color: white;"><?php echo  $mensajes->count() ?></h2>
            <h6><?= ($mensajes->count() == 1 ? 'Mensaje ' : 'Mensajes ') . 'sin leer' ?></h6>
        </div>
        <div class="card-body">
            <?php
            foreach ($mensajes->all() as $mensaje) {
                echo '<div class="card p-3 notificacion-dashboard mb-1">';
                $output = '<h5 class="' . ($mensaje->etiqueta == 'Importante' ? 'etiqueta-importante' : '') .'">' . $mensaje->asunto . '</h5> ';
                $output .= '<p>' . $mensaje->cuerpo . '</p>';
                $output .= '<div class=" d-flex flex-row justify-content-between">' .
                            '<p class="text-muted">' . $mensaje->emisor->nombre . '</p>' .
                            '<p class="text-muted">' . Yii::$app->formatter->asRelativeTime($mensaje->timestamp) . '</p>' . '</div>';
                echo \yii\helpers\Html::a($output, ['/gestion/mensaje/view', 'id' => $mensaje->id]);
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <div class="card shadow mb-3" style="min-width: 25%">
        <div class="card-header d-flex flex-column align-items-center justify-content-between">
            <h2 class="rounded-circle pr-3 pl-3 pb-1 pt-1" style="background-color: #883997; color: white;"><?php echo  $expedientes->count() ?></h2>
            <h6><?= ($expedientes->count() == 1 ? 'Expediente ' : 'Expedientes ') . 'sin procesar' ?></h6>
        </div>
        <div class="card-body">
            <?php
            foreach ($expedientes->all() as $expediente) {
                echo '<div class="card p-3 notificacion-dashboard mb-1">';
                $output = '<h4>' . $expediente->exp->ae->estudiante->nombreEstudiante . '<h4>';
                $output .= '<h5>' . $expediente->exp->tipoExp->descripcion . '</h5> ';
                $output .= '<p>' . $expediente->fase->descripcion . '</p>';
                $output .= '<p class="text-muted d-flex flex-row-reverse">' . Yii::$app->formatter->asRelativeTime($expediente->timestamp) . '</p>';
                echo \yii\helpers\Html::a($output, ['/gestion/expediente/view', 'id' => $expediente->id_exp]);
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>