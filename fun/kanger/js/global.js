//检查用户是否第一次访问
if ($.cookie('userViewCookie')) {
    $('#top-tips').hide();
} else {
    $('#top-tips').css('display','flex');
    $('#top-nav').css('top','100px')
}
//确认访问
$('#sureToView').click(function () {
    $('#top-tips').hide();
    $('#top-nav').css('top', '0');
    $.cookie("userViewCookie", 'sure', {
        expires: 30,
        path: '/'
    });
});
$('#closeSite').click(function () {
    swal({
        title: "Warning",
        text: "Sure to leave?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "orange",
        confirmButtonText: "Leave",
        closeOnConfirm: false
    }, function () {
        location.href = "http://www.seviausa.org/";
    });
});
//==========================全局模块====================================
var Global = {
    "store_api_url": "http://webapi2.smoktech.com/",
    "access_token": $.cookie("access_token"),
    "siteUri": "http://www.smoktech.com/",
    "alert_box": function (message) {
        $.growl({
            message: message
        }, {
                type: "inverse",
                allow_dismiss: false,
                label: 'Cancel',
                className: 'btn-xs btn-inverse',
                placement: {
                    from: 'top',
                    align: 'right'
                },
                delay: 5000,
                animate: {
                    enter: 'animated bounceIn',
                    exit: 'animated bounceOut'
                },
                offset: {
                    x: 20,
                    y: 85
                }
            });
    }
}
// 全局通用错误提示信息
function ErrorInfo(code, message) {
    var returnInfo = "";
    switch (code) {
        case 0:
            returnInfo = message;
            break;
        case 1000:
            returnInfo = "Succeeded";
            break;
        case 1001:
            returnInfo = "Invalid Token";
            break;
        case 1002:
            returnInfo = "Token is not available";
            break;
        case 1003:
            returnInfo = "Invalid account";
            break;
        case 1004:
            returnInfo = "please update your profile firstly";
            break;
        case 1011:
            returnInfo = "Interface does not exist";
            break;
        case 2001:
            returnInfo = "The format of username is incorrect";
            break;
        case 2002:
            returnInfo = "The format of e-mail address is incorrect";
            break;
        case 2003:
            returnInfo = "The format of password is incorrect";
            break;
        case 2004:
            returnInfo = "The format of phone number is incorrect";
            break;
        case 2005:
            returnInfo = "The account does not exist";
            break;
        case 2006:
            returnInfo = "Incorrect password";
            break;
        case 2007:
            returnInfo = "The account is locked after a specified number of incorrect passwords are tried";
            break;
        case 2008:
            returnInfo = "Generate Token failed, please try again later or contact administrator";
            break;
        case 2009:
            returnInfo = "Please input your registered username, e-mail address, or phone number";
            break;
        case 2010:
            returnInfo = "The e-mail address has already been registered";
            break;
        case 2011:
            returnInfo = "The username has already been registered";
            break;
        case 2012:
            returnInfo = "The phone number has already been registered";
            break;
        case 2013:
            returnInfo = "Not logged in";
            break;
        case 2014:
            returnInfo = "The account has been locked, please contact administrator";
            break;
        case 2015:
            returnInfo = "Current account has been added to blacklist, if you have any question, please contact administrator";
            break;
        case 2016:
            returnInfo = "Incorrect old password, update will not be accepted";
            break;
        case 2017:
            returnInfo = "Update password failed, please try again later or contact administrator";
            break;
        case 2018:
            returnInfo = "Update e-mail address failed, please try again later or contact administrator";
            break;
        case 2019:
            returnInfo = "Incorrect password, update will not be accepted";
            break;
        case 2020:
            returnInfo = "E-mail address has not been changed, update will not be accepted";
            break;
        case 2021:
            returnInfo = "Verify e-mail Token invalid";
            break;
        case 2022:
            returnInfo = "Verify e-mail Token failed, please try again later or contact administrator";
            break;
        case 2023:
            returnInfo = "The format of username is incorrect. It can only be 3-20 characters in Chinese, English, numbers or underscore, and should not contain spaces or other special characters.";
            break;
        case 2024:
            returnInfo = "This user name exists already, please use another one";
            break;
        case 2025:
            returnInfo = "Update user name failed, please try again later or contact administrator";
            break;
        case 2026:
            returnInfo = "Update avatar failed, please try again later or contact administrator";
            break;
        case 2027:
            returnInfo = "Register failed, please try again later or contact administrator";
            break;
        case 2028:
            returnInfo = "Username cannot be empty";
            break;
        case 2029:
            returnInfo = "E-mail address cannot be empty";
            break;
        case 2030:
            returnInfo = "Change password, invalid token (web end)";
            break;
        case 2031:
            returnInfo = "Password reset Token is invalid (web end)";
            break;
        case 2032:
            returnInfo = "Password reset Token has expired (web end)";
            break;
        case 2033:
            returnInfo = "Update cover failed, please try again later or contact administrator";
            break;
        case 2034:
            returnInfo = "Update mood failed, please try again later or contact administrator";
            break;
        // case 2035:
        // returnInfo = "";
        // break;
        // case 2036:
        // returnInfo = "";
        // break;
        // case 2037:
        // returnInfo = "";
        // break;
        case 2038:
            returnInfo = "Update will not be accepted";
            break;
        case 2039:
            returnInfo = "Update register information failed";
            break;
        case 2040:
            returnInfo = "Unknown third-party user account";
            break;
        case 2041:
            returnInfo = "Access token cannot be empty";
            break;
        case 2042:
            returnInfo = "Open ID cannot be empty";
            break;
        case 2043:
            returnInfo = "Access token secret cannot be empty";
            break;
        case 2044:
            returnInfo = "Invalid access token";
            break;
        // case 2045:
        // returnInfo = "";
        // break;
        // case 2046:
        // returnInfo = "";
        // break;
        // case 2047:
        // returnInfo = "";
        // break;
        // case 2048:
        // returnInfo = "";
        // break;
        // case 2049:
        // returnInfo = "";
        // break;
        case 2050:
            returnInfo = "Current account could not be bound";
            break;
        case 2051:
            returnInfo = "Something went wrong when binding account";
            break;
        case 5001:
            returnInfo = "Follow failed";
            break;
        case 5002:
            returnInfo = "Already followed";
            break;
        case 5003:
            returnInfo = "You cannot follow yourself";
            break;
        case 5004:
            returnInfo = "Unfollow failed";
            break;
        case 5005:
            returnInfo = "Unfollowed";
            break;
        case 3001:
            returnInfo = "Add Status failed";
            break;
        case 3002:
            returnInfo = "In a short period of time, you cannot repost the same content; or post too fast";
            break;
        case 3003:
            returnInfo = "Status tag cannot be empty";
            break;
        case 3004:
            returnInfo = "Status cannot be empty";
            break;
        case 3005:
            returnInfo = "Status does not exist";
            break;
        case 3006:
            returnInfo = "Delete Status failed";
            break;
        case 3007:
            returnInfo = "No delete permission";
            break;
        case 3008:
            returnInfo = "Category does not exist";
            break;
        case 3013:
            returnInfo = "Add Status to favorite list failed";
            break;
        case 3014:
            returnInfo = "Status has been added to favorite list";
            break;
        case 3015:
            returnInfo = "Delete Status from favorite list failed";
            break;
        case 3016:
            returnInfo = "Status has not been added to favorite list";
            break;
        case 4001:
            returnInfo = "Comment cannot be empty";
            break;
        case 4002:
            returnInfo = "Comment failed";
            break;
        case 4003:
            returnInfo = "Comment does not exist";
            break;
        case 4004:
            returnInfo = "Delete Comment failed";
            break;
        case 4005:
            returnInfo = "No delete permission";
            break;
        case 4006:
            returnInfo = "Comment will not be accepted";
            break;
        case 4007:
            returnInfo = "Comment type cannot be empty";
            break;
        case 4013:
            returnInfo = "Add to comment list failed";
            break;
        case 4014:
            returnInfo = "Add to comment list succeeded";
            break;
        case 4015:
            returnInfo = "Delete from comment list failed";
            break;
        case 4016:
            returnInfo = "Comment has not beed added yet";
            break;
        default:
            returnInfo = "Unknown Error";

    }
    return returnInfo;
}
//获取渠道货币符号
function GetCurrency() {

    if ($('.currency').length > 0 && !$.cookie('currency')) {
        $.ajax({
            type: "get",
            async: false,
            url: Global.store_api_url + "api/config/currency",
            data: {
                "access_token": Global.access_token
            },
            error: function (request) {
                console.error(request);
            },
            success: function (data) {
                //console.log("渠道货币符号：")
                //console.log(data)
                if (data.success) {
                    $.cookie('currency', data.data)
                    $('.currency').html(data.data);
                }
            }
        })
    } else {
        $('.currency').html($.cookie('currency'));
    }
}

