@extends('layouts.master')
@section('section')
    @yield('section')
    <!-- Main content -->
    <section class="content" id="main-content"><br>
        <div class="container-fluid"><br>
          <div class="row">
            <!DOCTYPE html>
            <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
              <head>
                  <script src="https://maps.google.com/maps/api/js?sensor=false"></script>
                  <style>#mymap{ width: 90%; height: 600px; }</style>
    
                  <script type="text/javascript">
                      function init() {
                        var mapDiv = document.getElementById("mymap");
                        var mapOptions  = {
                          center: new google.maps.latlng(37.09024, -100.4179324),
                          zoom: 4,
                          mapTypeId:google.maps.MapTypeId.ROADMAP
                        };
                        var map = new google.maps.Map(mapDiv, mapOptions);
                        var destinations = new google.maps.MVCArray();

                        // destinations.push(new google.maps.latlng(36.778261, -119.4179324));
                        // destinations.push(new google.maps.latlng(40.7143528, -74.0059730999));
                        // destinations.push(new google.maps.latlng(23.634501, -102.552784));

                        // var polylineOptions = {path.destinations , strokeColor:"#ff0000", strokeWeight:10};
                        // var polyline = new google.maps.Polyline(polylineOptions);
                        // polyline.setMap(map);
                        
                        google.maps.event.addListener(map, 'click', function(e){
                          var currentPath = polyline.getPath();
                          currentPath.push(e.latlng);
                        });

                      }
                      window.onload = init;
                  </script>
              </head>
              <body>
                  <h2 >Drawing Shaps - Polylines and polygons</h2>
                  <div id="mymap"></div>
                  <div id="info"></div>
              </body> 
            </html>
          </div>  
        </div>
    </section>
@endsection
