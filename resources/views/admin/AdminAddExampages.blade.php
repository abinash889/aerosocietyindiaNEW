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
										<li class="breadcrumb-item active" aria-current="page">Add / View download document</li>
									</ol>
								</nav>
							</div>
							<div class="ms-auto">
								<div class="btn-group">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal"><i class="bx bx-plus"></i> Add download document</button>
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
										<th>Category Name</th>
										<th>Title</th>
										<th>Upload Document</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($result as $key=>$fetchdocument)
									<tr>
										<td>{{$key+1}}</td>
										<td>
                                            @if($fetchdocument->vch_category==1)

                                                    Downloads
                                                
                                            @elseif($fetchdocument->vch_category==2)

                                                Suspension of fresh Registration

                                            @elseif($fetchdocument->vch_category==3)

                                                Information for student members

                                            @endif
                                        </td>
										<td>{{$fetchdocument->vch_title}}</td>
										<td>
                                            <a href="{{url('/Upload_DBImage',$fetchdocument->vch_upload_pdf)}}" target="_blank"><u>View Document</u></a>
                                        </td>
										<td>
											<a href="#"  data-bs-toggle="modal" data-bs-target="#updateModal{{$fetchdocument->id}}" class="bg-success text-white pd_db_r1"><i class="bx bx-edit"></i></a>
											@php $dwn_id=Crypt::encrypt($fetchdocument->id); @endphp
											<a href="{{url('/create_download_dlt',$dwn_id)}}" class="bg-warning text-white pd_db_r1"><i class="bx bx-trash"></i></a>
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
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
						<div class="modal-header pd_11">
							<h4 class="modal-title">Add download</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3" action="{{url('create_download_Ins')}}" method="post" enctype="multipart/form-data">
								@csrf
                                <div class="col-md-12">
									<label for="inputState" class="form-label">Category</label>
									<select name="categoryddl" class="form-select" required>
										<option selected="0">Choose...</option>
										<option value="1">Downloads</option>
										<option value="2">Suspension of fresh Registration</option>
										<option value="3">Information for student members</option>
									</select>
								</div>
								<div class="col-md-12">
									<label for="inputFirstName" class="form-label">Title</label>
									<input type="text" class="form-control" name="titletxt" required>
								</div>
								<div class="col-md-12">
									<label for="inputLastName" class="form-label">Pdf Upload</label>
									<input type="file" class="form-control" name="pdffileupload" accept=".pdf, .PDF, .DOC, .doc, .docx, .DOCX" required>
								</div>
								<div class="col-12">
									<button type="submit" class="btn btn-primary px-5">Submit</button>
								</div>
							</form>
						</div>
						</div>
					</div>
				</div>
				@foreach($result as $fetchdocument)
                <div class="modal" id="updateModal{{$fetchdocument->id}}">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
						<div class="modal-header pd_11">
							<h4 class="modal-title">Edit download</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3" action="{{url('create_download_Updt')}}" method="post" enctype="multipart/form-data">
								@csrf
                                <input type="hidden" name="id" value="{{$fetchdocument->id}}">
                                <div class="col-md-12">
									<label for="inputState" class="form-label">Category</label>
									<select name="UDTcategoryddl" class="form-select">
										<option selected="0">Choose...</option>
										<option value="1" {{($fetchdocument->vch_category == 1)? "selected":''}}>Downloads</option>
										<option value="2" {{($fetchdocument->vch_category == 2)? "selected":''}}>Suspension of fresh Registration</option>
										<option value="3" {{($fetchdocument->vch_category == 3)? "selected":''}}>Information for student members</option>
									</select>
								</div>
								<div class="col-md-12">
									<label for="inputFirstName" class="form-label">Title</label>
									<input type="text" class="form-control" name="UDTtitletxt" value="{{$fetchdocument->vch_title}}">
								</div>
								<div class="col-md-12">
									<label for="inputLastName" class="form-label">Pdf Upload</label>
									<input type="file" class="form-control" name="UDTpdffileupload" accept=".pdf, .PDF, .DOC, .doc, .docx, .DOCX">
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
        CKEDITOR.replace('description', {})
    </script>
	<script>
		new PerfectScrollbar('.best-selling-products');
		new PerfectScrollbar('.recent-reviews');
		new PerfectScrollbar('.support-list');
	</script>
	<script>
		$("html").attr("class","color-sidebar sidebarcolor3 color-header headercolor1");
	</script>
	@endsection