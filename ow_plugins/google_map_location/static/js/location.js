
var OW_GoogleMapLocation = function($, google)
{
    
    return function(fieldName, addressFieldId, mapElementId)
    {
        var self = this;

        var geocoder;
        var map;
        var marker;
        var mapElement = $("#"+mapElementId);
        var bounds;

        var fieldId = addressFieldId;
        var mapElementId = mapElementId;
        var zoom = 9;

        var latitudeField;
        var longitudeField;
        var northEastLat;
        var northEastLng;
        var southWestLat;
        var southWestLng;
        var addressField;
        var jsonField;

        this.isValidValue = false;

        this.initialize = function(params)
        {
            var lat = params['lat'];
            var lng = params['lng'];
            var northEastLat = params['northEastLat'];
            var northEastLng = params['northEastLng'];
            var southWestLat = params['southWestLat'];
            var southWestLng = params['southWestLng'];
            var region = params['region'];

            geocoder = new google.maps.Geocoder();

            if ( lat || lng )
            {
                this.isValidValue = true;

                var latlng = new google.maps.LatLng(lat, lng);

                var options = {
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    disableDefaultUI: false,
                    draggable: false,
                    mapTypeControl: false,
                    overviewMapControl: false,
                    panControl: false,
                    rotateControl: false,
                    scaleControl: false,
                    scrollwheel: false,
                    streetViewControl: false,
                    zoomControl:false,
                    zoom: zoom,
                    center: latlng
                };

                mapElement.show();

                map = new google.maps.Map(document.getElementById(mapElementId), options);

                var northEast = null;
                if( northEastLat || northEastLng )
                {
                    northEast = new google.maps.LatLng(northEastLat, northEastLng);
                }

                var southWest = null;
                if( southWestLat || southWestLng )
                {
                    southWest = new google.maps.LatLng(southWestLat, southWestLng);
                }

                if ( northEast && southWest )
                {
                    var bounds = new google.maps.LatLngBounds(southWest,northEast);
                    map.fitBounds(bounds);
                }

                marker = new google.maps.Marker({
                    map: map,
                    draggable: true
                });

                if ( latlng )
                {
                    marker.setPosition(latlng);
                }
            }

            $(function() {

                latitudeField = $('input[name="'+fieldName+'[latitude]"]');
                longitudeField = $('input[name="'+fieldName+'[longitude]"]');
                northEastLat = $('input[name="'+fieldName+'[northEastLat]"]');
                northEastLng = $('input[name="'+fieldName+'[northEastLng]"]');
                southWestLat = $('input[name="'+fieldName+'[southWestLat]"]');
                southWestLng = $('input[name="'+fieldName+'[southWestLng]"]');
                addressField = $('input[name="'+fieldName+'[address]"]');
                jsonField = $('input[name="'+fieldName+'[json]"]');

                if ( jsonField.val() )
                {
                    self.isValidValue = true;
                }

                $('#'+fieldId).autocomplete({
                    delay: 250,   
                    matchContains: true,
                    focus: function (event, ui) {
                        //$(".ui-helper-hidden-accessible").hide();
                      if ( event.keyCode === undefined ) {
                            return false;
                      }

                       //event.preventDefault();
                    },


                    source: function(request, response) {

                        var icon= $('#'+fieldId + '_icon');
                        icon.removeClass('ic_googlemap_pin');
                        icon.addClass('ow_inprogress');

                        geocoder.geocode( {
                            'address': request.term,
                            'region': 'region'
                            }, function(results, status) {

                            icon.removeClass('ow_inprogress');
                            icon.addClass('ic_googlemap_pin');

                            response($.map(results, function(item) {
                                return {
                                    label:  item.formatted_address,
                                    latitude: item.geometry.location.lat(),
                                    longitude: item.geometry.location.lng(),
                                    value: item.formatted_address,
                                    result: item
                                }
                            }));
                        })
                    },

                    select: function(event, ui) {

                        mapElement.show();

                        self.setValue(ui.item.result)
                        self.isValidValue = true;
                    }
                });
            });


            this.setValue = function(item)
            {
                var location = item.geometry.location;

                if ( !map )
                {
                    var options = {
                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                        disableDefaultUI: false,
                        draggable: false,
                        mapTypeControl: false,
                        overviewMapControl: false,
                        panControl: false,
                        rotateControl: false,
                        scaleControl: false,
                        scrollwheel: false,
                        streetViewControl: false,
                        zoomControl:false,
                        zoom: zoom,
                        center: location
                    };

                    map = new google.maps.Map(document.getElementById(mapElementId), options);
                }
                map.fitBounds(item.geometry.viewport);

                if ( !marker )
                {
                    marker = new google.maps.Marker({
                        map: map,
                        draggable: true
                    });
                }

                marker.setPosition(location);

                addressField.val(item.formatted_address);
                longitudeField.val(item.geometry.location.lng());
                latitudeField.val(item.geometry.location.lat());
                northEastLat.val(item.geometry.viewport.getNorthEast().lat())
                northEastLng.val(item.geometry.viewport.getNorthEast().lng())
                southWestLat.val(item.geometry.viewport.getSouthWest().lat())
                southWestLng.val(item.geometry.viewport.getSouthWest().lng())

                jsonField.val( JSON.stringify(item).replace('"','\"'));
                self.isValidValue = true;
            }

    //        google.maps.event.addListener(marker, 'drag', function() {
    //            geocoder.geocode({
    //                'latLng': marker.getPosition()
    //                }, function(results, status) {
    //                if (status == google.maps.GeocoderStatus.OK) {
    //                    if (results[0]) {
    //                        $(fieldId).val(results[0].formatted_address);
    //                        //$('#latitude').val(marker.getPosition().lat());
    //                        //$('#longitude').val(marker.getPosition().lng());
    //                    }
    //                }
    //            });
    //        });

        }
    }
} (locationJquey, google)