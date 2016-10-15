$(function() {
    Question.initCountDown();
});


var Question = {
    /*
     *  绑定事件
     */
    initCountDown: function() {

    },
    

    /*
     *  回答问题
     */
    submitReply: function() {
        var reply_id = $("#reply_id").val();
        var content = $("#content").val();
        alert("reply_id:"+reply_id+", content:"+content);
        $.ajax({
            type: "post",
            dataType: "json",
            url: 'save-reply',
            data: {"reply_id": reply_id, "content": content},
            success: function(data) {
                alert(data.status.msg);
                if (data.status.ret == 1) {
                    location.reload();
                } else {

                }
            }
        });
    }
};