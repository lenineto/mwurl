function showhide(id) {
    element = document.getElementById(id);
    console.log(element);
    if (element.offsetWidth > 0 && element.offsetHeight > 0) {
        console.log(element.getElementsByTagName('input')[0]);
        element.getElementsByTagName('input')[0].required = false;
        element.getElementsByTagName('input')[0].value = '';
        element.style.display = "none";
    } else {
        element.getElementsByTagName('input')[0].required = true;
        if (document.getElementById("_"+id)) {
            element.getElementsByTagName('input')[0].value = document.getElementById("_"+id).value;
        }
        element.style.display = "block";
    }

}
