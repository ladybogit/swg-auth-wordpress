jQuery(document).ready(function($) {
  
  // Function to toggle CSS options visibility
  function toggleCssOptions() {
    var matchTheme = $('#swg-auth-match-theme').is(':checked');
    var globalStyle = $('#swg-auth-global-style').is(':checked');
    
    // Global Style option hides when Match Theme is true
    if (matchTheme) {
      $('.swg-auth-css-option').hide();
      $('.swg-auth-advanced-css-option').hide();
      $('.swg-auth-css-subtabs').hide();
    } else {
      $('.swg-auth-css-option').show();
      
      // Advanced options (colors/fonts) only show when Match Theme is false AND Global Style is true
      if (globalStyle) {
        $('.swg-auth-advanced-css-option').show();
        $('.swg-auth-css-subtabs').hide();
      } else {
        $('.swg-auth-advanced-css-option').hide();
        $('.swg-auth-css-subtabs').show();
      }
    }
  }
  
  // Run on page load
  toggleCssOptions();
  
  // Run when checkboxes change
  $('#swg-auth-match-theme, #swg-auth-global-style').on('change', function() {
    toggleCssOptions();
  });
  
});
