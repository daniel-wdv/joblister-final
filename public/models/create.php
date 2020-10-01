<?php
// Include config file
require_once "../../config/config.php";

if(!isset($_SESSION['user_id'])){
    header("Location:../views/login.view.php");
}

// Define variables and initialize with empty values
$job_title = $company = $description = $salary = $location = $contact_user = $contact_email =  $file_name = "";
$job_title_err = $company_err = $description_err = $salary_err = $location_err = $contact_user_err = $contact_email_err = "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate job title
    $input_name = trim($_POST["job_title"]);
    if(empty($input_name)){
        $job_title_err = "Please enter a Job Title.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $job_title_err = "Please enter a valid Job Title name.";
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
        $sql = "INSERT INTO jobs (job_title, user_id, company, description, salary, location, contact_user, contact_email) VALUES (:job_title, {$_SESSION['user_id']}, :company, :description, :salary, :location, :contact_user, :contact_email)";

        if($stmt = $link->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":job_title", $param_job_title);
            $stmt->bindParam(":company", $param_company);
            $stmt->bindParam(":description", $param_description);
            $stmt->bindParam(":salary", $param_salary);
            $stmt->bindParam(":location", $param_location);
            $stmt->bindParam(":contact_user", $param_contact_user);
            $stmt->bindParam(":contact_email", $param_contact_email);

            // Set parameters
            $param_job_title = $job_title;
            $param_company = $company;
            $param_description = $description;
            $param_salary = $salary;
            $param_location = $location;
            $param_contact_user = $contact_user;
            $param_contact_email = $contact_email;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: ../models/list-jobs.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Close connection
    unset($link);
}


?>