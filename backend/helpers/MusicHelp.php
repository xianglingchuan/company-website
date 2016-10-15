<?php
namespace backend\helpers;

use Yii;
use common\helpers\Music;

/**
 * 查询音频资源相关信息
 *
 * @author        Xlc <xianglingchuan@sina.cn>
 * @date          2016-09-25
 * @copyright    2016
 * @version      $Id: MusicHelp.php xlc $
 */
class MusicHelp extends Music {

    
    public function __construct() {        
        parent::__construct();
    }
    
    
    /**
     * 获取专辑的第三层分类信息列表
     * 
     * @return array()
     */
    public function getClassList(){
        $sql = "select id, title FROM tb_sclass WHERE level='3'";
        $command = Yii::$app->dbmusic->createCommand($sql);
        $list = $command->queryAll();
        return $list;
    }
    
    
    /**
     * 获取专辑列表信息
     * 
     * @return array()
     */
    public function getSpecialList($classId){
        $sql = "select id, name as title FROM tb_sspecial WHERE classid='{$classId}'";
        $command = Yii::$app->dbmusic->createCommand($sql);
        $list = $command->queryAll();
        return $list;
    }
    
    
    /**
     * 获取动画片分类
     * 
     * @return array()
     */    
    public function getAnimeClassList(){
        $sql = "select id, name as title FROM tb_sanime_class";
        $command = Yii::$app->dbmusic->createCommand($sql);
        $list = $command->queryAll();
        return $list;
    }
    
    
    /**
     * 获取动画片信息列表
     * 
     * @return array()
     */    
    public function getAnimeList($classId){
        $sql = "select id, name as title FROM tb_sanime WHERE class_id='{$classId}'";
        $command = Yii::$app->dbmusic->createCommand($sql);
        $list = $command->queryAll();
        return $list;
    }
    
    
    /**
     * 获取动画片集数列表
     * 
     * @return array()
     */  
    public function getAnimeSectionList($animeId){
        $sql = "select id, title FROM tb_sanime_section WHERE anime_id='{$animeId}'";
        $command = Yii::$app->dbmusic->createCommand($sql);
        $list = $command->queryAll();
        return $list;
    }
    
    
    /**
     * 获取动画片某一集详细信息
     * 
     * @return array()
     */
    public function getAnimeSectionInfo($id){
        $sql = "select id, title, anime_id FROM tb_sanime_section WHERE id='{$id}'";
        $command = Yii::$app->dbmusic->createCommand($sql);
        $list = $command->queryAll();
        $info = isset($list[0]) && !empty($list[0]) ? $list[0] : [];
        return $info;
    }
    
    
    
    /**
     * 获取动画片信息列表
     * 
     * @return array()
     */    
    public function getAnimeInfo($animeId){
        $sql = "select id, name as title, class_id FROM tb_sanime WHERE id='{$animeId}'";
        $command = Yii::$app->dbmusic->createCommand($sql);
        $list = $command->queryAll();
        $info = isset($list[0]) && !empty($list[0]) ? $list[0] : [];
        return $info;
    }
    
    
    
    /**
     * 获取专辑列表信息
     * 
     * @return array()
     */
    public function getSpecialInfo($specialId){
        $sql = "select id, name as title, classid as class_id FROM tb_sspecial WHERE id='{$specialId}'";
        $command = Yii::$app->dbmusic->createCommand($sql);
        $list = $command->queryAll();
        $info = isset($list[0]) && !empty($list[0]) ? $list[0] : [];
        return $info;
    }
    
    
    /**
     * 获取专辑的第三层分类信息列表
     * 
     * @return array()
     */
    public function getClassInfo($classId){
        $sql = "select id, title FROM tb_sclass WHERE id='{$classId}'";
        $command = Yii::$app->dbmusic->createCommand($sql);
        $list = $command->queryAll();
        $info = isset($list[0]) && !empty($list[0]) ? $list[0] : [];
        return $info;
    }
    
    
    /**
     * 获取动画片分类
     * 
     * @return array()
     */    
    public function getAnimeClassInfo($classId){
        $sql = "select id, name as title FROM tb_sanime_class WHERE id='{$classId}'";
        $command = Yii::$app->dbmusic->createCommand($sql);
        $list = $command->queryAll();
        $info = isset($list[0]) && !empty($list[0]) ? $list[0] : [];
        return $info;
    }
    
    
    
}