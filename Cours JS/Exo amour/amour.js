let url = "https://love-calculator.p.rapidapi.com/getPercentage";
let text = document.querySelector("text");
let button = document.querySelector(".button");
let request;
let inputH = document.querySelector("#inputH");
let inputF = document.querySelector("#inputF");
let heart = document.querySelector("#container");
let regex = /[0-9]+/;
let startPoint = 0;
let duree = 1.4;
heart.style.display = "none";
let error = document.createElement("p");
document.body.append(error);
error.classList.add("error");
function sendResult(){
	H = inputH.value;
	F = inputF.value;
	if(H == "" || F ==""){		
		heart.style.display = "none";
		error.style.display = "flex";
		error.innerText = "Veuillez renseigner un prénom d'homme et un prénom de femme !";
		error.classList.add("error");
	}else if(isNaN(H) && isNaN(F)){		
		heart.style.display = "block";
		error.style.display = "none";
		url += "?fname=" + H + "&sname=" + F;
		actualiseLove();
		url="https://love-calculator.p.rapidapi.com/getPercentage";
	}else{
		error.style.display = "flex";
		error.innerText = "Les chiffres ne sont pas acceptés !";
	}
}
function actualiseLove(){
	fetch(url, {
		"method": "GET",
		"headers": {
			"x-rapidapi-key": "44e636eeb7mshe16d28f5d99e12cp160771jsnc7bd8959356f",
			"x-rapidapi-host": "love-calculator.p.rapidapi.com"
		}
	})
	.then(response => {
		if(response.ok){
			return response.json();
		}	
	})
	.then(response =>{
		request = response.percentage;
		let delta = Math.ceil((duree*1000)/request)
		let number = Number(request);
		var bar = new ProgressBar.Path('#heart-path', {
			easing: 'easeInOut',
			duration: 1400,
		});
		bar.set(0);
		bar.animate(number/100);
		function graduate(){
			if(startPoint<request){
				text.textContent = startPoint++ + "%";
				if(startPoint<request){
					setTimeout(graduate, delta);
				}
			}
		}
		setTimeout(graduate, delta);
	})
	.catch(err => {		
		console.log(err);
	});
}
inputH.addEventListener("input", function (event){
	if(!inputH.value.match(regex)){
		error.style.display ="none";
		button.addEventListener("click", sendResult);		
	}else{
		button.removeEventListener("click", sendResult);
		error.style.display = "flex";
		error.innerText = "Les chiffres ne sont pas acceptés !";
	}
});
inputF.addEventListener("input", function (event){
	if(!inputF.value.match(regex)){
		error.style.display ="none";
		button.addEventListener("click", sendResult);		
	}else{
		button.removeEventListener("click", sendResult);
		error.style.display = "flex";
		error.innerText = "Les chiffres ne sont pas acceptés !";
	}
});
button.addEventListener("click", sendResult);