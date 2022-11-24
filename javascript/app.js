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
});

function displayImage(e) {
  if(e.files[0]) {
    const reader = new FileReader();
    reader.onload = function(e) {
      document.querySelector('.bg-hero').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}