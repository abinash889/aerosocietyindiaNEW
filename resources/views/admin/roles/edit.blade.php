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
    <section id="pagination" style="display:none;">
        <div class="row" style="margin-right: 0px; margin-left:0px">
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
                            <form method="POST" action="{{route('admin.roles.update', $role)}}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">

                                    @error('name') <span style="color: red; font-weight:400;">{{$message}}</span>@enderror
                                </div>

                                <!-- <button type="submit" class="btn btn-danger  round btn-glow px-2">Update</button> -->
                            </form>
                            <form method="POST" action="{{route('admin.roles.updated', $role->id)}}">
                                <label for="exampleInputEmail1">Roles Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="Enter Permissions" value="{{$role->name}}" disabled>
                        </div>
                    </div>

                    <!-- ----------------------------------------------------------------------------------------- -->

                    <style>
                        table,
                        th,
                        td {
                            border: 1px solid black;
                            border-collapse: collapse;
                        }
                    </style>


                   

                    <div class="card-content collapse show">

                        <div class="card-body card-dashboard">
                            <label for="permission">Roles Permissions:</label>

                            @csrf

                            <table style="margin-left: 18px; width: 52%;">
                                <tr>
                                    <th>Feature</th>
                                    <th>Capabilities</th>

                                </tr>


                                <tr>
                                    <td>Client</td>
                                    <td>
                                        @foreach($client as $clients)
                                        <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$clients->id}}" {{ $role->permissions->contains($clients->id) ? 'checked' : '' }}>
                                        <label for="vehicle1"> {{ $clients->name }}</label><br>
                                        @endforeach
                                    </td>

                                </tr>
                                <tr>
                                    <td>Positions</td>
                                    <td>
                                        @foreach($position as $positions)
                                        <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$positions->id}}" {{ $role->permissions->contains($positions->id) ? 'checked' : '' }}>
                                        <label for="vehicle1"> {{ $positions->name }}</label><br>
                                        @endforeach
                                    </td>

                                </tr>
                                <tr>
                                    <td>Resume</td>
                                    <td>
                                        @foreach($resume as $resumes)
                                        <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$resumes->id}}" {{ $role->permissions->contains($resumes->id) ? 'checked' : '' }}>
                                        <label for="vehicle1"> {{ $resumes->name }}</label><br>
                                        @endforeach
                                    </td>

                                </tr>
                                <tr>
                                    <td>Interview</td>
                                    <td>
                                        @foreach($interview as $interviews)
                                        <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$interviews->id}}" {{ $role->permissions->contains($interviews->id) ? 'checked' : '' }}>
                                        <label for="vehicle1"> {{ $interviews->name }}</label><br>
                                        @endforeach
                                    </td>

                                </tr>
                                <tr>
                                    <td>Billing</td>
                                    <td>
                                        @foreach($interview as $billings)
                                        <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$billings->id}}" {{ $role->permissions->contains($billings->id) ? 'checked' : '' }}>
                                        <label for="vehicle1"> {{ $billings->name }}</label><br>
                                        @endforeach
                                    </td>

                                </tr>
                                <tr>
                                    <td>Incentive</td>
                                    <td>
                                        @foreach($incentive as $incentives)
                                        <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$incentives->id}}" {{ $role->permissions->contains($incentives->id) ? 'checked' : '' }}>
                                        <label for="vehicle1"> {{ $incentives->name }}</label><br>
                                        @endforeach
                                    </td>

                                </tr>
                              
                                <tr>
                                    <td>Today Plan</td>
                                    <td>
                                        @foreach($leave as $plans)
                                        <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$plans->id}}" {{ $role->permissions->contains($plans->id) ? 'checked' : '' }}>
                                        <label for="vehicle1"> {{ $plans->name }}</label><br>
                                        @endforeach
                                    </td>

                                </tr>
                                
                               



                            </table>
                            @error('name')
                            <span style="color: red; font-weight:400;">{{$message}}</span>
                            @enderror

                            <button type="submit" class="btn btn-danger  round btn-glow px-2" style="margin: 20px;">Update</button>
                            </form>
                        </div>
                    </div>

                    <!-- ----------------------------------------------------------------------------------------- -->











                    



                </div>
            </div>

        </div>


    </section>

    <!-- *********************working******************* -->
    <section id="pagination">
        <div class="row" style="margin-right: 0px; margin-left:0px">
            <div class="col-12">
                <div class="">
                    <div class="">

                        <form method="POST" action="{{route('admin.roles.updated', $role->id)}}">
                            <label for="exampleInputEmail1">Roles Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="Enter Permissions" value="{{$role->name}}" disabled>

                            <label for="permission" style="margin: 30px;">Roles Permissions:</label>
                            @csrf
                            <div class="row" id="checkbox" style="margin: 10px;">

                                <div class="col-8">
                                    <div class="card">
                                        <div class="card-content collapse show">
                                            <div class="table-responsive">
                                                <table class="table table-bordered mb-0">
                                                    <tbody>
                                                        <th>Feature</th>
                                                        <th>Capabilities</th>

                                                        <tr>
                                                            <td>Admin Branch view   </td>
                                                            <td>
                                                                <div class="card-body">
                                                                    <div class="skin skin-flat">
                                                                        <fieldset>
                                                                            @foreach($leave as $plans)
                                                                            <div>
                                                                                <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$plans->id}}" {{ $role->permissions->contains($plans->id) ? 'checked' : '' }}>
                                                                                <label for="vehicle1">{{ $plans->name }}</label>

                                                                            </div>
                                                                            @endforeach
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                        <tr>

                                                        
                                                        <tr>
                                                            <td>Role</td>
                                                            <td>
                                                                <div class="card-body">
                                                                    <div class="skin skin-flat">
                                                                        <fieldset>
                                                                            @foreach($position as $positions)
                                                                            <div>
                                                                                <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$positions->id}}" {{ $role->permissions->contains($positions->id) ? 'checked' : '' }}>
                                                                                <label for="vehicle1">{{ $positions->name }}</label>
                                                                            </div>
                                                                            @endforeach
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                        
                                                        <tr>
                                                            <td>Permission</td>
                                                            <td>
                                                                <div class="card-body">
                                                                    <div class="skin skin-flat">
                                                                        <fieldset>
                                                                            @foreach($resume as $resumes)
                                                                            <div>
                                                                                <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$resumes->id}}" {{ $role->permissions->contains($resumes->id) ? 'checked' : '' }}>
                                                                                <label for="vehicle1">{{ $resumes->name }}</label>

                                                                            </div>
                                                                            @endforeach
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                        
                                                        <tr>
                                                            <td>Branch Settings</td>
                                                            <td>
                                                                <div class="card-body">
                                                                    <div class="skin skin-flat">
                                                                        <fieldset>
                                                                            @foreach($interview as $interviews)
                                                                            <div>
                                                                                <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$interviews->id}}" {{ $role->permissions->contains($interviews->id) ? 'checked' : '' }}>
                                                                                <label for="vehicle1">{{ $interviews->name }}</label>
                                                                            </div>
                                                                            @endforeach
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>Settings</td>
                                                            <td>
                                                                <div class="card-body">
                                                                    <div class="skin skin-flat">
                                                                        <fieldset>
                                                                            @foreach($client as $clients)
                                                                            <div>
                                                                                <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$clients->id}}" {{ $role->permissions->contains($clients->id) ? 'checked' : '' }}>
                                                                                <label for="vehicle1">{{ $clients->name }}</label>
                                                                            </div>
                                                                            @endforeach
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                       
                                                        <tr>
                                                            <td>Branch</td>
                                                            <td>
                                                                <div class="card-body">
                                                                    <div class="skin skin-flat">
                                                                        <fieldset>
                                                                            @foreach($incentive as $incentives)
                                                                            <div>
                                                                                <input type="checkbox" id="vehicle1" name="vehicle1[]" value="{{$incentives->id}}" {{ $role->permissions->contains($incentives->id) ? 'checked' : '' }}>
                                                                                <label for="vehicle1">{{ $incentives->name }}</label>
                                                                            </div>
                                                                            @endforeach
                                                                        </fieldset>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    
                                                      

                                                    
                                                       
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <tr>

                                <td class="width-350">
                                    <button type="submit" style="margin: 14px;" class="btn btn-success mr-1 mb-1">Update</button>
                                </td>

                            </tr>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>


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