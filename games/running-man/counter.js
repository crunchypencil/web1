var i = 11;
var j = "PISS!";

function timedCount() {
    i = i - 1;
	if (i<=0) {
		postMessage(j);
		clearTimeout(timey);
	} else {
		postMessage(i);
		
	}
    var timey = setTimeout("timedCount()",1000);
}

timedCount(); 