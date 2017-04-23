<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../recources/images/apple-icon.png">
        <link rel="icon" type="image/png" href="../recources/images/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Get Shit Done Bootstrap Wizard by Creative Tim</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- CSS Files -->
        <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href= "../recources/css/demo.css" rel="stylesheet" />
    </head>

    <body>


        <div class="image-container set-full-height" style="background-image: url('img/wizard.jpg')">

            <!--   Big container   -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">

                        <!--      Wizard container        -->
                        <div class="wizard-container">

                            <div class="card wizard-card" data-color="orange" id="wizardProfile">
                                <form action="" method="">
                                    <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->




                                    <div class="tab-pane" id="about">
                                        <div class="row">
                                            <br>    <div class="col-sm-4 col-sm-offset-1">
                                                <div class="picture-container">

                                                    <br>
                                                    <div class="picture">
                                                        <img src="../recources/images/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                                        <input type="file" id="image">
                                                    </div>
                                                    <h6>Choose Picture</h6>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Username </label>
                                                    <input name="username"  value="ahmed@sd"  type="text" class="form-control" >
                                                </div>


                                                <label>Email </label>
                                                <input class="form-control" class="form-control" name="email" />


                                                <br>
                                                <label>Birth Day</label>
                                                <input class="form-control" type="text" name="birth_day">
                                                <br>
                                                <label>Phone </label>
                                                <input class="form-control"  name="phone">
                                                <br>

                                                <label>University </label>
                                                <input class="form-control" name="university">
                                                <br>

                                                <label>Faculty </label>
                                                <input class="form-control" name="faculty">
                                                <br>
                                                <label>Country</label>
                                                <input class="form-control" name="phone">
                                                <br>

                                            </div>
                                        </div>

                                    </div>
                            </div>

                        </div>
                    </div>




                </div>

                </body>

                <!--   Core JS Files   -->
                <script src="../recources/js/jquery-2.2.4.min.js" type="text/javascript"></script>
                <script src="../recources/js/bootstrap.min.js" type="text/javascript"></script>
                <script src="../recources/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

                <!--  Plugin for the Wizard -->
                <script src="../recources/js/gsdk-bootstrap-wizard.js"></script>

                <!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
                <script src="../recources/js/jquery.validate.min.js"></script>

                </html>
