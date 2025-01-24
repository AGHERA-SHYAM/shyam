<?php
// Initialize the result variable
$result = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve inputs from the form
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];

    // Validate inputs are numeric
    if (is_numeric($num1) && is_numeric($num2)) {
        switch ($operation) {
            case 'addition':
                $result = $num1 + $num2;
                break;
            case 'subtraction':
                $result = $num1 - $num2;
                break;
            case 'multiplication':
                $result = $num1 * $num2;
                break;
            case 'division':
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    $result = "Cannot divide by zero!";
                }
                break;
            default:
                $result = "Invalid operation.";
        }
    } else {
        $result = "Please enter valid numbers.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
</head>

<body>
    <h1>Simple PHP Calculator</h1>

    <form method="post">
        <!-- Input for first number -->
        <label for="num1">Enter first number: </label>
        <input type="number" name="num1" id="num1" required><br><br>

        <!-- Input for second number -->
        <label for="num2">Enter second number: </label>
        <input type="number" name="num2" id="num2" required><br><br>

        <!-- Dropdown for operation selection -->
        <label for="operation">Select operation: </label>
        <select name="operation" id="operation" required>
            <option value="addition">Addition</option>
            <option value="subtraction">Subtraction</option>
            <option value="multiplication">Multiplication</option>
            <option value="division">Division</option>
        </select><br><br>

        <!-- Submit button -->
        <input type="submit" value="Calculate">
    </form>

    <!-- Display result if available -->
    <?php if ($result !== ''): ?>
    <h3>Result:
        <?php echo htmlspecialchars($result); ?>
    </h3>
    <?php endif; ?>
</body>

</html>