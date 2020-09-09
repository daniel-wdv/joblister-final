<?php
// Include config file
require_once "../../config/config.php";

// Define variables and initialize with empty values
$job_title = $company = $description = $salary = $location = $contact_user = $contact_email =  "";
$job_title_err = $company_err = $description_err = $salary_err = $location_err = $contact_user_err = $contact_email_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    // Validate name
    $input_name = trim($_POST["job_title"]);
    if(empty($input_name)){
        $job_title_err = "Please enter a Job title.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $job_title_err = "Please enter a valid Job title.";
    } else{
        $job_title = $input_name;
    }

    // Validate company
    $input_company = trim($_POST["company"]);
    if(empty($input_company)){
        $company_err = "Please enter a company name.";
    } else{
        $company = $input_company;
    }

    // Validate description
    $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_err = "Please enter a valid description.";
    } else{
        $description = $input_description;
    }

    // Validate salary
    $input_salary = trim($_POST["salary"]);
    if(empty($input_salary)){
        $salary_err = "Please enter the salary amount.";
    } elseif(!ctype_digit($input_salary)){
        $salary_err = "Please enter a positive integer value.";
    } else{
        $salary = $input_salary;
    }

    // Validate location
    $input_location = trim($_POST["location"]);
    if(empty($input_location)){
        $location_err = "Please enter a valid location.";
    } else{
        $location = $input_location;
    }

    // Validate contact user
    $input_contact_user = trim($_POST["contact_user"]);
    if(empty($input_contact_user)){
        $contact_user_err = "Please enter a valid contact user.";
    } else{
        $contact_user = $input_contact_user;
    }

    // Validate contact email
    $input_contact_email = trim($_POST["contact_email"]);
    if(empty($input_contact_email)){
        $contact_email_err = "Please enter a valid contact email.";
    } else{
        $contact_email = $input_contact_email;
    }

    // Check input errors before inserting in database
    if(empty($job_title_err) && empty($company_err) && empty($description_err) && empty($salary_err) && empty($location_err) && empty($contact_user_err) && empty($contact_email_err)) {
        // Prepare an insert statement
        $sql = "UPDATE jobs SET job_title=:job_title, company=:company, description=:description, salary=:salary, location=:location, contact_user=:contact_user, contact_email=:contact_email WHERE id=:id";

        if($stmt = $link->prepare($sql)){
            $stmt->bindParam(":job_title", $param_job_title);
            $stmt->bindParam(":company", $param_company);
            $stmt->bindParam(":description", $param_description);
            $stmt->bindParam(":salary", $param_salary);
            $stmt->bindParam(":location", $param_location);
            $stmt->bindParam(":contact_user", $param_contact_user);
            $stmt->bindParam(":contact_email", $param_contact_email);
            $stmt->bindParam(":id", $param_id);

            // Set parameters
            $param_job_title = $job_title;
            $param_company = $company;
            $param_description = $description;
            $param_salary = $salary;
            $param_location = $location;
            $param_contact_user = $contact_user;
            $param_contact_email = $contact_email;
            $param_id = $id;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: ../list-jobs.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Close connection
    myunset($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM jobs WHERE id = :id";
        if($stmt = $link->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":id", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Retrieve individual field value
                    $job_title = $row["job_title"];
                    $company = $row["company"];
                    $description = $row["description"];
                    $salary = $row["salary"];
                    $location = $row["location"];
                    $contact_user = $row["contact_user"];
                    $contact_email = $row["contact_email"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }

            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);

        // Close connection
        unset($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Job</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>Update Job</h2>
                </div>
                <p>Please edit the input values and submit to update the job.</p>
                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group <?php echo (!empty($job_title_err)) ? 'has-error' : ''; ?>">
                        <label>Job Title</label>
                        <input type="text" name="job_title" class="form-control" value="<?php echo $job_title; ?>">
                        <span class="help-block"><?php echo $job_title_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($company_err)) ? 'has-error' : ''; ?>">
                        <label>Company</label>
                        <input type="text" name="company" class="form-control" value="<?php echo $job_title; ?>">
                        <span class="help-block"><?php echo $company_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                        <label>Description</label>
                        <input type="text" name="description" class="form-control" value="<?php echo $description; ?>">
                        <span class="help-block"><?php echo $description_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                        <label>Salary</label>
                        <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
                        <span class="help-block"><?php echo $salary_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($location_err)) ? 'has-error' : ''; ?>">
                        <label>Location</label>
                        <input type="text" name="location" class="form-control" value="<?php echo $location; ?>">
                        <span class="help-block"><?php echo $location_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($contact_user_err)) ? 'has-error' : ''; ?>">
                        <label>Contact User</label>
                        <input type="text" name="contact_user" class="form-control" value="<?php echo $contact_user; ?>">
                        <span class="help-block"><?php echo $contact_user_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($contact_email_err)) ? 'has-error' : ''; ?>">
                        <label>Contact Email</label>
                        <input type="text" name="contact_email" class="form-control" value="<?php echo $contact_email; ?>">
                        <span class="help-block"><?php echo $contact_email_err;?></span>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="../pages/list-jobs.php" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>