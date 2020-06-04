<?php
	include("/home/ebiztour/seabay.co.kr/config/config.php");
	include(INC_DIR."/class/go_basic.class.php");
?>

<!DOCTYPE html>
<html lang="ko">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?=SITE_NAME_K_short;?></title>
	<meta name="title" content="<?=SITE_NAME_K_short;?>">
	<meta name="description" content="<?=site_description;?>">
	<meta name="keywords" content="밸류호텔, 씨베이호텔, 강릉, 강원도 호텔, 강릉호텔, 강릉호텔 추천, 평창올림픽, 올림픽 호텔, 평창 호텔, 포 호텔, 세인트존스호텔,강릉 씨마크호텔, 주문진호텔,강릉 숙박, 강릉 리조트,정동진, 정동진 호텔, 속초 호텔, 속초 호텔 추천, 양양, 양양호텔, 강원 패키지 예약, 강원 할인 특가, 호텔 예약, 객실 예약, 강릉 숙박, 강릉 맛집, 강릉 숙소, 강릉 리조트">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<meta property="og:type" content="website">
	<meta property="og:title" content="<?=SITE_NAME_K_short;?>">
	<meta property="og:description" content="<?=site_description;?>">
	<meta property="og:image" content="http://img.seabay.co.kr/svc/img/sample/sns_thumb.jpg">

	<link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="http://<?=$_SERVER["HTTP_HOST"];?>/mng/assets/hotelstory/amenitys/style.css" />
	<link rel="stylesheet" type="text/css" href="http://<?=$_SERVER["HTTP_HOST"];?>/lib/icomoon/style.css" />

	<link rel="stylesheet" type="text/css" href="http://static.seabay.co.kr/svc/common/css/init.min.css" />
	<link rel="stylesheet" type="text/css" href="http://static.seabay.co.kr/svc/css/style.min.css" />
	<link rel="stylesheet" type="text/css" href="http://static.seabay.co.kr/svc/common/javascript/lib/datepicker/css/theme01.css" />
	<link rel="stylesheet" type="text/css" href="http://static.seabay.co.kr/svc/lib/slick-master/slick/slick.css" />
	<link rel="stylesheet" type="text/css" href="http://static.seabay.co.kr/svc/lib/slick-master/slick/slick-theme.css" />
	<link rel="stylesheet" type="text/css" href="http://static.seabay.co.kr/svc/common/javascript/lib/jquery/jquery-ui-1.12.1.min.css" />
	<!--link rel="shortcut icon" type="image/x-icon" href="http://img.seabay.co.kr/svc/img/symbol/favicon.ico" /-->	

	<script type="text/javascript" src="http://static.seabay.co.kr/svc/common/javascript/lib/jquery/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="http://static.seabay.co.kr/svc/common/javascript/lib/jquery/jquery-ui-1.12.1.min.js"></script>
	<script type="text/javascript" src="http://static.seabay.co.kr/svc/common/javascript/lib/datepicker/js/bootstrap-datepicker.min.js"></script>
	<script type="text/javascript" src="http://static.seabay.co.kr/svc/js/common.js"></script>

	<!-- totalweb -->
	<link rel="stylesheet" href="http://static.ocean2you.co.kr/css/renew/totalweb.css">
	<script src="http://static.ocean2you.co.kr/js/renew/totalweb.js"></script>
	
	<script type="text/javascript" src="http://static.bscondo.co.kr/js/common_reserve.js?ver=<?=date("YmdHis")?>"></script>

	<!--[if lt IE 9]>
		<script type="text/javascript" src="http://static.seabay.co.kr/svc/common/javascript/lib/support/html5shiv.js"></script>
		<script type="text/javascript" src="http://static.seabay.co.kr/svc/common/javascript/lib/support/respond.min.js"></script>
	<![endif]-->
</head>

<?php
	$b_class = "";
	$h_class = "";
	if($cus == "home") {
		$b_class = "class=\"page-home\"";
	}
	if($cus == "rooms") {
		$b_class = "class=\"page-rooms\"";
	}

	if($cus == "park") {
		$b_class = "class=\"page-landing\"";
	}

	if($cus == "home") $h_class = "vid";
?>

<body <?=$b_class;?>>

