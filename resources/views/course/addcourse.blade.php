@extends("layouts.app")


@section("style")
	<link href="assets/plugins/fancy-file-uploader/fancy_fileupload.css" rel="stylesheet" />
	<link href="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css" rel="stylesheet" />


    
	@endsection

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
										<li class="breadcrumb-item active" aria-current="page">Add / View Course Details</li>
									</ol>
								</nav>
							</div>
							<div class="ms-auto">
								<div class="btn-group">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal"><i class="bx bx-plus"></i> Add Course</button>
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
										<th>Syllabus Name</th>
										<th>Syllabus Year</th>
										<th>image</th>
										<th>Pdf</th>
										<th>Syllabus Details</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                @foreach($result as $key=>$results)
									<tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$results->vch_title}}</td>
                                        @if($results->Int_catagories==1)
                                        <td>Student 1 Year</td>
                                        @elseif($results->Int_catagories==2)
                                        <td>Student 2 Year</td>
                                        @elseif($results->Int_catagories==3)
                                        <td>Student 3 Year</td>
                                        @elseif($results->Int_catagories==4)
                                        <td>Student 4 Year</td>
                                        @elseif($results->Int_catagories==5)
                                        <td>Student 5 Year</td>
                                        @endif
                                        <td>
                                        <img src="{{url('Upload_DBImage/'.$results->vch_image)}}" class="img-fluid" style="max-width: 113px;">
                                        </td>
                                        <td>
                                        <a href="{{url('Upload_DBImage/'.$results->vch_pdf)}}" target="_blank">View PDF</a>
                                        </td>
                                        <td>{!! html_entity_decode($results->vch_description) !!}</td>

                            
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#updateModal{{$results->id}}" class="bg-success text-white pd_db_r1"><i class="bx bx-edit"></i></a>
                                            @php $dlt_id=Crypt::encrypt($results->id); @endphp
                                            <a href="{{route('admin.delete-course', $dlt_id)}}" class="bg-warning text-white pd_db_r1"><i class="bx bx-trash"></i></a>
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
							<h4 class="modal-title">Add Course</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3 needs-validation" action="{{url('createcourse')}}" method="post" enctype="multipart/form-data" novalidate>
								@csrf
                                <div class="col-md-4">
									<label for="inputState" class="form-label">Syllabus Name<span class="st_cl">*</span></label>
									<input type="text" class="form-control" id="validationCustom01" name="Coursename" required>
                                    <div class="invalid-feedback">Please provide a syllabus name.</div>
								</div>
                                
                                <div class="col-md-4">
                                <label for="inputFirstName" class="form-label">Syllabus Year<span class="st_cl">*</span></label>
									<select name="yeartxt" class="form-select" required>
										<option selected disabled value="">Choose...</option>
                                       
										<option value="1">Student 1 Year</option>
										<option value="2">Student 2 Year</option>
										<option value="3">Student 3 Year</option>
										<option value="4">Student 4 Year</option>
										<option value="5">Student 5 Year</option>
									</select>
                                    <div class="invalid-feedback">Please provide a syllabus year.</div>
								</div>

								
								<div class="col-md-4">
                                    <label for="formFile" class="form-label">image<span class="st_cl">*</span></label>
                                        <input class="form-control" type="file" name="image" id="formFile" required>
                                        <div class="invalid-feedback">Please provide image.</div>
								</div>

                                <div class="col-md-12">
                                    <label for="formFile" class="form-label">Upload File<span class="st_cl">*</span></label>
                                        <input class="form-control" type="file" id="formFile" name="pdffile" required>
                                        <div class="invalid-feedback">Please provide a valid file.</div>
								</div>
                               
                                <div class="col-md-12" style="margin-bottom: 10px;">
                                            <label for="inputLastName" class="form-label">Syllabus Details<span class="st_cl">*</span></label>
                                            <textarea class="form-control" name="syllabusdetailstxt" rows="5" id="description" required></textarea>
                                            <div class="invalid-feedback">Please provide a syllabus details.</div>
                                        </div>
                                 <div class="col-12">
									<button type="submit" class="btn btn-primary px-5">Submit</button>
								</div>
							</form>
						</div>
						</div>
					</div>
				</div>


                @foreach($result as $results)
                <div class="modal" id="updateModal{{$results->id}}">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
						<div class="modal-header pd_11">
							<h4 class="modal-title">Edit Course</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3" action="{{url('/update-courses')}}" method="POST" enctype="multipart/form-data">
								@csrf
                                <input type="hidden" name="id" value="{{$results->id}}">
                                <div class="col-md-4">
									<label for="inputState" class="form-label">Syllabus Name<span class="st_cl">*</span></label>
									<input type="text" class="form-control" id="validationCustom01" name="udtCoursename" value="{{$results->vch_title}}">
                                    
								</div>

								
                                <div class="col-md-4">
                                <label for="inputFirstName" class="form-label">Syllabus Year<span class="st_cl">*</span></label>
									<select name="udtyeartxt" class="form-select">
										<option value="1" @if ($results-> Int_catagories=='1') selected @endif>Student 1 Year</option>
										<option value="2" @if ($results-> Int_catagories=='2') selected @endif>Student 2 Year</option>
										<option value="3" @if ($results-> Int_catagories=='3') selected @endif>Student 3 Year</option>
										<option value="4" @if ($results-> Int_catagories=='4') selected @endif>Student 4 Year</option>
										<option value="5" @if ($results-> Int_catagories=='5') selected @endif>Student 5 Year</option>
									</select>
                                   
								</div>

								
								<div class="col-md-4">
                                    <label for="formFile" class="form-label">image<span class="st_cl">*</span></label>
                                        <input class="form-control" type="file" name="udtimage" id="formFile">
                                        
								</div>

                                <div class="col-md-12">
                                    <label for="formFile" class="form-label">Upload File<span class="st_cl">*</span></label>
                                        <input class="form-control" type="file" id="formFile" name="udtpdffile" >
                                       
								</div>
                               
                                <div class="col-md-12" style="margin-bottom: 10px;">
                                            <label for="inputLastName" class="form-label">Syllabus Details<span class="st_cl">*</span></label>
                                            <textarea class="form-control" name="udtsyllabusdetailstxt" rows="5" id="description1{{$results->id}}">{{$results->vch_description}}</textarea>
                                            
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
    </script>

	
    @foreach($result as $results)
    <script>
        CKEDITOR.replace('description', {})
        CKEDITOR.replace('description1{{$results->id}}', {})
    </script>
    @endforeach

	@endsection