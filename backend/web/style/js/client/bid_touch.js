  $(function(){
      BidTouch.initCountDown();
      BidTouch.initClickView();
  });
  
  
  var BidTouch = {
      
      /*
       *  购买事件绑定
       */
      initCountDown:function(){
        $(".row .x_cus_left .buy").each(function(){
             $(this).click(function(){
                    var price = $(this).attr("price");
                    if(window.confirm('您确认'+price+'元购买吗?')){
                       BidTouch.submitBidFrom(this);
                    }else{
                       return false;
                    }
             });
        });
        $(".row .x_cus_left .buy_alone").each(function(){
             $(this).click(function(){
                    var price = $(this).attr("price");
                    if(window.confirm('您确认'+price+'元独享购买吗?')){
                       BidTouch.submitBidFrom(this);
                    }else{
                       return false;
                    }
             });
        });
      },
      
      
      /*
       *  获取详情
       */
      initClickView:function(){
            $(".row  .x_cus_left .x_cus_conleft").click(function(){
                BidTouch.clickView(this);
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
      
      
      submitBidFrom:function(_this){
          var price = $(_this).attr("price");
          var id = $(_this).attr("dataId");
          $.ajax({
                   type: "post",
                   dataType: "json",
                   url: 'bid-submit',
                   data: {"id":id, "price":price},
                   success: function (data) {
                       alert(data.status.msg);
                       if(data.status.ret == 1){
                           $('#myModal').modal('hide'); 
                       }else{
                           
                       }
                   }
          });          
      },
      
      
      /*
       *  详情界面购买
       */
      buyApply:function(_this){
          var price = $(_this).attr("price");
          var pay_type = $(_this).attr("pay_type");
          var title = "";
          if(pay_type == "pay"){
              title = '您确认'+price+'元购买吗?';
          }else{
              title = '您确认'+price+'元独享购买吗?';
          }
          if(window.confirm(title)){
                BidTouch.submitBidFrom(_this);
          }else{
                return false;
          }
      }      
  };