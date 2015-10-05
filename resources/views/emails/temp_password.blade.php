<html>
	<head>
	<title>@lang('home.temp_password_mail_title')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<style type="text/css">
		.body{
			background-color:#eff8fa;
			width:100%;
		}
		.mail-content {
			position:absolute;
			background-color: #FFF;
			margin-top:20px;
			margin-left:10%;
			width: 80%;
			box-shadow: 0px 3px 5px #666;
			padding:20px;
		}
		.mail-content-title {
			margin: -20px; margin-bottom:20px;
			background-color:#1a237e;
			color:#FFF;
			padding:15px;
			font-size:24px;
			font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
		}
		.mail-content-footer {
			margin:;
			border-top:1px solid #ccc;
			padding:5px;
			padding-top:10px;
			margin:-10px;
			margin-top:15px;
			text-align: center;
		}
		.mail-subcontent {
			background-color:#E9E9E9;
			padding-top:5px;
			padding-left:25px;
			padding-bottom:5px;
		}
		.mail-link {
			text-decoration: none;
			font-weight: bold;
			font-size:20px;
		}
		.mail-link:hover {
			text-shadow: 0px 0px 1px #009;
		}
		</style>
	</head>
	<body>
		<div class="body">
			<div class="mail-content">
				<div class="mail-content-title">
					@lang('home.temp_password_mail_title')
				</div>
				<h3>@lang('home.temp_password_text_1')</h3>
				<div class="mail-subcontent">
					<p class="mail-text">@lang('home.temp_password_text_2'): <strong><?php echo $password; ?></strong></p>
					<p class="mail-text">@lang('home.temp_password_text_3')</p>
				</div>
				<div class="mail-content-footer">
					<a href="http://104.236.95.96/" class="mail-link">@lang('home.temp_password_text_4')</a>
				</div>
			</div>
		</div>
	</body>
</html>