  /**
   * JS倒计时效果
   * 
   */
  var countDown = function () {     
        var list = [],     
            dataId,   
            interval;     
        return function (id, time, _dataId ) {     
            if (!interval){
                interval = setInterval(go, 1000);
            }    
            list.push({ ele: document.getElementById(id), time: time, dataid: _dataId});     
        }         
        function go() {     
            for (var i = 0; i < list.length; i++) {     
                var data = getTimerString(list[i].time ? list[i].time -= 1 : 0);   
                list[i].ele.innerHTML = data;   
                if (!list[i].time){
                    $("#button_"+list[i].dataid).addClass("gray-color");
                    $("#button_"+list[i].dataid).attr("disabled", true); 
                    list.splice(i--, 1); 
                }     
            }     
        }     
    
        function getTimerString(time) {     
            d = Math.floor(time / 86400),     
            h = Math.floor((time % 86400) / 3600),   
            m = Math.floor(((time % 86400) % 3600) / 60),     
            s = Math.floor(((time % 86400) % 3600) % 60);  
            if(h <= 9){
                h = "0"+h;
            }
            if(m <= 9){
                m = "0"+m;
            }
            if(s <= 9){
                s = "0"+s;
            }
            if (time>0){
                return h + ":" + m + ":" + s;  
            }else{
                return "00:00:00";
            }     
        }     
    } (); 
    
    
    
  /**
   * JS倒计时效果 - 开始倒计时以后，要跳转到结束的到计时上面去
   * 
   */
      var countDown2 = function () {     
        var list = [],     
            dataId,   
            interval;     
        return function (id, time, _dataId, currentTime, startTime, endTime) {     
            if (!interval){
                interval = setInterval(go, 1000);
            }    
            list.push({ ele: document.getElementById(id), id:id, time:time, dataid: _dataId, currentTime:currentTime, startTime:startTime, endTime:endTime});     
        }         
        function go() {     
            for (var i = 0; i < list.length; i++) {     
                var data = getTimerString(list[i].time ? list[i].time -= 1 : 0);   
                list[i].ele.innerHTML = data;   
                if (!list[i].time){
                    //alert("list[i].time:"+list[i].time);
                    //alert("list[i].endTime:"+list[i].endTime);
                    $("#time_title_"+list[i].dataid).html("距离结束还有：");
                    var endTime = list[i].endTime;
                    var currentTime = new Date();
                    currentTime=currentTime.getTime();
                    var nodeId = list[i].id;
                    var value = (endTime - currentTime)/1000;
                    countDown(nodeId, value, dataId); 
                }     
            }     
        }     
    
        function getTimerString(time) {     
            d = Math.floor(time / 86400),     
            h = Math.floor((time % 86400) / 3600),   
            m = Math.floor(((time % 86400) % 3600) / 60),     
            s = Math.floor(((time % 86400) % 3600) % 60);  
            if(h <= 9){
                h = "0"+h;
            }
            if(m <= 9){
                m = "0"+m;
            }
            if(s <= 9){
                s = "0"+s;
            }
            if (time>0){
                return h + ":" + m + ":" + s;  
            }else{
                return "00:00:00";
            }     
        }     
    } (); 