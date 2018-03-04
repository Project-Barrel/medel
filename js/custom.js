jQuery(document).ready(function($) {

                    // orange = f49611
                    // blue = 266470

                    // Mapster Functionality    
                    var $img = $('img[usemap]');
                    var $Map = $('#Map');
                    var $radio = $('input[name="radio"]');

                    var globalArr = [];
                    var selStates = {};

                    $radio.filter('[value=1]').prop('checked', true);
                    var areaOptions = $('area', $Map).map(function(i, area) {
                        var $area = $(area);
                        var targetKey = $area.attr('beschikbaar');
                        var kavelKey = $area.attr('kavel');
                        var obj = {};
                        if (targetKey === "yes") {
                            obj = {
                                fill: true,
                                fillColor: 'f49611',
                                fillOpacity: 1,
                                strokeColor: '266470',
                                stroke: true,
                                strokeWidth: 1,
                                strokeOpacity: 1
                            };
                        }
                        if (!targetKey || targetKey === "no") {
                            obj = {
                                fill: true,
                                fillColor: '266470',
                                fillOpacity: 1,
                                strokeColor: 'f49611',
                                stroke: true,
                                strokeWidth: 1,
                                strokeOpacity: 1
                            };
                        }
                        if (kavelKey === "terminal") {
                            obj = {
                                fill: true,
                                stroke: false,
                                fillColor: '80a468',
                                fillOpacity: 1
                            };
                        } else {
                            globalArr.push(kavelKey);
                        }
                        obj['key'] = kavelKey;
                        return obj;
                    }).get();

                    $img.mapster({
                        mapKey: 'kavel',
                        fill: false,
                        stroke: false,
                        isSelectable: false,
                        areas: areaOptions
                    }).mapster('set', true, globalArr.toString(), {
                        stroke: false,
                        fill: true,
                        fillOpacity: 0.50
                    });

                    var getOptions = function(filter) {
                        var tempArr = [];
                        var options = $('area', $Map).map(function(i, area) {
                            var $area = $(area);
                            var targetKey = $area.attr('beschikbaar');
                            var kavelKey = $area.attr('kavel');
                            var size = $area.attr('size');
                            var obj = {};
                            if ((filter === "3" && size === "big") || (filter === "2" && size === "small")) {
                                obj = {
                                    stroke: true,
                                    fill: true,
                                    fillOpacity: 0.50
                                }
                                obj['key'] = kavelKey;
                                tempArr.push(kavelKey);
                            } else {
                                obj = {
                                    stroke: true,
                                    fill: true,
                                    fillOpacity: 0.75,
                                    strokeWidth: 1,
                                    strokeOpacity: 1
                                };
                                obj['key'] = kavelKey;
                            }
                            if (targetKey === "yes") {
                                obj["fillColor"] = 'f49611';
                                obj["strokeColor"] = '266470';
                            }
                            if (targetKey === "no") {
                                obj["fillColor"] = '266470';
                                obj["strokeColor"] = 'f49611';
                            }
                            if (kavelKey === "terminal") {
                                obj = {
                                    key: kavelKey,
                                    fill: true,
                                    fillColor: '80a468',
                                    fillOpacity: 1
                                };
                            }
                            return obj;
                        }).get();

                        $img.mapster('rebind', {
                            mapKey: 'kavel',
                            stroke: false,
                            fill: false,
                            isSelectable: false,
                            areas: options
                        }).mapster('set', true, tempArr.toString(), {
                            stroke: false
                        });
                    };

                    var globalMapSter = function() {
                        selStates = {};
                        var filter = $('input[name="radio"]:checked').val();
                        $('area').mapster('deselect');
                        if (filter === "2" || filter === "3") {
                            getOptions(filter);
                        } else {
                            $img.mapster('rebind', {
                                mapKey: 'kavel',
                                fill: false,
                                stroke: false,
                                isSelectable: false,
                                areas: areaOptions
                            }).mapster('set', true, globalArr.toString(), {
                                stroke: false,
                                fill: true,
                                fillOpacity: 0.50
                            });
                        }
                    };

                    $radio.on('change', function() {
                        globalMapSter();
                    });

                    // Responsive manual addon
                    
                    var resizeTime = 100;
                    var resizeDelay = 100;

                    function resize(maxWidth, maxHeight) {
                        var
                                imgWidth = $img.width(),
                                imgHeight = $img.height(),
                                newWidth = 0,
                                newHeight = 0;

                        if (imgWidth / maxWidth > imgHeight / maxHeight) {
                            newWidth = maxWidth;
                        } else {
                            newHeight = maxHeight;
                        }
                        var pic_real_width = $img[0].naturalWidth, pic_real_height = $img[0].naturalHeight;
                        $img.css('max-width', pic_real_width + "px");
                        $img.css('max-height', pic_real_height + "px");
                        if (newWidth > pic_real_width) {
                            newWidth = pic_real_width;
                        }
                        $img.mapster('resize', newWidth, newHeight, resizeTime);
                    }

                    function onWindowResize() {
                        var
                                curWidth = $('.container.main-content').width(),
                                curHeight = $(window).height(),
                                checking = false;
                        if (checking) {
                            return;
                        }
                        checking = true;
                        window.setTimeout(function() {
                            var
                                    newWidth = $('.container.main-content').width(),
                                    newHeight = $(window).height();

                            if (newWidth === curWidth && newHeight === curHeight) {
                                resize(newWidth, newHeight);
                            }
                            checking = false;
                        }, resizeDelay);
                    }

                    $(window).bind('resize', onWindowResize);
					onWindowResize();
                    //$(window).trigger('resize');
    
    // Check if there's a Blogpost on Home
    
    if ($(".noblog")[0]){
        $( ".blogspace" ).addClass( "noblog" );
}
    
                });