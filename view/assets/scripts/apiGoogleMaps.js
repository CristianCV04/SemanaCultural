function initMap() {
  // Create a map object and specify the DOM element for display.
  var map = new google.maps.Map(document.getElementById('maps'), {
    center: {lat: 11.2252065, lng: -74.1864268},
    scrollwheel: false,
    zoom: 17
  });
}