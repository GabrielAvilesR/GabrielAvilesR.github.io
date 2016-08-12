function declareEvents(){
	document.getElementById("imgCarlos").addEventListener("mouseover", function(){
		changeText("Carlos");
	});
	document.getElementById("imgJered").addEventListener("mouseover", function(){
		changeText("Jered");
	});
	document.getElementById("imgGabriel").addEventListener("mouseover", function(){
		changeText("Gabriel");
	});
	document.getElementById("imgCarlos").addEventListener("mouseout", function(){
		changeTextToDefault();
	});
	document.getElementById("imgJered").addEventListener("mouseout", function(){
		changeTextToDefault();
	});
	document.getElementById("imgGabriel").addEventListener("mouseout", function(){
		changeTextToDefault();
	});
	document.getElementById("imgCarlos").addEventListener("click", function(){
		changePage("Carlos");
	});
	document.getElementById("imgJered").addEventListener("click", function(){
		changePage("Jered");
	});

document.getElementById("imgGabriel").addEventListener("click", function(){
		changePage("Gabriel");
	});


}
function changeText(name){
	var textObject = document.getElementById("photoDescription");

	textObject.innerHTML = "De click en esa imagen para conocer a " + name + ".";
}
function changeTextToDefault(){
	var textObject = document.getElementById("photoDescription");

	textObject.innerHTML = "De click a una imagen para conocernos.";
}
function changePage(name){
	window.location.assign("perfil" + name + ".html");
}

//onload
$(document).ready(function(){
	declareEvents();
});