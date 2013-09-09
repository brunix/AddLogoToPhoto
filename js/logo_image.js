/**
 * JS needed for the project
 * @author Bruno Munoz
 * Date: 23/11/2012
 * Project: "Add Logo to your profile photos"
 */

var tdCurrSel = "td11";
window.onload = function(){

    var all = document.getElementsByTagName("td");
    for (var i=0;i<all.length;i++) {
        all[i].onclick = changeLogoHandler;       
    }
};

function changeLogoHandler(e){
    e = e||window.event;
    var tdElm = e.target||e.srcElement;
	document.getElementById(tdCurrSel).className = "";
	tdElm.className = "selected";
	tdCurrSel= tdElm.id;
	document.getElementById("hiddenTD").value=tdCurrSel;
}