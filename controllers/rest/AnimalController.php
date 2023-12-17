<?php 
namespace app\controllers\rest;
use app\models\Animal;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use Yii;

class AnimalController extends \yii\rest\ActiveController {
    public $modelClass = 'app\models\Animal';
    // public function behaviors(){
    //     return [
    //         'access' =>[
    //             'class' => AccessControl::className(),
    //             'rules' => [
    //                 [
    //                     // 'actions' => ['update'],
    //                     'allow' => true,
    //                     'roles' => ['@'],
    //                     // 'denyCallback' => function ($rule, $action) {
    //                     //     throw new ForbiddenHttpException('У вас нет доступа к данной странице.');
    //                     // },
    //                 ],
    //             ]
    //         ]
    //     ];
    // }
    public function actionRequest()
    {
        if (Yii::$app->request->isPost){
            // if (!$user->can('yourPermission')) {
            //     throw new ForbiddenHttpException('You are not allowed to perform this action.');
            // }
            $model = new Animal();
            $model['name'] = Yii::$app->request->post()['name'];
            $model['gender'] = Yii::$app->request->post()['gender'];
            $model['info'] = Yii::$app->request->post()['info'];
            $model['taken'] = Yii::$app->request->post()['taken'];
            $model['animal_race_fk'] = Yii::$app->request->post()['animal_race_fk'];
            
            $model->save();
            return $model;
        }
        if (Yii::$app->request->isGet){
            if (Yii::$app->request->get('id') == null){
                $rows = Animal::find()->all();
                return $rows;
            }
            else {
                $row = Animal::findOne(Yii::$app->request->get('id'));
                return $row;
            }
        }
        if (Yii::$app->request->isDelete){
            $id = Yii::$app->request->get('id');
            $model = Animal::findOne($id);
            if ($model) {
                $model->delete();
            }
        }
        if (Yii::$app->request->isPut){
            $id = Yii::$app->request->post()['id'];
            $model = Animal::findOne($id);
            if (isset(Yii::$app->request->post()['name'])){
                $model['name'] = Yii::$app->request->post()['name'];
            }
            if (isset(Yii::$app->request->post()['gender'])){
                $model['gender'] = Yii::$app->request->post()['gender'];
            }
            if (isset(Yii::$app->request->post()['info'])){
                $model['info'] = Yii::$app->request->post()['info'];
            }
            if (isset(Yii::$app->request->post()['taken'])){
                $model['taken'] = Yii::$app->request->post()['taken'];
            }
            if (isset(Yii::$app->request->post()['animal_race_fk'])){
                $model['animal_race_fk'] = Yii::$app->request->post()['animal_race_fk'];
            }
            $model->save();
            return $model;
        }
    }   
}
?>