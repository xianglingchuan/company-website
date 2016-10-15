  $(function(){
      MyBid.initCountDown();
  });
  
  
  var MyBid = {
      
      /*
       *  使用倒计时
       */
      initCountDown:function(){
        /*
         *  我要出价按钮事件
         */
//        $("#content .user-info .submit-price .btn").each(function(){
//             $(this).click(function(){
//                 BidBeat.clickBidFrom(this);
//             });
//        });
      },
      
      
      /*
       *  获取详情
       */
      clickBidFrom:function(_this){
            var id = $(_this).attr("dataId");
            $.ajax({
                   type: "get",
                   dataType: "html",
                   url: 'view',
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
      }
  };