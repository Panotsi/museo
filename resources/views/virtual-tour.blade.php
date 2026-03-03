<!DOCTYPE html>
<html>
<head>
    <title>Tambobong Virtual Tour</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum/build/pannellum.css"/>

    <style>
        html, body {
            margin: 0;
            height: 100%;
        }

        #panorama {
            width: 100%;
            height: 100vh;
        }
    </style>
</head>
<body>

<div id="panorama"></div>

<script src="https://cdn.jsdelivr.net/npm/pannellum/build/pannellum.js"></script>

<script>
pannellum.viewer('panorama', {
    type: 'equirectangular',
    panorama: "{{ asset('images/museum360.jpg') }}",
    autoLoad: true,
    compass: true
});
</script>

</body>
</html>