<div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{asset('assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">{{ Auth::user()->name }}</h4>
                </div>
                <!-- <div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
                </div> -->
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu" >
                <li>
                    <a href="{{url('/')}}" class="">
                        <div class="parent-icon"><i class='bx bx-home'></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li> 
                @can('Settings')
                <li>
					<a href="#" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-spa' ></i>
						</div>
						<div class="menu-title">Setting</div>
					</a>
					<ul class="">
						<li> <a href="{{url('/addcountry')}}"><i class="bx bx-right-arrow-alt"></i>Country</a>
						</li>
                       
                        <li> <a href="{{url('/addstate')}}"><i class="bx bx-right-arrow-alt"></i>State</a>
						</li>
					
                        <li> <a href="{{url('/addcity')}}"><i class="bx bx-right-arrow-alt"></i>City</a>
						</li>
					
                        <li> <a href="{{url('/currency')}}"><i class="bx bx-right-arrow-alt"></i>Currency</a>
						</li>
					
                        <li> <a href="{{url('/currency-exchange')}}"><i class="bx bx-right-arrow-alt"></i>Currency Rate</a>
						</li>
                        <li> <a href="{{url('/fee-structure')}}"><i class="bx bx-right-arrow-alt"></i>Fee Structure</a>
						</li>
                        <li> <a href="{{url('/addprofesstionalDesignation')}}"><i class="bx bx-right-arrow-alt"></i>Professtional Designation</a>
						</li>
                        <li> <a href="{{url('/addqualificationmaster')}}"><i class="bx bx-right-arrow-alt"></i>Qualification Master</a>
						</li>
                        <li> <a href="{{url('/addmembertypemaster')}}"><i class="bx bx-right-arrow-alt"></i>Member Type Master</a>
						</li>
					</ul>
				</li>
                @endcan

                @can('Branch')
                <li>
					<a href="#" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-spa' ></i>
						</div>
						<div class="menu-title">Branch</div>
					</a>
					<ul class="">
                        <li> <a href="{{url('/addbranch')}}"><i class="bx bx-right-arrow-alt"></i>Add Branch</a>
						</li>
					</ul>
				</li>
                @endcan
                @can('Add Events')
                <li>
                    <a href="{{url('/addbranchevent')}}" class="">
                        <div class="parent-icon"><i class='bx bx-home'></i>
                        </div>
                        <div class="menu-title">Add Events</div>
                    </a>
                </li>
                @endcan
                @can('Add Gallery')
                <li>
                    <a href="{{url('/addbranchgallery')}}" class="">
                        <div class="parent-icon"><i class='bx bx-home'></i>
                        </div>
                        <div class="menu-title">Add Gallery</div>
                    </a>
                </li>
                @endcan
                @can('Admin View Events')
                <li>
                    <a href="{{url('/approvebranchevent')}}" class="">
                        <div class="parent-icon"><i class='bx bx-home'></i>
                        </div>
                        <div class="menu-title">Admin View Events</div>
                    </a>
                </li>
                @endcan
                @can('Admin View Gallery')
                <li>
                    <a href="{{url('/approvebranchgallery')}}" class="">
                        <div class="parent-icon"><i class='bx bx-home'></i>
                        </div>
                        <div class="menu-title">Admin View Gallery</div>
                    </a>
                </li>
                @endcan
                @can('Rolee')
                <li>
                    <a href="{{route('admin.roles.index')}}" class="">
                        <div class="parent-icon"><i class='bx bx-home'></i>
                        </div>
                        <div class="menu-title">Role</div>
                    </a>
                </li>
                @endcan
                @can('Permission')
                <li>
                    <a href="{{route('admin.permissions.index')}}" class="">
                        <div class="parent-icon"><i class='bx bx-home'></i>
                        </div>
                        <div class="menu-title">Permission</div>
                    </a>
                </li>
                @endcan
                @can('Admin View Examdownload Page')
                <li>
                    <a href="{{url('/approvebranchevent')}}" class="">
                        <div class="parent-icon"><i class='bx bx-home'></i>
                        </div>
                        <div class="menu-title">Admin View Events</div>
                    </a>
                </li>
                @endcan
                <li>
                    <a href="{{url('/adddownloadpages')}}">
                        <div class="parent-icon"><i class='bx bx-home'></i></div>
                        <div class="menu-title">Add Exam Page</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/studentapplications')}}">
                        <div class="parent-icon"><i class='bx bx-home'></i></div>
                        <div class="menu-title">Student Application</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/membership')}}" class="">
                        <div class="parent-icon"><i class='bx bx-home'></i>
                        </div>
                        <div class="menu-title">Membership</div>
                    </a>
                </li>
                <li>
                    <a href="{{url('/proposer')}}" class="">
                        <div class="parent-icon"><i class='bx bx-home'></i>
                        </div>
                        <div class="menu-title">Proposer</div>
                    </a>
                </li>
             
            </ul>
            
            <!--end navigation-->
        </div>
       