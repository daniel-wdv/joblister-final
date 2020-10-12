<?php require_once '../pages/read.php'; ?>
<?php include '../templates/header.php'; ?>


        <div class="create-company">
             <div class="company-box">
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
                        <?php if($_SESSION['user_id'] == $row["user_id"]) : ?>
                            <?php echo "<a href='../views/update.view.php?id=". $row['id'] ."' class='btn btn-primary' title='Update Record' data-toggle='tooltip'>Update</a>" ?>
                            <?php echo "<a href='../views/delete.view.php?id=". $row['id'] ."' class='btn btn-danger' title='Delete Record' data-toggle='tooltip'>Delete</a>" ?>
                        <?php endif; ?>
                        <a href="../models/list-jobs.php" class="btn btn-default">Back</a>
                    </div>
       </div>
             </div>

<?php include '../templates/footer.php'; ?>