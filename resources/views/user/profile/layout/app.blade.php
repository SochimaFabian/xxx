<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="https://static.cdninstagram.com/rsrc.php/v3/yI/r/VsNE-OHk_8a.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/profile/index.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>
        @yield('title')
    </title>
</head>
<style>
    body {
        position: relative;
    }

    a {
        color: inherit!important;
        text-decoration: none;
    }


    .rounded-full {
        border-radius: 50% !important;
    }

    .tooltip-container {
        position: relative;
        padding: 20px;
    }

    .tooltip-content {
        display: none;
        position: absolute;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 1;
        left: 100%;
        /* Position the tooltip to the right of the trigger button */
        top: 10%;
        /* Position the tooltip vertically centered */
        transform: translateY(-50%);
        /* Adjust vertical positioning */
        min-width: 150px;
        /* Set a minimum width for the tooltip */
    }

    .tooltip-content ul {
        list-style-type: none;
        padding: 0;
    }

    .tooltip-content ul li {
        padding: 2px 10px;
        border-radius: 5px;
        margin-bottom: 5px;
    }

    .tooltip-content ul li:hover {
        background-color: #f8f8f8;
    }

    .tooltip-content ul li a {
        color: #333;
        text-decoration: none;
    }

    .tooltip-container:hover .tooltip-content {
        display: block;
    }

</style>
<style class="pre">
    /* Hide images initially */
    .image {
        display: none;
    }

    /* Preloader styles */
    .preloader {
        display: block;
        width: 50px;
        /* Adjust size as needed */
        height: 50px;
        /* Adjust size as needed */
        margin: auto;
        /* Center the preloader */
        border: 3px solid #f3f3f3;
        /* Light border */
        border-top: 3px solid #3498db;
        /* Blue border on top */
        border-radius: 50%;
        /* Circle shape */
        animation: spin 1s linear infinite;
        /* Spin animation */
        filter: blur(3px);
        /* Apply blur effect */
    }

    /* Spin animation */
    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

</style>
<style>
    .w-half{
        width: 50%;
    }
</style>
<body>
    @yield('content')
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tooltipTrigger = document.querySelector('.tooltip-trigger');
        const tooltipContent = document.querySelector('.tooltip-content');

        tooltipTrigger.addEventListener('click', function(event) {
            event.stopPropagation(); // Prevent the click event from propagating to the document
            tooltipContent.style.display = tooltipContent.style.display === 'block' ? 'none' : 'block';
        });

        document.addEventListener('click', function(event) {
            if (!tooltipTrigger.contains(event.target) && !tooltipContent.contains(event.target)) {
                tooltipContent.style.display = 'none'; // Hide the tooltip if clicked outside of it
            }
        });
    });

</script>
<script class="pre">
    document.addEventListener('DOMContentLoaded', function() {
        const images = document.querySelectorAll('.image');

        // Add preloader to each image
        images.forEach(function(image) {
            // Create preloader element
            const preloader = document.createElement('div');
            preloader.classList.add('preloader');

            // Insert preloader before the image
            image.parentNode.insertBefore(preloader, image);

            // Add event listener for image load event
            image.addEventListener('load', function() {
                // Hide preloader and show image once loaded
                preloader.style.display = 'none';
                image.style.display = 'block';
            });
        });
    });

</script>


</html>
