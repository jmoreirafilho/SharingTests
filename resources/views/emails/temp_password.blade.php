<div style="background-color: #ccc; width: 100%; padding-top:50px; padding-bottom:50px">
<table align="center" cellspacing="0px" cellpadding="0px" style="width:60%; background-color:#FFF; box-shadow:0px 3px 5px #666;">
	<tr>
		<td style="background-color: #1a237e; color: #FFF; border:1px solid #000; padding:15px; font-size:24px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">
			@lang('home.temp_password_mail_title')
		</td>
	</tr>
	<tr>
		<td style="padding:20px;">
			<h3 style="color:#333;">@lang('home.temp_password_text_1')</h3>
			<div style="background-color:#ddd; padding-top:5px; padding-left:25px; padding-bottom:5px;">
				<p style="color:#333;">@lang('home.temp_password_text_2'): <strong><?php echo $password; ?></strong></p>
				<p style="color:#333;">@lang('home.temp_password_text_3')</p>
			</div>
		</td>
	</tr>
	<tr>
		<td style="text-align:center; padding:10px; border-top: 1px solid #ccc">
			<a href="http://104.236.95.96/" style="text-decoration:none; font-weight: bold; font-size: 20px;">@lang('home.temp_password_text_4')</a>
		</td>
	</tr>
</table>
</div>