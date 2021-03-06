<footer class="footer">
	<div class="group">
		<div class="terms-bar">
			<ul class="terms-list">
				<li class="active"><a href="/main/about">회사소개</a></li>
				<li class="l">|</li>
				<li><a href="/main/map">찾아오시는 길</a></li>
				<li class="l">|</li>
				<li><a href="/main/?r=access">이용약관</a></li>
				<li class="l">|</li>
				<li><a href="/main/?r=policy">개인정보취급방침이용약관</a></li>
				<li class="l">|</li>
				<li><a href="/main/?r=email">이메일무단수집금지</a></li>
			</ul>			
		</div>
		<?php
			if($cus != "park") {
		?>
		<div class="sfa">
			<div class="split split-2">
				<div class="inquiry-bar">
                    <a class="item item-1 clr">
                        <p class="s1">예약문의<span class="s1-2">예약 확정, 변경, 취소 / 이벤트 관련 문의</span></p>
                        <span class="s2"><img src="http://img.bscondo.co.kr/i_call.png" alt="전화아이콘" class="i-tel">1666-1243</span>
                        <span class="s3">(주중 09시 30분 ~ 25시 / 주말 09시 30분 ~ 24시)</span>
                    </a>
                    <a class="item item-2 clr">
                        <p class="s1">프론트<span class="s1-2">체크인, 체크아웃 / 시설이용 관련 문의</span></p>
                        <span class="s2"><img src="http://img.bscondo.co.kr/i_call.png" alt="전화아이콘" class="i-tel">033-820-0006</span>
                        <span class="s3">(주중/주말 06시 ~ 02시)</span>
                    </a>
                    <a class="item item-3 clr">
                        <p class="s1">단체문의<span class="s1-2">워크샵, 학생, 산업단체 / 단체이용 관련 문의</span></p>
                        <!-- <span class="s2"><img src="http://img.bscondo.co.kr/i_call.png" alt="전화아이콘" class="i-tel">010-9544-8281</span> -->
						<span class="s2"><img src="http://img.bscondo.co.kr/i_call.png" alt="전화아이콘" class="i-tel"><?=group_tel?></span>
                        <span class="s3">(주중/주말 06시 ~ 02시)</span>
                    </a>
                </div>
			</div>
			<div class="split split-1">
                <div class="logo-box">
                    <img src="http://img.seabay.co.kr/svc/img/symbol/footer_logo.png" alt="씨베이호텔" class="logo">
                    <img src="http://img.seabay.co.kr/svc/img/symbol/logo_f_goco.png" alt="고코투어" class="logo-goco">
					<div id="family-wrapper" class="family-wrapper">
                        <div class="family-site">
                            <span class="family-site-label" onclick="$(this).next().toggle()">패밀리사이트&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;▲</span>
                            <ul class="site" style="display: none">
                                <li class="group-name">
                                    <div class="fam_btn">[호텔/리조트]</div>
                                </li>
                                <li>
                                    <div class="fam_btn"><a style="color: #a3a3a3;" href="http://ocean2you.co.kr/" target="_blank">오션투유리조트</a></div>
                                </li>
                                <li>
                                    <div class="fam_btn"><a style="color: #a3a3a3;"  href="http://seabay.co.kr/" target="_blank">씨베이호텔</a></div>
                                    <div class="fam_btn"><a style="color: #a3a3a3;" href="http://hotelairsky.co.kr/" target="_blank">에어스카이호텔</a></div>
                                </li>
                                <li class="group-division" style="border-top: 1px dashed #a3a3a3; margin: 5px 10px"></li>
                                <li class="group-name">
                                    <div class="fam_btn">[호텔위탁운영사]</div>
                                </li>
                                <li>
                                    <div class="fam_btn"><a style="color: #a3a3a3;" href="http://ebiznetworks.co.kr/home/program/?dd=WQwvfDZJKkYs" target="_blank">이비즈네트웍스</a></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="addr-bar">
                    <address class="addr">
                        <div class="info">
                            <em class="item">강릉씨베이호텔</em><br>
                            <span class="item">강원도 강릉시 주문진읍 주문로 59</span>
                        </div>
                        <!-- <div class="info">
                            <em class="item">(주)강릉밸류호텔</em><br>
                            <span class="item">대표이사: 송영철</span>
                            <span class="item">사업자등록번호 275-81-00923</span>
                            <span class="item">통신판매신고번호 제2018-강원강릉-0081호</span><br class="show-md">
                            <a onclick="openFtc('2758100923')">[사업자정보확인]</a><br>
                            <span class="item">메일문의: valuehotelgangneung@ebiznetworks.co.kr</span>
                        </div> -->
                        <div class="info">
                            <em class="item">(주)바로네트웍스</em><br>
                            <span class="item">대표이사: 박기범</span><br class="show-smxs">
                            <span class="item">주소 : 서울특별시 강남구 테헤란로82길 15, 3층(대치동, 디아이타워)</span><br>
                            <span class="item">사업자등록번호 : 215-87-85373</span>
                            <span class="item">통신판매업 : 제2017-서울강남-00561호</span><br>
                            <span class="item">여행등록번호 : 제2017-07호</span>
                            <span class="item">여행영업보증서 : 국내여행 제100-000-2015 0144 5816호</span><br>
                        </div>
                        <div class="info">
                            <em class="item">(주)이비즈네트웍스</em><br>
                            <span class="item">대표이사: 박기범</span><br class="show-smxs">
                            <span class="item">주소 : 서울특별시 강남구 테헤란로82길 15 (대치동, 디아이타워)</span><br>
                            <span class="item">사업자등록번호 : 220-87-30865</span>
                            <span class="item">통신판매업 : 강남-11501호</span><br>
                            <span class="item">여행등록번호 : 제2015-44호</span>
                            <span class="item">여행영업보증서 : 국내여행 제 100-000-2018041610009호 </span><br>
                            <span class="item">*이비즈네트웍스는 강릉씨베이호텔의 공식 온라인 총판으로서 온라인 예약 및 결제를 대행합니다. </span>
                        </div>
                        <p class="copyright">COPYRIGHT © SEABAY HOTEL GANGNEUNG. ALL RIGHTS RESERVED.</p>
                    </address>
                </div>
            </div>
		</div>
		<?php
			}
		?>
	</div>
