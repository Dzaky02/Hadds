    <?php
      $floor_maps = array();

      foreach( $floors as $floor ) : 
        array_push($floor_maps, $floor['floor_map']);
      endforeach;
    ?>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!-- My JS File -->
    <script src="<?= base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>assets/js/swiper.min.js"></script>
    <script type="text/javascript"  src="<?= base_url(); ?>assets/js/custom.js"></script>
    <script type="text/javascript"  src="<?= base_url(); ?>assets/js/moment.min.js"></script>
    <script type="text/javascript"  src="<?= base_url(); ?>assets/js/daterangepicker.js"></script>

    <script type="text/javascript">

      const oldestDate = '2019/07/02';
      let startDate;
      let endDate;
      let newestDate = new Date();

      $('#inputDateRange').daterangepicker({
          autoApply: true,
          opens : 'center',
          minDate : oldestDate,
          startDate : oldestDate,
          endDate : newestDate,
          locale : {
            format: 'YYYY/MM/DD'
          }
      }, function(start, end, label){
        startDate = start.format('YYYY-MM-DD')
        endDate = end.format('YYYY-MM-DD')
      });

      mapboxgl.accessToken = 'pk.eyJ1IjoiZHpha3kiLCJhIjoiY2p4YWN1ZTZtMDBxMTN5bzhpYnRpeDR1OCJ9.Tg8-q-s3vvQgvirQXTvaYQ';
                  
      let map = new mapboxgl.Map({
          container: 'map', // Container id
          style: 'mapbox://style/mapbox/streets-v11',
          center: [107.632584, -6.973212], // starting position FIT Telkom
          zoom: 19, // Starting zoom
          minZoom: 17,
          maxZoom: 19
      });
                  
      // disable map zoom when using scroll
      map.scrollZoom.disable();

      map.on('load', function(){
                      
          map.addSource("overlay", 
              {
                  "type": "image",
                  "url": "<?= base_url(); ?>assets/img/floor_maps/<?= $floor_maps[0] ?>",
                  "coordinates": [
                      [107.6321, -6.97269], //top left
                      [107.6331, -6.97269], //top right
                      [107.6331, -6.97369], //bottom right
                      [107.6321, -6.97369]  //bottom left
                  ]
              }
          );
   
          map.addLayer({
              "id": "overlay",
              "source": "overlay",
              "type": "raster",
              "paint": {"raster-opacity": 0.85}
          });
                  
          map.addSource('hadds', {
              "type": "geojson",
              "data": <?= $heatmap; ?>
          });
      
          map.addLayer({
              "id": "hadds-heat",
              "type": "heatmap",
              "source": "hadds",
              "paint": {
                  // Increase the heatmap weight based on frequency and property magnitude
                  "heatmap-weight": 1,
                  // Increase the heatmap color weight weight by zoom level
                  // heatmap-intensity is a multiplier on top of heatmap-weight
                  "heatmap-intensity": 1,
                  // Color ramp for heatmap.  Domain is 0 (low) to 1 (high).
                  // Begin color ramp at 0-stop with a 0-transparancy color
                  // to create a blur-like effect.
                  "heatmap-color": [
                      "interpolate",
                      ["linear"],
                      ["heatmap-density"],
                      0, "rgba(33,102,172,0)",
                      0.2, "rgb(0,0,255)",   //Blue
                      0.4, "rgb(0,255,255)", //Cyan
                      0.6, "rgb(0,255,0)",   //Green
                      0.8, "rgb(255,255,0)", //Yellow
                      1, "rgb(255,0,0)"      //Red
                  ],
                  // Adjust the heatmap radius by zoom level
                  "heatmap-radius": 6,
                  // Transition from heatmap to circle layer by zoom level
                  "heatmap-opacity": 0.5,
              }
          }, 'waterway-label');
          
          map.addSource('posterPoint', {
            "type": "geojson",
              "data":
            {
              "type": "FeatureCollection",
              "features": [{
                "type": "Feature",
                "geometry": {
                  "type": "Point",
                  "coordinates": [107.63279388285042, -6.973164077321229]
                },
                "properties": {
                  "title": "Poster Musang",
                  "icon": "marker"
                }
              },{
                "type": "Feature",
                "geometry": {
                  "type": "Point",
                  "coordinates": [107.63262758589912, -6.973273234439873]
                },
                "properties": {
                  "title": "Poster Panda",
                  "icon": "marker"
                }
              }]
            }
          });
      
      map.addLayer({
        "id": "poster",
        "type": "symbol",
        "source": "posterPoint",
        "layout": {
          "icon-image": "{icon}-15",
          "icon-size" : 3,
          "text-field": "{title}",
          "text-font": ["Open Sans Semibold", "Arial Unicode MS Bold"],
          "text-offset": [0, 1],
          "text-anchor": "top",
          "visibility": "none"
        }
      });

          // Add zoom and rotation controls to the map.
          map.addControl(new mapboxgl.NavigationControl());
      });

      
      // Poster point function
      const id = "poster";
 
      const link = document.createElement('a');
      link.href = '#';
      link.className = '';
      link.textContent = id;
      
      link.onclick = function (e) {
        let clickedLayer = this.textContent;
        e.preventDefault();
        e.stopPropagation();
        
        let visibility = map.getLayoutProperty(clickedLayer, 'visibility');
        
        if (visibility === 'visible') {
          map.setLayoutProperty(clickedLayer, 'visibility', 'none');
          this.className = '';
        } else {
          this.className = 'active';
          map.setLayoutProperty(clickedLayer, 'visibility', 'visible');
        }
      };
      
      let layers = document.getElementById('menu-map');
      layers.appendChild(link);
      // End of showing poster point function

      // Change floor maps
      $('#inputFloor').on('change', function(){

        let temp = $(this).val();

        if (temp == 1) {
          
          map.getSource("overlay").updateImage({
            "url": "<?= base_url(); ?>assets/img/floor_maps/<?= $floor_maps[0] ?>",
            "coordinates": [
                [107.6321, -6.97269], //top left
                [107.6331, -6.97269], //top right
                [107.6331, -6.97369], //bottom right
                [107.6321, -6.97369]  //bottom left
            ]
          }); 

          map.getSource("posterPoint").setData({
            "type": "FeatureCollection",
            "features": [{
              "type": "Feature",
              "geometry": {
                "type": "Point",
                "coordinates": [107.63279388285042, -6.973164077321229]
              },
              "properties": {
                "title": "Poster Musang",
                "icon": "marker"
              }
            },{
              "type": "Feature",
              "geometry": {
                "type": "Point",
                "coordinates": [107.63262758589912, -6.973273234439873]
              },
              "properties": {
                "title": "Poster Panda",
                "icon": "marker"
              }
            }]
        });

        } else if (temp == 2) {
         
          map.getSource("overlay").updateImage({
            "url": "<?= base_url(); ?>assets/img/floor_maps/<?= $floor_maps[1] ?>",
            "coordinates": [
                [107.6321, -6.97269], //top left
                [107.6331, -6.97269], //top right
                [107.6331, -6.97369], //bottom right
                [107.6321, -6.97369]  //bottom left
            ]
          });

          map.getSource("posterPoint").setData( {
            "type": "FeatureCollection",
            "features": [{
              "type": "Feature",
              "geometry": {
                "type": "Point",
                "coordinates": [0, 0]
              },
              "properties": {
                "title": "Poster Musang",
                "icon": "marker"
              }
            }]
        });

        } else if (temp == 3) {
         
          map.getSource("overlay").updateImage({
            "url": "<?= base_url(); ?>assets/img/floor_maps/<?= $floor_maps[2] ?>",
            "coordinates": [
                [107.6321, -6.97269], //top left
                [107.6331, -6.97269], //top right
                [107.6331, -6.97369], //bottom right
                [107.6321, -6.97369]  //bottom left
            ]
          });

          map.getSource("posterPoint").setData({
            "type": "FeatureCollection",
            "features": [{
              "type": "Feature",
              "geometry": {
                "type": "Point",
                "coordinates": [0, 0]
              },
              "properties": {
                "title": "Poster Musang",
                "icon": "marker"
              }
            }]
        });

        } else if (temp == 4) {
          
          map.getSource("overlay").updateImage({
            "url": "<?= base_url(); ?>assets/img/floor_maps/<?= $floor_maps[3] ?>",
            "coordinates": [
                [107.6321, -6.97269], //top left
                [107.6331, -6.97269], //top right
                [107.6331, -6.97369], //bottom right
                [107.6321, -6.97369]  //bottom left
            ]
          });

          map.getSource("posterPoint").setData({
            "type": "FeatureCollection",
            "features": [{
              "type": "Feature",
              "geometry": {
                "type": "Point",
                "coordinates": [0, 0]
              },
              "properties": {
                "title": "Poster Musang",
                "icon": "marker"
              }
            }]
        });

        }

        let dataUrl = "<?= base_url(); ?>rest/index.php/api/heatmap/coordinates?id=" + temp;
        //&date_begin=2019/7/2&date_end=2019/7/3
        map.getSource('hadds').setData(dataUrl);

        $('#inputDateRange').daterangepicker({
            autoApply: true,
            opens : 'center',
            minDate : oldestDate,
            startDate : oldestDate,
            endDate : newestDate,
            locale : {
              format: 'YYYY/MM/DD'
            }
        }, function(start, end, label){
          startDate = start.format('YYYY-MM-DD')
          endDate = end.format('YYYY-MM-DD')
        });

      });
      // End of function change floor map

      //Filter Date Range Function
      $('#inputDateRange').on('change', function(e){
        let idFloor = $('#inputFloor').val();

        let dataUrl = "<?= base_url(); ?>rest/index.php/api/heatmap/coordinates?id=" + idFloor + "&date_begin=" + startDate + "&date_end=" + endDate;
        
        console.log(dataUrl);
        map.getSource('hadds').setData(dataUrl);

      });
      //End of filter date range
      map.on('mousemove', function (e) {
document.getElementById('info').innerHTML =
// e.point is the x, y coordinates of the mousemove event relative
// to the top-left corner of the map
JSON.stringify(e.point) + '<br />' +
// e.lngLat is the longitude, latitude geographical position of the event
JSON.stringify(e.lngLat);
});

    </script>
  </body>
</html>