<header class="header <?=$h_class;?>">
	<div class="ajax_loader b_hide">
		<div>
			<img src="http://img.seabay.co.kr/svc/img/loader/loading.gif" />
			<p>처리 요청 중입니다.</p>
		</div>
	</div>

	<div class="image_view_container">
		<div class="view">
			<i class="icon-10 img-remove"></i>
		</div>
	</div>
	<!-- <div class="top_line">
		<div class="group-f">
			<ul class="box">
				<li class="call"><i class="icon-05"></i> 1666-1243</li>
				<li class="email"><i class="icon-03"></i> valuehotelgangneung@ebiznetworks.co.kr</li>
			</ul>
		</div>
	</div> -->

	<div class="gnb">
		<div class="group-f">
			<a href="/" class="logo-box com">
				<h1>
					<img src="http://img.seabay.co.kr/svc/img/symbol/top_logo.png" alt="강릉씨베이호텔" class="logo hidden-smxs">
					<img src="http://img.seabay.co.kr/svc/img/symbol/m_top_logo.png" alt="강릉씨베이호텔" class="logo-m hidden-mdlg">
				</h1>
			</a>
			<a href="/" class="logo-box vid">
				<h1>
					<img src="http://img.seabay.co.kr/svc/img/symbol/top_logo_w.png" alt="강릉씨베이호텔" class="logo hidden-smxs">
					<img src="http://img.seabay.co.kr/svc/img/symbol/m_top_logo_w.png" alt="강릉씨베이호텔" class="logo-m hidden-mdlg">
				</h1>
			</a>
	
			<button class="nav-tab hidden-mdlg">
				<span class="bar"></span>
				<span class="bar"></span>
				<span class="bar"></span>
			</button>
	
			<nav class="cf nav">
				<span class="sr-only">전체 메뉴</span>
				<div class="bg-drop"></div>
				<div class="nav-box">
					<div class="nav-tit hidden-mdlg"> 
						<img src="http://img.seabay.co.kr/svc/img/symbol/logo_m.png" alt="강릉씨베이호텔" class="logo-menu"><span class="i-x" onclick=""></span>
						<div class="menu-btn-box">
							<a href="/reserve" class="btn-bk">객실예약</a>
							<a href="/history" class="btn-bkc">예약확인</a>
						</div>
					</div>
	
					<ul class="cf menu">
						<li>
							<a class="title">호텔소개</a>
							<ul class="sub">
								<li><a href="/main/about/">씨베이호텔 소개</a></li>
								<li><a href="/main/factsheet/">호텔시설 개요</a></li>
								<li><a href="/main/map/">오시는 길</a></li>
								<li><a href="/main/park/">주차장 이용안내</a></li>
								<li><a href="/brd/lists/notice.php">공지사항</a></li>
								<li><a href="https://www.gn.go.kr/tour/index.do" target="_blank">주변관광지 안내</a></li>
							</ul>
						</li>
						<li>
							<a class="title">객실안내</a>
							<ul class="sub">
								<li><a href="/rooms/?r=superior_db">수페리어 더블</a></li>
								<li><a href="/rooms/?r=dx_hollywood">디럭스 헐리우드</a></li>
								<li><a href="/rooms/?r=dx_korea">디럭스 한실</a></li>
								<li><a href="/rooms/?r=dx_double">디럭스 더블</a></li>
								<li><a href="/rooms/?r=dx_jacuzzi">자쿠지 패밀리트윈</a></li>
								<li><a href="/rooms/?r=dx_familytwin">디럭스 패밀리트윈</a></li>
								<li><a href="/rooms/?r=dx_quadkids">디럭스 패밀리쿼드</a></li>
								<li><a href="/rooms/?r=premier_familytwin">프리미어 패밀리트윈</a></li>
								<li><a href="/rooms/?r=royalsuite">로얄스위트</a></li>
							</ul>
						</li>
						<li>
							<a class="title">다이닝</a>
							<ul class="sub">
								<li><a href="/restaurant/?r=valueplate">밸류플레이트</a></li>
								<li><a href="/restaurant/?r=lobbybar">BAR 59</a></li>
								<li><a href="/restaurant/?r=swimmingbar">스위밍 BAR</a></li>
							</ul>
						</li>
						<li>
							<a class="title">연회&amp;부대시설</a>
							<ul class="sub">
								<li><a href="/facilities/?r=banquethall">연회장</a></li>
								<li><a href="/facilities/?r=swimmingpool">패밀리 풀</a></li>
								<li><a href="/facilities/?r=swimmingpool_infinite">인피니티 풀</a></li>
								<li><a href="/facilities/?r=businesscorner">비즈니스코너</a></li>
								<li><a href="/facilities/?r=heavenlypark">하늘공원</a></li>
							</ul>
						</li>
						<li><a href="/group"  class="title">단체문의</a></li>
						<li><a href="/rent" class="title">장기/단기 숙박</a></li>
						<li><a href="/event" class="title">이벤트/축제</a></li>
					</ul>
				</div>
			</nav>
			<div class="bk-menu ocean">
				<a href="/reserve" class="btn-bk">예약하기</a>
				<ul class="bk-list">
					<li class="item item-1 fst"><a href="/reserve">객실예약</a></li>
					<li class="item item-2"><a href="/history/?dd=Sws5TzdVKg==">예약확인</a></li>
					<li class="item item-3"><a href="/group">단체예약</a></li>
					<li class="item item-4"><a href="#none" onclick="alert('준비중입니다')">장기/단기예약</a></li>
				</ul>
			</div>
		</div>
	</div>

	<!-- <div class="top_box">
		<div class="container">
			<a href="http://seabay.co.kr">
				<div class="top_logo">
					<img src="http://img.seabay.co.kr/svc/img/symbol/top_logo.png" alt="강릉씨베이호텔">
				</div>
			</a>
		</div>
	</div>
			<div class="top_navi">
				<div class="navi_scroll">
					<div class="container">
						<a href="http://seabay.co.kr" class="logo_m">
							<div class="top_logo_c">
						<img src="http://img.seabay.co.kr/svc/img/symbol/m_top_logo.png" alt="강릉씨베이호텔">
					</div>
						</a>
						<a class="side_toggle out"><i class="icon-30"></i></a>
						<div class="left_overlay"></div>
						<div class="list">
							<button type="button" class="side_toggle"><i class="icon-29"></i></button>
							<ul>
								<li>
									<a class="title">ACCOMMODATION</a>
									<ul class="sub">
										<li><a href="/rooms/?r=18836">SUPERIOR</a></li>
										<li><a href="/rooms/?r=18837">DELUXE</a></li>
										<li><a href="/rooms/?r=19198">DELUXE FAMILY</a></li>
										<li><a href="/rooms/?r=18838">PREMIER DELUXE</a></li>
										<li><a href="/rooms/?r=18839">OCEAN SUITE</a></li>
										<li><a href="/rooms/?r=35055">OCEAN FAMILY SUITE</a></li>
									</ul>
								</li>
								<li>
									<a class="title">RESTAURANT & BAR</a>
									<ul class="sub">
										<li><a href="/restaurant/?r=valueplate">VALUE PLATE</a></li>
										<li><a href="/restaurant/?r=lobbybar">BAR 59</a></li>
										<li><a href="/restaurant/?r=swimmingbar">SWIMMING BAR</a></li>
									</ul>
								</li>
								<li>
									<a class="title">FACILITIES</a>
									<ul class="sub">
										<li><a href="/facilities/?r=banquethall">BANQUET HALL</a></li>
										<li><a href="/facilities/?r=swimmingpool">SWIMMING POOL</a></li>
										<li><a href="/facilities/?r=businesscorner">BUSINESS CORNER</a></li>
										<li><a href="/facilities/?r=heavenlypark">HEAVENLY PARK</a></li>
									</ul>
								</li>
								<li>
									<a class="title">HOTEL NEWS</a>
									<ul class="sub">
										<li><a href="/main/about/">ABOUT SEABAY HOTEL</a></li>
										<li><a href="/main/factsheet/">FACT SHEET</a></li>
										<li><a href="/main/map/">LOCATION</a></li>
										<li><a href="/brd/lists/notice.php">NOTICE</a></li>
										<li><a href="https://www.gn.go.kr/tour/index.do" target="_blank">HOT PLACE</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div> -->
</header>