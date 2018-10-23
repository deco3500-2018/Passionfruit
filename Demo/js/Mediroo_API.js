/**
 * sets up Ajax to be used easily
 * @param {} meth 
 * @param {*} url 
 */
function ajaxObj(meth, url) {
    var x = new XMLHttpRequest();
    x.open(meth, url, true);
    x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    return x;
}

/**
 * Checks to see if AJAX has finished processing its request 
 * AND status is "OK"
 * @param {*} x 
 */
function ajaxReturn(x) {
    if (x.readyState == 4 && x.status == 200) {
        return true;
    }
}

/**
 * Returns the HTML Field
 * @param {*} field 
 * @returns HTML field
 */
function _(field) {
    return document.getElementById(field);
}

/**
 * Empties the HTML element
 * @param {*} field 
 */
function emptyElement(field) {
    _(field).innerHTML = "";
}

/**
 * Returns the value of a selected radio button 
 * with the same element name
 * @param {*} name 
 * @return radioButtonValue
 */
function radioBtnValue(name) {
    var radioBtn = document.getElementsByName(name);
    for (var i = 0; i < radioBtn.length; i++) {
        if (radioBtn[i].type == "radio") {
            if (radioBtn[i].checked) {
                //console.log(radioBtn[i].value);
                return radioBtn[i].value;
            }
        }
    }
}