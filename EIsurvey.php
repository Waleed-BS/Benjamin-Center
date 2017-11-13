<?php
include("index.php");
$fieldError = "";
$fulltimeemployees = "";
include("config.php");

echo $_POST["fulltimeemployees"];
if( $_SERVER["REQUEST_METHOD"] == "post" && !empty($_POST["fulltimeemployees"])) {

  if(! $conn ) {
    die('Could not connect: ' . mysql_error());
  }
  else {
    echo "Connected";
  }

  if(! get_magic_quotes_gpc() ) {
    $fulltimeemployees = addslashes ($_POST['fulltimeemployees']);
    
  } else {
    $fulltimeemployees = $_POST['fulltimeemployees'];

  }

  echo $fulltimeemployees;

 
  

  $retval = mysql_query("INSERT INTO eisurvey (fulltimeemployees) VALUES ('$fulltimeemployees')", $conn);

  if(! $retval ) {
    die('Could not enter data: ' . mysql_error());
  }

  echo "Entered data successfully\n";
  mysql_close($conn);

} else if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($_POST["fulltimeemployees"])) {
  $fieldError = "Field is required";
}
?>

<div class = "container" style = "background-color: white;">
  
  <form>
    <h3>The next set of questions asks about your employees. Please answer as best as possible, estimate when needed.</h3>
    <table class = "table table-condensed">
        <thead>
        <tr>
            <th>Please enter the total number of Full Time Employees <br> (if variable, average per year) <br> Answer 1</th>
        </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    <form method="post" name="Form" class='my-form' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <label for="femployees">Full Time</label>
                        <input class="form-control" name="fulltimeemployees" id="fulltimeemployees" rows="1">
                        <span class="error" style="color:red;"> <?php echo $fieldError;?></span>
                        <input class="form-control" name="register" type="submit" value="Submit"> </input>
                        
                    </form>
                </td>
            </tr>
        </tbody>
    </table>

    <table class = "table table-condensed">
        <thead>
            <tr>
                <th>Please enter the total number of Part Time Employees <br> (if variable, average per year) <br> Answer 1</th>
            </tr>
        </thead>
   
        <tbody>
            <tr>
                <td>
                    <div class="form-group">
                        <label for="parttimeemployees">Part Time</label>
                        <textarea type = "number" class="form-control" id="parttimeemployees" rows="1"></textarea>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <h5>Please estimate the percent of FULL TIME who live in each geography below (response must add to 100%).</h5>
    <form id="sumForm" method="post" class="form-horizontal">
        <div class="form-group">
            <label class="col-xs-3 control-label">Within the City of Poughkeepsie</label>
            <div class="col-xs-4">
                <input class="form-control" id = "box1" name="percentage[]" type="number" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label">In Dutchess Country, Outside of Poughkeepsie</label>
            <div class="col-xs-4 col-xs-offset-3">
                <input class="form-control" id = "box2" name="percentage[]" type="number" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label">Outside of Dutchess County in New York State</label>
            <div class="col-xs-4 col-xs-offset-3">
                <input class="form-control" id = "box3" name="percentage[]" type="number" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label">Outside NY</label>
            <div class="col-xs-4 col-xs-offset-3">
                <input class="form-control" id = "box4" name="percentage[]" type="number" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-9 col-xs-offset-3">
                <!-- The message container -->
                <div id="messageContainer"></div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label">Total</label>
            <div class="col-xs-4 col-xs-offset-3">
                <input class="form-control" id = "totalfulltime" name="percentage[]" type="number" readonly/>
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-9 col-xs-offset-3">
                <button id = "validate" type = "button" class="btn btn-primary">Validate</button>
            </div>
        </div>


    </form>

    <h5>Please estimate the percent of PART TIME who live in each geography below (response must add to 100%).</h5>
    <form id="sumForm2" method="post" class="form-horizontal">
        <div class="form-group">
            <label class="col-xs-3 control-label">Within the City of Poughkeepsie</label>
            <div class="col-xs-4">
                <input class="form-control" id = "box5" name="percentage[]" type="number" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label">In Dutchess Country, Outside of Poughkeepsie</label>
            <div class="col-xs-4 col-xs-offset-3">
                <input class="form-control" id = "box6" name="percentage[]" type="number" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label">Outside of Dutchess County in New York State</label>
            <div class="col-xs-4 col-xs-offset-3">
                <input class="form-control" id = "box7" name="percentage[]" type="number" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label">Outside NY</label>
            <div class="col-xs-4 col-xs-offset-3">
                <input class="form-control" id = "box8" name="percentage[]" type="number" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-9 col-xs-offset-3">
                <!-- The message container -->
                <div id="messageContainer2"></div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label">Total</label>
            <div class="col-xs-4 col-xs-offset-3">
                <input class="form-control" id = "totalparttime" name="percentage[]" type="number" readonly/>
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-9 col-xs-offset-3">
                <button id = "validate2" type = "button" class="btn btn-primary">Validate</button>
            </div>
        </div>
    </form>

    <form>
    <h5> What is your estimated annual expense for Net Salary and Wages (Gross salary less tax)?</h5>
    <input class="form-control" id = "netsalarywages" name="netsalarywages" type="number" />
    </form>

    <form>
    <h5> Please consider the different venders your organization uses to complete the following. If a vender type is not applicable to your 
            organization, please skip that vender and move on to the next. Please separate total venders located in Dutchess County from those
            located outside of the County. Again, use your best estimates. </h5>
    </form>
        <form>
        <br><br>
        <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Vendors in Dutchess County Vendors &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Outside of Dutchess County in New York State
        </h5>
        <table class="table table-sm" style = "display: inline;">
            <thead>
                <tr>
                    <th></th>
                    <th> <br> Total Number of <br> Vendors in County </th>
                    <th>Annual Expense</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Accomodation</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row1-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row1-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Administrative and <br> support services</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row2-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row2-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Air transportation</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row3-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row3-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Ambulatory health <br> care services</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row4-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row4-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Amusements, <br> gambling, and <br> recreation <br> industries</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row5-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row5-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Broadcasting and <br> telecommunications</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row6-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row6-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Construction</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row7-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row7-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Data processing, <br> internet publishing, <br> and other <br> information servies</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row8-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row8-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Educational <br> services</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row9-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row9-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td style = "max-width: 200px;">
                        <br>Total Number of <br> Vendors in County
                    </td>
                    <td style = "max-width: 200px;">
                        <br>Annual Expense
                    </td>
                </tr>
                <tr>
                    <th scope="row">Farms</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row10-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row10-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Federal Reserve <br> banks, credit <br> intermediation, and <br> related activities</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row11-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row11-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Food and beverage <br> stores</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row12-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row12-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Food servies and <br> drinking places</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row13-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row13-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Funds, trusts, and <br> other financial <br> vehicles</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row14-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row14-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">General <br> merchandise stores</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row15-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row15-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Hospitals</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row16-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row16-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Households</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row17-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row17-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Insurance carriers <br> and related <br> activities</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row18-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row18-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td style = "max-width: 200px;">
                        <br>Total Number of <br> Vendors in County
                    </td>
                    <td style = "max-width: 200px;">
                        <br>Annual Expense
                    </td>
                </tr>
                <tr>
                    <th scope="row">Management of <br> companies and <br> enterprises</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row19-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row19-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Motion picture and <br> sound recording <br> industries</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row20-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row20-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Motor vehicle and <br> parts dealers</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row21-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row21-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Nursing and <br> residential care <br> facilities</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row22-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row22-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Other retail</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row23-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row23-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Other services *</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row24-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row24-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Other transportation <br> and support <br> activities *</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row25-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row25-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Performing arts, <br> spectator sports, <br> museums, and <br> related activities</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row26-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row26-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Printing and related <br> support activities</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row27-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row27-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td style = "max-width: 200px;">
                        <br>Total Number of <br> Vendors in County
                    </td>
                    <td style = "max-width: 200px;">
                        <br>Annual Expense
                    </td>
                </tr>
                <tr>
                    <th scope="row">Professional, <br> scientific, and <br> technical services</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row28-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row28-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Publishing <br> industries, except <br> internet (includes <br> software)</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row29-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row29-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Rail transportation</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row30-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row30-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Real estate</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row31-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row31-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Rental and leasing <br> services and <br> lessors of intangible <br> assets</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row32-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row32-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Securities, <br> commodity <br> contracts, and <br> investments</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row33-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row33-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Social assistance</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row34-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row34-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Transit and ground <br> passenger <br> transportation *</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row35-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row35-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Truck transportation</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row36-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row36-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td style = "max-width: 200px;">
                        <br>Total Number of <br> Vendors in County
                    </td>
                    <td style = "max-width: 200px;">
                        <br>Annual Expense
                    </td>
                </tr>
                <tr>
                    <th scope="row">Utilities *</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row37-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row37-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Warehousing and <br> storage</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row38-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row38-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Waste management <br> and remediation <br> services</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row39-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row39-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Water <br> transportation</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row40-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row40-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
                <tr>
                    <th scope="row">Wholesale trade</th>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row41-1" type="number" style = "width: 50%" />
                    </td>
                    <td style = "max-width: 200px;">
                        <input class="form-control" id = "" name="row41-2" type="number" style = "width: 50%" />
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table table-sm" style = "display: inline;">
            <thead>
                <tr>
                    <th></th>
                    <th>Total Number of <br> Vendors in Outside <br> County, in NYS</th>
                    <th>Annual Expense</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row"><br></th>
                <td style = "max-width: 200px;">
                    <input class="form-control" id = "" name="row1-3" type="number" style = "width: 50%" />
                </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row1-4" type="number" style = "width: 50%" />
            </td>
            </tr>
            <tr>
            <th scope="row"><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row2-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row2-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row3-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row3-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row4-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row4-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row5-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row5-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row6-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row6-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row7-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row7-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row8-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row8-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row9-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row9-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"></th>
            <td style = "max-width: 200px;">
                <br>Total Number of <br> Vendors in County
            </td>
            <td style = "max-width: 200px;">
                <br>Annual Expense
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row10-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row10-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row11-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row11-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row12-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row12-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row13-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row13-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row14-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row14-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row15-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row15-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row16-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row16-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row17-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row17-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row18-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row18-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"></th>
            <td style = "max-width: 200px;">
                <br>Total Number of <br> Vendors in County
            </td>
            <td style = "max-width: 200px;">
                <br>Annual Expense
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row19-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row19-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row20-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row20-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row21-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row21-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row22-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row22-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row23-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row23-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row24-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row24-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row25-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row25-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row26-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row26-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row27-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row27-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"></th>
            <td style = "max-width: 200px;">
                <br>Total Number of <br> Vendors in County
            </td>
            <td style = "max-width: 200px;">
                <br>Annual Expense
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row28-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row28-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row29-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row29-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row30-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row30-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row31-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row31-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row32-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row32-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row33-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row33-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row34-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row34-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row35-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row35-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row36-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row36-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"></th>
            <td style = "max-width: 200px;">
                <br>Total Number of <br> Vendors in County
            </td>
            <td style = "max-width: 200px;">
                <br>Annual Expense
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row37-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row37-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row38-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row38-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row39-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row39-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row40-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row40-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        <tr>
            <th scope="row"><br></th>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row41-3" type="number" style = "width: 50%" />
            </td>
            <td style = "max-width: 200px;">
                <input class="form-control" id = "" name="row41-4" type="number" style = "width: 50%" />
            </td>
        </tr>
        
        </tbody>
        </table>
        </form>

        <h5> *For any of the above "*" categories, please define here. </h5>
        <input class="form-control" id = "definitions" name="definitions" type="text" />

        <br><br>
        <h4> THANK YOU FOR YOUR PARTICIPATION, RESULTS WILL BE AGGREGATED AND SHARED WITH ORGANIZATIONS AS SOON AS POSSIBLE </h4>
        
  </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src = "percentchecker.js"></script>