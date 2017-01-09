$("#newsletter").submit(function () {
    if ($("#email").val() != "") {
        $('<div class="ajax-form-alert alert heading fade in text-center colors-b background-95 border">	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Thank you for registering and subscribing SMOK official mailing lists, we will immediately provide you with the latest information about our products and services.</div>').appendTo('body');
    } else {
        //alert("Please enter your email address !")
        $('<div class="ajax-form-alert alert heading fade in text-center colors-b background-95 border">	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Please enter your email address.</div>').appendTo('body');
    }

});
// Thank you for registering and subscribing SMOK official mailing lists, we will immediately provide you with the latest information about our products and services.
function GetAlbumTypeList() {
    var htmlSection = '<li><a class="btn" data-group="all" href="#">All</a></li>';
    $.ajax({
        cache: false,
        type: "get",
        url: "/api/albumtype/list",
        async: false,
        error: function (request) {
            console.error(request); alert("服务端错误");
        },
        success: function (data) {
            if (data.success) {
                $.each(data.data, function (key, value) {
                    htmlSection += '<li><a class="btn" data-group="' + value.AlbumTypeName + '" href="#">' + value.AlbumTypeName + '</a></li>'
                })
            }
        }
    })
    $('#album_type_list').html(htmlSection)
};
function GetAlbumList(id, typeId) {
    var htmlSection = '';
    //var lastId = 0;
    $.ajax({
        cache: false,
        type: "get",
        url: "/api/album/pagelist",
        data: { id: id, typeId: typeId },
        async: false,
        error: function (request) {
            console.error(request); alert("服务端错误");
        },
        success: function (data) {
            if (data.success) {
                console.log(data)
                //lastId = data.data[data.data.length - 1].AlbumId;
                $.each(data.data, function (key, value) {
                    htmlSection += '<div class="item col-md-3 col-sm-4 col-xs-6  shuffle-item filtered on"  data-groups=\'[' + value.AlbumTag + ']\'>' +
                        '<a href="#!/web/portfolio-item.aspx?id=' + value.AlbumId + '" class="hover-overlay">' +
                        '<img alt="Project 1" src="' + value.AlbumCover + '" />' +
                        '<div class="overlay background-90-e">' +
                        '<div class="hidden-xs">' +
                        '<p class="title heading-e">' + value.AlbumName + '</p>' +
                        '<p class="text-center heading-e"><strong>' + value.AlbumDescribe + '</strong></p>' +
                        '<p class="text-center"><i class="fa fa-th heading-e"></i></p></div></div></a></div>';
                })

            }
        }
    })
    $('#album_list').html(htmlSection);
    //$(htmlSection).appendTo($('#album_list'));
    //return lastId;
};
//点赞
$(document).on('click', '.like', function () {
    var $this = $(this);
    var id = $this.data("eleId");
    var like = Number($this.children("em").data("eleLike"));
    alert
    var photoCookie = $.cookie('photo' + id);
    if (photoCookie == null || photoCookie == "false") {
        $.ajax({
            cache: false,
            type: "get",
            url: "/api/photo/like",
            data: { id: id },
            async: false,
            error: function (request) {
                console.error(request); alert("服务端错误");
            },
            success: function (data) {
                if (data.success) {
                    console.log(data);
                    $.cookie('photo' + id, 'true', { expires: 30 });
                    $this.html('<i class="fa fa-heart"></i> <em data-ele-like=" ' + (like + 1) + '"> ' + (like + 1) + '</em>');
                }
            }
        })
    } else {
        $.ajax({
            cache: false,
            type: "get",
            url: "/api/photo/unlike",
            data: { id: id },
            async: false,
            error: function (request) {
                console.error(request); alert("服务端错误");
            },
            success: function (data) {
                if (data.success) {
                    console.log(data);
                    $.cookie('photo' + id, 'false', { expires: 30 });
                    $this.html('<i class="fa fa-heart-o"></i> <em data-ele-like=" ' + (like - 1) + '"> ' + (like - 1) + '</em>');
                }
            }
        })
    }

});

function AlbumPageCut(id) {
    var length = 0;
    $.ajax({
        cache: false,
        type: "get",
        url: "/api/album/pagecount",
        async: false,
        error: function (request) {
            console.error(request); alert("服务端错误");
        },
        success: function (data) {
            if (data.success) {
                length = data.data;
            }
        }
    });

    var html = '<ul class="pagination">';
    var now = '<li class="active"><a href="/lifewithsmok/' + id + '" >' + id + '</a></li>';
    var more = '<li><a href="#">......</a></li>'
    var prev = '<li><a href="/lifewithsmok/' + (id - 1) + '">上一页</a></li>'
    var next = '<li><a href="/lifewithsmok/' + (id + 1) + '">下一页</a></li>'
    var left = '<li><a href="/lifewithsmok/' + (id - 3) + '">' + (id - 3) + '</a></li>' + '<li><a href="/lifewithsmok/' + (id - 2) + '">' + (id - 2) + '</a></li>' + '<li><a href="/lifewithsmok/' + (id - 1) + '">' + (id - 1) + '</a></li>';
    var right = '<li><a href="/lifewithsmok/' + (id + 1) + '">' + (id + 1) + '</a></li>' + '<li><a href="/lifewithsmok/' + (id + 2) + '">' + (id + 2) + '</a></li>' + '<li><a href="/lifewithsmok/' + (id + 3) + '">' + (id + 3) + '</a></li>';
    if (id > 7) {
        switch (id) {
            case 1:
                html += now;
                html += right;
                html += next;
                break;
            case 2:
                html += prev;
                html += '<li><a href="/lifewithsmok/' + (id - 1) + '">' + (id - 1) + '</a></li>';
                html += now;
                html += right;
                html += next;
                break;
            case 3:
                html += prev;
                html += '<li><a href="/lifewithsmok/' + (id - 2) + '">' + (id - 2) + '</a></li>';
                html += '<li><a href="/lifewithsmok/' + (id - 1) + '">' + (id - 1) + '</a></li>';
                html += now;
                html += right;
                html += next;
                break;
            default:
                html += prev;
                html += left;
                html += now;
                html += right;
                html += next;
                break;
        }

        if (id == length) {
            html = '<ul class="pagination">';
            html += prev;
            html += left;
            html += now;
        } else if (id == (length - 1)) {
            html = '<ul class="pagination">';
            html += prev;
            html += left;
            html += now;
            html += '<li><a href="/lifewithsmok/' + (id + 1) + '">' + (id + 1) + '</a></li>';
            html += next;
        }
        else if (id == (length - 2)) {
            html = '<ul class="pagination">';
            html += prev;
            html += left;
            html += now;
            html += '<li><a href="/lifewithsmok/' + (id + 1) + '">' + (id + 1) + '</a></li>';
            html += '<li><a href="/lifewithsmok/' + (id + 2) + '">' + (id + 2) + '</a></li>';
            html += next;
        } else if (id > length) {
            html = "";
        }
    } else {
        html = '<ul class="pagination">';
        for (var i = 1; i < (length + 1) ; i++) {
            if (i == id) {
                html += '<li class="active"><a href="/lifewithsmok/' + i + '">' + i + '</a></li>';
            } else {
                html += '<li><a href="/lifewithsmok/' + i + '">' + i + '</a></li>';
            }
        }
    }
    html += '</ul>';
    return html;

}

 