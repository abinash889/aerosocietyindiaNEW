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
    </style>
</head>

<body>
    <section>
        <div class="container m_t m_b">
            <div class="card">
                <div class="card-body">
                    <h1 class="fnt_sz">All Events</h1>
                </div>
                <div class="row">
                    <form class="form form-horizontal col-md-12 col-sm-12 col-12" method="post" action="" enctype="multipart/form-data">
                        <div class="row m_0">
                            @foreach($eventresult as $eresult)
                            
                                <div class="col-md-3">
                                <a href="{{url('/event/'.$eresult->VCH_eventslogname)}}" style="color:black;text-decoration:none;">
                                    <img src="{{url('/Upload_DBImage',$eresult->vch_image)}}" class="img-fluid">
                                    <p>{{$eresult->vch_eventname}}</p>
                                    <p class="m-0">Event Date:<strong>{{date("F jS, Y", strtotime($eresult->DT_Eventdate))}}</strong></p>
                                    <p>Total Member to be Attend: <strong>{{$eresult->Total_memb_attend}}</strong></p>
                                    </a>
                                </div>
                            
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


        

</body>

</html>   