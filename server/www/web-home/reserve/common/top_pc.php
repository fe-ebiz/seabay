<!DOCTYPE html>
<!--[if IE 8]><html lang="ko-KR" class="no-js ie8 lt-ie10"><![endif]-->
<!--[if IE 9]><html lang="ko-KR" class="no-js ie9 lt-ie10"><![endif]-->
<!--[if !IE]><!-->
<html lang="ko-KR">
<!--<![endif]-->

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="서울 1시간 30분, 강릉 글로벌 호텔, 패밀리룸, 기업연회, 해돋이 명소,도깨비 촬영지">
    <meta name="keywords" content="밸류호텔, <?=site_title?>, 강릉, 강원도 호텔, 강릉호텔, 강릉호텔 추천, 평창올림픽, 올림픽 호텔, 평창 호텔, 포 호텔, 세인트존스호텔,강릉 씨마크호텔, 주문진호텔,강릉 숙박, 강릉 리조트,정동진, 정동진 호텔, 속초 호텔, 속초 호텔 추천, 양양, 양양호텔, 강원 패키지 예약, 강원 할인 특가, 호텔 예약, 객실 예약, 강릉 숙박, 강릉 맛집, 강릉 숙소, 강릉 리조트">
	
	<title><?=site_title?></title>
    <meta property="og:title" content="<?=site_title?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="http://img.seabay.co.kr/svc/img/sample/sns_thumb.jpg">

    <meta name="twitter:title" content="<?=site_title?>">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:image" content="http://img.seabay.co.kr/svc/img/sample/sns_thumb.jpg">
    <!--<link rel="canonical" href="도메인">-->

    <!--폰트-->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+KR:400,500,700&display=swap" rel="stylesheet">

    <!--공통 Css-->
    <link rel=stylesheet href="<?=base_static;?>/css/reset.css">
    <link rel=stylesheet href="<?=base_static;?>/css/common.css">
    <link rel=stylesheet href="<?=total_css;?>/swiper.min.css">
    <!--개별 Css-->
    <link rel=stylesheet href="<?=base_static;?>/css/reservation/init.css">
    <!-- <link rel="stylesheet" type="text/css" href="http://static.seabay.co.kr/svc/css/style.min.css"> -->
        


    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/detectizr/1.5.0/detectizr.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        Modernizr.Detectizr.detect();

		var base_url = "seabay.co.kr";
		var base_url2 = "seabay.co.kr";
    </script>

    <!--공통 Js-->
    <script src="<?=base_static;?>/js/common.js"></script>
    <script src="<?=total_js;?>/swiper.min.js"></script>
    <!--개별 Js-->
	<?php
		if($cus == "reserve") {
	?>
    <script src="<?=base_static;?>/js/reservation/init.js"></script>
	<script src="<?=total_js;?>/jwSlide_ver2.js"></script>
	<script src="<?=total_js;?>/picker_pc.js"></script>
	<script src="<?=total_js;?>/reserve_pc.js"></script>
	<?php
		}
	?>

    <!--[if lt IE 9]>
        <script type="text/javascript" src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<script>
	function button_count(pno, bt_type) {
		$.ajax({
			url : "../reservation/state.php",
			type: "post",
			data: "mode=bt_count&pno="+pno+"&bt_type="+bt_type,
			success: function(e) {
			
			}
		}); 
	}
	</script>

	<?php if(USER_FLAG == "M") { ?>
		<link rel="stylesheet" href="<?=total_css?>/moblie_reset.css" type="text/css">
		<link rel="stylesheet" href="<?=total_css?>/mobile_layout3.css" type="text/css">
		<link rel="stylesheet" href="//static.go.co.kr/css/totalmobile.css" type="text/css">
	<?php } else { ?>
		<link rel="stylesheet" type="text/css" href="<?=total_css?>/reset.css">
		<link rel="stylesheet" type="text/css" href="<?=total_css?>/layout2.css">
		<link rel="stylesheet" href="//static.go.co.kr/css/totalweb.css" type="text/css">
		<link rel="stylesheet" type="text/css" href="http://static.ocean2you.co.kr/css/layout_init.css?ver=20170904133210">
	<?php } ?>

    <script type="text/javascript" src="<?=total_js;?>/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?=total_js;?>/jquery.number.min.js"></script>

</head>

<body class="page-reservation">

    <div class="wrapper">
        <header class="header">
            <div class="gnb">
                <div class="group inner">
                    <h1 class="logo">
						<a href="<?=base_url;?>">
							<img src="<?=base_img;?>/common/logo_rsv.jpg" alt="<?=site_title?>" style="display:none;">
							<em style="line-height:60px;"><?=site_title?></em>
						</a>
					</h1>
                    <nav class="g-nav">
                        <ul class="menu cf">
                            <li class="c-blue">
								<a href="/reserve"><img src="<?=base_img;?>/common/icon/rsv.png" alt="예약"> <span>예약하기</span></a>
							</li>
                            <li class="c-blue">
								<a href="/history/?dd=<?=$go_util->XOREncode("buylist")?>">
									<img src="<?=base_img;?>/common/icon/search.png" alt="검색"> <span>예약확인</span>
								</a>
							</li>
                            <li class="c-blue">
								<?php
									if($login_mode == false) {
								?>
								<a href="/member"><span>로그인</span></a>
								<?php
									}
								?>
							</li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="call-bar">
                <div class="group inner">
                    <img src="<?=base_img;?>/common/icon/call.png" alt="전화">
                    <span class="tt">예약문의</span>
                    <span class="t"><?=GOCO_tel;?></span>
                </div>
            </div>
        </header>
        <!-- /.header -->

        <div class="contents reservation">
        </div>
        <!--//.contents-->