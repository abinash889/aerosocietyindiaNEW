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
										<li class="breadcrumb-item active" aria-current="page">Add / View City</li>
									</ol>
								</nav>
							</div>
							<div class="ms-auto">
								<div class="btn-group">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal"><i class="bx bx-plus"></i> Add City</button>
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
										<th>City Name</th>
										<th>State Code</th>
										<th>State Name</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($citydetailfetch as $key=>$fetchcity)
									<tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$fetchcity->statenamebelongs->vch_statename}}</td>
                                        <td>{{$fetchcity->vch_citycode}}</td>
                                        <td>{{$fetchcity->vch_cityname}}</td>
                                        <td>{{$fetchcity->vch_status}}</td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#updateModal{{$fetchcity->id}}" class="bg-success text-white pd_db_r1"><i class="bx bx-edit"></i></a>
                                            @php $seety_id=Crypt::encrypt($fetchcity->id); @endphp
                                            <a href="{{url('/create_city_dlt', $seety_id)}}" class="bg-warning text-white pd_db_r1"><i class="bx bx-trash"></i></a>
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
							<h4 class="modal-title">Add State</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3" action="{{url('/create_city_Ins')}}" method="post" enctype="multipart/form-data">
								@csrf
                                <div class="col-md-12">
									<label for="inputState" class="form-label">State<span class="st_cl">*</span></label>
									<select name="Stateddl" class="form-select">
                                        @foreach($statefetch as $fetchstatename)
										<option value="{{$fetchstatename->id}}">{{$fetchstatename->vch_statename}}</option>
                                        @endforeach
									</select>
								</div>
								<div class="col-md-12">
									<label for="inputFirstName" class="form-label">City Code<span class="st_cl">*</span></label>
									<input type="text" class="form-control" name="Citycodetxt">
								</div>
								<div class="col-md-6">
									<label for="inputLastName" class="form-label">City Name<span class="st_cl">*</span></label>
									<input type="text" class="form-control" name="Citynametxt">
								</div>
								<div class="col-md-6">
									<label for="inputState" class="form-label">Status<span class="st_cl">*</span></label>
									<select name="Citystatusddl" class="form-select" required>
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
				@foreach($citydetailfetch as $fetchcity)
                <div class="modal" id="updateModal{{$fetchcity->id}}">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header pd_11">
							<h4 class="modal-title">Add State</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3" action="{{url('/create_city_Updt')}}" method="post" enctype="multipart/form-data">
								@csrf
                                <input type="hidden" name="id" value="{{$fetchcity->id}}">
                                <div class="col-md-12">
									<label for="inputState" class="form-label">State</label>
									<select name="udtStateddl" class="form-select gry_dsl" readonly>
										<option value="{{$fetchcity->INT_StateID}}" {{$fetchcity->id == $fetchcity->id? 'selected' : '' }} >{{$fetchcity->statenamebelongs->vch_statename}}</option>
                                    </select>
								</div>
								<div class="col-md-12">
									<label for="inputFirstName" class="form-label">City Code</label>
									<input type="text" class="form-control gry_dsl" readonly name="udtCitycodetxt" value="{{$fetchcity->vch_citycode}}">
								</div>
								<div class="col-md-6">
									<label for="inputLastName" class="form-label">City Name</label>
									<input type="text" class="form-control" name="udtCitynametxt" value="{{$fetchcity->vch_cityname}}">
								</div>
								<div class="col-md-6">
									<label for="inputState" class="form-label">Status</label>
									<select name="udtCitystatusddl" class="form-select">
										<option value="Active" {{($fetchcity->vch_status == "Active")? 'selected' : ''}}>Active</option>
										<option value="Inactive" {{($fetchcity->vch_status == "Inactive")? 'selected' : ''}}>Inactive</option>
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