<!--begin 顶部信息--> 
<div id="header">
    <?= frontend\modules\web\widgets\TopLog::widget(); ?>
    <?= frontend\modules\web\widgets\TopNavigation::widget(); ?>
    <?= frontend\modules\web\widgets\TopBanner::widget(); ?>
</div>
<!--end 顶部信息-->      


<!--begin 内容信息-->
<div id="main">
    <div class="container">
        <div class="w1 xq_plan1">
            <!--begin 公司简介左侧内容-->
            <div class="left_menu">
                <div class="left_menu_t">
                    <h5>公司简介</h5>
                    <span>Company profile</span>
                </div>
                <ul>
                    <li class="dqlm"><span class="sj1"></span><a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=lists&amp;catid=1">公司简介</a></li>                
                </ul>
                <div id="menu2" class="zfd" style="position: static;">
                    <div class="zbwx"><p><img src="style/img/ewm.jpg"></p><span>扫一扫，咨询我们</span></div>
                    <div class="zblx"><img src="style/img/dianh.jpg"></div>
                </div>
            </div>
            <!--end 公司简介左侧内容-->


            <script>
                var subnavT = $(".zfd").offset().top;
                $(window).scroll(function() {
                    var scrollH = $(window).scrollTop();
                    var contentH = $("#dwei").height() - $(".zfd").height();
                    if (scrollH > subnavT && scrollH < contentH + subnavT - 200) {
                        $(".zfd").stop().css({
                            "position": "absolute",
                            "top": scrollH - subnavT + 180 + "px"
                        });
                    } else if (scrollH < subnavT) {
                        $(".zfd").stop().css({
                            "position": "static",
                        });
                    }
                });
            </script>
            <!--begin 公司简介右侧内容-->
            <div class="fr xq_plan1_nr" id="dwei">
                <div class="wz">
                    <span>公司简介</span>
                    <div class="fr">您现在所在的位置：<a href="http://www.bjhtrc.com/">首页</a> &gt; <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=lists&amp;catid=1">公司简介</a></div>
                </div>
                <div class="article" style="border-bottom:none;"><p>　　北京华泰瑞诚纺织品有限公司始创于1999年，起始是绍兴县瑞诚布艺制品加工厂，总部坐落于亚洲最大的纺织品集散基地-中国绍兴。借绍兴纺织兴起的机遇和国家对纺织工业的支持力度，经过十几年的发展逐步形成了管理科学严谨，技术先进高效，产品服务一流的专业化纺织品装饰企业。　</p>
                    <p>　　响应京津冀一体化发展战略，2015年12月12日北京大红门纺织品批发市场正式签约京南永清，瑞诚纺织北方拓展部也相继在永清开发区开工筹建，2016年5月中通快递总部落户永清，未来我公司与中通快递协同合作，实现优质产品的远程速递服务，主要产品服务包括：装饰布料，辅料、海绵、防水材料，墙艺软包装饰，商务办公配套布艺装饰，高档酒店椅套、办公椅套、沙发套、高强度弹力椅套、客车座套、高端影剧院、会场排椅套，会议桌布台呢、桌套，会场礼堂遥控幕布、医院窗帘、学校窗帘、酒店窗帘、电动窗帘，各种办公窗帘、金布环境装饰、军用伪装网、迷彩布装饰，背景墙软包、LOGO电脑绣花、丝网印、热转印、数码印等产品服务。瑞诚产品通过了ISO9001：2008管理质量体系认证，阻燃定制材料通过国家防火建筑材料质量监督检验中心检验，符合公安部颁布GB20286-2006（公共场所阻燃制品要求)。</p>
                    <p>　　瑞诚纺织品（北京）公司成立以来在北京地区为：北京市人民政府、中南海接待处、国家安全局、国家药品管理局、国家宗教局、国家图书馆、中国航天、空军司令部、海军司令部、解放军总参谋部、解放军总装备部、空军政治部、第二炮兵后勤部、国防大学、后勤指挥学院、装甲兵工程学院、总参警卫局、北京云湖度假村、北京蟹岛饭店、北京长城饭店、北京饭店、北京王府井饭店、北京台湾饭店、北京齐鲁饭店、北京国际公馆、国家第二招待所、北京新世纪饭店、北京长富宫饭店、长安俱乐部、北清集团、北京热力集团、北京建工集团、北京奔驰大厦、北京人寿大厦、中国西门子大厦、中国新闻大厦、中国招商银行、中国民生银行、北京百老汇电影院、西单大悦城影院、博纳悠唐影院、新东安新世纪影院、金逸国际影城、朝阳剧场、耀莱国际、清华大学、北京大学、中国传媒大学、国防大学、中央党校、中央社会主义学院、中央民族大学、北京交通大学、海军总医院、空军总医院、解放军第二炮兵总医院、解放军第三零四医院、清华大学医院、武警总医院等国家机关、企事业单位成功完成了装饰服务。以人为本，简约实用的品质深受社会各界用户好评！</p>
                    <p>　　瑞诚纺织立足于"商之道，以诚为先"的服务理念，从不断开拓创新，不断完善自我做起，歇诚策划、定制优选方案，免费样品定制，我们一如既往的把高质量、低价位的产品和热情周到的服务与您共创美好明天！</p>
                </div>
            </div>
            <!--end 公司简介右侧内容-->
        </div>
    </div>
</div>
<!--end 内容信息-->
