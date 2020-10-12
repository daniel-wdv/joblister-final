<?php

// Include config file
require_once "../../config/config.php";

// Define variables and initialize with empty values
$company = $location = $contact_user = $contact_email = $file_name = "";
$company_err = $location_err = $contact_user_err = $contact_email_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

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
        $sql = "UPDATE my_company SET company=:company, location=:location, filename='$filename', contact_user=:contact_user, contact_email=:contact_email WHERE id=:id";

        if($stmt = $link->prepare($sql)){

            $stmt->bindParam(":company", $param_company);
            $stmt->bindParam(":location", $param_location);
            $stmt->bindParam(":contact_user", $param_contact_user);
            $stmt->bindParam(":contact_email", $param_contact_email);
            $stmt->bindParam(":id", $param_id);

            // Set parameters
            $param_company = $company;
            $param_location = $location;
            $param_contact_user = $contact_user;
            $param_contact_email = $contact_email;
            $param_id = $id;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: ../views/company.view.php");
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM my_company WHERE id = :id";
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
                    $company = $row["company"];
                    $location = $row["location"];
                    $file_name = $row['filename'];
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
