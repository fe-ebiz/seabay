<?php
    $p_no = $site_info["p_no"];
    $hinfo = $go_slave->queryfetch("select * from n_product where no = '{$p_no}'");

	if(USER_FLAG == "W") {
		@header("Location: //gangneung.go.co.kr");
	}
?>
<!DOCTYPE html>
<html lang="ko-KR">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="서울 1시간 30분, 강릉 글로벌 호텔, 패밀리룸, 기업연회, 해돋이 명소,도깨비 촬영지">
    <meta name="keywords" content="밸류호텔, <?=site_title?>, 강릉, 강원도 호텔, 강릉호텔, 강릉호텔 추천, 평창올림픽, 올림픽 호텔, 평창 호텔, 포 호텔, 세인트존스호텔,강릉 씨마크호텔, 주문진호텔,강릉 숙박, 강릉 리조트,정동진, 정동진 호텔, 속초 호텔, 속초 호텔 추천, 양양, 양양호텔, 강원 패키지 예약, 강원 할인 특가, 호텔 예약, 객실 예약, 강릉 숙박, 강릉 맛집, 강릉 숙소, 강릉 리조트">
    <title><?=site_title?></title>

    <meta property="og:type" content="website">
    <meta property="og:title" content="<?=site_title?>">
    <meta property="og:description" content="서울 1시간 30분, 강릉 글로벌 호텔, 패밀리룸, 기업연회, 해돋이 명소,도깨비 촬영지">
    <meta property="og:image" content="http://img.seabay.co.kr/svc/img/sample/sns_thumb.jpg">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?=site_title?>">
    <meta name="twitter:description" content="서울 1시간 30분, 강릉 글로벌 호텔, 패밀리룸, 기업연회, 해돋이 명소,도깨비 촬영지">
    <meta name="twitter:image" content="http://img.seabay.co.kr/svc/img/sample/sns_thumb.jpg">
    <!--<link rel="canonical" href="도메인">-->

    <!--폰트-->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR:400,700&display=swap" rel="stylesheet">

    <!--공통 Css-->
    <link rel=stylesheet href="<?=base_static;?>/css/reset.css">
    <link rel=stylesheet href="<?=base_static;?>/css/m/common.css">
    <!--개별 Css-->
    <link rel=stylesheet href="<?=base_static;?>/css/m/reservation/init.css">
    <link rel="stylesheet" type="text/css" href="http://static.seabay.co.kr/svc/css/reserve.footer.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/detectizr/1.5.0/detectizr.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        Modernizr.Detectizr.detect();
        var base_url = "gangneung.go.co.kr";
        var base_url2 = "gangneung.go.co.kr";
        var burl = "gangneung.go.co.kr";
    </script>

    <!--공통 Js-->
    <script src="<?=base_static;?>/js/m/common.js"></script>
    <!--개별 Js-->
    <script src="<?=base_static;?>/js/m/reservation/init.js"></script>

    <!--[if lt IE 9]>
        <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

    <script>
    function button_count(pno, bt_type) {
        /*$.ajax({
            url : "../reservation/state.php",
            type: "post",
            data: "mode=bt_count&pno="+pno+"&bt_type="+bt_type,
            success: function(e) {
            
            }
        }); */
    }
    </script>

</head>

<!--페이지 전용 Css & Script-->
<link rel="stylesheet" href="<?=total_css;?>/mobile_layout3.css">
<link rel="stylesheet" href="//static.go.co.kr/css/totalmobile.css?ver=<?=date("YmdHis")?>">
<link rel="stylesheet" type="text/css" href="<?=total_css;?>/swiper.min.css?ver=20190523105257">

<link href="//static.go.co.kr/css/m/history/history_m.css" rel="stylesheet">
<script src="//static.go.co.kr/js/m/history/history_m.js"></script>

<script type="text/javascript" src="<?=goco_js;?>/swiper.min.js"></script>
<script type="text/javascript" src="<?=total_js;?>/all_common_ocean.js"></script>
<script type="text/javascript" src="<?=total_js;?>/common_ver2.js"></script>
<script type="text/javascript" src="<?=total_js;?>/iscroll.js"></script>
<script type="text/javascript" src="<?=total_js;?>/jquery.cookie.js"></script>
<script type="text/javascript" src="<?=total_js;?>/jquery.number.min.js"></script>

</head>

<body class="page-reservation">

    <div class="wrapper">
        <header class="header">
            <div class="gnb">
                <div class="group inner">
                    <h1 class="logo">
						<a href="<?=base_murl?>">
							<img src="<?=base_img;?>/common/logo_rsv.jpg" alt="<?=site_title?>" style="display:none;">
							<em style="line-height:50px; color:white;"><?=site_title?></em>
						</a>
					</h1>
                    <button class="appe-reset nav-tab">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </button>
                    <nav class="g-nav">
                        <span class="text-hide">메뉴</span>
                        <div class="bg-drop"></div>
                        <ul class="menu cf">
                            <li>
                                <!--img src="<?=base_img;?>/common/logo_rsv.jpg" alt="<?=site_title?>"-->
								<em style="color:white;"><?=site_title;?></em>
								<span class="a-i-x i-x" onclick=""></span>
                            </li>
                            <li><a href="<?=base_murl?>/reserve"><img src="<?=base_img;?>/common/icon/rsv.png" alt="예약"> <span>예약하기</span></a></li>
                            <li><a href="/history/"><img src="<?=base_img;?>/common/icon/search.png" alt="검색"> <span>예약확인</span></a></li>
							<?php if($login_mode != true){ ?>
                            <li class="ic-no"><a href="/member/"><span>로그인</span></a></li>
							<?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <!-- /.header -->