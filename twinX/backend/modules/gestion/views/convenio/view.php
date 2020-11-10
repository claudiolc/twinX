<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Convenio */
/* @var $ae \common\models\AcuerdoEstudios[] */

if($model->anno_fin > date('Y'))
    $estado = $this->render('indicador', [
            'icono' => 'fas fa-sm fa-check-circle',
            'color' => 'bg-success',
            'texto' => 'Convenio activo'
    ]);
elseif ($model->anno_fin < date('Y'))
    $estado = $this->render('indicador', [
        'icono' => 'fas fa-sm fa-times-circle',
        'color' => 'bg-danger',
        'texto' => 'Convenio inactivo'
    ]);
else
    $estado = $this->render('indicador', [
        'icono' => 'fas fa-sm fa-exclamation-triangle',
        'color' => 'bg-warning',
        'texto' => 'Próxima caducidad'
    ]);

$this->title = $model->codConvenioNoIcon;
$this->params['breadcrumbs'][] = ['label' => 'Convenios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="convenio-view">

    <h1 class="d-flex flex-row align-items-center"><?= $model->codConvenio . ' ' . $estado?></h1>

    <p class="d-flex justify-content-end">
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger ml-2',
            'data' => [
                'confirm' => '¿ESTÁ SEGURO/A DE QUERER ELIMINAR EL CONVENIO?',
                'method' => 'post',
            ],
        ]) ?>
