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
										<th>User Code</th>
										<th>Name</th>
										
										<th>Email</th>
										<th>Approve/Reject Status</th>

										<th>Action / Status</th>
									</tr>
								</thead>
								<tbody>
								
								@foreach($membership as $key=>$memberships)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$memberships->vch_usercode}}</td>
										<td>{{$memberships->vch_firstname}}</td>
										
										<td>{{$memberships->vch_emailid}}</td>

										@if($memberships->INT1_pro_status!==1 || $memberships->INT2_pro_status!==1)
											<td>Proposer <span class="badge bg-success">Pending</span></td>
											@elseif($memberships->Int_approve_status==1 && $memberships->INT1_pro_status==1 && $memberships->INT2_pro_status==1)
											<td>Proposer <span class="badge bg-success">Accepted</span></td>
											@elseif($memberships->Int_approve_status==2)
											<td>Proposer <span class="badge bg-danger">Rejected</span></td>
											@elseif($memberships->Int_approve_status==3)
											<td>Level 1 <span class="badge bg-success">Accepted</span></td>
											@elseif($memberships->Int_approve_status==4)
											<td>Level 1 <span class="badge bg-danger">Rejected</span></td>
											@elseif($memberships->Int_approve_status==5)
											<td>Level 2 <span class="badge bg-success">Accepted</span></td>
											@elseif($memberships->Int_approve_status==6)
											<td>Level 2 <span class="badge bg-danger">Rejected</span></td>
											@elseif($memberships->Int_approve_status==7)
											<td>Level 3 <span class="badge bg-success">Accepted</span></td>
											@elseif($memberships->Int_approve_status==8)
											<td>Level 3 <span class="badge bg-danger">Rejected</span></td>
											@elseif($memberships->Int_approve_status==9)
											<td>Level 4 <span class="badge bg-success">Accepted</span></td>
											@elseif($memberships->Int_approve_status==10)
											<td>Level 4 <span class="badge bg-danger">Rejected</span></td>
											@elseif($memberships->Int_approve_status==11)
											<td>Level 5 <span class="badge bg-success">Accepted</span></td>
											@elseif($memberships->Int_approve_status==12)
											<td>Level 5 <span class="badge bg-danger">Rejected</span></td>
											@elseif($memberships->Int_approve_status==13)
											<td>Level 6 <span class="badge bg-success">Accepted</span></td>
											@elseif($memberships->Int_approve_status==14)
											<td>Level 6 <span class="badge bg-danger">Rejected</span></td>
										@endif

										@php 
											$array =[2,4,6,8,10,12,14];
										@endphp
										@if(!in_array($memberships->Int_approve_status, $array))
										@if($memberships->INT1_pro_status==1 && $memberships->INT2_pro_status==1)

										@if( $memberships->int_grading_level==Auth::id())										
										<td>
										@php $approv_id=Crypt::encrypt($memberships->id); @endphp
										@php $reject_id=Crypt::encrypt($memberships->id); @endphp
											<a href="{{url('/membership_Approved', $approv_id)}}" class="bg-success text-white pd_db_r1">Approve</a>
											<a href="{{url('/membership_Rejected', $reject_id)}}" class="bg-warning text-white pd_db_r1">Reject</a>
										</td>
										@endif
										@endif
										@elseif(in_array($memberships->Int_approve_status, $array))
										<td>Refund Initiated</td>
										@endif
										
									</tr>
									@endforeach
								</tbody>
							</table>
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