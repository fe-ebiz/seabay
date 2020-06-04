
    <link rel="stylesheet" href="http://static.bscondo.co.kr/css/rent/initR.css">

    <!-- <link rel="stylesheet" href="http://static.seabay.co.kr/svc/css/rent/initR.css"> -->

    <link rel="stylesheet" href="http://static.seabay.co.kr/svc/css/rent/init.css">


	
	<div class="body"></div>
    <br class="br_sub">

    <div class="rent-wrap clr">
        <div class="img-area">
            <figure class="nth-1"><img src="http://img.seabay.co.kr/svc/img/rent/detail/01.jpg" alt="강릉 씨베이호텔 소개이미지"></figure>

            <figure class="nth-2"><img src="http://img.seabay.co.kr/svc/img/rent/detail/02_1.jpg" alt="강릉 씨베이호텔 소개이미지"></figure>

            <div class="grid-wrap">
                <div class="grid-contents grid-type-1">
                    <table class="tbl-base tbl-1">
                        <colgroup>
                            <col style="width:23%">
                            <col style="width:14%">
                            <col style="width:23%">
                            <col style="width:40%">
                        </colgroup>
                        <thead class="rowgroup">
                            <tr>
                                <th>객실타입</th>
                                <th>숙박기간</th>
                                <th>이용시 특혜</th>
                                <th>이용기간</th>
                            </tr>
                        </thead>
                        <tbody class="rowgroup">
                            <tr>
                                <td>
                                    수페리어<br>
                                    디럭스<br>
                                    프리미어 디럭스<br>
                                    스위트룸
                                </td>
                                <td>
                                    7일<br>
                                    14일<br>
                                    1개월<br>
                                    6개월
                                </td>
                                <td class="nth-3">
                                    <span class="fg-red-1 fwe-1">공과금 일체 포함<br>
                                        (전기, 수도요금 등)</span>
                                </td>
                                <td class="nth-4">
                                    <span class="fwe-1">7일부터 6개월까지 이용가능!</span>
                                </td>
                            </tr>
                            <!-- <tr>
								<td colspan="4" class="ta-left">
									<p class="row">
										<span class="dot">※</span>
										<span class="txt">
											장/단기 이용시 주중은 저렴하게 제공기능하나, <span class="co-blue">주말(토요일, 5월5일, 12월31일 등 극성수일)에는 상시 만실</span>이며 평균 20만원 내외에 판매되는 점 고려 후 판단 부탁드립니다.
										</span>
									</p>
								</td>
							</tr> -->
                        </tbody>
                    </table>
                </div>
				<?php
					include("/home/ebiztour/seabay.co.kr/www/web-home/rent/rent_price_w.php");
				?>
            </div>

            <figure class="nth-2"><img src="http://img.seabay.co.kr/svc/img/rent/detail/02_2.jpg" alt="강릉 씨베이호텔 소개이미지"></figure>

            <figure class="nth-3"><img src="http://img.seabay.co.kr/svc/img/rent/detail/03.jpg" alt="강릉 씨베이호텔 소개이미지"></figure>
            <figure class="nth-4">
                <img src="http://img.seabay.co.kr/svc/img/rent/detail/04.jpg" alt="강릉 씨베이호텔 소개이미지">
                <a href="http://seabay.co.kr/rooms/?r=18836" target="_blank" title="새 창" class="btn-linkOc2">
                    <img src="http://img.seabay.co.kr/svc/img/rent/detail/btn_moreRoom.png" alt="강릉 씨베이호텔  객실안내 페이지로 이동">
                </a>
            </figure>
            <figure class="nth-5"><img src="http://img.seabay.co.kr/svc/img/rent/detail/05.jpg" alt="강릉 씨베이호텔 소개이미지"></figure>
            
        </div>
        
        <!--슬라이딩 버튼 부분-->
        <div class="rent-sliding-banner">
            <a href="http://www.seabay.co.kr/reserve/"><img src="http://img.seabay.co.kr/svc/img/rent/etc/btn_sliding_banner.png" alt="객실예약 버튼"></a>
        </div>
    </div>
