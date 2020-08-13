function showhide(id) {
    element = document.getElementById(id);
    if (element.offsetWidth > 0 && element.offsetHeight > 0) {
        element.getElementsByTagName('input')[0].required = false;
        element.getElementsByTagName('input')[0].value = '';
        element.style.display = "none";
        console.log('disabled2');
        //document.getElementById('randomUrl').checked = true;
    } else {
        element.getElementsByTagName('input')[0].required = true;
        if (document.getElementById('urltoken_')) {
            element.getElementsByTagName('input')[0].value = document.getElementById('urltoken_').value;
        }
        element.style.display = "flex";
        console.log('enabled2');
       //document.getElementById('randomUrl').checked = false;
    }

}
