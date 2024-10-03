<!DOCTYPE html>
<html lang="en">
<head>
    <title>Calculator</title>
</head>
<body>

<form method="post">   
            First number: <input type="number" required id="num1" name="num1" value="<?php echo isset($_POST['num1']) ? $_POST['num1'] : ''; ?>"><br>
            Operand (+, -, x or /): <select name="operand" id="operand">
                                        <option value="+"> Add +<option>
                                        <option value="-"> Subtract -<option>
                                        <option value="x"> Multiply x<option>
                                        <option value="/"> Divide ÷<option>
                                    </select><br>
            Second number: <input type="number" id="num2" required name="num2" value="<?php echo isset($_POST['num2']) ? $_POST['num2'] : ''; ?>"><br>
            <input type="submit" value="Submit"><br>
</form>

<h2>Result:</h2>
<?php
    $result = "";
    //check to see if form submit method is POST
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        //Check that a value has been entered in all fields else return message
        if (isset($_POST["operand"]) && isset($_POST["num1"]) && isset($_POST["num2"])) {
            //Addtion
            if ($_POST["operand"] == "+") {
                $result = $_POST["num1"] + $_POST["num2"];
            }
            //Subtraction
            elseif ($_POST["operand"] == "-") {
                $result = $_POST["num1"] - $_POST["num2"];
            }
            //multiplication
            elseif ($_POST["operand"] == "x") {
                $result = $_POST["num1"] * $_POST["num2"];
            }
            //Division
            elseif ($_POST["operand"] == "/") {
                if ($_POST["num2"] != 0) {
                    $result = $_POST["num1"] / $_POST["num2"];
                } else {
                    $result = "Cannot divide by zero!";
                }
            }
        }
        else {
            $result = "Please enter a value for all fields.";
    }
}
echo $result;
?>         

</body>
</html>