document.addEventListener("DOMContentLoaded", function() {
    var menuDouble1 = document.querySelector("#md1");
    var menuDropdownVisibility1 = document.querySelector("#mdv1");
    var menuDouble2 = document.querySelector("#md2");
    var menuDropdownVisibility2 = document.querySelector("#mdv2");

    menuDropdownVisibility1.addEventListener("mouseover", function() {
        menuDouble1.style.backgroundColor = "#015963";
        menuDouble1.style.color = "#FFFFFF";
    });

    menuDropdownVisibility1.addEventListener("mouseout", function() {
        menuDouble1.style.backgroundColor = "";
        menuDouble1.style.color = "";
        
    });

    menuDropdownVisibility2.addEventListener("mouseover", function() {
        menuDouble2.style.backgroundColor = "#015963";
        menuDouble2.style.color = "#FFFFFF";
    });

    menuDropdownVisibility2.addEventListener("mouseout", function() {
        menuDouble2.style.backgroundColor = "";
        menuDouble2.style.color = "";
    });
});
