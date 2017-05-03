<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../recources/images/apple-icon.png">
        <link rel="icon" type="image/png" href="../recources/images/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Sign up</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- CSS Files -->
        <link href="../recources/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../recources/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href= "../recources/css/demo.css" rel="stylesheet" />
    </head>

    <body>
        <?php
        //     session_destroy();
        $massage = ""; // for username hint
        $massage2 = ""; // for emai  hint

        if (isset($_GET['errors'])) {

            if ($_GET['errors'] == "usernameerror")
                $massage = "This Username is Already Exist !";

            else if ($_GET['errors'] == "emailerror") {
                $massage2 = "This Email is Already Exist !";
            }
        }
        ?>

        <div class="image-container set-full-height" style="background-image: url('../recources/images/')">

            <!--   Big container   -->
            <div class="container">

                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">

                        <!--      Wizard container        -->
                        <div class="wizard-container">

                            <div class="card wizard-card" data-color="orange" id="wizardProfile">
                                <form action="UserTypeDriver.php" method="POST" enctype="multipart/form-data">
                                    <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                                    <div class="wizard-Header">
                                        <h3>
                                            <b>BUILD</b> YOUR PROFILE <br>
                                            <small>This information will let us know more about you.</small>
                                        </h3>
                                    </div>

                                    <div class="wizard-navigation">
                                        <ul>
                                            <li><a id="link"  href="#about" data-toggle="tab">About</a></li> 
                                            <li><a id="link2" href="#account"  data-toggle="tab">Account</a></li>
                                            <li><a id="link3" href="#address" data-toggle="tab">Info</a></li>
                                        </ul>

                                    </div>
                                    <div class="tab-content">

                                        <div class="tab-pane" id="about">
                                            <div class="row">
                                                <br>    <div class="col-sm-4 col-sm-offset-1">
                                                    <div class="picture-container">

                                                        <br>
                                                        <div class="picture">
                                                            <img src="../recources/images/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                                            <input type="file" name="image" id="image">
                                                        </div>
                                                        <h6>Choose Picture</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Username  <small>(required)</small>
                                                        </label>
                                                        <input name="username"    type="text" class="form-control" placeholder="Enter Your Username" required="required">

                                                        <small style="color: #ff0000">  <?php echo '   ' . $massage; ?>   </small>
                                                    </div>


                                                    <div class="form-group">
                                                        <label>Email <small>(required)</small></label>
                                                        <input class="form-control" class="form-control" placeholder="Example@example"   type="email" name="email" required />
                                                        <small class="" style="color: #ff0000">  <?php echo '   ' . $massage2; ?>   </small>
                                                    </div>

                                                    <label>Password <small>(required)</small>  </label> </b><br>

                                                    <input id="password" class="form-control" class="form-control"  placeholder="Password"   type="password" name="password" required onkeyup="checkPass(); return false;">
                                                    <span id="confirmMessage" class="confirmMessage"></span>


                                                    <br>
                                                    <label>Repeat Password <small>(required)</small>  </label> </b><br>
                                                    <input id="confirm_password" class="form-control" type="password" placeholder="Repeat Password "  name="repeat_password" required onkeyup="checkPass(); return false;">
                                                    <span id="confirmMessage2" class="confirmMessage"></span>


                                                    <script type="text/javascript">
                                                        function checkPass()
                                                        {
                                                            //Store the password field objects into variables ...
                                                            var pass1 = document.getElementById('password');
                                                            var pass2 = document.getElementById('confirm_password');
                                                            //Store the Confimation Message Object ...
                                                            var message = document.getElementById('confirmMessage');
                                                            var message2 = document.getElementById('confirmMessage2');
                                                            //Set the colors we will be using ...
                                                            var goodColor = "#66cc66";
                                                            var badColor = "#ff6666";
                                                            var white = "#ffffff";
                                                            //Compare the values in the password field 
                                                            //and the confirmation field
                                                            if (pass1.value == "" || pass2.value == "") {

                                                                message.style.color = white;
                                                                message2.style.color = white;
                                                                message.innerHTML = ""
                                                                message2.innerHTML = ""

                                                            } else if (pass1.value == pass2.value) {
                                                                //The passwords match. 
                                                                //Set the color to the good color and inform
                                                                //the user that they have entered the correct password 
                                                                document.getElementById("next").disabled = false;
                                                                pass1.style.backgroundColor = goodColor;
                                                                pass2.style.backgroundColor = goodColor;
                                                                message.style.color = goodColor;
                                                                message2.style.color = goodColor;
                                                                message.innerHTML = "Passwords Match!"
                                                                message2.innerHTML = "Passwords Match!"
                                                                document.getElementById("next").disabled = false;
                                                                document.getElementById("link2").disabled = false;
                                                                document.getElementById("link3").disabled = false;
                                                            } else {
                                                                //The passwords do not match.
                                                                //Set the color to the bad color and
                                                                //notify the user.
                                                                document.getElementById("next").disabled = true;
                                                                document.getElementById("link2").disabled = true;
                                                                document.getElementById("link3").disabled = true;
                                                                pass1.style.backgroundColor = badColor;
                                                                pass2.style.backgroundColor = badColor;
                                                                message.style.color = badColor;
                                                                message2.style.color = badColor;
                                                                message.innerHTML = "Passwords Do Not Match!"
                                                                message2.innerHTML = "Passwords Do Not Match!"
                                                            }
                                                        }
                                                    </script>
                                                </div>

                                            </div>
                                        </div> 
                                        <div  class="tab-pane" id="account">
                                            <h4 class="info-text"> What are you doing ? </h4>
                                            <div class="row">


                                                <input type="radio" name="type" value="doctor">

                                                <div class="icon">
                                                    <i class="fa fa-terminal"></i>
                                                </div>

                                                <h6>Maker</h6>

                                                <input type="radio" name="type" value="student" >
                                                <div class="icon">
                                                    <i class="fa fa-laptop"></i>
                                                </div>
                                                <h6>Solver</h6>



                                            </div>
                                        </div>

                                        <div class="tab-pane" id="address">
                                            <div class="row">
                                                <div class="col-sm-10 col-sm-offset-1">

                                                    <div class="col-lg-10">

                                                        <input type="radio" name="gender" value="male" > Male
                                                        <input type="radio" name="gender" value="female"> Female

                                                        <br>
                                                        <br>
                                                        <label>Birth Day<small></small></label>
                                                        <input class="form-control" type="date" placeholder="Enter Your Birth Date"  required name="birth_day">
                                                        <br>
                                                        <label>Phone <small></small></label>
                                                        <input  class="form-control" type="tel"  required placeholder="Enter Your Phone Number" name="phone" >
                                                        <br>

                                                        <label>University <small></small></label>
                                                        <input  class="form-control" type="text" placeholder="Enter Your University" name="university" required>
                                                        <br>

                                                        <label>Faculty <small></small></label>
                                                        <input   class="form-control" type="text" placeholder="Enter Your Faculty" name="faculty" required="">
                                                        <br>
                                                        <label>Country</label>

                                                        <select  class="form-control" name="country" class="form-control" required="">

                                                            <option value="Afghanistan">Afghanistan</option>
                                                            <option value="Albania">Albania</option>
                                                            <option value="Algeria">Algeria</option>
                                                            <option value="American Samoa">American Samoa</option>
                                                            <option value="Andorra">Andorra</option>
                                                            <option value="Angola">Angola</option>
                                                            <option value="Anguilla">Anguilla</option>
                                                            <option value="Antartica">Antarctica</option>
                                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                            <option value="Argentina">Argentina</option>
                                                            <option value="Armenia">Armenia</option>
                                                            <option value="Aruba">Aruba</option>
                                                            <option value="Australia">Australia</option>
                                                            <option value="Austria">Austria</option>
                                                            <option value="Azerbaijan">Azerbaijan</option>
                                                            <option value="Bahamas">Bahamas</option>
                                                            <option value="Bahrain">Bahrain</option>
                                                            <option value="Bangladesh">Bangladesh</option>
                                                            <option value="Barbados">Barbados</option>
                                                            <option value="Belarus">Belarus</option>
                                                            <option value="Belgium">Belgium</option>
                                                            <option value="Belize">Belize</option>
                                                            <option value="Benin">Benin</option>
                                                            <option value="Bermuda">Bermuda</option>
                                                            <option value="Bhutan">Bhutan</option>
                                                            <option value="Bolivia">Bolivia</option>
                                                            <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                                            <option value="Botswana">Botswana</option>
                                                            <option value="Bouvet Island">Bouvet Island</option>
                                                            <option value="Brazil">Brazil</option>
                                                            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                            <option value="Bulgaria">Bulgaria</option>
                                                            <option value="Burkina Faso">Burkina Faso</option>
                                                            <option value="Burundi">Burundi</option>
                                                            <option value="Cambodia">Cambodia</option>
                                                            <option value="Cameroon">Cameroon</option>
                                                            <option value="Canada">Canada</option>
                                                            <option value="Cape Verde">Cape Verde</option>
                                                            <option value="Cayman Islands">Cayman Islands</option>
                                                            <option value="Central African Republic">Central African Republic</option>
                                                            <option value="Chad">Chad</option>
                                                            <option value="Chile">Chile</option>
                                                            <option value="China">China</option>
                                                            <option value="Christmas Island">Christmas Island</option>
                                                            <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                                            <option value="Colombia">Colombia</option>
                                                            <option value="Comoros">Comoros</option>
                                                            <option value="Congo">Congo</option>
                                                            <option value="Congo">Congo, the Democratic Republic of the</option>
                                                            <option value="Cook Islands">Cook Islands</option>
                                                            <option value="Costa Rica">Costa Rica</option>
                                                            <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                                            <option value="Croatia">Croatia (Hrvatska)</option>
                                                            <option value="Cuba">Cuba</option>
                                                            <option value="Cyprus">Cyprus</option>
                                                            <option value="Czech Republic">Czech Republic</option>
                                                            <option value="Denmark">Denmark</option>
                                                            <option value="Djibouti">Djibouti</option>
                                                            <option value="Dominica">Dominica</option>
                                                            <option value="Dominican Republic">Dominican Republic</option>
                                                            <option value="East Timor">East Timor</option>
                                                            <option value="Ecuador">Ecuador</option>
                                                            <option value="Egypt">Egypt</option>
                                                            <option value="El Salvador">El Salvador</option>
                                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                            <option value="Eritrea">Eritrea</option>
                                                            <option value="Estonia">Estonia</option>
                                                            <option value="Ethiopia">Ethiopia</option>
                                                            <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                                            <option value="Faroe Islands">Faroe Islands</option>
                                                            <option value="Fiji">Fiji</option>
                                                            <option value="Finland">Finland</option>
                                                            <option value="France">France</option>
                                                            <option value="France Metropolitan">France, Metropolitan</option>
                                                            <option value="French Guiana">French Guiana</option>
                                                            <option value="French Polynesia">French Polynesia</option>
                                                            <option value="French Southern Territories">French Southern Territories</option>
                                                            <option value="Gabon">Gabon</option>
                                                            <option value="Gambia">Gambia</option>
                                                            <option value="Georgia">Georgia</option>
                                                            <option value="Germany">Germany</option>
                                                            <option value="Ghana">Ghana</option>
                                                            <option value="Gibraltar">Gibraltar</option>
                                                            <option value="Greece">Greece</option>
                                                            <option value="Greenland">Greenland</option>
                                                            <option value="Grenada">Grenada</option>
                                                            <option value="Guadeloupe">Guadeloupe</option>
                                                            <option value="Guam">Guam</option>
                                                            <option value="Guatemala">Guatemala</option>
                                                            <option value="Guinea">Guinea</option>
                                                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                            <option value="Guyana">Guyana</option>
                                                            <option value="Haiti">Haiti</option>
                                                            <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                                                            <option value="Holy See">Holy See (Vatican City State)</option>
                                                            <option value="Honduras">Honduras</option>
                                                            <option value="Hong Kong">Hong Kong</option>
                                                            <option value="Hungary">Hungary</option>
                                                            <option value="Iceland">Iceland</option>
                                                            <option value="India">India</option>
                                                            <option value="Indonesia">Indonesia</option>
                                                            <option value="Iran">Iran (Islamic Republic of)</option>
                                                            <option value="Iraq">Iraq</option>
                                                            <option value="Ireland">Ireland</option>
                                                            <option value="Israel">Israel</option>
                                                            <option value="Italy">Italy</option>
                                                            <option value="Jamaica">Jamaica</option>
                                                            <option value="Japan">Japan</option>
                                                            <option value="Jordan">Jordan</option>
                                                            <option value="Kazakhstan">Kazakhstan</option>
                                                            <option value="Kenya">Kenya</option>
                                                            <option value="Kiribati">Kiribati</option>
                                                            <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                                                            <option value="Korea">Korea, Republic of</option>
                                                            <option value="Kuwait">Kuwait</option>
                                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                            <option value="Lao">Lao People's Democratic Republic</option>
                                                            <option value="Latvia">Latvia</option>
                                                            <option value="Lebanon" selected>Lebanon</option>
                                                            <option value="Lesotho">Lesotho</option>
                                                            <option value="Liberia">Liberia</option>
                                                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                            <option value="Liechtenstein">Liechtenstein</option>
                                                            <option value="Lithuania">Lithuania</option>
                                                            <option value="Luxembourg">Luxembourg</option>
                                                            <option value="Macau">Macau</option>
                                                            <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                                                            <option value="Madagascar">Madagascar</option>
                                                            <option value="Malawi">Malawi</option>
                                                            <option value="Malaysia">Malaysia</option>
                                                            <option value="Maldives">Maldives</option>
                                                            <option value="Mali">Mali</option>
                                                            <option value="Malta">Malta</option>
                                                            <option value="Marshall Islands">Marshall Islands</option>
                                                            <option value="Martinique">Martinique</option>
                                                            <option value="Mauritania">Mauritania</option>
                                                            <option value="Mauritius">Mauritius</option>
                                                            <option value="Mayotte">Mayotte</option>
                                                            <option value="Mexico">Mexico</option>
                                                            <option value="Micronesia">Micronesia, Federated States of</option>
                                                            <option value="Moldova">Moldova, Republic of</option>
                                                            <option value="Monaco">Monaco</option>
                                                            <option value="Mongolia">Mongolia</option>
                                                            <option value="Montserrat">Montserrat</option>
                                                            <option value="Morocco">Morocco</option>
                                                            <option value="Mozambique">Mozambique</option>
                                                            <option value="Myanmar">Myanmar</option>
                                                            <option value="Namibia">Namibia</option>
                                                            <option value="Nauru">Nauru</option>
                                                            <option value="Nepal">Nepal</option>
                                                            <option value="Netherlands">Netherlands</option>
                                                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                            <option value="New Caledonia">New Caledonia</option>
                                                            <option value="New Zealand">New Zealand</option>
                                                            <option value="Nicaragua">Nicaragua</option>
                                                            <option value="Niger">Niger</option>
                                                            <option value="Nigeria">Nigeria</option>
                                                            <option value="Niue">Niue</option>
                                                            <option value="Norfolk Island">Norfolk Island</option>
                                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                            <option value="Norway">Norway</option>
                                                            <option value="Oman">Oman</option>
                                                            <option value="Pakistan">Pakistan</option>
                                                            <option value="Palau">Palau</option>
                                                            <option value="Panama">Panama</option>
                                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                                            <option value="Paraguay">Paraguay</option>
                                                            <option value="Peru">Peru</option>
                                                            <option value="Philippines">Philippines</option>
                                                            <option value="Pitcairn">Pitcairn</option>
                                                            <option value="Poland">Poland</option>
                                                            <option value="Portugal">Portugal</option>
                                                            <option value="Puerto Rico">Puerto Rico</option>
                                                            <option value="Qatar">Qatar</option>
                                                            <option value="Reunion">Reunion</option>
                                                            <option value="Romania">Romania</option>
                                                            <option value="Russia">Russian Federation</option>
                                                            <option value="Rwanda">Rwanda</option>
                                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                                                            <option value="Saint LUCIA">Saint LUCIA</option>
                                                            <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                                            <option value="Samoa">Samoa</option>
                                                            <option value="San Marino">San Marino</option>
                                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
                                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                                            <option value="Senegal">Senegal</option>
                                                            <option value="Seychelles">Seychelles</option>
                                                            <option value="Sierra">Sierra Leone</option>
                                                            <option value="Singapore">Singapore</option>
                                                            <option value="Slovakia">Slovakia (Slovak Republic)</option>
                                                            <option value="Slovenia">Slovenia</option>
                                                            <option value="Solomon Islands">Solomon Islands</option>
                                                            <option value="Somalia">Somalia</option>
                                                            <option value="South Africa">South Africa</option>
                                                            <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                                                            <option value="Span">Spain</option>
                                                            <option value="SriLanka">Sri Lanka</option>
                                                            <option value="St. Helena">St. Helena</option>
                                                            <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                                                            <option value="Sudan">Sudan</option>
                                                            <option value="Suriname">Suriname</option>
                                                            <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                                                            <option value="Swaziland">Swaziland</option>
                                                            <option value="Sweden">Sweden</option>
                                                            <option value="Switzerland">Switzerland</option>
                                                            <option value="Syria">Syrian Arab Republic</option>
                                                            <option value="Taiwan">Taiwan, Province of China</option>
                                                            <option value="Tajikistan">Tajikistan</option>
                                                            <option value="Tanzania">Tanzania, United Republic of</option>
                                                            <option value="Thailand">Thailand</option>
                                                            <option value="Togo">Togo</option>
                                                            <option value="Tokelau">Tokelau</option>
                                                            <option value="Tonga">Tonga</option>
                                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                            <option value="Tunisia">Tunisia</option>
                                                            <option value="Turkey">Turkey</option>
                                                            <option value="Turkmenistan">Turkmenistan</option>
                                                            <option value="Turks and Caicos">Turks and Caicos Islands</option>
                                                            <option value="Tuvalu">Tuvalu</option>
                                                            <option value="Uganda">Uganda</option>
                                                            <option value="Ukraine">Ukraine</option>
                                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                                            <option value="United Kingdom">United Kingdom</option>
                                                            <option value="United States">United States</option>
                                                            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                            <option value="Uruguay">Uruguay</option>
                                                            <option value="Uzbekistan">Uzbekistan</option>
                                                            <option value="Vanuatu">Vanuatu</option>
                                                            <option value="Venezuela">Venezuela</option>
                                                            <option value="Vietnam">Viet Nam</option>
                                                            <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                                            <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                                            <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                                                            <option value="Western Sahara">Western Sahara</option>
                                                            <option value="Yemen">Yemen</option>
                                                            <option value="Yugoslavia">Yugoslavia</option>
                                                            <option value="Zambia">Zambia</option>
                                                            <option value="Zimbabwe">Zimbabwe</option>
                                                        </select>


                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <br>                                        <br>
                                    </div>
                                    <div class="wizard-footer height-wizard">
                                        <div class="pull-right">
                                            <input  id="next" type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' style="font-weight: bold;"name='next' value='Next' />
                                            <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Finish' />
                                        </div>

                                        <div class="pull-left">
                                            <input  type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                </form>
                            </div>
                        </div> <!-- wizard container -->
                    </div>

                </div><!-- end row -->

            </div> <!--  big container -->


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