//获取get参数
function GetParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
//生成GUID
function GetGUID() {
    var guid = "";
    for (var i = 1; i <= 32; i++) {
        var n = Math.floor(Math.random() * 16.0).toString(16);
        guid += n;
        if ((i == 8) || (i == 12) || (i == 16) || (i == 20))
            guid += "-";
    }
    return guid;
}
//AJAX等待框
var $loading = $('#ajax_wait').hide();
//页面初始化时执行的函数
$(function () {
    CheckLoginStatus();
    GetCurrency();
});

$(document)
    .ajaxStart(function () {
        $loading.show();
    })
    .ajaxStop(function () {
        $loading.hide();
    });
//========================用户模块==============================//


//获得应用访问令牌
function GetAppAccessToken() {

    var appCode = "smok-web-en";
    var accessKey = "mH4zbpmjsyrq%KnV";
    var ver = "1.0.0";
    var deviceID = GetGUID();
    var sign = window.md5(appCode + accessKey + deviceID);

    $.ajax({
        async: false,
        type: "get",
        url: Global.store_api_url + "api/authorized/app",
        data: {
            "code": appCode,
            "device_id": deviceID,
            "ver": ver,
            "sign": sign
        },
        error: function (request) {
            console.error(request);
        },
        success: function (data) {
            //console.log(data)
            if (data.success) {
                $.cookie("access_token", data.data, {
                    expires: 7,
                    path: '/'
                })
            } else {
                Global.alert_box(ErrorInfo(data.code, data.message))
            }
        }
    })

}

