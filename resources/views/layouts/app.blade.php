<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    
</head>
<body>
    @include('modal/modalPanels')
    @include('modal/modalProjects')
    @include('modal/modalProfilePicture')
    @include('modal/modalAboutMe')
    @include('modal/modalPostText')
    @include('modal/modalAwardsandHonorsPanel')
    @include('modal/modalExperiencePanel')
    @include('modal/modalSkillsPanel')
    @include('layouts.header')

        @yield('content')
        
    @include('layouts.footer')
    <script type="text/javascript">
        function toggleModal(modalID){
          document.getElementById(modalID).classList.toggle("hidden");
          document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
          document.getElementById(modalID).classList.toggle("flex");
          document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }
        function toggleColor(element) {
    element.querySelector('.heart-path').classList.toggle('react-heart');
}
      </script>
</body>
</html>