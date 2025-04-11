<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->

  @include('layouts.inc.header')
  <!-- End Header -->
  @include('sweetalert::alert')

  <!-- ======= Sidebar ======= -->
  @include('layouts.inc.sidebar')

 <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>@yield('title')</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

        @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>

  @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

  <script>
    function formatRupiah(number) {
        const formatted = number.toLocaleString("id", {
            minimumFractionDigits: 0,
            maximumFractionDigits: 0,
        });

        return formatted;
    }
    $('#category_id').change(function() {
      let cat_id = $(this).val();
      option = `<option value="">Select One</option>`;
      $.ajax({
        url:'/get_product/'+ cat_id,
        type:'GET',
        dataType:'json',
        success: function (resp) {
          $.each(resp.data, function (index, value) {
            option += `<option value="${value.id}" data-price="${value.product_price}" data-image="${value.product_photo}">${value.product_name}</option>`;
          });
          $('#product_id').html(option);
        }
      });
    });
    $(".add-row").click(function() {
        let tbody = $('tbody');
        let selected_option = $('#product_id').find('option:selected');
        let nama_produk = selected_option.text();
        let product_id = selected_option.val();
        let foto_produk = selected_option.data('image');
        let harga_produk = parseInt(selected_option.data('price'));
        console.log(foto_produk);

        if ($('#category_id').val() == "") {
            alert('Category required');
            return false;
        }

        if ($('#product_id').val() == "") {
            alert('Product required');
            return false;
        }

        let new_row = "<tr>";
        new_row += `<td><img src="{{ asset('storage/${foto_produk}') }}" alt="Image not available" width="100"></td>`;
        new_row += `<td>${nama_produk} <input type='hidden' name='product_id[]' value='${product_id}'></td>`;
        new_row += `<td width='110px'><input value='1' type='number' name='qty[]' class='qty form-control'></td>`;
        new_row += `<td><input type='hidden' name='order_price[]' value='${harga_produk}'><span class='price' data-price=${harga_produk}>${formatRupiah(harga_produk)}</span></td>`;
        new_row += `<td><input type='hidden' class='subtotal_input' name='order_subtotal[]' value='${harga_produk}'><span class='subtotal'>${formatRupiah(harga_produk)}</span></td>`;
        new_row += "</tr>";

        tbody.append(new_row);
        calculate_sub_total();

        clearAll();

        $('.qty').off().on('input', function(){
            let row = $(this).closest('tr');
            let qty = parseInt($(this).val()) || 0;
            let price = parseInt(row.find('.price').data('price')) || 0;
            let total = qty * price;
            row.find('.subtotal').text(formatRupiah(total)); //NaN
            row.find('.subtotal_input').val(total); //NaN
            calculate_sub_total();
        });
    });

    function calculate_sub_total() {
      let grandtotal = 0;
        $('.subtotal').each(function() {
            let total = parseInt($(this).text().replace(/\./g, ''));
            grandtotal += total;
            console.log("total", total);
        });

        console.log(grandtotal);
        $('.grandtotal').text(formatRupiah(grandtotal));
        $('input[name="grandtotal"]').val(grandtotal);
    }

    function clearAll() {
      $('#product_id').val("");
      $('#category_id').val("");
    }
  </script>

</body>

</html>
