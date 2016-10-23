<!--全屏滚动-->
<div class="banner">
  <div class="b-img">
      
        <?php
        if(!empty($list)){
            foreach($list as &$buf){
            ?>    
            <a href="#" style="background:url('<?php echo $buf['cover']; ?>') center no-repeat;"></a>
            <?php
            }            
        }
        ?>
            
            
<!--  <a href="#" style="background:url('http://www.bjhtrc.com/uploadfile/2016/0615/20160615011801832.jpg') center no-repeat;"></a>
  <a href="#" style="background:url('http://www.bjhtrc.com/uploadfile/2016/0627/20160627060603955.jpg') center no-repeat;"></a>
  <a href="#" style="background:url('http://www.bjhtrc.com/uploadfile/2016/0627/20160627060615273.jpg') center no-repeat;"></a>-->
  </div>
  <div class="b-list"></div>
  <a class="bar-left" href="#"><em></em></a><a class="bar-right" href="#"><em></em></a> </div>
<!--end 全屏滚动-->