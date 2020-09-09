<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "../../config/config.php";

    // Prepare a select statement
    $sql = "SELECT * FROM jobs WHERE id = :id";

    if($stmt = $link->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":id", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

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
                // URL doesn't contain valid id parameter. Redirect to error page
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
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
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
                    <h1>View Record</h1>
                </div>
                <div class="form-group">
                    <label>Job Title</label>
                    <p class="form-control-static"><?php echo $row["job_title"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Company</label>
                    <p class="form-control-static"><?php echo $row["company"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <p class="form-control-static"><?php echo $row["description"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Salary</label>
                    <p class="form-control-static"><?php echo $row["salary"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <p class="form-control-static"><?php echo $row["location"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Contact User</label>
                    <p class="form-control-static"><?php echo $row["contact_user"]; ?></p>
                </div>
                <div class="form-group">
                    <label>Contact Email</label>
                    <p class="form-control-static"><?php echo $row["contact_email"]; ?></p>
                </div>
                <div style="margin-bottom: 10vh;" class="">
              <?php echo "<a href='../pages/update.php?id=". $row['id'] ."' class='btn btn-primary' title='Update Record' data-toggle='tooltip'>Update</a>" ?>
              <?php echo "<a href='../pages/delete.php?id=". $row['id'] ."' class='btn btn-danger' title='Delete Record' data-toggle='tooltip'>Delete</a>" ?>
                <a href="../pages/list-jobs.php" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>