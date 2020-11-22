$(document).ready(function() {
 $(".spanPais").html(country2emoji("US"));
});

function country2emoji(country_code) {
    var OFFSET = 127397;
    var cc = country_code.toUpperCase();
    function _toConsumableArray(arr) {
        if (Array.isArray(arr)) {
            for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) {
                arr2[i] = arr[i];
            }
            return arr2;
        } else {
            return Array.from(arr);
        }
    }
    return /^[A-Z]{2}$/.test(cc) ? String.fromCodePoint.apply(String, _toConsumableArray([].concat(_toConsumableArray(cc)).map(function (c) {
        return c.charCodeAt() + OFFSET;
    }))) : null;
}