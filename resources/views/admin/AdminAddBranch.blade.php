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
										<li class="breadcrumb-item active" aria-current="page">Add / View Branch</li>
									</ol>
								</nav>
							</div>
							<div class="ms-auto">
								<div class="btn-group">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal"><i class="bx bx-plus"></i> Add Branch</button>
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
										<th>Branch Name</th>
										<th>Branch Email-Id</th>
										<th>Branch Password</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($branchresult as $key=>$result)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$result->vch_branchname}}</td>
										<td>{{$result->branch_emailid}}</td>
										<td>{{$result->branch_password}}</td>
										<td>{{$result->vch_status}}</td>
										<td>
											<a href="#"  data-bs-toggle="modal" data-bs-target="#updateModal{{$result->id}}" class="bg-success text-white pd_db_r1"><i class="bx bx-edit"></i></a>
											@php $brn_id=Crypt::encrypt($result->id); @endphp
											<a href="{{url('/create_addbranch_dlt',$brn_id)}}" class="bg-warning text-white pd_db_r1"><i class="bx bx-trash"></i></a>
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
							<h4 class="modal-title">Add Branch</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3" action="{{url('create_addbranch_Ins')}}" method="post" enctype="multipart/form-data">
								@csrf
								<div class="col-md-12">
									<label for="inputLastName" class="form-label">Branch name</label>
									<input type="text" class="form-control" name="branchnametxt" required>
								</div>
                                <div class="col-md-12">
									<label for="inputLastName" class="form-label">Branch Email-id</label>
									<input type="email" class="form-control" name="branchusernametxt" required>
								</div>
								<div class="col-md-12">
									<label for="inputState" class="form-label">Status</label>
									<select name="branchstatusddl" class="form-select" required>
										<option selected="0">Choose...</option>
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
				@foreach($branchresult as $key=>$result)
                <div class="modal" id="updateModal{{$result->id}}">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header pd_11">
							<h4 class="modal-title">Add Branch</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3" action="{{url('create_addbranch_Updt')}}" method="post" enctype="multipart/form-data">
								@csrf
                                <input type="hidden" name="id" value="{{$result->id}}">
								<div class="col-md-12">
									<label for="inputLastName" class="form-label">Branch Name</label>
									<input type="text" class="form-control" name="UDTbranchnametxt" value="{{$result->vch_branchname}}">
								</div>
                                <div class="col-md-12">
									<label for="inputLastName" class="form-label">Branch Username</label>
									<input type="text" class="form-control" name="UDTbranchusernametxt" value="{{$result->branch_emailid}}">
								</div>
                                <div class="col-md-12">
									<label for="inputLastName" class="form-label">Branch Password</label>
									<input type="password" class="form-control" name="UDTbranchusernametxt" value="{{$result->branch_password}}">
								</div>
								<div class="col-md-12">
									<label for="inputState" class="form-label">Status</label>
									<select name="UDTbranchstatusddl" class="form-select">
										<option selected="0">Choose...</option>
										<option value="Active" {{($result->vch_status == "Active")? 'selected' : ''}}>Active</option>
										<option value="Inactive" {{($result->vch_status == "Inactive")? 'selected' : ''}}>Inactive</option>
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