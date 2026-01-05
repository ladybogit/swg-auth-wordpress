jQuery(document).ready(function($) {
  
  function toggleCssOptions() {
    var matchTheme = $('#swg-auth-match-theme').is(':checked');
    var globalStyle = $('#swg-auth-global-style').is(':checked');
    
    // Find the Match Theme checkbox row
    var matchThemeRow = $('#swg-auth-match-theme').closest('tr');
    
    // Find all rows after Match Theme row in the same table
    var allCssRows = matchThemeRow.nextAll('tr');
    
    if (!matchTheme) {
      // Show Global Style row
      allCssRows.first().show();
      
      if (globalStyle) {
        // Show all CSS option rows, hide subtabs
        allCssRows.show();
        $('.swg-auth-css-subtabs').hide();
      } else {
        // Hide CSS option rows except Global Style, show subtabs
        allCssRows.not(':first').hide();
        $('.swg-auth-css-subtabs').show();
        switchCssSubTab($('.swg-auth-css-subtabs .nav-tab-active').data('subtab') || 'general');
      }
    } else {
      // Hide all CSS options when Match Theme is checked
      allCssRows.hide();
      $('.swg-auth-css-subtabs').hide();
    }
  }
  
  function switchCssSubTab(subtab) {
    $('.swg-auth-subtab-content').hide();
    $('.swg-auth-subtab-content[data-subtab="' + subtab + '"]').show();
    $('.swg-auth-css-subtabs .nav-tab').removeClass('nav-tab-active');
    $('.swg-auth-css-subtabs .nav-tab[data-subtab="' + subtab + '"]').addClass('nav-tab-active');
  }
  
  // Run on load
  setTimeout(toggleCssOptions, 100);
  
  // Run on checkbox change
  $('#swg-auth-match-theme, #swg-auth-global-style').on('change', toggleCssOptions);
  
  // Handle subtab clicks
  $('.swg-auth-css-subtabs .nav-tab').on('click', function(e) {
    e.preventDefault();
    switchCssSubTab($(this).data('subtab'));
  });
  
});
