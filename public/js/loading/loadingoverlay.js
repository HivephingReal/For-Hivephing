/***************************************************************************************************
LoadingOverlay - A flexible loading overlay jQuery plugin
    Author          : Gaspare Sganga
    Version         : 1.5.4
    License         : MIT
    Documentation   : https://gasparesganga.com/labs/jquery-loading-overlay/
****************************************************************************************************/
(function($, undefined){
    // Default Settings
    var _defaults = {
        "color"             : "blue",
        "custom"            : "",
        "fade"              : true,
        "fontawesome"       : "",
        "image"             : "data:image/gif;base64,R0lGODlhZABkAMQeAPT6/YfK7NXt+Eaw4pXR73zG6uHy+mO851O15Or2+6fY8fn8/iem37Hc88Tl9rvh9Dut4QCc2nHB6czo99zv+ZzT7+f0+47N7cjm98/q9+74/G3A6BCh3OTz+////wAAACH/C05FVFNDQVBFMi4wAwEAAAAh/wtYTVAgRGF0YVhNUDw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDowMTgwMTE3NDA3MjA2ODExOTEwOUY2RDlDRDI4RkJBMyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpERDAwMUYzQUU5NDgxMUUwOTRENjkzMTcyN0YwNTlFMyIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpERDAwMUYzOUU5NDgxMUUwOTRENjkzMTcyN0YwNTlFMyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IE1hY2ludG9zaCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjA0ODAxMTc0MDcyMDY4MTE5MTA5RjZEOUNEMjhGQkEzIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjAxODAxMTc0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",
        "imagePosition"     : "center center",
        "maxSize"           : "100px",
        "minSize"           : "20px",
        "resizeInterval"    : 50,
        "size"              : "50%",

        "zIndex"            : 2147483647
    };
    
    $.LoadingOverlaySetup = function(settings){
        $.extend(true, _defaults, settings);
    };
    
    $.LoadingOverlay = function(action, options){
        switch (action.toLowerCase()) {
            case "show":
                var settings = $.extend(true, {}, _defaults, options);
                _Show("body", settings);
                break;
                
            case "hide":
                _Hide("body", options);
                break;
        }
    };
    
    $.fn.LoadingOverlay = function(action, options){
        switch (action.toLowerCase()) {
            case "show":
                var settings = $.extend(true, {}, _defaults, options);
                return this.each(function(){
                    _Show(this, settings);
                });
                
            case "hide":
                return this.each(function(){
                    _Hide(this, options);
                });
        }
    };
    
    
    function _Show(container, settings){
        container = $(container);
        var wholePage   = container.is("body");
        var count       = container.data("LoadingOverlayCount");
        if (count === undefined) count = 0;
        if (count === 0) {
            var overlay = $("<div>", {
                "class" : "loadingoverlay",
                "css"   : {
                    "background-color"  : settings.color,
                    "position"          : "relative",
                    "display"           : "flex",
                    "flex-direction"    : "column",
                    "align-items"       : "center",
                    "justify-content"   : "center"
                }
            });
            if (settings.zIndex !== undefined) overlay.css("z-index", settings.zIndex);
            if (settings.image) overlay.css({
                "background-image"      : "url(" + settings.image + ")",
                "background-position"   : settings.imagePosition,
                "background-repeat"     : "no-repeat"
            });
            if (settings.fontawesome) $("<div>", {
                "class" : "loadingoverlay_fontawesome " + settings.fontawesome
            }).appendTo(overlay);
            if (settings.custom) $(settings.custom).appendTo(overlay);
            if (wholePage) {
                overlay.css({
                    "position"  : "fixed",
                    "top"       : 0,
                    "left"      : 0,
                    "width"     : "100%",
                    "height"    : "100%"
                });
            } else {
                overlay.css("position", (container.css("position") === "fixed") ? "fixed" : "absolute");
            }
            _Resize(container, overlay, settings, wholePage);
            if (settings.resizeInterval > 0) {
                var resizeIntervalId = setInterval(function(){
                    _Resize(container, overlay, settings, wholePage);
                }, settings.resizeInterval);
                container.data("LoadingOverlayResizeIntervalId", resizeIntervalId);
            }
            if (!settings.fade) {
                settings.fade = [0, 0];
            } else if (settings.fade === true) {
                settings.fade = [400, 200];
            } else if (typeof settings.fade === "string" || typeof settings.fade === "number") {
                settings.fade = [settings.fade, settings.fade];
            }
            container.data({
                "LoadingOverlay"                : overlay,
                "LoadingOverlayFadeOutDuration" : settings.fade[1]
            });
            overlay
                .hide()
                .appendTo("body")
                .fadeIn(settings.fade[0]);
        }
        count++;
        container.data("LoadingOverlayCount", count);
    }

    function _Hide(container, force){
        container = $(container);
        var count = container.data("LoadingOverlayCount");
        if (count === undefined) return;
        count--;
        if (force || count <= 0) {
            var resizeIntervalId = container.data("LoadingOverlayResizeIntervalId");
            if (resizeIntervalId) clearInterval(resizeIntervalId);
            container.data("LoadingOverlay").fadeOut(container.data("LoadingOverlayFadeOutDuration"), function(){
                $(this).remove();
            });
            container.removeData(["LoadingOverlay", "LoadingOverlayCount", "LoadingOverlayFadeOutDuration", "LoadingOverlayResizeIntervalId"]);
        } else {
            container.data("LoadingOverlayCount", count);
        }
    }
    
    function _Resize(container, overlay, settings, wholePage){
        if (!wholePage) {
            var x = (container.css("position") === "fixed") ? container.position() : container.offset();
            overlay.css({
                "top"       : x.top + parseInt(container.css("border-top-width"), 10),
                "left"      : x.left + parseInt(container.css("border-left-width"), 10),
                "width"     : container.innerWidth(),
                "height"    : container.innerHeight()
            });
        }
        var c    = wholePage ? $(window) : container;
        var size = "auto";
        if (settings.size && settings.size != "auto") {
            size = Math.min(c.innerWidth(), c.innerHeight()) * parseFloat(settings.size) / 100;
            if (settings.maxSize && size > parseInt(settings.maxSize, 10)) size = parseInt(settings.maxSize, 10) + "px";
            if (settings.minSize && size < parseInt(settings.minSize, 10)) size = parseInt(settings.minSize, 10) + "px";
        }
        overlay.css("background-size", size);
        overlay.children(".loadingoverlay_fontawesome").css("font-size", size);
    }
    
}(jQuery));