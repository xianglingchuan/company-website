<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    //上传目录根路径
    'uploadPath' => 'assets/upload/',
    //发送短信用户名
    'sendSMSAccount' => 'cf_toys178',
    //发送短信密码
    'sendSMSPassword' => 'cftoys178',
    //发送短信接口地址
    'sendSMSUrl' => 'http://106.ihuyi.cn/webservice/sms.php?method=Submit',   
    
    //用户头像缩略尺寸
    'user.head.thumbnail.size' => [[200,200],[240,240],[130,130]],
    //妈咪礼物图片缩略尺寸
    'gift.cover.thumbnail.size' => [[270,270]],
    //系统宝宝愿望图片缩略尺寸
    'wish.cover.thumbnail.size' => [[250,250]],
    //勋章图片缩略尺寸
    'medal.icon.thumbnail.size' => [[100,100], [200,200]],
    //任务图标缩略尺寸
    'task.icon.thumbnail.size' => [[200,200]],
    //任务块图片缩略尺寸
    'task.block.icon.thumbnail.size' => [[330,330]],
    //用户上传图片缩略尺寸
    'user.images.path.thumbnail.size' => [[260,260], [200,200], [240,240]],
    //音频资源的域名地址
    'music_domain' => 'http://bank.music.snaillove.com',    
];
