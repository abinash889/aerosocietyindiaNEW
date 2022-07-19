@extends("layouts.app")

		@section("wrapper")
		<style>
			.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
		</style>
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
										<li class="breadcrumb-item active" aria-current="page">Approve Branch Gallery</li>
									</ol>
								</nav>
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
										<th>Title</th>
										<th>Gallery Image</th>
									</tr>
								</thead>
								<tbody>
									@foreach($result as $key=>$approvalallery)
									<tr>
										<td>{{$key+1}}</td>
                                        <td>{{$approvalallery->branchname->name}}</td>
										<td>{{$approvalallery->vch_title}}</td>
										<td>
                                            @php
                                                $count=count(json_decode($approvalallery->vch_image))
                                            @endphp
											<div class="row">
												<form method="post" action="{{url('/imageaccptbyAdmin')}}" class="row">
													<div class="col-md-10">
													<div class="row">
													@csrf
													
                                            @php
                                                for($i=0;$i<$count;$i++){
											
										
													
													
                                            @endphp
											
											<!-- dd($bhu,$array_apstus); -->
												<div class="col-md-2">
													<img src="{{url('Upload_DBImage/'.json_decode($approvalallery->vch_image)[$i])}}" class="img-fluid bdr_io"  style="height: 80px;margin-right: 12px;width: 80px;">
													<label class="switch">
														<input type="hidden" name="image_id" value="{{$approvalallery->id}}">
														<input type="checkbox" name="acceptimg[]" value="{{$i}}">
														<span class="slider round"></span>
													</label>
												</div>
												
                                            @php 
                                                }
                                            @endphp
											</div>
											</div>
											<div  class="col-md-2">
												<input type="submit" class="bg-success text-white pd_db_r1" value="Submit">
											</div>
											</form>
											</div>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				</div>
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