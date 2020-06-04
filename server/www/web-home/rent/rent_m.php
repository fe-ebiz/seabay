
    <link rel="stylesheet" href="http://static.go.co.kr/css/mobile_layout_goco.css" type="text/css">
    <link rel="stylesheet" href="http://static.seabay.co.kr/svc/css/rent/init_m.css">
	
	<div class="body"></div>
    <br class="br_sub">

    <!-- 190109 .type-2 클래스 추가 -->
    <table id="product_info" class="type-2">
        <colgroup>
            <col width="25%">
            <col width="75%">
        </colgroup>
        <tbody>
            <tr>
                <!-- 스타일 수정 -->
                <td colspan="2" height="35" class="product_info_title" style="padding:0; font-weight:bold; font-size:16px; text-align: center; color: #000; background: #fff">
                    7일부터 6개월까지 이용가능!
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table class="roomINFO" width="100%">
                        <colgroup>
                            <col width="40%">
                            <col width="30%">
                            <col width="30%">
                        </colgroup>
                        <tbody>
                            <tr>
                                <td class="tit">상품정보</td>
                                <td class="tit">숙박기간</td>
                                <td class="tit">특혜</td>
                            </tr>
                            <tr class="bd-b0">
                                <th rowspan="4">
                                    수페리어<br>
                                    디럭스<br>
                                    프리미어 디럭스<br>
                                    스위트룸
                                </th>
                                <th>7일
                                </th>
                                <td rowspan="4" style="font-weight:bold; letter-spacing: -1px; color:#ff0000;">
                                    <span style="font-size:14px;">공과금 일체 포함</span>
                                    <span style="display: block; font-size:10px;">(전기,수도,가스요금 등)</span>
                                </td>
                            </tr>
                            <tr class="bd-b0">
                                <th>14일</th>
                            </tr>
                            <tr class="bd-b0">
                                <th>1개월</th>
                            </tr>
                            <tr class="bd-b0">
                                <th>6개월</th>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <script type="text/javascript">
                $(function() {
                    $("input[name='rent_checkin']").val($(".sdate").val());
                    $("input[name='rent_checkout']").val($(".edate").val());
                    $("input[name='rent_r_no']").val($(":input:radio[name=room_type]:checked").val());


                    $(".sdate").datepicker({
                        dateFormat: "yy-mm-dd",
                        showAnim: "slideDown",
                        dayNamesMin: ["일", "월", "화", "수", "목", "금", "토"],
                        minDate: "2019-01-09",
                        changeMonth: true,
                        changeYear: true,

                    });


                    $('.sdate').datepicker("option", "onClose", function(selectedDate) {
                        edate = ($(".sdate").val()).split("-");
                        var dt = new Date(edate[1] + "/" + edate[2] + "/" + edate[0]);
                        var day = dt.getDate();
                        var month = (dt.getMonth()) + 1;
                        var year = dt.getFullYear();

                        dt.setDate(dt.getDate() + 1);
                        day = dt.getDate();
                        month = (dt.getMonth()) + 1;
                        year = dt.getFullYear();

                        edate_val = year + "-" + month + "-" + day;
                        $(".edate").datepicker("option", "minDate", edate_val);
                    });
                    $('.edate').datepicker("option", "minDate", $(".sdate").val());
                    $("#nseldate").datepicker({
                        dateFormat: "yy-mm-dd",
                        showAnim: "slideDown",
                        dayNamesMin: ["일", "월", "화", "수", "목", "금", "토"],
                        minDate: "2019-01-10",
                        changeMonth: true,
                        changeYear: true
                    });
                });

                function rent_price() {
                    $.ajax({
                        type: "POST",
                        url: "./state.php",
                        data: $("form[name='rent_form']").serialize(),
                        success: function(e) {
                            var res = e.split("||");
                            $("#room_price").html(res[0] + "원");
                            $("#serve_price").html(res[1] + "원");
                            $("#vat_price").html(res[2] + "원");
                            $("#total_price").html(res[3] + "원");
                            $("input[name='night']").val(res[4]);
                        }
                    });
                }
            </script>
            <?php
				include("./rent_price_m.php");
			?>
            <tr>
                <td height="40" colspan="2" align="center" class="info_title">소개</td>
            </tr>
            <tr>
                <th height="37">주소</th>
                <td>강원도 강릉시 주문진읍 주문로 59</td>
            </tr>
            <tr>
                <th height="37">홈페이지</th>
                <td class="link">
                    <a href="http://seabay.co.kr" title="씨베이호텔 홈페이지" target="_blank">http://seabay.co.kr</a>
                </td>
            </tr>
            <tr>
                <th height="37">건축규모</th>
                <td>슈페리어(6.4평형), 디럭스(7.6평형), 디럭스패밀리(7.6평형), 프리미어디럭스(9.9평형), 오션스위트(15.2평형), 오션패밀리스위트(15.2평형)</td>
            </tr>
            <tr>
                <th height="37">총 객실수</th>
                <td>340개 객실</td>
            </tr>
            <tr>
                <th height="57">기본시설</th>
                <td>TV / 개별냉난방기 / 객실금고 / USB충전단자 / 무료WIFI / 욕실용품 등</td>
            </tr>
            <tr>
                <th height="57">부대시설</th>
                <td>연회장 / 수영장 / 비즈니스코너 / 하늘공원</td>
            </tr>
            <tr>
                <th height="57">주변안내</th>
                <td>주문진 방파제 / 안목항 커피해변 / 정동진역 / 강릉솔향수목원 / 오죽한옥마을 / 강릉통일공원 / 노추산모정탑 / 정동심곡바다부채길 / 소금강 등</td>
            </tr>

            <tr>
                <td height="40" colspan="2" align="center" class="info_title info_detail">상세정보 <img src="http://img.go.co.kr/mobile/icon_arrow_open.jpg" width="10"></td>
            </tr>
            <tr>
                <td>
                    <!-- 호텔 상세이미지 -->
                    <img src="http://img.seabay.co.kr/svc/img/rent/detail/01.jpg" alt="강릉씨베이 호텔 소개이미지" style="width:400%">
                    <img src="http://img.seabay.co.kr/svc/img/rent/detail/02_1.jpg" alt="강릉씨베이 호텔 소개이미지" style="width:400%">
                    <img src="http://img.seabay.co.kr/svc/img/rent/detail/02_2.jpg" alt="강릉씨베이 호텔 소개이미지" style="width:400%">
                    <img src="http://img.seabay.co.kr/svc/img/rent/detail/03.jpg" alt="강릉씨베이 호텔 소개이미지" style="width:400%">
                    <img src="http://img.seabay.co.kr/svc/img/rent/detail/04.jpg" alt="강릉씨베이 호텔 소개이미지" style="width:400%">
                    <img src="http://img.seabay.co.kr/svc/img/rent/detail/05.jpg" alt="강릉씨베이 호텔 소개이미지" style="width:400%">
                </td>
            </tr>
            <tr>
                <td height="40" colspan="2" align="center" class="info_title">인사말 <img src="http://img.go.co.kr/mobile/icon_arrow_open.jpg" width="10"></td>
            </tr>
            <tr>
                <td colspan="2" class="info_text">
                    <div id="" class="text">
                        하늘과 맞닿은 푸른 바다를 정원처럼 느끼는 곳!<br>
                        강릉 씨베이호텔!<br>
                        우리 호텔은 아름다운 푸른 동해가 호텔 바로 앞에 파노라마처럼 펼쳐져 있으며,
                        TVN 드라마 '도깨비'에서 도깨비(공유 분)가 지은탁(김고은 분)에게 메밀꽃을 선물한 장면으로 유명한 '주문진 방파제'가 차량으로 약 5분 거리에 있습니다.<br>
                        또한, 신사임당이 태어나고 율곡 이이가 성장한 곳으로 유명한 '오죽헌', 커피해변으로 유명한 '안목항 커피해변',
                        바다와 역이 만나는 '정동진역', 그리고 몸과 마음이 힐링되는 '강릉솔향수목원' 등 천혜의 관광코스가 호텔과 가깝습니다.<br>
                        가족, 친구, 그리고 사랑하는 사람들과 잊지못할 추억과 감동을 강릉 씨베이호텔과 함께 하시기를 바랍니다.
                    </div>
                </td>
            </tr>
            <!-- <tr>
                <td colspan="2">
                    <div class="btn_search"><a href="tel:01088171634" title="전화걸기">전화문의 010-8817-1634 </a></div>
                </td>
            </tr> -->
        </tbody>
    </table>

    <!-- 상단 슬라이드 -->
    <script text="text/javascript">
        $(function() {

            var swiper = new Swiper('.swiper-container', {
                scrollbar: '.swiper-scrollbar', // 스크롤
                scrollbarHide: false, // 스크롤 안할때도 스크롤바 숨기지 않음
                uniqueNavElements: true,
                loop: true,
                nextButton: '.swiper-button-next',
                prevButton: '.swiper-button-prev',

                autoplayDisableOnInteraction: false,
                paginationBulletRender: function(index, className) {
                    return '<span class="' + className + '"></span>';
                }
            });

        });
    </script>
    <!--//190109 장단기숙박 -->


    <div class="clr"></div>
    
    <!--슬라이딩 버튼 부분-->
	<div class="rent-sliding-banner">
		<a href="http://www.seabay.co.kr/reserve/"><img src="http://img.seabay.co.kr/svc/img/rent/etc/btn_sliding_banner.png" alt="객실예약 버튼"></a>
	</div>