//检查登录状态
function CheckLoginStatus() {
    //首先检查cookie中的access_token如果没有则判定未登录，如果存在则利用此token来尝试登录，若成功则判定登录，否则未登录
    if ($.cookie('access_token')) {
        if (!$.cookie('login_user')) {
            Global.loginStatus = false;
            $("#nav_user").html('<a href="/store/login.aspx"><i class="fa fa-user"></i> login</a>')
        } else {
            Global.loginStatus = true;
            $("#nav_user").html('<a href="/store/dashboard.aspx"><i class="fa fa-user"></i> ' + $.cookie('login_user') + '</a>')
            $('#login_out').show();
            // $('#nav_cart').show();
        }
    } else {
        GetAppAccessToken();
    }
}
//用户登录
$(function () {
    $('#login').find('input,select,textarea').not('[type=submit]').jqBootstrapValidation({
        submitSuccess: function ($form, event) {
            $('input').each(function () {
                $(this).val($.trim($(this).val()));
            });
            $.ajax({
                type: 'post',
                url: Global.store_api_url + "api/user/signin2",
                data: $.param({
                    'access_token': Global.access_token
                }) + '&' + $('#login').serialize(),
                error: function (request) {
                    console.error(request);
                },
                success: function (data) {
                    //console.log("登录信息：")
                    //console.log(data)
                    if (data.success) {
                        //将登陆状态存至cookie
                        $.cookie("access_token", data.data, {
                            expires: 7,
                            path: '/'
                        });
                        $.ajax({
                            type: 'get',
                            async: false,
                            url: Global.store_api_url + "api/user/get",
                            data: {
                                "access_token": data.data
                            },
                            error: function (request) {
                                console.error(request);
                            },
                            success: function (data) {
                                //console.log("登录状态")
                                //console.log(data)
                                if (data.success) {
                                    //将登陆状态存至cookie
                                    $.cookie('login_user', data.data.user_name, {
                                        path: '/'
                                    })
                                    $.cookie("user_email", data.data.email, {
                                        path: '/'
                                    })
                                    location.href = '/store/dashboard.aspx';
                                } else if (data.code == 1) {
                                    GetAppAccessToken();
                                } else { }
                            }
                        });

                    } else if (data.code == 1) {
                        GetAppAccessToken();
                        location.reload();
                    } else if (data.code == 2) {
                        $.removeCookie('user_email', {
                            path: '/'
                        });
                        $.removeCookie('login_user', {
                            path: '/'
                        });
                    } else {
                        Global.alert_box(ErrorInfo(data.code, data.message))
                    }
                }
            });
            event.preventDefault();
        },
        submitError: function ($form, event, errors) {
            console.error(errors);
        }
    });
});

