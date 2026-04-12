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
        .custom-arrow:hover {
            transition: all 0.4s ease;
            width: 110px;
            height: 110px;
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
    <img src="{{ asset('images/museum360.png') }}" onclick="viewer.loadScene('room1')">
    <img src="{{ asset('images/museum361.jpg') }}" onclick="viewer.loadScene('room2')">
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
        showFullscreenCtrl: true,

        autoRotate: -5,          // 🔥 makes it rotate automatically
        autoRotateInactivityDelay: 2000, // starts after 2 seconds
        autoRotateStopDelay: false
        },
    scenes: {
        room1: {
            type: 'equirectangular',
            panorama: "{{ asset('images/museum360.png') }}",
            hotSpots: [
                {
                    pitch: -30,
                    yaw: 150,
                    cssClass: 'custom-arrow',
                    clickHandlerFunc: function() {
                        // SUPER close zoom then simple transition
                        viewer.setPitch(-30);
                        viewer.setYaw(150);
                        viewer.setHfov(3); // EXTREMELY close!
                        
                        setTimeout(() => {
                            viewer.loadScene('room2');
                        }, 300);
                    }
                }
            ]
        },

        room2: {
            type: 'equirectangular',
            panorama: "{{ asset('images/museum361.jpg') }}",
            hotSpots: [
                {
                    pitch: -15,
                    yaw: -100,
                    cssClass: 'custom-arrow',
                    clickHandlerFunc: function() {
                        // SUPER close zoom then simple transition
                        viewer.setPitch(-15);
                        viewer.setYaw(-100);
                        viewer.setHfov(3); // EXTREMELY close!
                        
                        setTimeout(() => {
                            viewer.loadScene('room1');
                        }, 300);
                    }
                },
                {
                    pitch: -10,
                    yaw: 80,
                    cssClass: 'custom-arrow',
                    clickHandlerFunc: function() {
                        // SUPER close zoom then simple transition
                        viewer.setPitch(-10);
                        viewer.setYaw(80);
                        viewer.setHfov(3); // EXTREMELY close!
                        
                        setTimeout(() => {
                            viewer.loadScene('room1');
                        }, 300);
                    }
                }
            ]
        }
    }
});
</script>

</body>
</html>