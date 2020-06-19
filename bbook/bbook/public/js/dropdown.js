// JavaScript code to avoid dropdown bootsrap close

$('.dropdown-close-tag').on('hide.bs.dropdown', function (e) {
    if (e.clickEvent) {
      e.preventDefault();
    }
});