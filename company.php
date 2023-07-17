<?php 
include "header.php"; 
if(isset($_POST['create-company'])) {
  $comp_name = validateInput($_POST['comp-name']);
  $comp_industry = validateInput($_POST['comp-industry']);
  $comp_tagline = validateInput($_POST['comp-tagline']);
  $comp_size = validateInput($_POST['company-size']);
  $comp_type = validateInput($_POST['company-type']);
  $comp_location = validateInput($_POST['comp-location']);
  $comp_logo = $_FILES['company-logo']['name'];
  $comp_logo_temp = $_FILES['company-logo']['tmp_name'];
  move_uploaded_file($comp_logo_temp, "./images/$comp_logo");
  $company->saveCompany($comp_name, $username, $comp_logo, $comp_size, $comp_industry, $comp_tagline, $comp_location);
  $company->changeUserInfoHasCompany($userID);
  header("Location: u?uid={$userID}");
}
?>
<div class="navigation"><?php include "components/nav-top.php"; ?></div>
<div class="container">
  <div class="row">
    <div class="col-7 m-auto">
      <section class="company-page">
        <form action="" method="POST" enctype="multipart/form-data" class="shadow-sm py-3 bg-body rounded">
          <div class="mb-3">
            <label for="comp-name" class="form-label">Name*</label>
            <input type="text" class="form-control" name="comp-name" id="comp-name" placeholder="Add your organization name" required>
          </div>
          <div class="mb-3">
            <label for="comp-industry" class="form-label">Industry</label>
            <input type="text" class="form-control" name="comp-industry" id="comp-industry" placeholder="e.g Information Services" required>
          </div>
          <div class="mb-3">
            <label for="comp-location" class="form-label">Location</label>
            <input type="text" class="form-control" name="comp-location" id="comp-location" placeholder="e.g Belgrade, Serbia" required>
          </div>
          <select class="form-select mb-3 company-page-size" name="company-size">
            <option></option>
            <option value="0-1 employees">0-1 employees</option>
            <option value="2-10 employees">2-10 employees</option>
            <option value="11-50 employees">11-50 employees</option>
            <option value="50-200 employees">50-200 employees</option>
            <option value="201-1000 employees">201-1000 employees</option>
          </select>
          <select class="form-select mb-3 company-page-type" name="company-type">
            <option></option>
            <option value="public company">Public Company</option>
            <option value="non protit">Non Profit</option>
            <option value="privately held">Privately Held</option>
          </select>
          <div class="mb-3 company-page-logo">
            <div class="company-page-file">
              <a onClick="triggerClickCompany()">
                <span>
                  <i class="fa-solid fa-arrow-up-from-bracket"></i>
                  Choose file
                </span>
                <span>Upload to see preview</span>
              </a>
              <input accept="image/png, image/jpeg" type="file" name="company-logo" onchange="displayComapnyLogo(this)" id="companyLogoDisplay" style="display: none;">
            </div>
          </div>
          <div class="mb-3">
            <label for="comp-taglin" class="form-label">Tagline</label>
            <textarea class="form-control" maxlength="160" name="comp-tagline" required id="comp-tagline" placeholder="e.g An information services firm helping small businesses succeed"></textarea>
            <div class="char-count">
              <span id="current">0</span>
              <span id="maximum">/ 160</span>
            </div>
          </div>
          <div class="mb-3">
            <div class="company-page-create">
              <?php if($user_info_company == 0 ) : ?>
                <input type="submit" name="create-company" class="btn btn-primary" value="Create Company">
              <?php endif; ?>
            </div>
          </div>
        </form>
      </section>
    </div>
    <div class="col-5">
      <div class="company-page-preview bg-body">
        <h2 class="company-page-preview-title">Company Preview</h2>
        <div class="company-page-preview-body">
          <div class="company-page-preview-info">
            <img src="./images/building-placeholder.jpg" id="company-logo-preview" alt="Company Placeholder">
            <h3 class="company-name">Company Name</h3>
            <p class="company-tagline">Tagline</p>
            <span class="company-industry">Industry</span>
            <button class="btn btn-primary"><i class="fa-solid fa-plus"></i>Follow</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php 
include "footer.php"; ?>