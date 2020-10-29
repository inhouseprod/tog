function showContent(el,vID){
	$("#"+el.id).load("includes/info.php", { ID: vID });
	var Display = document.getElementById(el.id);
	Display.style.display = "block";
}

function HideContent(el) {
	var Display =  document.getElementById(el.id);
	Display.innerHTML = "";
	Display.style.display = "none";
	}
	
function showNews(nID) {
	$('#infonewscontain').load('http://oldhamgroup.com/newsfeed.php', {ID: nID });
}
