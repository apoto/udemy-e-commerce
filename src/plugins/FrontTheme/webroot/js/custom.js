// In your Javascript (external .js resource or <script> tag)
$(document).ready(function () {
  $(".submitOnChange").on("change", function () {
    $(this).submit();
  });
});
