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

    @include('modal/modalEditAwardsandHonorsPanel')
    @include('modal/modalEditAcademicsPanel')
    @include('modal/modalSkillsEditPanel')
    @include('modal/modalVerifyEmail')
    @include('modal/modalPanels')
    @include('modal/modalPostDelete')
    @include('modal/modalProjects')
    @include('modal/modalProfilePicture')
    @include('modal/modalAboutMe')
    @include('modal/modalPostImage')
    @include('modal/modalPostDocument')
    @include('modal/modalPostText')
    @include('modal/modalAwardsandHonorsPanel')
    @include('modal/modalAcademicsPanel')
    @include('modal/modalSkillsPanel')
    @include('modal/modalEditPanel')
    @include('modal/modalPostEditText')
    @include('modal/modalAddShowcase')
    @include('layouts.header')

    @yield('content')


    <script type="text/javascript">
        function toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
            document.getElementById(modalID).classList.toggle("flex");
            document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }

        function toggleColor(element) {
            element.querySelector('.heart-path').classList.toggle('react-heart');
        }

        function toggleReply(replyInput) {
            var replyInput = document.getElementById("replyInput");
            replyInput.classList.toggle("hidden");
        }
        const editButton = document.getElementById('editButton');
        const editMenu = document.getElementById('editMenu');

        editButton.addEventListener('click', function(event) {
            event.preventDefault();
            event.stopPropagation(); 
            editMenu.classList.toggle('opacity-100');
        });

        document.addEventListener('click', function(event) {
            if (!editMenu.contains(event.target)) {

                editMenu.classList.remove('opacity-100');
            }
        });

      
                                       
        
    </script>
    @include('layouts.footer')
</body>

</html>
