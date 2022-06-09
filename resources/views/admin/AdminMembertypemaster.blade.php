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
										<li class="breadcrumb-item active" aria-current="page">Add / View Member Type Master</li>
									</ol>
								</nav>
							</div>
							<div class="ms-auto">
								<div class="btn-group">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal"><i class="bx bx-plus"></i> Add Member Type Master</button>
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
										<th>Member Type Code</th>
										<th>Member Type Name</th>
										<th>Category Description</th>
										<th>Dues Code 1</th>
										<th>Dues Code 2</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($membertypefetch as $key=>$fetchmember)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$fetchmember->vch_membTCode}}</td>
										<td>{{$fetchmember->vch_membTname}}</td>
										<td>{{$fetchmember->vch_catedescname}}</td>
										<td>{{$fetchmember->vch_duescode1}}</td>
										<td>{{$fetchmember->vch_duescode2}}</td>
										<td>{{$fetchmember->vch_status}}</td>
										<td>
											<a href="#"  data-bs-toggle="modal" data-bs-target="#updateModal{{$fetchmember->id}}" class="bg-success text-white pd_db_r1"><i class="bx bx-edit"></i></a>
											@php $member_id=Crypt::encrypt($fetchmember->id); @endphp
											<a href="{{url('/create_membertypemaster_dlt',$member_id)}}" class="bg-warning text-white pd_db_r1"><i class="bx bx-trash"></i></a>
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
					<div class="modal-dialog  modal-lg">
						<div class="modal-content">
						<div class="modal-header pd_11">
							<h4 class="modal-title">Add Member Type Master</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3" action="{{url('create_membertypemaster_Ins')}}" method="post" enctype="multipart/form-data">
								@csrf
								<div class="col-md-6">
									<label for="inputFirstName" class="form-label">Member Type Code<span class="st_cl">*</span></label>
									<input type="text" class="form-control" name="membertypecodetxt">
								</div>
								<div class="col-md-6">
									<label for="inputLastName" class="form-label">Member Type Description<span class="st_cl">*</span></label>
									<input type="text" class="form-control" name="membertypenametxt">
								</div>
								<div class="col-md-6">
									<label for="inputState" class="form-label">Category Description<span class="st_cl">*</span></label>
									<select name="membertypeddl" class="form-select">
										<option selected="0" selected disabled value="">Choose...</option>
										<option value="A">Associate</option>
										<option value="AM">Associate Member</option>
                                        <option value="C">Companion</option>
                                        <option value="CM">Corporate</option>
                                        <option value="CORMSMEs">Corporate  MSMS</option>
                                        <option value="FE">Fellow</option>
                                        <option value="G">Graduate</option>
                                        <option value="HF">Honorary Fellow</option>
                                        <option value="M">Member</option>
                                        <option value="S">Student</option>
                                        <option value="SM1Y">Student 1 Year</option>
                                        <option value="SM2Y">Student 2 Year</option>
                                        <option value="SM3Y">Student 3 Year</option>
                                        <option value="SM4Y">Student 4 Year</option>
                                        <option value="SM5Y">Student 5 Year</option>
									</select>
								</div>
                                <div class="col-md-6">
									<label for="inputFirstName" class="form-label">Dues Code 1<span class="st_cl">*</span></label>
									<input type="text" class="form-control" name="duescode1">
								</div>
								<div class="col-md-6">
									<label for="inputLastName" class="form-label">Dues Code 2<span class="st_cl">*</span></label>
									<input type="text" class="form-control" name="duescode2">
								</div>
                                <div class="col-md-6">
									<label for="inputState" class="form-label">Status<span class="st_cl">*</span></label>
									<select name="statusddl" class="form-select">
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
				@foreach($membertypefetch as $fetchmember)
                <div class="modal" id="updateModal{{$fetchmember->id}}">
					<div class="modal-dialog  modal-lg">
						<div class="modal-content">
						<div class="modal-header pd_11">
							<h4 class="modal-title">Update Member Type Master</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3" action="{{url('create_membertypemaster_Updt')}}" method="post" enctype="multipart/form-data">
								@csrf
                                <input type="hidden" name="id" value="{{$fetchmember->id}}">
								<div class="col-md-6">
									<label for="inputFirstName" class="form-label">Member Type Code</label>
									<input type="text" class="form-control gry_dsl" name="UDTmembertypecodetxt" value="{{$fetchmember->vch_membTCode}}">
								</div>
								<div class="col-md-6">
									<label for="inputLastName" class="form-label">Member Type Description</label>
									<input type="text" class="form-control" name="UDTmembertypenametxt" value="{{$fetchmember->vch_membTname}}">
								</div>
								<div class="col-md-6">
									<label for="inputState" class="form-label">Category Description</label>
									<select name="UDTmembertypeddl" class="form-select">
										<option selected="0">Choose...</option>
										<option value="A" {{($fetchmember->vch_catedescname == "A")? "selected" : ""}}>Associate</option>
										<option value="AM" {{($fetchmember->vch_catedescname == "AM")? "selected" : ""}}>Associate Member</option>
                                        <option value="C" {{($fetchmember->vch_catedescname == "C")? "selected" : ""}}>Companion</option>
                                        <option value="CM" {{($fetchmember->vch_catedescname == "CM")? "selected" : ""}}>Corporate</option>
                                        <option value="CORMSMEs" {{($fetchmember->vch_catedescname == "CORMSMEs")? "selected" : ""}}>Corporate  MSMS</option>
                                        <option value="FE" {{($fetchmember->vch_catedescname == "FE")? "selected" : ""}}>Fellow</option>
                                        <option value="G" {{($fetchmember->vch_catedescname == "G")? "selected" : ""}}>Graduate</option>
                                        <option value="HF" {{($fetchmember->vch_catedescname == "HF")? "selected" : ""}}>Honorary Fellow</option>
                                        <option value="M" {{($fetchmember->vch_catedescname == "M")? "selected" : ""}}>Member</option>
                                        <option value="S" {{($fetchmember->vch_catedescname == "S")? "selected" : ""}}>Student</option>
                                        <option value="SM1Y" {{($fetchmember->vch_catedescname == "SM1Y")? "selected" : ""}}>Student 1 Year</option>
                                        <option value="SM2Y" {{($fetchmember->vch_catedescname == "SM2Y")? "selected" : ""}}>Student 2 Year</option>
                                        <option value="SM3Y" {{($fetchmember->vch_catedescname == "SM3Y")? "selected" : ""}}>Student 3 Year</option>
                                        <option value="SM4Y" {{($fetchmember->vch_catedescname == "SM4Y")? "selected" : ""}}>Student 4 Year</option>
                                        <option value="SM5Y" {{($fetchmember->vch_catedescname == "SM5Y")? "selected" : ""}}>Student 5 Year</option>
									</select>
								</div>
                                <div class="col-md-6">
									<label for="inputFirstName" class="form-label">Dues Code 1</label>
									<input type="text" class="form-control" name="UDTduescode1" value="{{$fetchmember->vch_duescode1}}">
								</div>
								<div class="col-md-6">
									<label for="inputLastName" class="form-label">Dues Code 2</label>
									<input type="text" class="form-control" name="UDTduescode2" value="{{$fetchmember->vch_duescode2}}">
								</div>
                                <div class="col-md-6">
									<label for="inputState" class="form-label">Status</label>
									<select name="UDTstatusddl" class="form-select" required>
										<option selected disabled value="">Choose...</option>
										<option value="Active" {{($fetchmember->vch_status == "Active")? "selected" :""}}>Active</option>
										<option value="Inactive" {{($fetchmember->vch_status == "Inactive")? "selected" :""}}>Inactive</option>
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