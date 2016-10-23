<!--begin Banner展示-->
<div class="new_banner">
    <ul class="rslides f426x240 rslides1">
        <?php
        if(!empty($list)){
            $i = 1;
            foreach($list as &$buf){
              $class = "";
              $liId = "rslides1_s".$i-1;
              $style = "display: none; float: none; position: absolute; ";
              if($i===1){
                  $class = "rslides1_on";
                  $style = "display: block; float: left; position: relative; ";
              }
            ?>    
            <li style="<?php echo $style; ?> background: url('<?php echo $buf['cover']; ?>') center center no-repeat;" id="<?php echo $liId; ?>" class="<?php echo $class; ?>"><a href="/web/index/index"></a></li>
            <?php
            $i++;
            }            
        }
        ?>
        
<!--        <li style="display: block; float: left; position: relative; background: url(&quot;http://www.bjhtrc.com/uploadfile/2016/0615/20160615011801832.jpg&quot;) center center no-repeat;" id="rslides1_s0" class="rslides1_on"><a href="http://www.bjhtrc.com/"></a></li>
        <li style="display: none; float: none; position: absolute; background: url(&quot;http://www.bjhtrc.com/uploadfile/2016/0627/20160627060603955.jpg&quot;) center center no-repeat;" id="rslides1_s1" class=""><a href="http://www.bjhtrc.com/"></a></li>
        <li style="display: none; float: none; position: absolute; background: url(&quot;http://www.bjhtrc.com/uploadfile/2016/0627/20160627060615273.jpg&quot;) center center no-repeat;" id="rslides1_s2" class=""><a href="http://www.bjhtrc.com/"></a></li>-->
    </ul>
    <a href="javascript:" class="rslides_nav rslides1_nav prev">Previous</a><a href="javascript:" class="rslides_nav rslides1_nav next">Next</a><ul class="rslides_tabs rslides1_tabs"><li class="rslides_here"><a href="/web/index/index" class="rslides1_s1">1</a></li><li class=""><a href="/web/index/index" class="rslides1_s2">2</a></li><li class=""><a href="/web/index/index" class="rslides1_s3">3</a></li></ul>
</div>
<!--end Banner展示-->