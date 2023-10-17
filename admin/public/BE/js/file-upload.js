//$(document).ready(function() {
  // $('.file-upload-browse').on('click', function() {
  //     var file = $(this).closest('.form-group').find('.file-upload-default');
  //     file.trigger('click');
  // });

  // $('.file-upload-default').on('change', function() {
  //     $(this).closest('.form-group').find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
  // });
  
// });
$(document).ready(function() {
  $('.upload-img-theloai').on('change', function() {

      var imgDiv = $('.img-div');
      var imgItem = $('.img-item-form')[0];

      if (this.files && this.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
              // Hiển thị ảnh trước khi upload
              imgItem.src = e.target.result;
              imgDiv.show();
          };

          reader.readAsDataURL(this.files[0]);
      }
  });
});