//用户注册
$(function () {
    $('#register').find('input,select,textarea').not('[type=submit]').jqBootstrapValidation({
        submitSuccess: function ($form, event) {
            $('input').each(function () {
                $(this).val($.trim($(this).val()).toLowerCase());
            });
            $.ajax({
                type: 'post',
                url: Global.store_api_url + "api/user/reg2",
                data: $.param({
                    'access_token': Global.access_token
                }) + '&' + $(register).serialize(),
                error: function (request) {
                    console.error(request);
                },
                success: function (data) {
                    //console.log("用户注册结果：")
                    //console.log(data)
                    if (data.success) {
                        Global.alert_box("Registration successful");
                        location.href = '/store/login.aspx';
                    } else {
                        Global.alert_box(ErrorInfo(data.code, data.message))
                    }
                }
            });
            event.preventDefault();
        },
        submitError: function ($form, event, errors) {
            console.error(errors);
        }
    });
});
//退出登录
$('#login_out').click(function () {
    swal({
        title: "Warning",
        text: "Sure to login out?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "orange",
        confirmButtonText: "Login out",
        closeOnConfirm: false
    }, function () {
        $.ajax({
            type: 'get',
            url: Global.store_api_url + "api/user/signout",
            data: {
                'access_token': Global.access_token
            },
            error: function (request) {
                console.error(request);
            },
            success: function (data) {
                //console.log("退出登录结果：")
                //console.log(data)
                if (data.success) {
                    $.removeCookie('access_token', {
                        path: '/'
                    });
                    $.removeCookie('user_email', {
                        path: '/'
                    });
                    $.removeCookie('login_user', {
                        path: '/'
                    });
                    location.href = '/';
                } else {
                    Global.alert_box(ErrorInfo(data.code, data.message))
                }
            }
        });

    });
})

//==============================商品模块==============================//



//选择商品
$(document).on('click', '.goods-spec-label', function () {
    var $this = $(this);
    var $item = $this.parent().parent();
    $item.find('.goods-spec-label').css("border-color", "#dedede");
    $this.css("border-color", "#ccb08a");
});
//获取商品参数
function getRadioVal(form, name) {

    var val;
    var radios = form.elements[name];
    if (radios.length) {
        for (var i = 0, len = radios.length; i < len; i++) {
            if (radios[i].checked) {
                val = radios[i].value;
                break;
            }
        }
    } else {
        val = $(form).find('input[name=' + name + ']').val();
    }
    return val;
}

