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
										<li class="breadcrumb-item active" aria-current="page">Add / View Gallery</li>
									</ol>
								</nav>
							</div>
							<div class="ms-auto">
								<div class="btn-group">
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal"><i class="bx bx-plus"></i> Add Gallery</button>
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
										<th>Title Name</th>
										<th>Event Image</th>
										<th>Action / Status</th>
									</tr>
								</thead>
								<tbody>
									@foreach($result as $key=>$fetchgallery)
									@php
                                        $session_id=Auth::user()->id;
                                    @endphp
                                    
                                    @if($fetchgallery->Branch_ID==$session_id)
									<tr>
										<td>{{$key+1}}</td>
										<td>{{$fetchgallery->vch_title}}</td>
										<td>
                                            @php
                                                $count=count(json_decode($fetchgallery->vch_image))
                                            @endphp
                                            @php
                                                for($i=0;$i<$count;$i++){
                                            @endphp
                                                <img src="{{url('Upload_DBImage/'.json_decode($fetchgallery->vch_image)[$i])}}" class="img-fluid bdr_io">
                                            @php 
                                                }
                                            @endphp
										</td>
										<td>
                                        @php
										if($fetchgallery->INT_approvestatus==1){
										@endphp
											<a href="#"  data-bs-toggle="modal" data-bs-target="#updateModal{{$fetchgallery->id}}" class="bg-success text-white pd_db_r1"><i class="bx bx-edit"></i></a>
											
											<a href="#" class="bg-warning text-white pd_db_r1"><i class="bx bx-trash"></i></a>
											@php 
											}
										@endphp
                                        @php
										if($fetchgallery->INT_approvestatus==2){
										@endphp
										<span class="bg-danger text-white pd_db_r1 fw_400">Rejected</span>
											@php 
											}
										@endphp
										@php
										if($fetchgallery->INT_approvestatus==0){
										@endphp
										<span class="bg-primary text-white pd_db_r1 fw_400">Awaiting approval</span>
											@php 
											}
										@endphp
									    </td>
									</tr>
                                    @endif
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
							<h4 class="modal-title">Add Events</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3" action="{{url('create_branchgallery_Ins')}}" method="post" enctype="multipart/form-data">
								@csrf
								<div class="col-md-12">
									<label for="inputFirstName" class="form-label">Gallery Title</label>
									<input type="text" class="form-control" name="gallerytitletxt" required>
								</div>
								<div class="col-md-12">
									<label for="inputState" class="form-label">Upload Gallery Image</label>
									<input type="file" class="form-control" name="uploadgalleryfileUpload[]" multiple required>
                                    <!-- <input id="fancy-file-upload" type="file" name="uploadgalleryfileUpload[]" accept=".jpg,.png,.jpeg,.JPG.JPEG,.PNG,.GIF,.gif" multiple>
                                    <input id="image-uploadify" name="uploadgalleryfileUpload[]" type="file" accept=".jpg,.png,.jpeg,.JPG.JPEG,.PNG,.GIF,.gif" multiple> -->
								</div>
								<div class="col-12">
									<button type="submit" class="btn btn-primary px-5">Submit</button>
								</div>
							</form>
						</div>
						</div>
					</div>
				</div>
                @foreach($result as $fetchgallery)
                <div class="modal" id="updateModal{{$fetchgallery->id}}">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
						<div class="modal-header pd_11">
							<h4 class="modal-title">Add Events</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
						</div>
						<div class="modal-body">
							<form class="row g-3" action="{{url('create_branchgallery_Updt')}}" method="post" enctype="multipart/form-data">
								@csrf
                                <input type="hidden" name="id" value="{{$fetchgallery->id}}">
								<div class="col-md-12">
									<label for="inputFirstName" class="form-label">Gallery Title</label>
									<input type="text" class="form-control" name="UDTgallerytitletxt" value="{{$fetchgallery->vch_title}}">
								</div>
								<div class="col-md-12">
									<label for="inputState" class="form-label">Upload Gallery Image</label>
									<input type="file" class="form-control" name="UDTuploadgalleryfileUpload[]" multiple>
                                    <!-- <input id="fancy-file-upload" type="file" name="uploadgalleryfileUpload[]" accept=".jpg,.png,.jpeg,.JPG.JPEG,.PNG,.GIF,.gif" multiple>
                                    <input id="image-uploadify" name="uploadgalleryfileUpload[]" type="file" accept=".jpg,.png,.jpeg,.JPG.JPEG,.PNG,.GIF,.gif" multiple> -->
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
	<script src="assets/plugins/fancy-file-uploader/jquery.ui.widget.js"></script>
	<script src="assets/plugins/fancy-file-uploader/jquery.fileupload.js"></script>
	<script src="assets/plugins/fancy-file-uploader/jquery.iframe-transport.js"></script>
	<script src="assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js"></script>
	<script src="assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js"></script>
	<script>
		$('#fancy-file-upload').FancyFileUpload({
			params: {
				action: 'fileuploader'
			},
			maxfilesize: 1000000
		});
	</script>
	<script>
		$(document).ready(function () {
			$('#image-uploadify').imageuploadify();
		})
	</script>
	@endsection