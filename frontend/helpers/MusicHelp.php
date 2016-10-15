<?php
namespace frontend\helpers;

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
     * 从音频资源服务器中查询音频数据
     * 
     * @param int   $specialId
     * @return array()
     */
    public function getSecialInfo($specialId){
        $sql = "select id, name, name_en, timelength, coverpath, compose, words, description FROM tb_sspecial WHERE id='{$specialId}'";
        $command = Yii::$app->dbmusic->createCommand($sql);
        $result = $command->queryAll();
        $info = isset($result[0]) && !empty($result[0]) ? $result[0] : [];
        if(!empty($info)){
            if(!empty($info['coverpath'])){
                $info['coverpath'] = Yii::$app->params['music_domain'].$this->source_path.$info['coverpath'];            
            }
        }
        return !empty($info) ? $info : [];
    }
    
    
    /**
     * 从音频资源服务器中查询动画片信息
     * 
     * @param int   $animeId
     * @return array()
     */
    public function getAnimeInfo($animeSectionId){
        $sql = "select A.id, A.show_id, A.show_type, A.name, A.subtitle, A.poster, A.poster_large, A.thumbnail, A.description, A.shortdesc, B.id as section_id FROM tb_sanime as A, tb_sanime_section as B "
             . " WHERE A.id=B.anime_id AND B.id='{$animeSectionId}'";
        $command = Yii::$app->dbmusic->createCommand($sql);
        $result = $command->queryAll();
        $info = isset($result[0]) && !empty($result[0]) ? $result[0] : [];
        if(!empty($info)){
            if(!empty($info['thumbnail'])){
                $info['thumbnail'] = Yii::$app->params['music_domain'].$this->source_path.$info['thumbnail'];            
            }
        }
        return !empty($info) ? $info : [];
    }
}