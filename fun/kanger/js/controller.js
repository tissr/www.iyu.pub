//=========================================
var smokManage = angular.module('smokManage', []);
smokManage
  .filter('defaultAvatar', function() {
    return function(input) {
      if (input == "") {
        input = "http://www.qqbody.com/uploads/allimg/201411/20-212156_811.jpg";
      } else {
        input = "http://7xjcby.com2.z0.glb.qiniucdn.com/" + input;
      }
      return input;
    }
  })
  .filter('orderBtnDisplay', function() {
    return function(input) {
      if (input == 10) {
        input = "block";
      } else {
        input = "none"
      }
      return input;
    }
  })
  .filter('confirmBtnDisplay', function() {
    return function(input) {
      if (input == 80) {
        input = "block";
      } else {
        input = "none"
      }
      return input;
    }
  })
  .filter('addressIsDefault', function() {
    return function(input) {
      input ? input = "checked" : input = "";
      return input;
    }
  })
  .filter('nullInfo', function() {
    return function(input) {
      input == "" ? input = " ---- " : input = input;
      return input;
    }
  })
  .filter('orderDateTransform', function() {
    return function(input) {
      input == "" ? input = " ---- " : input = input.substr(0, 10);
      return input;
    }
  })
  .filter('boolTransform', function() {
    return function(input) {
      input ? input = "YES" : input = "NO";
      return input;
    }
  })
  .filter('ifNull', function() {
    return function(input) {
      if (input == null) {
        input = true;
      } else if (input.length == 0) {
        input = true;
      } else {
        input = false;
      }
      return input;
    }
  })
  .filter('ifExist', function() {
    return function(input) {
      if (input) {
        input = true;
      } else {
        input = false;
      }
      return input;
    }
  })
  .filter('trustHTML', function($sce) {
    return function(input) {
      return $sce.trustAsHtml(input);
    }
  })
  .controller('goodsInfo', function($http, $scope) {
    $.ajax({
      type: 'get',
      url: Global.store_api_url + "api/goods/get",
      async: false,
      data: {
        "goods_id": GetParameterByName("id"),
        "access_token": Global.access_token
      },
      error: function(request) {
        console.error(request);
      },
      success: function(data) {
        //console.log("当前商品：")
        //console.log(data)
        if (data.success) {
          $scope.goods = data.data;
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
        }
      }
    })

    //搭配商品获取
    $.ajax({
      type: 'get',
      url: Global.store_api_url + "api/goods/optional",
      async: false,
      data: {
        "goods_id": GetParameterByName("id"),
        "access_token": $.cookie("access_token")
      },
      error: function(request) {
        console.error(request);
      },
      success: function(data) {
        //console.log("搭配商品：")
        //console.log(data)
        if (data.success) {
          $scope.optionals = data.data;
        }
      }
    })

  })
  .controller('cartInfo', function($http, $scope) {
    $.ajax({
        type: 'get',
        url: Global.store_api_url + "api/cart/get",
        async: false,
        data: {

          "access_token": Global.access_token
        },
        error: function(request) {
          console.error(request);
        },
        success: function(data) {
          //console.log("当前购物车：")
          //console.log(data)
          if (data.success) {
            $scope.goods = data.data;
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
          }
        }
      })
      //更新购物车商品
    $scope.UpdateGoodsQuantity = function(id, qty) {
        $.ajax({
          type: 'post',
          url: Global.store_api_url + "api/cart/update",
          async: false,
          data: {
            "cart_id": id,
            "qty": qty,
            "access_token": Global.access_token
          },
          error: function(request) {
            console.error(request);
          },
          success: function(data) {
            //console.log("更新购物车商品数量：")
            //console.log(data)
            if (data.success) {

            } else {
              Global.alert_box("Sorry. Service is busy, please try again later!")
            }
          }
        })
      }
      //删除购物车商品
    $scope.DeleteCartGoods = function(id) {

      swal({
        title: "Warning",
        text: "Sure to remove it?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "orange",
        confirmButtonText: "Remove",
        closeOnConfirm: false
      }, function() {
        $.ajax({
          type: 'post',
          url: Global.store_api_url + "api/cart/remove",
          async: false,
          data: {
            "cart_id": id,
            "access_token": Global.access_token
          },
          error: function(request) {
            console.error(request);
          },
          success: function(data) {
            //console.log("删除购物车商品：")
            //console.log(data)
            $(".sweet-alert").hide();
            $(".sweet-overlay").hide();
            $(".sweet-Global.alert_box").hide();
            if (data.success) {

              $("#" + id).remove();
            } else {
              Global.alert_box("Sorry. Service is busy, please try again later!")
            }
          }
        })
      });
    }

  })
  .controller('dashboardInfo', function($http, $scope) {
    //用户个人信息
    $.ajax({
        type: 'get',
        async: false,
        url: Global.store_api_url + "api/user/get",
        data: {
          "access_token": Global.access_token
        },
        error: function(request) {
          console.error(request);
        },
        success: function(data) {
          //console.log("用户详细信息：")
          //console.log(data)
          if (data.success) {
            $scope.user = data.data;
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
            location.href="/store/login.aspx";
          }
        }
      })
      //用户SmartBEC信息
    $.ajax({
        type: 'get',
        async: false,
        url: Global.store_api_url + "api/user/smokuser",
        data: {
          "access_token": Global.access_token
        },
        error: function(request) {
          console.error(request);
        },
        success: function(data) {
          //console.log("用户SMOK信息：")
          //console.log(data)
          if (data.success) {
            $scope.smokuser = data.data;
          }
        }
      })
      //优惠券
    $.ajax({
      type: 'get',
      url: Global.store_api_url + "api/coupon/list",
      async: false,
      data: {
        "access_token": Global.access_token
      },
      error: function(request) {
        console.error(request);
      },
      success: function(data) {
        //console.log("优惠券：")
        //console.log(data)
        if (data.success) {
          $scope.coupons = data.data;
        }
      }
    })
    $scope.singleAddress = {
        "access_token": Global.access_token,
        //"full_name": "测试机器人1",
        //"tel": "+8618987654567",
        //"mobile": "+8618987654567",
        //"province": "广东",
        //"city": "深圳",
        //"area": "南山",
        //"address": "朗山二号路",
        //"zip": "12312",
      }
      //国家列表
    $.ajax({
      type: 'get',
      async: false,
      url: Global.store_api_url + "api/config/country",
      data: {
        "access_token": Global.access_token
      },
      error: function(request) {
        console.error(request);
      },
      success: function(data) {
        //console.log("国家列表：")
        //console.log(data)
        $scope.countryList = data.data;
        $scope.singleAddress.country = $scope.countryList[0].value
      }
    })

    //收货地址列表
    $.ajax({
        type: 'get',
        url: Global.store_api_url + "api/address/get",
        async: false,
        data: {
          "access_token": Global.access_token
        },
        error: function(request) {
          console.error(request);
        },
        success: function(data) {
          //console.log("收货地址：")
          //console.log(data)
          if (data.success) {
            $scope.addressList = data.data;
          }
        }
      })
      //添加收货地址
    $scope.addAddress = function() {
        $.ajax({
          type: 'post',
          url: Global.store_api_url + "api/address/add",
          async: false,
          data: $scope.singleAddress,
          error: function(request) {
            console.error(request);
          },
          success: function(data) {
            //console.log("添加地址：")
            //console.log(data)

            if (data.success) {
              Global.alert_box("Address Add Success!")
              $.ajax({
                type: 'get',
                url: Global.store_api_url + "api/address/get",
                async: false,
                data: {
                  "access_token": Global.access_token
                },
                error: function(request) {
                  console.error(request);
                },
                success: function(data) {
                  //console.log("收货地址：")
                  //console.log(data)
                  if (data.success) {
                    $scope.addressList = data.data;
                  }
                }
              })
            } else {
              Global.alert_box(data.message);
            }
          }
        })
      }
      //更新收货地址
    $scope.UpdateAddress = function(id, address) {
        $.ajax({
          type: 'post',
          url: Global.store_api_url + "api/address/update",
          async: false,
          data: $.param(address) + "&" + "access_token=" + Global.access_token,
          error: function(request) {
            console.error(request);
          },
          success: function(data) {
            //console.log("更新收货地址：")
            //console.log(data)
            $(".sweet-overlay").hide();
            $(".sweet-Global.alert_box").hide();
            if (data.success) {
              $.ajax({
                type: 'get',
                url: Global.store_api_url + "api/address/get",
                async: false,
                data: {
                  "access_token": Global.access_token
                },
                error: function(request) {
                  console.error(request);
                },
                success: function(data) {

                  if (data.success) {
                    $scope.addressList = data.data;
                    Global.alert_box("Address Update Success!")
                  }
                }
              })
            } else {
              Global.alert_box("Sorry. Service is busy, please try again later!")
            }
          }
        })
      }
      //删除收货地址
    $scope.DeleteAddress = function(id) {

        swal({
          title: "Warning",
          text: "Sure to delete it?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "orange",
          confirmButtonText: "Delete",
          closeOnConfirm: false
        }, function() {
          $.ajax({
            type: 'post',
            url: Global.store_api_url + "api/address/delete",
            async: false,
            data: {
              "address_id": id,
              "access_token": Global.access_token
            },
            error: function(request) {
              console.error(request);
            },
            success: function(data) {
              //console.log("删除收货地址：")
              //console.log(data)
              $(".sweet-overlay").hide();
              $(".sweet-Global.alert_box").hide();
              if (data.success) {
                Global.alert_box("Delete Access!")
                $("#address_" + id).remove();
              } else {
                Global.alert_box("Sorry. Service is busy, please try again later!")
              }
            }
          })
        });
      }
      //订单列表
    $.ajax({
        type: 'get',
        url: Global.store_api_url + "api/order/mylist",
        async: false,
        data: {
          "access_token": Global.access_token
        },
        error: function(request) {
          console.error(request);
        },
        success: function(data) {
          //console.log("订单列表：")
          //console.log(data)
          if (data.success) {
            $scope.orders = data.data;
          }
        }
      })
      //支付订单
    $scope.PayOrder = function(orderId) {

        //获得PayPal帐号支付的跳转网址
        $.ajax({
          type: 'GET',
          url: Global.store_api_url + "api/paypal/payurl",
          data: {
            'access_token': Global.access_token,
            'order_id': orderId,
            "return_url": Global.siteUri + "store/orderdetail.aspx",
            "cancel_url": Global.siteUri + "store/dashboard.aspx",
          },
          error: function(request) {
            console.error(request);
          },
          success: function(data) {
            //console.log("PayPal帐号支付的跳转信息")
            //console.log(data)
            if (data.success) {
              //Global.alert_box("Success!")
              location.href = data.data;
            } else {
              Global.alert_box("Sorry. Service is busy, please try again later!")
            }
          }
        });
      }
      //取消订单
    $scope.CancelOrder = function(orderId) {
        swal({
          title: "Warning",
          text: "Sure to cancel order?",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "orange",
          confirmButtonText: "Sure",
          closeOnConfirm: false
        }, function() {
          $.ajax({
            type: 'POST',
            url: Global.store_api_url + "api/order/cancel",
            data: {
              'access_token': Global.access_token,
              'order_id': orderId
            },
            error: function(request) {
              console.error(request);
            },
            success: function(data) {
              //console.log("取消订单：")
              //console.log(data);
              $(".sweet-overlay").hide();
              $(".sweet-alert").hide();
              $(".sweet-Global.alert_box").hide();

              if (data.success) {
                //Global.alert_box(data.message)
                location.reload();
              } else {
                Global.alert_box(data.message);
                //location.reload();
              }
            }
          });

        });
      }
      //确认收货
    $scope.ConfirmOrder = function(orderId) {
      swal({
        title: "Warning",
        text: "Sure to confirm receipt?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "orange",
        confirmButtonText: "Sure",
        closeOnConfirm: false
      }, function() {
        $.ajax({
          type: 'POST',
          url: Global.store_api_url + "api/order/received",
          data: {
            'access_token': Global.access_token,
            'order_id': orderId
          },
          error: function(request) {
            console.error(request);
          },
          success: function(data) {
            //console.log("确认收货：")
            //console.log(data);
            $(".sweet-overlay").hide();
            $(".sweet-alert").hide();
            $(".sweet-Global.alert_box").hide();

            if (data.success) {
              //Global.alert_box(data.message)
              location.reload();
            } else {
              Global.alert_box(data.message)
                //location.reload();
            }
          }
        });

      });
    }

  })
  .controller('checkoutInfo', function($http, $scope) {

    //收货地址
    $scope.order = {
      "email": $.cookie("user_email"),
    }

    //运输方式列表
    $.ajax({
        type: 'get',
        async: false,
        url: Global.store_api_url + "api/config/shipping",
        data: {
          "access_token": Global.access_token
        },
        error: function(request) {
          console.error(request);
        },
        success: function(data) {
          //console.log("运输方式列表：")
          //console.log(data)
          if (data.success) {
            $scope.shippingIds = data.data;
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
            Global.alert_box(data.message)
          }


        }
      })
      //国家列表
    $.ajax({
        type: 'get',
        async: false,
        url: Global.store_api_url + "api/config/country",
        data: {
          "access_token": Global.access_token
        },
        error: function(request) {
          console.error(request);
        },
        success: function(data) {
          //console.log("国家列表：")
          //console.log(data)
          $scope.countryList = data.data;
          $scope.order.country = $scope.countryList[0].value
        }
      })
      //支付方式列表
    $.ajax({
      type: 'get',
      async: false,
      url: Global.store_api_url + "api/config/payment",
      data: {
        "access_token": Global.access_token
      },
      error: function(request) {
        console.error(request);
      },
      success: function(data) {
        //console.log("支付方式列表：")
        //console.log(data)
        if (data.success) {
          $scope.paymentIds = data.data;
        } else {
          Global.alert_box(data.message)
        }

      }
    })
    if (Global.loginStatus) {
      //收货地址列表
      $.ajax({
        type: 'get',
        url: Global.store_api_url + "api/address/get",
        async: false,
        data: {
          "access_token": Global.access_token
        },
        error: function(request) {
          console.error(request);
        },
        success: function(data) {
          //console.log("收货地址：")
          //console.log(data)
          if (data.success) {
            $scope.addressList = data.data;
          }
        }
      })
      if ($scope.addressList.length > 0) {}
      $.each($scope.addressList, function(key, item) {
        if (item.is_default) {
          $scope.order.first_name = item.full_name;
          $scope.order.country = item.country;
          $scope.order.province = item.province;
          $scope.order.city = item.city;
          $scope.order.address = item.address;
          $scope.order.zip = item.zip;
          $scope.order.phone = item.tel;
          $scope.order.mobile = item.mobile;
        }
      })
    };
    //选择收货地址
    $scope.ChooseAddress = function(id) {
      $('.address-list').removeClass('address-true');
      $('#address_' + id).addClass('address-true');
      if ($scope.addressList.length > 0) {
        $.each($scope.addressList, function(key, item) {
          if (item.address_id == id) {
            $scope.order.first_name = item.full_name;
            $scope.order.country = item.country;
            $scope.order.province = item.province;
            $scope.order.city = item.city;
            $scope.order.address = item.address;
            $scope.order.zip = item.zip;
            $scope.order.phone = item.tel;
            $scope.order.mobile = item.mobile;
          }
        })
      }

    }
    $.ajax({
        type: 'get',
        url: Global.store_api_url + "api/cart/get",
        async: false,
        data: {

          "access_token": Global.access_token
        },
        error: function(request) {
          console.error(request);
        },
        success: function(data) {
          //console.log("当前购物车：")
          //console.log(data)
          if (data.success) {
            $scope.goods = data.data;
          } else {
            Global.alert_box(data.message)
          }
        }
      })
      //更新购物车商品
    $scope.UpdateGoodsQuantity = function(id, qty) {
        $.ajax({
          type: 'post',
          url: Global.store_api_url + "api/cart/update",
          async: false,
          data: {
            "cart_id": id,
            "qty": qty,
            "access_token": Global.access_token
          },
          error: function(request) {
            console.error(request);
          },
          success: function(data) {
            //console.log("更新购物车商品数量：")
            //console.log(data)
            if (data.success) {

            } else {
              Global.alert_box("Sorry. Service is busy, please try again later!")
            }
          }
        })
      }
      //删除购物车商品
    $scope.DeleteCartGoods = function(id) {
      swal({
        title: "Warning",
        text: "Sure to remove it?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "orange",
        confirmButtonText: "Remove",
        closeOnConfirm: false
      }, function() {
        $.ajax({
          type: 'post',
          url: Global.store_api_url + "api/cart/remove",
          async: false,
          data: {
            "cart_id": id,
            "access_token": Global.access_token
          },
          error: function(request) {
            console.error(request);
          },
          success: function(data) {
            //console.log("删除购物车商品：")
            //console.log(data)
            $(".sweet-alert").hide();
            $(".sweet-overlay").hide();
            $(".sweet-Global.alert_box").hide();
            if (data.success) {
              $("#" + id).remove();
            } else {
              Global.alert_box("Sorry. Service is busy, please try again later!")
            }
          }
        })
      });
    }

  })
