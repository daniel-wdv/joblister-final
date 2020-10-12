<?php
// Include config file
require_once "../../config/config.php";

if(!isset($_SESSION['user_id'])){
    header("Location:../views/login.view.php");
}

// Define variables and initialize with empty values
$company = $location = $contact_user = $contact_email = $file_name = "";
$company_err = $location_err = $contact_user_err = $contact_email_err = "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate company
    $input_company = trim($_POST["company"]);
    if(empty($input_company)){
        $company_err = "Please enter a company name.";
    } else{
        $company = $input_company;
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

    //Validate image upload
    $filename = $_FILES["filename"]["name"];
    $tempname = $_FILES["filename"]["tmp_name"];
    $folder = "../assets/company_images/".$filename;



// Check input errors before inserting in database
    if(empty($company_err) && empty($location_err) && empty($contact_user_err) && empty($contact_email_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO my_company (user_id, company, location, filename, contact_user, contact_email) VALUES ({$_SESSION['user_id']}, :company, :location, '$filename', :contact_user, :contact_email)";

        if($stmt = $link->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":company", $param_company);
            $stmt->bindParam(":location", $param_location);
            $stmt->bindParam(":contact_user", $param_contact_user);
            $stmt->bindParam(":contact_email", $param_contact_email);

            // Set parameters
            $param_company = $company;
            $param_location = $location;
            $param_contact_user = $contact_user;
            $param_contact_email = $contact_email;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: ../models/company.view.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
        }

        // Close statement
        unset($stmt);
    }

    // Close connection
    unset($link);
}


?>