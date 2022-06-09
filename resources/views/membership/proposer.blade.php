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
										<th>Action / Status</th>
									</tr>
								</thead>
								<tbody>
								
								@foreach($membership as $key=>$memberships)
                                @if( $memberships->INT_pro1_userid==Auth::id())	
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$memberships->vch_usercode}}</td>
										<td>{{$memberships->vch_firstname}}</td>
										<td>{{$memberships->vch_emailid}}</td>
                                        @if($memberships->INT1_pro_status==0)
										<td>
										@php $approv_id=Crypt::encrypt($memberships->id); @endphp
										@php $reject_id=Crypt::encrypt($memberships->id); @endphp
                                            
											<a href="{{url('/proposer_Approved', $approv_id)}}" class="bg-success text-white pd_db_r1">Approve1</a>
											<a href="{{url('/proposer_Rejected', $reject_id)}}" class="bg-warning text-white pd_db_r1">Reject</a>
										</td>
                                        @elseif($memberships->INT1_pro_status==1)
                                        <td><span class="badge bg-success">Approved</span></td>
                                        @elseif($memberships->INT1_pro_status==15)
                                        <td><span class="badge bg-success">Rejected</span></td>
										@endif
										
										
									</tr>
                                    @elseif( $memberships->INT_pro2_userid==Auth::id())	
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$memberships->vch_usercode}}</td>
										<td>{{$memberships->vch_firstname}}</td>
										<td>{{$memberships->vch_emailid}}</td>
                                        @if($memberships->INT2_pro_status==0)
										<td>
										@php $approv_id=Crypt::encrypt($memberships->id); @endphp
										@php $reject_id=Crypt::encrypt($memberships->id); @endphp
                                            
											<a href="{{url('/proposer_Approv', $approv_id)}}" class="bg-success text-white pd_db_r1">Approve2</a>
											<a href="{{url('/proposer_Reject', $reject_id)}}" class="bg-warning text-white pd_db_r1">Reject</a>
										</td>
                                        @elseif($memberships->INT2_pro_status==1)
                                        <td><span class="badge bg-success">Approved</span></td>
                                        @elseif($memberships->INT2_pro_status==15)
                                        <td><span class="badge bg-success">Rejected</span></td>
										@endif
										
										
									</tr>
                                    @endif
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