jQuery(document).ready(function(e){

  if ( jQuery('.home-gallery').length ) {
    jQuery('.home-gallery').slick({
      autoplay: true,
      autoplaySpeed: 7000,
      dots: true,
      adaptiveHeight: true
    });
  }

  // Autofill submissions title based on other field

  jQuery('.acf-field--post-title').hide().next('.acf-field').css('border-top', 0);

  $submissionNameField = jQuery('#acf-field_574ad7c763d44');

  $submissionNameField.change(function(){
    submissionName = $submissionNameField.val();
    jQuery('#acf-_post_title').val(submissionName);
  });

  // Info page anchors
  if ( jQuery('.page-anchors').length ) {
    jQuery('.page-anchors a').click(function(e){
      e.preventDefault();
    });
    jQuery('.page-anchors a').click().first();
  }

});
