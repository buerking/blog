<!DOCTYPE html>
<html>
<head>
    <title>王志恒</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/public/css/member.css">
    <link rel="stylesheet" href="/public/vendor/layui-v2.4.5/css/layui.css" media="all">
    <link rel="stylesheet" href="/public/admin/css/lightCMSAdmin.css" media="all">
</head>
<body class="bg-grey-lightest font-sans leading-normal tracking-normal">
<!--NAV-->
<ul class="layui-nav" lay-filter="">
    <li class="layui-nav-item"><a href="{{ route('web::index') }}">回到首页</a></li>
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
<!--Container-->
<div style="margin-top: -80px" class="container w-full md:max-w-md mx-auto pt-20">
    <div class="w-full px-4 md:px-6 text-xl text-grey-darkest leading-normal" style="font-family:Georgia,serif;">
        <div class="mt-6">
        @foreach($contents as $content)
            <a href="{{ route('web::content', ['entityId' => $entity->id, 'contentId' => $content->id]) }}">
                <div style="">
                {{--{{$content}}--}}
                    <span style="font-size: 25px; margin-bottom: 55px;"><strong>
                        {{ $content->title }}</strong>
                    </span>
                        <img style="border-radius:10px;" src={{ $content->cover_image }}>
                    <span style="font-size: 18px; margin-top: 55px">
                        {{ $content->introduction }} <span style="color: #1ba9e5"> 查看全文>></span>
                    </span>
                </div>
            </a>
            <hr style="margin-top: 30px">
            <br>
        @endforeach
        </div>
    </div>
</div>
<!--/container-->

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
<script>
    /* Progress bar */
    //Source: https://alligator.io/js/progress-bar-javascript-css-variables/
    var h = document.documentElement,
        b = document.body,
        st = 'scrollTop',
        sh = 'scrollHeight',
        progress = document.querySelector('#progress'),
        scroll;
    var scrollpos = window.scrollY;
    var header = document.getElementById("header");
    var navcontent = document.getElementById("nav-content");

    document.addEventListener('scroll', function() {

        /*Refresh scroll % width*/
        scroll = (h[st]||b[st]) / ((h[sh]||b[sh]) - h.clientHeight) * 100;
        progress.style.setProperty('--scroll', scroll + '%');

        /*Apply classes for slide in bar*/
        scrollpos = window.scrollY;

        if(scrollpos > 10){
            header.classList.add("bg-white");
            header.classList.add("shadow");
            navcontent.classList.remove("bg-grey-lightest");
            navcontent.classList.add("bg-white");
        }
        else {
            header.classList.remove("bg-white");
            header.classList.remove("shadow");
            navcontent.classList.remove("bg-white");
            navcontent.classList.add("bg-grey-lightest");

        }

    });


    //Javascript to toggle the menu
    document.getElementById('nav-toggle').onclick = function(){
        document.getElementById("nav-content").classList.toggle("hidden");
    }
</script>
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
</body>
</html>
