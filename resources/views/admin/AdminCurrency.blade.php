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
										<li class="breadcrumb-item active" aria-current="page">Add / View Currency</li>
									</ol>
								</nav>
							</div>
							<div class="ms-auto">
								<div class="btn-group">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal"><i class="bx bx-plus"></i> Add Currency</button>
								</div>
							</div>
						</div>
					</div>
				</div>
               
				<div class="row row-cols-12">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example2" class="table table-striped table-bordered tbl">
								
								<thead>
									<tr>
                                        <th>#</th>
										<th>Country</th>
										<th>Country Code</th>
										<th>Currency Name</th>
										<th>State</th>
                                        <th>Action</th>
										
									</tr>
								</thead>
								<tbody>
                                @foreach ($currency as $key=>$currencyfetch)
									<tr>
                                        <td>{{$key+1}}</td>
										<td>{{$currencyfetch->countries->vch_countryname}}</td>
										<td>{{$currencyfetch->vch_currencycode}}</td>
										<td>{{$currencyfetch->vch_currencyname}}</td>
										<td>{{$currencyfetch->vch_status}}</td>
                                       
                                        <td>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#editModal{{$currencyfetch->id}}" class="bg-success text-white pd_db_r1"><i class="bx bx-edit"></i></a>
										@php $currency_id=Crypt::encrypt($currencyfetch->id); @endphp
										
										  <a href="{{ url('/delete-currency',$currency_id) }}" class="bg-warning text-white pd_db_r1"><i class="bx bx-trash"></i></a>
                                        </td>
                                        
                                        
									</tr>
								@endforeach
								</tbody>
								<!-- <tfoot>
									<tr>
										<th>Name</th>
										<th>Position</th>
										<th>Office</th>
										<th>Age</th>
										<th>Start date</th>
										<th>Salary</th>
									</tr>
								</tfoot> -->
							</table>
						</div>
					</div>
				</div>
				</div>
				<div class="modal" id="insertModal">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header pd_11">
							<h4 class="modal-title">Add Currency</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3 needs-validation" action="{{ url('add-currency') }}" method="post" enctype="multipart/form-data" novalidate>
								@csrf
							
                                <div class="col-md-6">
									<label for="inputState" class="form-label">Country<span class="st_cl">*</span></label>
									
									<select name="countrystatusddl" class="form-select" required>
										<option selected disabled value="">Choose...</option>
                                        @foreach($country as $countries)
										<option value="{{$countries->id}}">{{$countries->vch_countryname }}</option>
                                        @endforeach
										
									</select>
									<div class="invalid-feedback">Please select a valid Country.</div>
								</div>
								<div class="col-md-6">
									<label for="inputLastName" class="form-label">Currency Code<span class="st_cl">*</span></label>
									<input type="text" class="form-control" name="currencycode" required>
									<div class="invalid-feedback">Please provide a valid Currency Code.</div>
								</div>
                                <div class="col-md-6">
									<label for="inputLastName" class="form-label">Currency Name<span class="st_cl">*</span></label>
									<input type="text" class="form-control" name="currencyname" required>
									<div class="invalid-feedback">Please provide a valid Currency Name.</div>
								</div>
								<div class="col-md-6">
									<label for="inputState" class="form-label">Status<span class="st_cl">*</span></span></label>
									<select name="currencystatusddl" class="form-select" required>
										<option selected disabled value="">Choose...</option>
										<option value="Active">Active</option>
										<option value="Deactive">Deactive</option>
									</select>
									<div class="invalid-feedback">Please provide a valid Status.</div>
								</div>
								<div class="col-12">
									<button type="submit" class="btn btn-primary px-5">Submit</button>
								</div>
							</form>
						</div>
						</div>
					</div>
				</div>

                @foreach ($currency as $currencyfetch)
                <div class="modal" id="editModal{{$currencyfetch->id}}">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header pd_11">
							<h4 class="modal-title">Add Currency</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3" action="{{url('/update-currency',$currencyfetch->id)}}" method="post" enctype="multipart/form-data">
								@csrf
							
								<div class="col-md-6">
									<label for="inputLastName" class="form-label">Country<span class="st_cl">*</span></label>
									<input type="text" class="form-control" name="udtcurrencycode" value="{{$currencyfetch->countries->vch_countryname}}" readonly>
								</div>

								
								<div class="col-md-6">
									<label for="inputLastName" class="form-label">Currency Code<span class="st_cl">*</span></label>
									<input type="text" class="form-control" name="udtcurrencycode" value="{{$currencyfetch->vch_currencycode}}" readonly>
								</div>
                                <div class="col-md-6">
									<label for="inputLastName" class="form-label">Currency Name<span class="st_cl">*</span></label>
									<input type="text" class="form-control" name="udtcurrencyname" value="{{$currencyfetch->vch_currencyname}}">
								</div>
								<div class="col-md-6">
									<label for="inputState" class="form-label">Status<span class="st_cl">*</span></label>
									<select name="udtcurrencystatusddl" class="form-select">
										<option value="Active"   @if ($currencyfetch-> vch_status=='Active') selected @endif>Active</option>
										<option value="Deactive"   @if ($currencyfetch-> vch_status=='Deactive') selected @endif>Deactive</option>
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