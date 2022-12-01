$(document).ready(function() {
  $('.user-info-skills').select2({
    placeholder: "Select Your Skills",
    allowClear: true,
    closeOnSelect: false
  });
  $('.user-info-industry').select2({
    placeholder: "Select a Industry",
    allowClear: true
  });
  $('.company-page-type').select2({
    placeholder: "Select type",
    allowClear: true,
    closeOnSelect: false
  });
  $('.company-page-size').select2({
    placeholder: "Select size",
    allowClear: true
  });
  $('#comp-tagline').keyup(function() {
    const characterCount = $(this).val().length,
      current = $('#current'), maximum = $('#maximum'), theCount = $('.char-count');

    current.text(characterCount);
  });
  const aboutCurrent = $('#about-current');
  const companyAbout = $('#company-about').val().length;
  aboutCurrent.text(companyAbout);
  $('#company-about').keyup(function() {
    const characterCount = $(this).val().length,
      current = $('#about-current'), maximum = $('#about-maximum'), theCount = $('.company-about-count');

    current.text(characterCount);
  });
  $('#comp-name').keyup(function() {
    const compName = $('#comp-name').val(), companyName = $('.company-name');
    companyName.text(compName);
  });
  $('#comp-tagline').keyup(function() {
    const compTagline = $('#comp-tagline').val(), companyTagline = $('.company-tagline');
    companyTagline.text(compTagline);
  });
  $('#comp-industry').keyup(function() {
    const compIndustry = $('#comp-industry').val(), companyIndustry = $('.company-industry');
    companyIndustry.text(compIndustry);
  });
});

function triggerClick() {
  document.querySelector('#avatarImage').click();
}

function triggerClickCompany() {
  document.querySelector('#companyLogoDisplay').click();
}

function triggerClickCompanyLogo() {
  document.querySelector('#companyLogoChange').click();
}

function displayAvatar(e) {
  if(e.files[0]) {
    const reader = new FileReader();
    reader.onload = function(e) {
      document.querySelector('.avatar-image').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}

function displayImage(e) {
  if(e.files[0]) {
    const reader = new FileReader();
    reader.onload = function(e) {
      document.querySelector('.bg-hero').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}

function displayComapnyLogo(e) {
  if(e.files[0]) {
    const reader = new FileReader();
    reader.onload = function(e) {
      document.querySelector('#company-logo-preview').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}

function displayCompanyDescLogo(e) {
  if(e.files[0]) {
    const reader = new FileReader();
    reader.onload = function(e) {
      document.querySelector('.company-logo-image').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}

function displayCompanyBg(e) {
  if(e.files[0]) {
    const reader = new FileReader();
    reader.onload = function(e) {
      document.querySelector('.companybg-hero').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}