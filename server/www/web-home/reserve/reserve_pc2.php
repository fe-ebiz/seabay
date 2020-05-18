<?php
	$cus = "reserve";
	
	$p_no = p_no;
	$hinfo = $go_db->queryfetch("select * from n_product where no='".$p_no."'");

	$single_up = "Y";

	$local_arr = array("서울", "경기", "강원", "충북", "충남", "전북", "전남", "부산", "경남", "경북", "제주");
	if(in_array($city1, $local_arr)) {
		$right_txt_banner = "on";
		switch($city1) {
			case "서울":	$right_val = "S";	break;
			case "경기":	$right_val = "K2";	break;
			case "강원":	$right_val = "K";	break;

			case "충남":
				$right_val = "CN";
				break;

			case "충북":	
				$right_val = "CB";	
				break;

			case "전북":
				$right_val = "JB";
				break;

			case "전남":
				$right_val = "JN";	
				break;

			case "부산":	
				$right_val = "B";	
				break;

			case "경북":
				$right_val = "GB";
				break;

			case "경남":
				$right_val = "GN";	
				break;

			case "제주":	$right_val = "JJ";	break;
		}
	}


	$company = $go_util->sp_convert($hinfo["company"]);	
	$he_flag = "";

	$home_str = strripos("sss".$hinfo["homepage"], "http");
	if(empty($home_str)) {
		$hinfo["homepage"] = "http://".$hinfo["homepage"];
	}

	$p_cla = ($hinfo["chk_pack"] == "Y") ? "패키지" : $hinfo["p_class"];

	# 갤러리에서 사용하기 때문에 냅둠
	$img_qry = $go_db->queryfetch("select * from n_product_img where p_no = '".$p_no."'");

	# img_new1, img_new2 공통변수
	$img_arr = array();	// 썸네일 이미지 5장
	$img_arr2 = array(); // 더보기 클릭 시 이미지 추가
	$img_arr3 = array(); // 익스피디아 갤럴리 정렬
	$ext_arr = array("jpg", "gif", "bmp", "png", "jpeg");

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

	//주소 쪼개서 노출시키는 부분
	$addr = explode(" ", $hinfo["address1"]);
	for($i = 1; $i <= sizeof($addr); $i++) {
		$city2 .= $addr[$i]." ";
	}
	$city1 = $addr[0];

	# 여행팀에서 대표이미지 변경했는지 확인, 변경했으면 해당 변경 이미지로 노출 - 관리자에서 변경했을 경우 view_img 테이블로 들어감
	$view_chk = $go_db->queryfetch("select * from view_img where p_no='".$p_no."'");
	if(empty($view_chk["view_img1"])){
		include_once (INC_DIR."/www/web-home/reserve/inc/img_new1.php");
	} else{
		include_once (INC_DIR."/www/web-home/reserve/inc/img_new2.php");
	}
