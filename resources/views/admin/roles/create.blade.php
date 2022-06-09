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
										<li class="breadcrumb-item active" aria-current="page">Add /  Create Role</li>
									</ol>
								</nav>
                               </div>
                               <div class="ms-auto">
								<div class="btn-group">
                                    <a href="{{route('admin.roles.index')}}">
									<button type="button" class="btn btn-primary" ><i class="bx bx-plus"></i> Back Roles</button>
                                    </a>
								</div>
							</div>
                               </div>
                               </div>
                               </div>
                               </div>
                               </div>
           
            <div class="page-wrapper" style="margin-top: 0px!important;">
			<div class="page-content">
				<div class="row row-cols-12">
					<div class="card pd_15">
						<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
							<div class="">
								
                            </div>
        </div>
        <section id="pagination">
            <div class="row">
                <div class="col-12">
                    <div class="">
                        <div class="">

                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">
                       <form method="POST" action="{{route('admin.roles.store')}}">
                           @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Role Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="Enter role"> 
    @error('name') <span style="color: red; font-weight:400;">{{$message}}</span>@enderror
  </div>

  
  <button type="submit" class="btn btn-danger  round btn-glow px-2"  style="margin-top: 10px;">Submit</button>
</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
   
@endsection