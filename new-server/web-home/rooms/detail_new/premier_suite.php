

    <div class="body"></div>
    <br class="br_sub">

    <div class="sub room_detail">
        <div id="slider_room" class="slider_container room">
            <div data-u="slides" class="slides">
                <div data-p="112.50"><img data-u="image" class="room-visibility" src="http://img.seabay.co.kr/svc/img/rooms/_new/premier_suite/01.jpg" alt="01" /></div>
                <div data-p="112.50"><img data-u="image" class="room-visibility" src="http://img.seabay.co.kr/svc/img/rooms/_new/premier_suite/02.jpg" alt="02" /></div>
                <div data-p="112.50"><img data-u="image" class="room-visibility" src="http://img.seabay.co.kr/svc/img/rooms/_new/premier_suite/03.jpg" alt="03" /></div>
                <div data-p="112.50"><img data-u="image" class="room-visibility" src="http://img.seabay.co.kr/svc/img/rooms/_new/premier_suite/04.jpg" alt="04" /></div>
            </div>
            <span u="arrowleft" class="jssor-sprite arow-left" style="width: 21px; height: 32px; top: 290px; left: 20px;"></span>
            <span u="arrowright" class="jssor-sprite arow-right" style="width: 21px; height: 32px; top: 290px; right: 20px"></span>
        </div>

		<?php
			include("./navi_new.php");
		?>

        <div class="container">
            <div class="detail box_center">
                <div class="box_right">
                    <h3>RESERVATION</h3>
					<?php
						include('./reservation.php');
					?>
                </div>
                <div class="box_left">
                    <?php
						include('./useicon.php');
                    ?>
                    <!-- <div class="event-banner-petroom">
                        <a href="http://www.seabay.co.kr/reserve/" target="_blink">
                            <img class="img-petroom-pc" src="http://img.seabay.co.kr/svc/img/event/petroom_pc.jpg" alt="펫배너_pc">
                            <img class="img-petroom-mobile" src="http://img.seabay.co.kr/svc/img/event/petroom_m.jpg" alt="펫배너_모바일">
                        </a>
                    </div> -->
                    <div class="description">
                        <div class="title">
                            <h5>ROOM QUICKVIEW</h5>
                        </div>
                        <div class="cont">
                            <ul class="c_list">
                                <li>객실 크기 : 32.7 ~ 36.4㎡ (9.9평 ~ 11평)</li>
                                <li>침대 타입 : 더블</li>
                                <li>객실당 인원 : 기준 인원 2인, 최대 인원 2인</li>
                                <li>독립형 욕실욕조</li>
                            </ul>
                        </div>
                    </div>

					<?php
						include('./description.php');
					?>
                </div>
                <!-- /.box_left -->
            </div>
        </div>
    </div>
