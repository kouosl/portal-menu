<?php

namespace kouosl\menu\controllers\backend;

use Yii;
use kouosl\menu\models\Menu;
use kouosl\menu\models\MenuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use common\config\db;

/**
 * MenuController implements the CRUD actions for Menu model.
 */
class MenuController extends DefaultController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        // return [
        //     'verbs' => [
        //         'class' => VerbFilter::className(),
        //         'actions' => [
        //             'delete' => ['POST'],
        //         ],
        //     ],
        // ];
        $behaviors = parent::behaviors();
        return $behaviors;
    }

   /* function menubuild(){
        $menuayarsor=mysql_query("select * from menu");
        while($menuayarcek=mysql_fetch_assoc($menuayarsor)){}

       $menuItems=[];
       $menuItems = [['label' =>'Sayfa 1', 'url' => '#url'],['label' =>'Sayfa 2', 'url' => '#url2']];
        return $menuItems;   
    }*/
    /**
     * Lists all Menu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MenuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }






//Menu build fonksiyonunun yazılması
    public function menubuild($name){
        $model = Menu::find()->where(['name'=>$name])->one();

     
        $menuItems=[];
        $parents=array();
        $items=ArrayHelper::toArray($model->items);

        if (count($items)>0) {

            $say = 0;
            foreach ($items as $value) {

                if ($value['parent']!="") {
                        $parents[$value['parent']][$say] = [
                            'label' => $value['label'],
                            'id'    =>  $value['id'],
                            'url'   => $value['target'],
                            'items' => []];
                            $say++;
                }   

            }

            foreach ($items as $value) {
                $sayac=0;

                if (empty($value['parent']) && array_key_exists($value['label'], $parents)) {

                    array_push($menuItems,['label' => $value['label']  ,'id' => $value['id'],'url'
                    => $value['target'],'items'=> $parents[$value['label']]]);
                }   

                if (empty($value['parent']) && !array_key_exists($value['label'], $parents)) {
                 
                    array_push($menuItems,['label' => $value['label']  ,'id' => $value['id'],'url'
                    => $value['target']]);

                } 
            }
     
        }
     
      return $menuItems; 

    }


 /* if ($value['parent']=="") {
                foreach ($items as $value2) {
                    if($value2['parent']!=$value['label']){
                        array_push($menuItems,['label' => $value['label']  ,'id' => $value['id'],'url'
                        => $value['target']]);
                        break;
                    }
                }
            }*/
                    
                  /*  if($value3['label']==$value['parent']){
                        array_push($menuItems,['label' => $value['label']  ,'id' => $value['id'],'url'
                        => $value['target']);
                        break;
                    }    */    


 /*if($items['parent']!='0'){
            array_push($menuItems,['label' => $value['label']  ,'id' => $value['id'],'url' => $value['target'],'items'=> $items]);
         }*/


    //Alt Menu Oluşturma
    //array_push($menuItems,['label' => $value['label']  ,'id' => $value['id'],'url' => $value['target'],'items'=> $items]);

 //$menuItems = [['label' => $menuayarcek['name'];, 'url' => '#url'],['label' => 'Sayfa 2', 'url' => '#url'],['label' => 'Sayfa 3', 'url' => '#url']];




    /**
     * Displays a single Menu model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Menu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Menu();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
            
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Menu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Menu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Menu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
