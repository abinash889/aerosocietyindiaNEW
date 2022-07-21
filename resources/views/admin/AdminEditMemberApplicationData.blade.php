@extends("layouts.app")

<style>
    .form-group{
        margin-bottom:15px;
    }
        .mt_42_m{
            margin-top: 22px;
            margin-bottom: 12px;
        }
        .d_inl {
            display: -webkit-inline-box;
        }   

        .fnt_sz {
            text-align: center;
            text-transform: uppercase;
            font-weight: 700;
            font-size: 25px;
            color: #ff6a6a;
        }

        .m_t {
            margin-top: 50px;
        }

        .fnt_sz2 {
            text-align: center;
            text-transform: uppercase;
            font-size: 19px;
            font-weight: 600;
            padding: 17px 0px;
            color: gray;
        }

        .p_l {
            padding-left: 15px;
        }

        .checkbox-warning-filled [type="checkbox"][class*='filled-in']:checked+label:after {
            border-color: #FF8800;
            background-color: #FF8800;
        }

        .input-group-addon {
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 400;
            line-height: 1;
            color: #555;
            text-align: center;
            background-color: #eee;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .p_txt {
            color: orange;
            font-size: 10px;
            padding-left: 20px;
            padding: 0px;
            margin: 0px;
        }

        .form-check {
            position: relative;
            display: block;
            padding-left: 2.25rem;
            padding-top: 23px;
        }

        .f_r {
            float: right;
        }

        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1pxsolidrgba(0, 0, 0, .125);
            border-radius: 0.25rem;
            box-shadow: 0px 1px 9px #d2c2c2;
        }

        .m_b {
            margin-bottom: 30px;
        }

        .brd_top {
            padding: 30px 0px;
            border-top: 2px solid #e9e2e2;
        }


        .btn-1 {
            border: none;
            display: block;
            text-align: center;
            cursor: pointer;
            text-transform: uppercase;
            outline: none;
            overflow: hidden;
            position: relative;
            color: #fff;
            font-weight: 700;
            font-size: 15px;
            background-color: #222;
            padding: 17px 60px;
            margin: 0 auto;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.20);
            margin-top: 30px;
        }

        .btn-1 span {
            position: relative;
            z-index: 1;
        }

        .btn-1:after {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            height: 490%;
            width: 140%;
            background: #ff8370;
            -webkit-transition: all .5s ease-in-out;
            transition: all .5s ease-in-out;
            -webkit-transform: translateX(-98%) translateY(-25%) rotate(45deg);
            transform: translateX(-98%) translateY(-25%) rotate(45deg);
        }

        .btn-1:hover:after {
            -webkit-transform: translateX(-9%) translateY(-25%) rotate(45deg);
            transform: translateX(-9%) translateY(-25%) rotate(45deg);
        }
        .wd_100{
            width: 100%;
        }
        .wd_12{
            margin-right: 11px;
            width: 14.28%;
        }
        /* .wd_16{
            margin-right: 11px;
            width: 15.66%;
        } */
        .wd_7{
            width: 7.28%;
            margin-right: 0px;
        }
        .fl_lf{
            float: left;
        }
        .o_h{
            overflow: auto;
        }
        .mb_15{
            margin-bottom: 15px;
        }
        @media (max-width:991px){
            .d_none{display: none;}
            .mb_33{
                width: 49%;
            }
            .wd_12 {
                margin-right: 2px;
                margin-bottom: 11px;
            }
        }
        @media (min-width:992px){
            .lbl_hide{
                display:none;
            }
            
        }
