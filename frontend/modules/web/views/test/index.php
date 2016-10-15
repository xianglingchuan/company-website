<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;
?>

<?php
if(!empty($model)){
    foreach($model as &$buf){
        echo $buf->id."<BR>";
    }
}
echo "<p>分页</p>";
//var_dump($pages);
?>     

      
  <?= LinkPager::widget(['pagination' => $pages]); ?>  
     
      
      
 <?php Pjax::begin(); ?>    
                        <?= GridView::widget([
                                'dataProvider' => $dataProvider,
                                'filterModel' => $model,
                                'layout' => "{items}\n{pager}", 
                                'id' => "exampleTableToolbar",
                                'columns' => [
                                    //['class' => 'yii\grid\SerialColumn'],
                                    'id',           
                                    
                                    /*['class' => 'yii\grid\ActionColumn','header' => '操作',
                                                'template' => '{update} {delete} {top} {hidden}',
                                                'buttons' => 
                                                [
                                                    'update' => function ($url, $model, $key) {
                                                       return Html::a('<span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;&nbsp;&nbsp;', Url::toRoute(['article/add', 'id' =>$key]));
                                                    },
                                                    'delete' => function ($url, $model, $key) {
                                                       return Html::a('<span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;&nbsp;&nbsp;', Url::toRoute(['article/del', 'id' =>$key]));
                                                    },        
                                                    'top' => function ($url, $model, $key) {
                                                       $value =  $model->is_top==1 ? 0 : 1;
                                                       $text =  $model->is_top==1 ? "取消置顶" : "置顶";
                                                       return Html::a($text.'&nbsp;&nbsp;&nbsp;&nbsp;', Url::toRoute(['article/update-top-and-hidden', 'id' =>$key, 'type'=>'is_top', "value"=>$value]));
                                                    },  
                                                    'hidden' => function ($url, $model, $key) {
                                                       $value =  $model->is_hidden==1 ? 0 : 1;
                                                       $text =  $model->is_hidden==1 ? "显示" : "隐藏";                                
                                                       return Html::a($text, Url::toRoute(['article/update-top-and-hidden', 'id' =>$key,'type'=>'is_hidden', "value"=>$value]));
                                                    },                                      
                                                ],
                                    ],*/
                                ],
                            ]); ?>
                        <?php Pjax::end(); ?>       
   