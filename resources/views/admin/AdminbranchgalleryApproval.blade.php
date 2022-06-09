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
										<li class="breadcrumb-item active" aria-current="page">Approve Branch Gallery</li>
									</ol>
								</nav>
							</div>
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
                                        <th>Branch Name</th>
										<th>Title</th>
										<th>Gallery Image</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($result as $key=>$approvalallery)
									<tr>
										<td>{{$key+1}}</td>
                                        <td>{{$approvalallery->branchname->name}}</td>
										<td>{{$approvalallery->vch_title}}</td>
										<td>
                                            @php
                                                $count=count(json_decode($approvalallery->vch_image))
                                            @endphp
                                            @php
                                                for($i=0;$i<$count;$i++){
                                            @endphp
                                                <img src="{{url('Upload_DBImage/'.json_decode($approvalallery->vch_image)[$i])}}" class="img-fluid bdr_io">
                                            @php 
                                                }
                                            @endphp
										</td>
										<td>	
											@php $approv_id=Crypt::encrypt($approvalallery->id); @endphp
											@php $reject_id=Crypt::encrypt($approvalallery->id); @endphp
											@php
												if($approvalallery->INT_approvestatus ==0){
											@endphp
												<a href="{{url('/create_approvebranchgallery_Approved', $approv_id)}}" class="bg-success text-white pd_db_r1">Approve</a>
												<a href="{{url('/create_approvebranchgallery_Rejected', $reject_id)}}" class="bg-warning text-white pd_db_r1">Reject</a>
											@php
												}
											@endphp
											@php
												if($approvalallery->INT_approvestatus ==1){
											@endphp
												<span class="bg-success text-white pd_db_r1 fw_400">Approved</span>
											@php
												}
											@endphp
											@php
												if($approvalallery->INT_approvestatus==2){
											@endphp
												<span class="bg-danger text-white pd_db_r1 fw_400">Rejected</span>
											@php 
												}
											@endphp
										</td>
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
		new PerfectScrollbar('.best-selling-products');
		new PerfectScrollbar('.recent-reviews');
		new PerfectScrollbar('.support-list');
	</script>
	<script>
		$("html").attr("class","color-sidebar sidebarcolor3 color-header headercolor1");
	</script>
	@endsection