function getRadioString(form, name) {
    var val;
    var radios = form.elements[name];
    if (radios.length) {
        for (var i = 0, len = radios.length; i < len; i++) {
            if (radios[i].checked) {
                $this = $(radios[i])
                val = $this.data("string");
                break;
            }
        }
    } else {
        val = $(form).find('input[name=' + name + ']').data("string");
    }
    return val;
}
//添加商品至购物车
$('#goods_form').submit(function () {
    var goodsSpec;
    var specCode = "";
    var specName = "";
    var goodsId = GetParameterByName("id")
    var qty = $('#goods_qty').val();
    $.ajax({
        type: 'get',
        url: Global.store_api_url + "api/goods/get",
        async: false,
        data: {
            "goods_id": goodsId,
            "access_token": Global.access_token
        },
        error: function (request) {
            console.error(request);
        },
        success: function (data) {
            //console.log("当前商品参数：")
            //console.log(data.data.spec)
            goodsSpec = data.data.spec;
        }
    })
    if(goodsSpec){
        $.each(goodsSpec, function (key, value) {

        specCode += getRadioVal(document.getElementById('goods_form'), value.spec_name) + ";";
        specName += value.spec_name + " : " + getRadioString(document.getElementById('goods_form'), value.spec_name) + "; ";

    })
    }

    $.ajax({
        type: 'post',
        url: Global.store_api_url + "api/cart/add",
        data: {
            "goods_id": goodsId,
            "access_token": Global.access_token,
            "qty": qty,
            "sku_code": specCode,
            "sku_name": specName
        },
        error: function (request) {
            console.error(request);
        },
        success: function (data) {
            //console.log("商品添加结果");
            //console.log(data)
            if (data.success) {
                swal({
                    title: "SUCCESS",
                    text: data.message,
                    type: "success",
                    showCancelButton: true,
                    confirmButtonColor: "orange",
                    confirmButtonText: "Go to checkout",
                    cancelButtonText: "View More",
                    closeOnConfirm: false
                }, function () {
                    location.href = '/store/cart.aspx';
                });
            } else {
                Global.alert_box(data.message)
            }

        }
    })
});

