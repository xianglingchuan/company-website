<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\behaviors\AttributeBehavior;

/**
 * This is the model class for table "{{%system_category}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $type
 * @property string $name
 * @property string $icon
 * @property string $describe
 * @property integer $sort
 * @property integer $is_del
 * @property integer $is_show
 * @property string $created_at
 * @property integer $created_uid
 * @property string $updated_at
 * @property integer $updated_uid
 */
class SystemCategory extends \yii\db\ActiveRecord
{
    
    
    /*
     * 分类类型
     * 1=产品分类/2=新闻分类
     */
    const TYPE_PRODUCT = 1;
    const TYPE_NEWS = 2;
    
    
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%system_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'name', 'describe'], 'required'],
            [['parent_id', 'type', 'sort', 'is_del', 'is_show', 'created_uid', 'updated_uid', 'id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['icon'], 'string', 'max' => 200],
            [['describe'], 'string', 'max' => 256],
            
            //封面上传
            //[['icon'], 'file',  'skipOnEmpty' => true, 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png'],
            //[['icon'], 'validateIcon', 'skipOnError'=> false, "skipOnEmpty"=>false],         
        ];
    }
    
    
    /**
     * 验证图片信息
     */
    public function validateIcon($attribute, $params)
    {
        if(empty($this->$attribute)){
            $this->addError($attribute, $this->getAttributeLabel($attribute).'不能为空.');
        }
    }
    
    
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => '父分类ID',
            'type' => '类型',
            'name' => '名称',
            'icon' => 'icon图标',
            'describe' => '描述',
            'sort' => '排序',
            'is_del' => '是否删除',
            'is_show' => '是否显示',
            'created_at' => '创建日期',
            'created_uid' => '创建用户',
            'updated_at' => '修改日期',
            'updated_uid' => '修改用户',
        ];
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
     * 获取分类类型
     * @param   Int   $key   key值
     * @return  array|string
     * @author xlc
     */    
    static public function getType($key=false){
        $data = [self::TYPE_PRODUCT=>"产品分类",
                 self::TYPE_NEWS=>"新闻分类"];
        if($key===false){
            return $data;
        }
        return isset($data[$key]) ? $data[$key] : "";
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
            $model->is_del = Models::IS_DEL_YES;
            return $model->save(false);
        }
        return false;
    }  
    
    
    /**
     * 显示隐藏
     * @param  int  $id     ID号
     * @param  int  $value  值 
     * @return Boolean
     */ 
    public function myShowHide($id, $value){
        $model = $this->getInfo($id);
        if(!empty($model)){
            $model->is_show = $value;
            return $model->save();
        }
        return false;        
    }
    
    
}
