<?php
namespace console\controllers;
 
use yii\console\Controller;
use common\models\User; 
use common\helpers\Models;
use common\models\TaskSetup;
use common\models\TaskPlan;


class TaskSetupController extends Controller
{
    
    public function actionIndex()
    {
        echo "start execute\n\r";
        //循环所有的用户
        $userList = User::find()->where("is_del=:is_del", [":is_del"=>Models::IS_DEL_NO])->asArray()->all();
        if(!empty($userList)){
            //查看是否有当天统计的规化任务信息
            $currentDate = date("Y-m-d",time());
            $dateTaskSetupList = TaskSetup::find()->where("is_del=:is_del AND is_show=:is_show AND date=:date", 
                                                          [":is_show"=>Models::IS_SHOW_YES, ":is_del"=>Models::IS_DEL_NO, ":date"=>$currentDate])->asArray()->all();
            foreach($userList as &$buf){
                //获取用户距离注册的日期
                $startDate = date_create($buf['created_at']);
                $endDate = date_create(date("Y-m-d",time()));
                $interval = date_diff($startDate, $endDate);
                $diffDay =  intval($interval->format('%R%a'));
                $diffDay = $diffDay+1;
                if(empty($dateTaskSetupList)){
                    //开始获取指定用户距离天数据的内容
                    $dateTaskSetupList = TaskSetup::find()->where("is_del=:is_del AND is_show=:is_show AND number=:number", 
                                         [":is_show"=>Models::IS_SHOW_YES, ":is_del"=>Models::IS_DEL_NO, ":number"=>$diffDay])->asArray()->all();                    
                }
                if(!empty($dateTaskSetupList)){
                    foreach($dateTaskSetupList as &$taskSetup){
                       //循环向每个用户插入数据，然后完事
                       $task_ids = $taskSetup['task_ids']; //开始插入
                       $tasks = explode(",", $task_ids);
                       if (count($tasks) >= 1) {
                            foreach ($tasks as $taskId) {
                                //判断当前用户是否在当天已经计划过完成过该任务
                                $info = TaskPlan::find()->where("plan_date=:plan_date AND task_id=:task_id AND user_id=:user_id", [":plan_date"=>$currentDate, ":task_id"=>$taskId, ":user_id"=>$buf['id']])->asArray()->one();
                                if(empty($info)){
                                    $TaskPlan = new TaskPlan();
                                    $data = ["user_id" => $buf['id'], "plan_date" => $currentDate, "weather" => "", "task_tag_id" => 0, "task_id" => $taskId, "integral" => 0];
                                    $TaskPlan->attributes = $data;
                                    $result = $TaskPlan->save(false);                                    
                                }
                            }
                       }
                    }                    
                }
            }            
        }
        echo "stop execute\n\r";
    }
}