?>
 
 <!-- 예약페이지 가져오기 , 아래 부분은 개발단에서 작업(아래는 예시)-->
        <div id="contents">
            <div id="main5" style="display:block">
                <div class="left" style="position:relative">
                    <table class="photo">
                        <colgroup>
                            <col width="78">
                            <col width="78">
                            <col width="78">
                            <col width="78">
                            <col width="73">
                        </colgroup>
                        <tbody>
                            <tr>
								<td colspan="5" class="img_big" id="jwSlide_view">
									<?php 
										$img_name = $img_arr[0]["img_src"];
										$img_full = ($file_urlchk["img_pre"] == "Y" && $file_urlchk["site"] != "yeogiya") ? $img_name :  $fimg."/".$img_name;

										//20170309 이미지리사이징
										if($hinfo["site"] != "ddnayo") {
										$img_full = $go_util->cache_url($img_full, 375);
										}
										
									?>
									<div class="info_local"><span class="point_txt"><?=$addr[0]?>&nbsp;&nbsp;&nbsp;&nbsp; <?=$city2?></span></div>
									<?php if(merge == "Y") { ?>
									<div class="icon3"><img src="<?=goco_img?>/logo_goco2.png" alt="<?=total_comp?>"/></div>
									<?php } ?>
									<div style="text-align:center;background:#000000;width:385px;height:257px" id="imgview_box">
										<img src="<?=$img_full?>" alt="<?=$company?> 이미지1" style="width:auto;height:auto;max-width:385px;height:257px" id="img_view" onerror="this.src='<?=no_img?>'">
										<p class="img_expansion" style="display:none;top:60%;cursor:pointer"><img src="<?=goco_img?>/btn_img_view.png" alt="이미지확대" style="width:78px;height:78px;"></p>
										<!-- <img src="<?=goco_img?>/thumbnail_logo.png" alt="고코투어" class="thumbnail_logo" /> -->
									</div>
								</td>
                            </tr>
                            <tr id="jwSlide_navi" style="width: 78px; height: 55px;">
								<?php 
								if(!empty($img_arr)) {
								# 썸네일
								$j = 0;
								$goco_img = count($img_arr);
								while(list($key, $value) = each($img_arr)){
									$img_url = ($value["db_name"] == "n_product_img") ? $fimg_ : $room_url;
									$img = $value["img_src"];
									$img_txt_tmp = str_replace("["," ",$value["text"]);
									$img_txt = str_replace("]"," ",$img_txt_tmp);

									if($value["db_name"] == "logo") {
										$img_url = goco_img."/";
									}

									$img_full = $img_url.$value["img_src"];


									if($hinfo["site"] != "ddnayo") {
										//20170309 이미지리사이징
										$img_full = $go_util->cache_url($img_full, 375);
									}


									$j++;

									if($j == 5 || $goco_img == $j) {
										// 다섯번째 이미지에 더보기 추가
										$link_rel  = $img_full;
										$link_rel2 = "rel=\"gallery\"";

										$info_gall = "<a href=\"#\" style=\"cursor:pointer;\" id=\"img_more\"><div class=\"info_gallery\" style=\"z-index: 10;padding-top:0;height:100%;\"><p class=\"point_txt_gallery\" style=\"width:100%;height:100%;padding-top:18px\">+더보기</p>".$hidden_img."</div></a>";
										

									} else {					

										$hidden_img .= "<a href=\"".$img_full."\" rel=\"gallery\" title=\"".$value["text_con"]."\"><img src=\"".$img_full."\" style=\"display:none\" alt=\"".$value["text_con"]."\" /></a>";
										$info_gall = "";
										switch($hinfo["site"]) {
											case "hotelenjoy":	$link_rel  = "javascript:slide.view('".$j."', '/tour/img4')";	break;
											case "gpension":
											case "woori":
											case "hottel":
											case "pinspot":
											case "yeogiya":
											case "monstay":
											case "ddnayo":
												$link_rel  = "javascript:slide.view('".$j."', '')";				
												break;
											default:			$link_rel  = "javascript:slide.view('".$j."', '/tour/img1')";	break;
										} 
									

										if(empty($img_name)) {
											$img_full = goco_img."/ready_74x55.jpg";
										}
										$link_rel2 = "";
									
									}
									
									if($j < 6) {
								?>
								<?php
									$img_width = ($j == 5) ? "74" : "78";
								?>
								<td class="img_s" style="padding:0">
									<?=$info_gall?>
									<a href="<?=$link_rel?>" <?=$link_rel2?>>
										<div style="text-align:center;background:#000000;width:<?=$img_width?>px;height:55px">						
											<img src="<?=$img_full?>"  style="width:auto;height:auto;max-width:<?=$img_width?>px;height:55px" alt="<?=$company?> 썸네일<?=$j?>"  id="img_navi_<?=$j?>" onmouseover="slide.navi_over('<?=$j?>');" onmouseout="slide.navi_over('<?=$j?>');" onerror="this.src='<?=no_img?>'">
										</div>
									</a>
								</td>
								
								<?php
									}
								}
							}
								?>

                            </tr>
                        </tbody>
                    </table>

                    <div id="jwSlide_left" class="jwSlide_btn" style="width:40px;position:absolute;left:0;top:35%;">
                        <a href="javascript:slide.view(1, 'tour/img1')" class="btn_link"><img src="http://img.ocean2you.co.kr/go/btn_left.png" class="btn" alt="이전" style="margin:0;"></a>
                    </div>
                    <!--jwSlide_left-->
                    <div id="jwSlide_right" class="jwSlide_btn" style="width:40px;position:absolute;right:0;top:35%;">
                        <a href="javascript:slide.view(3, 'tour/img1')" class="btn_link"><img src="http://img.ocean2you.co.kr/go/btn_right.png" class="btn" alt="다음" style="margin:0;"></a>
                    </div>
                    <!--jwSlide_right-->

                </div>
                <!--left 끝-->
                <div class="right">
                    <table class="goods_info" style="table-layout:fixed">
                        <colgroup>
                            <col width="95">
                            <col width="90">
                            <col width="35">
                            <col width="310">
                        </colgroup>
                        <tbody>
                            <tr style="border-top: 1px solid #c8c8c8;">
                                <td class="contents" colspan="4" style="color: #000;font-weight: 600;text-align: left;font-size: 17px;">
                                    <span style="width:700px; float:left">
										<?php
											echo "[".$p_cla."] ".$company." ".$he_flag;
										?>
                                </td>
                            </tr>


                            <tr>
								<td class="tit2">분류</td>
								<td class="contents" colspan="3"><?=$hinfo["p_class"]?>
								<?php
								if($hinfo["p_room"] > 0 && !empty($hinfo["p_room"]) && S_FLAG != "KNC") { 
									echo "<span class=\"add-txt\">(총 객실 수: ".number_format($hinfo["p_room"])."개)</span>";
								}
								?>					
								</td>
                            </tr>
                            <tr>
								<td class="tit2">이용시간</td>
								<td colspan="3" class="contents">체크인 <?=$hinfo["in_time"]?> / 체크아웃 <?=$hinfo["out_time"]?></td>
                            </tr>
                            <tr>
                                <td class="tit2">주소</td>
								<td colspan="3" class="contents">

									<?php if(!empty($hinfo["new_address"])) { ?>
									구주소 : <?=$hinfo["address1"]?> <?=$hinfo["address2"]?> <a href="javascript:view_move('how_come');"><img src="<?=goco_img?>/landing/point_icon02.jpg" alt="지도보기" /></a><br/>
									신주소 : <?=$hinfo["new_address"]?> <a href="javascript:view_move('how_come');"><img src="<?=goco_img?>/landing/point_icon02.jpg" alt="지도보기" /></a>
									<?php } else { ?>
									<?=$hinfo["address1"]?> <?=$hinfo["address2"]?> <a href="javascript:view_move('how_come');"><img src="<?=goco_img?>/landing/point_icon02.jpg" alt="지도보기" /></a>
									<?php } ?>

								</td>
                            </tr>

                            <?php if(!empty($hinfo["homepage"]) && $hinfo["homepage"] != "http://") { ?>
							<tr>
								<td class="tit2">홈페이지</td>
								<td colspan="3" class="contents">
									<a href="<?=$hinfo["homepage"]?>" title="<?=$company?> 홈페이지" target="_blank"><?=$go_util->strcut($hinfo["homepage"], 40, true)?></a>
									<?php if(S_FLAG == "KNC") { 
										echo "<br/><a href=\"http://www.seacloudhotel.com/\" title=\"".$company." 홈페이지\" target=\"_blank\">http://www.seacloudhotel.com/</a>";
									} ?>
								</td>
							</tr>
							<?php } ?>

                            <?php
								$addition = str_replace("^", ",", $hinfo["additional"]);
								$addi_ex = explode(",", $addition);
								if(count($addi_ex) < 4) {
									$addi_str = @join(",", $addi_ex);
								} else {
									$addi_str = @join(",", $addi_ex);
								}
							?>
							<tr style="border-bottom:0px">
								<td class="tit2" style="border-bottom:0px">부대시설</td>
								<td colspan="3" class="contents" style="border-bottom:0px"><?=$addi_str?></td>
							</tr>

                            <tr style="border-bottom:none;">
                                <td style="border-bottom:none;" colspan="4" class="contents">
                                    <span style="float:right; margin-right:20px">
                                        <div class="btn-resArea">
                                            <a href="/history/?dd=<?=$go_util->XOREncode("buylist")?>" class="btn-resA">
                                                <img src="http://img.ocean2you.co.kr/go/i_calChk.png" alt="조회">예약내역조회
                                            </a>
                                        </div>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--right 끝-->
            </div>
            <!--main 끝-->
            <div id="google_notice">
            </div>

            <!-- <input type="hidden" name="cal_mode" value="list_detail" id="cal_mode"/> -->
            <div id="reservation_go">                
				<?php
					$pkg_chk = $go_db->queryfetch("SELECT count(*) as cnt FROM facil_matching_ver2 WHERE p_no='".$p_no."' AND state='Y'");
					include(INC_DIR."/www/web-home/reserve/inc/rnew_choice2.php");
				?>
            </div>


            <div id="infom_box" class="title">
                <!----상품소개---->
                <span class="slogan_icon" id="room_info"><img src="//img.seabay.co.kr/slogan_tit_01.jpg"></span>
                <div id="info_box1" style="clear:left;">

                    <div id="info_box1" style="clear:left;">
		<?php 
		if($_COOKIE["ocean_ad"] == "Y") {
			echo "
			<div class=\"detail_goods\">
				<p class='info_tit2'>
				<b>[22사단 이용안내]</b>
				<br/><br/>
				* 연휴     : 공휴일 전날 및 기타 공휴일<br/>
				* 성수기   : 7/12~8/24 , 12/31<br/><br/>

				* 해당기간은 별도의 할인요금으로 적용되어있습니다.<br/><br/><br/><br/>
				</p>
			</div>
			";
		}
		
		

				// 숙박 여러개 통합된 사이트 길더라도 그냥 다 뿌려달라고 해서 뿌림
				if(!empty($r2_pno) && $r2_pno != "0" && S_FLAG != "HOTELM" && S_FLAG != "DGW") { 
					include_once (INC_DIR."/ocean2you/web-home/view/total_proinfo.php");
				} else { 

				echo "<div class=\"detail_goods\">";
				if(!empty($img_qry["sinfo_text"])) {
					if($_COOKIE["pid"] == "ocean_advertise" && $_SERVER["REMOTE_ADDR"] == "61.74.233.194") {
						$rep_arr1 = array("   * 조식 운영시간은 07:30 ~ 10:00 까지 운영됩니다.", "   * 바베큐장 자리만 대여 가격 : 40,000원/현장결제");
						$rep_arr2 = array("   * 조식 운영시간은 07:30 ~ 10:00 까지 운영됩니다.\n   * 조식은 2인까지 무료제공 됩니다. (2인이상 추가요금 발생)", "   * 바베큐장 자리만 대여 가격 : 20,000원");
						$img_qry["sinfo_text"] = str_replace($rep_arr1, $rep_arr2, $img_qry["sinfo_text"]);
					}
					$tmp2 = $img_qry["sinfo_text"];
					$tmp2 = str_replace(" ","&nbsp;",$tmp2);
					$tmp2 = nl2br($tmp2);

					$cnt = strlen($tmp2);	// 띄어쓰기 태그가 안없져서 강제로 개수 체크해서 함

					if(!empty($tmp2) && $cnt > 3) {
						if(strpos($tmp2,"▶") !== false) {
							echo "<br/><p class=\"info_tit2\">".str_replace("▶","",$tmp2)."</p><br/>";
						} else {
							// 내용
							//echo str_replace("*","-",$tmp2);
							echo $tmp2;//임차장님지시로 품
							echo "<br/>";
						}
					}
					echo "<br/>";
				} 



				echo "<div class=\"info_box\" style=\"width: 100%;position: relative;left: -30px;border:none;\">";


				if(!empty($hinfo["introduce"])) {
					echo "<p class=\"info_tit\">인사말</p>";
					echo "<span class=\"info_txt\">";
					if($p_no == 517) {
						$intro_tmp = str_replace("▶ 단체 문의", "<p class=\"info_tit1_2\">단체 문의</p>", $hinfo["introduce"]);
						$intro_tmp = str_replace("▶견적문의", "<p class=\"info_tit1_2\">견적문의</p>", $intro_tmp);
						$intro_tmp = str_replace("▶고성군 행사", "<p class=\"info_tit1_2\">고성군 행사</p>", $intro_tmp);
						echo nl2br($intro_tmp);
					} else { 
						echo nl2br($hinfo["introduce"]);
					}
					echo "</span>";
				}

				
				if(!empty($hinfo["event"])) {
					echo "<p class=\"info_tit\">공통이벤트</p>";
					echo "<span class=\"info_txt\">";
					echo nl2br($hinfo["event"]);
					echo "</span>";
				}


				$pack_infotxt = "";
				$qr = $go_db->query("select theme, theme_com, B.color from n_product_add A left join n_additional B on A.theme = B.title and B.gubun = A.gubun where A.p_id = '".$p_no."' order by a_id desc");
				while($theme_row = $go_db->fetch($qr)) {
					$pack_infotxt .= "[".$theme_row["theme"]."]".$theme_row["theme_com"]."<br/>";
				} 
				mysql_free_result($qr);


				if(!empty($pack_infotxt)) {
					echo "<p class=\"info_tit\">패키지 및 테마안내</p>";
					echo "<span class=\"info_txt\">";
					echo $pack_infotxt;
					echo "</span>";
				}

				if(!empty($hinfo["additional"])) {
					echo "<p class=\"info_tit\">부대시설</p>";
					/*170808 부대시설 아이콘으로 변경
					echo "<span class=\"info_txt\">";
					echo str_replace("^", ",", $hinfo["additional"]);
					echo "</span>";
					*/
						$additional_tail = "";
						$add_tail_cnt = 0;
						$additional_chk1 = "";	$additional_chk2 = "";	$additional_chk3 = "";	$additional_chk4 = "";	$additional_chk5 = "";	$additional_chk6 = "";	$additional_chk7 = "";	$additional_chk8 = "";	$additional_chk9 = "";	$additional_chk10 = "";	$additional_chk11 = "";	$additional_chk12 = "";	$additional_chk13 = "";	$additional_chk14 = "";	$additional_chk15 = "";
					if(!empty($hinfo["additional"]) && $hinfo["additional"] != "준비중입니다.") {
						$additional = str_replace("^", ",", $hinfo["additional"]);
						$additional = str_replace(" ", "", $additional);
						$add_arr = explode(",",$additional);
						echo "<span class=\"info_txt\">";
						echo "<div class=\"establishment_wrap\">";
						$a_cnt2= 0;
						for($a_cnt = 0; $a_cnt<count($add_arr); $a_cnt++) {
							if((($a_cnt2)%8)==0 || $a_cnt2==0) {
								echo "<ul class=\"establishment_list\">";
							}
							switch($add_arr[$a_cnt]) {
								case "조식가능여부":	
								case "조식 서비스":
								case "무료조식":
								case "유료조식":
								case "조식":
									if($additional_chk1 == "") {
										$additional_img = "eat";			$additional_txt = "조식운영"; 
										$additional_chk1 = "Y";
									}
								break;
								case "카페/레스토랑":
								case "카페":
								case "레스토랑":
									if($additional_chk2 == "") {
										$additional_img = "caferestaurant";	$additional_txt = "카페/레스토랑"; 
										$additional_chk2 = "Y";
									}
								break;
								case "주차장":	
								case "무료주차":
									if($additional_chk3 == "") {
										$additional_img = "parking";		$additional_txt = "주차장"; 
										$additional_chk3 = "Y";
									}
								break;
								case "피트니스센타":		
								case "휘트니스센타":
								case "피트니스":
								case "휘트니스":
									if($additional_chk4 == "") {
										$additional_img = "fitness";		$additional_txt = "피트니스센터"; 
										$additional_chk4 = "Y";
									}
								break;
								case "세미나실/연회장":
								case "연회장":
								case "세미나실":
									if($additional_chk5 == "") {
										$additional_img = "banquethall";	$additional_txt = "연회장"; 
										$additional_chk5 = "Y";
									}
								break;
								case "사우나/스파":		
								case "사우나":
								case "스파":
									if($additional_chk6 == "") {
										$additional_img = "sauna";			$additional_txt = "사우나/스파"; 
										$additional_chk6 = "Y";
									}
								break;
								case "식당":	
								case "일식당":
								case "한식당":
								case "중식당":
									if($additional_chk7 == "") {
										$additional_img = "foodmarket";		$additional_txt = "식당"; 
										$additional_chk7 = "Y";
									}
								break;
								case "수영장":
								case "실내수영장":
									if($additional_chk8 == "") {
										$additional_img = "pool";			$additional_txt = "수영장"; 
										$additional_chk8 = "Y";
									}
								break;
								case "공용바베큐장":		
								case "바베큐장":
								case "바베큐장취사가능":
								case "바베큐":
									if($additional_chk9 == "") {
										$additional_img = "barbecue";		$additional_txt = "공용 바베큐장"; 
										$additional_chk9 = "Y";
									}
								break;
								case "세탁실":				
									if($additional_chk10 == "") {
										$additional_img = "clean";			$additional_txt = "세탁실"; 
										$additional_chk10 = "Y";
									}
								break;
								case "편의점/슈퍼마켓":
								case "편의점":
								case "슈퍼마켓":
								case "슈퍼":
									if($additional_chk11 == "") {
										$additional_img = "conveniencestore";	$additional_txt = "편의점"; 
										$additional_chk11 = "Y";
									}
								break;
								case "PC존/비지니스센터":
								case "비즈니스센타":
								case "PC존":
									if($additional_chk12 == "") {
										$additional_img = "businesscenter";	$additional_txt = "비즈니스센터"; 
										$additional_chk12= "Y";
									}
								break;

								case "애완동물 출입가능":
								case "애완동물출입가능":
								case "반려동물 동반가능":
								case "애완동물":
								case "반려동물":
									if($additional_chk13 == "") {
										$additional_img = "pet";			$additional_txt = "애완동물 입실"; 
										$additional_chk13 = "Y";
									}
								break;
								case "무료wifi":		
									if($additional_chk14 == "") {
										$additional_img = "freewifi";		$additional_txt = "무료 Wi-Fi"; 
										$additional_chk14 = "Y";
									}
								break;
								case "공용wifi":	
								case "WIFI":
								case "와이파이":
									if($additional_chk15 == "") {
										$additional_img = "publicwifi";		$additional_txt = "공용 Wi-Fi"; 
										$additional_chk15 = "Y";
									}
								break;
							}
							$additional_class = $additional_img;
							if(($a_cnt2+1)%8==0) {
								$additional_class .= " last";
							}
							if($additional_img != "") {
									echo "<li class=\"".$additional_class."\">
											<img src=\"".ocean_goimg."/ico_establishment_".$additional_img.".png\" alt=\"\" class=\"ebm_ico\" />
											<p>".$additional_txt."</p>
										</li>";
									$a_cnt2++;
							} else {
								if($add_tail_cnt == 0) {
									$additional_tail .= $add_arr[$a_cnt];
								} else {
									$additional_tail .= ",".$add_arr[$a_cnt];
								}
								$add_tail_cnt++;
							}
							if(($a_cnt2)%8==0 || $a_cnt2==count($add_arr)) {
								echo "</ul>";
							}
						}
						if($additional_tail != "") {
							echo $additional_tail;
						}
					}
						echo "</div>";
						echo "</span>";
				}
	

				echo "</div>";
				echo "</div>";
				}

					 ?>
                    <div id="google_row1"></div>
                    <div id="pack_div"></div>
                </div>


                <!--contents_mn테이블 끝-->
                <!----갤러리---->
                <span class="slogan_icon"><img src="//img.seabay.co.kr/slogan_tit_02.jpg"></span>
                <div id="info_box2" class="info_box2">
                    <div class="goods_gallery">
                        <h3>외관 및 내부</h3>
						<ul>
							<?php 
							$ii = 1;
							for($i = 1; $i < 13; $i++) { 
								if(!empty($img_qry["in_img".$i])) {

									$img = $img_qry["in_img".$i];
									$ext = strtolower(substr($img, strrpos($img, '.')+1));
									$ext_arr = array("jpg", "gif", "bmp", "png");
									$img_full = $fimg_.$img_qry["in_img".$i];

									$img_full = $go_util->cache_url($img_full, 220);

									if(in_array($ext, $ext_arr)) {
										
							?>
							<li onclick="img_click('in_img', '<?=$ii?>', '<?=$p_no?>')" style="cursor:pointer">
								<div class="info" style="z-index: 2;">	<span class="txt"><?=$img_qry["text_in_img".$i]?></span></div>
								<img src="<?=$img_full?>" alt="<?=str_replace("\"", "'", $img_qry["text_in_img".$i])?>"  onerror="this.src='<?=no_img?>'"/>
							</li>
							<?php 
										$ii++;
									}
								}
							} 
							?>
						</ul>
                    </div>

                    <div class="goods_gallery">
                        <h3>객실사진</h3>
						<ul>
							<?php for($i = 1; $i < 13; $i++) { 
								if(!empty($img_qry["out_img".$i])) {
									$img = $img_qry["out_img".$i];
									$ext = strtolower(substr($img, strrpos($img, '.')+1));
									$ext_arr = array("jpg", "gif", "bmp", "png");
									$img_full = $fimg_.$img_qry["out_img".$i];

									$img_full = $go_util->cache_url($img_full, 220);

									if(in_array($ext, $ext_arr)) {
							?>
							<li onclick="img_click('out_img', '<?=$ii?>', '<?=$p_no?>')" style="cursor:pointer">
								<div class="info" style="z-index: 2;">	<span class="txt"><?=$img_qry["text_out_img".$i]?></span></div>
								<img src="<?=$img_full?>" alt="<?=$img_qry["text_out_img".$i]?>"  onerror="this.src='<?=no_img?>'"/>
							</li>
							<?php 
									$ii++;
									}
								}
							} 
							?>
						</ul>
                    </div>

                    <div class="goods_gallery">
                        <h3>부대시설 및 주변시설</h3>
						<ul style="margin-bottom:75px">
							<?php for($i = 1; $i < 13; $i++) { 
								if(!empty($img_qry["add_img".$i])) {
							
									$img = $img_qry["add_img".$i];
									$ext = strtolower(substr($img, strrpos($img, '.')+1));
									$ext_arr = array("jpg", "gif", "bmp", "png");
									$img_full = $fimg_.$img_qry["add_img".$i];

									$img_full = $go_util->cache_url($img_full, 220);

									if(in_array($ext, $ext_arr)) {
										
									
							?>
							<li onclick="img_click('add_img', '<?=$ii?>', '<?=$p_no?>')" style="cursor:pointer">
								<div class="info" style="z-index: 2;">	<span class="txt"><?=$img_qry["text_add_img".$i]?></span></div>
								<img src="<?=$img_full?>" alt="<?=$img_qry["text_add_img".$i]?>"  onerror="this.src='<?=no_img?>'"/>
							</li>
							<?php 
										$ii++;
									}
								}
							} 
							?>
						</ul>
                    </div>
                    <div style="width:910px;margin:auto;">
					<?php
					$dimg_qry2 = "select * from product_dimg where p_no = '".$p_no."'";
					$dimg_find = $go_db->queryrows($dimg_qry2);
					if(!empty($dimg_find)) {

						$dimg_rw = $go_db->queryfetch($dimg_qry2);
						for($di = 1; $di < 21; $di++) {
							if(!empty($dimg_rw["file".$di])) {
									
								//20170309 이미지리사이징
								$img_full = base_file."/dimg/".$dimg_rw["file".$di];
								$img_full = $go_util->cache_url($img_full, 1000);

								echo "<img src=\"".$img_full."\" alt=\"상품소개이미지".$di."\" width=\"100%\" />";
							}
						}
						
					} else {
						
						for($j = 1; $j < $total_cnt; $j++) { 
							$j_ = ($j < 10) ? "0".$j : $j;
							if(!empty($img_qry["out_img".$j])) {
								
								//20170309 이미지리사이징
								$img_full = $fimg."/".$img_qry["out_img".$j];
								$img_full = $go_util->cache_url($img_full, 1000);

								echo "<img src=\"".$img_full."\" alt=\"\" /><br/>";
							}
						}

					}


					if(!empty($r2_pno) && $r2_pno != "0" && S_FLAG != "HOTELM" && S_FLAG != "DGW" && S_FLAG != "KONJIA") { 

						if(strpos($r2_pno,"/") !== false) {
							$r2_pnoarr2 = explode("/", $r2_pno);
						} else { 
							$r2_pnoarr2[0] = $r2_pno;
						}
						for($rs=0; $rs<count($r2_pnoarr2); $rs++) { 
							echo "<br/><br/><br/><br/>";
							$dimg_qry2 = "select * from product_dimg where p_no = '".$r2_pnoarr2[$rs]."'";
							$dimg_find = $go_db->queryrows($dimg_qry2);
							if(!empty($dimg_find)) {

								$dimg_rw = $go_db->queryfetch($dimg_qry2);
								for($di = 1; $di < 21; $di++) {
									if(!empty($dimg_rw["file".$di])) {
											
										//20170309 이미지리사이징
										$img_full = base_file."/dimg/".$dimg_rw["file".$di];
										$img_full = $go_util->cache_url($img_full, 1000);

										echo "<img src=\"".$img_full."\" alt=\"상품소개이미지".$di."\" width=\"100%\" />";
									}
								}						
							} 
						}
					}
					?>
					</div>
                </div>

                <!--contents_mn테이블 끝-->
                <!----오시는길----->
                <p style="clear:both"></p>
                <span class="slogan_icon"><img src="//img.seabay.co.kr/slogan_tit_04.jpg"></span>
                <div id="info_box4">
                    <div class="tour" id="how_come">
                        <span class="tit" style="float:left">
                            <?=$company?> 오시는길
                        </span>
                        <!--
					<span style="float:right"><a href="base_doc/search/?dd=XRE1UQFVO0IyHUA=&tno=HE93"><img src="http://img.ocean2you.co.kr/go/btn_map_near.jpg" /></a></span> -->
                        <div id="map_box" style="clear:both">
							<?php
								include(INC_DIR."/www/web-home/reserve/inc/map.php");
							?>
                        </div>
                    </div>
                    <!--tour 끝-->
                    <div id="google_row2"></div>
                </div>

                <!--contents_mn테이블 끝-->
                <!----축제/관광지/맛집----->
                <span class="slogan_icon"><img src="//img.seabay.co.kr/slogan_tit_05.jpg"></span>
                <div id="info_box5">
					<?php
						if(!empty($hinfo["xpoint"]) && !empty($hinfo["ypoint"])) {
							$res_tour = $go_db->queryfetch("SELECT count(*) as cnt, ( 6371 * ACOS( COS( RADIANS(".$hinfo["xpoint"].") ) * COS( RADIANS( xpoint ) ) * COS( RADIANS( ypoint ) - RADIANS(".$hinfo["ypoint"].") ) + SIN( RADIANS(".$hinfo["xpoint"].") ) * SIN( RADIANS( xpoint ) ) ) ) AS distance FROM tour having distance < 20 order by no desc");
							$res_food = $go_db->queryfetch("SELECT count(*) as cnt, ( 6371 * ACOS( COS( RADIANS(".$hinfo["xpoint"].") ) * COS( RADIANS( xpoint ) ) * COS( RADIANS( ypoint ) - RADIANS(".$hinfo["ypoint"].") ) + SIN( RADIANS(".$hinfo["xpoint"].") ) * SIN( RADIANS( xpoint ) ) ) ) AS distance FROM food having distance < 20 order by no desc");

							$res_tour = $res_tour["cnt"];
							$res_food = $res_food["cnt"];
						}
						
					?>
					<p id="tour_radio" style="text-align:left">
					<input type="radio" name="tt_select" value="all" id="info_all" checked /><label for="info_all"> <span id="span_all" class="on info_span">전체보기</span></label>&nbsp;&nbsp;&nbsp;
					<input type="radio" name="tt_select" value="tour" id="info_tour" /><label for="info_tour"> <span id="span_tour" class="info_span">관광지보기</span></label>&nbsp;&nbsp;&nbsp;
					<?php if($res_food > 0) { ?><input type="radio" name="tt_select" value="food" id="info_food" /><label for="info_food"> <span id="span_food" class="info_span">맛집보기</span></label><?php } ?>
					</p>

					<table border="0" id="tour_taste">
						<colgroup>
						<col width="70">
						<col width="170">
						<col width="205">
						<col width="250">
						<col width="120">
						<col width="95">
						</colgroup>
						<thead>
						<tr>
							<th height="35">유형</th>
							<th>미리보기</th>
							<th>명칭</th>
							<th>주소</th>
							<th>거리/기간</th>
							<th></th>
						</tr>
						</thead>
						<tbody>
							<?php
							echo $go_brd->tour_list_all($p_no, "");
							?>
						</tbody>
					</table>
				</div>

                <div style="margin-bottom:50px">
                    <div class="info_box">
                        <p class="info_tit">취소/변경 및 환불안내</p>
                        <span class="info_txt">
                            ※ 취소규정<br>
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
                        </span>
                    </div>
                </div>

            </div>

			<?php
				include(INC_DIR."/www/web-home/reserve/inc/img_slide.php");
			?>

            
            <script type="text/javascript">
                function mapinfo_pop(type, p_no) {
                    ww = window.open("//gangneung.go.co.kr/inc/map_info_pop.php?p_no=" + p_no + "&type=" + type, "mappop", "toolbar=no,scrollbars=yes,directories=no,status=no,menubar=no,width=830,height=800,resizable=yes, top=50, left=" + ((screen.width - 450) / 2) + "");
                    ww.focus();
                }
            </script>

        </div>
        <!-- //#contents -->
	</div>