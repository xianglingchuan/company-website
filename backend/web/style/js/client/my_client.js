$(function() {
    MyClient.initCountDown();
});


var MyClient = {
    /*
     *  绑定事件
     */
    initCountDown: function() {

    },
    
    
    /*
     *  处理事件
     */
    clickBidFrom: function(_this) {
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
        var relation_id = $("#relation_id").val();
        var handle_state = $("#handle_state").val();
        var handle_remark = $("#handle_remark").val();
        //alert("relation_id:" + relation_id + ", handle_state:" + handle_state + ", handle_remark:" + handle_remark);
        $.ajax({
            type: "post",
            dataType: "json",
            url: 'save-handle',
            data: {"relation_id": relation_id, "handle_state": handle_state, "handle_remark": handle_remark},
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
     *  详情事件
     */
    clickClientFrom: function(_this) {
        var id = $(_this).attr("dataId");
        $.ajax({
            type: "get",
            dataType: "html",
            url: 'view',
            data: {"id": id},
            success: function(data) {
                if (data != "") {
                    $("#myViewFromModal").html(data);
                    $('#myViewFromModal').modal('show');
                }
            }
        });
    },
    
    
};