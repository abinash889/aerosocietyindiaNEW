<!Doctype html>
<html>
	<head>
		<title></title>
	</head>
	<body>
	@php
	$Branch=App\Models\AddBranch::where('id', $Branchname)->get('vch_branchname');

	@endphp
	
		<div style="border-radius: 4px;">
			<table style="position: relative;top: -4px;padding-bottom: 8px;width:100%;">
				<tr>
					<td>
						<p style="font-family: verdana;text-align: left;margin: 0px;line-height: 140%;margin-top: 0px;word-wrap: break-word;padding-top: 6px;">
							Mr. {{$f_name}}<br/>
							Sci/Eng-SF, Indian Space Research <br/>Organisation,{{$Branch[0]->vch_branchname}}
						</p>
					</td>
					<td>
						<p style="font-weight: 600;font-family: verdana; text-align: left; margin: 0px; color: #484546; line-height: 140%; word-wrap: break-word; padding-top: 6px;">
                        {!! date("F j, Y", strtotime($dateissue)) !!}
						</p>
					</td>
				</tr>
			</table>
			<table style="position: relative;top: -4px;background-color: #ffffff;padding-bottom: 16px;background-image: linear-gradient(0deg, #0072ac24, transparent);">
				<tr>
					<td>
						<p style="font-weight: 600;font-family: verdana; text-align: left;  margin: 0px; color: #484546; line-height: 140%; word-wrap: break-word; padding-top: 6px;">
							Dear Sir,
						</p>
						<p style="text-align:justify;">
						I am glad to inform that you have been elected as "Member" of the
Society.<br/> Your membership number is <strong>{{$membercode}}</strong> which should be
quoted in all correspondence with us. You can suffix professional
qualification M. Ae.S.l, after your name as long as you are a Member
of the Society.
						</p>
						<p style="text-align:justify;">
						You are affiliated to <strong>{{$Branch[0]->vch_branchname}}</strong> from where you will
receive information about technical lectures, meetings, seminars and
other activities. The journal may be obtained from “ Editor “ of the
Journal of the Society by making a separate request. An option form
for this purpose is enclosed for completion and submission to the
Editor of the Journal directly.
						</p>
						<p style="text-align:justify;">
						The enclosed life membership card confers on you the rights &
privileges as member of the Society and should be produced on
demand at all programs organized by the Society. Cash receipt
number <strong>{{$transID}}</strong> of  <strong>{{$Price}}/-</strong> is enclosed. Please keep us informed
about any change in your mailing address or e-mail
						</p>
						<p>
							Thanking You.
						</p>
						<p style="text-align:right;">
						Yours faithfully,<br/>

						(Sandip Acharya)<br/>
						Secretary (Adm)
						</p>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>