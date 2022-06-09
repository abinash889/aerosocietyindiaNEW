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
										<li class="breadcrumb-item active" aria-current="page">Add / View Qualification Master</li>
									</ol>
								</nav>
							</div>
							<div class="ms-auto">
								<div class="btn-group">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal"><i class="bx bx-plus"></i> Add Qualification Master</button>
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
										<th>Qualification Code</th>
										<th>Qualification Description</th>
										<th>Level</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($qualificationfetchresult as $key=>$qfetchdetails)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$qfetchdetails->vch_qcode}}</td>
										<td>{{$qfetchdetails->vch_qdesc}}</td>
										<td>{{$qfetchdetails->vch_qlevel}}</td>
										<td>
											<a href="#"  data-bs-toggle="modal" data-bs-target="#updateModal{{$qfetchdetails->id}}" class="bg-success text-white pd_db_r1"><i class="bx bx-edit"></i></a>
											@php $quali_id=Crypt::encrypt($qfetchdetails->id); @endphp
											<a href="{{url('/create_qualificationmaster_dlt',$quali_id)}}" class="bg-warning text-white pd_db_r1"><i class="bx bx-trash"></i></a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				</div>
				<div class="modal" id="insertModal">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header pd_11">
							<h4 class="modal-title">Add Qualification Master</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3" action="{{url('create_qualificationmaster_Ins')}}" method="post" enctype="multipart/form-data">
								@csrf
								<div class="col-md-12">
									<label class="form-label">Qualification Code<span class="st_cl">*</span></label>
									<input type="text" class="form-control" name="qualificationcodetxt">
								</div>
								<div class="col-md-7">
									<label class="form-label">Qualification Description<span class="st_cl">*</span></label>
									<input type="text" class="form-control" name="qualificationnametxt">
								</div>
								<div class="col-md-5">
									<label class="form-label">Qualification Level<span class="st_cl">*</span></label>
									<input type="text" class="form-control" name="qualificationleveltxt">
								</div>
								<div class="col-12">
									<button type="submit" class="btn btn-primary px-5">Submit</button>
								</div>
							</form>
						</div>
						</div>
					</div>
				</div>
				@foreach($qualificationfetchresult as $qfetchdetails)
                <div class="modal" id="updateModal{{$qfetchdetails->id}}">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header pd_11">
							<h4 class="modal-title">Add Qualification Master</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3" action="{{url('create_qualificationmaster_Updt')}}" method="post" enctype="multipart/form-data">
								@csrf
                                <input type="hidden" name="id" value="{{$qfetchdetails->id}}">
								<div class="col-md-12">
									<label class="form-label">Qualification Code</label>
									<input type="text" class="form-control gry_dsl" name="UDTqualificationcodetxt" value="{{$qfetchdetails->vch_qcode}}">
								</div>
								<div class="col-md-7">
									<label class="form-label">Qualification Description</label>
									<input type="text" class="form-control" name="UDTqualificationnametxt" value="{{$qfetchdetails->vch_qdesc}}">
								</div>
								<div class="col-md-5">
									<label class="form-label">Qualification Level</label>
									<input type="text" class="form-control" name="UDTqualificationleveltxt" value="{{$qfetchdetails->vch_qlevel}}">
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
		new PerfectScrollbar('.best-selling-products');
		new PerfectScrollbar('.recent-reviews');
		new PerfectScrollbar('.support-list');
	</script>
	<script>
		$("html").attr("class","color-sidebar sidebarcolor3 color-header headercolor1");
	</script>
	@endsection