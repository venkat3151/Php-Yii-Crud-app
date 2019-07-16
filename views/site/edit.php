<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\elet */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="jumbotron">
        <h1>Edit a Person Info!</h1>
    </div>
    <div class = "body-content">
    	<?php $form = ActiveForm::begin()?>
    	<div class = "row">
    		<div class = "form-group">
    			<div class = "col-lg-6">
    				<?= $form->field($infocreate,'FIRST_NAME');?>
    			</div>
    		</div>
    	</div> 
    	<div class = "row">
    		<div class = "form-group">
    			<div class = "col-lg-6">
    				<?= $form->field($infocreate,'LAST_NAME');?>
    			</div>
    		</div>
    	</div> 
    	<div class = "row">
    		<div class = "form-group">
    			<div class = "col-lg-6">
    				<?= $form->field($infocreate,'EMAIL');?>
    			</div>
    		</div>
    	</div>
    	<div class = "row">
    		<div class = "form-group">
    			<div class = "col-lg-6">
    				<?= $form->field($infocreate,'MARK');?>
    			</div>
    		</div>
    	</div> 
    	<div class = "row">
    		<div class = "form-group">
    			<div class = "col-lg-6">
    				<?php $items = ['active'=>'Active','inactive'=>'Inactive',]; ?>
    				<?= $form->field($infocreate,'STATUS')->dropDownList($items,['prompt' => 'Select']);?>
    			</div>
    		</div>
    	</div> 
    	<div class = "row">
    		<div class = "form-group">
    			<div class = "col-lg-6">
    				<?= $form->field($infocreate,'STUDENT_IMAGE')->fileInput();?>
    			</div>
    		</div>
    	</div> 
    	<div class = "row">
    		<div class = "form-group">
    			<div class = "col-lg-6">
    				<div class = "col-lg-3">
    				   <?= Html::submitButton('Edit Post', ['class' => 'btn btn-primary']);?>
    				</div>
    				<div class = "col-lg-2">
    				   <a href = <?php echo yii::$app ->homeUrl;?> class = "btn btn-primary">Back</a>
    				</div>
    			</div>
    		</div>
    	</div> 
    	<?php ActiveForm::end()?>  
</div>