<style type="text/css">
#call_pop_wrap { width: 600px; height: 300px; }
#call_pop_wrap .close { cursor: pointer; background: url(<?=ocean_goimg?>/login_img03.jpg) no-repeat; display: box; width: 52px; height: 48px; float: right; }
#call_pop_wrap .call_pop { clear: both; float: left; padding: 25px; width: 550px; height: 250px; background: #fff; text-align: center; color: #333333; }
#call_pop_wrap .call_pop h3 { display: block; margin: 30px 0; }
#call_pop_wrap .call_pop h4 { display: block; margin: 20px 0; font-size: 15px; letter-spacing: -0.5px; }
#call_pop_wrap .call_pop .input { padding: 2px; margin-right: 10px; height: 24px; border: 1px solid #dedede; background: #f9f9f9; font-size: 13px; color: #999999; text-align: left; }
#call_pop_wrap .call_pop .select { padding: 2px; margin-right: 10px; height: 30px; border: 1px solid #dedede; background: #f9f9f9; font-size: 13px; color: #999999; text-align: left; }
#call_pop_wrap .call_pop p { letter-spacing: -0.5px; }
#call_pop_wrap .call_pop .link { color: #003cfd; text-decoration: underline; }
#call_pop_wrap .call_pop .link a { color: #003cfd; text-decoration: underline; }
#call_pop_wrap .call_pop .link a:hover { font-weight: 600; }
#call_pop_wrap .call_pop h5 { padding: 10px 0; font-size: 15px; letter-spacing: -0.3px; font-weight: 600; }
#call_pop_wrap .call_pop h5 span { font-size: 17px; color: #931c01; font-weight: 600; }
#call_pop_wrap .call_pop .btn_wrap { margin: auto; padding: 10px 0; width: 300px; height: 50px; text-align: center; }
#call_pop_wrap .call_pop .btn_wrap .inquiry a { float: right; display: block; width: 75px; height: 30px; background: #999999; line-height: 2.2; color: #fff; font-weight: 600; letter-spacing: -0.3px; }
#overlay { position: absolute; top: 0; left: 0; z-index: 10; width: 100%; height: 100%; background-color: #464646; opacity: 0.8; }
</style>

<script>
	function inst_fchk() {
		if($("input[name='esset_tel']").val() == "") {
			alert("연락처를 입력해주세요");
			return;
		}
		$.ajax({
			type	:	"POST",
			data	:	$("form[name='esset_form']").serialize(),
			url		:	"./state.php",
			success	:	function(e) {
				var res = e.split("|");
				if(res[0] == "Y") {
					alert(res[1]);
					location.reload();
				} else {
					alert("다시시도해주세요");
				}
			}
		})
	}
	function checknum(field, next, cnt) {
		var len = $("input[name='"+field+"']").val().length;
		if(len > cnt) {
			$("input[name='"+next+"']").focus();
		}
	}
</script>
	
	<div id="call_pop_wrap" style="display: none; position: absolute; z-index: 999;">
		<div class="close" onclick="utils.out('#call_pop_wrap')"></div>
		<div class="call_pop">
			<img src="<?=total_img?>/icon_house.jpg" />
			<h5><span>이 방을 상담받으시려면 연락처를 남겨주세요.</span><br/><?=$esset_name?> 확인 후 연락드립니다.</h5>

			<form name="esset_form" id="esset_form" method="post">
			<input type="hidden" name="encrypt" value="0" />
			<input type="hidden" name="mode" value="esset_inquiry" />
			<input type="hidden" name="esset_pno" value="<?=$go_util->XOREncode(p_no)?>" />

			<input type="hidden" name="rent_r_no" />

			<input type="hidden" name="rent_checkin" />
			<input type="hidden" name="rent_checkout" />
			<input type="hidden" name="rent_person" />

			<div class="btn_wrap">
				<input name="esset_tel" title="연락처" value="<?=$tel?>" validation="yes" id="esset_tel" type="number" class="input" placeholder="연락처" style="padding-left:10px; width:200px" onkeypress="checknum('esset_tel', 'esset_agree', '10')"></input>
				<span class="inquiry"><a href="#" onclick="inst_fchk('esset_form');return false;">문의신청</a></span>
			</div>
			<p>
				<input name="esset_agree" id="esset_agree" title="개인정보 수집 및 이용에 대한 동의" type="checkbox" checked="checked" value="Y" validation="yes"> <label for="esset_agree">개인정보 수집 및 이용에 대한 동의(필수)</label>  <a href="http://seabay.co.kr/main/?r=policy" target="blank"><span class="link">[개인정보취급방침]</span></a>
			</p>
			</form>

		</div>
	</div>