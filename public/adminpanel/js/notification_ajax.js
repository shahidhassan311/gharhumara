$("#notification").click(function () {
    var nt = $("#noti");
    $.ajax({
        url: 'http://gharhumara.com/notification_ajax',
        method: 'GET',
        success: function (data) {
            data.forEach(function (result) {
                nt.append("<a class='list-group-item' href="+result.notification_url+" style='height: 55px;'><div class='list-group-status status-online'></div><img src='http://gharhumara.com/adminpanel/logo.png' style='background-color: #1caf9a;' class='pull-left'/><span class='contacts-title'>" + result.name + "</span><br/><span class='pull-right'>" + result.created_at + "</span></a>");
            });
        }
    });
});



