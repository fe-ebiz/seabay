
		<?php
			switch($_GET["r"]) {
				case "superior_db":
					$p_title	= "수페리어 더블";
					$p_stitle	= "모던하며 심플한 인테리어로 쾌적하고 편안한 휴식을 만끽하실 수 있습니다.";
				break;
				case "dx_hollywood":
					$p_title = "디럭스 트윈";
					$p_stitle	= "안정감있고 아늑한 인테리어가 특징이며, 싱글베드 2개가 준비되어 있습니다.";
				break;
				case "dx_korea":
					$p_title = "디럭스 한실";
					$p_stitle	= "온화한 느낌의 한실 온돌타입으로 구성되어 있어있으며 2~4인 가족의 이용으로 최적입니다.";
				break;
				case "dx_double":
					$p_title = "디럭스 더블";
					$p_stitle	= "여행의 가치를 추구하는 연인, 친구, 가족 2인형 여행객들에게 적합한 더블타입 베드를 제공합니다.";
				break;
				case "dx_jacuzzi":
					$p_title = "자쿠지 패밀리트윈";
					$p_stitle	= "객실 내에 자쿠지(월풀)가 설비되어 있으며 테라스가 준비되어 개방감을 만끽하실 수 있습니다.";
				break;
				case "dx_familytwin":
					$p_title	= "디럭스 패밀리트윈";
					$p_stitle	= "더블베드와 싱글베드를 제공하여 3인 가족, 친구와 함께 이용하실 수 있는 힐링플레이스 입니다.";
				break;
				case "dx_quadkids":
					$p_title	= "디럭스 패밀리쿼드";
					$p_stitle	= "더블베드와 2층 침대를 제공하여 4인 가족과 친구 최대 4인이 함께 이용하실 수 있는 타입입니다.";
				break;
				case "premier_familytwin":
					$p_title	= "프리미어 패밀리트윈";
					$p_stitle	= "여유있는 공간, 더블베드와 싱글베드를 제공하여 3인 가족, 친구와 함께 이용하실 수 있습니다.";
				break;
				case "premier_suite":
					$p_title	= "프리미어 스위트";
					$p_stitle	= "주문진 야외 풍경, 독립형 욕조가 돋보이는 프리미어 스위트 객실입니다.";
				break;
				case "royalsuite":
					$p_title	= "로얄스위트";
					$p_stitle	= "넓고 아늑한 공간으로 최대 4인까지 편안하고 여유로운 시간을 보내실 수 있습니다.";
				break;
			}		
		?>
        <div class="sub_top_menu">
            <h4 class="page_title"><?=$p_title;?></h4>
            <h6 class="page_sub_title"><?=$p_stitle;?></h6>
            <ul class="menu_wrap container">
                <li class="menu_item <?php if($_GET["r"] == "superior_db") { echo "active"; } ?>"><a href="./?r=superior_db">수페리어 더블</a></li>
                <li class="menu_item <?php if($_GET["r"] == "dx_hollywood") { echo "active"; } ?>"><a href="./?r=dx_hollywood">디럭스 트윈</a></li>
                <li class="menu_item <?php if($_GET["r"] == "dx_korea") { echo "active"; } ?>"><a href="./?r=dx_korea">디럭스 한실</a></li>
                <li class="menu_item <?php if($_GET["r"] == "dx_double") { echo "active"; } ?>"><a href="./?r=dx_double">디럭스 더블</a></li>
                <li class="menu_item <?php if($_GET["r"] == "dx_jacuzzi") { echo "active"; } ?>"><a href="./?r=dx_jacuzzi">자쿠지 패밀리트윈</a></li>
                <li class="menu_item hidden-mdlg <?php if($_GET["r"] == "dx_familytwin") { echo "active"; } ?>"><a href="./?r=dx_familytwin">디럭스 패밀리트윈</a></li>
            </ul>
            <ul class="menu_wrap container">
                <li class="menu_item hidden-smxs <?php if($_GET["r"] == "dx_familytwin") { echo "active"; } ?>"><a href="./?r=dx_familytwin">디럭스 패밀리트윈</a></li>
                <li class="menu_item <?php if($_GET["r"] == "dx_quadkids") { echo "active"; } ?>"><a href="./?r=dx_quadkids">디럭스 패밀리쿼드</a></li>
				<!-- <li class="menu_item <?php if($_GET["r"] == "premier_familytwin") { echo "active"; } ?>"><a href="./?r=premier_familytwin">프리미어 패밀리트윈</a></li> -->
				<li class="menu_item <?php if($_GET["r"] == "premier_suite") { echo "active"; } ?>"><a href="./?r=premier_suite">프리미어 스위트</a></li>
                <li class="menu_item <?php if($_GET["r"] == "royalsuite") { echo "active"; } ?>"><a href="./?r=royalsuite">로얄스위트</a></li>
            </ul>
        </div>
