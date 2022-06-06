// Parse the URL
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

// Give the URL parameters variable names
var paramSource = getParameterByName('utm_source');
var paramMedium = getParameterByName('utm_medium');

// Check if any values are set
var setSource = ( paramSource != null && paramSource != '' );
var setMedium = ( paramMedium != null && paramMedium != '' );

// Set the cookies
if (setSource || setMedium) {
    var cookieSource = Cookies.get('utm_source');
    var cookieMedium = Cookies.get('utm_medium');

    if  (setSource) {
        Cookies.set('utm_source', paramSource);
    }
    if  (setMedium) {
        Cookies.set('utm_medium', paramMedium);
    }
}

// Grab the cookie value and set the form field values
window.addEventListener('message', function (event) {
    if(event.data.type === 'hsFormCallback' && event.data.eventName === 'onFormReady') {
        var $form_utm_source = $('form.hs-form input[name=utm_source]');
        var $form_utm_medium = $('form.hs-form input[name=utm_medium]');
    
        var cookieSource = Cookies.get('utm_source');
        var cookieMedium = Cookies.get('utm_medium');
    
        var setSource = ( cookieSource != null && cookieSource != '' );
        var setMedium = ( cookieMedium != null && cookieMedium != '' );
        
        if ($form_utm_source.length > 0 && setSource) {
            $form_utm_source.val(cookieSource);
        }
     
        if ($form_utm_medium.length > 0 && setMedium) {
            $form_utm_medium.val(cookieMedium);
        }
    }
});
