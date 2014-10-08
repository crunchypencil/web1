var i = 10;
var j = "PISS!";

function timedCount() {
	if (i<=0) {
		clearTimeout(timey);
		postMessage(j);
		return;
	} else {
		postMessage(i);
		i = i - 1;
	}
    var timey = setTimeout("timedCount()",1000);
}

timedCount(); 