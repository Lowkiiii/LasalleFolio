<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title></title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

</head>

<body>
    {{-- @include('modal/Interest') --}}
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
    @include('modal/modalidInterests')
    @include('layouts.header')

    @yield('content')

    <script type="text/javascript">
        function toggleInterests(studentId) {
            const limitedInterests = document.querySelector(`#limitedInterests-${studentId}`);
            const fullInterests = document.querySelector(`#fullInterests-${studentId}`);

            limitedInterests.classList.toggle('hidden');
            fullInterests.classList.toggle('hidden');
        }

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
        document.addEventListener('DOMContentLoaded', function() {
            const posts = document.querySelectorAll('.post');

            posts.forEach(post => {
                const editButton = post.querySelector('.editButton');
                const editMenu = post.querySelector('.editMenu');

                editButton.addEventListener('click', function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    editMenu.classList.toggle('hidden');
                    editMenu.classList.toggle('opacity-100');
                });
            });

            document.addEventListener('click', function(event) {
                const editMenus = document.querySelectorAll('.editMenu');
                editMenus.forEach(menu => {
                    if (!menu.contains(event.target) && !event.target.closest('.editButton')) {
                        menu.classList.add('hidden');
                        menu.classList.remove('opacity-100');
                    }
                });
            });
        });
    </script>

</body>

<footer>
    @include('layouts.footer')
</footer>

</html>
