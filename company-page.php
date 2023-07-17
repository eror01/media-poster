<?php 
include "header.php"; 
$companyLogo          = $company->company->company_logo; 
$companyOwner          = $company->company->company_owner; 
$companyIndustry      = $company->company->company_industry; 
$companyEmpCount      = $company->company->company_emp_count; 
$companyTagline       = $company->company->company_tagline; 
$companyName          = $company->company->company_name;
$companyLocation      = $company->company->company_location;
$companyBg            = $company->company->company_bg;
?>

<div class="navigation"><?php include "components/nav-top.php"; ?></div>
<div class="container">
  <section class="company">
    <div class="row">
      <div class="col-9">
        <div class="company-overview">
          <?php 
          include "components/company-main.php"; 
          include "components/company-tabs.php"; 
          include "components/company-about.php"; ?>
        </div>
      </div>
      <div class="col-3">
        <div class="company-connections shadow-sm p-3 mb-2 bg-body rounded">
          Connections that work here
        </div>
      </div>
    </div>
  </section>
</div>

<?php
include "footer.php"; ?>