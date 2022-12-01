<?php

class Company extends Db {

  public $company_id;
  public $company_name;
  public $company_owner;
  public $company_logo;
  public $company_bg;
  public $company_emp_count;
  public $company_industry;
  public $company_tagline;
  public $company_location;

  public function setCompanyInfo($compId, $compName, $compOwner, $compLogo, $compBg, $compEmpCount, $compIndustry, $compTagline, $compLocation) {
    $this->company_id             = $compId;
    $this->company_name           = $compName;
    $this->company_owner          = $compOwner;
    $this->company_logo           = $compLogo;
    $this->company_bg             = $compBg;
    $this->company_emp_count      = $compEmpCount;
    $this->company_industry       = $compIndustry;
    $this->company_tagline        = $compTagline;
    $this->company_location       = $compLocation;
  }

  public function getCompanyInfo() {
    return $this->company_id;
    return $this->company_name;
    return $this->company_owner;
    return $this->company_logo;
    return $this->company_bg;
    return $this->company_emp_count;
    return $this->company_industry;
    return $this->company_tagline;
    return $this->company_location;
  }

  public function setCompanyBg($companyBg, $companyId) {
    $stmt = $this->connect()->prepare('UPDATE company SET company_bg = ? WHERE company_id = ?');
    $stmt->execute(array($companyBg, $companyId));
  }

  public function setCompanyLogo($companyLogo, $companyId) {
    $stmt = $this->connect()->prepare('UPDATE company SET company_logo = ? WHERE company_id = ?');
    $stmt->execute(array($companyLogo, $companyId));
  }

  public function setCompanyFields($name, $industry, $size, $location, $companyId) {
    $stmt = $this->connect()->prepare('UPDATE company SET company_name = ?, company_industry = ?, company_employees_count = ?, company_location = ? WHERE company_id = ?');
    $stmt->execute(array($name, $industry, $size, $location, $companyId));
  } 

  public function setCompanyTagline($tagline, $companyId) {
    $stmt = $this->connect()->prepare('UPDATE company SET company_tagline = ? WHERE company_id = ?');
    $stmt->execute(array($tagline, $companyId));
  }

  public function userInfoHasCompany($userId) {
    $stmt = $this->connect()->prepare('UPDATE user_info SET user_info_company = 1 WHERE user_info_uid = ?');
    $stmt->execute(array($userId));
  }

  public function getCompany($userName) {
    $stmt = $this->connect()->prepare('SELECT * FROM company where company_owner = ?');
    $stmt->execute(array($userName));
    while($row = $stmt->fetch()) {
      $this->setCompanyInfo(
        $row['company_id'], $row['company_name'], $row['company_owner'], $row['company_logo'], $row['company_bg'], $row['company_employees_count'],
        $row['company_industry'], $row['company_tagline'], $row['company_location']
      );
    }
  }

  public function setCompany($compName, $compOwner, $compLogo, $companyEmpCount, $compIndustry, $compTagline, $compLocation) {
    $stmt = $this->connect()->prepare('INSERT INTO company(company_name, company_owner, company_logo, company_employees_count, company_industry, company_tagline, company_location) VALUES(?, ?, ?, ?, ?, ?, ?);');
    $stmt->execute(array($compName, $compOwner, $compLogo, $companyEmpCount, $compIndustry, $compTagline, $compLocation));
  }

}