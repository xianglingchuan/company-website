  $(function(){
      BidBeat.initCountDown();
      BidBeat.initClickView();
  });
  
  
  var BidBeat = {
      
      /*
       *  使用倒计时
       */
      initCountDown:function(){
        $("#content .user-info .count-down-info").each(function(){
            var currentTime = $(this).attr("currentTime");
            var startTime = $(this).attr("startTime");
            var endTime = $(this).attr("endTime");
            var dataId =  $(this).attr("dataId");
            var nodeId =  $(this).attr("nodeId");
            //alert("currentTime:"+currentTime+", startTime:"+startTime+", endTime:"+endTime+", dataId:"+dataId+", nodeId:"+nodeId);
            
            currentTime=new Date(currentTime);
            currentTime=currentTime.getTime();    
            startTime=new Date(startTime);
            startTime=startTime.getTime();    
            endTime=new Date(endTime);
            endTime=endTime.getTime();    
            
            //如果当前时间小于开始时间那么应该距离开始的倒计时
            if(currentTime < startTime){
                 var value = (startTime - currentTime)/1000;
                 countDown2(nodeId, value, dataId, currentTime,startTime, endTime); 
            //如果当前时间大于开始时间并且小于结束时间那么开始结束倒计时    
            }else if (currentTime > startTime && currentTime < endTime){
                var value = (endTime - currentTime)/1000;
                countDown(nodeId, value, dataId); 
            }else{
                
            }
        });
        
        /*
         *  我要出价按钮事件
         */
        $("#content .user-info .submit-price .btn").each(function(){
             $(this).click(function(){
                 BidBeat.clickBidFrom(this);
             });
        });
      },
      
      
      /*
       *  获取详情
       */
      initClickView:function(){
            $("#content  .user-info .base-info").click(function(){
                BidBeat.clickView(this);
            });
      },
      
      clickView:function(_this){
            var id = $(_this).attr("dataId");
            $.ajax({
                   type: "get",
                   dataType: "html",
                   url: 'view',
                   data: {"id":id},
                   success: function (data) {
                       if(data!=""){
                            $("#myModal").html(data);
                            $('#myModal').modal('show');                           
                       }
                   }
               });
      },
      
      
      
      
      /*
       *  获取详情
       */
      initClickBidForm:function(){
            $(".row  .user-info .base-info").click(function(){
                BidBeat.clickView(this);
            });
            $(".row  .user-info .user-price-info").click(function(){
                BidBeat.clickView(this);
            });
      },
 
      
      clickBidFrom:function(_this){
            var id = $(_this).attr("dataId");
            $.ajax({
                   type: "get",
                   dataType: "html",
                   url: 'bid-form',
                   data: {"id":id},
                   success: function (data) {
                       if(data!=""){
                            $("#myFromModal").html(data);
                            $('#myFromModal').modal('show');                           
                       }
                   }
            });
      },
      
      
      closeBidFrom:function(){
          $('#myFromModal').modal('hide');        
      },

      
      submitBidFrom:function(){
          var price = $("#price").val();
          var id = $("#id").val();
          var auction_confirm_price = $("#auction_confirm_price").val();
          var auction_lowest_price = $("#auction_lowest_price").val();
          $.ajax({
                   type: "post",
                   dataType: "json",
                   url: 'bid-submit',
                   data: {"id":id, "price":price, "auction_confirm_price":auction_confirm_price, "auction_lowest_price":auction_lowest_price},
                   success: function (data) {
                       alert(data.status.msg);
                       if(data.status.ret == 1){
                           $('#myFromModal').modal('hide'); 
                       }else{
                           
                       }
                   }
          });          
      },
      
      
      bidFromButton:function(_this){         
          BidBeat.clickBidFrom(_this);
          $('#myModal').modal('hide');  
      },
      
      
  };