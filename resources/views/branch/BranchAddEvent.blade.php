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
										<li class="breadcrumb-item active" aria-current="page">Add / View Events</li>
									</ol>
								</nav>
							</div>
							<div class="ms-auto">
								<div class="btn-group">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal"><i class="bx bx-plus"></i> Add Events</button>
								</div>
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
										<th>Event Name</th>
										<th>Event Date</th>
										<th width=17%>Event Details</th>
										<th>Event Image</th>
										<th>Action / Status</th>
									</tr>
								</thead>
								<tbody>
									@foreach($result as $key=>$eventfetch)
									@php
									$session_id=Auth::user()->id;
								
									@endphp
									@if($eventfetch->Branch_ID==$session_id)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$eventfetch->vch_eventname}}</td>
										<td>{!! date("d-F-Y", strtotime($eventfetch->DT_Eventdate)) !!}</td>
										<!-- <td>DT_Eventdate</td> -->
										<td  width=17%>{!! html_entity_decode($eventfetch->vch_eventdetails) !!}</td>
										<td>
											<img src="{{url('Upload_DBImage/'.$eventfetch->vch_image)}}" class="img-fluid">
										</td>
										<td>
										@php
										if($eventfetch->INT_approvestatus==1){
										@endphp
											<a href="#"  data-bs-toggle="modal" data-bs-target="#updateModal{{$eventfetch->id}}" class="bg-success text-white pd_db_r1"><i class="bx bx-edit"></i></a>
											@php $dlt_id=Crypt::encrypt($eventfetch->id); @endphp
											<a href="{{url('/create_branchevent_dlt',$dlt_id)}}" class="bg-warning text-white pd_db_r1"><i class="bx bx-trash"></i></a>
											@php 
											}
										@endphp
										@php
										if($eventfetch->INT_approvestatus==2){
										@endphp
										<span class="bg-danger text-white pd_db_r1 fw_400">Rejected</span>
											@php 
											}
										@endphp
										@php
										if($eventfetch->INT_approvestatus==0){
										@endphp
										<span class="bg-primary text-white pd_db_r1 fw_400">Awaiting approval</span>
											@php 
											}
										@endphp
									</td>
									</tr>
									@endif
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				</div>
				<div class="modal" id="insertModal">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
						<div class="modal-header pd_11">
							<h4 class="modal-title">Add Events</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3" action="{{url('create_branchevent_Ins')}}" method="post" enctype="multipart/form-data">
								@csrf
								<div class="col-md-6">
									<label for="inputFirstName" class="form-label">Event Name</label>
									<input type="text" class="form-control" name="eventnametxt">
								</div>
								<div class="col-md-6">
									<label for="inputFirstName" class="form-label">Event Date</label>
									<input type="date" class="form-control" name="eventdatetxt">
								</div>
								<div class="col-md-12">
									<label for="inputLastName" class="form-label">Event Details</label>
                                    <textarea class="form-control" name="eventdetailstxt" rows="5" id="description"></textarea>
								</div>
								<div class="col-md-12">
									<label for="inputState" class="form-label">Upload Image</label>
									<input type="file" class="form-control" name="uploadimagefileUpload">
								</div>
								<div class="col-12">
									<button type="submit" class="btn btn-primary px-5">Submit</button>
								</div>
							</form>
						</div>
						</div>
					</div>
				</div>
				@foreach($result as $eventfetch)
					<div class="modal" id="updateModal{{$eventfetch->id}}">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
							<div class="modal-header pd_11">
								<h4 class="modal-title">Edit Branch Events</h4>
								<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
							</div>
							<div class="modal-body">
								<form class="row g-3" action="{{url('create_branchevent_Updt')}}" method="post" enctype="multipart/form-data">
									@csrf
									<input type="hidden" name="id" value="{{$eventfetch->id}}">
									<div class="col-md-6">
										<label for="inputFirstName" class="form-label">Event Name</label>
										<input type="text" class="form-control" name="UDTeventnametxt" value="{{$eventfetch->vch_eventname}}">
									</div>
									<div class="col-md-6">
										<label for="inputFirstName" class="form-label">Event Date</label>
										<input type="date" class="form-control" name="UDTeventdatetxt" value="{{$eventfetch->DT_Eventdate}}">
									</div>
									<div class="col-md-12">
										<label for="inputLastName" class="form-label">Event Details</label>
										<textarea class="form-control" name="UDTeventdetailstxt" rows="5" id="description1">
										{{$eventfetch->vch_eventdetails}}
										</textarea>
									</div>
									<div class="col-md-12">
										<label for="inputState" class="form-label">Upload Image</label>
										<input type="file" class="form-control" name="UDTuploadimagefileUpload">
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
        CKEDITOR.replace('description', {})
        CKEDITOR.replace('description1', {})
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