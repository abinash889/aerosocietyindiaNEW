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
								<li class="breadcrumb-item active" aria-current="page">Add / View Currencyrate</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal"><i class="bx bx-plus"></i> Add Currencyrate</button>
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
									<th>Base Currency</th>
									<th>Transaction Currency</th>
									<th>Exchange Date</th>
									<th>Exchange Rate</th>
									<th>Action</th>

								</tr>
							</thead>
							<tbody>

								@foreach ($exchangerate as $key=>$currencyfetch)
								<tr>
									<td>{{$key+1}}</td>
									<td>{{$currencyfetch->currency->vch_currencyname}}</td>
									<td>{{$currencyfetch->currency1->vch_currencyname}}</td>
									<td>{{$currencyfetch->time_exchangedate}}</td>
									<td>{{$currencyfetch->INT_exchangerate}}</td>

									<td>
										<a href="#" data-bs-toggle="modal" data-bs-target="#editModal{{$currencyfetch->id}}" class="bg-success text-white pd_db_r1"><i class="bx bx-edit"></i></a>
										@php $currency_id=Crypt::encrypt($currencyfetch->id); @endphp
										<a href="{{ url('/delete-currency-rate',$currency_id) }}" class="bg-warning text-white pd_db_r1"><i class="bx bx-trash"></i></a>
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
						<h4 class="modal-title">Add Currencyrate</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body">
						<form class="row g-3 needs-validation" action="{{ url('currencyrate-exchange') }}" method="post" enctype="multipart/form-data" novalidate>
							@csrf

							<div class="col-md-6">
								<label for="inputState" class="form-label">Base Currency<span class="st_cl">*</span></label>
								<select name="basecurrencyrate" class="form-select" required>
									<option selected disabled value="">Choose...</option>
									@foreach ($currency as $currencyfetch)
									<option value="{{$currencyfetch->id}}">{{$currencyfetch->vch_currencyname }}</option>
									@endforeach

								</select>
								<div class="invalid-feedback">Please select a valid BaseCurrency.</div>
							</div>
							<div class="col-md-6">
								<label for="inputState" class="form-label">Transaction Currency<span class="st_cl">*</span></label>
								<select name="trancurrencyrate" class="form-select" required>
									<option selected disabled value="">Choose...</option>
									@foreach ($currency as $currencyfetch)
									<option value="{{$currencyfetch->id}}">{{$currencyfetch->vch_currencyname }}</option>
									@endforeach

								</select>
								<div class="invalid-feedback">Please select a valid Transaction Currency.</div>
							</div>
							<!-- <div class="col-md-6">
									<label for="inputLastName" class="form-label">Transaction Currency<span class="st_cl">*</span></label>
									<input type="text" class="form-control" name="currencycode">
								</div> -->

							<div class="col-md-6">
								<label class="form-label">Exchange Date<span class="st_cl">*</span></label>
								<input type="text" class="form-control datepicker" name="exchangedate" / required>
								<div class="invalid-feedback">Please provide a valid Exchange Date.</div>
							</div>
							<div class="col-md-6">
								<label class="form-label">Exchange Rate<span class="st_cl">*</span></label>
								<input type="text" class="form-control" name="currencyrate" / required>
								<div class="invalid-feedback">Please provide a valid Exchange Rate.</div>
							</div>


							<div class="col-12">
								<button type="submit" class="btn btn-primary px-5">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		@foreach ($exchangerate as $currencyfetch)
		<div class="modal" id="editModal{{$currencyfetch->id}}">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header pd_11">
						<h4 class="modal-title">Add Currency</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>
					<div class="modal-body">
						<form class="row g-3" action="{{url('currencyrate-update',$currencyfetch->id)}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="col-md-6">
								<label for="inputState" class="form-label">Base Currency<span class="st_cl">*</span></label>
								<select name="basecurrencyrate" class="form-select gry_dsl">
									<option value="{{$currencyfetch->vch_basecurrency}}">{{$currencyfetch->currency->vch_currencyname}}</option>
								</select>

							</div>

							<div class="col-md-6">
								<label for="inputState" class="form-label">Transaction Currency<span class="st_cl">*</span></label>
								<select name="basecurrencyrate" class="form-select gry_dsl">
									<option value="{{$currencyfetch->vch_transactioncurrency}}">{{$currencyfetch->currency1->vch_currencyname}}</option>
								</select>

							</div>



							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Exchange Date<span class="st_cl">*</span></label>
								<input type="text" class="form-control gry_dsl" name="udtcurrencydate" value="{{$currencyfetch->time_exchangedate}}">
							</div>

							<div class="col-md-6">
								<label for="inputLastName" class="form-label">Currency rate<span class="st_cl">*</span></label>
								<input type="text" class="form-control" name="udtcurrencyrate" value="{{$currencyfetch->INT_exchangerate}}">
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
<script src="assets/plugins/datetimepicker/js/legacy.js"></script>
<script src="assets/plugins/datetimepicker/js/picker.js"></script>
<script src="assets/plugins/datetimepicker/js/picker.time.js"></script>
<script src="assets/plugins/datetimepicker/js/picker.date.js"></script>
<script src="assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>
<script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script>
<script>
	$('.datepicker').pickadate({
			selectMonths: true,
			selectYears: true
		}),
		$('.timepicker').pickatime()
</script>
<script>
	$(function() {
		$('#date-time').bootstrapMaterialDatePicker({
			format: 'YYYY-MM-DD HH:mm'
		});
		$('#date').bootstrapMaterialDatePicker({
			time: false
		});
		$('#time').bootstrapMaterialDatePicker({
			date: false,
			format: 'HH:mm'
		});
	});
</script>
<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
<script src="assets/js/index3.js"></script>
<script>
	new PerfectScrollbar('.best-selling-products');
	new PerfectScrollbar('.recent-reviews');
	new PerfectScrollbar('.support-list');
</script>
<script>
	$("html").attr("class", "color-sidebar sidebarcolor3 color-header headercolor1");
</script>

@endsection