<?php

class ApplicantController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
    public $vacancy=null;
    public $amenu=null;
    public $_vacancy=null;
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
            'vacancyContext - delete'
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{   //DebugBreak();
		$model=new Applicant;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Applicant']))
		{   //DebugBreak();
            // populate fields for which system is responsible
            $_POST['Applicant']['vacancy_id'] = $this->_vacancy->id ;
            $_POST['Applicant']['created'] = date("Y-m-d H:i:s") ;
            $_POST['Applicant']['created_by'] = Yii::app()->user->id ;
            $_POST['Applicant']['application_status'] = 1 ;
			$model->attributes=$_POST['Applicant'];
            $model->image=CUploadedFile::getInstance($model,'image');
            $model->resume=CUploadedFile::getInstance($model,'resume');
			if($model->save()){
                if(!file_exists(Yii::app()->basePath.'/../'.Yii::app()->params['applicantFiles'].'/'.$model->id.'/')){
                    mkdir(Yii::app()->basePath.'/../'.Yii::app()->params['applicantFiles'].'/'.$model->id.'/',0777,true);
                }
                if($model->image->name){
				$model->image->saveAs( Yii::app()->basePath.'/../'.Yii::app()->params['applicantFiles'].'/'.$model->id.'/'.$model->image->name);
                }
                if($model->resume->name){
                $model->resume->saveAs( Yii::app()->basePath.'/../'.Yii::app()->params['applicantFiles'].'/'.$model->id.'/'.$model->resume->name);
                }
                $this->redirect(array('view','id'=>$model->id,'vid'=>$this->_vacancy->id));
            }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Applicant']))
		{
			$model->attributes=$_POST['Applicant'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Applicant', array(
         'criteria'=>array(
             'condition'=>'vacancy_id=:vacancyId',
             'params'=>array(':vacancyId'=>$this->_vacancy->id),
          ),
        ));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Applicant('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Applicant']))
			$model->attributes=$_GET['Applicant'];
        
        $model->vacancy_id = $this->_vacancy->id;
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Applicant::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='applicant-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
     protected function loadVacancy($vid)    
     {
         //if the project property is null, create it based on input id
         if($this->_vacancy===null) {
              $this->_vacancy=Vacancy::model()->findbyPk($vid);
              if($this->_vacancy===null){
                  throw new CHttpException(404,'The requested vacancy does not exist.'); 
              }
         }
     
        return $this->_vacancy; 
     }
    public function filterVacancyContext($filterChain)
    {   
         //set the project identifier based on either the GET or POST input 
                 //request variables, since we allow both types for our actions   
         $vacancyId = null;
         if(isset($_GET['vid'])) 
              $vacancyId = $_GET['vid'];
         else if(isset($_POST['vid'])) 
              $vacancyId = $_POST['vid'];
         $this->loadVacancy($vacancyId);   
         //complete the running of other filters and execute the requested action
         $filterChain->run(); 
    } 
  
}
