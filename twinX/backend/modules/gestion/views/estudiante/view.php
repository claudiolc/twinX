    <?php

    use yii\helpers\Html;

    /* @var $this yii\web\View */
    /* @var $model common\models\Estudiante */

    $this->title = $model->usuario->nombre;
    $this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
    \yii\web\YiiAsset::register($this);
    \backend\assets\GestionAsset::register($this);
    ?>
    <div class="estudiante-view">

        <h1><?= $model->nombreEstudiante ?></h1>

        <div class="d-flex flex-row">
            <?= Html::img($model->usuario->foto, ['class' => 'profile-pic shadow-sm'])?>
        </div>
        <p class="d-flex justify-content-end">
            <?= Html::a('Mail', 'mailto:'.$model->usuario->email, ['class' => 'btn btn-success'] ) ?>
            <?php
            $contenido = '';
                if(!empty($model->acuerdoEstudios))
                    $contenido = Html::a('Acuerdos de estudios', ['acuerdo-estudios/index', 'id' => $model->id_usuario], ['class' => 'btn btn-info ml-2']);
                echo $contenido;
            ?>
            <?= Html::a('Editar', ['update', 'id' => $model->id_usuario], ['class' => 'btn btn-primary ml-2']) ?>
            <?= Html::a('Eliminar', ['delete', 'id' => $model->id_usuario], [
                'class' => 'btn btn-danger ml-2',
                'data' => [
                    'confirm' => '¿ESTÁ SERGURO/A DE QUERER ELIMINAR ESTE ESTUDIANTE?',
                    'method' => 'post',
                ],
            ]) ?>

        </p>



        <?= \kartik\detail\DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                        'columns' => [
                            [
                                'group' => true,
                                'label' => 'Datos personales',
                                'groupOptions' => ['class' => 'w-50'],
                            ],
                            [
                                'group' => true,
                                'label' => 'Movilidad',
                                'groupOptions' => ['class' => 'w-50'],

                            ],
                        ],
                        'rowOptions'=>['style' => 'background-color: #883997; color: white;']
                ],
                [
                        'columns' => [
                            [
                                    'attribute' => 'tipo_estudiante',
                                    'labelColOptions' => ['class' => 'w-25'],
                                    'valueColOptions' => ['class' => 'w-25']
                            ],
                            [
                                'attribute' => 'codConvenio',
                                'label' => 'Convenio',
                                'value' => Html::a($model->codConvenio, ['convenio/view', 'id' => $model->convenio->id], ['class' => 'btn btn-outline-primary']),
                                'labelColOptions' => ['class' => 'w-25'],
                                'valueColOptions' => ['class' => 'w-25'],
                                'format' => 'raw'

                            ],

                        ]
                ],
                [
                        'columns' => [
                            [
                                'attribute' => 'usuario',
                                'value' => $model->usuario->username,
                                'label' => 'Username',
                                'labelColOptions' => ['class' => 'w-25'],
                                'valueColOptions' => ['class' => 'w-25']

                            ],
                            [
                                'attribute' => 'competenciasLing',
                                'label' => 'Competencias lingüísticas',
                                'labelColOptions' => ['class' => 'w-25'],
                                'valueColOptions' => ['class' => 'w-25']
                            ]

                        ]
                ],

                [
                    'columns' => [
                            [
                                    'attribute' => 'usuario',
                                    'value' => function($s, $widget){
                                        $genero = $widget->model->usuario->genero;
                                        if($genero == 'M')
                                            return 'Masculino';
                                        elseif ($genero == 'F')
                                            return 'Femenino';
                                        else
                                            return 'Otro';
                                    },
                                    'label' => 'Género',
                                    'labelColOptions' => ['class' => 'w-25'],
                                    'valueColOptions' => ['class' => 'w-25']

                            ],
                            [
                                'attribute' => 'nombreTitulacion',
                                'label' => 'Titulación',
                                'labelColOptions' => ['class' => 'w-25'],
                                'valueColOptions' => ['class' => 'w-25']
                            ],


                    ]
                ],
                [
                    'columns' => [
                        [
                            'attribute' => 'dni',
                            'labelColOptions' => ['class' => 'w-25'],
                            'valueColOptions' => ['class' => 'w-25']
                        ],
                        [
                                'attribute' => 'cesion_datos',
                                'value' => $model->cesion_datos ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>',
                                'format' => 'raw',
                                'labelColOptions' => ['class' => 'w-25'],
                                'valueColOptions' => ['class' => 'w-25']
                        ],


                    ]
                ],
                [
                    'columns' => [

                    [
                        'attribute' => 'usuario',
                        'value' => $model->usuario->telefono,
                        'label' => 'Teléfono',
                        'labelColOptions' => ['class' => 'w-12.5'],
                        'valueColOptions' => ['class' => 'w-12.5']

                    ],
                    [
                        'attribute' => 'telefono2',
                        'labelColOptions' => ['class' => 'w-12.5'],
                        'valueColOptions' => ['class' => 'w-12.5']

                    ],
                    [
                        'attribute' => 'beca_mec',
                        'value' => $model->beca_mec ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>',
                        'labelColOptions' => ['class' => 'w-25'],
                        'valueColOptions' => ['class' => 'w-25'],
                        'format' => 'raw'
                    ],



                    ]
                ],
                [
                    'columns' => [


                        [
                            'attribute' => 'usuario',
                            'value' => $model->usuario->email,
                            'label' => 'Email',
                            'labelColOptions' => ['class' => 'w-12.5'],
                            'valueColOptions' => ['class' => 'w-12.5']

                        ],
                        [
                            'attribute' => 'email_go_ugr',
                            'labelColOptions' => ['class' => 'w-12.5'],
                            'valueColOptions' => ['class' => 'w-12.5']

                        ],
                        [
                            'attribute' => 'nota_expediente',
                            'labelColOptions' => ['class' => 'w-25'],
                            'valueColOptions' => ['class' => 'w-25']
                        ],



                    ]
                ],
                [
                    'columns' => [
                        [
                            'attribute' => 'f_nacimiento',
                            'format' => 'date',
                            'labelColOptions' => ['class' => 'w-25'],
                            'valueColOptions' => ['class' => 'w-25'],
                        ],
                        [
                            'attribute' => 'notaCompetenciaLing',
                            'label' => 'Nota de competencias lingüísticas',
                            'labelColOptions' => ['class' => 'w-25'],
                            'valueColOptions' => ['class' => 'w-25'],
                        ]
                    ]
                ],
                [
                    'columns' => [
                        [
                            'attribute' => 'usuario',
                            'value' => $model->usuario->created_at,
                            'label' => 'Fecha de registro',
                            'format' => 'datetime',
                            'labelColOptions' => ['class' => 'w-25'],
                            'valueColOptions' => ['class' => 'w-25'],
                        ],
                        [
                            'attribute' => 'notaParticipacion',
                            'label' => 'Nota de participación',
                            'labelColOptions' => ['class' => 'w-25'],
                            'valueColOptions' => ['class' => 'w-25'],
                        ]

                    ]
                ],

            ],
        ]) ?>

    </div>
