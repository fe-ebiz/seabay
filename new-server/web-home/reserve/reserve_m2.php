
<section class="reservation" id="setTop">
	<div class="clr"></div>

	<!--별도 고코 PC/모바일 예약하기 위치-->
	<div id="wrapper">
	
	<?php 

	if(!empty($_GET["p_no"]) && $_GET["tgu"] == "Y") { 
		$p_no = $go_util->XORDecode($_GET["p_no"]);
		$hinfo = $go_db->queryfetch("select * from n_product where no='".$p_no."'");
		$r_button1 = "";
		$r_button2 = "on";
	} else { 
		$p_no = p_no;
		$hinfo = $go_db->queryfetch("select * from n_product where no='".$p_no."'");
		$r_button1 = "on";
		$r_button2 = "";
	}


	$site_bun = site_flag;

	//20160819 신규상세페이지
	/*************************************************************************************************************/
	/** 객실리스트가 두가지 버전으로 노출 : 상세페이지상에 같이 나오는 거하고 버튼 누르면 올라오는 버전 두가지  **/
	/** a=1 이면 상세페이지상에 같이 나옴																		**/
	/** a=2 이면 하단 객실버튼 누를 때 나옴																		**/
	/*************************************************************************************************************/

	$r2_pno = r2_pno;

	include "./inc/m/img_new.php";		// 이미지 순서 재정렬, 소스 길어져서 따로 인클루드
	$vinfo = $go_db->queryfetch("select * from view_info where p_no='".$p_no."'");

	$btype = ($hinfo["p_class"] == "펜션") ? "pension" : "hotel";
	$home_str = strripos("sss".$hinfo["homepage"], "http");
	if(empty($home_str)) {
		$hinfo["homepage"] = "http://".$hinfo["homepage"];
	}

	# 앞에 붙일 파일경로 땜에 자체인지, 제휴업체인지 체크
	$file_urlchk = $go_db->queryfetch("select img_pre,site from n_product where no='".$p_no."'");
	if($file_urlchk["img_pre"] == "Y" && $file_urlchk["site"] != "yeogiya"){
		$room_url = "";
		$fimg = "";
		$fimg_ = "";
	} else{
		$room_url = file_img2."/";
		$fimg = ($hinfo["site"] == "hotelenjoy") ? file_img4 : file_img ;
		$fimg_ = $fimg."/";
	}

	$thumb_ = file_thumb3."/";

	//핀스팟
	if($hinfo["site"] == "pinspot") {
		$pinfo_ext_cnt = $go_db->queryfetch("select count(*) as cnt, sale_type from n_extension where p_no='".$p_no."'");
	}


	if($_COOKIE["all_price_banner"] != "none" || $ebiz_ip == true) {
	?>
	<!-- <img src="<?=ocean_goimg?>/mobile/m_price_all_banner_fxd.jpg" onclick="javascript:all_price()" id="price_report_banner_sub" style="width: 100%;height: 50px;margin-top:0px;"> -->
	<?php } ?>
	<style type="text/css">
	#info_img_wrpa .img_txt{
		left: 50%;
		transform: translateX(-50%);
	}
	</style>
	<input type="hidden" name="button_text" id="button_text" value="<?php if($hinfo["fgubun"] != "R") { ?>상품 선택하기<?php } else { ?>객실 선택하기<?php } ?>" />
	<div id="scroll_box">
		<!-- 상단 이미지 -->
		<div id="info_img_wrpa">
			<?php if($hinfo["site"] == "all" || $hinfo["site"] == "varonet") { ?>
				<!-- <img src="http://img.ocean2you.co.kr/lowest-price_grnty-m.jpg" alt="고코투어" id="lowest-price_grnty-m" style="position:absolute; top:8px; right:8px; z-index:2;"> -->
			<?php } ?>
		
			<!--- 이미지 슬라이드 --->
			<div class="swiper-container">
				<div class="swiper-wrapper">	
					<?php if(p_no == 517) { ?>
					<!-- 2017-07-06
					<div class="swiper-slide watch_movie">
						<div style="background:url('http://img.ocean2you.co.kr/mobile/m_movie_visual.png') 100% 100%; background-size:cover">
							<img src="http://img.ocean2you.co.kr/mobile/dummy_img.png" width="100%" />
						</div>
					</div>
					 -->
					<?php } ?>

					<?php 
					$j = 0;

					while(list($key, $value) = @each($img_arr)){
						if($value["db_name"] == "n_product_img") {
							$img_url = $fimg_;
						} else {
							if($value["db_name"] == "mobile_img") {
								// http://~ 풀 url 일 경우 그냥 가져옴
								if(strpos($value["img_src"], "http") !== false) {  
									$img_url = "";
								} else {
									// 작은 이미지 없을 경우 기존 경로에서 가져옴
									$file_check = @file("http://file.tournspa.co.kr/mobile/thumbnail_view/".$value["img_src"]);
									if (empty($file_check)) {
										$img_url = $fimg_;
									} else {
										$img_url = $thumb_;
									}
								}
							} else {
								if($value["db_name"] == "etc") {
									$img_url = base_mimg."/";
								} else {
									$img_url = $room_url;
								}
							}
						}

						//$goco_log = ($j == count($img_arr)-1) ? "<img class=\"thumLogo\" src=\"/logo.png\" alt=\"썸네일이미지 로고\">" : "";
						$img = $value["img_src"];
						$img_txt_tmp = str_replace("["," ",$value["text"]);
						$img_txt = str_replace("]"," ",$img_txt_tmp);
						$img_full = $img_url.$value["img_src"];
						$j++;

						if($value["db_name"] != "etc" && $hinfo["site"] != "ddnayo") {
							$img_full = $go_util->cache_url($img_full, 1000);
						}
						
						if(!empty($img_full)) {
					?>
					
					<div class="swiper-slide">
						<div style="background:url('<?=$img_full?>') 100% 100%; background-size:cover">
						<?php 
							if(!empty($img_txt)) {
								$img_txtre = $go_util->strcut($img_txt, 28, true); 
						?>
						<div align="center" class="img_txt"><p class="img_t"><?=$img_txtre?></p></div>
						<?php
							}
						?>
						<img src="<?=goco_mimg?>/dummy_img.png" width="100%" />
						<input type="hidden" name="img_id" id="img_id_<?=$j?>" value="<?=$value["room_id"]?>" />
						</div>
					</div>
					<?php 
						}
				}
					if($j == 0) {
						$img_full = total_img."/ready_385x257.jpg";
					?>
					<div class="swiper-slide">
						<div style="background:url('<?=$img_full?>') 100% 100%; background-size:cover">
							<img src="<?=goco_mimg?>/dummy_img.png" width="100%" />
						</div>
					</div>
					<?php
					}					
					?>
					<div class="swiper-slide">
						<div style="background:url('<?=ocean_goimg?>/mobile/thum_logo.jpg?ver=<?=date("YmdHis")?>') 100% 100%; background-size:cover">
							<img src="<?=goco_mimg?>/dummy_img.png" width="100%" />
						</div>
					</div>

				</div>
				<!-- <div class="thumbnail_logo" style="top:6px"><img src="<?=ocean_goimg?>/mobile/m_thumbnail_logo.png" alt="고코투어" class="thumbnail_logo_img" /></div> -->
				<div class="swiper-scrollbar"></div>
				<div class="swiper-button-next" style="width:38px;height:38px"><img src="<?=goco_mimg?>/btn_Next3.png" style="width:100%" /></div>
				<div class="swiper-button-prev" style="width:38px;height:38px"><img src="<?=goco_mimg?>/btn_Prev3.png" style="width:100%" /></div>
				<input type="hidden" name="total_cnt" id="total_cnt" value="<?=$j?>"/>
			</div>
		</div>

		<!-- 타이틀
		<div id="pruduct_tit_w" style="background:#ffffff">
			<div class="pruduct_tit">
				<?=$go_util->list_icon($hinfo["p_class"], $hinfo["class_txt"]);?>
				<?=$hinfo["company"]?>
			</div>
		</div>
		 -->
		
		<?php
		if($hinfo["fgubun"] != "R") {
			// 입장권
			if(S_FLAG == "YCBE") {
				//변경된 UI 여수만 선적용 
				include_once "../reserve_new/searching_spa.php";
			} else {
				include_once "../reservation2/rsv_form_step1_ver2.php";
			}
		
		} else { 
			// 모바일 include reservation 경로
			// searching -> searching_form -> searching2 -> rnew_roomlist(/room/room_jache_m, /room/room_layout_m) -> rnew_cal_info -> info_basic 참고
			include_once "../reservation/searching.php";
		}

		if($hinfo["site"] == "gpension" || $hinfo["site"] == "woori" || $hinfo["site"] == "expedia_a" || $hinfo["site"] == "expedia" || $abr == true) { 
			$basic_cont = "해당 업체는 상품에따라 취소 및 변경시 100%위약금이 발생 될수있으니, 신중한 구매 바랍니다. 결제후에 발생되는 위약금에 대해서는 책임지지 않습니다.";
		} else if($hinfo["site"] == "hottel") {
			$basic_cont = "해당상품은 특가 상품으로 결제시점부터는 어떠한 경우에도 취소 및 변경이 [절대불가] 합니다. 신중한 구매 바랍니다.";
		} else {
			$basic_cont = (!empty($img_qry["sinfo_text2"])) ? $img_qry["sinfo_text2"] : "";
		}

		if(!empty($basic_cont)) {
		?>
		<div id="notice_w">
			<div class="notice_in">
				<h4><!-- <img src="<?=base_img?>/logo.png" width="25px" style="margin-top:3px; margin-right:5px"> -->
				<span class="or_txt"><?=SITE_NAME_K?></span>에서 알립니다!</h4>
				<p><?=$basic_cont?>
				</p>
			</div>
		</div>
		<?php } ?>

		<!-- 숙소정보 -->
		<div id="room_w" style="overflow-x:hidden;overflow-y:auto">			
			<div id="room_infogo">
			<!-- <div>
				<img src="<?=ocean_goimg?>/event_waterpia.jpg" alt="" style="width:100%" />
				<img src="<?=base_img?>/tbn_pet2.jpg" alt="애완동물동반투숙" width="100%" id="pet_banner">
				<?php if($_GET["pet"] == "Y") { ?>
				<script>
				setTimeout(function() {
					var top = $("#pet_banner")[0].offsetTop;
					$("html").animate({scrollTop: top});
				}, 2000);
				</script>
				<?php } ?>
				<img src="<?=ocean_goimg?>/event_food.jpg" alt="바베큐구매" width="100%">
				<?php
					$banner_reserve = "Y";
					//include INC_DIR."/ocean2you/web-home/common/banner.php";
					$banner_reserve = "N";
				?>

			</div> -->
			<?php
				if($hinfo["site"] == "woori") {
					
					$hinfo["introduce"] = strip_tags(str_replace("&amp;nbsp;", "", $hinfo["introduce"]));
					$hinfo["introduce"] = str_replace("&nbsp;", "", $hinfo["introduce"]);
					$hinfo["introduce"] = str_replace("=", "", $hinfo["introduce"]);

				}

				switch($hinfo["site"]) {
					case "expedia":
					case "expedia_a":
						include_once "./info_cont_exp.php";	
						$pp = "on";
						break;
					
					case "gpension":
						include_once "./info_cont_gpension.php";	
						$pp = "on";
						break;
					
					case "woori":
						include_once "./info_cont_woori.php";	
						$pp = "on";
						break;	
					
					case "pinspot":
						include_once "./info_cont_pinspot.php";	
						$pp = "on";
						break;	

					default:
						include_once "./inc/m/info_cont_jache.php";	
						break;
				}		

			//} 

			?>
		</div>
		<!--취소/환불안내-->
		<div class="room_tx_in" style="clear:both;">
			<h3 class="room_title">취소/변경 및 환불안내</h3>
			<div class="txt_forms">
				<style type="text/css">
					.refund2_css th {
						border: 1px solid #cccccc;
						padding: 5px;
						font-size: 10px;
						text-align: center;
					}

					.refund2_css td {
						border: 1px solid #cccccc;
						padding: 5px;
						font-size: 10px;
					}
				</style>
				<table class="refund2_css" style="width:100%;margin-top:10px;margin-bottom:10px">
					<colgroup>
						<col width="39%">
						<col width="27%">
						<col width="24%">
					</colgroup>
					<tbody>
						<tr>
							<th style="text-align:center;font-size:12px;background-color:#e4e3e3">구분</th>
							<th style="text-align:center;font-size:12px;background-color:#e4e3e3">취소수수료율</th>
							<th style="text-align:center;font-size:12px;background-color:#e4e3e3">환불액</th>
						</tr>

						<tr>
							<td style="text-align:left;font-size:12px;padding-left:10px">이용일 기준 15일전</td>
							<td style="text-align:center;font-size:12px">10%</td>
							<td style="text-align:center;font-size:12px">90% 환불</td>
						</tr>

						<tr>
							<td style="text-align:left;font-size:12px;padding-left:10px">이용일 기준 14~10일전</td>
							<td style="text-align:center;font-size:12px">20%</td>
							<td style="text-align:center;font-size:12px">80% 환불</td>
						</tr>

						<tr>
							<td style="text-align:left;font-size:12px;padding-left:10px">이용일 기준 9~7일전</td>
							<td style="text-align:center;font-size:12px">40%</td>
							<td style="text-align:center;font-size:12px">60% 환불</td>
						</tr>

						<tr>
							<td style="text-align:left;font-size:12px;padding-left:10px">이용일 기준 6일전</td>
							<td style="text-align:center;font-size:12px">70%</td>
							<td style="text-align:center;font-size:12px">30% 환불</td>
						</tr>

						<tr>
							<td style="text-align:left;font-size:12px;padding-left:10px">이용일 기준 5일전~당일</td>
							<td style="text-align:center;font-size:12px">100%</td>
							<td style="text-align:center;font-size:12px">0% 환불</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<!--///취소/환불안내 끝-->

		<!-- 고객센터 문의하기 배너 -->
		<!-- <div id="q_quest"> 
			<p>무엇을 도와드릴까요?</p>
			<p>전문 상담원에게 물어보세요</p>
			<p><a href="javascript:cus_on('#q_modal', 'on');">고코투어 빠른 문의하기</a></p>
		</div>

		<style type="text/css">
			#q_modal ul li:nth-child(3) a:before {
				background-position: center -475px;
			}
		</style> -->

		<div id="q_modal" style="display:none;height:auto;padding-bottom:5px;">
			<h2>문의 하기<a href="javascript:cus_on('#q_modal', 'out');" class="q_clsBtn"></a></h2>
			<ul>
				<!---<li><a href="<?=base_url?>/home/customer/?dd=<?=$go_util->XOREncode('faq')?>">자주묻는 질문</a></li>--->
				<li><a href="<?=base_url?>/customer/?dd=<?=$go_util->XOREncode('list2')?>&brd=<?=$go_util->XOREncode('one')?>">1:1 문의하기</a></li>
				<!-- 평일 9시~18시에만 카카오톡 항목 노출 그 외 1:1 문의하기 
				<?php if(date("H") >= 8 && date("H") <= 15) { ?>
				<li><a href="http://plus.kakao.com/home/lwaac3va" target="_blank">카카오톡 문의</a></li>
				<?php } else { ?>
				<li><a href="<?=base_url?>/home/customer/?dd=<?=$go_util->XOREncode('list2')?>&brd=<?=$go_util->XOREncode('one')?>">1:1 문의하기</a></li>
				<?php } ?> -->

				<!-- 평일 09시~02시, 주말 공유일 09시 ~ 17시 항목 노출, 그 외 비노출 -->
				<?php 
				$chk_da = $go_util->holiday_chk(date("Y-m-d"), 0);
				$chk_ni = array("2", "3", "4", "5", "6", "7");
				if(($chk_da == "Y" && date("H") >= 8 && date("H") <= 16) || ($chk_da == "N" && !in_array(date("H"), $chk_ni))) { ?>
				<li><a href="javascript:cus_on('#q_notice', 'on');">전화 문의</a></li>
				<?php } ?>
				<li>
				<a href="#" onclick="$('#group_opop').show();">단체문의</a>
				<!--<a href="<?=base_url?>/customer/?dd=<?=$go_util->XOREncode('write')?>&brd=<?=$go_util->XOREncode('one')?>&p_no=<?=$go_util->XOREncode($p_no)?>&abr=<?=$go_util->XOREncode($abr)?>&type=group">단체문의</a>-->
				</li>
			</ul>
		</div>

		<div id="q_notice" style="display:none;">
			<h2>알림<a href="javascript:cus_on('#q_notice', 'out');" class="q_clsBtn"></a></h2>
			<div>
				<p>고코투어 고객센터로 전화 연결합니다</p>
				<p>(상담시간: 평일 오전 9시 ~ 오후 2시
						<br/>주말공휴일 오전 9시 ~ 오후 5시)
				</p>
			</div>
			<p><a href="javascript:cus_on('#q_notice', 'out');">취소</a><a href="tel:<?=GOCO_tel?>">전화연결</a></p>
		</div>
		<!-- 카톡상담 
		<div id="kaka_advice">
			<span class="txt">더 궁금한 사항은 언제든지 문의주세요.</span><br/>
			<span class="btn"><a href="kakaoplus://plusfriend/friend/@고코투어"><img src="<?=goco_mimg?>/pruduct_ka_bt.png" width="90px" /></a></span>
		</div>
		-->
	</div>



	<style>
	.img_t { font-size:0.813em; color:#fff; letter-spacing:1px; text-align:center; opacity:none; line-height:23px;vertical-align:middle; }
	.img_txt { position: absolute; bottom:30px; border-radius:80px; background-color: rgba(75,68,67,0.7); position:absolute; left:50%; transform:translate(-50%); padding: 0 20px; height:23px;text-align:center;color:#fff; text-overflow:ellipsis;white-space:nowrap;} 


	.swiper-button-prev, .swiper-container-rtl .swiper-button-next {background-image:none;opacity:1}
	.swiper-button-next, .swiper-container-rtl .swiper-button-prev {background-image:none;text-align:right;opacity:1}
	.swiper-scrollbar-drag { background-color:#FFFFFF; }
	.swiper-container-horizontal>.swiper-scrollbar { background-color:rgba( 255, 255, 255, 0.5 ); margin-bottom:5px; height:3px} /* 흰색 바에 불투명도 */

	.swiper-container-horizontal>.swiper-pagination { bottom: 0.5;}
	.swiper-container-horizontal>.swiper-pagination .swiper-pagination-bullet {margin:0 4px;} 
	.swiper-pagination-bullet {background:#ffffff;width:10px;height:10px;opacity:0.5;}
	.swiper-pagination-bullet-active {background:#ff4300;opacity:1}

	.pop_snsShare{position:absolute; z-index:999; left:5%; top:20%; margin:auto; width:90%; border-radius:10px; background:#fff; color:#000; text-align:center; letter-spacing:-0.5px}
	.pop_snsShare .title{float:left; position:relative; width:100%; padding:10px 0; border-top-left-radius:10px; ; border-top-right-radius:10px; background:#f95c24; }
	.pop_snsShare .title p{padding-left:20px; font-size:1.125em; text-align:left; color:#fff;}
	.pop_snsShare .title .close{position:absolute; top:10px; right:15px}
	.pop_snsShare .iconBox{display:table; width:100%; padding:30px 0; border-bottom-left-radius:10px; ; border-bottom-right-radius:10px; background:#fff; letter-spacing:-1px}
	.pop_snsShare .iconBox .icon{display:table-cell; text-align:center}
	.pop_snsShare .iconBox .icon a{color:#3f3f3f; font-size:0.875em; letter-spacing:-1px}

	</style>


	<!--- 지도앱 레이어 --->
	<div class="pop_snsShare" style="display:none" id="map_layer">
		<div class="title"><p>지도앱에서 길찾기 <span class="close"><a href="javascript:utils.out('#map_layer');"><img src="<?=ocean_goimg?>/mobile/btn_close2.png" width="25" height="25" alt="닫기"/></a></p></div>
		<div class="iconBox">
			<span class="icon"><a href="http://map.daum.net/link/map/<?=$hinfo["xpoint"]?>,<?=$hinfo["ypoint"]?>" target="_blank"><img src="<?=ocean_goimg?>/mobile/icon_mapdaum1.png" width="45" height="45"><br/>다음맵</a></span>
			<span class="icon"><a href="http://map.naver.com/?x=<?=$hinfo["ypoint"]?>&y=<?=$hinfo["xpoint"]?>&enc=b64" target="_blank"><img src="<?=ocean_goimg?>/mobile/icon_mapnaver1.png" width="45" height="45"><br/>네이버맵</a></span>
			<span class="icon"><a href="https://www.google.co.kr/maps/@<?=$hinfo["xpoint"]?>,<?=$hinfo["ypoint"]?>,12z" target="_blank"><img src="<?=ocean_goimg?>/mobile/icon_mapgoole1.png" width="45" height="45"><br/>구글맵</a></span>
		</div>
	</div>
	<!--- 지도앱 레이어 --->

	<script type="text/javascript">
	$(function() {
		$('.map_address tr th').click(function() {
			$('.map_address tr th').removeClass('on');
			$(this).addClass('on');

			$('.map_img tr td').hide();
			$('.map_img tr td').eq($(this).index()).show();
		});

		$('.map_img tr td').not(':first').hide();
		
		/* 상단 슬라이드 */
		var swiper = new Swiper('.swiper-container', {
			scrollbar: '.swiper-scrollbar',	// 스크롤
			scrollbarHide: false,	// 스크롤 안할때도 스크롤바 숨기지 않음
			uniqueNavElements: true,
			loop:true,
			nextButton: '.swiper-button-next',
			prevButton: '.swiper-button-prev',

			autoplayDisableOnInteraction: false,
			paginationBulletRender: function (index, className) { 
				return '<span class="' + className + '"></span>'; 
			}
		});

	});

	function all_price() {
		$.cookie("all_price_banner", "none", {domain: '<?=base_cookie?>', path : '/'});
		location.href='<?=base_url?>/landing/?dd=<?=$go_util->XOREncode("all_price_1707")?>&pno=<?=$go_util->XOREncode($p_no)?>';
	}	

	function tab_on(id) {
		$("#detail_tab1 li").each(function(e) {
			var chk_id = $("#detail_tab1 li").eq(e).attr("id");
			var str_ex = chk_id.split("_on");
			$("#detail_tab1 li").eq(e).attr("id", str_ex[0]);
		});
		$("#detail_tab1 ."+id).attr("id", id+"_on");
	}


	// 고객센터 문의하기 배너
	function cus_on(obj, st) {
		if(st == "on") {
			if(obj == "#q_notice") {
				$("#q_modal").hide();
			} else { 
				var arrPageSizes = ___getPageSize();
				$("body").append("<div id=\"overlay\"></div>");
				$("#overlay").css({"background-color":"#000", "opacity":"0.7", "width":arrPageSizes[0], "height":arrPageSizes[1]});
			}
			$(obj).css({"z-index": 110 }).show();
			$("#top_box").css("z-index", "5");
		} else {
			$("#overlay").slideUp(function(){ $("#overlay").remove(); });
			$(obj).hide();
			$("#top_box").css("z-index", "9999");
			$("#topSearch").css("z-index", "9999");	
		}
	}
	</script>


	</div>
	
	<div class="clr"></div>
</section>