</footer>

<!-- <footer class="footer">
	<div class="container">
		<ul class="sub_menu">
			<li class="active"><a href="/main/about">회사소개</a></li>
			<li class="l">|</li>
			<li><a href="/main/map">찾아오시는 길</a></li>
			<li class="l">|</li>
			<li><a href="/main/?r=access">이용약관</a></li>
			<li class="l">|</li>
			<li><a href="/main/?r=policy">개인정보취급방침이용약관</a></li>
			<li class="l">|</li>
			<li><a href="/main/?r=email">이메일무단수집금지</a></li>
		</ul>
		<?php
			if($cus != "park") {
		?>
		<div class="address">
			<div class="info">
				<div>
					<span>주소</span><b>강원도 강릉시 주문진읍 주문로 59</b>
				</div>
				<div>
					<span>이메일</span><b>valuehotelgangneung@ebiznetworks.co.kr </b>
				</div>
				<div>
					<span>예약실</span><b>1666-1243 </b>
				</div>
			</div>
			<div class="info">
				<div>
					<span>사업자명</span><b>㈜강릉밸류호텔 </b>
				</div>
				<div>
					<span>대표이사</span><b>송영철</b>
				</div>
				<div>
					<span>사업자등록번호</span><b>275-81-00923</b>
				</div>
				<div>
					<span>통신판매신고번호</span><b>제2017-서울강남-04727호</b>
				</div>
				<div>
					<span><a onclick="openFtc('2758100923')">[사업자정보확인]</a></span>
				</div>
			</div>
			<p>COPYRIGHT © 2018 VALUEHOTEL WORLDWIDE GANGNEUNG. ALL RIGHTS RESERVED.</p>
			<div class="footer_logo"></div>
		</div>
		<?php
			}
		?>
	</div>
</footer> -->


<script type="text/javascript" src="http://static.seabay.co.kr/svc/common/javascript/lib/jquery/jquery.parallax.js"></script>
<script type="text/javascript" src="http://static.seabay.co.kr/svc/common/javascript/lib/support/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="http://static.seabay.co.kr/svc/common/javascript/lib/jquery.word-break-keep-all.min.js"></script>
<!--[if lt IE 9]>
	<script type="text/javascript" src="http://static.seabay.co.kr/svc/common/javascript/lib/support/flexibility.min.js"></script>
<![endif]-->

<script type="text/javascript" src="http://static.seabay.co.kr/svc/common/javascript/lib/jssor/jssor.slider.min.js"></script>
<script type="text/javascript" src="http://static.seabay.co.kr/svc/lib/slick-master/slick/slick.js"></script>
<script type="text/javascript" src="http://static.seabay.co.kr/svc/common/javascript/func/function01.min.js"></script>
<script type="text/javascript" src="http://static.seabay.co.kr/svc/js/script.min.js"></script>

</body>

</html>

<?php
	include(INC_DIR."/config/closedb.php");
?>