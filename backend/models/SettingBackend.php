<?php

namespace backend\models;

use Yii;
use common\models\Setting;
use yii\data\ActiveDataProvider;
use common\helpers\Models;

/**
 * 系统相关配置模型
 *
 * @deprec        系统相关配置模型
 * @author        Xlc <xianglingchuan@sina.cn>
 * @date          2016-10-06
 * @version       $Id: SettingBackend.php 2016-10-06 xlc $
 */
class SettingBackend extends Setting {

    private $ABOUT_ID = 41;
    private $COMPANY_CERTIFICATE_ID = 51;
    private $CONTACT_ID = 61;
    private $SITE_BASIC_ID = 11;

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
     * 保存公司简介信息
     *
     * @return array
     */
    public function updateCompany($data) {
        if (!empty($data)) {
            foreach ($data as &$buf) {
                $model = $this::find()->where("id=:id", [':id' => $buf['id']])->one();
                $model->value = $buf['value'];
                $model->save(false);
            }
            return true;
        }
        return false;
    }

    /**
     * 后台获取封面路径
     */
    public function getImgPath($cover) {
        if (!empty($cover)) {
            return \backend\helpers\CommonHelp::getFrontendImg($cover);
        } else {
            return "";
        }
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
     * 修改企业资质
     *
     * @return array
     */
    public function updateCompanyCertificate($content) {
        $model = $this::find()->where("id=:id", [':id' => $this->COMPANY_CERTIFICATE_ID])->one();
        $model->value = $content;
        return $model->save(false);
    }
    
    
    
    /**
     * 获取联系方式
     *
     * @return array
     */
    public function getContact(){
        $list = $this::find()->select("id, parent_id, code, type, value")->where("parent_id=" . $this->CONTACT_ID)->asArray()->all();
        return $list;
    }
    
    
    /**
     * 保存联系方式
     *
     * @return array
     */
    public function updateContact($data) {
        if (!empty($data)) {
            foreach ($data as &$buf) {
                $model = $this::find()->where("id=:id", [':id' => $buf['id']])->one();
                $model->value = $buf['value'];
                $model->save(false);
            }
            return true;
        }
        return false;
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
    
    
    
    /**
     * 保存网站基本信息
     *
     * @return array
     */
    public function updateSiteBasic($data) {
        if (!empty($data)) {
            foreach ($data as &$buf) {
                $model = $this::find()->where("id=:id", [':id' => $buf['id']])->one();
                $model->value = $buf['value'];
                $model->save(false);
            }
            return true;
        }
        return false;
    }
    
    
    
}
