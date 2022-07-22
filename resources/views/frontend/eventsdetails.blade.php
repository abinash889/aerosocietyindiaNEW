<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>


    <title>aeroform</title>
    <style>
        .fz_14{
            font-size:14px;
        }
        .m_0{
            margin:0px;
        }
        .hg_23{
            height: 23px;
        }
    </style>
</head>

<body>
    <section>
        <div class="container m_t m_b">
            <div class="card">
                <div class="col-md-12" style="padding-top:15px;">
                    @foreach($evenstsall as $allevents)
                        <div>
                            <img src="{{url('/Upload_DBImage',$allevents->vch_image)}}" class="img-fluid" style="width:100%;">
                            <p>{{$allevents->vch_eventname}}</p>
                            <p class="m-0">Event Date:<strong>{{date("F jS, Y", strtotime($allevents->DT_Eventdate))}}</strong></p>
                            <p class="m-0">Total Member To be attend:<strong>{{$allevents->Total_memb_attend}}</strong></p>
                            <p class="m-0">About Event:<br/>{!! html_entity_decode ($allevents->vch_eventdetails) !!}</strong></p>
                        </div>
                    @endforeach
                </div>

@php

$apply_member=count(App\Models\eventmanagement::where('INT_eventID',$allevents->id)->get());

$total_member=$allevents->Total_memb_attend;

$percentage=($apply_member / 100) * $total_member;
$reaminingseats=$total_member-$apply_member;

@endphp




                <div class="col-md-12">
                    <div class="progress hg_23">
                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{$percentage}}%;" aria-valuenow="{{$percentage}}" aria-valuemin="0" aria-valuemax="{{$total_member}}">{{$percentage}}%</div>
                    </div>
                </div>
                <div class="row" style="margin-top:15px;">
                    <div class="col-md-12" style="margin-bottom:15px;">
                        <h1 class="text-center" style="font-size: 23px;">Hurry up!! <span>{{$reaminingseats}} seats  left</span></h1>
                    </div>
                    <form class="form form-horizontal col-md-12 col-sm-12 col-12" method="post" action="{{url('event_registration_insert')}}" enctype="multipart/form-data">
                       @csrf
                       @foreach($evenstsall as $allevents)
                       <input type="hidden" name="id" value="{{$allevents->id}}">
                       @endforeach
                         <div class="row m_0">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <label for="applicant_name" class="control-label col-sm-3 fz_14">FullName:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="fullnametxt" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="applicant_name" class="control-label col-sm-3 fz_14">Membership No:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="membershipnotxt" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="applicant_name" class="control-label col-sm-3 fz_14">Email-Id:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="emailidtxt" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <label for="applicant_name" class="control-label col-sm-3 fz_14">Phone No:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="mobilenotxt" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="applicant_name" class="control-label col-sm-3 fz_14">Gender:</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="pgenderddl" required>
                                                <option>------Select------</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="applicant_name" class="control-label col-sm-3 fz_14">Fee:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="feetxt" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


        

</body>

</html>   