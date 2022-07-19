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
                    <h1 class="fnt_sz">Event Registration</h1>
                </div>
                <div class="row">
                    <form class="form form-horizontal col-md-12 col-sm-12 col-12" method="post" action="" enctype="multipart/form-data">
                        <div class="row m_0">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <label for="applicant_name" class="control-label col-sm-3 fz_14">FullName:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="fullnametxt" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="applicant_name" class="control-label col-sm-3 fz_14">Membership No:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="membershipnotxt" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="applicant_name" class="control-label col-sm-3 fz_14">Email-Id:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="emailidtxt" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <label for="applicant_name" class="control-label col-sm-3 fz_14">Phone No:</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="mobilenotxt" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label for="applicant_name" class="control-label col-sm-3 fz_14">Gender:</label>
                                        <div class="col-sm-9">
                                            <select class="form-control">
                                                <option>------Select------</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Others</option>
                                            </select>
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