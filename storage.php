<?php include ("header.php") ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Склад в Берлине 1</h1>
    </div>

    <div style="width: 640px; height: 480px" id="mapContainer"></div>


<script>
    var map;
    var marker;
        function moveMapToBerlin(map){
            map.setCenter({lat:52.5159, lng:13.3777});
            map.setZoom(14);
        }
    $(document).ready(function(){
        $('.btn[data-toggle="modal"]').ready(function(){
        /**
        * Moves the map to display over Berlin
        *
        * @param  {H.Map} map      A HERE Map instance within the application
        */
        
        
        /**
        * Boilerplate map initialization code starts below:
        */
        // Step 1: initialize communication with the platform
        // In your own code, replace window.app_id with your own app_id
        // and window.app_code with your own app_code
        var platform = new H.service.Platform({
            app_id: 'nAo325kqe9RfEXGcY7rD',
            app_code: 'it85BIGBamkI4S3Ey7o36A',
            useCIT: true,
            useHTTPS: true
        });
        var defaultLayers = platform.createDefaultLayers();
        
        //Step 2: initialize a map - this map is centered over Europe
        map = new H.Map(document.getElementById('mapContainer'),
            defaultLayers.normal.map,{
            center: {lat:50, lng:5},
            zoom: 14
        });
        // add a resize listener to make sure that the map occupies the whole container
        window.addEventListener('resize', () => map.getViewPort().resize());
        
        //Step 3: make the map interactive
        // MapEvents enables the event system
        // Behavior implements default interactions for pan/zoom (also on mobile touch environments)
        var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
        
        // Create the default UI components
        var ui = H.ui.UI.createDefault(map, defaultLayers);
        
        
        marker = new H.map.Marker({
            lat:52.5159, lng:13.3777
            });
            map.addObject(marker);

        moveMapToBerlin(map);
                        
                    


        });
    });

    $(".storage").on('click', function(e){
        e.preventDefault();
        var _lat = $(this).attr('lat');
        var _lng = $(this).attr('lng');
        map.setCenter({
            lat: _lat,
            lng: _lng
        });
        marker.setPosition({
            lat: _lat,
            lng: _lng
        });
    });
</script>

</main>

<?php include ("footer.php") ?>
