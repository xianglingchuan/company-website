<?php
namespace common\helpers;

use yii;
use yii\web\UploadedFile;


/**
 * 常用函数类
 *
 * @deprec        常用函数类
 * @author        Xlc <xianglingchuan@sina.cn>
 * @date          2016-08-08
 * @copyright    2016
 * @version      $Id: CommonHelper.php xlc $
 */

class Controller{

    
    /**
     * 设置返回json格式
     *
     * @param     Controller  $controller  
     * @author    Xlc <xianglingchuan@sina.cn>
     * @date      2016-08-08
     * @return    void
     */    
    static function displyJson($ret, $msg, $content=[]){        
        $data = ["status"=>["ret"=>$ret, "msg"=>$msg],"content"=>$content];
        echo json_encode($data);
        die();
    }
    
}
