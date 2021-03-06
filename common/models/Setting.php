<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%setting}}".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $code
 * @property string $type
 * @property string $store_range
 * @property string $store_dir
 * @property string $value
 * @property integer $sort_order
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_uid
 * @property integer $updated_uid
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%setting}}';
    }

    
    public $ABOUT_ID = 41;
    public $COMPANY_CERTIFICATE_ID = 51;
    public $CONTACT_ID = 61;
    public $SITE_BASIC_ID = 11;
    
    
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'sort_order', 'created_uid', 'updated_uid'], 'integer'],
            [['code', 'type'], 'required'],
            [['value'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['code', 'type'], 'string', 'max' => 32],
            [['store_range', 'store_dir'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'code' => 'Code',
            'type' => 'Type',
            'store_range' => 'Store Range',
            'store_dir' => 'Store Dir',
            'value' => 'Value',
            'sort_order' => 'Sort Order',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_uid' => 'Created Uid',
            'updated_uid' => 'Updated Uid',
        ];
    }
    
    
    /**
     * 自定义标签内容
     */
    public function myLabels($key=false){
        $data = [
            'siteName' => "网站名称",
            'siteKeyword' => "网站SEO关键字",
            "siteDescription" => "网站SEO描述内容",
            "siteQrCode" => "公司二维码",
            "siteTopLog" => "网站顶部LOG",
            "siteTopAd" => "顶部咨询热线图片",
            "siteLeftAd" => "左侧咨询热线图片",
            "companyCertificate" => "企业资质",
            'contactTel' => "联系电话",
            "contactPhone" => "联系手机",
            "contactEmail" => "邮箱",
            "contactAddressOne" => "地址一",
            "contactAddressTwo" => "地址二",
            "contactAddressThree" => "地址三",
            'companyHomeImg' => "首页配图",
            "companyContent" => "公司简介",
        ];
        if($key == false){
            return $data;
        }else{
            if(isset($data[$key]) && !empty($data[$key])){
                return $data[$key];
            }else{
                return "";
            }    
        }
    }
    
    
    
    /**
     * 默认的图片
     */
    public function getDefaultCoverPath(){
        return Yii::$app->request->hostInfo."/img/default/system_gift_cover.jpg";
    }   
    
    
    /**
     * 获取公司简介信息
     *
     * @return array
     */
    public function getCompany() {
        $list = $this::find()->select("id, parent_id, code, type, value")->where("parent_id=" . $this->ABOUT_ID)->asArray()->all();
        return $list;
    }

    
    
    /**
     * 获取企业资质
     *
     * @return array
     */
    public function getCompanyCertificate() {
        $info = $this::find()->select("id, parent_id, code, type, value")->where("id=" . $this->COMPANY_CERTIFICATE_ID)->asArray()->one();
        return $info;
    }

    
    
    /**
     * 获取联系方式
     *
     * @return array
     */
    public function getContact(){
        $list = $this::find()->select("id, parent_id, code, type, value")->where("parent_id=" . $this->CONTACT_ID)->asArray()->all();
        $viewData = [];
        if(!empty($list)){
            foreach($list as $buf){
                $viewData[$buf['code']] = $buf['value'];
            }
        }
        return $viewData;
    }
    
    
    /**
     * 获取网站基本信息
     *
     * @return array
     */
    public function getSiteBasic(){
        $list = $this::find()->select("id, parent_id, code, type, value")->where("parent_id=" . $this->SITE_BASIC_ID)->asArray()->all();
        return $list;  
    }
    
    
    
    
}
