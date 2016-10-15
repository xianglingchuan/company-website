$(function() {
    AccountRecharge.initCountDown();
});


var AccountRecharge = {
    /*
     *  绑定事件
     */
    initCountDown: function() {
        $(".s-choice .redio").click(function(){
            AccountRecharge.changeWay(this);
        });

    },
    
    
    /*
     *  付款方式切换
     */
    changeWay:function(_this){
        var value = $(_this).val();
        if(value== 1){
            $("#bank_name_div").addClass("hidden");
            $("#bank_account_div").addClass("hidden");
            $("#alipay_div").removeClass("hidden");   
        }else if(value == 5){
            $("#bank_name_div").removeClass("hidden");
            $("#bank_account_div").removeClass("hidden");
            $("#alipay_div").addClass("hidden");
        }
    },
    
    /*
     *  获取详情
     */
    clickBidFrom: function(_this) {
        var id = $(_this).attr("dataId");
        var id = $(_this).attr("dataId");
        $.ajax({
            type: "get",
            dataType: "html",
            url: 'handle-form',
            data: {"id": id},
            success: function(data) {
                if (data != "") {
                    $("#myFromModal").html(data);
                    $('#myFromModal').modal('show');
                }
            }
        });


    },
    closeBidFrom: function() {
        $('#myFromModal').modal('hide');
    },
    submitFrom: function() {
        var apply_id = $("#apply_id").val();
        var handle_state = $("#handle_state").val();
        var handle_remark = $("#handle_remark").val();
        alert("apply_id:" + apply_id + ", handle_state:" + handle_state + ", handle_remark:" + handle_remark);
        $.ajax({
            type: "post",
            dataType: "json",
            url: 'save-handle',
            data: {"apply_id": apply_id, "handle_state": handle_state, "handle_remark": handle_remark},
            success: function(data) {
                alert(data.status.msg);
                if (data.status.ret == 1) {
                    $('#myFromModal').modal('hide');
                } else {

                }
            }
        });
    }
};