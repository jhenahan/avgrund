jQuery(document).ready(function () {
    var params = jQuery('[data-avgrund]');
    jQuery.each(params, function() {
        var avgrundParams = jQuery(this).data('avgrund');
        jQuery(this).avgrund({
            template: avgrundParams.template,
            width: avgrundParams.width,
            height: avgrundParams.height,
            showClose: avgrundParams.showClose,
            showCloseText: avgrundParams.showCloseText,
            closeByEscape: avgrundParams.closeByEscape,
            closeByDocument: avgrundParams.closeByDocument,
            holderClass: avgrundParams.holderClass,
            overlayClass: avgrundParams.overlayClass,
            enableStackAnimation: avgrundParams.enableStackAnimation,
            onBlurContainer: avgrundParams.onBlurContainer,
            openOnEvent: avgrundParams.openOnEvent,
            setEvent: avgrundParams.setEvent,
            onLoad: avgrundParams.onLoad,
            onUnload: avgrundParams.onUnload
        });
    });
});