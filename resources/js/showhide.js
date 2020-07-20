function showhide(id) {
    element = document.getElementById(id);
    if (element.offsetWidth > 0 && element.offsetHeight > 0) {
        element.style.display = "none";
    } else {
        element.style.display = "block";
    }

}
