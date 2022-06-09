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
										<li class="breadcrumb-item active" aria-current="page">Add / View Roles</li>
									</ol>
								</nav>
							</div>
							<div class="ms-auto">
								<div class="btn-group">
                                    <a href="{{route('admin.roles.create')}}">
									<button type="button" class="btn btn-primary" ><i class="bx bx-plus"></i> Add Roles</button>
                                    </a>
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
										<th>Role</th>
										<th>Edit</th>
										
									</tr>
								</thead>
								<tbody>
                                @foreach($roles as $role)
									<tr>
                                        <td>{{$role->name}}</td>     
                                       
                                        <td><a href="{{route('admin.roles.edit',$role->id)}}" class="bg-warning text-white pd_db_r1"><i class="bx bx-edit" data-toggle="modal" data-target=""></i></a>
                                    
                                        <a href="#" class="bg-warning text-white pd_db_r1"><i class="bx bx-trash"></i></a>
                                    </td>
                                           
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

  