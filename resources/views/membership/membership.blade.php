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
										<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Add / View Member</li>
									</ol>
								</nav>
							</div>
							<!-- <div class="ms-auto">
								<div class="btn-group">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal"><i class="bx bx-plus"></i> Add Events</button>
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
							<div class="table-responsive">
								<table id="example2" class="table table-striped table-bordered tbl">
									
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Email</th>

											<th>Payment Mode</th>
											<th>Payment Status</th>

											<th>Approve/Reject Status</th>

											<th>Action / Status</th>
										</tr>
									</thead>
									<tbody>
									
									@foreach($membership as $key=>$memberships)
									
									@php
									
									$grading=App\Models\Gradingcommittee::where('INT_user_id',Auth::id())->get('INT_level');

									if($memberships->int_grading_level >= $grading[0]->INT_level){
									@endphp
									
										
										<tr>

											<td>{{$key+1}}</td>
											<td>
												@php $MembershipID=Crypt::encrypt($memberships->id); @endphp
												<a href="{{url('/membership_edit_by_admin',$MembershipID)}}">{{$memberships->vch_firstname}}</a>
											</td>
											
											<td>{{$memberships->vch_emailid}}</td>

											<td>
												@if($memberships->INT_Payment_type ==1)
												<span class="bg-secondary fw_500 text-white badge">Online</span>
												@endif
												@if($memberships->INT_Payment_type ==0  && $memberships->Int_payment_status=="")
												<span class="bg-dark fw_500 text-black badge">Offline</span><br/>
												<a href="#" data-bs-toggle="modal" data-bs-target="#acceptofflinepaymentModal{{$memberships->id}}" class="bg-info fw_500 text-black badge">Click to Update</a>
												@endif
												@if($memberships->INT_Payment_type ==0 && $memberships->Int_payment_status==1)
												<span class="bg-dark fw_500 text-black badge">Offline</span>
												@endif
											</td>
											<td>
												@if($memberships->Int_payment_status ==1)
													<span class="bg-success text-white fw_500 badge">Paid</span>
												@endif
												@if($memberships->Int_payment_status ==0)
												<span class="bg-warning text-white fw_500 badge">Unpaid</span>
												@endif
											</td>
											<td>
											@if($memberships->INT1_pro_status==15 && $memberships->INT2_pro_status==0)
											<span>Proposer1 <span class="badge bg-success">Rejected</span></span>
											@elseif($memberships->INT1_pro_status==0 && $memberships->INT2_pro_status==15)
											<span>Proposer2 <span class="badge bg-success">Rejected</span></span>
											@elseif($memberships->INT1_pro_status==15 && $memberships->INT2_pro_status==1)
											<span>Proposer1 <span class="badge bg-success">Rejected</span></span>
											@elseif($memberships->INT1_pro_status==1 && $memberships->INT2_pro_status==15)
											<span>Proposer2 <span class="badge bg-success">Rejected</span></span>

										@elseif($memberships->INT1_pro_status!==1 || $memberships->INT2_pro_status!==1)
											<span>Proposer <span class="badge bg-success">Pending</span></span>
											@elseif($memberships->Int_approve_status==1 && $memberships->INT1_pro_status==1 && $memberships->INT2_pro_status==1)
											<span>Proposer <span class="badge bg-success">Accepted</span></span>
												@elseif($memberships->Int_approve_status==2)
												<span>Proposer <span class="badge bg-danger">Rejected</span></span>
												@elseif($memberships->Int_approve_status==3)
												<span>Level 1 <span class="badge bg-success">Accepted</span></span>
												@elseif($memberships->Int_approve_status==4)
												<span>Level 1 <span class="badge bg-danger">Rejected</span></span>
												@elseif($memberships->Int_approve_status==5)
												<span>Level 2 <span class="badge bg-success">Accepted</span></span>
												@elseif($memberships->Int_approve_status==6)
												<span>Level 2 <span class="badge bg-danger">Rejected</span></span>
												@elseif($memberships->Int_approve_status==7)
												<span>Level 3 <span class="badge bg-success">Accepted</span></span>
												@elseif($memberships->Int_approve_status==8)
												<span>Level 3 <span class="badge bg-danger">Rejected</span></span>
												@elseif($memberships->Int_approve_status==9)
												<span>Level 4 <span class="badge bg-success">Accepted</span></span>
												@elseif($memberships->Int_approve_status==10)
												<span>Level 4 <span class="badge bg-danger">Rejected</span></span>
												@elseif($memberships->Int_approve_status==11)
												<span>Level 5 <span class="badge bg-success">Accepted</span></span>
												@elseif($memberships->Int_approve_status==12)
												<span>Level 5 <span class="badge bg-danger">Rejected</span></span>
												@elseif($memberships->Int_approve_status==13)
												<span>Level 6 <span class="badge bg-success">Accepted</span></span>
												@elseif($memberships->Int_approve_status==14)
												<span>Level 6 <span class="badge bg-danger">Rejected</span></span>
											@endif
											</td>	
											<td>
											@php 
												$array =[2,4,6,8,10,12,14,11];
											@endphp

											@php 
												$arraylast =[1,3,5,7,9,10];
											@endphp

											@if($memberships->Int_approve_status==11 && $memberships->int_grading_level==Auth::id())	
										

											
																			
											<!-- <td> -->
											@php $approv_id=Crypt::encrypt($memberships->id); @endphp
											@php $reject_id=Crypt::encrypt($memberships->id); @endphp
												<a href="{{url('/membership_Approved_insert_user', $approv_id)}}" class="bg-success text-white pd_db_r1">Approve1</a>
												<a href="{{url('/membership_Rejected', $reject_id)}}" class="bg-warning text-white pd_db_r1">Reject</a>
											<!-- </td> -->
											

											@elseif(!in_array($memberships->Int_approve_status, $array))
											@if($memberships->INT1_pro_status==1 && $memberships->INT2_pro_status==1)

											@if(in_array($memberships->Int_approve_status, $arraylast) && $memberships->int_grading_level==Auth::id())	
																			
											<!-- <td> -->
											@php $approv_id=Crypt::encrypt($memberships->id); @endphp
											@php $reject_id=Crypt::encrypt($memberships->id); @endphp
												<a href="{{url('/membership_Approved', $approv_id)}}" class="bg-success text-white pd_db_r1">Approve2</a>
												<a href="{{url('/membership_Rejected', $reject_id)}}" class="bg-warning text-white pd_db_r1">Reject</a>
											<!-- </td> -->
											
										
											@elseif(in_array($memberships->Int_approve_status, $array))
											<span>Refund Initiated</span>
											@endif

											@endif

											@endif
										</td>
										
										</tr>
									@php 
									}
									@endphp
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				@foreach($membership as $memberships)
                <div class="modal" id="acceptofflinepaymentModal{{$memberships->id}}">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header pd_11">
							<h4 class="modal-title">Add payment details</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3" action="{{url('/memberofflinepayment_Accept')}}" method="post" enctype="multipart/form-data">
								@csrf
                                <input type="hidden" name="id" value="{{$memberships->id}}">
                                <div class="col-md-12">
									<label for="inputState" class="form-label">Payment type</label>
									<select name="paymenttypetxt" class="form-select" id="ddlpaymenttype">
										<option value="-1">Choose..</option>
										<option value="0">Cheque</option>
										<option value="1">DD</option>
                                    </select>
								</div>
								<div class="col-md-12">
									<label class="form-label" id="chq1">Cheque no</label>
									<label class="form-label" id="chq" style="display: none">Cheque no</label>
									<label class="form-label" id="dd" style="display: none">DD no</label>
									<input type="text" class="form-control"  name="chequeddnotxt">
								</div>
								<div class="col-md-6">
									<label for="inputLastName" class="form-label">Amount</label>
									<input type="text" class="form-control" name="amounttxt">
								</div>
								<div class="col-12">
									<button type="submit" class="btn btn-primary px-5">Submit</button>
								</div>
							</form>
						</div>
						</div>
					</div>
				</div>
                @endforeach
			
			</div>
		</div>
		@endsection
		
	@section("script")
	<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
	<script src="assets/js/index3.js"></script>
    <script>
        CKEDITor.replace('description', {})
        CKEDITor.replace('description1', {})
    </script>
	<script>
		new PerfectScrollbar('.best-selling-products');
		new PerfectScrollbar('.recent-reviews');
		new PerfectScrollbar('.support-list');
	</script>
	<script>
		$("html").attr("class","color-sidebar sidebarcolor3 color-header headercolor1");
	</script>
	@endsection