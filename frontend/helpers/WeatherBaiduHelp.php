<?php
namespace frontend\helpers;

use Yii;
use common\helpers\Snoopy;

/**
 * 天气预报数据请求
 *
 * @author        Xlc <xianglingchuan@sina.cn>
 * @date          2016-09-14
 * @copyright    2016
 * @version      $Id: WeatherBaiduHelp.php xlc $
 */
class WeatherBaiduHelp {
    
    private $key = "";
    private $weather_url = "http://api.map.baidu.com/";    

    public function __construct() {
        $this->key = "fDIrYjH69ptI7dxDBPIkmBGSKR0cdNww";
    }

    
    /*
     * 根据经纬度获取城市信息
     */
    public function getCityName($location) {
        $url = $this->weather_url . "geocoder/v2/?output=json&ak=".$this->key."&location=".$location;
        $Snoopy = new Snoopy();
        $Snoopy->fetch($url);
        $result = $Snoopy->results;
        $cityName = "";
        if (!empty($result)) {
            $jsonObject = json_decode($result);
            if(isset($jsonObject->result->addressComponent) && !empty($jsonObject->result->addressComponent)){
                 if(isset($jsonObject->result->addressComponent->city) && !empty($jsonObject->result->addressComponent->city)){
                     $cityName = $jsonObject->result->addressComponent->city;
                 }
            }
        }
        return $cityName;
    }

   
    /*
     * 根据城市获取天气信息
     */
    public function getWeather($cityName) {
        $url = $this->weather_url . "telematics/v3/weather?location=".urlencode($cityName)."&output=json&ak=".$this->key;
        $Snoopy = new Snoopy();
        $Snoopy->fetch($url);
        $result = $Snoopy->results;
        $weather = "";
        if (!empty($result)) {
            $jsonObject = json_decode($result);
            $result = isset($jsonObject->results[0]) ? $jsonObject->results[0] : "";
            if(!empty($result)){
                if(isset($result->weather_data[0]) && !empty($result->weather_data[0])){
                    $weather = $result->weather_data[0];
                    $weather = isset($weather->weather) && !empty($weather->weather) ? $weather->weather : "";     
                    if(!empty($weather)){
                        $weatherArray = explode("|", $weather);
                        $weather = $weatherArray[0];
                    }
                }
            }
        }
        return $weather;        
    }
    
    /*
     * 目前百度天气与系统后台对应的关系
     */
    /*
    *************************
    晴天----ID=1
    晴
    *************************

    *************************
    雨天----ID=3
    阵雨|雷阵雨|雷阵雨伴有冰雹|雨夹雪|小雨|中雨|大雨|暴雨|大暴雨|特大暴雨|冻雨
    大暴雨转特大暴雨|暴雨转大暴雨|小雨转中雨|中雨转大雨|大雨转暴雨|
    *************************

    *************************
    阴天----ID=4
    多云|阴|霾|浮尘|扬沙|强沙尘暴|沙尘暴|雾
    *************************

    *************************
    雪天----ID=5
    阵雪|小雪|中雪|大雪|暴雪|小雪转中雪|中雪转大雪|大雪转暴雪|
    *************************        
    */    
}
