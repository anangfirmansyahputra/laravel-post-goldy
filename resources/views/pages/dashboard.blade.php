<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Home &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  @stack('style')

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/components.css') }}">

  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- END GA -->
</head>
</head>

<body>
  <div id="app">
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Choose Branch</h5>
          </div>
          <div class="modal-body form-group">
            <label for="exampleFormControlSelect2">Example multiple select</label>
            <select class="form-control" name="branch" id="selectBranch">
              @foreach ($branchs as $branch)
                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
            <button type="button" class="btn btn-primary" id="saveButton">Select</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('library/popper.js/dist/umd/popper.js') }}"></script>
  <script src="{{ asset('library/tooltip.js/dist/umd/tooltip.js') }}"></script>
  <script src="{{ asset('library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('library/moment/min/moment.min.js') }}"></script>
  <script src="{{ asset('js/stisla.js') }}"></script>



  <!-- Template JS File -->
  <script src="{{ asset('js/scripts.js') }}"></script>
  <script src="{{ asset('js/custom.js') }}"></script>

  <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
  <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
  <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
  <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('js/page/index-0.js') }}"></script>

  <script>
    $(document).ready(function() {
      $("#exampleModalCenter").modal({
        show: true,
        keyboard: false,
        backdrop: "static"
      });

      $("#saveButton").click(function() {
        var branch = $("#selectBranch").val();

        window.location.href = "/home/" + branch

        $("#exampleModalCenter").modal('hide');
      })
    })
  </script>
</body>

</html>
