<!--begin 顶部信息--> 
<div id="header">
   <?= frontend\modules\web\widgets\TopLog::widget(); ?>
   <?= frontend\modules\web\widgets\TopNavigation::widget(); ?>
   <?= frontend\modules\web\widgets\TopBanner::widget(); ?>
</div>
<!--end 顶部信息-->   




<!--begin 内容-->
<div id="main">
    <div class="container">
        <div class="w1 xq_plan1">
            <!--begin 左侧内容-->
            <div class="left_menu">
                <div class="left_menu_t">
                    <h5>产品中心</h5>
                    <span>Product Center</span>
                </div>
                <ul>
                    <li class="dqlm"><span class="sj1"></span><a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=lists&amp;catid=11">椅套系列</a></li>
                    <li><span class="sj1"></span><a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=lists&amp;catid=12">桌布系列</a></li>
                    <li><span class="sj1"></span><a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=lists&amp;catid=13">窗帘系列</a></li>
                    <li><span class="sj1"></span><a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=lists&amp;catid=14">软包墙系列</a></li>
                </ul>
                <div id="menu2" class="zfd" style="position: absolute; top: 1148px;">
                    <div class="zbwx"><p><img src="style/img/ewm.jpg"></p><span>扫一扫，咨询我们</span></div>
                    <div class="zblx"><img src="style/img/dianh.jpg"></div>
                </div>
            </div>
            <!--end 左侧内容-->
            <script>
                var subnavT = $(".zfd").offset().top;
                $(window).scroll(function() {
                    var scrollH = $(window).scrollTop();
                    var contentH = $("#dwei").height() - $(".zfd").height();
                    if (scrollH > subnavT && scrollH < contentH + subnavT - 300) {
                        $(".zfd").stop().css({
                            "position": "absolute",
                            "top": scrollH - subnavT + 370 + "px"
                        });
                    } else if (scrollH < subnavT) {
                        $(".zfd").stop().css({
                            "position": "static",
                        });
                    }
                });
            </script>

            <!--begin 右侧内容-->
            <div class="fr xq_plan1_nr" id="dwei">
                <div class="wz">
                    <span>椅套系列</span>
                    <div class="fr">您现在所在的位置：<a href="http://www.bjhtrc.com/">首页</a> &gt; <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=lists&amp;catid=6">产品中心</a> &gt; <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=lists&amp;catid=11">椅套系列</a></div>
                </div>
                <div class="title4">
                    酒店椅套速购区                    <span>版权所有：北京华泰瑞诚纺织品有限公司　　发表时间：2016.6.6</span>
                </div>
                <div class="article"><h2 style="text-align: center;">【正品600涤环保经典提花系列、超值速购！】</h2>
                    <div style="text-align: center;"><img src="style/img/20160621111955349.jpg" style="width: 50%;"><img src="style/img/20160621111955805.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621111956310.jpg" style="width: 50%;"><img src="style/img/20160621111956509.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621111956981.jpg" style="width: 50%;"><img src="style/img/20160621111957791.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621111957285.jpg" style="width: 50%;"><img src="style/img/20160621111958157.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621111958442.jpg" style="width: 50%;"><img src="style/img/20160621111958434.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112148838.jpg" style="width: 50%;"><img src="style/img/20160621112149666.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112149613.jpg" style="width: 50%;"><img src="style/img/20160621112150497.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112150812.jpg" style="width: 50%;"><img src="style/img/20160621112150780.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112151161.jpg" style="width: 50%;"><img src="style/img/20160621112151935.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112152991.jpg" style="width: 50%;"><img src="style/img/20160621112152958.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112219163.jpg" style="width: 50%;"><img src="style/img/20160621112219599.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112219107.jpg" style="width: 50%;"><img src="style/img/20160621112220866.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112220157.jpg" style="width: 50%;"><img src="style/img/20160621112221473.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112221930.jpg" style="width: 50%;"><img src="style/img/20160621112222463.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112223470.jpg" style="width: 50%;"><img src="style/img/20160621112223589.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112239834.jpg" style="width: 50%;"><img src="style/img/20160621112239978.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112239375.jpg" style="width: 50%;"><img src="style/img/20160621112240414.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112240592.jpg" style="width: 50%;"><img src="style/img/20160621112241924.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112241725.jpg" style="width: 50%;"><img src="style/img/20160621112242965.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112242861.jpg" style="width: 50%;"><img src="style/img/20160621112242659.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112302105.jpg" style="width: 50%;"><img src="style/img/20160621112303779.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112303664.jpg" style="width: 50%;"><img src="style/img/20160621112304394.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112304154.jpg" style="width: 50%;"><img src="style/img/20160621112304265.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112305137.jpg" style="width: 50%;"><img src="style/img/20160621112305630.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112306765.jpg" style="width: 50%;"><img src="style/img/20160621112306770.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112323767.jpg" style="width: 50%;"><img src="style/img/20160621112323686.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112324493.jpg" style="width: 50%;"><img src="style/img/20160621112324537.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112325393.jpg" style="width: 50%;"><img src="style/img/20160621112325905.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112326222.jpg" style="width: 50%;"><img src="style/img/20160621112326933.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112621302.jpg" width="100%"><br>
                        <img src="style/img/20160621112622290.jpg" width="100%"><br>
                        <img src="style/img/20160621112622337.jpg" width="100%"><br>
                        <img src="style/img/20160621112623433.jpg" width="100%"><br>
                        <img src="style/img/20160621112623873.jpg" width="100%"><br>
                        <img src="style/img/20160621112624195.jpg" width="100%"><br>
                        <img src="style/img/20160621112624989.jpg" width="100%"><br>
                        <img src="style/img/20160621112625562.jpg" width="100%"><br>
                        <img src="style/img/20160621112625783.jpg" width="100%"><br>
                        <img src="style/img/20160621112626253.jpg" width="100%"><br>
                        <img src="style/img/20160621112655471.jpg" width="100%"><br>
                        <img src="style/img/20160621112655969.jpg" width="100%"><br>
                        <img src="style/img/20160621112656887.jpg" width="100%"><br>
                        <img src="style/img/20160621112657508.jpg" width="100%"><br>
                        <img src="style/img/20160621112658402.jpg" width="100%"><br>
                        <img src="style/img/20160621112658588.jpg" width="100%"></div>
                    <h2 style="text-align: center;">【新款加厚弹力椅套】</h2>
                    <div style="text-align: center;"><img src="style/img/20160621112732584.jpg" style="width: 100%;"><br>
                        <img src="style/img/20160621112733429.jpg" style="width: 100%;"><br>
                        <img src="style/img/20160621112733661.jpg" style="width: 50%;"><img src="style/img/20160621112734892.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112734685.jpg" style="width: 50%;"><img src="style/img/20160621112735668.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621112735772.jpg" style="width: 100%;"><br>
                        <img src="style/img/20160621112735467.jpg" style="width: 100%;"><br>
                        <h2 style="text-align: center;">【弹力装饰带】</h2>
                        <img src="style/img/20160621112736706.jpg" style="width: 50%;"><img src="style/img/20160621112736404.jpg" style="width: 50%;"><br>
                        <img src="style/img/20160621113405297.jpg" style="width: 50%;"><img src="style/img/20160621113405116.jpg" style="width: 50%;"></div>
                    <h2 style="text-align: center;">【现场案例】</h2>
                    <div style="text-align: center;"><img src="style/img/20160621113510964.jpg" width="100%"><br>
                        <img src="style/img/20160621113511150.jpg" width="100%"><br>
                        <img src="style/img/20160621113511588.jpg" width="100%"><br>
                        <img src="style/img/20160621113513472.jpg" width="100%"><br>
                        <img src="style/img/20160621113520290.jpg" width="100%"><br>
                        <img src="style/img/20160621113627456.jpg" width="100%"><br>
                        <img src="style/img/20160621113628749.jpg" width="100%"><br>
                        <img src="style/img/20160621113629820.jpg" width="100%"><br>
                        <img src="style/img/20160621113629198.jpg" width="100%"><br>
                        <img src="style/img/20160621113630577.jpg" width="100%"><br>
                        <img src="style/img/20160621113631797.jpg" width="100%"><br>
                        <img src="style/img/20160621113631425.jpg" width="100%"><br>
                        <img src="style/img/20160621113632733.jpg" width="100%"><br>
                        <img src="style/img/20160621113632722.jpg" width="100%"></div>
                    <h2 style="text-align: center;">精品，出自精良工艺和严格管理！</h2>
                    <div style="text-align: center;"><img src="style/img/20160621113730138.jpg" width="100%"></div>
                    <div style="text-align: center;"><img src="style/img/20160621113730904.jpg" width="100%"></div>
                    <h2 style="text-align: center;">椅子测量方法</h2>
                    <div style="text-align: center;"><img src="style/img/20160621113801547.jpg" width="100%"><br>
                        <img src="style/img/20160621113801607.jpg" width="100%"><br>
                        <img src="style/img/20160621113802714.jpg" width="100%"><br>
                        <img src="style/img/20160621113802670.jpg" width="100%"><br>
                        <img src="style/img/20160621113803843.jpg" width="100%"></div>
                    <h2 style="text-align: center;"><span style="float:left; width:100%; text-align:center;">布料库房一角</span></h2>
                    <div style="text-align: center;"><img src="style/img/20160620051610340.jpg" style="float: left; width: 45%;"> <img src="style/img/20160620051710331.jpg" style="width: 54%;"></div>
                    <h2 style="text-align: center;"><span style="float:left; width:54%; text-align:center;">成品库房</span><span style=" float:right; width:46%; text-align:center;">待发货</span></h2>
                    <img src="style/img/20160620051738796.jpg" style="float: left; width: 54%;"> <img src="style/img/20160620051816331.jpg" style="width: 46%;">
                    <h2 style="text-align: center;">全国发货</h2>
                    <p style="text-align: center;"><img src="style/img/20160621013428879.jpg" width="100%"></p>
                    <h2>【酒店椅套】</h2>
                    <p>　　酒店座椅由于公众承坐换位频繁，使用流量大等原因，座椅容易污损不易清洗修复，酒店椅套是酒店布草重要组成部分，及保护座椅又美观雅致，订制一款美观实用的酒店椅套是必然的选择！</p>
                    <p>　　北京华泰瑞诚纺织品有限公司具有20年的酒店椅套设计制作经验，专业师傅流水作业，高要求精工制作。酒店椅套面料丰富、设计简约时尚、舒适、美观、绿色环保，精心为您呈现高品味的酒店椅套！</p>
                    <p>【华泰瑞诚酒店椅套质量执行标准】</p>
                    <p>1、产品特点：酒店椅套经济性强、拆装简便、经久耐用、容易打理、装饰性强，根据不同的酒店宴会主题，设计不同的款式造型，营造出不同的氛围，根据主题定制，提升酒店服务价值！</p>
                    <p>2、布料选择性强：椅套面料多样，如纯棉、麻、真丝、等天然纤维织物；混纺、涤纶、植绒、防辐射面料等合成纤维织物。为客户提供优质进口面料，进口面料多具有手感舒适、垂感好、不变形、不褪色、不缩水等特点。国产面料具有性价比高、设计造型前卫时尚、面料类型日趋多样化等特点，正品环保面料是定制高端椅套的关键！</p>
                    <p>3、产品工艺：根据座椅量体定制，裙摆自然大方，垂感性强、不易起皱，布面绗接处外压双线，内侧四线包缝机密线包缝，整体选用"广东金三鱼"品牌高强韧线细针距扎制绗接。布面平整，紧固结实，面料为符合国家合格标准的环保精纺材料，具有色牢度高、耐高温、易清洗、抗菌抗老化、耐磨质感舒适等特点。</p>
                    <p>4、阻然：通过建筑材料质量监督检验中心检测，符合公安部最新发布GB20286-2006（公共场所阻燃制品要求）标准。出具北京市消防局国家B1级纺织品阻燃检测报告。（阻燃为客户附加要求定制）</p>
                    <p>5、椅套布抗菌率：24小时减杀率，黄色葡萄球减杀100%，大肠杆菌100%，白色念珠菌减杀100%。</p>
                    <p>6、椅套布洗后缩水率：<br>
                        FZ1772004.2-2000：直向-0.7%，横向-0.8%；CNS8038A法：径向0，纬向0。</p>
                    <p>7、椅套布耐洗染色牢度：<br>
                        GB173921.3-1997（纺织品色牢度实验耐洗色牢度：实验3），变色4级，涤占色4级，棉占色4-5级。<br>
                        CCNS1494A2法，变褪色5级，污染4-5级。</p>
                    <p>8、椅套布破裂强度：<br>
                        F2/T72004.2-2000:顶破强力：775N<br>
                        CNS12915涤式法，20.9Kgf/cm，椅套布抗拉强力(CXIS12915涤式法)，径向46.8kgf/5m,纬向127kgf/5cM</p>
                </div>
                <div class="syp fl">
                    <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=11&amp;id=16">上一篇：弹力椅套</a>
                    <a href="http://www.bjhtrc.com/index.php?m=content&amp;c=index&amp;a=show&amp;catid=11&amp;id=14">下一篇：酒店椅套定制区</a>
                </div>
                <div class="fx fr">
                    <!-- JiaThis Button BEGIN -->
                    <div class="jiathis_style"><span class="jiathis_txt">分享到：</span>
                        <a class="jiathis_button_qzone" title="分享到QQ空间"><span class="jiathis_txt jtico jtico_qzone"></span></a>
                        <a class="jiathis_button_tsina" title="分享到微博"><span class="jiathis_txt jtico jtico_tsina"></span></a>
                        <a class="jiathis_button_tqq" title="分享到腾讯微博"><span class="jiathis_txt jtico jtico_tqq"></span></a>
                        <a class="jiathis_button_renren" title="分享到人人网"><span class="jiathis_txt jtico jtico_renren"></span></a>
                        <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank"></a>
                        <a class="jiathis_counter_style"><span class="jiathis_button_expanded jiathis_counter jiathis_bubble_style" id="jiathis_counter_26" title="累计分享0次">0</span></a>
                    </div>
                    <script type="text/javascript">
                        var jiathis_config = {
                            summary: "",
                            shortUrl: false,
                            hideMore: false
                        }
                    </script>
                    <script type="text/javascript" src="style/img/jia.js" charset="utf-8"></script><script type="text/javascript" src="style/img/plugin.client.js" charset="utf-8"></script>
                    <!-- JiaThis Button END -->
                </div>
                <div class="fhsy"><a href="http://www.bjhtrc.com/">返回首页</a></div>
            </div>
            <!--end 右侧内容-->
        </div>
    </div>
</div>
<!--end 内容-->

