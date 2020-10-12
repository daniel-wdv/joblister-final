<?php include '../templates/header.php'; ?>
<?php include '../models/company-create.php'; ?>

    <div class="main-box">
        <div class="outer-box">

            <div class="left-menu">
                <div class="left-input left-input-margin left-input-size">
                    <svg class="svg-size-2 svg-tabs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <a class="p-size" href="my-account.view.php">Account Info</a>
                </div>
                <div class="left-input left-input-margin left-input-size">
                    <svg class="svg-size-2 svg-tabs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.496 2.132a1 1 0 00-.992 0l-7 4A1 1 0 003 8v7a1 1 0 100 2h14a1 1 0 100-2V8a1 1 0 00.496-1.868l-7-4zM6 9a1 1 0 00-1 1v3a1 1 0 102 0v-3a1 1 0 00-1-1zm3 1a1 1 0 012 0v3a1 1 0 11-2 0v-3zm5-1a1 1 0 00-1 1v3a1 1 0 102 0v-3a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    <a class="p-size" href="#">Company</a>
                </div>
                <div class="left-input left-input-margin left-input-size">
                    <svg class="svg-size-2 svg-tabs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path><path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path></svg>
                    <a class="p-size" href="">My Jobs</a>
                </div>
                <div class="left-input left-input-size">
                    <svg class="svg-size-2 svg-tabs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                    <a class="p-size" href="">Change Password</a>
                </div>
            </div>


            <div class="right-box">
                <div class="dashboard-title">
                    <h4>My companies</h4>
                </div>

                <div class="create-company-btn">
                    <div class="create-company-plus">
                        <a class="text-underline" href="company-create.view.php" type="button">Create Company
                        <svg class="svg-size-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg></a>
                    </div>
                </div>
                <?php $sql = "SELECT * FROM my_company WHERE user_id = {$_SESSION['user_id']}";
                    if($result = $link->query($sql)){
                         if($result->rowCount() > 0){ ?>
                           <?php while($row = $result->fetch()){ ?>
                                 <div class="companies-btn">
                                      <div class="companies-list">
                                          <a class='text-underline' href='company-update.view.php?id=<?php echo $row['id'] ?>' type='button'><?php echo "<svg class='svg-size-2' fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z' clip-rule='evenodd'></path></svg>" . $row['company'];?></a>
                                      </div>
                                 </div>
                           <?php }} else {
                                         echo "<p class='lead'><em>No records were found.</em></p>";
                    }}  ?>
                    </div>
                </div>
            </div>


<?php include '../templates/footer.php';




