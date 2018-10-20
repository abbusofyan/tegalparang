$(document).ready(function() {
  $(".nama-kost").hide();
  $(".pemilik-kost").change(function() {
    $(".nama-kost").show(400);
  });

  $(".alamat-kontrakan").hide();
  $(".pemilik-kontrakan").change(function() {
    $(".alamat-kontrakan").show(400);
  });
});
