<?php

namespace common\helpers;
use yii;

/**
 * 发送短信验证码
 *
 * @package common\helpers
 * @author      dzer
 * @date
 * @copyright   2016 PRG
 */
class Sms {

    private static $account = "";  //用户名称
    private static $password = ""; //用户密码

    private static function Post($curlPost, $url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_NOBODY, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
        $return_str = curl_exec($curl);
        curl_close($curl);

        return $return_str;
    }

    /**
     * XML转换成数组
     *
     * @param $xml
     * @return array
     * @author dzer
     */
    private static function xml_to_array($xml) {
        $arr = array();
        $reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
        if (preg_match_all($reg, $xml, $matches)) {
            $count = count($matches[0]);
            for ($i = 0; $i < $count; $i++) {
                $subxml = $matches[2][$i];
                $key = $matches[1][$i];
                if (preg_match($reg, $subxml)) {
                    $arr[$key] = self::xml_to_array($subxml);
                } else {
                    $arr[$key] = $subxml;
                }
            }
        }
        return $arr;
    }

    /**
     * 发送短信验证码
     *
     * @param string $tel 电话号码
     * @param string $code 验证码
     * @return array
     * @author dzer
     */
    public static function send($tel, $code) {
        $str = "您的验证码是：{$code}。请不要把验证码泄露给其他人。";
        $target = Yii::$app->params['sendSMSUrl'];
        self::$account = Yii::$app->params['sendSMSAccount'];
        self::$password = Yii::$app->params['sendSMSPassword'];
        $post_data = "account=" . self::$account . "&password=" . self::$password . "&mobile=" . $tel . "&content=" . rawurlencode($str);
        //密码可以使用明文密码或使用32位MD5加密
        $gets = self::xml_to_array(self::Post($post_data, $target));
        $return = array();
        $return["ret"] = $gets['SubmitResult']['code'];
        $return["msg"] = $gets['SubmitResult']['msg'];
        //$result['ret']==2时候为正常状态不为2时候可以直接打印$result['msg']查看错误报告
        return $return;
    }

    /**
     * 商家注册成功以后发送的短信内容
     *
     * @param $tel
     * @param $username
     * @return array
     * @author dzer
     */
//    public function register($tel, $username) {
//        $str = "尊敬的" . $username . "，您已成功成为聚融易信贷经理。感谢您的支持。";
//        $target = Yii::$app->params['sendSMSUrl'];
//        self::$account = Yii::$app->params['sendSMSAccount'];
//        self::$password = Yii::$app->params['sendSMSPassword'];
//        $post_data = "account=" . self::$account . "&password=" . self::$password . "&mobile=" . $tel . "&content=" . rawurlencode($str);
//        //密码可以使用明文密码或使用32位MD5加密
//        $gets = self::xml_to_array(self::Post($post_data, $target));
//        $return = array();
//        $return["ret"] = $gets['SubmitResult']['code'];
//        $return["msg"] = $gets['SubmitResult']['msg'];
//        //$result['ret']==2时候为正常状态不为2时候可以直接打印$result['msg']查看错误报告
//        return $return;
//    }
}
