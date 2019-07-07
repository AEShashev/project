<?php include ("header.php") ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Склад в Берлине 1</h1>
    </div>

    <div style="width: 640px; height: 480px" id="mapContainer"></div>


<script>
    var map;
    var marker;
    $(document).ready(function(){
        $('.btn[data-toggle="modal"]').ready(function(){
            var platform = new H.service.Platform({ 
                'app_id': 'nAo325kqe9RfEXGcY7rD', 
                'app_code': 'it85BIGBamkI4S3Ey7o36A' 
            }); 


            // Obtain the default map types from the platform object: 
            var defaultLayers = platform.createDefaultLayers(); 

            // Instantiate (and display) a map object: 
            map = new H.Map( 
                document.getElementById('mapContainer'), 
                defaultLayers.normal.map, 
                    { 
                    zoom: 15, 
                    center: { 
                        lat:52.5192,
                        lng:13.4061 
                        } 
                    }
                );

            marker = new H.map.Marker({
                lat:52.5192,
                lng:13.4061
            });
            map.addObject(marker);
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
