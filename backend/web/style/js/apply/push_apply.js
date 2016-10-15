$(function() {
    PushApply.initCountDown();
});


var PushApply = {
    /*
     *  绑定事件
     */
    initCountDown: function() {

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
    },
    
    /*
     *  获取详情
     */
    clickView:function(_this){
        var id = $(_this).attr("dataId");
        $.ajax({
            type: "get",
            dataType: "html",
            url: 'view',
            data: {"id": id},
            success: function(data) {
                if (data != "") {
                    $("#myViewModal").html(data);
                    $('#myViewModal').modal('show');
                }
            }
        })
    },
    
};