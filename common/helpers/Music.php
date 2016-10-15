<?php
namespace common\helpers;
use yii;

/**
 * 查询音频资源相关信息
 *
 * @author        Xlc <xianglingchuan@sina.cn>
 * @date          2016-09-25
 * @copyright    2016
 * @version      $Id: Music.php xlc $
 */
class Music {

    public $source_url = "";

    public function __construct() {
        $this->source_path = "/Upload/Image/";        
    }
}