$(document).ready(function() {
    $('.search-input').keyup(function() {
      var inputValue = $(this).val().trim();
       if (inputValue.length > 0 && inputValue !== "") {
          $('.fail-icon').show()
      }else{
        $('.fail-icon').hide()
      }
    });
    $('.fail-icon').click(function(){
      $('.search-input').val('')
      $(this).hide();
    })
    $('.toggle-search').click(function(){
      $('.div-search').toggle(); // Corrected from .togggle() to .toggle()
   });
   $('.toggle-filter').click(function(){
    $('.div-filter').toggle(); // Corrected from .togggle() to .toggle()
 });
});
