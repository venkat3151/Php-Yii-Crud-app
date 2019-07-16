<?php
     namespace app\models;

     use yii\db\ActiveRecord;
     use yii\helpers\Url;
     

     class Info extends ActiveRecord{
     	private $PERSON_ID;
     	private $FIRST_NAME;
     	private $LAST_NAME;
     	private $EMAIL;
     	private $MARK;
     	private $STATUS;
          private $STUDENT_IMAGE;

     	public function rules(){
     		return[
     			[['FIRST_NAME','LAST_NAME','EMAIL','MARK','STATUS'],'required'],
                    [['MARK'],'integer','min'=>0,'max'=>100],
                    [['STUDENT_IMAGE'],'file', 'extensions' => 'png, jpeg'],
                    [['EMAIL'],'email'],
                    [['FIRST_NAME','LAST_NAME'],'match', 'pattern'=>'/^[a-z]\w*$/i'],
     		];
     	}

          public function getImageUrl($name)
          {
               $x =  Url::to('http://localhost/yiicrud/images/students/' . $name);
               return $x;
          }
     }

?>