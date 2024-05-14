<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('webtitle')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
@include('auth.modal.modalTerms')
    @include('auth.layouts.header')
        @yield('content')
    @include('auth.layouts.footer')
</body>
</html>

<script type="text/javascript">
 function toggleModal(modalID,) {
            event.preventDefault();
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
            document.getElementById(modalID).classList.toggle("flex");
            document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }

        function submitForm() {
       
       
        }

        document.getElementById('termsCheckbox').addEventListener('change', function() {
            document.getElementById('submitButton').disabled = !this.checked;
        });

</script>