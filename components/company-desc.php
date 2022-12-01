<?php 
if(isset($_POST['company-logo-save'])) {
  $company_logo         = $_FILES['company-logo-change']['name'];
  $company_logo_temp    = $_FILES['company-logo-change']['tmp_name'];
  move_uploaded_file($company_logo_temp, "./images/$company_logo");
  $company->updateCompanyLogo($company_logo, $companyId);
  header("Location: company-page?page-id={$companyId}");
}
if(isset($_POST['company-desc-save'])) {
  $company_desc_name        = $_POST['company-desc-name'];
  $company_desc_industry    = $_POST['company-desc-industry'];
  $company_desc_size        = $_POST['company-desc-size'];
  $company_desc_location    = $_POST['company-desc-location'];
  $company->updateCompanyFields($company_desc_name, $company_desc_industry, $company_desc_size, $company_desc_location, $companyId);
  header("Location: company-page?page-id={$companyId}");
}

?>
<div class="company-main-desc">
  <div class="company-main-logo">
    <a href="" data-bs-toggle="modal" data-bs-target="#companyLogo"></a>
    <?php if($companyLogo) : ?>
      <img src="./images/<?php echo $companyLogo; ?>" alt="">
    <?php else : ?>
      <img src="./images/building-placeholder.jpg" alt=""> 
    <?php endif; ?>
  </div>
  <div class="company-main-info">
    <h1><?php echo $companyName; ?></h1>
    <p><?php echo $companyIndustry; ?> • <?php echo $companyEmpCount; ?> • <?php echo $companyLocation; ?></p>
  </div>
  <?php if($username === $companyOwner) : ?>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#companyDesc"><i class="fa-solid fa-pen-clip"></i></button>
  <?php endif; ?>
</div>

<div class="modal company-logo fade" id="companyLogo" tabindex="-1" aria-labelledby="companyLogo" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-content-close">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <div class="company-logo-form">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="company-logo-form">
            <div class="company-container-placeholder">
              <div class="logo-placeholder">
                <?php if($companyLogo) : ?>
                <img src="./images/<?php echo $companyLogo; ?>" class="company-logo-image">
                <?php else : ?>
                  <img src="./images/building-placeholder.jpg" class="company-logo-image">
                <?php endif; ?>
              </div>
            </div>
            <div class="company-logo-buttons">
              <a onClick="triggerClickCompanyLogo()" id="companyLogoDisplay"><i class="fa-solid fa-image"></i>Choose Photo</a>
              <input accept="image/png, image/jpeg" type="file" name="company-logo-change" onchange="displayCompanyDescLogo(this)" id="companyLogoChange" style="display: none;">
              <input type="submit" value="Change Logo" name="company-logo-save" class="company-logo-save">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal company-desc modal fade" id="companyDesc" tabindex="-1" aria-labelledby="companyDesc" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-content-close">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="company-desc-form">
        <form action="" method="POST">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="company-desc-name" <?php if($companyName) : ?>value="<?php echo $companyName; ?>"<?php endif; ?>>
            <label for="floatingInput">Company Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="company-desc-industry" <?php if($companyIndustry) : ?>value="<?php echo $companyIndustry; ?>"<?php endif; ?>>
            <label for="floatingInput">Company Industry</label>
          </div>
          <select class="form-select mb-3 company-page-size" name="company-desc-size">
            <?php if($companyEmpCount) : ?>
              <option value="<?php echo $companyEmpCount; ?>" selected><?php echo $companyEmpCount; ?></option>
            <?php else : ?>
              <option></option>
            <?php endif; ?>
            <option value="0-1 employees">0-1 employees</option>
            <option value="2-10 employees">2-10 employees</option>
            <option value="11-50 employees">11-50 employees</option>
            <option value="50-200 employees">50-200 employees</option>
            <option value="201-1000 employees">201-1000 employees</option>
          </select>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="company-desc-location" <?php if($companyLocation) : ?>value="<?php echo $companyLocation; ?>"<?php endif; ?>>
            <label for="floatingInput">Location</label>
          </div>
          <div class="company-desc-submit-container">
            <input type="submit" value="Update" name="company-desc-save" class="btn btn-primary w-50">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>