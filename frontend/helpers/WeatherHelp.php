<?php
namespace frontend\helpers;

use Yii;
use common\helpers\Snoopy;

/**
 * 天气预报数据请求 - 实现的气象局相关接口但目前不通了
 *
 * @author        Xlc <xianglingchuan@sina.cn>
 * @date          2016-08-08
 * @copyright    2016
 * @version      $Id: Weather.php xlc $
 */
class WeatherHelp {

    private $date = null;
    private $appid = null;
    private $type = null;
    private $key = null;
    private $private_key = "huohuotu_webapi_data";
    private $public_key = "";
    private $weather_url = "http://webapi.weather.com.cn/data/";
    private $areaId_url = "http://geo.weather.com.cn/ag9/";
    private $areaId_private_key = "huohuotu_geo_data";
    private $areaId_public_key = "";
    private $areaId_key = "";

    public function __construct() {
        $this->type = "observe";
        $this->appid = "86b4401ae0c142d8";
        $this->date = date("YmdHi", time());
    }

    private function setPublicKey($areaid) {
        $this->public_key = $this->weather_url . "?areaid={$areaid}&type={$this->type}&date={$this->date}&appid={$this->appid}";
    }

    private function setKey() {
        $this->key = base64_encode(hash_hmac('sha1', $this->public_key, $this->private_key, TRUE));
    }

    public function getWeather($areaid) {
        $this->setPublicKey($areaid);
        $this->setKey();
        $appid = substr($this->appid, 0, 6);
        $url = $this->weather_url . "?areaid={$areaid}&type={$this->type}&date={$this->date}&appid=" . $appid . "&key=" . urlencode($this->key);
        echo $url;
        $Snoopy = new Snoopy();
        $Snoopy->fetch($url);
        $result = $Snoopy->results;
        if (!empty($result)) {
            return $result;
        } else {
            return null;
        }
    }

    private function setAreaIdPublicKey($lon, $lat) {
        $this->areaId_public_key = $this->areaId_url . "?lon={$lon}&lat={$lat}&date={$this->date}&appid={$this->appid}";
    }

    public function setAreaIdKey() {
        $this->areaId_key = base64_encode(hash_hmac('sha1', $this->areaId_public_key, $this->areaId_private_key, TRUE));
    }

    public function getAreaId($lon, $lat) {
        $this->setAreaIdPublicKey($lon, $lat);
        $this->setAreaIdKey();
        $appid = substr($this->appid, 0, 6);
        $url = $this->areaId_url . "?lon={$lon}&lat={$lat}&date={$this->date}&appid={$appid}&key=" . urlencode($this->areaId_key);
        echo $url;
        $Snoopy = new Snoopy();
        $Snoopy->fetch($url);
        $result = $Snoopy->results;
        if (!empty($result)) {
            return $result;
        } else {
            return null;
        }
    }
}
