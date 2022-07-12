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
										<li class="breadcrumb-item active" aria-current="page">Add / View Fee Structure</li>
									</ol>
								</nav>
							</div>
							<div class="ms-auto">
								<div class="btn-group">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal"><i class="bx bx-plus"></i> Add Fee Structure</button>
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
										<th>Member Category</th>
										<th>Currency</th>
										<th>Membership Amount</th>
										<th>Status</th>
                                        <th>Action</th>
										
									</tr>
								</thead>
								<tbody>
                                @foreach ($feestructure as $key=>$memberfetch)
									<tr>
                                        <td>{{$key+1}}</td>
										<td>
											@if($memberfetch->vch_membercategory==1)
												Fellows/Members/Companions
											@elseif($memberfetch->vch_membercategory==2)
												Associate Members
											@elseif($memberfetch->vch_membercategory==3)
												Graduates/Associates
											@elseif($memberfetch->vch_membercategory==4)
												Student 1 Year
											@elseif($memberfetch->vch_membercategory==5)
												Student 2 Year
											@elseif($memberfetch->vch_membercategory==6)
												Student 3 Year
											@elseif($memberfetch->vch_membercategory==7)
												Student 4 Year
											@elseif($memberfetch->vch_membercategory==8)
												Student 5 Year
											@endif
										</td>
										<td>{{$memberfetch->currency->vch_currencycode}}</td>
										<td>{{$memberfetch->vch_membershipamount}}</td>
										<td>{{$memberfetch->vch_status}}</td>
                                       
                                        <td>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#editModal{{$memberfetch->id}}" class="bg-success text-white pd_db_r1"><i class="bx bx-edit"></i></a>
										@php $member_id=Crypt::encrypt($memberfetch->id); @endphp
                                                <a href="{{ url('/delete-feestructure',$member_id) }}" class="bg-warning text-white pd_db_r1"><i class="bx bx-trash"></i></a>
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
							<h4 class="modal-title">Add Fee Structure</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3 needs-validation" action="{{url('fee-structure-add')}}" method="post" enctype="multipart/form-data" novalidate>
								@csrf
							
                                <div class="col-md-6">
									<label for="inputState" class="form-label">Member Category<span class="st_cl">*</span></label>
									<select name="membershipcate" class="form-select" required>
										<option selected disabled value="">Choose...</option>
										<option value="1">Fellows/Members/Companions</option>
										<option value="2">Associate Members</option>
										<option value="3">Graduates/Associates</option>
										<option value="4">Student 1 Year</option>
										<option value="5">Student 2 Year</option>
										<option value="6">Student 3 Year</option>
										<option value="7">Student 4 Year</option>
										<option value="8">Student 5 Year</option>
									</select>
                                    <div class="invalid-feedback">Please select a valid Member Category.</div>
								</div>


                                <div class="col-md-6">
									<label for="inputState" class="form-label">Currency<span class="st_cl">*</span></label>
									<select name="currencyname" class="form-select" required>
										<option selected disabled value="">Choose...</option>
                                       
                                        @foreach ($currency as $currencyfetch)
									    <option value="{{$currencyfetch->id}}">{{$currencyfetch->vch_currencyname }}</option>
									    @endforeach
                                        
										
									</select>
                                    <div class="invalid-feedback">Please select a valid Currency.</div>
								</div>

								
                                <div class="col-md-6">
									<label for="inputLastName" class="form-label">Membership Amount<span class="st_cl">*</span></label>
									<input type="text" class="form-control" name="membershipamount" required>
                                    <div class="invalid-feedback">Please provide a valid Amount.</div>
								</div>
								<div class="col-md-6">
									<label for="inputState" class="form-label">Status<span class="st_cl">*</span></label>
									<select name="memberstatusddl" class="form-select" required>
										<option selected disabled value="">Choose...</option>
										<option value="Active">Active</option>
										<option value="Deactive">Deactive</option>
									</select>
                                    <div class="invalid-feedback">Please select a valid Currency.</div>
								</div>
								<div class="col-12">
									<button type="submit" class="btn btn-primary px-5">Submit</button>
								</div>
							</form>
						</div>
						</div>
					</div>
				</div>

                @foreach ($feestructure as $memberfetch)
                <div class="modal" id="editModal{{$memberfetch->id}}">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header pd_11">
							<h4 class="modal-title">Add Fee Structure</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3 needs-validation" action="{{url('feestructure-update',$memberfetch->id)}}" method="post" enctype="multipart/form-data" >
								@csrf
							
                                <div class="col-md-6">
									<label for="inputState" class="form-label">Member Category<span class="st_cl">*</span></label>
									<select name="uptmembershipcate" class="form-select gry_dsl" required>
                                       
										<option value="{{$memberfetch->vch_membercategory}}">{{$memberfetch->vch_membercategory}}</option>
										
									</select>
                                   
								</div>


                                <div class="col-md-6">
									<label for="inputState" class="form-label">Currency<span class="st_cl">*</span></label>
									<select name="uptcurrencyname" class="form-select gry_dsl" required>
                                      
									    <option value="{{$memberfetch->vch_currencyname}}">{{$currencyfetch->vch_currencyname }}</option>
									   
										
									</select>
                                   
								</div>

								
                                <div class="col-md-6">
									<label for="inputLastName" class="form-label">Membership Amount<span class="st_cl">*</span></label>
									<input type="text" class="form-control" name="membershipamount" value="{{$memberfetch->vch_membershipamount}}" required>
                                   
								</div>
								<div class="col-md-6">
									<label for="inputState" class="form-label">Status<span class="st_cl">*</span></label>
									<select name="udtmemberstatu" class="form-select">
										<option value="Active"   @if ($memberfetch-> vch_status=='Active') selected @endif>Active</option>
										<option value="Deactive"   @if ($memberfetch-> vch_status=='Deactive') selected @endif>Deactive</option>
									</select>
                                    <div class="invalid-feedback">Please select a valid Currency.</div>
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