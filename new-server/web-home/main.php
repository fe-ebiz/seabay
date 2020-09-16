	<link rel="stylesheet" type="text/css" href="http://static.seabay.co.kr/svc/css/jquery.bxslider.css" />

	<script src="http://www.youtube.com/player_api"></script>
	<script type="text/javascript" src="http://static.seabay.co.kr/svc/js/init.js"></script>
	<script type="text/javascript" src="http://static.seabay.co.kr/svc/js/init_vid.js"></script>
	<script type="text/javascript" src="http://static.seabay.co.kr/svc/js/init_player.js"></script>

	<div class="body"></div>
    <br class="br_sub">

    <div class="main">
		<?php
		/*
			$nx = 91;
			$ny = 134;
			$dust_area = "옥천동";
			include_once "/home/ebiztour/seabay.co.kr/www/web-home/common/weather.php";
			include_once "/home/ebiztour/seabay.co.kr/www/web-home/common/dust.php";			
		?>
        <div class="weather vid">
			<div class="area">
				<div class="inner">
					<span class="s-1"><?=date("Y.m.d")?> (<?=$view_week?>)</span>
					<span class="s-2">강릉의 오늘 <span class="t-1">▷</span> <?=$sky_view?></span>
					<span class="s-3"><span class="big"><?=$ondo_view?></span><span class="c">℃</span></span>
					<span class="s-4">
						<img src="http://img.sampobeach.co.kr/weather/finedust.png" alt="미세먼지">
						<span class="txt-dust">미세먼지 - <span class="grade"><?=$dust_view?></span></span>
					</span>
				</div>
				<img src="http://img.sampobeach.co.kr/weather/<?=$sky_img?>" alt="날씨">
			</div>
        </div>
		<?php
			*/
		?>

		<script>
			$(function() {
				var nx = 91;
				var ny = 134;
				var dust_area = "옥천동";

				$.ajax({
					type	:	"POST",
					data	:	{"nx":nx, "ny":ny, "dust_area":dust_area},
					url		:	"/common/weather_new.php",
					success	:	function(data) {
						$('.weather').html(data);
					}
				});
			});
		</script>

        <div class="weather vid">
        </div>
        
        <div class="vid-wrap">
            <div class="vid-bg"></div>
            <section class="vid-area m">
                <div class="vid-box">
                    <video id="vidM" playsinline="" webkit-playsinline="" preload="" autoplay="" muted="">
                        <source src="http://img.seabay.co.kr/svc/img/main/seabay_mobile.mp4" type="video/mp4" />
                    </video>
                </div>
            </section>
            <section class="vid-area pc">
                <section class="vid-box"></section>
            </section>

            <div class="vid-txt-box">
                <!-- <a href="javascript:;" class="vid-txt"><img src="http://img.seabay.co.kr/svc/img/main/bg_main_txt.png" alt="강릉씨베이호텔 자세한 정보 보기" /></a> -->
                <div class="vid-txt">
                    <a href="javascript:;" class="more-btn"><img src="http://img.seabay.co.kr/svc/img/main/bg_main_txt.png" alt="자세한 정보 보기" class="more-btn-img"></a>
                    <a href="http://seabay.co.kr/reserve/" class="book-btn hidden-mdlg"><img src="http://img.seabay.co.kr/svc/img/main/bt_main_reserv.png" alt="실시간 객실예약" class="book-btn-img"></a>
                </div>
            </div>
        </div>

		<?php /* 191008 디자인 변경으로 슬라이드 주석처리 - 전과장님 요청 : 성다솜 */ ?>
        <!-- <section class="slider_section">
            <div class="main_info">
                <p>A Home away from Home</p>
            </div>
            <div id="slider_main" class="slider_container smain">
                <div data-u="slides" class="slides">
                    <div><img data-u="image" class="main-visibility" src="http://img.seabay.co.kr/svc/img/main/main015519.jpg" alt="01" /></div>
                    <div><img data-u="image" class="main-visibility" src="http://img.seabay.co.kr/svc/img/main/main025519.jpg" alt="02" /></div>
                    <div><img data-u="image" class="main-visibility" src="http://img.seabay.co.kr/svc/img/main/main035519.jpg" alt="03" /></div>
                    <div><img data-u="image" class="main-visibility" src="http://img.seabay.co.kr/svc/img/main/main045519.jpg" alt="04" /></div>
                    <div><img data-u="image" class="main-visibility" src="http://img.seabay.co.kr/svc/img/main/main055519.jpg" alt="05" /></div>
                </div>
                <span u="arrowleft" class="jssor-sprite arow-left" style="width: 21px; height: 32px; top: 200px; left: 20px;"></span>
                <span u="arrowright" class="jssor-sprite arow-right" style="width: 21px; height: 32px; top: 200px; right: 20px"></span>
            </div>
            <div id="slider_mmain" class="slider_container mob">
                <div data-u="slides" class="slides">
                    <div><img data-u="image" class="main-visibility" src="http://img.seabay.co.kr/svc/img/main/mmain015519.jpg" alt="01" /></div>
                    <div><img data-u="image" class="main-visibility" src="http://img.seabay.co.kr/svc/img/main/mmain025519.jpg" alt="02" /></div>
                    <div><img data-u="image" class="main-visibility" src="http://img.seabay.co.kr/svc/img/main/mmain035519.jpg" alt="03" /></div>
                    <div><img data-u="image" class="main-visibility" src="http://img.seabay.co.kr/svc/img/main/mmain045519.jpg" alt="04" /></div>
                    <div><img data-u="image" class="main-visibility" src="http://img.seabay.co.kr/svc/img/main/mmain055519.jpg" alt="05" /></div>
                </div>
                <span u="arrowleft" class="jssor-sprite arow-left" style="width: 21px; height: 32px; top: 200px; left: 20px;"></span>
                <span u="arrowright" class="jssor-sprite arow-right" style="width: 21px; height: 32px; top: 200px; right: 20px"></span>
            </div>
        </section> -->
        <section id="mainRest" class="body_section">
            <div class="main_reservation">
                <div class="container">				
					<?php
						$action = "//gangneung.go.co.kr";
						if(USER_FLAG == "M") {
							$action = "//mgangneung.go.co.kr/view/";
						}

						$action = "http://seabay.co.kr/reserve";	// 2019.07.16 박상현 : 이사님 지시로 강릉.고 도메인 미사용
					?>
                    <form method="get" name="myForm" id="myForm" action="<?=$action;?>" target="_blank">
						<?php						
						if(!empty($_COOKIE["pid"]) && $_COOKIE["pid"] != "") {
						?>
						<input type="hidden" value="<?=$_COOKIE["pid"];?>" name="pid" />
						<?php
						}
						?>
                        <ul class="inputs ">
                            <li>
                                <span>실시간 객실예약</span>
                            </li>
                            <li>
                                <div class="date_input">
                                    <input type="input" onclick="on_submit()" name="sub_sdate" value="<?=date("Y-m-d");?>" placeholder="Check in" readonly />
                                    <i class="icon-12"></i>
                                </div>
                            </li>
                            <li>
                                <div class="date_input">
                                    <input type="input" onclick="on_submit()" name="sub_edate" value="<?=date("Y-m-d",strtotime("+1 days"));?>" placeholder="Check out" readonly />
                                    <i class="icon-12"></i>
                                </div>
                            </li>
                            <!--li>
                                <div class="date_input">
                                    <input type="number" name="room_cnt" value="1" min="1" onKeyup="number_check(this)" placeholder="Check out" />
                                    <p class="ad_form_label">객실</p>
                                </div>
                                <input type="hidden" name="adults" value="1" />
                                <input type="hidden" name="children" value="" />
                            </li-->
                            <li>
                                <button type="button" onclick="on_submit()">객실 예약하기</button>
                            </li>
                            <!--li>
                                <div class="temp_data" title="오늘의 날씨">
                                    <div class="temp">
                                        <span class="do">24</span>
                                        <div class="tmx">↑<span>25</span> ↓<span></span></div>
                                        <div class="day">Tue 18</div>
                                    </div>
                                    <div class="sky">
                                        <i class="icon-16"></i>
                                        <span class="today">TODAY</span>
                                    </div>
                                </div>
                            </li-->
                        </ul>
                    </form>
                </div>
            </div>
            <!-- <div class="container">
                <div class="main_notice_event">
                    <div class="main_notice_wrap">
                        <div class="main_notice">
                            <div class="title">
                                <a href="brd/lists/notice.php">NOTICE<div class="btn_more">+</div></a>
                            </div>
                            <ul class="content box_bodder_top">
                                <li><a href="brd/view/notice/1550.php">[알림] 객실정비 품질 향상 및 개선 안내</a></li>
                                <li><a href="brd/view/notice/1549.php">[알림] <?=site_title;?> 5층 수영장 오픈안내</a></li>
                                <li><a href="brd/view/notice/1541.php"><?=site_title;?>, 경포아쿠아리움과의 제휴</a></li>
                                <li><a href="brd/view/notice/1520.php"><?=site_title;?>의 강릉거주민 특별 혜택</a></li>
                                <li><a href="brd/view/notice/1514.php">[공지] 밸류플레이트 휴장안내</a></li>
                                <li><a href="brd/view/notice/1483.php">[공지] 수영장 폐장</a></li>
                                <li><a href="brd/view/notice/1379.php">[공지] 수영장 이용 안내 문의</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="main_event_wrap">
                        <div class="main_event">
                            <div class="title">
                                <a style="cursor:pointer;" onclick="javascript: alert('모든 이벤트가 종료되었습니다.');">EVENT<div class="btn_more">+</div></a>
                            </div>
                            <div class="content">
                                <div class="event_item_wrap event_index_1">
                                    <div class="event_item">
                                        <img src="http://img.seabay.co.kr/svc/fil/Board/1100/785fd37db077385c6c110338b7a05518.jpg" />
                                        <div class="event_title">
                                            <?=site_title;?>, 구정맞이 '복福'맞이 패키지<br />
                                            2019-01-12 ~ 2019-01-31 <a style="cursor:pointer;" onclick="javascript: alert('종료된 이벤트입니다.');">바로가기</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="event_item_wrap event_index_2">
                                    <div class="event_item">
                                        <img src="http://img.seabay.co.kr/svc/fil/Board/1100/55a45ac7e0938c9ed54067a3fa56b2f3.jpg" />
                                        <div class="event_title">
                                            고객증정 쿠폰<br />
                                            2018-11-05 ~ 2019-04-30 <a style="cursor:pointer;" onclick="javascript: alert('종료된 이벤트입니다.');">바로가기</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </section>

        <section class="notice-sec">
            <h1 class="sr-only">씨베이호텔 토픽 및 공지사항</h1>
            <div class="group">
                <div class="topic-wrap">
                    <div class="topic-header">
                        <div class="title">
                            <a href="#none" class="link nope">씨베이호텔 토픽
                                <span class="hidden-smxs">
                                    <img src="http://img.seabay.co.kr/svc/img/icon/ico_sb.png" alt="설명" class="ico-sb">
                                    <span class="sm">매일 아침을 아름다운 동해의 일출로 시작하세요.</span>
                                </span>
                                <div class="ico-plus-cont blue">
                                    <div class="ico-wrap">
                                        <div class="ico-container">
                                            <div class="ico-body">
                                                <span class="ico-bar"></span>
                                                <span class="ico-bar"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="topic-body">
                        <div class="title hidden-mdlg">
                            <a href="#none" class="nope">
                                <img src="http://img.seabay.co.kr/svc/img/icon/ico_sb.png" alt="설명" class="ico-sb">
                                <span class="sm">매일 아침을 아름다운 동해의 일출로 시작하세요.</span>
                            </a>
                        </div>
                        <div class="bx-box">
                            <ul class="bx-s fnBxSlider">
                                <li class="item"><a href="#none" class="nope"><img src="http://img.seabay.co.kr/svc/img/main/topic/sw_02.jpg" alt=""></a></li>
                                <!--
                                <li class="item"><a href="http://seabay.co.kr/facilities/?r=swimmingpool_infinite"><img src="http://img.seabay.co.kr/svc/img/main/topic/sw_02.jpg" alt="인피니티 풀"></a></li>
                                <li class="item"><a href="http://seabay.co.kr/facilities/?r=swimmingpool"><img src="http://img.seabay.co.kr/svc/img/main/topic/sw_01.jpg" alt="패밀리 풀"></a></li>
								<li class="item"><a href="http://seabay.co.kr/facilities/?r=swimmingpool"><img src="http://img.seabay.co.kr/svc/img/main/topic/sw_03.jpg" alt="패밀리 풀"></a></li>-->
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="notice-wrap">
                    <div class="notice-header">
                        <div class="title">
                            <a href="http://seabay.co.kr/brd/lists/notice.php" class="link">공지사항
                                <div class="ico-plus-cont blue">
                                    <div class="ico-wrap">
                                        <div class="ico-container">
                                            <div class="ico-body">
                                                <span class="ico-bar"></span>
                                                <span class="ico-bar"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="notice-body">
                        <ul class="notice-list">							
							<?php						
								$qry = "select * from brand_board where p_no = '".p_no."' and btype = 'notice' and state = 'Y' order by num desc";
								$res = $go_slave->query($qry);
								while($row = $go_slave->fetch($res)) {
							?>
                            <li><a href="brd/view/notice/?r=<?=$row["num"];?>"><?=$row["subject"];?></a></li>
							<?php
								}
							?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

		<?php
			include("./main_room.php");
		?>

    </div>

    <!-- 팝업 : 나오지않게 주석처리 -->
    <!-- <div class="event_pop">
        <div class="top">
            <label><input type="checkbox" /> 12시간 동안 보지않기</label>
            <button type="button"><i class="icon-29"></i></button>
        </div>
        <div class="pop">
            <div class="slider_container pop">
                <div data-u="slides" class="slides">
                    <div>
                        <img data-u="image" class="slide-img" src="http://img.seabay.co.kr/svc/img/event/ondol.jpg" title="수영장 안내" />
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <img data-u="image" class="slide-img" src="http://img.seabay.co.kr/svc/img/event/2020_bf.jpg" title="수영장 안내" /> -->
    <!-- <a href="http://seabay.co.kr/facilities/?r=swimmingpool_infinite">
        <img data-u="image" class="slide-img" src="http://img.seabay.co.kr/svc/fil/Board/1500/477503d947581c7ee978d70c3b617eb5.jpg" title="수영장 안내" />
    </a> -->


	<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script>
        $(function() {
            $(".fnBxSlider").bxSlider({
                // mode: 'fade',
                auto: true,
                autoControls: false,
                speed: 500,
                duration: 6000,
				touchEnabled: false //이미지 하나여서 터치 스와이프 막음
            });
        });
    </script>

    <!-- 아고다 팝업 -->
    <div class="pop-agoda">
        <img src="http://img.seabay.co.kr/svc/img/popup/pop_agoda.jpg" alt="아고다 팝업">
    </div>
        

    <script>
        //아고다 팝업용
        $(document).ready(function(){
            //3.0초 뒤 사라짐
            setTimeout(function() {
                $('.pop-agoda').hide();
            },3000);
        });
    </script>
    <!--//// 아고다 팝업 -->

    <!-- 위메프 팝업 -->
    <!-- <div class="popup-event">
        <div class="popup-box">
            <a class="pop-url-pc" target="_blank" href="https://tour.wd.wemakeprice.com/khotel/detail/vendors?hotelId=2296831&checkin=2020-09-01&checkout=2020-09-02&numberOfAdults=2&agesOfChildren=&numberOfRooms=1">
                <img src="http://img.seabay.co.kr/svc/img/popup/wemake_hotprice.png" alt="01">
            </a>
            <a class="pop-url-mobile" target="_blank" href="https://mtour.wd.wemakeprice.com/khotel/detail/vendors?hotelId=2296831&checkin=2020-09-01&checkout=2020-09-02&numberOfAdults=2&agesOfChildren=&numberOfRooms=1">
                <img src="http://img.seabay.co.kr/svc/img/popup/wemake_hotprice.png" alt="02">
            </a>
        </div>
        <div class="btn-pop-close-box">
            <button class="btn-pop-close" type="button">X</button>
        </div>
    </div>

    <script>
        $(".btn-pop-close").on('click', function(){
            $(".popup-event").css("display","none");
        });
    </script> -->
    <!--//// 위메프 팝업 -->