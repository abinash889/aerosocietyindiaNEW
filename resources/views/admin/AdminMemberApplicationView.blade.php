@extends("layouts.app")

		@section("wrapper")
		<div class="page-wrapper">
			<div class="page-content">
				<div class="row row-cols-12">
					<div class="card pd_15">
						<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
							<div class="">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										
										<li class="breadcrumb-item active" aria-current="page">
                                            <a href="{{url('/membership')}}"><i class="bx bx-left-arrow" aria-hidden="true"></i> Back to Member Application</a>
                                        </li>
									</ol>
								</nav>
							</div>
							<!-- <div class="ms-auto">
								<div class="btn-group">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal"><i class="bx bx-plus"></i> Add Country</button>
								</div>
							</div> -->
						</div>
					</div>
				</div>
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
            	@endif
				<div class="row row-cols-12">
				<div class="card">
					<div class="card-body">
                       
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="row mb_10">
                                    <div class="col-lg-4">
                                    <p class="mb_10"><strong>Application ID: </strong>{{$fetchMember->VCH_Application_id}}</p>
                                        <p class="mb_10"><strong>Membership No: </strong><span>{{$fetchMember->vch_membership_no}}</span></p>
                                        <p class="mb_10"><strong>First name: </strong>{{$fetchMember->vch_firstname}}</p>
                                        <p class="mb_10"><strong>Middle name: </strong>{{$fetchMember->vch_middlename}}</p>
                                        <p class="mb_10"><strong>Surname: </strong>{{$fetchMember->vch_lastname}}</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="mb_10"><strong>DOB: </strong>{{date("F jS, Y", strtotime($fetchMember->vch_dob))}}</p>
                                        <p class="mb_10"><strong>Gender: </strong>{{$fetchMember->vch_gender}}</p>
                                        <p class="mb_10"><strong>Email-Id: </strong>{{$fetchMember->vch_emailid}}</p>
                                        <p class="mb_10"><strong>Member of Society: </strong>{{$fetchMember->vch_membersociety}}</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="mb_10"><strong>Primary phone no: </strong>{{$fetchMember->vch_phone1}}</p>
                                        <p class="mb_10"><strong>Secondary phone no: </strong>{{$fetchMember->vch_phone2}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb_10">
                                    <p><strong>ADDRESS DETAILS  <hr/></strong></p>
                                </div>
                                <div class="row mb_10">
                                    <div class="col-lg-6">
                                        <p><strong>Contact Address</strong></p>
                                        <p class="mb_10">{{$fetchMember->vch_contactaddress}}</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p><strong>Permanent Address </strong></p>
                                        <p class="mb_10">{{$fetchMember->vch_permanentaddress}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb_10">
                                    <p><strong>ACADEMIC INFORMATION  <hr/></strong></p>
                                </div>
                                <div class="row mb_10">
                                    @foreach($result as $results)
                                        <div class="col-lg-4">
                                            <p class="mb_10"><strong>Collage Name: </strong> {{$results[0]}}</p>
                                            <p class="mb_10"><strong>Degree: </strong> {{$results[1]}}</p>
                                            <p class="mb_10"><strong>Year of passing: </strong> {{$results[2]}}</p>
                                            <p class="mb_10"><strong>Specialization: </strong> {{$results[3]}}</p>
                                            <p class="mb_10"><strong>University: </strong> {{$results[4]}}</p>
                                            <p class="mb_10"><strong>Address: </strong> {{$results[5]}}</p>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-12 mb_10">
                                    <p><strong>PROFESSIONAL  INFORMATION  <hr/></strong></p>
                                </div>
                                <div class="row mb_10">
                                    @foreach($professionalresult as $resultsprofessional)
                                        <div class="col-lg-4">
                                            <p class="mb_10"><strong>Organisation Name: </strong> {{$resultsprofessional[0]}}</p>
                                            <p class="mb_10"><strong>From: </strong> {{$resultsprofessional[1]}}</p>
                                            <p class="mb_10"><strong>To: </strong> {{$resultsprofessional[2]}}</p>
                                            <p class="mb_10"><strong>Designation: </strong> {{$resultsprofessional[3]}}</p>
                                            <p class="mb_10"><strong>Job Description: </strong> {{$resultsprofessional[4]}}</p>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-12 mb_10">
                                    <p><strong>AWARDS  <hr/></strong></p>
                                </div>
                                <div class="row mb_10">
                                    @foreach($awardsresult as $resultsawardsl)
                                        <div class="col-lg-4">
                                            <p class="mb_10"><strong>Awards Name: </strong> {{$resultsawardsl[0]}}</p>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-12 mb_10">
                                    <p><strong>OTHER DETAILS  <hr/></strong></p>
                                </div>
                                <div class="row mb_10">
                                    <div class="col-lg-3 mb_10">
                                        <p class="mb_10"><strong><u>Proposer 1</u></strong></p>
                                        <p class="mb_10"><strong>Name: </strong>{{optional($fetchMember->propersorbelongs)->name}}</p>
                                        <p class="mb_10"><strong>Membsrship No: </strong>{{$fetchMember->vch_1propersormembernom}}</p>
                                        <p class="mb_10"><strong>Email-Id: </strong>{{$fetchMember->vch_1emailid}}</p>
                                        <p class="mb_10"><strong>Status: </strong>
                                            @if($fetchMember->INT1_pro_status==1)
                                                <span class="bg-success text-white fw_500 badge">Accepted</span>
                                            @elseif($fetchMember->INT1_pro_status==15)
                                                <span class="bg-warning text-white fw_500 badge">Rejected</span>
                                            @else($fetchMember->INT1_pro_status==0)
                                                <span class="bg-primary text-white fw_500 badge">Pending</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-lg-3 mb_10">
                                        <p class="mb_10"><strong><u>Proposer 2</u></strong></p>
                                        <p class="mb_10"><strong>Name: </strong>{{$fetchMember->INT_pro2_userid}}</p>
                                        <p class="mb_10"><strong>Membsrship No: </strong>{{$fetchMember->vch_2propersormembernom}}</p>
                                        <p class="mb_10"><strong>Email-Id: </strong>{{$fetchMember->vch_2emailid}}</p>
                                        <p class="mb_10"><strong>Status: </strong>
                                            @if($fetchMember->INT2_pro_status==1)
                                                <span class="bg-success text-white fw_500 badge">Accepted</span>
                                            @elseif($fetchMember->INT2_pro_status==15)
                                                <span class="bg-warning text-white fw_500 badge">Rejected</span>
                                            @else($fetchMember->INT2_pro_status==0)
                                                <span class="bg-primary text-white fw_500 badge">Pending</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-lg-3 mb_10">
                                        <p class="mb_10">
                                            <strong>Payment Mode:</strong>
                                            @if($fetchMember->INT_paymentmode==1)
                                                <span class="bg-dark fw_500 text-black badge">Online</span>
                                            @else($fetchMember->INT_paymentmode==0)
                                                <span class="bg-dark fw_500 text-black badge">Offline</span>
                                            @endif
                                        </p>
                                        <p class="mb_10">
                                            <strong>Payment Type:</strong>
                                            @if($fetchMember->INT_PaymentOffline__type==0)
                                                <span>Cheque</span>
                                            @else($fetchMember->INT_PaymentOffline__type==1)
                                                <span>DD</span>
                                            @endif
                                        </p>
                                        <p class="mb_10">
                                            <strong>Transaction Id:</strong>
                                            {{$fetchMember->vch_transactionID}}
                                        </p>
                                        <p class="mb_10">
                                            <strong>Payment Status:</strong>
                                            @if($fetchMember->Int_payment_status==0)
                                            <span class="bg-warning text-white fw_500 badge">Not Paid</span>
                                            @else($fetchMember->Int_payment_status==1)
                                            <span class="bg-success text-white fw_500 badge">Paid</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-lg-3 mb_10">
                                        <p class="mb_10">
                                            <strong>Membership Type:</strong>
                                            @if($fetchMember->int_memberid==1)
                                                <span>Graduate</span>
                                            @endif
                                        </p>
                                        <p class="mb_10"><strong>Membership Fee:</strong> {{$fetchMember->vch_fee}}</p>
                                        <p class="mb_10"><strong>Preffered Branch:</strong> {{$fetchMember->branchMbelongs->vch_branchname}}</p>
                                    </div>
                                    <div class="col-lg-12 mb_10">
                                        <p><strong>DOCUMENT DETAILS  <hr/></strong></p>
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="{{url('/Upload_DBImage',$fetchMember->vch_document1file)}}" target="_blank">
                                            <img src="{{url('/Upload_DBImage',$fetchMember->vch_document1file)}}" class="img-fluid">
                                        </a>
                                        <p class="mb_10">
                                            @if($fetchMember->vch_document1name==1)
                                            <span>Authentication Doc</span>
                                            @elseif($fetchMember->vch_document1name==2)
                                            <span>PAN</span>
                                            @elseif($fetchMember->vch_document1name==3)
                                            <span>Passport</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="{{url('/Upload_DBImage',$fetchMember->vch_document2file)}}" target="_blank">
                                            <img src="{{url('/Upload_DBImage',$fetchMember->vch_document2file)}}" class="img-fluid">
                                        </a>
                                        <p class="mb_10">
                                            @if($fetchMember->vch_document2name==1)
                                            <span>PAN</span>
                                            @elseif($fetchMember->vch_document2name==2)
                                            <span>Passport</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="{{url('/Upload_DBImage',$fetchMember->vch_sign)}}" target="_blank">
                                            <img src="{{url('/Upload_DBImage',$fetchMember->vch_sign)}}" class="img-fluid">
                                        </a>
                                        <p class="mb_10">Signature</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <img src="{{url('/Upload_DBImage',$fetchMember->vch_profile_photo)}}" class="img-fluid">
                            </div>
                        </div>
                       
					</div>
				</div>
				</div>
			</div>
		</div>
		@endsection
		
	@section("script")
	<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
	<script src="assets/js/index3.js"></script>
	<script>
		new PerfectScrollbar('.best-selling-products');
		new PerfectScrollbar('.recent-reviews');
		new PerfectScrollbar('.support-list');
	</script>
	<script>
		$("html").attr("class","color-sidebar sidebarcolor3 color-header headercolor1");
	</script>
	@endsection