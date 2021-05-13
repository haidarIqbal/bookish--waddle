<?php 
include("database/connection.php");
$sessId="";
if(isset($_POST['submit'])){
	
	$fname=stripslashes($_REQUEST['fname']);
	$fname=mysqli_real_escape_string($link,$fname);
	
	$lname=stripslashes($_REQUEST['lname']);
	$lname=mysqli_real_escape_string($link,$lname);
	
	$email=stripslashes($_REQUEST['email']);
	$email=mysqli_real_escape_string($link,$email);
	
	$country=stripslashes($_REQUEST['country']);
	$country=mysqli_real_escape_string($link,$country);
	
	$phone=stripslashes($_REQUEST['phone']);
	$phone=mysqli_real_escape_string($link,$phone);
	
	$dialCode=stripslashes($_REQUEST['dialCode']);
	$dialCode=mysqli_real_escape_string($link,$dialCode);
	
	$price = 2200*100;
	$secureCode = md5( rand(0,1000) );
    $enrollment_date=date("Y-m-d");
	$query = "INSERT INTO users(fname,lname,email,country,dialCode,phone,secureCode,payment,enroll_date)
    VALUES('$fname','$lname','$email','$country','$dialCode','$phone','$secureCode','false','$enrollment_date')";
		$result = mysqli_query($link,$query);
		if($result){
			require_once('stripe-php/init.php');
			\Stripe\Stripe::setApiKey('STRIPE_SECRET_KEY');
			$session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
          'name' => 'YOUR_DOMAIN',
          'description' => 'Signup For YOUR_DOMAIN',
          'amount' => $price,
          'currency' => 'usd',
          'quantity' => 1
        ]],
        'success_url' => 'https://YOUR_DOMAIN/success.php?Usersession='.$secureCode,
        'cancel_url' => 'https://YOUR_DOMAIN/cancel.php',
		'customer_email'=>$email
      ]);

	  $stripeSession = array($session);
		$sessId = ($stripeSession[0]['id']);
	}
}
include("common/header.php")
?>

    <div class="container-fluid mainArea">
        <div class="row">
            <div class=" col-lg-5 col-sm-12 col-md-12 text-sm-center text-lg-center">
                <h1 class="customFontHeading">
                    The best of<br />
                    Ayman Academy for</br>
                    your business<br />
                </h1><br />
                <h4 class="subHeading">
                    Invest in your team, because they can be your best story tellers!
                </h4>
                <button class="btn btn-lg btnEnquire">Enquire now</button>
            </div>
            <div class="col-lg-6 text-sm-center imgDiv">
                <img src="https://via.placeholder.com/600x450" class="img-fluid " alt="">
            </div>
        </div>
    </div>
    <br>

    <div class="container">
        <p class="learning">Your Learning <span class="journey"> Journey.</span></p>
    </div>
    <div class="container-fluid bg">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-11 col-sm-12">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="leftDiv c-CardWithTriangle c-CardWithTriangle--right shake-slow">
                            <div class="row">
                                <div class="col-4">
                                    <img src="https://via.placeholder.com/150x150" class="img-thumbnail rounded showImg">
                                </div>
                                <div class="col">
                                    <h3>Join a Live Class</h3>
                                    <p class="textp">Our classes are live, fun and full of energy.
                                        That's why we enjoy over 96% class completion rates.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1 center">
                        <div class="block-trans"></div>
                        <div class="dot">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="c-MilestoneDotIcon">
                                <circle cx="12" cy="12" r="11" fill="#FBC91B" stroke="#FBF0CB" stroke-width="2">
                                </circle>
                            </svg>
                        </div>
                        <div class="block"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-5"></div>
                    <div class="col-1 center">
                        <div class="block"></div>
                        <div class="dot">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="c-MilestoneDotIcon">
                                <circle cx="12" cy="12" r="11" fill="#FBC91B" stroke="#FBF0CB" stroke-width="2">
                                </circle>
                            </svg>
                        </div>
                        <div class="block"></div>
                    </div>
                    <div class="col-lg-5">
                        <div class="leftDiv c-CardWithTriangle c-CardWithTriangle--left shake-slow">
                            <div class="row">
                                <div class="col-4">
                                    <img src="https://via.placeholder.com/150x150"  class="img-thumbnail rounded showImg">
                                </div>
                                <div class="col">
                                    <h3>Join a Live Class</h3>
                                    <p class="textp">Our classes are live, fun and full of energy.
                                        That's why we enjoy over 96% class completion rates.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-5">
                        <div class="leftDiv c-CardWithTriangle c-CardWithTriangle--right shake-slow">
                            <div class="row">
                                <div class="col-4">
                                    <img src="https://via.placeholder.com/150x150"  class="img-thumbnail rounded showImg">
                                </div>
                                <div class="col">
                                    <h3>Join a Live Class</h3>
                                    <p class="textp">Our classes are live, fun and full of energy.
                                        That's why we enjoy over 96% class completion rates.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1 center">
                        <div class="block"></div>
                        <div class="dot">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="c-MilestoneDotIcon">
                                <circle cx="12" cy="12" r="11" fill="#FBC91B" stroke="#FBF0CB" stroke-width="2">
                                </circle>
                            </svg>
                        </div>
                        <div class="block"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-5"></div>
                    <div class="col-1 center">
                        <div class="block"></div>
                        <div class="dot">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="c-MilestoneDotIcon">
                                <circle cx="12" cy="12" r="11" fill="#FBC91B" stroke="#FBF0CB" stroke-width="2">
                                </circle>
                            </svg>
                        </div>
                        <div class="block-trans"></div>
                    </div>
                    <div class="col-lg-5">
                        <div class="leftDiv c-CardWithTriangle c-CardWithTriangle--left shake-slow">
                            <div class="row">
                                <div class="col-4">
                                    <img src="https://via.placeholder.com/150x150"  class="img-thumbnail rounded showImg">
                                </div>
                                <div class="col">
                                    <h3>Join a Live Class</h3>
                                    <p class="textp">Our classes are live, fun and full of energy.
                                        That's why we enjoy over 96% class completion rates.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>

    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <form class="from-group col-xs-12 col-lg-7" method="post">
                <div class="formDiv">
                                    <input type="text" class="form-control inputArea" name="fname" placeholder="First Name"
                        required="">
                    <br>
                    <input type="text" class="form-control inputArea input-lg" name="lname" placeholder="Last Name" required="">
                    <br>
                    <select name="country" class="form-control inputArea" required="">
                        <option value="">Select Country</option>
                        <option value="153">Singapore</option>
                        <option value="63">United Kingdom</option>
                        <option value="184">United States of America</option>
                        <option value="1">Afghanistan</option>
                        <option value="3">Albania</option>
                        <option value="50">Algeria</option>
                        <option value="4">Andorra</option>
                        <option value="2">Angola</option>
                        <option value="8">Antigua and Barbuda</option>
                        <option value="6">Argentina</option>
                        <option value="7">Armenia</option>
                        <option value="9">Australia</option>
                        <option value="10">Austria</option>
                        <option value="11">Azerbaijan</option>
                        <option value="19">Bahamas</option>
                        <option value="18">Bahrain</option>
                        <option value="16">Bangladesh</option>
                        <option value="25">Barbados</option>
                        <option value="21">Belarus</option>
                        <option value="13">Belgium</option>
                        <option value="22">Belize</option>
                        <option value="14">Benin</option>
                        <option value="27">Bhutan</option>
                        <option value="23">Bolivia</option>
                        <option value="20">Bosnia and Herzegovina</option>
                        <option value="28">Botswana</option>
                        <option value="24">Brazil</option>
                        <option value="26">Brunei Darussalam</option>
                        <option value="17">Bulgaria</option>
                        <option value="15">Burkina Faso</option>
                        <option value="12">Burundi</option>
                        <option value="92">Cambodia</option>
                        <option value="35">Cameroon</option>
                        <option value="30">Canada</option>
                        <option value="40">Cape Verde</option>
                        <option value="29">Central African Republic</option>
                        <option value="168">Chad</option>
                        <option value="32">Chile</option>
                        <option value="33">China</option>
                        <option value="38">Colombia</option>
                        <option value="39">Comoros</option>
                        <option value="10004">Curaçao</option>
                        <option value="37">People's Republic of the Congo</option>
                        <option value="36">Democratic Republic of the Congo</option>
                        <option value="41">Costa Rica</option>
                        <option value="75">Croatia</option>
                        <option value="42">Cuba</option>
                        <option value="43">Cyprus</option>
                        <option value="44">Czech Republic</option>
                        <option value="48">Denmark</option>
                        <option value="46">Djibouti</option>
                        <option value="47">Dominica</option>
                        <option value="49">Dominican Republic</option>
                        <option value="173">Timor-Leste</option>
                        <option value="51">Ecuador</option>
                        <option value="52">Egypt</option>
                        <option value="156">El Salvador</option>
                        <option value="69">Equatorial Guinea</option>
                        <option value="53">Eritrea</option>
                        <option value="56">Estonia</option>
                        <option value="57">Ethiopia</option>
                        <option value="59">Fiji</option>
                        <option value="58">Finland</option>
                        <option value="60">France</option>
                        <option value="62">Gabon</option>
                        <option value="67">Gambia</option>
                        <option value="64">Georgia</option>
                        <option value="45">Germany</option>
                        <option value="65">Ghana</option>
                        <option value="70">Greece</option>
                        <option value="71">Grenada</option>
                        <option value="72">Guatemala</option>
                        <option value="66">Guinea</option>
                        <option value="68">Guinea-Bissau</option>
                        <option value="73">Guyana</option>
                        <option value="76">Haiti</option>
                        <option value="74">Honduras</option>
                        <option value="0">Hong Kong</option>
                        <option value="77">Hungary</option>
                        <option value="83">Iceland</option>
                        <option value="79">India</option>
                        <option value="78">Indonesia</option>
                        <option value="81">Iran</option>
                        <option value="82">Iraq</option>
                        <option value="80">Ireland</option>
                        <option value="84">Israel</option>
                        <option value="85">Italy</option>
                        <option value="34">Ivory Coast</option>
                        <option value="86">Jamaica</option>
                        <option value="88">Japan</option>
                        <option value="87">Jordan</option>
                        <option value="89">Kazakhstan</option>
                        <option value="90">Kenya</option>
                        <option value="93">Kiribati</option>
                        <option value="10001">North Korea</option>
                        <option value="95">South Korea</option>
                        <option value="10002">Kosovo</option>
                        <option value="96">Kuwait</option>
                        <option value="91">Kyrgyzstan</option>
                        <option value="97">Laos</option>
                        <option value="107">Latvia</option>
                        <option value="98">Lebanon</option>
                        <option value="104">Lesotho</option>
                        <option value="99">Liberia</option>
                        <option value="100">Libya</option>
                        <option value="102">Liechtenstein</option>
                        <option value="105">Lithuania</option>
                        <option value="106">Luxembourg</option>
                        <option value="115">North Macedonia</option>
                        <option value="111">Madagascar</option>
                        <option value="124">Malawi</option>
                        <option value="125">Malaysia</option>
                        <option value="112">Maldives</option>
                        <option value="116">Mali</option>
                        <option value="117">Malta</option>
                        <option value="114">Marshall Islands</option>
                        <option value="122">Mauritania</option>
                        <option value="123">Mauritius</option>
                        <option value="113">Mexico</option>
                        <option value="61">Micronesia</option>
                        <option value="110">Moldova</option>
                        <option value="109">Monaco</option>
                        <option value="120">Mongolia</option>
                        <option value="119">Montenegro</option>
                        <option value="108">Morocco</option>
                        <option value="121">Mozambique</option>
                        <option value="118">Myanmar (Burma)</option>
                        <option value="126">Namibia</option>
                        <option value="133">Nauru</option>
                        <option value="132">Nepal</option>
                        <option value="130">Netherlands</option>
                        <option value="134">New Zealand</option>
                        <option value="129">Nicaragua</option>
                        <option value="127">Niger</option>
                        <option value="128">Nigeria</option>
                        <option value="131">Norway</option>
                        <option value="135">Oman</option>
                        <option value="136">Pakistan</option>
                        <option value="140">Palau</option>
                        <option value="10003">Palestine</option>
                        <option value="137">Panama</option>
                        <option value="141">Papua New Guinea</option>
                        <option value="144">Paraguay</option>
                        <option value="138">Peru</option>
                        <option value="139">Philippines</option>
                        <option value="142">Poland</option>
                        <option value="143">Portugal</option>
                        <option value="146">Qatar</option>
                        <option value="147">Romania</option>
                        <option value="148">Russia</option>
                        <option value="149">Rwanda</option>
                        <option value="94">Saint Kitts and Nevis</option>
                        <option value="101">Saint Lucia</option>
                        <option value="187">Saint Vincent and the Grenadines</option>
                        <option value="191">Samoa</option>
                        <option value="157">San Marino</option>
                        <option value="160">Sao Tomé and Principe</option>
                        <option value="150">Saudi Arabia</option>
                        <option value="152">Senegal</option>
                        <option value="159">Serbia</option>
                        <option value="166">Seychelles</option>
                        <option value="155">Sierra Leone</option>
                        <option value="162">Slovakia</option>
                        <option value="163">Slovenia</option>
                        <option value="154">Solomon Islands</option>
                        <option value="158">Somalia</option>
                        <option value="193">South Africa</option>
                        <option value="197">South Sudan</option>
                        <option value="55">Spain</option>
                        <option value="103">Sri Lanka</option>
                        <option value="151">Sudan</option>
                        <option value="161">Suriname</option>
                        <option value="165">Swaziland</option>
                        <option value="164">Sweden</option>
                        <option value="31">Switzerland</option>
                        <option value="167">Syrian Arab Republic</option>
                        <option value="179">Taiwan</option>
                        <option value="171">Tajikistan</option>
                        <option value="180">Tanzania</option>
                        <option value="170">Thailand</option>
                        <option value="169">Togo</option>
                        <option value="174">Tonga</option>
                        <option value="175">Trinidad and Tobago</option>
                        <option value="176">Tunisia</option>
                        <option value="177">Turkey</option>
                        <option value="172">Turkmenistan</option>
                        <option value="178">Tuvalu</option>
                        <option value="181">Uganda</option>
                        <option value="182">Ukraine</option>
                        <option value="5">United Arab Emirates</option>
                        <option value="183">Uruguay</option>
                        <option value="185">Uzbekistan</option>
                        <option value="190">Vanuatu</option>
                        <option value="186">Vatican City</option>
                        <option value="188">Venezuela</option>
                        <option value="189">Vietnam</option>
                        <option value="192">Yemen</option>
                        <option value="194">Zambia</option>
                        <option value="195">Zimbabwe</option>
                    </select>
                    <br>
                    <div class="row">
                        <div class="col-3">
                            <select name="dialCode" class="form-control inputArea" required="">
                                <option value="">Dial Code</option>
                                <option value="1">+93 : Afghanistan</option>
                                <option value="3">+355 : Albania</option>
                                <option value="50">+213 : Algeria</option>
                                <option value="4">+376 : Andorra</option>
                                <option value="2">+244 : Angola</option>
                                <option value="8">+1268 : Antigua and Barbuda</option>
                                <option value="6">+54 : Argentina</option>
                                <option value="7">+374 : Armenia</option>
                                <option value="9">+61 : Australia</option>
                                <option value="10">+43 : Austria</option>
                                <option value="11">+994 : Azerbaijan</option>
                                <option value="19">+1242 : Bahamas</option>
                                <option value="18">+973 : Bahrain</option>
                                <option value="16">+880 : Bangladesh</option>
                                <option value="25">+1246 : Barbados</option>
                                <option value="21">+375 : Belarus</option>
                                <option value="13">+32 : Belgium</option>
                                <option value="22">+501 : Belize</option>
                                <option value="14">+229 : Benin</option>
                                <option value="27">+975 : Bhutan</option>
                                <option value="23">+591 : Bolivia</option>
                                <option value="20">+387 : Bosnia and Herzegovina</option>
                                <option value="28">+267 : Botswana</option>
                                <option value="24">+55 : Brazil</option>
                                <option value="26">+673 : Brunei Darussalam</option>
                                <option value="17">+359 : Bulgaria</option>
                                <option value="15">+226 : Burkina Faso</option>
                                <option value="12">+257 : Burundi</option>
                                <option value="92">+855 : Cambodia</option>
                                <option value="35">+237 : Cameroon</option>
                                <option value="30">+1 : Canada</option>
                                <option value="40">+238 : Cape Verde</option>
                                <option value="29">+236 : Central African Republic</option>
                                <option value="168">+235 : Chad</option>
                                <option value="32">+56 : Chile</option>
                                <option value="33">+86 : China</option>
                                <option value="38">+57 : Colombia</option>
                                <option value="39">+269 : Comoros</option>
                                <option value="41">+506 : Costa Rica</option>
                                <option value="75">+385 : Croatia</option>
                                <option value="42">+53 : Cuba</option>
                                <option value="10004">+599 : Curaçao</option>
                                <option value="43">+357 : Cyprus</option>
                                <option value="44">+420 : Czech Republic</option>
                                <option value="36">+243 : Democratic Republic of the Congo</option>
                                <option value="48">+45 : Denmark</option>
                                <option value="46">+253 : Djibouti</option>
                                <option value="47">+1767 : Dominica</option>
                                <option value="49">+1 : Dominican Republic</option>
                                <option value="51">+593 : Ecuador</option>
                                <option value="52">+20 : Egypt</option>
                                <option value="156">+503 : El Salvador</option>
                                <option value="69">+240 : Equatorial Guinea</option>
                                <option value="53">+291 : Eritrea</option>
                                <option value="56">+372 : Estonia</option>
                                <option value="57">+251 : Ethiopia</option>
                                <option value="59">+679 : Fiji</option>
                                <option value="58">+358 : Finland</option>
                                <option value="60">+33 : France</option>
                                <option value="62">+241 : Gabon</option>
                                <option value="67">+220 : Gambia</option>
                                <option value="64">+995 : Georgia</option>
                                <option value="45">+49 : Germany</option>
                                <option value="65">+233 : Ghana</option>
                                <option value="70">+30 : Greece</option>
                                <option value="71">+1473 : Grenada</option>
                                <option value="72">+502 : Guatemala</option>
                                <option value="66">+224 : Guinea</option>
                                <option value="68">+245 : Guinea-Bissau</option>
                                <option value="73">+592 : Guyana</option>
                                <option value="76">+509 : Haiti</option>
                                <option value="74">+504 : Honduras</option>
                                <option value="0">+852 : Hong Kong</option>
                                <option value="77">+36 : Hungary</option>
                                <option value="83">+354 : Iceland</option>
                                <option value="79">+91 : India</option>
                                <option value="78">+62 : Indonesia</option>
                                <option value="81">+98 : Iran</option>
                                <option value="82">+964 : Iraq</option>
                                <option value="80">+353 : Ireland</option>
                                <option value="84">+972 : Israel</option>
                                <option value="85">+39 : Italy</option>
                                <option value="34">+225 : Ivory Coast</option>
                                <option value="86">+1876 : Jamaica</option>
                                <option value="88">+81 : Japan</option>
                                <option value="87">+962 : Jordan</option>
                                <option value="89">+77 : Kazakhstan</option>
                                <option value="90">+254 : Kenya</option>
                                <option value="93">+686 : Kiribati</option>
                                <option value="10002">+383 : Kosovo</option>
                                <option value="96">+965 : Kuwait</option>
                                <option value="91">+996 : Kyrgyzstan</option>
                                <option value="97">+856 : Laos</option>
                                <option value="107">+371 : Latvia</option>
                                <option value="98">+961 : Lebanon</option>
                                <option value="104">+266 : Lesotho</option>
                                <option value="99">+231 : Liberia</option>
                                <option value="100">+218 : Libya</option>
                                <option value="102">+423 : Liechtenstein</option>
                                <option value="105">+370 : Lithuania</option>
                                <option value="106">+352 : Luxembourg</option>
                                <option value="111">+261 : Madagascar</option>
                                <option value="124">+265 : Malawi</option>
                                <option value="125">+60 : Malaysia</option>
                                <option value="112">+960 : Maldives</option>
                                <option value="116">+223 : Mali</option>
                                <option value="117">+356 : Malta</option>
                                <option value="114">+692 : Marshall Islands</option>
                                <option value="122">+222 : Mauritania</option>
                                <option value="123">+230 : Mauritius</option>
                                <option value="113">+52 : Mexico</option>
                                <option value="61">+691 : Micronesia</option>
                                <option value="110">+373 : Moldova</option>
                                <option value="109">+377 : Monaco</option>
                                <option value="120">+976 : Mongolia</option>
                                <option value="119">+382 : Montenegro</option>
                                <option value="108">+212 : Morocco</option>
                                <option value="121">+258 : Mozambique</option>
                                <option value="118">+95 : Myanmar (Burma)</option>
                                <option value="126">+264 : Namibia</option>
                                <option value="133">+674 : Nauru</option>
                                <option value="132">+977 : Nepal</option>
                                <option value="130">+31 : Netherlands</option>
                                <option value="134">+64 : New Zealand</option>
                                <option value="129">+505 : Nicaragua</option>
                                <option value="127">+227 : Niger</option>
                                <option value="128">+234 : Nigeria</option>
                                <option value="10001">+850 : North Korea</option>
                                <option value="115">+389 : North Macedonia</option>
                                <option value="131">+47 : Norway</option>
                                <option value="135">+968 : Oman</option>
                                <option value="136">+92 : Pakistan</option>
                                <option value="140">+680 : Palau</option>
                                <option value="10003">+970 : Palestine</option>
                                <option value="137">+507 : Panama</option>
                                <option value="141">+675 : Papua New Guinea</option>
                                <option value="144">+595 : Paraguay</option>
                                <option value="37">+242 : People's Republic of the Congo</option>
                                <option value="138">+51 : Peru</option>
                                <option value="139">+63 : Philippines</option>
                                <option value="142">+48 : Poland</option>
                                <option value="143">+351 : Portugal</option>
                                <option value="146">+974 : Qatar</option>
                                <option value="147">+40 : Romania</option>
                                <option value="148">+7 : Russia</option>
                                <option value="149">+250 : Rwanda</option>
                                <option value="94">+1869 : Saint Kitts and Nevis</option>
                                <option value="101">+1758 : Saint Lucia</option>
                                <option value="187">+1784 : Saint Vincent and the Grenadines</option>
                                <option value="191">+685 : Samoa</option>
                                <option value="157">+378 : San Marino</option>
                                <option value="160">+239 : Sao Tomé and Principe</option>
                                <option value="150">+966 : Saudi Arabia</option>
                                <option value="152">+221 : Senegal</option>
                                <option value="159">+381 : Serbia</option>
                                <option value="166">+248 : Seychelles</option>
                                <option value="155">+232 : Sierra Leone</option>
                                <option value="153">+65 : Singapore</option>
                                <option value="162">+421 : Slovakia</option>
                                <option value="163">+386 : Slovenia</option>
                                <option value="154">+677 : Solomon Islands</option>
                                <option value="158">+252 : Somalia</option>
                                <option value="193">+27 : South Africa</option>
                                <option value="95">+82 : South Korea</option>
                                <option value="197">+211 : South Sudan</option>
                                <option value="55">+34 : Spain</option>
                                <option value="103">+94 : Sri Lanka</option>
                                <option value="151">+249 : Sudan</option>
                                <option value="161">+597 : Suriname</option>
                                <option value="165">+268 : Swaziland</option>
                                <option value="164">+46 : Sweden</option>
                                <option value="31">+41 : Switzerland</option>
                                <option value="167">+963 : Syrian Arab Republic</option>
                                <option value="179">+886 : Taiwan</option>
                                <option value="171">+992 : Tajikistan</option>
                                <option value="180">+255 : Tanzania</option>
                                <option value="170">+66 : Thailand</option>
                                <option value="173">+670 : Timor-Leste</option>
                                <option value="169">+228 : Togo</option>
                                <option value="174">+676 : Tonga</option>
                                <option value="175">+1868 : Trinidad and Tobago</option>
                                <option value="176">+216 : Tunisia</option>
                                <option value="177">+90 : Turkey</option>
                                <option value="172">+993 : Turkmenistan</option>
                                <option value="178">+688 : Tuvalu</option>
                                <option value="181">+256 : Uganda</option>
                                <option value="182">+380 : Ukraine</option>
                                <option value="5">+971 : United Arab Emirates</option>
                                <option value="63">+44 : United Kingdom</option>
                                <option value="184">+1 : United States of America</option>
                                <option value="183">+598 : Uruguay</option>
                                <option value="185">+998 : Uzbekistan</option>
                                <option value="190">+678 : Vanuatu</option>
                                <option value="186">+379 : Vatican City</option>
                                <option value="188">+58 : Venezuela</option>
                                <option value="189">+84 : Vietnam</option>
                                <option value="192">+967 : Yemen</option>
                                <option value="194">+260 : Zambia</option>
                                <option value="195">+263 : Zimbabwe</option>
                            </select>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control inputArea" name="phone" placeholder="Phone" required="">
                        </div>
                    </div>
                    <br>
                    <input type="text" class="form-control inputArea" placeholder="Email" name="email" required="">
                    <br>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required="">
                        <label class="form-check-label" for="exampleCheck1">I agree to the <a target="_blank"
                                rel="noopener noreferrer" href="#"><b><u>Terms &amp;
                                        Conditions</u></b></a> and I am older than 16 years of age.</label>
                    </div><br>
                    <button class="btn btnsend col" type="submit" name="submit">Continue to payment</button>
                </div>
            </form>
        </div>
    </div>
<?php include_once("./common/footer.php");?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        var ssId = "<?php echo $sessId ?>";
        const stripe = Stripe(
            'PUBLIC_KEY'
        );
        const checkout_Id = (ssId);
        stripe.redirectToCheckout({
            sessionId: checkout_Id,
        });
    });
    </script>
</body>

</html>