<!--        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="identificacion becas plazos admon nomOnline notas">Toggle both elements</button>-->

    </p>
        <div class="card">
            <div class="card-header" id="headingIdentificacion">
                <h5 class="mb-0">
                    <button type="button" class="btn dropdown-toggle" data-toggle="collapse" data-target="#identificacion" aria-expanded="true" aria-controls="identificacion">
                        Identificación
                    </button>
                </h5>
            </div>

            <div class="collapse multi-collapse show" id="identificacion" aria-labelledby="headingIdentificacion" data-parent="#accordion">
                <div class="card-body">
                    <?= \kartik\detail\DetailView::widget([
                            'model' => $model,
                            'mode' => 'view',

                            'attributes' => [
                                    [
                                            'attribute' => 'codConvenio',
                                            'format' => 'raw',
                                            'label' => 'Convenio'
                                    ],
                                    [
                                        'columns' => [
                                            [
                                                'attribute' => 'cod_area',
                                                'value' => $model->codArea->areaCompleta,
                                                'valueColOptions'=>['style'=>'width:25%'],
                                                'labelColOptions'=>['style'=>'width:10%']
                                            ],
                                            [
                                                'attribute' => 'cod_uni',
                                                'value' => $model->codUni->nombreCodigo,
                                                'valueColOptions'=>['style'=>'width:25%'],
                                                'labelColOptions'=>['style'=>'width:10%']
                                            ],
                                            [
                                                'attribute' => 'cod_pais',
                                                'value' => $model->codPais->nombreISO,
                                                'valueColOptions'=>['style'=>'width:25%'],
                                                'labelColOptions'=>['style'=>'width:10%']
                                            ],
                                        ],
                                    ],
                                    [
                                            'columns' => [
                                                    [
                                                            'attribute' => 'id_curso_creacion',
                                                            'value' => $model->cursoCreacion->curso,
                                                    ],
                                                    [
                                                            'attribute' => 'tipo_movilidad',
                                                            'value' => $model->tipo_movilidad,
                                                    ],
                                                    [
                                                            'attribute' => 'movilidad_pdi',
                                                            'format' => 'raw',
                                                            'value' => $model->movilidad_pdi ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>',
                                                    ],
                                                    [
                                                        'attribute' => 'movilidad_pas',
                                                        'format' => 'raw',
                                                        'value' => $model->movilidad_pas ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>',
                                                    ],
                                            ]
                                    ],
                                    [
                                            'attribute' => 'creado_por',
                                            'value' => $model->creadoPor->nombreUsername,
                                    ],

                            ]
                    ]) ?>
                </div>
            </div>
        </div>



        <div class="card">
            <div class="card-header" id="headingBecas">
                <h5 class="mb-0">
                    <button type="button" class="btn dropdown-toggle" data-toggle="collapse" data-target="#becas" aria-expanded="false" aria-controls="becas">
                        Becas
                    </button>
                </h5>
            </div>

            <div class="collapse multi-collapse" id="becas" aria-labelledby="headingBecas">
                <div class="card-body">
                    <?= \kartik\detail\DetailView::widget([
                        'model' => $model,
                        'mode' => 'view',

                        'attributes' => [
                                [
                                    'columns' => [
                                        'num_becas_in',
                                        'num_becas_out',
                                    ],
                                ],
                                [
                                    'columns' => [
                                        'meses_in',
                                        'meses_out',
                                    ],
                                ]
                            ]
                    ]) ?>

                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header" id="headingPlazos">
                <h5 class="mb-0">
                    <button type="button" class="btn dropdown-toggle" data-toggle="collapse" data-target="#plazos" aria-expanded="false" aria-controls="plazos">
                        Plazos
                    </button>
                </h5>
            </div>

            <div class="collapse multi-collapse" id="plazos" aria-labelledby="headingPlazos">
                <div class="card-body">

                    <?= \kartik\detail\DetailView::widget([
                        'model' => $model,
                        'mode' => 'view',


                        'attributes' => [
                            [
                                'group'=>true,
                                'label'=>'Vigencia del convenio',
                                'rowOptions'=>['style' => 'background-color: #883997; color: white;']
                            ],
                            [
                                'columns' => [
                                    'anno_inicio',
                                    'anno_fin',
                                ],
                            ],
                            [
                                'group'=>true,
                                'label'=>'Nominaciones',
                                'rowOptions'=>['style' => 'background-color: #883997; color: white;']
                            ],

                            [
                                'group'=>true,
                                'label'=>'Primer semestre',
                                'rowOptions'=>['style' => 'background-color: #ba68c8;']
                            ],

                            [
                                'columns' => [
                                    [
                                        'attribute' => 'begin_nom_1s',
                                        'label' => 'Comienzo'

                                    ],
                                    [
                                        'attribute' =>  'end_nom_1s',
                                        'label' => 'Fin'

                                    ],

                                ],
                            ],

                            [
                                'group'=>true,
                                'label'=>'Segundo semestre',
                                'rowOptions'=>['style' => 'background-color: #ba68c8;']
                            ],

                            [
                                'columns' => [
                                    [
                                        'attribute' => 'begin_nom_2s',
                                        'label' => 'Comienzo'

                                    ],
                                    [
                                        'attribute' => 'end_nom_2s',
                                        'label' => 'Fin'
                                    ],

                                ],
                            ],
                            [
                                'group'=>true,
                                'label'=>'Aplicaciones',
                                'rowOptions'=>['style' => 'background-color: #883997; color: white;']
                            ],

                            [
                                'group'=>true,
                                'label'=>'Primer semestre',
                                'rowOptions'=>['style' => 'background-color: #ba68c8;']
                            ],

                            [
                                'columns' => [
                                    [
                                        'attribute' => 'begin_app_1s',
                                        'label' => 'Comienzo'

                                    ],
                                    [
                                        'attribute' =>  'end_app_1s',
                                        'label' => 'Fin'

                                    ],

                                ],
                            ],

                            [
                                'group'=>true,
                                'label'=>'Segundo semestre',
                                'rowOptions'=>['style' => 'background-color: #ba68c8;']
                            ],

                            [
                                'columns' => [
                                    [
                                        'attribute' => 'begin_app_2s',
                                        'label' => 'Comienzo'

                                    ],
                                    [
                                        'attribute' => 'end_app_2s',
                                        'label' => 'Fin'
                                    ],

                                ],
                            ],

                            [
                                'group'=>true,
                                'label'=>'Movilidad',
                                'rowOptions'=>['style' => 'background-color: #883997; color: white;']
                            ],

                            [
                                'group'=>true,
                                'label'=>'Primer semestre',
                                'rowOptions'=>['style' => 'background-color: #ba68c8;']
                            ],

                            [
                                'columns' => [
                                    [
                                        'attribute' => 'begin_mov_1s',
                                        'label' => 'Comienzo'

                                    ],
                                    [
                                        'attribute' =>  'end_mov_1s',
                                        'label' => 'Fin'

                                    ],

                                ],
                            ],

                            [
                                'group'=>true,
                                'label'=>'Segundo semestre',
                                'rowOptions'=>['style' => 'background-color: #ba68c8;']
                            ],

                            [
                                'columns' => [
                                    [
                                        'attribute' => 'begin_mov_2s',
                                        'label' => 'Comienzo'

                                    ],
                                    [
                                        'attribute' => 'end_mov_2s',
                                        'label' => 'Fin'
                                    ],

                                ],
                            ],
                        ]
                    ]) ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingAdmon">
                <h5 class="mb-0">
                    <button type="button" class="btn dropdown-toggle" data-toggle="collapse" data-target="#admon" aria-expanded="true" aria-controls="admon">
                        Personal de administración
                    </button>
                </h5>
            </div>

            <div class="collapse multi-collapse" id="admon" aria-labelledby="headingAdmon" >
                <div class="card-body">

                    <?= \kartik\detail\DetailView::widget([
                        'model' => $model,
                        'mode' => 'view',


                        'attributes' => [
                            [
                                'group'=>true,
                                'label'=>'Coordinador',
                                'rowOptions'=>['style' => 'background-color: #883997; color: white;']
                            ],
                            [
                                    'attribute' => 'nombre_coord',
                                    'label' => 'Nombre'
                            ],
                            [
                                'attribute' => 'cargo_coord',
                                'label' => 'Cargo'
                            ],
                            [
                                'attribute' => 'email_coord',
                                'label' => 'Correo electrónico'
                            ],
                            [
                                'attribute' => 'tlf_coord',
                                'label' => 'Teléfono'
                            ],
                            [
                                'attribute' => 'address_coord',
                                'label' => 'Dirección'
                            ],
                            [
                                'attribute' => 'web_inf_acad',
                                'label' => 'Web de información académica'
                            ],

                            [
                                    'columns' => [
                                        [
                                            'group'=>true,
                                            'label'=>'Incoming',
                                            'groupOptions'=>['style' => 'background-color: #883997; color: white;']
                                        ],
                                        [
                                            'group'=>true,
                                            'label'=>'Outgoing',
                                            'groupOptions'=>['style' => 'background-color: #883997; color: white;']
                                        ],

                                    ],
                            ],

                            [
                                    'columns' => [
                                        [
                                            'group'=>true,
                                            'label'=>'Responsable en administración incoming',
                                            'groupOptions'=>['style' => 'background-color: #ba68c8;']
                                        ],
                                        [
                                            'group'=>true,
                                            'label'=>'Responsable en administración outgoing',
                                            'groupOptions'=>['style' => 'background-color: #ba68c8;']
                                        ],

                                    ],
                            ],
                            [
                                    'columns' => [
                                        [
                                            'attribute' => 'nombre_admon_in',
                                            'label' => 'Nombre'
                                        ],
                                        [
                                            'attribute' => 'nombre_admon_out',
                                            'label' => 'Nombre'
                                        ],
                                    ]
                            ],

                            [
                                    'columns' => [
                                        [
                                            'attribute' => 'cargo_admon_in',
                                            'label' => 'Cargo'
                                        ],
                                        [
                                            'attribute' => 'cargo_admon_out',
                                            'label' => 'Cargo'
                                        ],

                                    ]
                            ],

                            [
                                    'columns' => [
                                        [
                                            'attribute' => 'mail_admon_in',
                                            'label' => 'Correo electrónico'
                                        ],
                                        [
                                            'attribute' => 'mail_admon_out',
                                            'label' => 'Correo electrónico'
                                        ],

                                    ]
                            ],

                            [
                                    'columns' => [
                                        [
                                            'group'=>true,
                                            'label'=>'Responsable académico incoming',
                                            'groupOptions'=>['style' => 'background-color: #ba68c8;']
                                        ],
                                        [
                                            'group'=>true,
                                            'label'=>'Responsable académico outgoing',
                                            'groupOptions'=>['style' => 'background-color: #ba68c8;']
                                        ],

                                    ]
                            ],
                            [
                                    'columns' => [
                                        [
                                            'attribute' => 'nombre_resp_acad_in',
                                            'label' => 'Nombre'
                                        ],
                                        [
                                            'attribute' => 'nombre_resp_acad_out',
                                            'label' => 'Nombre'
                                        ],

                                    ]
                            ],
                            [
                                    'columns' => [
                                        [
                                            'attribute' => 'cargo_resp_acad_in',
                                            'label' => 'Cargo'
                                        ],
                                        [
                                            'attribute' => 'cargo_resp_acad_out',
                                            'label' => 'Cargo'
                                        ],

                                    ]
                            ],
                            [
                                    'columns' => [
                                            ['attribute' => '', 'value' => '', 'label' =>' '], // Para saltar esta parte
                                            [
                                                'attribute' => 'mail_resp_acad_out',
                                                'label' => 'Correo electrónico'
                                            ],
                                    ]
                            ],
                        ]
                    ]) ?>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header" id="headingAEs">
                <h5 class="mb-0">
                    <button type="button" class="btn dropdown-toggle" data-toggle="collapse" data-target="#AEs" aria-expanded="false" aria-controls="notas">
                        Acuerdos de estudios
                    </button>
                </h5>
            </div>

            <div class="collapse multi-collapse" id="AEs" aria-labelledby="headingAEs">
                <div class="card-body">
                    <?= \yii\grid\GridView::widget([
                            'dataProvider' => $ae,
                            'columns' => [
                                'id',
                                [
                                    'attribute' => 'convenio',
                                    'format' => 'raw'
                                ],
                                [
                                    'attribute' => 'nombreEstudiante',
                                    'format' => 'raw'
                                ],
                                [
                                    'attribute' =>'tipoMovilidad',
                                    'label' => 'Tipo de movilidad'
                                ],
                                [
                                    'attribute' =>'tutor',
                                    'value' => 'tutor.nombre'
                                ],
                                'periodo',
                                [
                                    'attribute' =>'curso',
                                    'value' => 'curso.curso'
                                ],

                                [
                                    'attribute' => 'nominacion',
                                    'format' => 'raw'
                                ],
                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'template' => '{view}',
                                    'header' => 'Acciones',
                                    'buttons' =>[
                                        'view' => function($url, $model, $key){
                                            return Html::a('<i class="fas fa-eye"></i>', ['acuerdo-estudios/view', 'id' => $model->id], ['class' => 'btn btn-outline-primary']);
                                        },
                                    ]
                                ],
                            ]
                    ])

                    ?>
                </div>
            </div>
        </div>



        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between align-middle" id="headingNomOnline">
                <h5 class="mb-0">
                    <button id="nominaciones-button" type="button" class="btn dropdown-toggle" data-toggle="collapse" data-target="#nomOnline" aria-expanded="false" aria-controls="nomOnline">
                        Nominaciones online
                    </button>
                </h5>
            </div>

            <div class="collapse multi-collapse" id="nomOnline" aria-labelledby="headingNomOnline" >
                <div class="card-body">

                    <?= \kartik\detail\DetailView::widget([
                        'model' => $model,
                        'mode' => 'view',

                        'attributes' => [
                            [
                                'columns' => [
                                    [
                                            'attribute' => 'nominacion_online',
                                            'value' => $model->nominacion_online ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>',
                                            'format' => 'raw',
                                    ],
                                    'fecha_online'
                                ],
                            ],
                            [
                                'columns' => [
                                    'link_nom_online',
                                    'user_online',
                                    'password_online'
                                ],
                            ],
                            'info_nom_online'
                        ]
                    ]) ?>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingRequisitos">
                <h5 class="mb-0">
                    <button type="button" class="btn dropdown-toggle" data-toggle="collapse" data-target="#requisitos" aria-expanded="false" aria-controls="requisitos">
                        Requisitos
                    </button>
                </h5>
            </div>

            <div class="collapse multi-collapse" id="requisitos" aria-labelledby="headingRequisitos" >
                <div class="card-body">
                    <?= \kartik\detail\DetailView::widget([
                        'model' => $model,
                        'mode' => 'view',

                        'attributes' => [
                            [
                                    'attribute' => 'reqLingConvs[]',
                                    'value' => function($form, $widget){
                                        $requisitos = [];
                                        foreach ($widget->model->reqLingConvs as $req){
                                            $requisitos[] = \common\models\CompetenciaLing::find()->where(['id' => $req->id_comp])->one()->lenguaNivel;
                                        }

                                        return implode(', ', $requisitos);
                                    },
                                    'label' => 'Requisitos lingüísticos'
                            ],
                            [
                                'columns' => [
                                    'req_titulacion',
                                    'req_curso'
                                ],
                            ],
                            'observ_req_ling',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingNotas">
                <h5 class="mb-0">
                    <button type="button" class="btn dropdown-toggle" data-toggle="collapse" data-target="#notas" aria-expanded="false" aria-controls="notas">
                        Anotaciones
                    </button>
                </h5>
            </div>

            <div class="collapse multi-collapse" id="notas" aria-labelledby="headingNotas">
                <div class="card-body">
                    <?= \kartik\detail\DetailView::widget([
                        'model' => $model,
                        'mode' => 'view',

                        'attributes' => [

                                'link_documentacion',
                                'observ_discapacidad',
                                'memo_grading',
                                'memo_visado',
                                'memo_seguro',
                                'memo_alojamiento'
                        ]

                    ]) ?>
                </div>
            </div>


        </div>
    </div>



