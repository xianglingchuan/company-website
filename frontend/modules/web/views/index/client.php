<!--begin 顶部信息--> 
<div id="header">
   <?= frontend\modules\web\widgets\TopLogo::widget(); ?>
   <?= frontend\modules\web\widgets\TopNavigation::widget(); ?>
   <?= frontend\modules\web\widgets\TopBanner::widget(); ?>
</div>
<!--end 顶部信息-->   
        
        
        <!--begin 内容-->        
        <div id="main">
            <div class="container">
                <div class="w1 xq_plan1">
                    <div class="left_menu">
                        <div class="left_menu_t" style="height:113px;">
                            <h5>客户名录</h5>
                            <span>Customer list</span>
                        </div>
                        <ul>
                            <li class="dqlm"><span class="sj1"></span><a href="/web/index/client">客户名录</a></li></ul>
                        <?= frontend\modules\web\widgets\LeftAd::widget(); ?>
                    </div>
                    <script>
                        var subnavT = $(".zfd").offset().top;
                        $(window).scroll(function () {
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
                    <div class="fr xq_plan1_nr" id="dwei">
                        <div class="wz">
                            <span>客户名录</span>
                            <div class="fr">您现在所在的位置：<a href="/web/index/index">首页</a> &gt; <a href="/web/index/client">客户名录</a></div>
                        </div>
                        <div class="article" style="border-bottom:none;"><div data-webp-ctx-e="1" id="blogDetailDiv" style="font-size: 14px; color: rgb(0, 0, 0);">
                                <div class="blog_details_20120222">
                                    <div><strong><span style="font-size:16px;">中南海接待处　　国家国务院事物管理局　　国家安全局　　　　国家民用民航局　　　　国家食药监局</span></strong></div>
                                    <div><strong><span style="font-size:16px;">空军司令部　　　海军司令部　　　　　　　二炮后勤部　　　　二炮汽车营　　　　　　总参信息化部</span></strong></div>
                                    <div><strong><span style="font-size:16px;">国家外交部　　　德国大使馆　　　　　　　国家图书馆　　　　北京电视台　　　　　　航天三院</span></strong></div>
                                    <div><strong><span style="font-size:16px;">农工党中央　　　国家宗教局　　　　　　　北京市人民政府　　北京市东城区人民政府　总参四部</span></strong></div>
                                    <div><strong><span style="font-size:16px;">总装备部　　　　北京市公安局天安门分局　朝阳区看守所　　　朝阳区中级人民法院　　总参作战部</span></strong></div>
                                    <div>&nbsp;</div>
                                    <div>&nbsp;</div>
                                    <div><strong><span style="font-size:16px;">北京公馆公寓　　　北京金台饭店　　　金都假日饭店　　　总参招待所　　　　总参通信部招待所</span></strong></div>
                                    <div><strong><span style="font-size:16px;">深圳大厦　　　　　新闻大厦　　　　　海特饭店　　　　　国二招　　　　　　北京新世纪饭店</span></strong></div>
                                    <div><strong><span style="font-size:16px;">长富宫饭店　　　　长安俱乐部　　　　北京宾馆　　　　　牡丹宾馆　　　　　西苑饭店</span></strong></div>
                                    <div><strong><span style="font-size:16px;">北京饭店　　　　　总后招待所　　　　军需装备招待所　　海军第三招待所　　特种兵招待所</span></strong></div>
                                    <div><strong><span style="font-size:16px;">总参第三招待所　　北京国际饭店　　　北京天伦饭店　　　北京五棵松饭店　　昆泰酒店</span></strong></div>
                                    <div>&nbsp;</div>
                                    <div>&nbsp;</div>
                                    <div><strong><span style="font-size:16px;">北京二清环卫集团　　　北京电力集团　　　　北京热力集团　　　　中国庞大汽贸集团</span></strong></div>
                                    <div><strong><span style="font-size:16px;">北京建工集团　　　　　中国招商银行　　　　中国民生银行　　　　中国联通</span></strong></div>
                                    <div><strong><span style="font-size:16px;">中国建设银行　　　　　北京市建设局</span></strong></div>
                                    <div>&nbsp;</div>
                                    <div>&nbsp;</div>
                                    <div><strong><span style="font-size:16px;">北京百老汇国瑞城电影院　　　　北京百老汇　　　　　　博纳优唐国际影城</span></strong></div>
                                    <div><strong><span style="font-size:16px;">北京百老汇新世纪电影院　　　　西单大悦城电影院　　　新东安电影院</span></strong></div>
                                    <div><strong><span style="font-size:16px;">金逸国际影城朝阳剧场　　　　　美嘉电影院　　　　　　耀莱国际</span></strong></div>
                                    <div>&nbsp;</div>
                                    <div>&nbsp;</div>
                                    <div><strong><span style="font-size:16px;">清华大学附中　　　北京大学　　　中国传媒大学　　　对外经济贸易大学　　　北大附中</span></strong></div>
                                    <div><strong><span style="font-size:16px;">北京交通大学　　　外国语大学　　外国语附中　　　　中央社会主义学院　　　首师大附中</span></strong></div>
                                    <div><strong><span style="font-size:16px;">中央民族大学　　　北航大学　　　国防大学　　　　　北京第八十中学　　　 &nbsp;中国政法大学</span></strong></div>
                                    <div><strong><span style="font-size:16px;">中国劳动保障学院　玉渊潭中学　　北京第四中学　　　中央美术学院　　　　　中医药大学</span></strong></div>
                                    <div>&nbsp;</div>
                                    <div>&nbsp;</div>
                                    <div><strong><span style="font-size:16px;">海军总医院　　　　　304医院　　　　　　空军总医院　　　二炮总医院　　　中国中医眼科医院</span></strong></div>
                                    <div><strong><span style="font-size:16px;">安定医院　　　　　　石景山医院　　　　　清华大学医院　　东直门医院　　　武警总医院</span></strong></div>
                                    <div><strong><span style="font-size:16px;">北京大学国际医院　　朝阳区妇幼保健院　　同仁堂中医院　　平谷区人民医院　昌平区人民医院</span></strong></div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end 内容-->