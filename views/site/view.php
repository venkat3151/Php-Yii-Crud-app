<?php
use yii\helpers\html;
use yii\grid\GridView;

/* @var $this yii\web\elet */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>This is the View Page using Grid View!</h1>

           <?= GridView::widget(['dataProvider' => $info,'columns' => [
						        'PERSON_ID',
						        'FIRST_NAME',
						        'LAST_NAME',
						        'MARK',
						        'STATUS',
						        [
						        	'attribute' => 'STUDENT_IMAGE',
						        	'value' => function ($info) {
        								return $info->getImageUrl($info->STUDENT_IMAGE); 
    								},
						        	'format' => ['image', ['width' => '100', 'height' => '100']]
						        ]
						    ],
			]); ?>
    </div>
    <div id = "iconic">
    	 <?= Html::a('Back To Managing Page', ['/site/index'], ['class' => 'btn btn-primary']) ?>
    </div>
</div>
