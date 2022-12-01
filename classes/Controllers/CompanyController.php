<?php

class CompanyController {
  public $company;

  public function __construct() {
    $this->company = new Company();
  }

  public function displayCompany($userName) {
    $this->company->getCompany($userName);
  }

  public function saveCompanyBg($companyBg, $companyId) {
    $this->company->setCompanyBg($companyBg, $companyId);
  }

  public function updateCompanyLogo($companyLogo, $companyId) {
    $this->company->setCompanyLogo($companyLogo, $companyId);
  }

  public function updateCompanyFields($name, $industry, $size, $location, $companyId) {
    $this->company->setCompanyFields($name, $industry, $size, $location, $companyId);
  }

  public function updateCompanyTagline($tagline, $companyId) {
    $this->company->setCompanyTagline($tagline, $companyId);
  }

  public function changeUserInfoHasCompany($userId) {
    $this->company->userInfoHasCompany($userId);
  }

  public function saveCompany($compName, $compOwner, $compLogo, $companyEmpCount, $compIndustry, $compTagline, $compLocation) {
    $this->company->setCompany($compName, $compOwner, $compLogo, $companyEmpCount, $compIndustry, $compTagline, $compLocation);
  }
}