<!DOCTYPE html>
<html>
<head>
	<title>机房动力环境监测系统</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- <link rel="stylesheet" type="text/css" href="css.css"> -->
	<link rel="stylesheet" type="text/css" href="../css/css.css">
	<!-- 引入jQuery和highcharts -->
	<script src="http://cdn.staticfile.org/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/echarts/4.3.0/echarts.min.js"></script>
	<script src="http://code.highcharts.com/highcharts.js"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>

	
<div class="nav-box">
<nav class="nav2">
	<div class="nav2-title">
		<div class="titleContent">
			<a href="index.html">机房动力环境监控系统</a>
		</div>
	</div>
	<ul>
		<li class="FirstNav" id="FirstNav">
			<div id="Nav_word1">
				<div class="svgWord">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="18" height="18"><path d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z" style="fill: white;"></path></svg>
					<span>信息采集</span>
				</div>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="13.5" height="13.5"><path d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z" style="fill: white"></path></svg>
			</div>
			<ul>
				<li>
					<div class="Nav_word2_box">
						<a href="/room_temperature/addMsg/addMsg.html" id="Nav_word2">每日电表数据</a>
					</div>
				</li>
			</ul>
		</li>
		<li class="FirstNav">
			<div id="Nav_word1">
				<div class="svgWord">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16"><path d="M464 128H272l-64-64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V176c0-26.51-21.49-48-48-48z"style="fill: white"></path></svg>
					<span style="left: 4px;">数据统计</span>
				</div>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="13.5" height="13.5"><path d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z" style="fill: white"></path></svg>
			</div>
			<ul>
				<li>
					<div class="Nav_word2_box">
						<a href="/room_temperature/temperatureMintor/temperatureShow.php" id="Nav_word2">温湿度监控</a>
					</div>
				</li>
			</ul>
			<ul>
				<li>
					<div class="Nav_word2_box">
						<a href="/room_temperature/temperatureMintor/temperatureMintor.php" id="Nav_word2">查看当前温度</a>
					</div>
				</li>
			</ul>
			<ul>
				<li>
					<div class="Nav_word2_box">
						<a href="/room_temperature/ViewMsg/TableWatch.php" id="Nav_word2">每日电表数据</a>
					</div>
				</li>
			</ul>
			<ul>
				<li>
					<div class="Nav_word2_box">
						<a href="/room_temperature/ViewMsg/electricity_consumption.php" id="Nav_word2">每日用电量</a>
					</div>
				</li>
			</ul>
			<ul>
				<li>
					<div class="Nav_word2_box">
						<a href="/room_temperature/ViewMsg/graphWatch.php" id="Nav_word2">图表展示</a>
					</div>
				</li>
			</ul>
		</li>
	</ul>
</nav>
<div class="rightContent">
	<nav class="nav3">
	<div class="nav3-box">
		<div class="indent">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="24" height="24"><path d="M0 84V44c0-8.837 7.163-16 16-16h416c8.837 0 16 7.163 16 16v40c0 8.837-7.163 16-16 16H16c-8.837 0-16-7.163-16-16zm176 144h256c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H176c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zM16 484h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm160-128h256c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H176c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm-52.687-111.313l-96-95.984C17.266 138.652 0 145.776 0 160.016v191.975c0 14.329 17.325 21.304 27.313 11.313l96-95.992c6.249-6.247 6.249-16.377 0-22.625z" style="fill: rgba(146, 146, 146)"></path></svg>
		</div>
		<div class="search">
			<form action="../search/search.php" method="post">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="请输入搜索内容" name="SearchContent">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit">
							搜索
						</button>
					</span>
				</div><!-- /input-group -->
			</form>
		</div>
		<div class="nav3-right">
			<span>{用户名}</span>
		</div>
		</div>
	</nav>
	<!-- 主体内容 -->
	<div id="main" class="GraphBox"></div>
</div>
</div>
</body>
<script type="text/javascript" src="js.js"></script>
</html>