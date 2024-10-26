<!DOCTYPE html>
<html> <!--Declare html for the document-->
<head> <!--Open the header tag this is where meta info goes-->
    <meta charset="UTF-8"> <!--Declare the characterset-->
    <title>Practice 4</title> <!--Set the title of the page as Practice 4-->
</head> <!--Close the head tag-->
<body> <!--Open up the head tag, this is where the visible html and php will go-->
    <h1>EECS 348 Practice 4</h1> <!--H1 tag that titles the page-->
    <form method="post"> <!--Make a form with a method of post-->
        <label for="number">Enter a number:</label> <!--Prompt user to enter a number-->
        <input type="number" id="number" name="number" min="1" required> <!--Allow input for a number with a minimum of 1 and make it required-->
        <input type="submit" value="Generate Table"> <!--Have a button to generate the table-->
    </form> <!--Close the form tag-->

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['number'])) { //If the server request method is post (meaning user submitted the form) and the number was successfully recieved
        $number = (int)$_POST['number']; //set number to the value

        if ($number > 0) { //double check the number is positive even though the html form should handle this
            echo "<table border='1' style='border-collapse:collapse;'>"; //echo out a table tag with a style to add clean borders
            echo "<tr><th></th>"; //Echo out the table header tags
            for ($i = 1; $i <= $number; $i++) { //for loop up to the number entered
                echo "<th>$i</th>"; //echo out the number to go in the header part
            }
            echo "</tr>"; //echo out a row close tag

            for ($i = 1; $i <= $number; $i++) { //for loop up to the number again
                echo "<tr><th>$i</th>"; //echo out the number for the first element of each row (vertical header row
                for ($j = 1; $j <= $number; $j++) { //for loop up to number again
                    echo "<td>" . ($i * $j) . "</td>"; //echo out the product
                }
                echo "</tr>"; //echo out a row close tag
            }
            echo "</table>"; //echo out a table close tag
        } else { //if the number is not positive
            echo "Please enter a positive integer."; //tell user to enter a valid number
        }
    }
    ?>
</body>
</html>
