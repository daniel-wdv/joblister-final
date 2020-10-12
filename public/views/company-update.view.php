<?php require_once '../pages/company-update.php'; ?>
<?php include '../templates/header.php'; ?>

<div class="create-company">
    <div class="company-box">
                <div class="page-header">
                    <h2>Update Company</h2>
                </div>
                <p>Please edit the input values and submit to update your company.</p>
                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group <?php echo (!empty($company_err)) ? 'has-error' : ''; ?>">
                        <label>Company</label>
                        <input type="text" name="company" class="form-control" value="<?php echo $company; ?>">
                        <span class="help-block"><?php echo $company_err;?></span>
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
                    <div class="upload-margin ">
                        <label>Please upload your company logo:</label>
                        <input type="file" name="filename" value="<?php echo $file_name; ?>"/>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                    <input type="submit" class="btn btn-primary" value="Update">
                    <a href="../models/list-jobs.php" class="btn btn-default">Cancel</a>
                </form>
    </div>
</div>


<?php include '../templates/footer.php'; ?>
