var OW_GoogleMapLocationSearch = function($, google)
{
    return function(fieldName, addressFieldId)
    {
        var self = this;

        var geocoder;
        var map;
        var marker;
        var bounds;

        var fieldId = addressFieldId;
        this.isValidValue = false;

        this.initialize = function()
        {        
            geocoder = new google.maps.Geocoder();

            $(function() {
                var latitudeField = $('input[name="'+fieldName+'[latitude]"]');
                var longitudeField = $('input[name="'+fieldName+'[longitude]"]');
                var northEastLat = $('input[name="'+fieldName+'[northEastLat]"]');
                var northEastLng = $('input[name="'+fieldName+'[northEastLng]"]');
                var southWestLat = $('input[name="'+fieldName+'[southWestLat]"]');
                var southWestLng = $('input[name="'+fieldName+'[southWestLng]"]');
                var addressField = $('input[name="'+fieldName+'[address]"]');
                var jsonField = $('input[name="'+fieldName+'[json]"]');

                if ( jsonField.val() )
                {
                    self.isValidValue = true;
                }

                $('#'+fieldId).autocomplete({
                    delay: 250,

                    focus: function (event, ui) {
                        $(".ui-helper-hidden-accessible").hide();
                        event.preventDefault();
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
                        var location = new google.maps.LatLng(ui.item.latitude, ui.item.longitude);

                        addressField.val(ui.item.value);
                        longitudeField.val(ui.item.longitude);
                        latitudeField.val(ui.item.latitude);
                        northEastLat.val(ui.item.result.geometry.viewport.getNorthEast().lat())
                        northEastLng.val(ui.item.result.geometry.viewport.getNorthEast().lng())
                        southWestLat.val(ui.item.result.geometry.viewport.getSouthWest().lat())
                        southWestLng.val(ui.item.result.geometry.viewport.getSouthWest().lng())

                        jsonField.val( JSON.stringify(ui.item.result).replace('"','\"'));
                        self.isValidValue = true;
                    }
                });
            });
        }
    }
} (locationJquey, google)