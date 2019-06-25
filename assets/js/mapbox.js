mapboxgl.accessToken = 'pk.eyJ1IjoiZHpha3kiLCJhIjoiY2p4YWN1ZTZtMDBxMTN5bzhpYnRpeDR1OCJ9.Tg8-q-s3vvQgvirQXTvaYQ';
            
var map = new mapboxgl.Map({
    container: 'map', // Container id
    style: 'mapbox://style/mapbox/streets-v11',
    center: [107.632584, -6.973212], // starting position FIT Telkom
    zoom: 18 // Starting zoom
});
            
map.on('load', function(){
                
    map.addSource("overlay", 
        {
            "type": "image",
            "url": "https://yudhaputrama.github.io/insight-camera/assets/peta_lantai_1.png",
            "coordinates": [
                [107.6321, -6.97269], //top left
                [107.6331, -6.97269], //top right
                [107.6331, -6.97369], //bottom right
                [107.6321, -6.97369] //bottom left
            ]
        }
    );

// setTimeout(() => {
//     map.getSource("overlay").updateImage({
//      "url": "https://yudhaputrama.github.io/insight-camera/assets/peta_lantai_4.png",
//             "coordinates": [
//                     [107.6321, -6.97269], //top left
//                     [107.6331, -6.97269], //top right
//                     [107.6331, -6.97369], //bottom right
//                     [107.6321, -6.97369] //bottom left
//                 ]
//     }); 
// }, 1000);
            
    map.addLayer({
        "id": "overlay",
        "source": "overlay",
        "type": "raster",
        "paint": {"raster-opacity": 0.85}
    });
            
    map.addSource('earthquakes', {
        "type": "geojson",
        "data": ""
    });
 
    map.addLayer({
        "id": "earthquakes-heat",
        "type": "heatmap",
        "source": "earthquakes",
        "maxzoom": 9,
        "paint": {
            // Increase the heatmap weight based on frequency and property magnitude
            "heatmap-weight": [
                "interpolate",
                ["linear"],
                ["get", "mag"],
                0, 0,
                6, 1
            ],
            // Increase the heatmap color weight weight by zoom level
            // heatmap-intensity is a multiplier on top of heatmap-weight
            "heatmap-intensity": [
                "interpolate",
                ["linear"],
                ["zoom"],
                0, 1,
                9, 3
            ],
            // Color ramp for heatmap.  Domain is 0 (low) to 1 (high).
            // Begin color ramp at 0-stop with a 0-transparancy color
            // to create a blur-like effect.
            "heatmap-color": [
                "interpolate",
                ["linear"],
                ["heatmap-density"],
                0, "rgba(33,102,172,0)",
                0.2, "rgb(103,169,207)",
                0.4, "rgb(209,229,240)",
                0.6, "rgb(253,219,199)",
                0.8, "rgb(239,138,98)",
                1, "rgb(178,24,43)"
            ],
            // Adjust the heatmap radius by zoom level
            "heatmap-radius": [
                "interpolate",
                ["linear"],
                ["zoom"],
                0, 2,
                9, 20
            ],
            // Transition from heatmap to circle layer by zoom level
            "heatmap-opacity": [
                "interpolate",
                ["linear"],
                ["zoom"],
                7, 1,
                9, 0
            ],
        }
    }, 'waterway-label');
    
    // Add zoom and rotation controls to the map.
    map.addControl(new mapboxgl.NavigationControl());
});