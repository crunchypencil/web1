var i = 10;
var j = "PISS!";

function timedCount() {
    i = i - 1;
	if (i<=0) {
		clearTimeout(timey);
		postMessage(j);
		return;
	} else {
		postMessage(i);
	}
    var timey = setTimeout("timedCount()",1000);
}

timedCount(); 