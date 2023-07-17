<?php 
if(isset($_POST['company-bg-save'])) {
  $company_bg         = $_FILES['company-background']['name'];
  $company_bg_temp    = $_FILES['company-background']['tmp_name'];
  move_uploaded_file($company_bg_temp, "./images/$company_bg");
  $company->saveCompanyBg($company_bg, $companyId);
  header("Location: company-page?page-id={$companyId}");
}
?>
<div class="company-main-bg">
  <?php if($companyBg) : ?>
    <img src="./images/<?php echo $companyBg; ?>" alt="">
  <?php else : ?>
    <img src="./images/find_partner.png" alt="">
  <?php endif; ?>
  <?php if($username === $companyOwner) : ?>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#companyBg"><i class="fa-solid fa-pen-clip"></i></button>
  <?php endif; ?>
</div>

<div class="modal company-bg fade" id="companyBg" tabindex="-1" aria-labelledby="companyBg" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="company-bg-form">
        <form action="" method="POSt" enctype="multipart/form-data">
          <div class="company-bg-hero">
            <div class="company-bg-placeholder">
              <?php if($companyBg) : ?>
                <img src="./images/<?php echo $companyBg; ?>" alt="" class="companybg-hero">
              <?php else : ?>
                <img src="./images/find_partner.png" alt="" class="companybg-hero">
              <?php endif; ?>
            </div>
            <div class="company-bg-file">
              <input accept="image/png, image/jpeg" type="file" name="company-background" onchange="displayCompanyBg(this)">
              <input type="submit" value="Save Background" class="btn btn-primary" name="company-bg-save">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>