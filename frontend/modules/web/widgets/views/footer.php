<div id="footer">
    <div class="w1">
        <div class="fl">
            <div class="banquan">
                版权所有： © <?php echo Yii::$app->setting->get('siteName'); ?><br>
                联系电话：<?php echo $viewData['contactTel']; ?>　手机：<?php echo $viewData['contactPhone']; ?><br>
                邮箱：<?php echo $viewData['contactEmail']; ?><br>
                地址：<?php echo $viewData['contactAddressOne']; ?><br>
                <?php 
                if(!empty($viewData['contactAddressTwo'])){
                    echo "地址：".$viewData['contactAddressTwo'];
                }
                if(!empty($viewData['contactAddressThree'])){
                    echo "地址：".$viewData['contactAddressThree'];
                }
                ?>                                      
            </div>
            <div class="ftb">
                <span><img src="/style/web/img/ftb1.jpg"><label>经营性网站<br>备案信息</label></span>
                <span><img src="/style/web/img/ftb2.jpg"><label>中国<br>互联网协会</label></span>
                <span><img src="/style/web/img/ftb3.jpg"><label>网警110<br>报警服务</label></span>
                <span><img src="/style/web/img/ftb4.jpg"><label>不良信息<br>举报中心</label></span>
                <span><img src="/style/web/img/ftb5.jpg"><label>诚信网站<br>示范企业</label></span>
            </div>
        </div>
        <div class="fr">
            <div class="fr ewm">
                <img src="<?php echo $model->getImgPath(Yii::$app->setting->get('siteQrCode')); ?>">
                扫一扫，咨询我们
            </div>
        </div>
    </div>
</div>