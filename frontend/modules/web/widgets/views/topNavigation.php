<?php
//获取当前的控制器和方法
$currPath = '/' . Yii::$app->controller->module->id . '/' . Yii::$app->controller->id."/".Yii::$app->controller->action->id;
$navigationList = [
    ["title"=>"网站首页", "url"=>"/web/index/index", "select_url"=>["/web/index/index"]],
    ["title"=>"公司简介", "url"=>"/web/index/company", "select_url"=>["/web/index/company"]],
    ["title"=>"产品中心", "url"=>"/web/product/index?category_id=1", "select_url"=>["/web/product/index",'/web/product/view']],
    ["title"=>"企业资质", "url"=>"/web/index/company-certificate", "select_url"=>["/web/index/company-certificate"]],
    ["title"=>"客户名录", "url"=>"/web/index/client", "select_url"=>["/web/index/client"]],
    ["title"=>"新闻中心", "url"=>"/web/news/index?category_id=5", "select_url"=>["/web/news/index",'/web/news/view']],
    ["title"=>"联系我们", "url"=>"/web/index/contact-us", "select_url"=>["/web/index/contact-us"]],
];
?>

<!--begin 导航-->
<div id="nav">
    <div class="w1">
        <ul class="menu">
            <?php
            foreach($navigationList as &$buf){
                $url = $buf['url'];
                $selectUrl = $buf['select_url'];
                $class = "";
                if(in_array($currPath, $selectUrl)){
                    $class = "dq";
                }
                echo '<li class="'.$class.'"><a href="'.$buf['url'].'">'.$buf['title'].'</a></li>';
            }
            ?>
                       
<!--            <li class="dq"><a href="/web/index/index">网站首页</a></li>
            <li><a href="/web/index/company">公司简介</a></li>
            <li><a href="/web/product/index?category_id=1">产品中心</a></li>
            <li><a href="/web/index/company-certificate">企业资质</a></li>
            <li><a href="/web/index/client">客户名录</a></li>
            <li><a href="/web/news/index?category_id=5">新闻中心</a></li>
            <li><a href="/web/index/contact-us">联系我们</a></li>-->
        </ul>
    </div>
</div>
<!--end 导航-->