<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\AttributeBehavior;

/**
 * This is the model class for table "{{%navigation}}".
 *
 * @property integer $id
 * @property integer $type
 * @property string $name
 * @property integer $parent_id
 * @property string $style
 * @property string $path
 * @property string $icon
 * @property string $target
 * @property integer $sort
 * @property string $created_at
 * @property integer $created_uid
 * @property string $updated_at
 * @property integer $updated_uid
 */
class SystemNavigation extends \yii\db\ActiveRecord
{
    
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%system_navigation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'style', 'path'], 'required'],
            [['parent_id', 'sort', 'created_uid', 'updated_uid','id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'style'], 'string', 'max' => 50],
            [['path'], 'string', 'max' => 100],
            [['target'], 'string', 'max' => 20],
            [['icon'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '导航名称',
            'parent_id' => '父导航',
            'style' => '样式',
            'path' => '地址',
            'icon' => '图标',
            'target' => 'target',
            'sort' => '排序',
            'created_at' => '创建时间',
            'created_uid' => '创建者ID',
            'updated_at' => '修改时间',
            'updated_uid' => '修改者ID',
        ];
    }
    
    
   
    
    
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
                        $value = !empty($this->created_uid) ? $this->created_uid : yii::$app->user->id;
                    } elseif ($event->name == ActiveRecord::EVENT_BEFORE_UPDATE) {
                        $value = !empty($this->updated_uid) ? $this->updated_uid : yii::$app->user->id;
                    }
                    return $value;
                },
            ]
        ];
    }  
    
    
    /**
     * 获取父级信息
     *
     * @return Object
     * @author Xlc
     */    
    public function getParent()
    {
        return $this->hasOne(Navigation::className(), ['id' => 'parent_id']);
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
     *
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
