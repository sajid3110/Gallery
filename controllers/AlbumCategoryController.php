<?php

namespace app\controllers;

use Yii;
use app\models\AlbumCategory;
use app\models\Categories;
use app\models\AlbumCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AlbumCategoryController implements the CRUD actions for AlbumCategory model.
 */
class AlbumCategoryController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AlbumCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlbumCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AlbumCategory model.
     * @param integer $aid
     * @param integer $cid
     * @return mixed
     */
    public function actionView($aid, $cid)
    {
        return $this->render('view', [
            'model' => $this->findModel($aid, $cid),
        ]);
    }

    /**
     * Creates a new AlbumCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AlbumCategory();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'aid' => $model->aid, 'cid' => $model->cid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AlbumCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $aid
     * @param integer $cid
     * @return mixed
     */
    public function actionUpdate($aid, $cid)
    {
        $model = $this->findModel($aid, $cid);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'aid' => $model->aid, 'cid' => $model->cid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AlbumCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $aid
     * @param integer $cid
     * @return mixed
     */
    public function actionDelete($aid, $cid)
    {
        $this->findModel($aid, $cid)->delete();

        return $this->redirect(['index']);
    }

    public function actionViewAlbum()
    {
        $aid = Yii::$app->request->post('aid');
        $category_query = AlbumCategory::find()->select('album_category.cid')->where(['aid' => $aid]);
        $category_query->joinWith('c');
        $categories = Categories::findAll($category_query);
        // echo Json::encode($questions);
        foreach($categories as $a)
        {
            echo $a->cname . "<br/>";
        }
        //return $this->render('albumCategories', $options = ['model' => $album]);
    }

    /**
     * Finds the AlbumCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $aid
     * @param integer $cid
     * @return AlbumCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($aid, $cid)
    {
        if (($model = AlbumCategory::findOne(['aid' => $aid, 'cid' => $cid])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
