<?php 
if(isset($_POST['company-about-save'])) {
  $company_about = $_POST['company-about'];
  $company->updateCompanyTagline($company_about, $companyId);
  header("Location: company-page?page-id={$companyId}");
}
?>
<div class="company-about shadow-sm mb-2 bg-body rounded">
  <h2>About</h2>
  <p><?php echo $companyTagline; ?></p>
  <?php if($username === $companyOwner) : ?>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#companyAbout"><i class="fa-solid fa-pen-clip"></i></button>
  <?php endif; ?>
</div>

<div class="modal user-info-modal fade" id="companyAbout" tabindex="-1" aria-labelledby="companyAbout" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-content-close">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="company-about-form">
        <form action="" method="POST">
          <div class="company-about-text">
            <label for="company-about" class="form-label">Edit About</label>
            <textarea class="form-control" id="company-about" maxlength="160" name="company-about"><?php echo $companyTagline ; ?></textarea>
            <div class="company-about-count">
              <span id="about-current">0</span>
              <span id="about-maximum">/ 160</span>
            </div>
          </div>
          <div class="company-about-submit-container">
            <input type="submit" value="Update About" name="company-about-save" class="btn btn-primary w-50">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>