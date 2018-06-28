//Cookies
const setCookie = (cname, cvalue, exdays) => {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

const deleteCookie = name => {
    document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
    document.getElementById('showDog').click();
}

//Conseguir la cookie sí es que existe
const getCookie = cname => {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

//Verificar en base a la anterior función que es lo que se hará
checkCookie = val => {
    var user = getCookie(val);
    if (user != "") {
        return true;
    } else {
        return false;
    }
}

//Cambiar el idioma cuando la cookie ya existe
updateCookie = (name, val) => {
    setCookie(name, val, 30);
}