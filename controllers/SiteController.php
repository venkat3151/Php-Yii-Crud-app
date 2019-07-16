<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Info;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $info = Info::find()->all();
        return $this->render('index', ['info' => $info]);
    }

    public function actionCreate()
    {  
       $infocreate = new Info();
       $formData = Yii::$app->request->post();
       if($infocreate -> load($formData)){
        $infocreate->save();
        $studentId = $infocreate->PERSON_ID;
        $image = UploadedFile::getInstance($infocreate,'STUDENT_IMAGE');
        $imgName = 'stu_'. $studentId . '.' . $image->getExtension();
        $image->saveAs(Yii::getAlias('@studentImgPath') . '/' . $imgName);
        $infocreate->STUDENT_IMAGE = $imgName;
        $infocreate->save();
            return $this->redirect(['index']);
        
       }
       return $this->render('create', ['infocreate' => $infocreate]);
    }

    public function actionEdit($id){
           $infocreated = Info::findOne($id);
           if($infocreated -> load(Yii::$app->request->post())) {
            $infocreated->save();
            $image = UploadedFile::getInstance($infocreated,'STUDENT_IMAGE');
            $imgName = 'stu_'. $id . '.' . $image->getExtension();
            $image->saveAs(Yii::getAlias('@studentImgPath') . '/' . $imgName);
            $infocreated->STUDENT_IMAGE = $imgName;
            $infocreated->save();
            return $this->redirect(['index']);
           }
            return $this->render('edit',['infocreate' => $infocreated]);
    
    }
    

    public function actionDelete($id){
           $infocreated = Info::findOne($id)->delete();
           if($infocreated){
            return $this->redirect(['index']);
           }
           
    }

    public function actionView(){
       // $info = Info::find()->all()->where(['STATUS'=>'active']);
        $info = new ActiveDataProvider(['query' => Info::find()->where(['STATUS'=>'active']),]);
        return $this->render('view', ['info' => $info]);
    }


    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
