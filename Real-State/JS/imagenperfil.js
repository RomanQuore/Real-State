
document.getElementById('fileToUpload').addEventListener('change', function() {
    var reader = new FileReader();

    reader.onload = function(e) {
        document.getElementById('profileImage').setAttribute('src', e.target.result);
        document.getElementById('profileImage').style.display = 'block';
    }

    reader.readAsDataURL(this.files[0]);
});
