<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/public/css/member.css">
        <link rel="stylesheet" href="/public/vendor/layui-v2.4.5/css/layui.css" media="all">
        <link rel="stylesheet" href="/public/admin/css/lightCMSAdmin.css" media="all">

        <title>王志恒</title>
        <style type="text/css">
            div.foot {
                height: 30px;
                position: fixed;
                bottom: 0px;
                text-align: center;
            }
        </style>
    </head>
    <body>
    @php
        $user = \Auth::guard('member')->user();
    @endphp
    <!--nav-->
    <ul class="layui-nav" lay-filter="">
        <li class="layui-nav-item">
                @foreach($entities as $entity)
                    <a href="{{ route('web::entity.content.list', ['entityId' => $entity->id]) }}">{{ $entity->name }}</a>
                @endforeach
        </li>
        <li class="layui-nav-item">
            <a href="javascript:">文章分类</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
                <dd><a href="">编程</a></dd>
                <dd><a href="">设计</a></dd>
                <dd><a href="">文案</a></dd>
                <dd><a href="">运营</a></dd>
                <dd><a href="">数据分析</a></dd>
            </dl>
        </li>
        <li class="layui-nav-item" lay-unselect="" style="float: right">
            @auth('member')
                <a href="javascript:;"><img src="//t.cn/RCzsdCq" class="layui-nav-img">{{ \Auth::guard('member')->user()->name }}</a>
                <dl class="layui-nav-child">
                    <dd><a href="{{ route('member::logout') }}">退出登录</a></dd>
                    <dd><a href="javascript:;">个人信息</a></dd>
                </dl>
        </li>
        <li class="layui-nav-item">
            @else
                <a href="{{ route('member::login.show') }}">登录</a>
            @endauth
        </li>
    </ul>
    <!--main-->

    <!--footer-->
    <footer class="bg-white border-t border-grey-light shadow">
        <div class="container max-w-md mx-auto flex py-8">
            <div class="w-full mx-auto flex flex-wrap">
                <div class="flex w-full md:w-1/2 ">
                    <div class="px-8">
                        <h3 class="font-bold text-black">关于</h3>
                        <p class="py-4 text-grey-dark text-sm">
                            每日整理自己学习的内容可以帮助自己查漏补缺，用文字表达的时候，内心会不断提出问题，然后反思，给出解释，学习，陈述，找到问题，再学习，不断递归问题，直至没有问题，跳出递归。网站使用lightCMS开发，基于laravel框架的CMS系统。
                        </p>
                    </div>
                </div>
                <div class="flex w-full md:w-1/2">
                    <div class="px-8">
                        <h3 class="font-bold text-black">链接</h3>
                        <ul class="list-reset items-center text-sm pt-3">
                            <li>
                                <a class="inline-block text-grey-dark no-underline hover:text-black hover:text-underline py-1" href="https://github.com/eddy8/lightCMS" target="_blank">GitHub</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </body>
</html>
<script src="/public/vendor/layui-v2.4.5/layui.all.js"></script>
<script src="/public/admin/js/admin.js"></script>
<script>
    //注意：导航 依赖 element 模块，否则无法进行功能性操作
    layui.use('element', function(){
        var element = layui.element; //导航的hover效果、二级菜单等功能，需要依赖element模块

        //监听导航点击
        element.on('nav(demo)', function(elem){
            //console.log(elem)
            layer.msg(elem.text());
        });
    });
</script>