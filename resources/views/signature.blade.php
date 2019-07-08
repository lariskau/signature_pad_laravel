<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="_token" content="{{csrf_token()}}" />
        <title>Signature</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
    </head>
    <body>

<!-- Basic form -->

      <h1>Signature</h1>
      <div class="container">
         <div class="alert alert-success" style="display:none"></div>
         <form id="myForm">
            <div class="form-group">
              <label for="file">Signature :</label>
              <input type="text" class="form-control" id="file">
            </div>
            <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
            <button class="btn btn-primary" id="ajaxSubmit">Submit</button>
          </form>

<!-- Signature pad -->
          <div class="wrapper">
            <canvas id="signature-pad" class="signature-pad" width=400 height=200></canvas>
          </div>

          <button class="btn btn-primary" id="save">Save</button>
          <button id="clear">Clear</button>


<!-- CDN -->

      </div>
      <script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
      </script>
      <script src="{{ url('js/app.js') }} " charset="utf-8"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>


<!-- AJAX to save basic form -->

      <script>
         $(function(){

               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });

               var canvas = document.getElementById('signature-pad');

               var signaturePad = new SignaturePad(canvas, {
               });

               var saveButton = document.getElementById('save');
               var clearButton = document.getElementById('clear');

               saveButton.addEventListener('click', function (event) {

               $.ajax({
                  url: "{{ url('/signature/post') }}",
                  method: 'post',
                  data: {
                     signature: signaturePad.toDataURL('image/png'),
                  },
                  success: function(result){
                     jQuery('.alert').show();
                     jQuery('.alert').html(result.success);
                  }});
               });

                clearButton.addEventListener('click', function () {
                  signaturePad.clear();
                });

            });
      </script>

<!-- Signature pad js -->

      <script type="text/javascript">
      var canvas = document.getElementById('signature-pad');

      var signaturePad = new SignaturePad(canvas, {
      });


//      document.getElementById('clear').addEventListener('click', function () {
//        signaturePad.clear();
//      });

      </script>

    </body>
</html>
