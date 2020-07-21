<?php

include_once ("/home/ebizdev/seabay.co.kr/config/config.php");
include_once (INC_DIR."/class/go_basic.class.php");
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title> 국내외여행, 호텔, 편션, 리조트, 콘도 최저가할인예약 GO.CO.KR </title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="format-detection" content="telephone=no, address=no, email=no">

    <!-- 폰트어썸 CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

    <!--기존(옛날)-->
    <!-- <link rel="stylesheet" href="https://static.go.co.kr/css/reset_custom.css">
    <link rel="stylesheet" type="text/css" href="https://static.go.co.kr/css/mobile_landing.css">  -->
    <!--//기존(옛날)-->

    <!-- <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800&amp;display=swap" rel="stylesheet"> -->

    <!--신규-->
    <link rel="stylesheet" href="http://static.seabay.co.kr/svc/css/landing/base.css">
    <link rel="stylesheet" href="http://static.seabay.co.kr/svc/css/landing/landing_list.css">
    <!-- <link rel="stylesheet" href="../../../static/svc/css/landing/landing_list.css"> -->
    <!--//신규-->

    <!-- jquery라이브러리 -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>

<body>
    <div class="park-wrap">
        <section class="main-contents">
            <div class="contents-top">
                <img src="http://img.seabay.co.kr/svc/img/landing/sebeaySwim_20200721/park/land_park01.jpg" alt="씨베이 콘텐츠">
            </div>
            <div class="contents-park-list">
                <a href="http://kko.to/3tY4i_fDp" target="_blank" title="페이지이동">
                    <img src="http://img.seabay.co.kr/svc/img/landing/sebeaySwim_20200721/park/btn_park01.jpg" alt="무료 교향리 주차장">
                </a>
                <a href="http://kko.to/zebfW_4DB" target="_blank" title="페이지이동">
                    <img src="http://img.seabay.co.kr/svc/img/landing/sebeaySwim_20200721/park/btn_park02.jpg" alt="무료 교향리 주차장">
                </a>
                <a href="http://kko.to/ZR_4iVfYH" target="_blank" title="페이지이동">
                    <img src="http://img.seabay.co.kr/svc/img/landing/sebeaySwim_20200721/park/btn_park03.jpg" alt="무료 교향리 주차장">
                </a>
                <a href="http://kko.to/hRDti_fY0" target="_blank" title="페이지이동">
                    <img src="http://img.seabay.co.kr/svc/img/landing/sebeaySwim_20200721/park/btn_park04.jpg" alt="무료 교향리 주차장">
                </a>
            </div>
            <div class="contents-logo">
                <img src="http://img.seabay.co.kr/svc/img/landing/sebeaySwim_20200721/park/land_park02.jpg" alt="씨베이 콘텐츠">
            </div>
        </section>
        <!--버튼-->
        <ul class="btn-box-ul">
            <li>
                <a href="http://seabay.co.kr/" target="_blank" class="btn-home" title="페이지 이동">
                    <img src="http://img.seabay.co.kr/svc/img/landing/sebeaySwim_20200721/btn_home.jpg" alt="씨베이호텔 홈페이지">
                </a>
            </li>
            <li>
                <a href="http://seabay.co.kr/landing/park.php" title="페이지 이동">
                    <img src="http://img.seabay.co.kr/svc/img/landing/sebeaySwim_20200721//btn_parking.jpg" alt="주차장 이용안내">
                </a>
            </li>
            <li>
                <a href="http://seabay.co.kr/landing/swim.php" title="페이지 이동">
                    <img src="http://img.seabay.co.kr/svc/img/landing/sebeaySwim_20200721/btn_swimming.jpg" alt="수영장 이용안내">
                </a>
            </li>
        </ul>
        <!--//버튼-->
    </div>
</body>

</html>


<?php
include_once (INC_DIR."/config/closedb.php");
?>