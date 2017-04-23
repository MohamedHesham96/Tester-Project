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
        <div class="image-container set-full-height" style="background-image: url('../recources/images/wizard.jpg')">


            <!--   Big container   -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">

                        <!--      Wizard container        -->
                        <div class="wizard-container">

                            <div class="card wizard-card" data-color="orange" id="wizardProfile">
                                <form action="" method="">
                                    <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                                    <div class="wizard-header">
                                        <h3>
                                            <b>BUILD</b> YOUR PROFILE <br>
                                            <small>This information will let us know more about you.</small>
                                        </h3>
                                    </div>

                                    <div class="wizard-navigation">
                                        <ul>
                                            <li><a href="#about" data-toggle="tab">About</a></li> 
                                            <li><a href="#account" data-toggle="tab">Account</a></li>
                                            <li><a href="#address" data-toggle="tab">Address</a></li>
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
                                                           <input type="file" id="image">
                                                        </div>
                                                        <h6>Choose Picture</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Username <small>(required)</small></label>
                                                        <input name="username"  value="ahmed@sd"  type="text" class="form-control" placeholder="Enter Your Username">
                                                    </div>


                                                    <div class="form-group">
                                                        <label>Email <small>(required)</small></label>
                                                        <input class="form-control" class="form-control" placeholder="Enter Your Email" value="ahmed@sd"  type="email" name="name" required />
                                                    </div>
                                               
                                                    <label>Password <small>(required)</small>  </label> </b><br>

                                                    <input class="form-control" class="form-control"  placeholder="Password" value="ahmed@sd"  type="password" name="password" required />

                                                    <br>
                                                    <label>Repeat Password <small>(required)</small>  </label> </b><br>
                                                    <input class="form-control" type="password" placeholder="Repeat Password "value="ahmed@sd"  name="psw-repeat" required>
                                                    <br>

                                                </div>

                                            </div>
                                        </div>




                                        <div  class="tab-pane" id="account">
                                            <h4 class="info-text"> What are you doing ? (checkboxes) </h4>
                                            <div class="row">

                                                <div class="col-sm-10 col-sm-offset-1">

                                                    <div class="col-sm-4">
                                                        <div class="choice" data-toggle="wizard-checkbox">
                                                            <input type="checkbox" name="type" value="solver">
                                                            <div class="icon">
                                                                <i class="fa fa-terminal"></i>
                                                            </div>
                                                            <h6>Solver</h6>
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="choice" data-toggle="wizard-checkbox">
                                                            <input type="checkbox" name="type" value="maker">
                                                            <div class="icon">
                                                                <i class="fa fa-laptop"></i>
                                                            </div>
                                                            <h6>Maker</h6>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>




                                        <div class="tab-pane" id="address">
                                            <div class="row">
                                                <div class="col-sm-10 col-sm-offset-1">

                                                    <input  type="radio" name="gender" value="male"> Male
                                                    <input type="radio" name="gender" value="female"> Female

                                                    <br>
                                                    <br>
                                                    <label>Birth Day<small></small></label>
                                                    <input class="form-control" type="date" placeholder="Enter Your Birth Date"  name="birth_day">
                                                    <br>
                                                    <label>Phone <small></small></label>
                                                    <input class="form-control" type="tel" placeholder="Enter Your Phone Number" name="phone">
                                                    <br>

                                                    <label>University <small></small></label>
                                                    <input class="form-control" type="text" placeholder="Enter Your University" name="university">
                                                    <br>

                                                    <label>Faculty <small></small></label>
                                                    <input class="form-control" type="text" placeholder="Enter Your Faculty" name="faculty">
                                                    <br>
                                                    <label>Country</label>

                                                    <select  class="form-control" name="Your country" class="form-control">

                                                        <option value="">Country...</option>
                                                        <option value="AF">Afghanistan</option>
                                                        <option value="AL">Albania</option>
                                                        <option value="DZ">Algeria</option>
                                                        <option value="AS">American Samoa</option>
                                                        <option value="AD">Andorra</option>
                                                        <option value="AG">Angola</option>
                                                        <option value="AI">Anguilla</option>
                                                        <option value="AG">Antigua &amp; Barbuda</option>
                                                        <option value="AR">Argentina</option>
                                                        <option value="AA">Armenia</option>
                                                        <option value="AW">Aruba</option>
                                                        <option value="AU">Australia</option>
                                                        <option value="AT">Austria</option>
                                                        <option value="AZ">Azerbaijan</option>
                                                        <option value="BS">Bahamas</option>
                                                        <option value="BH">Bahrain</option>
                                                        <option value="BD">Bangladesh</option>
                                                        <option value="BB">Barbados</option>
                                                        <option value="BY">Belarus</option>
                                                        <option value="BE">Belgium</option>
                                                        <option value="BZ">Belize</option>
                                                        <option value="BJ">Benin</option>
                                                        <option value="BM">Bermuda</option>
                                                        <option value="BT">Bhutan</option>
                                                        <option value="BO">Bolivia</option>
                                                        <option value="BL">Bonaire</option>
                                                        <option value="BA">Bosnia &amp; Herzegovina</option>
                                                        <option value="BW">Botswana</option>
                                                        <option value="BR">Brazil</option>
                                                        <option value="BC">British Indian Ocean Ter</option>
                                                        <option value="BN">Brunei</option>
                                                        <option value="BG">Bulgaria</option>
                                                        <option value="BF">Burkina Faso</option>
                                                        <option value="BI">Burundi</option>
                                                        <option value="KH">Cambodia</option>
                                                        <option value="CM">Cameroon</option>
                                                        <option value="CA">Canada</option>
                                                        <option value="IC">Canary Islands</option>
                                                        <option value="CV">Cape Verde</option>
                                                        <option value="KY">Cayman Islands</option>
                                                        <option value="CF">Central African Republic</option>
                                                        <option value="TD">Chad</option>
                                                        <option value="CD">Channel Islands</option>
                                                        <option value="CL">Chile</option>
                                                        <option value="CN">China</option>
                                                        <option value="CI">Christmas Island</option>
                                                        <option value="CS">Cocos Island</option>
                                                        <option value="CO">Colombia</option>
                                                        <option value="CC">Comoros</option>
                                                        <option value="CG">Congo</option>
                                                        <option value="CK">Cook Islands</option>
                                                        <option value="CR">Costa Rica</option>
                                                        <option value="CT">Cote D'Ivoire</option>
                                                        <option value="HR">Croatia</option>
                                                        <option value="CU">Cuba</option>
                                                        <option value="CB">Curacao</option>
                                                        <option value="CY">Cyprus</option>
                                                        <option value="CZ">Czech Republic</option>
                                                        <option value="DK">Denmark</option>
                                                        <option value="DJ">Djibouti</option>
                                                        <option value="DM">Dominica</option>
                                                        <option value="DO">Dominican Republic</option>
                                                        <option value="TM">East Timor</option>
                                                        <option value="EC">Ecuador</option>
                                                        <option value="EG">Egypt</option>
                                                        <option value="SV">El Salvador</option>
                                                        <option value="GQ">Equatorial Guinea</option>
                                                        <option value="ER">Eritrea</option>
                                                        <option value="EE">Estonia</option>
                                                        <option value="ET">Ethiopia</option>
                                                        <option value="FA">Falkland Islands</option>
                                                        <option value="FO">Faroe Islands</option>
                                                        <option value="FJ">Fiji</option>
                                                        <option value="FI">Finland</option>
                                                        <option value="FR">France</option>
                                                        <option value="GF">French Guiana</option>
                                                        <option value="PF">French Polynesia</option>
                                                        <option value="FS">French Southern Ter</option>
                                                        <option value="GA">Gabon</option>
                                                        <option value="GM">Gambia</option>
                                                        <option value="GE">Georgia</option>
                                                        <option value="DE">Germany</option>
                                                        <option value="GH">Ghana</option>
                                                        <option value="GI">Gibraltar</option>
                                                        <option value="GB">Great Britain</option>
                                                        <option value="GR">Greece</option>
                                                        <option value="GL">Greenland</option>
                                                        <option value="GD">Grenada</option>
                                                        <option value="GP">Guadeloupe</option>
                                                        <option value="GU">Guam</option>
                                                        <option value="GT">Guatemala</option>
                                                        <option value="GN">Guinea</option>
                                                        <option value="GY">Guyana</option>
                                                        <option value="HT">Haiti</option>
                                                        <option value="HW">Hawaii</option>
                                                        <option value="HN">Honduras</option>
                                                        <option value="HK">Hong Kong</option>
                                                        <option value="HU">Hungary</option>
                                                        <option value="IS">Iceland</option>
                                                        <option value="IN">India</option>
                                                        <option value="ID">Indonesia</option>
                                                        <option value="IA">Iran</option>
                                                        <option value="IQ">Iraq</option>
                                                        <option value="IR">Ireland</option>
                                                        <option value="IM">Isle of Man</option>
                                                        <option value="IL">Israel</option>
                                                        <option value="IT">Italy</option>
                                                        <option value="JM">Jamaica</option>
                                                        <option value="JP">Japan</option>
                                                        <option value="JO">Jordan</option>
                                                        <option value="KZ">Kazakhstan</option>
                                                        <option value="KE">Kenya</option>
                                                        <option value="KI">Kiribati</option>
                                                        <option value="NK">Korea North</option>
                                                        <option value="KS">Korea South</option>
                                                        <option value="KW">Kuwait</option>
                                                        <option value="KG">Kyrgyzstan</option>
                                                        <option value="LA">Laos</option>
                                                        <option value="LV">Latvia</option>
                                                        <option value="LB">Lebanon</option>
                                                        <option value="LS">Lesotho</option>
                                                        <option value="LR">Liberia</option>
                                                        <option value="LY">Libya</option>
                                                        <option value="LI">Liechtenstein</option>
                                                        <option value="LT">Lithuania</option>
                                                        <option value="LU">Luxembourg</option>
                                                        <option value="MO">Macau</option>
                                                        <option value="MK">Macedonia</option>
                                                        <option value="MG">Madagascar</option>
                                                        <option value="MY">Malaysia</option>
                                                        <option value="MW">Malawi</option>
                                                        <option value="MV">Maldives</option>
                                                        <option value="ML">Mali</option>
                                                        <option value="MT">Malta</option>
                                                        <option value="MH">Marshall Islands</option>
                                                        <option value="MQ">Martinique</option>
                                                        <option value="MR">Mauritania</option>
                                                        <option value="MU">Mauritius</option>
                                                        <option value="ME">Mayotte</option>
                                                        <option value="MX">Mexico</option>
                                                        <option value="MI">Midway Islands</option>
                                                        <option value="MD">Moldova</option>
                                                        <option value="MC">Monaco</option>
                                                        <option value="MN">Mongolia</option>
                                                        <option value="MS">Montserrat</option>
                                                        <option value="MA">Morocco</option>
                                                        <option value="MZ">Mozambique</option>
                                                        <option value="MM">Myanmar</option>
                                                        <option value="NA">Nambia</option>
                                                        <option value="NU">Nauru</option>
                                                        <option value="NP">Nepal</option>
                                                        <option value="AN">Netherland Antilles</option>
                                                        <option value="NL">Netherlands (Holland, Europe)</option>
                                                        <option value="NV">Nevis</option>
                                                        <option value="NC">New Caledonia</option>
                                                        <option value="NZ">New Zealand</option>
                                                        <option value="NI">Nicaragua</option>
                                                        <option value="NE">Niger</option>
                                                        <option value="NG">Nigeria</option>
                                                        <option value="NW">Niue</option>
                                                        <option value="NF">Norfolk Island</option>
                                                        <option value="NO">Norway</option>
                                                        <option value="OM">Oman</option>
                                                        <option value="PK">Pakistan</option>
                                                        <option value="PW">Palau Island</option>
                                                        <option value="PS">Palestine</option>
                                                        <option value="PA">Panama</option>
                                                        <option value="PG">Papua New Guinea</option>
                                                        <option value="PY">Paraguay</option>
                                                        <option value="PE">Peru</option>
                                                        <option value="PH">Philippines</option>
                                                        <option value="PO">Pitcairn Island</option>
                                                        <option value="PL">Poland</option>
                                                        <option value="PT">Portugal</option>
                                                        <option value="PR">Puerto Rico</option>
                                                        <option value="QA">Qatar</option>
                                                        <option value="ME">Republic of Montenegro</option>
                                                        <option value="RS">Republic of Serbia</option>
                                                        <option value="RE">Reunion</option>
                                                        <option value="RO">Romania</option>
                                                        <option value="RU">Russia</option>
                                                        <option value="RW">Rwanda</option>
                                                        <option value="NT">St Barthelemy</option>
                                                        <option value="EU">St Eustatius</option>
                                                        <option value="HE">St Helena</option>
                                                        <option value="KN">St Kitts-Nevis</option>
                                                        <option value="LC">St Lucia</option>
                                                        <option value="MB">St Maarten</option>
                                                        <option value="PM">St Pierre &amp; Miquelon</option>
                                                        <option value="VC">St Vincent &amp; Grenadines</option>
                                                        <option value="SP">Saipan</option>
                                                        <option value="SO">Samoa</option>
                                                        <option value="AS">Samoa American</option>
                                                        <option value="SM">San Marino</option>
                                                        <option value="ST">Sao Tome &amp; Principe</option>
                                                        <option value="SA">Saudi Arabia</option>
                                                        <option value="SN">Senegal</option>
                                                        <option value="RS">Serbia</option>
                                                        <option value="SC">Seychelles</option>
                                                        <option value="SL">Sierra Leone</option>
                                                        <option value="SG">Singapore</option>
                                                        <option value="SK">Slovakia</option>
                                                        <option value="SI">Slovenia</option>
                                                        <option value="SB">Solomon Islands</option>
                                                        <option value="OI">Somalia</option>
                                                        <option value="ZA">South Africa</option>
                                                        <option value="ES">Spain</option>
                                                        <option value="LK">Sri Lanka</option>
                                                        <option value="SD">Sudan</option>
                                                        <option value="SR">Suriname</option>
                                                        <option value="SZ">Swaziland</option>
                                                        <option value="SE">Sweden</option>
                                                        <option value="CH">Switzerland</option>
                                                        <option value="SY">Syria</option>
                                                        <option value="TA">Tahiti</option>
                                                        <option value="TW">Taiwan</option>
                                                        <option value="TJ">Tajikistan</option>
                                                        <option value="TZ">Tanzania</option>
                                                        <option value="TH">Thailand</option>
                                                        <option value="TG">Togo</option>
                                                        <option value="TK">Tokelau</option>
                                                        <option value="TO">Tonga</option>
                                                        <option value="TT">Trinidad &amp; Tobago</option>
                                                        <option value="TN">Tunisia</option>
                                                        <option value="TR">Turkey</option>
                                                        <option value="TU">Turkmenistan</option>
                                                        <option value="TC">Turks &amp; Caicos Is</option>
                                                        <option value="TV">Tuvalu</option>
                                                        <option value="UG">Uganda</option>
                                                        <option value="UA">Ukraine</option>
                                                        <option value="AE">United Arab Emirates</option>
                                                        <option value="GB">United Kingdom</option>
                                                        <option value="US">United States of America</option>
                                                        <option value="UY">Uruguay</option>
                                                        <option value="UZ">Uzbekistan</option>
                                                        <option value="VU">Vanuatu</option>
                                                        <option value="VS">Vatican City State</option>
                                                        <option value="VE">Venezuela</option>
                                                        <option value="VN">Vietnam</option>
                                                        <option value="VB">Virgin Islands (Brit)</option>
                                                        <option value="VA">Virgin Islands (USA)</option>
                                                        <option value="WK">Wake Island</option>
                                                        <option value="WF">Wallis &amp; Futana Is</option>
                                                        <option value="YE">Yemen</option>
                                                        <option value="ZR">Zaire</option>
                                                        <option value="ZM">Zambia</option>
                                                        <option value="ZW">Zimbabwe</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="wizard-footer height-wizard">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' style="font-weight: bold;"name='next' value='Next' />
                                <input type='button' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Finish' />

                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
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
