// JavaScript Document
function odstran() { 
var elems = document.getElementsByClassName('vyber'),
        elem;
    while(elems.length){
        elem = elems.item(0);
        elem.parentNode.removeChild(elem);
    }
}



function vytvor() { 
var counter = 1;
var i = 1

function foo()
{
	var countera = document.getElementById("count_11").value;
	var sel = document.createElement("select");
	var opt1 = document.createElement("option");
	var opt2 = document.createElement("option");
	var opt3 = document.createElement("option");
	var opt4 = document.createElement("option");
	var opt5 = document.createElement("option");
	var opt6 = document.createElement("option");
	var opt7 = document.createElement("option");
	var opt8 = document.createElement("option");
	var opt9 = document.createElement("option");

sel.setAttribute("class", "vyber");
sel.setAttribute("id", "m" + i);
sel.setAttribute("name", "mixik" + i);
sel.setAttribute("required", "required");

opt1.value = "--- Vyberte ---";
opt1.text = "--- Vyberte ---";
opt1.setAttribute("disabled", "");
opt1.setAttribute("selected", "selected");

opt2.value = "Výčepní sv. 10°";
opt2.text = "Výčepní sv. 10°";

opt3.value = "Ležák tm. 11°";
opt3.text = "Ležák tm. 11°";

opt4.value = "Ležák sv. Premium 12°";
opt4.text = "Ležák sv. Premium 12°";

opt5.value = "MAX spec. sv. ležák 11°";
opt5.text = "MAX spec. sv. ležák 11°";

opt6.value = "7 kulí spec. polotm. ležák 13°";
opt6.text = "7 kulí spec. polotm. ležák 13°";

opt7.value = "d´Este spec. sv. ležák 15°";
opt7.text = "d´Este spec. sv. ležák 15°";

opt8.value = "Nealko pivo Ferdinand 0°";
opt8.text = "Nealko pivo Ferdinand 0°";

opt9.value = "Bezlepkové pivo 12°";
opt9.text = "Bezlepkové pivo 12°";

sel.add(opt1, null);
sel.add(opt2, null);
sel.add(opt2, null);
sel.add(opt3, null);
sel.add(opt4, null);
sel.add(opt5, null);
sel.add(opt6, null);
sel.add(opt7, null);
sel.add(opt8, null);
sel.add(opt9, null);

document.getElementById('vybery').appendChild(sel);

    if (counter < countera){
		i++
        counter++
        window.setTimeout(foo, 10);
    }
}

foo();

}

function ukaz() {
	var pocet = document.getElementById("count_11").value;
if (pocet == 0) {
var elems = document.getElementsByClassName('vyber'),
        elem;
    while(elems.length){
        elem = elems.item(0);
        elem.parentNode.removeChild(elem);
    }
} 
}
