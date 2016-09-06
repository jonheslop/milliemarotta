jQuery(document).ready(function(e){
  jQuery('.home-gallery').slick({
    autoplay: true,
    autoplaySpeed: 7000,
    dots: true,
    adaptiveHeight: true
  });

  // Autofill submissions title based on other field

  jQuery('.acf-field--post-title').hide();
  $submissionNameField = jQuery('#acf-field_574ad7c763d44');

  $submissionNameField.change(function(e){
    submissionName = e.val();
    jQuery('#acf-_post_title').val('submissionName');
  });
});