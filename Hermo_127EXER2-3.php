<?php
?>
<html>
    <head>
    <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <header>
            <h3>
            Travel Survery Questionnaire
            </h3>
        </header>
        <p>Please complete the following questionnaire as accurately as possible and then return to [XYZ Travel Agency]</p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <ol>
                <div class="ContactInfo">
                <li>Contact information</li>
                Name <input type="text" name="name" pattern="([A-Z][a-z]+(\s|-)?)+" required><span class="check"></span>

                Title <input type="text" name="title" pattern="([A-Za-z]+(\s|-)?)+" required><span class="check"></span><br>

                Phone <input type="tel" name="phone" pattern="[0-9]+" required><span class="check"></span>

                Fax <input type="tel" name="fax" pattern="[0-9]+" id="d" required><span class="check"></span>

                Email <input type="email" name="email" pattern="[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+" required><span class="check"></span><br>

                Address <input type="text" name="address" pattern="[^\t\n\r]+" required><span class="check"></span>

                </div>
                <div class="radios">
                <li>When do you plan to travel next?</li>

                <input type="radio" name="q2" value="1-3 months">
                <label for="1-3 months">1-3 months</label><br>

                <input type="radio" name="q2" value="3-6 months">
                <label for="3-6 months">3-6 months</label><br>

                <input type="radio" name="q2" value="6-12 months">
                <label for="6-12 months">6-12 months</label><br>

                <input type="radio" name="q2" value="More than one year" required>
                <label for="More than one year">More than a year</label><br>

                <li>How far in advance do you normally book your trips?</li>

                <input type="radio" name="q3" value="1-3 months">
                <label for="1-3 months">1-3 months</label><br>

                <input type="radio" name="q3" value="3-6 months">
                <label for="3-6 months">3-6 months</label><br>

                <input type="radio" name="q3" value="6-12 months">
                <label for="6-12 months">6-12 months</label><br>

                <input type="radio" name="q3" value="more" required>
                <label for="more">More than a year</label><br>

                <li>What time of the year do you normally prefer to travel?</li>

                <input type="radio" name="q4" value="Spring">
                <label for="Spring">Spring</label><br>
                
                <input type="radio" name="q4" value="Summer">
                <label for="Summer">Summer</label><br>

                <input type="radio" name="q4" value="Fall">
                <label for="Fall">Fall</label><br>

                <input type="radio" name="q4" value="Winter" required>
                <label for="Winter">Winter</label><br>

                <li>What region of the world is your most favorite place to travel</li>

                <input type="radio" name="q5" value="North America">
                <label for="North America">North America</label><br>

                <input type="radio" name="q5" value="South America">
                <label for="South America">South America</label><br>

                <input type="radio" name="q5" value="Central America">
                <label for="Central America">Central America</label><br>

                <input type="radio" name="q5" value="Africa">
                <label for="Africa">Africa</label><br>

                <input type="radio" name="q5" value="Europe">
                <label for="Europe">Europe</label><br>

                <input type="radio" name="q5" value="Middle East">
                <label for="Middle East">Middle East</label><br>

                <input type="radio" name="q5" value="Asia">
                <label for="Asia">Asia</label><br>

                <input type="radio" name="q5" value="Pacific">
                <label for="Pacific">Pacific</label><br>

                <input type="radio" name="q5" value="Orient">
                <label for="Orient">Orient</label><br>

                <input type="radio" name="q5" value="Others" required>
                <label for="Others">Others:</label><input type="text" name="q5more" pattern="[A-Z][a-z]+"><br>

                <li>What hotel accommodations do you usually look for when travelling?</li>

                <input type="radio" name="q6" value="Budget">
                <label for="Budget">Budget</label><br>

                <input type="radio" name="q6" value="2 Star">
                <label for="2 Star">2 Star</label><br>

                <input type="radio" name="q6" value="3 Star">
                <label for="3 Star">3 Star</label><br>

                <input type="radio" name="q6" value="4 Star">
                <label for="4 Star">4 Star</label><br>

                <input type="radio" name="q6" value="5 Star" required>
                <label for="5 Star">5 Star</label><br>

                <li>What activity level is most desired when traveling</li>

                <input type="radio" name="q7" value="active">
                <label for="active">Active – includes cycling, hiking, and mountain climbing</label><br>

                <input type="radio" name="q7" value="moderate">
                <label for="moderate">Moderate activity – includes walking, exploration</label><br>

                <input type="radio" name="q7" value="low" required>
                <label for="low">Low activity – includes light walking, lectures</label><br>

                <li>What do you most look for as far as activities when traveling?</li>

                <input type="radio" name="q8" value="History">
                <label for="History">History</label><br>

                <input type="radio" name="q8" value="Art">
                <label for="Art">Art</label><br>

                <input type="radio" name="q8" value="Wildlife">
                <label for="Wildlife">Wildlife</label><br>

                <input type="radio" name="q8" value="Nature">
                <label for="Nature">Nature</label><br>

                <input type="radio" name="q8" value="Local culture">
                <label for="Local culture">Local culture</label><br>

                <input type="radio" name="q8" value="Food">
                <label for="Food">Food</label><br>

                <input type="radio" name="q8" value="Science">
                <label for="Science">Science</label><br>

                <input type="radio" name="q8" value="Others" required>
                <label for="Others">Others:</label><input type="text" name="q8more" pattern="[A-Z][a-z]+"><br>

                <li>Do you use travel related sites when booking travel? These include sites for airline tickets, cruises, car rentals (examples: Expedia or Travelocity).</li>
                
                <input type="radio" name="q9" value="Yes">
                <label for="Yes">Yes</label><br>

                <input type="radio" name="q9" value="No" required>
                <label for="No">No</label><br>

                <li>Do you travel mostly for business or pleasure?</li>

                <input type="radio" name="q10" value="Business">
                <label for="Business">Business</label><br>

                <input type="radio" name="q10" value="Pleasure">
                <label for="Pleasure">Pleasure</label><br>

                <input type="radio" name="q10" value="Bother" required>
                <label for="Bother">Bother</label><br>

                <li>What are your usual reasons to travel?</li>

                <input type="radio" name="q11" value="Company business">
                <label for="Company business">Company business</label><br>

                <input type="radio" name="q11" value="Military">
                <label for="Military">Military</label><br>

                <input type="radio" name="q11" value="Resort vacation">
                <label for="Resort vacation">Resort vacation</label><br>

                <input type="radio" name="q11" value="Visit friends or relatives">
                <label for="Visit friends or relatives">Visit friends or relatives</label><br>

                <input type="radio" name="q11" value="Personal trip">
                <label for="Personal trip">Personal trip</label><br>

                <input type="radio" name="q11" value="Cruise">
                <label for="Cruise">Cruise</label><br>

                <input type="radio" name="q11" value="Relocating" required>
                <label for="Relocating">Relocating</label><br>

                <li>When it comes to airports, which do you dread dealing with the most?</li>

                <input type="radio" name="q12" value="Ticket counter">
                <label for="Ticket counter">Ticket counter</label><br>

                <input type="radio" name="q12" value="Curbside baggage check in">
                <label for="Curbside baggage check in">Curbside baggage check in</label><br>

                <input type="radio" name="q12" value="Security checkpoint">
                <label for="Security checkpoint">Security checkpoint</label><br>

                <input type="radio" name="q12" value="Boarding gate">
                <label for="Boarding gate">Boarding gate</label><br>

                <input type="radio" name="q12" value="Airline boardingg" required>
                <label for="Airline boarding">Airline boarding</label><br>

                <li>What mode of transportation do you use for traveling purposes?</li>

                <input type="radio" name="q13" value="Airline">
                <label for="Airline">Airline</label><br>

                <input type="radio" name="q13" value="Train">
                <label for="Train">Train</label><br>

                <input type="radio" name="q13" value="Car">
                <label for="Car">Car</label><br>

                <input type="radio" name="q13" value="Boate">
                <label for="Boat">Boat</label><br>

                <input type="radio" name="q13" value="Motorcycle" required>
                <label for="Motorcycle">Motorcycle</label><br>

                <li>Who usually accompanies you on vacation?</li>

                <input type="radio" name="q14" value="I travel alone">
                <label for="I travel alone">I travel alone</label><br>

                <input type="radio" name="q14" value="Spouse">
                <label for="Spouse">Spouse</label><br>

                <input type="radio" name="q14" value="Children">
                <label for="Children">Children</label><br>

                <input type="radio" name="q14" value="Spouse and children">
                <label for="Spouse and children">Spouse and children</label><br>

                <input type="radio" name="q14" value="Friends">
                <label for="Friends">Friends</label><br>

                <input type="radio" name="q14" value="Family members">
                <label for="Family members">Family members</label><br>

                <input type="radio" name="q14" value="Others" required>
                <label for="Others">Others:</label><input type="text" name="q14more" pattern="[A-Z][a-z]+"><br>

                <li>Do you mostly travel to domestic or international areas?</li>

                <input type="radio" name="q15" value="Domestic">
                <label for="Domestic">Domestic</label><br>

                <input type="radio" name="q15" value="International">
                <label for="International">International</label><br>

                <input type="radio" name="q15" value="Both" required>
                <label for="Both">Both</label><br>

                <li>Do you use a guidebook for traveling purposes? Which one do you use most often?</li>

                <input type="radio" name="q16" value="Do not use a travel guide book">
                <label for="Do not use a travel guide booke">Do not use a travel guide book</label><br>

                <input type="radio" name="q16" value="Lonely Planet">
                <label for="Lonely Planet">Lonely Planet</label><br>

                <input type="radio" name="q16" value="Bradt">
                <label for="Bradt">Bradt</label><br>

                <input type="radio" name="q16" value="Rough Guide">
                <label for="Rough Guide">Rough Guidee</label><br>

                <input type="radio" name="q16" value="Frommers">
                <label for="Frommers">Frommers</label><br>

                <input type="radio" name="q16" value="Time Out">
                <label for="Time Out">Time Out</label><br>

                <input type="radio" name="q16" value="Frodors">
                <label for="Frodors">Frodors</label><br>

                <input type="radio" name="q16" value="Eyewitness">
                <label for="Eyewitness">Eyewitness</label><br>

                <input type="radio" name="q16" value="Let’s Go">
                <label for="Let’s Gos">Let’s Go</label><br>

                <input type="radio" name="q16" value="Others" required>
                <label for="Others">Others:</label><input type="text" name="q16more" pattern="[A-Z][a-z]+"><br>

                <li>What is the longest trip you have been on?</li>

                <input type="radio" name="q17" value="Less than 2 weeks">
                <label for="Less than 2 weeks">Less than 2 weeks</label><br>

                <input type="radio" name="q17" value="2 – 4 weeks">
                <label for="2 – 4 weeks">2 – 4 weeks</label><br>

                <input type="radio" name="q17" value="1 – 4 months">
                <label for="1 – 4 months">1 – 4 months</label><br>

                <input type="radio" name="q17" value="4 – 6 months">
                <label for="4 – 6 months">4 – 6 months</label><br>

                <input type="radio" name="q17" value="6 – 9 months">
                <label for="6 – 9 months">6 – 9 months</label><br>

                <input type="radio" name="q17" value="9 months to one year">
                <label for="9 months to one year">9 months to one year</label><br>

                <input type="radio" name="q17" value="More than one year" required>
                <label for="More than one year">More than a year</label><br>

            </ol>
            </div>
            <input type="submit">
        </form>
        <?php
            $name = $title = $email = $address = $q2 = $q3 = $q4 = $q5 = $q5more = $q8more = $q14more = $q16more = $q6 = $q7 = $q8 = $q9 = $q10 = $q11 = $q12 = $q13 = $q14 = $q15 = $q16 = $q17 = "";
            $phone = $fax = 0;
            if(!empty($_POST)){
                $name = test_input($_POST["name"]);
                $title = test_input($_POST["title"]);
                $email = test_input($_POST["email"]);
                $phone = test_input($_POST["phone"]);
                $fax = test_input($_POST["fax"]);
                $address = test_input($_POST["address"]);
                $q2 = test_input($_POST["q2"]);
                $q3 = test_input($_POST["q3"]);
                $q4 = test_input($_POST["q4"]);
                $q5 = test_input($_POST["q5"]);
                $q5more = test_input($_POST["q5more"]);
                if($q5=="Others"&& !empty($q5more)) $q5 = $q5more;
                $q6 = test_input($_POST["q6"]);
                $q7 = test_input($_POST["q7"]);
                $q8 = test_input($_POST["q8"]);
                $q8more = test_input($_POST["q8more"]);
                if($q8=="Others"&& !empty($q8more)) $q8 = $q8more;
                $q9 = test_input($_POST["q9"]);
                $q10 = test_input($_POST["q10"]);
                $q11 = test_input($_POST["q11"]);
                $q12 = test_input($_POST["q12"]);
                $q13 = test_input($_POST["q13"]);
                $q14 = test_input($_POST["q14"]);
                $q14more = test_input($_POST["q14more"]);
                if($q14=="Others"&& !empty($q14more)) $q14 = $q14more;
                $q15 = test_input($_POST["q15"]);
                $q16 = test_input($_POST["q16"]);
                $q16more = test_input($_POST["q16more"]);
                if($q16=="Others"&& !empty($q16more)) $q16 = $q16more;
                $q17 = test_input($_POST["q17"]);
            }
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            echo "<p>";
            echo "Name: ".$name."<br>";
            echo "Title: ".$title."<br>";
            echo "Email: ".$email."<br>";
            echo "Phone: ".$phone."<br>";
            echo "Fax: ".$fax."<br>";
            echo "Address: ".$address."<br>";
            echo "Question 2: ".$q2."<br>";
            echo "Question 3: ".$q3."<br>";
            echo "Question 4: ".$q4."<br>";
            echo "Question 5: ".$q5."<br>";
            echo "Question 6: ".$q6."<br>";
            echo "Question 7: ".$q7."<br>";
            echo "Question 8: ".$q8."<br>";
            echo "Question 9: ".$q9."<br>";
            echo "Question 10: ".$q10."<br>";
            echo "Question 11: ".$q11."<br>";
            echo "Question 12: ".$q12."<br>";
            echo "Question 13: ".$q13."<br>";
            echo "Question 14: ".$q14."<br>";
            echo "Question 15: ".$q15."<br>";
            echo "Question 16: ".$q16."<br>";
            echo "Question 17: ".$q17."<br>";
            echo "</p>";
        ?>
    </body>
</html>