$(function() {
    ManagerQuestion.initCountDown();
});


var ManagerQuestion = {
    /*
     *  绑定事件
     */
    initCountDown: function() {
    },
    

    
    /*
     *  获取详情
     */
    openReplyFrom: function(_this) {
        var id = $(_this).attr("dataId");
        $.ajax({
            type: "get",
            dataType: "html",
            url: 'update',
            data: {"id": id},
            success: function(data) {
                if (data != "") {
                    $("#myFromModal").html(data);
                    $('#myFromModal').modal('show');
                }
            }
        });
    },

    
    /*
     *  关闭窗口
     */    
    closeBidFrom: function() {
        $('#myFromModal').modal('hide');
    },
    
    
    /*
     *  提交信息
     */    
    submitReplyFrom: function() {
        var id = $("#id").val();
        var handle_remark = $("#reply_content").val();
        $.ajax({
            type: "post",
            dataType: "json",
            url: 'update-save',
            data: {"id": id, "reply_content": handle_remark},
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