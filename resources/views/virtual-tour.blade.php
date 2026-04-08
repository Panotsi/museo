<!DOCTYPE html>
<html>
<head>
    <title>Tambobong Virtual Tour</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum/build/pannellum.css"/>

    <style>
        html, body {
            margin: 0;
            height: 100%;
            font-family: Arial;
        }

        #panorama {
            width: 100%;
            height: 100vh;
        }

        /* Arrow hotspot */
        .custom-arrow {
    background-image: url("{{ asset('images/arrow.png') }}");
    width: 80px;
    height: 80px;
    background-size: contain;
    background-repeat: no-repeat;
    transform: translate(-50%, -50%);
}

        /* Bottom thumbnails */
        .thumbs {
            position: fixed;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
            background: rgba(0,0,0,0.5);
            padding: 10px;
            border-radius: 10px;
        }

        .thumbs img {
            width: 90px;
            height: 55px;
            object-fit: cover;
            cursor: pointer;
            border: 2px solid white;
            transition: 0.3s;
        }

        .thumbs img:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>

<div id="panorama"></div>

<!-- Thumbnails -->
<div class="thumbs">
    <img src="{{ asset('images/museum360.jpg') }}" onclick="viewer.loadScene('room1')">
    <img src="{{ asset('images/museum3601.png') }}" onclick="viewer.loadScene('room2')">
</div>

<script src="https://cdn.jsdelivr.net/npm/pannellum/build/pannellum.js"></script>

<script>
var viewer = pannellum.viewer('panorama', {
    default: {
        firstScene: 'room1',
        autoLoad: true,
        compass: true,
        sceneFadeDuration: 1000,
        showZoomCtrl: true,
        showFullscreenCtrl: true
    },

    scenes: {
        room1: {
            type: 'equirectangular',
            panorama: "{{ asset('images/museum360.jpg') }}",
            hotSpots: [
                {
                    pitch: -10,
                    yaw: 90,
                    cssClass: 'custom-arrow',
                    clickHandlerFunc: function() {
                        viewer.loadScene('room2');
                    }
                }
            ]
        },

        room2: {
            type: 'equirectangular',
            panorama: "{{ asset('images/museum3601.png') }}",
            hotSpots: [
                {
                    pitch: -10,
                    yaw: -90,
                    cssClass: 'custom-arrow',
                    clickHandlerFunc: function() {
                        viewer.loadScene('room1');
                    }
                }
            ]
        }
    }
});
</script>

</body>
</html>