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
										<li class="breadcrumb-item active" aria-current="page">Add / View Country</li>
									</ol>
								</nav>
							</div>
							<div class="ms-auto">
								<div class="btn-group">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal"><i class="bx bx-plus"></i> Add Country</button>
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
										<th>Country Code</th>
										<th>Country Name</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($result as $key=>$countryresult)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$countryresult->vch_countrycode}}</td>
										<td>{{$countryresult->vch_countryname}}</td>
										<td>{{$countryresult->vch_status}}</td>
										<td>
											<a href="#"  data-bs-toggle="modal" data-bs-target="#updateModal{{$countryresult->id}}" class="bg-success text-white pd_db_r1"><i class="bx bx-edit"></i></a>
											@php $countryID= Crypt::encrypt($countryresult->id); @endphp
											<a href="{{url('/create_Country_dlt',$countryID)}}" class="bg-warning text-white pd_db_r1"><i class="bx bx-trash"></i></a>
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
							<h4 class="modal-title">Add Country</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3" action="{{url('create_Country_Ins')}}" method="post" enctype="multipart/form-data">
								@csrf
								<div class="col-md-12">
									<label for="inputFirstName" class="form-label">Country Code<span class="st_cl">*</span></label>
									<input type="text" class="form-control" name="countrycodetxt">
								</div>
								<div class="col-md-6">
									<label for="inputLastName" class="form-label">Country Name<span class="st_cl">*</span></label>
									<input type="text" class="form-control" name="countrynametxt">
								</div>
								<div class="col-md-6">
									<label for="inputState" class="form-label">Status<span class="st_cl">*</span></label>
									<select name="countrystatusddl" class="form-select">
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
				@foreach($result as $key=>$countryresult)
				<div class="modal" id="updateModal{{$countryresult->id}}">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header pd_11">
							<h4 class="modal-title">Add Country</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3" action="{{url('create_Country_updt')}}" method="post" enctype="multipart/form-data">
								@csrf
								<input type="hidden" class="form-control" name="id" value="{{$countryresult->id}}">
								<div class="col-md-12">
									<label for="inputFirstName" class="form-label">Country Code</label>
									<input type="text" class="form-control" name="Udtcountrycodetxt" value="{{$countryresult->vch_countrycode}}" disabled>
								</div>
								<div class="col-md-6">
									<label for="inputLastName" class="form-label">Country Name</label>
									<input type="text" class="form-control" name="Udtcountrynametxt" value="{{$countryresult->vch_countryname}}">
								</div>
								<div class="col-md-6">
								
									<label for="inputState" class="form-label">Status</label>
									<select name="Udtcountrystatusddl" class="form-select">

										<option selected="0">Choose...</option>
										<option value="Active" {{ ($countryresult->vch_status=="Active")? "selected" : "" }}>Active</option>
										<option value="Inactive" {{ ($countryresult->vch_status=="Inactive")? "selected" : "" }}>Inactive</option>
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