</style>
		@section("wrapper")
		<div class="page-wrapper">
			<div class="page-content">
				<div class="row row-cols-12">
					<div class="card pd_15">
						<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
							<div class="">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item active" aria-current="page">
                                            <a href="{{url('/membership')}}"><i class="bx bx-left-arrow" aria-hidden="true"></i> Back to Membership List</a>
                                        </li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</div>
				<div class="row row-cols-12">
                    <div class="card">
                        <div class="card-body">
                        <form class="col-12" method="post" action="{{url('/memberUDTby_Admin')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$fetchMember->id}}"/>
                            <div class="row">
                                <div class="col-10">

                                    <div class="form-group">
                                        <div class="row p_l">
                                            <label for="applicant_name" class="control-label col-md-2"><b>Upload
                                                    Photo</b>
                                                :</label>
                                            <div class="col-md-4">
                                                <input type="file" class="form-control hg_45" name="filenameuploadphoto">
                                               
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-sm-5">
                                            <label for="applicant_name" class="control-label "><b>First Name
                                                    :</b></label>
                                        </div>
                                        <div class="col-sm-7">
                                            <input type="text" name="applicant_name" class="form-control" value="{{$fetchMember->vch_firstname}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="applicant_name" class="control-label col-sm-3"><b>Sur Name
                                                :</b></label>
                                        <div class="col-sm-7">
                                            <input type="text" name="last_name" class="form-control" value="{{$fetchMember->vch_lastname}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="applicant_name" class="control-label col-sm-6"><b>Primary Phone No
                                                :</b></label>
                                        <div class="col-sm-7">
                                            <div class="input-group">
                                                <span class="input-group-addon">+91</span>
                                                <input type="text" class="form-control" required name="mobiletxt" value="{{$fetchMember->vch_phone1}}" maxlength="10">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="date_of_birth" class="control-label col-sm-5"><b>Date of Birth
                                                :</b></label>
                                        <div class="row">
                                            <div class="col-sm-7">
                                            <input type="date" class="form-control" required value="{{$fetchMember->vch_dob}}" name="dobtxt">
                                            </div>
                                        </div>
                                    </div>
                                   


                                    
                                    <div class="form-group">
                                        <label for="applicant_name" class="control-label col-sm-7"><b>Member Of Any
                                                Other
                                                Society
                                                :</b></label>
                                        <div class="col-sm-7">
                                            <input type="text" name="memberofanysecoetytxt" id="applicant_name"
                                                placeholder="E.g.:British Aeronautical Society" class="form-control" value="{{$fetchMember->vch_membersociety}}" required>
                                        </div>
                                    </div><br><br>

                                   
                                    
                                    @php
                                    $contact_address=explode(',',$fetchMember->vch_contactaddress)
                                    @endphp

                                   


                                    <div class="form-group">
                                        <label for="present_address" class="control-label col-sm-5"><b>Contact Address
                                                :</b></label>
                                        <div class="col-sm-7">
                                            <input type="text" name="caddresslinetxt" id="applicant_name"
                                                placeholder="Line 1" class="form-control" value="{{$contact_address[0]}}"  required>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="applicant_name" class="control-label col-sm-3"><b>Country
                                                :</b></label>
                                        <div class="col-sm-7">
                                            <select name="ccountrytxt" class="form-control" required data-role="select-dropdown">
                                                <option value="" selected="" disabled="">Select</option>
                                                @foreach($country as $countrys)
                                                
                                                <option value="{{$countrys->id}}" {{($countrys->id==$contact_address[1])?'selected' : ''}}>{{$countrys->vch_countryname}}</option>

                                                @endforeach
                                                
                                            </select>

                                         
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="applicant_name" class="control-label col-sm-3"><b>State
                                                :</b></label>
                                        <div class="col-sm-7">
                                            <select name="cstatetxt" class="form-control" required data-role="select-dropdown">
                                                <option selected="">Select</option>

                                                @foreach($state as $states)
                                                
                                                <option value="{{$states->id}}" {{($states->id==$contact_address[2])?'selected' : ''}}>{{$states->vch_statename}}</option>

                                                @endforeach
                                                
                                            </select>


                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputCity" class="control-label col-sm-3"><b>City :</b></label>
                                        <div class="col-sm-7">
                                            <select name="ccitytxt" class="form-control" required data-role="select-dropdown">
                                                <option selected="">Select</option>

                                                @foreach($city as $citys)
                                                
                                                <option value="{{$citys->id}}" {{($citys->id==$contact_address[3])?'selected' : ''}}>{{$citys->vch_cityname}}</option>

                                                @endforeach
                                                
                                            </select>


                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputZip" class="control-label col-sm-3"><b>Postal Code
                                                :</b></label>
                                        <div class="col-sm-7">

                                            <input type="text" class="form-control" required placeholder="Zip" name="cpostalcodetxt" value="{{$contact_address[4]}}">
                                        </div>
                                    </div>
                                    

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="applicant_name" class="control-label col-sm-5"><b>Middle Name
                                                :</b></label>
                                        <div class="col-sm-7">
                                            <input type="text" name="middle_name"
                                                class="form-control" value="{{$fetchMember->vch_middlename}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="applicant_name" class="control-label col-sm-3"><b>Gender
                                                :</b></label>
                                        <div class="col-sm-7">

                                            <select name="genderddl" id="gender" class="form-control" required>
                                                <option value="" selected="" disabled="">Select</option>
                                                <option value="male" {{($fetchMember->vch_gender == "male")? 'selected' : ''}}>MALE</option>
                                                <option value="female" {{($fetchMember->vch_gender == "female")? 'selected' : ''}}>FEMALE</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="applicant_name" class="control-label col-sm-6"><b>Secondary Phone No
                                                :</b></label>
                                        <div class="col-sm-7">
                                            <div class="input-group">
                                                <span class="input-group-addon">+91</span>
                                                <input type="text" class="form-control" required name="mobile2txt" value="{{$fetchMember->vch_phone2}}" maxlength="10">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="applicant_name" class="control-label col-sm-3"><b>Email
                                                :</b></label>
                                        <div class="col-sm-7">

                                            <input type="email" class="form-control" required value="{{$fetchMember->vch_emailid}}" placeholder="Enter email"
                                                name="emailtxt">
                                        </div>
                                    </div><br><br><br><br><br><br>


                                    
                                    @php
                                    $permanent_address=explode(',',$fetchMember->vch_permanentaddress)
                                    @endphp

                                    <div class="form-group">
                                        <div>
                                        <label for="present_address" class="control-label col-sm-5"><b>Permanent Address
                                                :</b></label>
                                                
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault" />
                                                    <label class="form-check-label p_txt" for="flexCheckDefault"><b>Same as Contact Address</b></label>
                                                  
                                            </div>
                                        <div class="col-sm-7">
                                            <input type="text" name="plinetxt" 
                                                placeholder="Line 1" class="form-control"  value="{{$permanent_address[0]}}" required>

                                        </div>
                                    </div>
                                    

                                    <div class="form-group">
                                        <label for="applicant_name" class="control-label col-sm-3"><b>Country
                                                :</b></label>
                                        <div class="col-sm-7">
                                            <select name="pcountrytxt" class="form-control" required data-role="select-dropdown">
                                            <option selected="">Select</option>
                                               
                                                @foreach($country as $countrys1)
                                                
                                                <option value="{{$countrys1->id}}" {{($countrys1->id==$permanent_address[1])?'selected' : ''}}>{{$countrys1->vch_countryname}}</option>

                                                @endforeach

                                                

                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="applicant_name" class="control-label col-sm-3"><b>State
                                                :</b></label>
                                        <div class="col-sm-7">
                                            <select name="pstatetxt" class="form-control" required data-role="select-dropdown">
                                                <option selected="">Select</option>
                                               
                                                @foreach($state as $states)
                                                
                                                <option value="{{$states->id}}" {{($states->id==$permanent_address[2])?'selected' : ''}}>{{$states->vch_statename}}</option>

                                                @endforeach
                                            </select>


                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputCity" class="control-label col-sm-3"><b>City :</b></label>
                                        <div class="col-sm-7">
                                            <select name="pcitytxt" class="form-control" required data-role="select-dropdown">
                                                <option selected="">Select</option>
                                                @foreach($city as $citys)
                                                
                                                <option value="{{$citys->id}}" {{($citys->id==$permanent_address[3])?'selected' : ''}}>{{$citys->vch_cityname}}</option>

                                                @endforeach
                                            </select>


                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputZip" class="control-label col-sm-3"><b>Postal Code
                                                :</b></label>
                                        <div class="col-sm-7">

                                            <input type="text" class="form-control" required placeholder="Zip" name="ppostalcodetxt" value="{{$permanent_address[4]}}"
                                                >
                                        </div>
                                    </div>


                                </div>
                            </div>
                          
                            <div class="row brd_top">
                                <div style="text-align: center;width: 100%;">
                                    <p >ACADEMIC INFORMATION*</p>
                                    </div>
                                <div class="table-responsive">
                                    <div class="wd_100 o_h mb_15 d_none">
                                        <div class="wd_12 fl_lf "><strong>Qualification</strong></div>
                                        <div class="wd_12 fl_lf"><strong>College</strong></div>
                                        <div class="wd_12 fl_lf"><strong>Address</strong></div>
                                        <div class="wd_12 fl_lf"><strong>University</strong></div>
                                        <div class="wd_12 fl_lf"><strong>Year Of Passing</strong></div>
                                        <div class="wd_12 fl_lf"><strong>Specialization</strong></div>
                                        <div class="wd_7 fl_lf"><strong>Action</strong></div>
                                    </div>
                                    <div class="repeater wd_100">

                                        <div data-repeater-list="data">
                                        @foreach($result as $results)
                                            <div data-repeater-item class="o_h mb_15">
                                            
                                                <div class="wd_12 fl_lf  mb_33">
                                                    <label for="applicant_name" class="control-label lbl_hide"><b>Qualification</b>:</label>
                                                    <select id="" class="form-control" required data-role="select-dropdown" name="cqualificationtxtt">
                                                        <option selected="">{{$results[0]}}</option>
                                                        <option value="b.tech">b.tech</option>
                                                        <option value="mca">mca</option>
                                                        <option value="others">Others</option>
                                                    </select>
                                                <input type="text" class="form-control" name="otherqualification"  placeholder="Enter Qualification" style="display:none" />
                                                </div>
                                                <div class="wd_12 fl_lf mb_33">
                                                    <label for="applicant_name" class="control-label lbl_hide"><b>college</b>:</label>
                                                    <input type="text" class="form-control" required placeholder="" name="collagetxt" value="{{$results[1]}}">
                                                </div>
                                                <div class="wd_12 fl_lf mb_33">
                                                    <label for="applicant_name" class="control-label lbl_hide"><b>Address</b>:</label>
                                                    <input type="text" class="form-control" required placeholder="" name="addresstxt" value="{{$results[2]}}">
                                                </div>
                                                <div class="wd_12 fl_lf mb_33">
                                                    <label for="applicant_name" class="control-label lbl_hide"><b>University</b>:</label>
                                                    <input type="text" class="form-control" required placeholder="" name="universitytxt" value="{{$results[3]}}">
                                                </div>
                                                <div class="wd_12 fl_lf mb_33">
                                                    <label for="applicant_name" class="control-label lbl_hide"><b>Year Of Passing</b>:</label>
                                                    <select name="yaerofpassingtxt" class="form-control" required data-role="select-dropdown">
                                                        <option selected="">{{$results[4]}}</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2020">2020</option>
                                                    </select>
                                                </div>
                                                <div class="wd_12 fl_lf mb_33">
                                                    <label for="applicant_name" class="control-label lbl_hide"><b>Specialization</b>:</label>
                                                    <input type="text" class="form-control" required placeholder="Specialization" value="{{$results[5]}}" name="specializationtxt">
                                                </div>
                                                <div class="wd_7 fl_lf">
                                                    <label for="applicant_name" class="control-label lbl_hide"><b>Action</b>:</label>
                                                    <input data-repeater-delete type="button" class="btn btn-danger" value="Delete"/>
                                                </div>
                                                
                                            </div>
                                            @endforeach
                                        </div>
                                        <input data-repeater-create type="button" class="btn btn-success" value="Add"/>
                                    </div>   
                                </div>
                            </div>



                            <div class="row brd_top">
                                <div style="text-align: center;width: 100%;">
                                    <p >PROFESSIONAL INFORMATION*</p>
                                </div>
                                <div class="">
                                    <div class="row o_h mb_15 d_none">
                                        <div class="col-md-2 "><strong>Organisation</strong></div>
                                        <div class="col-md-2"><strong>From</strong></div>
                                        <div class="col-md-2"><strong>To</strong></div>
                                        <div class="col-md-2"><strong>Designation</strong></div>
                                        <div class="col-md-2"><strong>Job Description</strong></div>
                                        <div class="col-md-2"><strong>Action</strong></div>
                                    </div>
                                    <div class="repeater wd_100">
                                        <div data-repeater-list="data1">
                                        @foreach($professionalresult as $resultsprofessional)
                                            <div data-repeater-item class="row mb_15">
                                            
                                                <div class="col-md-2  mb_33">
                                                    <label for="applicant_name" class="control-label lbl_hide"><b>Organisation</b>:</label>
                                                    <input type="text" class="form-control" required placeholder="" value="{{$resultsprofessional[0]}}" name="organisationtxt">
                                                </div>
                                                <div class="col-md-2 mb_33">
                                                    <label for="applicant_name" class="control-label lbl_hide"><b>From</b>:</label>
                                                    <input type="date" class="form-control" required placeholder="" value="{{$resultsprofessional[1]}}" name="orga_fromtxt">
                                                </div>
                                                <div class="col-md-2 mb_33">
                                                    <label for="applicant_name" class="control-label lbl_hide"><b>To</b>:</label>
                                                    <input type="date" class="form-control" required placeholder="" value="{{$resultsprofessional[2]}}" name="orga_totxt">
                                                </div>
                                                <div class="col-md-2 mb_33">
                                                    <label for="applicant_name" class="control-label lbl_hide"><b>Designation</b>:</label>
                                                    <input type="text" class="form-control" required placeholder="" value="{{$resultsprofessional[3]}}" name="orga_desig">
                                                </div>
                                                <div class="col-md-2 mb_33">
                                                    <label for="applicant_name" class="control-label lbl_hide"><b>Job Description</b>:</label>
                                                    <textarea name="orga_jobdesc" class="form-control" required rows="2" resize="none">
                                                        {{$resultsprofessional[4]}}
                                                    </textarea>
                                                </div>
                                                <div class="col-md-2 col-6">
                                                    <label for="applicant_name" class="control-label lbl_hide"><b>Action</b>:</label>
                                                    <input data-repeater-delete type="button" class="btn btn-danger" value="Delete"/>
                                                </div>
                                            
                                            </div>
                                            @endforeach
                                        </div>
                                        <input data-repeater-create type="button" class="btn btn-success" value="Add"/>
                                    </div>   
                                </div>
                            </div>

                            <div class="row brd_top">
                                    <div style="text-align: center;width: 100%;">
                                        <p >Awards</p>
                                    </div>
                                <div class="wd_100">
                                    <div class="row mb_15 d_none">
                                        <div class="col-md-7"><strong>Awards</strong></div>
                                        <div class="col-md-5"><strong>Action</strong></div>
                                    </div>
                                    <div class="repeater wd_100">

                                        <div data-repeater-list="awards">
                                        @foreach($awardsresult as $resultsawardsl)
                                            <div data-repeater-item class="row mb_15">
                                            
                                                <div class="col-md-7  mb_33">
                                                    <label for="applicant_name" class="control-label lbl_hide"><b>Award</b>:</label>
                                                    <input type="text" class="form-control" required value="{{$resultsawardsl[0]}}" placeholder="" name="awardsname">
                                                </div>
                                               
                                                <div class="col-md-5 col-6">
                                                    <label for="applicant_name" class="control-label lbl_hide"><b>Action</b>:</label>
                                                    <input data-repeater-delete type="button" class="btn btn-danger" value="Delete"/>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <input data-repeater-create type="button" class="btn btn-success" value="Add"/>
                                    </div>
                                </div> 
                            </div>

                            <div class="row brd_top">
                           

                                <div class="col-md-12">
                                <div class="form-group">
                                        <label for="inputCity" class="control-label col-sm-5"><b>Grade
                                                :</b></label>
                                        <div class="col-sm-4">
                                            <select name="membershiptxt" class="form-control" required data-role="select-dropdown"
                                                placeholder="select">
                                                <option selected="">Select</option>
                                                <option value="1"  {{($fetchMember->int_memberid == "1")? 'selected' : ''}}>Graduate</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group col-md-12 p-0">
                                        <div class="row m-0">
                                            <div class="col-md-6">
                                                <div>
                                                    <label for="applicant_name" class="control-label "><b>Proposer 1::</b></label>
                                                    <select id="membershiptxt" name="pro_name1" class="form-control" required>
                                                        <option selected="">Select</option>
                                                        <option value="1" {{($fetchMember->INT_pro1_userid =="1")? 'selected' :'' }}>proposer name 1</option>
                                                        <option value="2" {{($fetchMember->INT_pro1_userid =="2")? 'selected' :'' }}>proposer name 2</option>
                                                    </select>
                                                </div>
                                                <div style="margin-top:14px;">
                                                    <input type="text" name="pro_email1" id="properser_email" placeholder="Properser Email" class="form-control" value="{{$fetchMember->vch_1emailid}}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="applicant_name" class="control-label "><b>Membership No: 1:
                                                    :</b></label>
                                                    <input type="text" name="pro_number1" id="properser_email" placeholder="Membership Number1" class="form-control" value="{{$fetchMember->vch_1propersormembernom}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 p-0">
                                        <div class="row m-0">
                                            <div class="col-md-6">
                                                <div>
                                                    <label for="applicant_name" class="control-label "><b>Proposer 2::</b></label>
                                                    <select id="membershiptxt1" name="pro_name2" class="form-control" required>
                                                <option selected="">Select</option>
                                                <option value="1" {{($fetchMember->INT_pro2_userid =="1")? 'selected' :'' }}>proposer name 1</option>
                                                <option value="2" {{($fetchMember->INT_pro2_userid =="2")? 'selected' :'' }}>proposer name 2</option>
                                                <!-- <option value="3">proposer name 3</option>
                                                <option value="4">proposer name 4</option>
                                                <option value="5">proposer name 5</option> -->
                                            </select>
                                                </div>
                                                <div style="margin-top:14px;">
                                                <input type="text" name="pro_email2" id="properser_email"
                                                placeholder="Properser Email" class="form-control" value="{{$fetchMember->vch_2emailid}}" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="applicant_name" class="control-label "><b>Membership No: 2:
                                                    :</b></label>
                                                    <input type="text" name="pro_number2" id="properser_email"
                                                placeholder="Membership Number2" class="form-control" value="{{$fetchMember->vch_2propersormembernom}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 p-0">
                                        <div class="row m-0">
                                            <div class="col-md-6">
                                                <div>
                                                    <label for="applicant_name" class="control-label "><b>Upload Document:</b></label>
                                                    <select name="uploaddoc1txt" class="form-control mb_15" required data-role="select-dropdown"
                                                        placeholder="select">
                                                        <option selected="">Select</option>
                                                        <option value="1" {{($fetchMember->vch_document1name=="1")?'selected' :''}}>PAN</option>
                                                        <option value="2" {{($fetchMember->vch_document1name=="2")?'selected' :''}}>Passport</option>
                                                    </select>
                                                    <select name="uploaddoc2txt" class="form-control" required data-role="select-dropdown"
                                                        placeholder="select">
                                                        <option selected="">Select</option>
                                                        <option value="1" {{($fetchMember->vch_document2name=="1")?'selected' :''}}>PAN</option>
                                                        <option value="2" {{($fetchMember->vch_document2name=="2")?'selected' :''}}>Passport</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <input type="file" class="form-control hg_45 mt_42_m"
                                                name="fileupload1">
                                                <input type="file" class="form-control hg_45"
                                                name="fileupload2">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 p-0">
                                        <div class="row m-0">
                                            <div class="col-md-6">
                                                <label><b>Signature :</b></label>
                                                <p class="p_txt">Please upload.png, .jpg, .jpeg files only</p>
                                                <input type="file" class="form-control hg_45"  name="signaturefileupload">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 p-0">
                                        <div class="row m-0">
                                            <div class="col-md-6">
                                                <label><b>Payment Mode
                                                :</b></label>
                                                <select class="form-control" required name="paymenttypeddl" data-role="select-dropdown">
                                                   
                                                    <option value="1" {{($fetchMember->INT_paymentmode=="1")?'selected' :''}}>Online</option>
                                                    <option value="0" {{($fetchMember->INT_paymentmode=="0")?'selected' :''}}>Offline</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 p-0">
                                        <div class="row m-0">
                                            <div class="col-md-6">
                                                <label><b>Fee
                                                :</b></label>
                                                <input type="number" class="form-control" value="{{$fetchMember->vch_fee}}" required placeholder="Fee" name="feetxt">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 p-0">
                                        <div class="row m-0">
                                          
                                            <div class="col-md-6">
                                                <label><b>If elected, I would like to
                                                be
                                                attached to the branch located in :
                                                :</b></label>
                                                <select name="branchddl" class="form-control" required data-role="select-dropdown">
                                            <option value="" selected="" disabled="">Select Branch</option>
                                                @foreach($branchresult as $fetchbranch)
                                                
                                                

                                                <option value="{{$fetchbranch->id}}" {{($fetchbranch->id==$fetchMember->int_branch_id)?'selected' : ''}}>{{$fetchbranch->vch_branchname}}</option>
                                                @endforeach
                                                
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" />
                                        <label class="form-check-label" for="flexCheckDefault"><b>I agree
                                                to,</b><a href="#" class="f_r"> Term & Condition</a></label>
                                        
                                    </div>
                                    </div>
                                </div>
                                
                                <div class="col-12"> <button class="btn-1"><span> SUBMIT </span></button></div>

                            </div>
                        </form>
                        </div>
                    </div>
				</div>
			</div>
		</div>
        
		@endsection
        @section("script")
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
        <script>
        $(document).ready(function() {
            $('.repeater').repeater({
                repeaters: [{
                selector: '.inner-repeater'
                }]
            });
            $("[data-repeater-list]").on("change", "[name*=cqualificationtxtt]", function() {
                $(this).closest("div")
                .find("[name*=otherqualification]")
                .toggle(this.value==="others");
            })
            });
    </script>
    @endsection