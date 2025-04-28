<!DOCTYPE html>
<html>
<head>
  <title>Dropdown dengan Ikon</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
    }
    .dropdown-container {
      margin: 20px 0;
    }
    .icon-dropdown {
      width: 250px;
    }
  </style>
</head>
<body>
  <div class="dropdown-container">
    <select class="icon-dropdown">
      <option value="">- Pilih Ikon -</option>
      <option value="fa-map-marker-alt">Lokasi</option>
      <option value="fa-bed">Kamar Tidur</option>
      <option value="fa-utensils">Restoran</option>
      <option value="fa-dumbbell">Gym</option>
      <option value="fa-parking">Parkir</option>
      <option value="fa-swimming-pool">Kolam Renang</option>
      <option value="fa-spa">Spa</option>
      <option value="fa-tshirt">Laundry</option>
      <option value="fa-motorcycle">Sewa Motor</option>
      <option value="fa-warehouse">Gudang</option>
      <option value="fa-map">Peta</option>
      <option value="fa-star">Bintang Hotel</option>
      <option value="fa-star-half-alt">Bintang Setengah</option>
    </select>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
  $(document).ready(function() {
    $('.icon-dropdown').select2({
      templateResult: formatIcon,
      templateSelection: formatIcon
    });
    
    function formatIcon(option) {
      if (!option.id) return option.text;
      return $('<span><i class="fas ' + option.id + '"></i> ' + option.text + '</span>');
    }
  });
  </script>
</body>
</html>