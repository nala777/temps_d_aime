document.getElementById('upload_image').addEventListener('change', function(){
    if (this.files[0] ) {
      var picture = new FileReader();
      picture.readAsDataURL(this.files[0]);
      picture.addEventListener('load', function(event) {
        document.getElementById('previewImage').setAttribute('src', event.target.result);
        document.getElementById('preview').style.display = 'block';
      });
    }
  });