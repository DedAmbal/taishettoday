var map;
var arrMarkers = [];
var arrInfoWindows = [];
 
function mapInit(){
  var centerCoord = new google.maps.LatLng(55.940225, 98.004930);
  var mapOptions = {
      zoom: 13,
      center: centerCoord,
      mapTypeId: google.maps.MapTypeId.ROADMAP
 	  };
 
  map = new google.maps.Map(document.getElementById("blockMainMap"), mapOptions);
 
  //Определяем область отображения меток на карте
  var latlngbounds = new google.maps.LatLngBounds();
 
  //Загружаем данные в формате JSON из файла map.json
 
	}
 
 function changeView(one, elem) {
 	$(one).parent().children('a').removeClass('active');
	$(one).addClass('active');
	
  function setAllMap(map) {
  for (var i = 0; i < arrMarkers.length; i++) {
    arrMarkers[i].setMap(map);
  }
}
	
  setAllMap(null);
  arrMarkers = [];
  
  $("#aside-menu > li").remove();
	
 	
 	//Определяем область отображения меток на карте
  var latlngbounds = new google.maps.LatLngBounds();
 	
 $.getJSON(elem, {}, function(data){
			
           $.each(data.places, function(i, item){
 
 
		     	 $("#aside-menu").append('<li><a href="javascript:void(0);" rel="' + i + '" onclick="jMarkers($(this))">' + item.title + '</a></li>');
 
 
// var image = 'http://google-maps-icons.googlecode.com/files/bank.png';
 
				 var marker = new google.maps.Marker({
                     position: new google.maps.LatLng(item.lat, item.lng),
                     map: map,
					 title: item.title,
					 icon: item.icon
    				 });
 
				//Добавляем координаты меток
				latlngbounds.extend(new google.maps.LatLng(item.lat, item.lng));
 
				arrMarkers[i] = marker;
 
				var infowindow = new google.maps.InfoWindow({
 
					content: "<h3>"+ item.title +"</h3><p>"+ item.description +"</p>"
 
				});
 
				arrInfoWindows[i] = infowindow;
 
				google.maps.event.addListener(marker, 'click', function() {
 
					infowindow.open(map, marker);
 
				});
 
			});
 
			//Центрируем и масштабируем карту так, чтобы были видны все метки
			map.setCenter( latlngbounds.getCenter(), map.fitBounds(latlngbounds));
 
		});
}		
 
 
 
$(function(){
     	//Определяем карту (добавляем маркеры, балуны и список со ссылками)
 		mapInit(); 
});
	
function jMarkers(elem){
  
  var i = $(elem).attr("rel");
 
  // Эта строка кода, закрывает все открытые балуны, для открытия выбранного
  
  for(x=0; x < arrInfoWindows.length; x++){ arrInfoWindows[x].close(); }
 
  arrInfoWindows[i].open(map, arrMarkers[i]);
 
}