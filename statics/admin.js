$('#sites_btn').click(function(){
    // $('div#category').hide();
    $('div.submenu div:not(#sites)').hide();
    $('div#sites').show();
    return false;
});

$('#category_btn').click(function(){
    $('div.submenu div:not(#category)').hide();
    $('div#category').show();
    return false;
});

$('#index_btn').click(function(){
    $('div.submenu div:not(#index)').hide();
    $('div#index').show();
    return false;
});

$('#cleantable_btn').click(function(){
    $('div.submenu div:not(#cleantable)').hide();
    $('div#cleantable').show();
    return false;
});

$('#status_btn').click(function(){
    $('div.submenu div:not(#status)').hide();
    $('div#status').show();
    return false;
});

$('#setting_btn').click(function(){
    $('div.submenu div:not(#setting)').hide();
    $('div#setting').show();
    return false;
});

$('#database_btn').click(function(){
    $('div.submenu div:not(#database)').hide();
    $('div#database').show();
    return false;
});

$('#logout_btn').click(function(){
    $('div.submenu div:not(#logout)').hide();
    $('div#logout').show();
    return false;
});

$('#addsite_btn').click(function(){
    $('div.submenu div:not(#addsite)').hide();
    $('div#addsite').show();
    return false;
});

//表单数据提交时，触发Ajax事件
$('#addsites_form').submit(function(){
    $.ajax({
    type: "POST",
    url : "http://just.com/CI_spider/index.php/admin/addsites",
    datatype: "json",
    data: $('#addsites_form').serialize(),
    error: function(){
        alert("Ajax 发生错误");
    },
    success: function(){
        alert("Ajax 请求成功");
    }
    });
    return false;
})
