<!Doctype html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<div style="width:491px;background-color: #006fab;border-radius: 4px;">
			<table style="width:491px;margin-right: auto;margin-left: auto;">
				<tr>
					<td colspan="2" style="border-top-left-radius: 3px;border-top-right-radius: 3px;background-color: white;">
						<img src="https://www.aerosocietyindia.co.in/Content/AESI/images/logo.png" style="max-width:394px;margin-bottom: 13px;">
					</td>
				</tr>
			</table>
			<table style="width:491px;margin-right: auto;margin-left: auto;position: relative;top: -4px;background-color: #0072ac;padding-bottom: 8px;">
				<tr>
					<td colspan="2">
						<p style="font-family: verdana;text-align: left;font-size: 12px;margin: 0px;color: #ffffff;line-height: 140%;margin-top: 0px;word-wrap: break-word;padding-top: 6px;padding-left: 12px;">
							Annual Student Membership card valid up to 31 March 2020
						</p>
					</td>
				</tr>
			</table>
			<table style="width:491px;margin-right: auto;margin-left: auto;position: relative;top: -4px;background-color: #ffffff;padding-bottom: 16px;background-image: linear-gradient(0deg, #0072ac24, transparent);">
				<tr>
					<td>
						<p style="font-family: verdana; text-align: left; font-size: 12px; margin: 0px; color: #484546; line-height: 140%; word-wrap: break-word; padding-top: 6px; margin-left: 12px;">Name</p>
					</td>
					<td>
						<p style="font-weight: 600;font-family: verdana; text-align: left; font-size: 12px; margin: 0px; color: #484546; line-height: 140%; word-wrap: break-word; padding-top: 6px; padding-left: 12px;">
							{{$full_name}}
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<p style="font-family: verdana; text-align: left; font-size: 12px; margin: 0px; color: #484546; line-height: 140%; word-wrap: break-word; padding-top: 6px; margin-left: 12px;">Collage</p>
					</td>
					<td>
						<p style="font-weight: 600;font-family: verdana; text-align: left; font-size: 12px; margin: 0px; color: #484546; line-height: 140%; word-wrap: break-word; padding-top: 6px; padding-left: 12px;">
                        {{$c_name}}
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<p style="font-family: verdana; text-align: left; font-size: 12px; margin: 0px; color: #484546; line-height: 140%; word-wrap: break-word; padding-top: 6px; margin-left: 12px;">Membership No</p>
					</td>
					<td>
						<p style="font-weight: 600;font-family: verdana; text-align: left; font-size: 12px; margin: 0px; color: #484546; line-height: 140%; word-wrap: break-word; padding-top: 6px; padding-left: 12px;">
                        {{$member_code}}
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<p style="font-family: verdana; text-align: left; font-size: 12px; margin: 0px; color: #484546; line-height: 140%; word-wrap: break-word; padding-top: 6px; margin-left: 12px;">Date of Issue</p>
					</td>
					<td>
						<p style="font-weight: 600;font-family: verdana; text-align: left; font-size: 12px; margin: 0px; color: #484546; line-height: 140%; word-wrap: break-word; padding-top: 6px; padding-left: 12px;">
                        {!! date("F j, Y", strtotime($dateof_issue)) !!}
						</p>
					</td>
				</tr>
				<tr>
					<td>
						
					</td>
					<td style="padding-right: 21px;text-align:right;">
						<img src="sign.jpg" style="max-width: 101px;margin-top: -31px;">
						<p style="font-weight: 600;font-family: verdana;font-size: 11px; margin: 0px; color: #484546; line-height: 140%; word-wrap: break-word; padding-top: 6px; padding-left: 12px;">
							
							YATINDRA KUMAR
							<br/>
							Secy. (Admn)
						</p>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>