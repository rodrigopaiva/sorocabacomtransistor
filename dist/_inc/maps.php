<div id="mapa"></div><style>#mapa {
        width: 100%;
        height: 300px;
    }</style><script>function initialize() {
        var mapProp = {
            center: new google.maps.LatLng(-8.050458, -34.911433),
            zoom:17,
            scrollwheel:false,
            disableDefaultUI:true,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById("mapa"),mapProp);

        // caminho direto do marcador
        var image = 'http://www.dominio.com.br/images/bullet.png';
        var myLatLng = new google.maps.LatLng(-8.050458, -34.911433);
        var marcadorPersonalizado = new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: image,
            title: 'Titulo do lugar - Recife/PE',
            animation: google.maps.Animation.DROP
        });

        // Exibir texto ao clicar no ícone;
        google.maps.event.addListener(marcadorPersonalizado, 'click', function() {
           infowindow.open(map,marcadorPersonalizado);
        });

        // Estilizando o mapa;
          // Criando um array com os estilos
          var styles = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}];

          // crio um objeto passando o array de estilos (styles) e definindo um nome para ele;
          var styledMap = new google.maps.StyledMapType(styles, {
            name: "Mapa Style"
          });

          // Aplicando as configurações do mapa
          map.mapTypes.set('map_style', styledMap);
          map.setMapTypeId('map_style');
    }

    function loadScript() {
        var script = document.createElement("script");
        script.type = "text/javascript";
        script.src = "http://maps.googleapis.com/maps/api/js?key=AIzaSyCpHfJ1ujAE8TDMRvmvXKXq_RXNzrnAolo&callback=initialize";
        document.body.appendChild(script);
    }

    window.onload = loadScript();</script>