//================提交订单=====================//
//国家列表
//function GetCountryList(element) {
//    var html = "";
//    $.ajax({
//        type: 'get',
//        url: Global.store_api_url + "api/config/country",
//        data: {
//            "access_token": Global.access_token
//        },
//        error: function (request) {
//            console.error(request);
//        },
//        success: function (data) {
//            //console.log("国家列表：")
//            //console.log(data)
//            $.each(data.data, function (key, value) {
//                html += '<option value="' + value.value + '">' + value.value + '</option>';
//            })
//            //$(html).appendTo($(element))
//            $(element).html(html)
//        }
//    })
//}
//运输方式列表
function GetShippingList(element) {
    var html = "";
    $.ajax({
        type: 'get',
        url: Global.store_api_url + "api/config/shipping",
        data: {
            "access_token": Global.access_token
        },
        error: function (request) {
            console.error(request);
        },
        success: function (data) {
            //console.log("运输方式列表：")
            //console.log(data)
            $.each(data.data, function (key, value) {
                html += '<input  type="radio" style="height:auto;" name="shipping_id" value="' + value.shipping_id + '" required /> ' + value.shipping_name + ' ';
            })
            //$(html).appendTo($(element))
            $(element).html(html)
        }
    })
}
//支付方式列表
function GetPaymentList(element) {
    var html = "";
    $.ajax({
        type: 'get',
        url: Global.store_api_url + "api/config/payment",
        data: {
            "access_token": Global.access_token
        },
        error: function (request) {
            console.error(request);
        },
        success: function (data) {
            //console.log("支付方式列表：")
            //console.log(data)
            $.each(data.data, function (key, value) {
                html += '<input type="radio" style="height:auto;"  name="payment_id" value="' + value.payment_id + '" required />' + value.payment_name + ' ';
            })
            //$(html).appendTo($(element))
            $(element).html(html)
        }
    })
}
//稍候支付
$('#pay_later').click(function () {

    if (Global.loginStatus) {
        //提交订单
        var shippingId = $('input:radio[name="shipping_id"]:checked').val();
        var countryName = $("#country  option:selected").val();
        var shippingAmount = GetOrderFreight(shippingId, countryName);
        $.ajax({
            type: 'post',
            url: Global.store_api_url + "api/order/add",
            data: $.param({
                'access_token': Global.access_token,
                'shipping_amount': shippingAmount
            }) + '&' + $(checkout_form).serialize(),
            error: function (request) {
                console.error(request);
            },
            success: function (data) {
                //console.log("订单提交结果")
                //console.log(data)
                if (data.success) {
                    //跳转到dashboard页面
                    location.href = "/store/dashboard.aspx"
                } else {
                    Global.alert_box(data.message)
                }
            }
        });
    } else {
        //=============匿名提交订单==========
        //注册用户
        $.ajax({
            type: 'post',
            url: Global.store_api_url + "api/user/reg2",
            data: {
                'access_token': Global.access_token,
                'email': $('#email').val(),
                'password': $('#password').val()
            },
            error: function (request) {
                console.error(request);
            },
            success: function (data) {
                //console.log("用户注册结果：")
                //console.log(data)
                if (data.success) {
                    //用户登录
                    $.ajax({
                        type: 'post',
                        url: Global.store_api_url + "api/user/signin2",
                        data: {
                            'access_token': Global.access_token,
                            'loginname': $('#email').val(),
                            'password': $('#password').val()
                        },
                        error: function (request) {
                            console.error(request);
                        },
                        success: function (data) {
                            //console.log("登录信息：")
                            //console.log(data)
                            if (data.success) {
                                //更新cookie
                                $.cookie("access_token", data.data, {
                                    expires: 7,
                                    path: '/'
                                });

                                Global.loginStatus = true;
                                Global.access_token = $.cookie("access_token")
                                //提交订单
                                var shippingId = $('input:radio[name="shipping_id"]:checked').val();
                                var countryName = $("#country  option:selected").val();
                                var shippingAmount = GetOrderFreight(shippingId, countryName);
                                $('#password').remove();
                                $.ajax({
                                    type: 'post',
                                    url: Global.store_api_url + "api/order/add",
                                    data: $.param({
                                        'access_token': Global.access_token,
                                        'shipping_amount': shippingAmount
                                    }) + '&' + $(checkout_form).serialize(),
                                    error: function (request) {
                                        console.error(request);
                                    },
                                    success: function (data) {
                                        //console.log("订单提交结果")
                                        //console.log(data)
                                        if (data.success) {
                                            //更新haeder栏目
                                            CheckLoginStatus();
                                            //跳转到dashboard页面
                                            location.href = "/store/dashboard.aspx"
                                        } else {
                                            Global.alert_box(data.message)
                                        }
                                    }
                                });
                            } else {
                                Global.alert_box(data.message)
                            }
                        }
                    });
                } else {
                    Global.alert_box(data.message)
                }
            }
        });
    }

})
//支付
$(function () {

    $('#checkout_form').find('input,select,textarea').not('[type=submit]').jqBootstrapValidation({
        submitSuccess: function ($form, event) {

            if (Global.loginStatus) {
                //提交订单
                var shippingId = $('input:radio[name="shipping_id"]:checked').val();
                var countryName = $("#country  option:selected").val();
                var shippingAmount = GetOrderFreight(shippingId, countryName);
                $.ajax({
                    type: 'post',
                    url: Global.store_api_url + "api/order/add",
                    data: $.param({
                        'access_token': Global.access_token,
                        'shipping_amount': shippingAmount
                    }) + '&' + $(checkout_form).serialize(),
                    error: function (request) {
                        console.error(request);
                    },
                    success: function (data) {
                        //console.log("订单提交结果")
                        //console.log(data)
                        if (data.success) {
                            //获得PayPal帐号支付的跳转网址
                            $.ajax({
                                type: 'GET',
                                url: Global.store_api_url + "api/paypal/payurl",
                                data: {
                                    'access_token': Global.access_token,
                                    'order_id': data.data,
                                    "return_url": Global.siteUri + "store/orderdetail.aspx",
                                    "cancel_url": Global.siteUri + "store/dashboard.aspx",
                                },
                                error: function (request) {
                                    console.error(request);
                                },
                                success: function (data) {
                                    //console.log("PayPal帐号支付的跳转信息")
                                    //console.log(data)
                                    if (data.success) {
                                        //Global.alert_box("Success!")
                                        location.href = data.data;
                                    } else {
                                        Global.alert_box(data.message)
                                    }
                                }
                            });
                        } else {
                            Global.alert_box(data.message)
                        }
                    }
                });
            } else {
                //=============匿名提交订单==========
                //注册用户
                $.ajax({
                    type: 'post',
                    url: Global.store_api_url + "api/user/reg2",
                    data: {
                        'access_token': Global.access_token,
                        'email': $('#email').val(),
                        'password': $('#password').val()
                    },
                    error: function (request) {
                        console.error(request);
                    },
                    success: function (data) {
                        //console.log("用户注册结果：")
                        //console.log(data)
                        if (data.success) {
                            //用户登录
                            $.ajax({
                                type: 'post',
                                url: Global.store_api_url + "api/user/signin2",
                                data: {
                                    'access_token': Global.access_token,
                                    'loginname': $('#email').val(),
                                    'password': $('#password').val()
                                },
                                error: function (request) {
                                    console.error(request);
                                },
                                success: function (data) {
                                    //console.log("登录信息：")
                                    //console.log(data)
                                    if (data.success) {
                                        //更新cookie
                                        $.cookie("access_token", data.data, {
                                            expires: 7,
                                            path: '/'
                                        });

                                        Global.loginStatus = true;
                                        Global.access_token = $.cookie("access_token")
                                        //提交订单
                                        var shippingId = $('input:radio[name="shipping_id"]:checked').val();
                                        var countryName = $("#country  option:selected").val();
                                        var shippingAmount = GetOrderFreight(shippingId, countryName);
                                        $('#password').remove();
                                        $.ajax({
                                            type: 'post',
                                            url: Global.store_api_url + "api/order/add",
                                            data: $.param({
                                                'access_token': Global.access_token,
                                                'shipping_amount': shippingAmount
                                            }) + '&' + $(checkout_form).serialize(),
                                            error: function (request) {
                                                console.error(request);
                                            },
                                            success: function (data) {
                                                //console.log("订单提交结果")
                                                //console.log(data)
                                                if (data.success) {
                                                    //更新haeder栏目
                                                    CheckLoginStatus();
                                                    //获得PayPal帐号支付的跳转网址
                                                    $.ajax({
                                                        type: 'GET',
                                                        url: Global.store_api_url + "api/paypal/payurl",
                                                        data: {
                                                            'access_token': Global.access_token,
                                                            'order_id': data.data,
                                                            "return_url": Global.siteUri + "store/orderdetail.aspx",
                                                            "cancel_url": Global.siteUri + "store/dashboard.aspx",
                                                        },
                                                        error: function (request) {
                                                            console.error(request);
                                                        },
                                                        success: function (data) {
                                                            //console.log("PayPal帐号支付的跳转信息")
                                                            //console.log(data)
                                                            if (data.success) {
                                                                //Global.alert_box("Success!")
                                                                location.href = data.data;
                                                            } else {
                                                                Global.alert_box(data.message)
                                                            }
                                                        }
                                                    });
                                                } else {
                                                    Global.alert_box(data.message)
                                                }
                                            }
                                        });

                                    } else {
                                        Global.alert_box(data.message)
                                    }
                                }
                            });
                        } else {
                            Global.alert_box(data.message)
                        }
                    }
                });
            }
            event.preventDefault();
        },
        submitError: function ($form, event, errors) {
            console.error(errors);
        }
    });
});
//获取物流费用
function GetOrderFreight(id, name) {
    var result = "";
    $.ajax({
        type: 'get',
        async: false,
        url: Global.store_api_url + "api/order/freight",
        data: {
            "access_token": Global.access_token,
            "shipping_id": id,
            "region_name": name
        },
        error: function (request) {
            console.error(request);
        },
        success: function (data) {
            //console.log("订单运费：")
            //console.log(data)
            if (data.success) {
                result = data.data;
            } else {
                Global.alert_box(data.message)
            }
        }
    })
    return result;
}
