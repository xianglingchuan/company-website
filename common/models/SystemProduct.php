<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\behaviors\AttributeBehavior;

/**
 * This is the model class for table "{{%system_book}}".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $title
 * @property string $author
 * @property string $cover
 * @property string $basic_facts
 * @property string $zip_path
 * @property string $browse_url
 * @property integer $is_del
 * @property integer $is_show
 * @property string $created_at
 * @property integer $created_uid
 * @property string $updated_at
 * @property integer $updated_uid
 */
class SystemProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%system_product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'content'], 'required'],
            [['category_id', 'is_del', 'is_show', 'created_uid', 'updated_uid', 'id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'cover'], 'string', 'max' => 200],
            [['basic_facts', 'short_basic_facts'], 'string', 'max' => 256],
            [['content'], 'string'],
            //封面上传
            [['cover'], 'file',  'skipOnEmpty' => true, 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png'],
            [['cover'], 'validateCover', 'skipOnError'=> false, "skipOnEmpty"=>false],
        ];
    }
    
    
    /**
     * 验证图片信息
     */
    public function validateCover($attribute, $params)
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
            'category_id' => '所属分类',
            'title' => '产品名称',
            'cover' => '产品封面',
            'content' => "产品内容",
            'basic_facts' => 'SEO描述',
            'short_basic_facts' => 'SEO关键字',            
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
     * 获取用户信息
     * @return Object
     */    
    public function getCategory()
    {
        return $this->hasOne(SystemCategory::className(), ['id' => 'category_id']);
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
    
    
    /**
     * 获取详情
     *
     * @param   integer  $id  ID号
     * @return  Object
     */ 
    public function getInfoArray($id){
        $info =  $this::find()->select("id,category_id,title,author,cover,basic_facts,short_basic_facts,zip_path,browse_url")->where("id=:id",[':id'=>$id])->asArray()->one();
        if(!empty($info)){
            \frontend\helpers\CommonHelp::handleImagePathBySingle($info, ["zip_path", "browse_url", "cover"]);
            if(!empty($info['browse_url'])){
                $info['browse_url'] = $info['browse_url']."index.html";
            }            
        }else{
            $info = new \stdClass();
        }
        return $info;
    }
    
    
    /**
     * 获取封面缩略图配置Key值
     * @return array
     */     
    static function getCoverThumbnailKey(){
        return "product.cover.thumbnail.size";
    }
    
    
}
