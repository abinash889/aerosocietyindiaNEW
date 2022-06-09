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
										<li class="breadcrumb-item active" aria-current="page">Add / View professional Designation</li>
									</ol>
								</nav>
							</div>
							<div class="ms-auto">
								<div class="btn-group">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal"><i class="bx bx-plus"></i> Add professional Designation</button>
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
										<th>Professional Designation Code</th>
										<th>Professional Designation Description</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($getProfessionalDesignation as $key=>$getProfDesign)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$getProfDesign->vch_pd_code}}</td>
										<td>{{$getProfDesign->vch_pd_name}}</td>
										<td>{{$getProfDesign->vch_pd_status}}</td>
										<td>
											<a href="#"  data-bs-toggle="modal" data-bs-target="#updateModal{{$getProfDesign->id}}" class="bg-success text-white pd_db_r1"><i class="bx bx-edit"></i></a>
											@php $bld_var=Crypt::encrypt($getProfDesign->id); @endphp
											<a href="{{url('/create_professtionalDesignation_dlt',$bld_var)}}" class="bg-warning text-white pd_db_r1"><i class="bx bx-trash"></i></a>
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
							<h4 class="modal-title">Add Professional Designation</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3" action="{{url('create_professtionalDesignation_Ins')}}" method="post" enctype="multipart/form-data">
								@csrf
								<div class="col-md-12">
									<label for="inputFirstName" class="form-label">Professional Designation Code<span class="st_cl">*</span></label>
									<input type="text" class="form-control" name="profdesigcodetxt">
								</div>
								<div class="col-md-7">
									<label for="inputLastName" class="form-label">Professional Designation Description<span class="st_cl">*</span></label>
									<input type="text" class="form-control" name="profdesignametxt">
								</div>
								<div class="col-md-5">
									<label for="inputState" class="form-label">Status<span class="st_cl">*</span></label>
									<select name="profdesigstatusddl" class="form-select" required>
										<option selected disabled value="">Choose...</option>
										<option value="Active">Active</option>
										<option value="Inactive">Inactive</option>
									</select>
								</div>
								<div class="col-12">
									<button type="submit" class="btn btn-primary px-5">Submit</button>
								</div>
							</form>
						</div>
						</div>
					</div>
				</div>
				@foreach($getProfessionalDesignation as $getProfDesign)
                <div class="modal" id="updateModal{{$getProfDesign->id}}">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header pd_11">
							<h4 class="modal-title">Add Professional Designation</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3" action="{{url('create_professtionalDesignation_Updt')}}" method="post" enctype="multipart/form-data">
								@csrf
                                <input type="hidden" name="id" value="{{$getProfDesign->id}}">
								<div class="col-md-12">
									<label for="inputFirstName" class="form-label">Professional Designation Code</label>
									<input type="text" class="form-control gry_dsl" name="UDTprofdesigcodetxt" value="{{$getProfDesign->vch_pd_code}}">
								</div>
								<div class="col-md-7">
									<label for="inputLastName" class="form-label">Professional Designation Description</label>
									<input type="text" class="form-control" name="UDTprofdesignametxt" value="{{$getProfDesign->vch_pd_name}}">
								</div>
								<div class="col-md-5">
									<label for="inputState" class="form-label">Status</label>
									<select name="UDTprofdesigstatusddl" class="form-select">
										<option value="Active" {{($getProfDesign->vch_pd_status == "Active")? "selected" :""}}>Active</option>
										<option value="Inactive" {{($getProfDesign->vch_pd_status =="Inactive")? "selected" :""}}>Inactive</option>
									</select>
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