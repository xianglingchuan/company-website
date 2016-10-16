<ul>
    <?php
    if(!empty($list)){
        foreach($list as &$buf){
           $styleClass = intval($buf['id'])==intval(Yii::$app->request->get('category_id')) ? "dqlm" : ""; 
        ?>
            <li class="<?php echo $styleClass; ?>"><span class="sj1"></span><a href="/web/news/index?category_id=<?php echo $buf['id'];?>"><?php echo $buf['name']; ?></a></li>     
       <?php 
        }
    }
    ?>
</ul>