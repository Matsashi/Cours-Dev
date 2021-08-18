const cross = document.querySelectorAll("span");
let crossId;
for(let i=0; i<cross.length; i++){
    cross[i].addEventListener("click", function(){
        crossId = cross[i].id;
        console.log(crossId);
        let choice = confirm("Voulez-vous réellement supprimer cet animal ?");
        if (choice){
            deleteAnimal(crossId);
        }
        
    })
}
// cross.forEach(function(event){
//     this.addEventListener("click", function(){
//         console.log(event.id); 
//     })
// });
function deleteAnimal(event){
    const url = "traitement_ajax.php?crossId="+ event;
	fetch(url, {
		"method": "GET",
	})
	.then(response => {
		if(response.ok){
            // console.log(response);
			return response.json();
		}	
	})
	.then(response =>{
        const deletedAnimal = document.getElementById(event);
        deletedAnimal.remove();
	})
	.catch(error => {		
		console.log(error);
	});
}