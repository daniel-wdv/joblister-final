<?php include '../templates/header.php'; ?>
<?php require_once '../models/create.php'; ?>




    <div class="create-company">
        <div class="company-box">
                <div class="page-header">
                    <h2>Create Job</h2>
                </div>
                <p>Please fill this form and submit to add a job.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype='multipart/form-data'>
                    <div class="form-group <?php echo (!empty($job_title_err)) ? 'has-error' : ''; ?>">
                        <label>Job Title</label>
                        <input type="text" name="job_title" class="form-control" value="<?php echo $job_title; ?>">
                        <span class="help-block"><?php echo $job_title_err;?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($company_err)) ? 'has-error' : ''; ?>">
                        <label>Company</label>
                        <input type="text" name="company" class="form-control" value="<?php echo $company; ?>">
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
                    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                    <a href="../pages/list-jobs.php" class="btn btn-default">Cancel</a>
                </form>
        </div>
    </div>


<?php include '../templates/footer.php'; ?>
