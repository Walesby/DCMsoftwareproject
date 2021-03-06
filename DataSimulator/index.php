<?php
// Loads the DatabaseConnection.php file that will connect the webpage to the database
include 'php/DatabaseConnection.php';
?>
<!DOCTYPE html>
<head>
	<!-- Loads the required style sheet and script files that bootstrap requires for styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>		
    <!-- Loads the created javascript file for the data simulator named simulator.js -->
	<script type="text/javascript" src="js/simulator.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Data Simulator Form</title>
    <style>
        #Temperature {
            float: left;
        }
        #Vibrations{
	        float:left;
        }
        #submitButton{
            margin-left: 10px;
            margin-top: 10px;
        }
        #resetButton{
            margin-top: 10px;
            margin-left: 10px;
        }
    </style>
</head>
<body>
<div id ="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<!-- Creates a form that will post the different gathered information to the Simulation.php file-->
			<form target="_blank" action="https://handlingsoftware.azurewebsites.net/DataSimulator/Simulation.php" method="post" id= "simulator">
				<div class="row">
					<!-- Blank div for bootstrap styling -->
                    <div class="col-sm-4"></div>
					<!-- Holds the Customer, Address, Machine and Motor Selection part of the form -->
                    <div class="col-sm-4" id="selections">
                        <h1>Selections</h1>                        
                        <label for="customers">Customers:</label>
                        <select id="customers" name="customers">
                            <?php
                                //Gets all of the customers from the database and displays them in the customer drop down menu 
                                $selectCustomersSQL = "SELECT * FROM Customer";
                                $customerSelectStatement = sqlsrv_query($connection,$selectCustomersSQL);
                                while($row = sqlsrv_fetch_array($customerSelectStatement,SQLSRV_FETCH_ASSOC)){
                                    echo '<option value="' . $row["CustomerID"] . '">' . $row["Name"] . '</option>', PHP_EOL;
                                }
                            ?>
                        </select>
                        <label for="address">Address:</label>
                        <select id="address" name="address" disabled="true"></select>
                        <label for="machine">Machine:</label>
						<select id="machine" name="machine" disabled="true"></select>
                        <label for="motor">Motor:</label>
                        <select id="motor" name="motor" disabled="true"></select>
                        <br>
                        <label for="cycles">Cycles: </label>
					    <input type="number" class="form-control" id="cycles" name="cycles">
                    </div>
					<!-- Blank div for bootstrap styling -->
                    <div class="col-sm-4"></div>
                </div>
				<!-- Holds the Temperature min and max value part of the form -->
                <div class="col-sm-6" id="Temperature">
                    <h2>Temperature</h2>  				    
                    <label for="minValueTemp">Min Value: </label>
					<input type="number" class="form-control" id="minValueTemp" name="minValueTemp">
                    <label for="maxValueTemp">Max Value: </label>
					<input type="number" class="form-control" id="maxValueTemp" name="maxValueTemp">
                </div>
				<!-- Holds the Value min and max value part of the form -->
                <div class="col-sm-6" id="Vibrations">
                    <h2>Vibrations</h2>  				    
                    <label for="minValueVib">Min Value: </label>
					<input type="number" class="form-control" id="minValueVib" name="minValueVib">
                    <label for="maxValueVib">Max Value: </label>
					<input type="number" class="form-control" id="maxValueVib" name="maxValueVib">                   
                </div>
				<!-- Submits the form to the Simulation.php file -->
                <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
				<!-- Resets the form -->
                <button type="reset" class="btn btn-primary" id="resetButton">Reset</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>
