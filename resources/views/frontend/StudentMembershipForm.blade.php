<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
       
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script> -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>


    <title>aeroform</title>
    <style>
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
        .hg_45{
            height: 45px;
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
</head>

<body>
    <section>
        <div class="container m_t m_b">
            <div class="card">
                <div class="card-body">
                    <h1 class="fnt_sz">Student Membership</h1>
                    <h3 class="fnt_sz2">personal information</h3>
                    <div class="row">
                        <form class="col-12" method="post" action="{{url('student_membership_insert')}}" enctype="multipart/form-data">
                            @csrf
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
                                            <input type="text" name="applicant_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="applicant_name" class="control-label col-sm-3"><b>Sur Name
                                                :</b></label>
                                        <div class="col-sm-7">
                                            <input type="text" name="last_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="applicant_name" class="control-label col-sm-6"><b>Primary Phone No
                                                :</b></label>
                                        <div class="col-sm-7">
                                            <div class="input-group">
                                                <span class="input-group-addon">+91</span>
                                                <input type="text" class="form-control" name="mobiletxt" maxlength="10">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="date_of_birth" class="control-label col-sm-5"><b>Date of Birth
                                                :</b></label>
                                        <div class="row p_l">
                                            <div class="col-sm-7">
                                            <input type="date" class="form-control" name="dobtxt">
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
                                                placeholder="E.g.:British Aeronautical Society" class="form-control">
                                        </div>
                                    </div><br><br>
                                    <div class="form-group">
                                        <label for="present_address" class="control-label col-sm-5"><b>Contact Address
                                                :</b></label>
                                        <div class="col-sm-7">
                                            <input type="text" name="caddresslinetxt" id="applicant_name"
                                                placeholder="Line 1" class="form-control">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="applicant_name" class="control-label col-sm-3"><b>Country
                                                :</b></label>
                                        <div class="col-sm-7">
                                            <select name="ccountrytxt" class="form-control" data-role="select-dropdown">
                                                <option value="" selected="" disabled="">Select</option>
                                                <option value="india">india</option>
                                                <option value="Afganistan">Afganistan</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="applicant_name" class="control-label col-sm-3"><b>State
                                                :</b></label>
                                        <div class="col-sm-7">
                                            <select name="cstatetxt" class="form-control" data-role="select-dropdown">
                                                <option selected="">Select</option>
                                                <option value="odisha">odisha</option>
                                                <option value="rajastan">rajastan</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputCity" class="control-label col-sm-3"><b>City :</b></label>
                                        <div class="col-sm-7">
                                            <select name="ccitytxt" class="form-control" data-role="select-dropdown">
                                                <option selected="">Select</option>
                                                <option value="rairangpur">rairangpur</option>
                                                <option value="Afganistan">bhubaneswar</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputZip" class="control-label col-sm-3"><b>Postal Code
                                                :</b></label>
                                        <div class="col-sm-7">

                                            <input type="text" class="form-control" placeholder="Zip" name="cpostalcodetxt">
                                        </div>
                                    </div>
                                    

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="applicant_name" class="control-label col-sm-5"><b>Middle Name
                                                :</b></label>
                                        <div class="col-sm-7">
                                            <input type="text" name="middle_name"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="applicant_name" class="control-label col-sm-3"><b>Gender
                                                :</b></label>
                                        <div class="col-sm-7">

                                            <select name="genderddl" id="gender" class="form-control">
                                                <option value="" selected="" disabled="">Select</option>
                                                <option value="male">MALE</option>
                                                <option value="female">FEMALE</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="applicant_name" class="control-label col-sm-6"><b>Secondary Phone No
                                                :</b></label>
                                        <div class="col-sm-7">
                                            <div class="input-group">
                                                <span class="input-group-addon">+91</span>
                                                <input type="text" class="form-control" name="mobile2txt" maxlength="10">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="applicant_name" class="control-label col-sm-3"><b>Email
                                                :</b></label>
                                        <div class="col-sm-7">

                                            <input type="email" class="form-control" placeholder="Enter email"
                                                name="emailtxt">
                                        </div>
                                    </div><br><br><br><br><br><br>

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
                                                placeholder="Line 1" class="form-control">

                                        </div>
                                    </div>
                                    

                                    <div class="form-group">
                                        <label for="applicant_name" class="control-label col-sm-3"><b>Country
                                                :</b></label>
                                        <div class="col-sm-7">
                                            <select name="pcountrytxt" class="form-control" data-role="select-dropdown">
                                                <option value="" selected="" disabled="">Select</option>
                                                <option value="india">india</option>
                                                <option value="Afganistan">Afganistan</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="applicant_name" class="control-label col-sm-3"><b>State
                                                :</b></label>
                                        <div class="col-sm-7">
                                            <select name="pstatetxt" class="form-control" data-role="select-dropdown">
                                                <option selected="">Select</option>
                                                <option value="odisha">odisha</option>
                                                <option value="rajastan">rajastan</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputCity" class="control-label col-sm-3"><b>City :</b></label>
                                        <div class="col-sm-7">
                                            <select name="pcitytxt" class="form-control" data-role="select-dropdown">
                                                <option selected="">Select</option>
                                                <option value="rairangpur">rairangpur</option>
                                                <option value="Afganistan">bhubaneswar</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputZip" class="control-label col-sm-3"><b>Postal Code
                                                :</b></label>
                                        <div class="col-sm-7">

                                            <input type="text" class="form-control" placeholder="Zip" name="ppostalcodetxt"
                                                >
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="row brd_top">
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
                                        <div data-repeater-item class="o_h mb_15">
                                            <div class="wd_12 fl_lf  mb_33">
                                                <label for="applicant_name" class="control-label lbl_hide"><b>Qualification</b>:</label>
                                                <select class="form-control" data-role="select-dropdown" name="cqualificationtxtt">  <!-- onchange='CheckColors(this.value);' -->
                                                    <option selected="">Select</option>
                                                    <option value="b.tech">b.tech</option>
                                                    <option value="mca">mca</option>
                                                    <option value="others">Others</option>
                                                </select>
                                                <input type="text" class="form-control" name="otherqualification" placeholder="Enter Qualification" style="display:none" />
                                            </div>
                                            <div class="wd_12 fl_lf mb_33">
                                                <label for="applicant_name" class="control-label lbl_hide"><b>college</b>:</label>
                                                <input type="text" class="form-control" placeholder="" name="collagetxt">
                                            </div>
                                            <div class="wd_12 fl_lf mb_33">
                                                <label for="applicant_name" class="control-label lbl_hide"><b>Address</b>:</label>
                                                <input type="text" class="form-control" placeholder="" name="addresstxt">
                                            </div>
                                            <div class="wd_12 fl_lf mb_33">
                                                <label for="applicant_name" class="control-label lbl_hide"><b>University</b>:</label>
                                                <input type="text" class="form-control" placeholder="" name="universitytxt">
                                            </div>
                                            <div class="wd_12 fl_lf mb_33">
                                                <label for="applicant_name" class="control-label lbl_hide"><b>Year Of Passing</b>:</label>
                                                <select name="yaerofpassingtxt" class="form-control" data-role="select-dropdown">
                                                    <option selected="">Select</option>
                                                    <option value="2017">2017</option>
                                                    <option value="2018">2018</option>
                                                    <option value="2019">2019</option>
                                                    <option value="2020">2020</option>
                                                </select>
                                            </div>
                                            <div class="wd_12 fl_lf mb_33">
                                                <label for="applicant_name" class="control-label lbl_hide"><b>Specialization</b>:</label>
                                                <input type="text" class="form-control" placeholder="Specialization" name="specializationtxt">
                                            </div>
                                            <div class="wd_7 fl_lf col-6">
                                                <label for="applicant_name" class="control-label lbl_hide"><b>Action</b>:</label>
                                                <input data-repeater-delete type="button" class="btn btn-danger" value="Delete"/>
                                            </div>
                                        </div>
                                    </div>
                                    <input data-repeater-create type="button" class="btn btn-success" value="Add"/>
                                </div>   
                            <!-- <div class="table-responsive">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Qualification</th>
                                      <th>College</th>
                                      <th>Address</th>
                                      <th>University</th>
                                      <th>Year Of Passing</th>
                                      <th>Specialization</th>
                                      <th>Action</th>
                                      
                                    </tr>
                                  </thead>
                                  <div class="repeater">
                                    <div data-repeater-list="data">
                                        <div data-repeater-item>
                                            <div class="row">
                                  <tbody>


                                    <tr>
                                      <td>1</td>
                                      <td><select id="demo_overview" class="form-control" data-role="select-dropdown">
                                        <option selected="">Select</option>
                                        <option value="b.tech">b.tech</option>
                                        <option value="mca">mca</option>
                                    </select></td>
                                        <td><input type="text" class="form-control" placeholder="" id="inputZip"></td>
                                        <td><input type="text" class="form-control" placeholder="" id="inputZip"></td>
                                        <td><input type="text" class="form-control" placeholder="" id="inputZip"></td>
                                      <td><select id="demo_overview" class="form-control" data-role="select-dropdown">
                                        <option selected="">Select</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                    </select></td>
                                      <td><input type="text" class="form-control" placeholder="Fee" id=""></td>
                                      <td> 
                                        <button type="button" data-repeater-delete class="btn btn-danger"><i class="ft-x"></i> Delete</button>
                                    </td>
                                      
                                    </tr>
                                  </tbody>
                                  </div>
                                  </div>
                                  </div>

                                  <button type="button" data-repeater-create id="repeater-button" class="btn btn-info">
                                    <i class="ft-plus"></i> Add more
                                </button>
                                  </div>
                                </table>
                              </div> -->
                            </div>
                            </div>

                            <div class="row brd_top">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputCity" class="control-label col-sm-5"><b>Membership
                                                :</b></label>
                                        <div class="col-sm-7">
                                            <select name="membershiptxt" class="form-control" data-role="select-dropdown"
                                                placeholder="select">
                                                <option selected="">Select</option>
                                                <option value="1">Student 1 Year</option>
                                                <option value="2">Student 2 Year</option>
                                                <option value="3">Student 3 Year</option>
                                                <option value="4">Student 4 Year</option>
                                                <option value="5">Student 5 Year</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputCity" class="control-label col-sm-5"><b>Upload Document
                                                :</b></label>
                                        <div class="col-sm-7">
                                            <select name="uploaddoc1txt" class="form-control mb_15" data-role="select-dropdown"
                                                placeholder="select">
                                                <option selected="">Select</option>
                                                <option value="1">Authentication Doc</option>
                                                <option value="2">PAN</option>
                                                <option value="3">Passport</option>
                                            </select>
                                            <select name="uploaddoc2txt" class="form-control" data-role="select-dropdown"
                                                placeholder="select">
                                                <option selected="">Select</option>
                                                <option value="1">Authentication Doc</option>
                                                <option value="2">PAN</option>
                                                <option value="3">Passport</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group p_l">
                                        <label for="inputCity" class="control-label col-sm-3"><b>Signature :</b></label>
                                        <p class="p_txt">Please upload.png, .jpg, .jpeg files only</p>
                                        <div class="col-sm-7 p_l">

                                            <input type="file" class="form-control hg_45"
                                                name="signaturefileupload">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputCity" class="control-label p_l "><b>If elected, I would like to
                                                be
                                                attached to the branch located in :</b></label>
                                        <div class="col-sm-7">
                                            <select name="branchddl" class="form-control" data-role="select-dropdown">
                                            <option value="" selected="" disabled="">Select Branch</option>
                                                @foreach($result as $fetchbranch)
                                                
                                                <option value="{{$fetchbranch->id}}">{{$fetchbranch->vch_branchname}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputCity" class="control-label col-sm-5"><b>Payment Mode
                                                :</b></label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="paymenttypeddl" data-role="select-dropdown">
                                                <option selected="">Select</option>
                                                <option value="0">Online</option>
                                                <option value="1">Offline</option>
                                            </select>


                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" />
                                        <label class="form-check-label" for="flexCheckDefault"><b>I agree
                                                to,</b></label>
                                        <a href="#" class="f_r"> Term & Condition</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputZip" class="control-label col-sm-3"><b>fee :</b></label>
                                        <div class="col-sm-7">

                                            <input type="number" class="form-control" placeholder="Fee" name="feetxt">
                                        </div>
                                    </div>

                                    <div class="form-group p_l">

                                        <div class="col-sm-7 p_l">
                                            <input type="file" class="form-control hg_45"
                                                name="fileupload1">

                                        </div>
                                    </div>
                                    <div class="form-group p_l">

                                        <div class="col-sm-7 p_l">
                                            <input type="file" class="form-control hg_45"
                                                name="fileupload2">

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
    </section>




    
    <script>
        // $(document).ready(function () {
        //     $('.repeater').repeater({
        //         repeaters: [{
        //             selector: '.inner-repeater'
        //         }]
        //     });
        // });
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
    <script type="text/javascript">
        // function CheckColors(val){
        //     var element=document.getElementById('color');
        //     if(val=='pick a color'||val=='others')
        //     element.style.display='block';
        //     else  
        //     element.style.display='none';
        // }
    </script>
    

        

</body>

</html>   