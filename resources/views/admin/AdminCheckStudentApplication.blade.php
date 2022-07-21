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
										<li class="breadcrumb-item active" aria-current="page">Student Application</li>
									</ol>
								</nav>
							</div>
							<!-- <div class="ms-auto">
								<div class="btn-group">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal"><i class="bx bx-plus"></i> Add download document</button>
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
											<th>Application ID</th>
											<th>First Name</th>
											<th>Payment Mode</th>
											<th>Payment Status</th>
											<th>Fee</th>
											<th>Branch Name</th>
											<th>Action / Status</th>
											<th>Refund Status</th>
										</tr>
									</thead>
									<tbody>
										@foreach($result as $key=>$fetchstudent)
										<tr>
											<td>{{$key+1}}</td>
											<td>
												{{$fetchstudent->VCH_Application_id}}
											</td>
											<td>
												@php $studentID=Crypt::encrypt($fetchstudent->id);  @endphp
												<a href="{{url('/studentapplications_edit_by_admin',$studentID)}}">{{$fetchstudent->vch_fname}}</a>
											</td>
											<td>
												@if($fetchstudent->INT_paymentmode ==0)
												<span class="bg-secondary fw_500 text-white badge">Online</span>
												@endif
												@if($fetchstudent->INT_paymentmode ==1  && $fetchstudent->Int_payment_status==0)
												<span class="bg-dark fw_500 text-black badge">Offline</span>
												<a href="#" data-bs-toggle="modal" data-bs-target="#acceptofflinepaymentModal{{$fetchstudent->id}}" class="bg-info fw_500 text-black badge">Click to Update</a>
												@endif
												@if($fetchstudent->INT_paymentmode ==1 && $fetchstudent->Int_payment_status==1)
												<span class="bg-dark fw_500 text-black badge">Offline</span>
												@endif
											</td>
											<td>
												@if($fetchstudent->Int_payment_status ==1)
													<span class="bg-success text-white fw_500 badge">Paid</span>
												@endif
												@if($fetchstudent->Int_payment_status ==0)
												<span class="bg-warning text-white fw_500 badge">Unpaid</span>
												@endif
											</td>
											<td>
												{{$fetchstudent->vch_fee}}
											</td>
											<td>
												{{$fetchstudent->int_branch_id}}
											</td>
											<td>
												@php $accept_id=Crypt::encrypt($fetchstudent->id); @endphp
												@php $reject_id=Crypt::encrypt($fetchstudent->id); @endphp
											
												@if($fetchstudent->INT_approve_status==0  && $fetchstudent->Int_payment_status==1)
												<a href="{{url('/studentapplications_Accept',$accept_id)}}" class="bg-success text-white pd_db_r1">Accept</a>
												
												<a href="{{url('/studentapplications_Reject',$reject_id)}}" class="bg-warning text-white pd_db_r1">Reject</a>
												@endif
											
												@if($fetchstudent->INT_approve_status==1 && $fetchstudent->Int_payment_status==1)
													<span class="bg-success text-white pd_db_r1">Accepted</span>
												@endif
												@if($fetchstudent->INT_approve_status==2 && $fetchstudent->Int_payment_status==1)
													<span class="bg-warning text-white pd_db_r1">Rejected</span>
												@endif
											</td>
											<td>
												@php $refund_id=Crypt::encrypt($fetchstudent->id); @endphp
												@if($fetchstudent->INT_approve_status==2  && $fetchstudent->INT_refund_status=="")
												<a href="{{url('/refund_tostudent',$refund_id)}}"><u>Click to refund</u></a>
												@endif
												@if($fetchstudent->INT_approve_status==2  && $fetchstudent->INT_refund_status==1)
												<span class="bg-success text-white pd_db_r1">Refunded</span>
												@endif
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				@foreach($result as $fetchstudent)
                <div class="modal" id="acceptofflinepaymentModal{{$fetchstudent->id}}">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header pd_11">
							<h4 class="modal-title">Add payment details</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3" action="{{url('/offlinepayment_Accept')}}" method="post" enctype="multipart/form-data">
								@csrf
                                <input type="hidden" name="id" value="{{$fetchstudent->id}}">
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
    <script type="text/javascript">
        $(function () {
            $("#ddlpaymenttype").change(function () {
                if ($(this).val() == 0) {
                    $("#chq").show();
                    $("#dd").hide();
                    $("#chq1").hide();
                } else if ($(this).val() == 1) {
                    $("#chq").hide();
                    $("#dd").show();
                    $("#chq1").hide();
                }
                else if ($(this).val() == -1){
                    $("#chq").hide();
                    $("#dd").hide();
                    $("#chq1").show();
                }
                
            });
        });
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