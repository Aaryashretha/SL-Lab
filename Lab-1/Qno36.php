

<?php 
$error = ""; 
$tax = 0; 
$gender = "";
$marital_status = "";
$annual_income = "";
$monthlySalary = "";

// Check for form submission 
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    // Check if all fields are filled 
    if (isset($_POST['gender']) && isset($_POST['marital_status']) && isset($_POST['annualincome']) && isset($_POST['monthly_salary'])) { 
        $gender = $_POST['gender']; 
        $marital_status = $_POST['marital_status']; 
        $annual_income = $_POST['annualincome']; 
        $monthlySalary = $_POST['monthly_salary']; 
        
        // Check for valid input 
        if (!empty($gender) && !empty($marital_status) && !empty($annual_income) && !empty($monthlySalary)) { 
            $annual_income = floatval($annual_income); 
            
            // Calculate tax based on conditions 
            if ($marital_status == 'married') { 
                
                if ($annual_income <= 450000) { 
                    $tax = $annual_income * 0.01; 
                } elseif ($annual_income <= 550000) { 
                    $tax = 4500 + (($annual_income - 450000) * 0.1); 
                } elseif ($annual_income <= 750000) { 
                    $tax = 9500 + (($annual_income - 550000) * 0.2); 
                } elseif ($annual_income <= 1300000) { 
                    $tax = 29500 + (($annual_income - 750000) * 0.3); 
                } else { 
                    $tax = 82500 + (($annual_income - 1300000) * 0.35); 
                } 
            } elseif ($marital_status == 'unmarried') { 
                
                if ($annual_income <= 400000) { 
                    $tax = $annual_income * 0.01; 
                } elseif ($annual_income <= 500000) { 
                    $tax = 4000 + (($annual_income - 400000) * 0.1); 
                } elseif ($annual_income <= 750000) { 
                    $tax = 14000 + (($annual_income - 500000) * 0.2); 
                } elseif ($annual_income <= 1300000) { 
                    $tax = 39000 + (($annual_income - 750000) * 0.3); 
                } else { 
                    $tax = 90000 + (($annual_income - 1300000) * 0.35); 
                } 
            }
            if ($gender == 'female') { 
                $tax -= ($tax * 0.1); // 10% discount for female 
            }
        } else { 
            $error = "All fields are required!"; 
        } 
    } else { 
        $error = "All fields are required!"; 
    } 
    
} 
?>

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title> Tax Calculator</title> 
</head> 
<body> 
    <div class="container"> 
        <h1> Tax Calculator</h1> 
        <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <fieldset>
            <div class="b-1"> 
                <label for="info" class="p-1 lblinfo br">Assessment info</label> 
                <select name="gender" class="gender br" id="gender"> 
                    <option value="male" <?php if($gender == 'male') echo 'selected'; ?>>Male</option> 
                    <option value="female" <?php if($gender == 'female') echo 'selected'; ?>>Female</option> <br><br>
                </select> 
                <select name="marital_status" class="gender" id="marital_status"> 
                    <option value="">Select</option> 
                    <option value="married" <?php if($marital_status == 'married') echo 'selected'; ?>>Married</option> 
                    <option value="unmarried" <?php if($marital_status == 'unmarried') echo 'selected'; ?>>Unmarried</option> 
                </select> <br><br>  
            <div class="flex"> 
                <label for="monthly_salary">Monthly Salary:</label> 
                <input type="number" id="monthly_salary" name="monthly_salary" value="<?php echo ($monthlySalary); ?>"><br><br> 
            </div> 
            <h3>Annual Income</h3> 
            <div class="flex"> 
                <label for="annual_income">Annual Gross Salary:</label> 
                <input type="number" id="annual_income" name="annualincome" value="<?php echo ($annual_income); ?>"><br><br>  
            </div> 
            <div class="flex"> 
            
                <input type="submit" value="Calculate Tax" class="btn-calc">  
              
            </div> 
            </fieldset>
        </form> 
    </div> 

    <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
            if ($error) { 
                echo "<h2>Error: $error</h2>"; 
            } else { 
                echo "<h2>Tax to be paid: NPR " . number_format($tax, 2) . "</h2>"; 
            } 
        } 
    ?> 
</body> 
</html>