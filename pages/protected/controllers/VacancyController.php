<?php

class VacancyController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
    public $vacancy=null ;
    public $amenu=null;
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
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
	{   //DebugBreak();
        $this->vacancy = $this->loadModel($id) ;
        $comment=$this->newComment($this->vacancy);
		$this->render('view',array(
			'model'=>$this->vacancy,
            'comment'=>$comment,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{ //DebugBreak();
		$model=new Vacancy;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Vacancy']))
		{
			// populate fields for which system is responsible
            $_POST['Vacancy']['created'] = date("Y-m-d H:i:s") ;
            $_POST['Vacancy']['created_by'] = Yii::app()->user->id ;
            $model->attributes=$_POST['Vacancy'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['Vacancy']))
		{
			$model->attributes=$_POST['Vacancy'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
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
	{   //DebugBreak();
        $criteria=new CDbCriteria(array(
           
            'order'=>'modified DESC',
            //'with'=>'commentCount',  // should be notes count
        ));
        if(isset($_POST['active']) && $_POST['active'] != 'both')
            $criteria->addSearchCondition('active',$_POST['active']);

		$dataProvider=new CActiveDataProvider('Vacancy',array(
            'pagination'=>array(
                'pageSize'=>Yii::app()->params['vacancyPerPage'],
            ),
            'criteria'=>$criteria,
        ));
        $model = new Vacancy() ;
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
            'model'=> $model,
            'active'=>$_POST['active'],
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Vacancy('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Vacancy']))
			$model->attributes=$_GET['Vacancy'];

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
		$model=Vacancy::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='vacancy-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    /**
     * Creates a new comment.
     * This method attempts to create a new comment based on the user input.
     * If the comment is successfully created, the browser will be redirected
     * to show the created comment.
     * @param Post the post that the new comment belongs to
     * @return Comment the comment instance
     */
    protected function newComment($vacancy)
    {
        $comment=new History;
        if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
        {
            echo CActiveForm::validate($comment);
            Yii::app()->end();
        }
        if(isset($_POST['History']))         
        {   $_POST['History']['vacancy_id'] = $vacancy->id ;
            $_POST['History']['created'] = date("Y-m-d H:i:s") ;
            $_POST['History']['modified'] = date("Y-m-d H:i:s") ;
            $_POST['History']['created_by'] = Yii::app()->user->id ;
            $comment->attributes=$_POST['History'];

            if($comment->save())
            {
                Yii::app()->user->setFlash('commentSubmitted','Comment Added');
                $this->refresh();
            }
        }
        return $comment;
    }
}
