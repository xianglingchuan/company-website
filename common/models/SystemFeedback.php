<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\behaviors\AttributeBehavior;

/**
 * This is the model class for table "{{%system_feedback}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $version
 * @property integer $system
 * @property integer $contact_type
 * @property string $contact
 * @property string $content
 * @property string $created_at
 * @property integer $created_uid
 * @property string $updated_at
 * @property integer $updated_uid
 */
class SystemFeedback extends \yii\db\ActiveRecord
{
    
    /*
     * 反馈内容系统类型
     * 1=ios/2=android
     */
    const SYSTEM_IOS = 1;
    const SYSTEM_ANDROID = 2;
    
    
    /*
     * 反馈内容联系方式类型
     * 1=qq/2=手机/3=邮箱
     */
    const CONTACT_TYPE_QQ = 1;
    const CONTACT_TYPE_PHONE = 2;
    const CONTACT_TYPE_EMAIL = 3;
    
    
    /*
     * 处理状态
     * 0=未处理/1=已处理 默认值为0
     */
    const HANDLE_STATUS_DEFAULT = 0;
    const HANDLE_STATUS_YES = 1;
    
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%system_feedback}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'version', 'contact', 'content','system', 'contact_type'], 'required'],
            [['user_id', 'system', 'contact_type', 'created_uid', 'updated_uid', 'id', 'handle_status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['version'], 'string', 'max' => 20],
            [['contact'], 'string', 'max' => 50],
            [['content', 'handle_remark'], 'string', 'max' => 256],
            
            
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '用户ID号',
            'version' => '版本号',
            'system' => '系统类型',
            'contact_type' => '联系方式',
            'contact' => '联系信息',
            'content' => '反馈内容',
            'created_at' => '创建日期',
            'created_uid' => '创建用户',
            'updated_at' => '修改日期',
            'updated_uid' => '修改用户',
            'handle_status' => '处理状态',
            'handle_remark' => '处理备注'
        ];
    }
    
    /**
     * 获取反馈内容系统类型
     * @param   Int   $key   key值
     * @return  array|string
     * @author xlc
     */    
    static public function getSystem($key=false){
        $data = [self::SYSTEM_IOS=>"IOS",
                 self::SYSTEM_ANDROID=>"Android"];
        if($key===false){
            return $data;
        }
        return isset($data[$key]) ? $data[$key] : "";
    }
    
    
    /**
     * 获取反馈内容联系方式类型
     * @param   Int   $key   key值
     * @return  array|string
     * @author xlc
     */    
    static public function getContactType($key=false){
        $data = [self::CONTACT_TYPE_QQ=>"qq",
                 self::CONTACT_TYPE_PHONE=>"手机",
                 self::CONTACT_TYPE_EMAIL => "邮箱"];
        if($key===false){
            return $data;
        }
        return isset($data[$key]) ? $data[$key] : "";
    }
    
    
    /**
     * 获取处理状态
     * @param   Int   $key   key值
     * @return  array|string
     * @author xlc
     */    
    static public function getHandleStatus($key=false){
        $data = [self::HANDLE_STATUS_DEFAULT=>"未处理",
                 self::HANDLE_STATUS_YES=>"已处理"];
        if($key===false){
            return $data;
        }
        return isset($data[$key]) ? $data[$key] : "";
    }
    
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            //自动填充创建时间和更新时间字段
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => date('Y-m-d H:i:s'),
            ],
            //自动填充创建人id和修改人
            [
                'class' => AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'created_uid',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_uid',
                ],
                'value' => function ($event) {
                    $value = 0;
                    if ($event->name == ActiveRecord::EVENT_BEFORE_INSERT) {
                        $value = !empty($this->created_uid) ? $this->created_uid : (isset(yii::$app->user->id) && intval(yii::$app->user->id)>=1 ? yii::$app->user->id : 0);
                    } elseif ($event->name == ActiveRecord::EVENT_BEFORE_UPDATE) {
                        $value = !empty($this->updated_uid) ? $this->updated_uid : (isset(yii::$app->user->id) && intval(yii::$app->user->id)>=1 ? yii::$app->user->id : 0);
                    }
                    return $value;
                },
            ]
        ];
    }
    
    
    /**
     * 获取用户信息
     * @return Object
     */    
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
    
    /**
     * 获取详情
     *
     * @param   integer  $id  ID号
     * @return  Object
     */ 
    public function getInfo($id){
        return $this::find()->where("id=:id",[':id'=>$id])->one();
    }
    

    /**
     * 删除
     * @param  integer  $id  ID号
     * @return Boolean
     */ 
    public function myDelete($id){
        $model = $this->getInfo($id);
        if(!empty($model)){
            return $model->delete();
        }
        return false;
    }      
}
