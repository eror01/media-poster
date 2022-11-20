function displayImage(e) {
  if(e.files[0]) {
    const reader = new FileReader();
    reader.onload = function(e) {
      document.querySelector('.bg-hero').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}