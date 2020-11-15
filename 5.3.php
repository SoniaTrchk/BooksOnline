<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href='style/bar..css' rel='stylesheet' type='text/css'>
    <title>5.3</title>

    <script type='text/javascript' src='unitegallery/js/unitegallery.min.js'></script>
    <link rel='stylesheet' href='unitegallery/css/unite-gallery.css' type='text/css' />
    <script type='text/javascript' src='unitegallery/themes/default/ug-theme-default.js'></script>
    <link rel='stylesheet' href='unitegallery/themes/default/ug-theme-default.css' type='text/css' />

    <script src="scripts/5.js"></script>
</head>
<body>
<nav id="navigation" class="navigation">
    <ul class="parent">
        <li>Menu 1
            <ul class="child">
                <li>Menu 1.1</li>
                <li>Menu 1.2</li>
            </ul>
        </li>
        <li>Menu 2
            <ul class="child">
                <li>Menu 2.1</li>
            </ul>
        </li>
        <li>Menu 3</li>
        <li>Menu 4
            <ul class="child">
                <li>Menu 4.1</li>
                <li>Menu 4.2</li>
            </ul>
        </li>
        <li>Menu 5</li>
    </ul>
</nav>
<p align="center">Дата: <input type="text" id="datepicker"></p><br>
<div id="accordion">
    <h3>Первый пункт</h3>
    <div>
        <p>
            Текст 1
        </p>
    </div>
    <h3>Второй пункт</h3>
    <div>
        <p>
            Текст 2
        </p>
    </div>
    <h3>Третий пункт</h3>
    <div>
        <p>
            Текст 3
        </p>
    </div>
</div>
<div>
    <ul class='social'>
        <li>
            <a class="fa fa-facebook" href="https://uk-ua.facebook.com/">
                <span>Facebook</span>
            </a>
        </li>

        <li>
            <a class="fa fa-twitter" href="https://twitter.com/">
                <span>Twitter</span>
            </a>
        </li>

        <li>
            <a class="fa fa-google-plus" href="https://www.google.com.ua/">
                <span>Google </span>
            </a>
        </li>
    </ul>
</div>
<div>
    <a href="https://twitter.com" class="twitter-share-button"
       data-show-count="false">Tweet</a>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8">
    </script>
</div>
<div id="MeteoInformerWrapOuther" class="informers">
    <div>
        <script type="text/javascript">
            var css_file=document.createElement("link");
            css_file.setAttribute("rel","stylesheet");
            css_file.setAttribute("type","text/css");
            css_file.setAttribute("href","//s.bookcdn.com//css/cl/bw-cl-180x170r1.css");
            document.getElementsByTagName("head")[0].appendChild(css_file);
        </script> <div id="tw_11_1887429587"><div style="width:120px; height:140px; margin: 0 auto;">
        <a href="https://hotelmix.com.ua/time/kiev-18881">Київ</a><br/></div>
    </div> <script type="text/javascript">
        function setWidgetData_1887429587(data){
        if(typeof(data) != 'undefined' && data.results.length > 0) {
            for(var i = 0; i < data.results.length; ++i) {
                var objMainBlock = ''; var params = data.results[i];
                objMainBlock = document.getElementById('tw_'+params.widget_type+'_'+params.widget_id);
                if(objMainBlock !== null) objMainBlock.innerHTML = params.html_code; }
        }
        }
        var clock_timer_1887429587 = -1;
    </script>
        <script type="text/javascript" charset="UTF-8" src="https://widgets.booked.net/time/info?ver=2&domid=&type=11&id=1887429587&scode=124&city_id=18881&wlangid=29&mode=2&details=0&background=ffffff&color=363636&add_background=ffffff&add_color=333333&head_color=ffffff&border=0&transparent=0"></script>
    </div>
    <div id="MeteoInformerWrap">
        <script type="text/javascript" src="https://meteo.ua/var/informers.js"></script>
        <script type="text/javascript">
            makeMeteoInformer("https://meteo.ua/informer/get.php?cities=34;35;102643743;102988507&w=265&lang=ua&rnd=1&or=vert&clr=6&dt=today&style=classic",265,436);
        </script>
    </div>
    <div>
        <div id='kurs-com-ua-informer-main-ukraine-300x130-blue-container'>
            <a href="//old.kurs.com.ua/informer" id="kurs-com-ua-informer-main-ukraine-300x130-blue"
               title="Курс валют информер Украина" rel="nofollow" target="_blank">Информер курса валют</a>
        </div>
        <script type='text/javascript'>
            (function() {
                var iframe = '<ifr'+'ame src="//old.kurs.com.ua/informer/inf2?color=blue" ' +
                    'width="300" height="130" frameborder="0" vspace="0" scrolling="no" hspace="0">' +
                    '</ifr'+'ame>';var container = document.getElementById('kurs-com-ua-informer-main-ukraine-300x130-blue');
                container.parentNode.innerHTML = iframe;})();
        </script>
        <noscript>
            <img src='//old.kurs.com.ua/static/images/informer/kurs.png' width='52' height='26'
                 alt='kurs.com.ua: курс валют в Украине!' title='Курс валют' border='0' />
        </noscript>
    </div>

    <div id="gallery" style="display:none;">

        <img alt="Image 1 Title" src="images/kitty1.jpg"
             data-image="images/kitty1.jpg"
             data-description="Image 1 Description">

        <img alt="Image 2 Title" src="images/kitty2.jpg"
             data-image="images/kitty2.jpg"
             data-description="Image 2 Description">
    </div>
</div>
<a style="font-family: Arial; size: 30px;" href="5_gallery.html">Перейти до галереї</a>
</body>
</html>