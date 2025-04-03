window.gtranslate_installed=true;var gt_wrapper=document.getElementById('gtranslate_wrapper');if(gt_wrapper!=null)gt_wrapper.style.display='block';
var old_document_body_appendChild = document.body.appendChild;
document.body.appendChild = function() {
    if(typeof arguments != 'undefined' && typeof arguments[0] != 'undefined' && typeof arguments[0].src == 'string' && arguments[0].src.substring(arguments[0].src.length-30) == '?cb=googleTranslateElementInit')
        return;
    return old_document_body_appendChild.apply(this, arguments);
}
