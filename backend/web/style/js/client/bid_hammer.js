  $(function(){
      BidHammer.initCountDown();
      BidHammer.initClickView();
  });
  
  
  var BidHammer = {
      
      /*
       *  使用倒计时
       */
      initCountDown:function(){
        $(".row .user-info .count-down-info").each(function(){
            var startTime = $(this).attr("starttime");
            var endTime = $(this).attr("endtime");
            var nodeid = $(this).attr("nodeid");
            var dataId =  $(this).attr("dataid");
            startTime=new Date(startTime);//开始的时间
            startTime=startTime.getTime();
            endTime=new Date(endTime);//结束的时间
            endTime=endTime.getTime();    
            var value = (endTime - startTime)/1000;
            countDown(nodeid, value, dataId); 
        });
        
        $(".row .user-info .submit-price .btn").each(function(){
             $(this).click(function(){
                 BidHammer.clickBidFrom(this);
             });
        });
      },
      
      
      /*
       *  获取详情
       */
      initClickView:function(){
            $(".row  .user-info .base-info").click(function(){
                BidHammer.clickView(this);
            });
            $(".row  .user-info .user-price-info").click(function(){
                BidHammer.clickView(this);
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
          var ensure_initial_price = $("#ensure_initial_price").val();
          var ensure_end_price = $("#ensure_end_price").val();
          //alert("id:"+id+", price:"+price+", ensure_initial_price:"+ensure_initial_price+", ensure_end_price:"+ensure_end_price);
          $.ajax({
                   type: "post",
                   dataType: "json",
                   url: 'bid-submit',
                   data: {"id":id, "price":price, "ensure_initial_price":ensure_initial_price, "ensure_end_price":ensure_end_price},
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
          BidHammer.clickBidFrom(_this);
          $('#myModal').modal('hide');  
      },
      
  };