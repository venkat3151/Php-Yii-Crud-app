<?php
use yii\helpers\html;
use yii\helpers\Url;
/* @var $this yii\web\elet */

$this->title = 'My Yii Application';
?>
<div class="site-index">
        <h1>This is the Managing Page without Grid View!</h1>
        <div id = "create" style="float:right;">
            <?= Html::a('Create a Record', ['/site/create'], ['class' => 'btn btn-primary']) ?>
        </div>
        <div id = "create" style="float:left;">
             <?= Html::a('Go to View(Only Active records)', ['/site/view'], ['class' => 'btn btn-primary']) ?>
        </div>

            <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">E-mail Address</th>
                      <th scope="col">Mark</th>
                      <th scope="col">Status</th>
                      <th scope="col">Image</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(count($info) > 0): ?>
                        <?php foreach($info as $x): ?>
                    <tr class="table-active">
                      <th scope="row"><?php echo $x->PERSON_ID;?></th>
                      <td><?php echo $x->FIRST_NAME;?></td>
                      <td><?php echo $x->LAST_NAME;?></td>
                      <td><?php echo $x->EMAIL;?></td>
                      <td><?php echo $x->MARK;?></td>
                      <td><?php echo $x->STATUS;?></td>
                      <td><?php $image=Url::to('http://localhost/yiicrud/images/students/' . $x->STUDENT_IMAGE); 
                      print"<img src=\"$image\" width=\"100px\" height=\"100px\"\/>";?></td>
                      <td> <?= Html::a('Edit', ['edit', 'id' => $x->PERSON_ID],['class' => 'btn btn-primary']) ?></td>
                      <td> <?= Html::a('Delete', ['delete', 'id' => $x->PERSON_ID],['class' => 'btn btn-danger']) ?></td>
                    </tr>
                <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td>No Record </td>
                    <?php endif; ?>    
                  </tbody>
            </table> 
</div>
