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
                                            <a href="{{url('/studentapplications')}}"><i class="bx bx-left-arrow" aria-hidden="true"></i> Back to Student Application</a>
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
                                        <p class="mb_10"><strong>Application ID: </strong>{{$fetchStudent->VCH_Application_id}}</p>
                                        <p class="mb_10"><strong>Membership No: </strong><span>{{$fetchStudent->vch_membershipno}}</span></p>
                                        <p class="mb_10"><strong>First name: </strong>{{$fetchStudent->vch_fname}}</p>
                                        <p class="mb_10"><strong>Middle name: </strong>{{$fetchStudent->vch_mname}}</p>
                                        <p class="mb_10"><strong>Surname: </strong>{{$fetchStudent->vch_lname}}</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="mb_10"><strong>DOB: </strong>{{date("F jS, Y", strtotime($fetchStudent->vch_dob))}}</p>
                                        <p class="mb_10"><strong>Gender: </strong>{{$fetchStudent->vch_gender}}</p>
                                        <p class="mb_10"><strong>Email-Id: </strong>{{$fetchStudent->vch_emailid}}</p>
                                        <p class="mb_10"><strong>Member of Society: </strong>{{$fetchStudent->vch_membersociety}}</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <p class="mb_10"><strong>Primary phone no: </strong>{{$fetchStudent->vch_phone1}}</p>
                                        <p class="mb_10"><strong>Secondary phone no: </strong>{{$fetchStudent->vch_phone2}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb_10">
                                    <p><strong>ADDRESS DETAILS  <hr/></strong></p>
                                </div>
                                <div class="row mb_10">
                                    <div class="col-lg-6">
                                        <p><strong>Contact Address</strong></p>
                                        <p class="mb_10">{{$fetchStudent->vch_contactaddress}}</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p><strong>Permanent Address </strong></p>
                                        <p class="mb_10">{{$fetchStudent->vch_permanentaddress}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb_10">
                                    <p><strong>EDUCATION DETAILS  <hr/></strong></p>
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
                                    <p><strong>OTHER DETAILS  <hr/></strong></p>
                                </div>
                                <div class="row mb_10">
                                    <div class="col-lg-5 mb_10">
                                        <p class="mb_10">
                                                <strong>Membership Type:</strong>
                                                @if($fetchStudent->int_memberid==1)
                                                    <span>Student 1 Year</span>
                                                @elseif($fetchStudent->int_memberid==2)
                                                    <span>Student 2 Year</span>
                                                @elseif($fetchStudent->int_memberid==3)
                                                    <span>Student 3 Year</span>
                                                @elseif($fetchStudent->int_memberid==4)
                                                    <span>Student 4 Year</span>
                                                @else($fetchStudent->int_memberid==5)
                                                    <span>Student 5 Year</span>
                                                @endif
                                        </p>
                                        <p class="mb_10"><strong>Membership Fee:</strong> {{$fetchStudent->vch_fee}}</p>
                                        <p class="mb_10"><strong>Preffered Branch:</strong> {{$fetchStudent->branchbelongs->vch_branchname}}</p>
                                    </div>
                                    <div class="col-lg-3 mb_10">
                                        <p class="mb_10">
                                            <strong>Payment Mode:</strong>
                                            @if($fetchStudent->INT_paymentmode==0)
                                                <span class="bg-dark fw_500 text-black badge">Online</span>
                                            @else($fetchStudent->INT_paymentmode==1)
                                                <span class="bg-dark fw_500 text-black badge">Offline</span>
                                            @endif
                                        </p>
                                        <p class="mb_10">
                                            <strong>Payment Type:</strong>
                                            @if($fetchStudent->INT_Payment_type==0)
                                                <span>Cheque</span>
                                            @elseif($fetchStudent->INT_Payment_type==1)
                                                <span>DD</span>
                                            @endif
                                        </p>
                                        <p class="mb_10">
                                            <strong>Transaction Id:</strong>
                                            {{$fetchStudent->vch_transactionID}}
                                        </p>
                                    </div>
                                    <div class="col-lg-3 mb_10">
                                        <p class="mb_10">
                                            <strong>Payment Status:</strong>
                                            @if($fetchStudent->Int_payment_status==0)
                                            <span class="bg-warning text-white fw_500 badge">Not Paid</span>
                                            @else($fetchStudent->Int_payment_status==1)
                                            <span class="bg-success text-white fw_500 badge">Paid</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-lg-12 mb_10">
                                        <p><strong>DOCUMENT DETAILS  <hr/></strong></p>
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="{{url('/Upload_DBImage',$fetchStudent->vch_document1file)}}" target="_blank">
                                            <img src="{{url('/Upload_DBImage',$fetchStudent->vch_document1file)}}" class="img-fluid">
                                        </a>
                                        <p class="mb_10">
                                        <p class="mb_10">
                                            @if($fetchStudent->vch_document1name==1)
                                            <span>Authentication Doc</span>
                                            @elseif($fetchStudent->vch_document1name==2)
                                            <span>PAN</span>
                                            @elseif($fetchStudent->vch_document1name==3)
                                            <span>Passport</span>
                                            @endif
                                        </p>
                                        </p>
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="{{url('/Upload_DBImage',$fetchStudent->vch_document2file)}}" target="_blank">
                                            <img src="{{url('/Upload_DBImage',$fetchStudent->vch_document2file)}}" class="img-fluid">
                                        </a>
                                        <p class="mb_10">
                                            @if($fetchStudent->vch_document2name==1)
                                            <span>Authentication Doc</span>
                                            @elseif($fetchStudent->vch_document2name==2)
                                            <span>PAN</span>
                                            @elseif($fetchStudent->vch_document2name==3)
                                            <span>Passport</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="{{url('/Upload_DBImage',$fetchStudent->vch_sign)}}" target="_blank">
                                            <img src="{{url('/Upload_DBImage',$fetchStudent->vch_sign)}}" class="img-fluid">
                                        </a>
                                        <p class="mb_10">Signature</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <img src="{{url('/Upload_DBImage',$fetchStudent->vch_profile_photo)}}" class="img-fluid">
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