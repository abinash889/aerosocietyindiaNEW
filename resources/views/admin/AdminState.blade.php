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
										<li class="breadcrumb-item active" aria-current="page">Add / View State</li>
									</ol>
								</nav>
							</div>
							<div class="ms-auto">
								<div class="btn-group">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal"><i class="bx bx-plus"></i> Add State</button>
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
										<th>Country Name</th>
										<th>State Code</th>
										<th>State Name</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($statedatafetch as $key=>$fetchstate)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$fetchstate->countryname->vch_countryname}}</td>
                                            <td>{{$fetchstate->vch_statecode}}</td>
                                            <td>{{$fetchstate->vch_statename}}</td>
                                            <td>{{$fetchstate->vch_statestatus}}</td>
                                            <td>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#updateModal{{$fetchstate->id}}" class="bg-success text-white pd_db_r1"><i class="bx bx-edit"></i></a>
                                                @php $kontry_id= Crypt::encrypt($fetchstate->id);  @endphp
                                                <a href="{{url('/create_state_dlt',$kontry_id)}}" class="bg-warning text-white pd_db_r1"><i class="bx bx-trash"></i></a>
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
							<form class="row g-3" action="{{url('/create_state_Ins')}}" method="post" enctype="multipart/form-data">
								@csrf
                                <div class="col-md-12">
									<label for="inputState" class="form-label">Country<span class="st_cl">*</span></label>
									<select name="Countryddl" class="form-select">
                                        @foreach($countryfetch as $fetchcountryname)
										<option value="{{$fetchcountryname->id}}">{{$fetchcountryname->vch_countryname}}</option>
                                        @endforeach
									</select>
								</div>
								<div class="col-md-12">
									<label for="inputFirstName" class="form-label">State Code<span class="st_cl">*</span></label>
									<input type="text" class="form-control" name="Statecodetxt">
								</div>
								<div class="col-md-6">
									<label for="inputLastName" class="form-label">State Name<span class="st_cl">*</span></label>
									<input type="text" class="form-control" name="Statenametxt">
								</div>
								<div class="col-md-6">
									<label for="inputState" class="form-label">Status<span class="st_cl">*</span></label>
									<select name="Statestatusddl" class="form-select">
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
				@foreach($statedatafetch as $fetchstate)
                <div class="modal" id="updateModal{{$fetchstate->id}}">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header pd_11">
							<h4 class="modal-title">Add State</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3" action="{{url('/create_state_Updt')}}" method="post" enctype="multipart/form-data">
								@csrf
                                <input type="hidden" name="id" value="{{$fetchstate->id}}">
                                <div class="col-md-12">
									<label for="inputState" class="form-label">Country</label>
									<select name="udtCountryddl" class="form-select gry_dsl" readonly>
										<option value="{{$fetchstate->Int_CountryID}}" {{$fetchstate->Int_CountryID == $fetchstate->Int_CountryID? 'selected' : '' }} >{{$fetchstate->countryname->vch_countryname}}</option>   
									</select>
								</div>
								<div class="col-md-12">
									<label class="form-label">State Code</label>
									<input type="text" class="form-control gry_dsl" readonly name="UDTStatecodetxt" value="{{$fetchstate->vch_statecode}}">
								</div>
								<div class="col-md-6">
									<label class="form-label">State Name</label>
									<input type="text" class="form-control" name="UDTStatenametxt" value="{{$fetchstate->vch_statename}}">
								</div>
								<div class="col-md-6">
									<label class="form-label">Status</label>
									<select name="udtStatestatusddl" class="form-select">
										<option value="Active" {{($fetchstate->vch_statestatus == "Active")? "selected" : "" }}>Active</option>
										<option value="Inactive" {{($fetchstate->vch_statestatus == "Inactive")? "selected" : "" }}>Inactive</option>
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
    <script>
		// Example starter JavaScript for disabling form submissions if there are invalid fields
			(function () {
			  'use strict'

			  // Fetch all the forms we want to apply custom Bootstrap validation styles to
			  var forms = document.querySelectorAll('.needs-validation')

			  // Loop over them and prevent submission
			  Array.prototype.slice.call(forms)
				.forEach(function (form) {
				  form.addEventListener('submit', function (event) {
					if (!form.checkValidity()) {
					  event.preventDefault()
					  event.stopPropagation()
					}

					form.classList.add('was-validated')
				  }, false)
				})
			})()
	</script>
	@endsection