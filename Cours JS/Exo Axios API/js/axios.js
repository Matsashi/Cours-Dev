const image = document.querySelector("#menu-img");
const blagueTitle = document.querySelector("#joke-title");
const blagueAnswer = document.querySelector("#joke-answer");
const newImage = document.querySelector("#newImage");
const newJoke = document.querySelector("#newJoke");
newImage.addEventListener("click",()=>{
    let timestamp = new Date().getTime();
    document.body.style.backgroundImage = 'url("https://source.unsplash.com/1600x900/?funny/' + timestamp + '")';
});
newJoke.addEventListener("click", actualiseJoke);
function actualiseJoke(){
    const options = {
        method: 'GET',
        url: 'https://www.blagues-api.fr/api/random',
        headers: {
            'Authorization': `Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoiMjUzMjE0NDYwNzE2NjQ2NDAxIiwibGltaXQiOjEwMCwia2V5IjoiYVJEZGRPTHdnRWh4anR3bDRyUDN0a050WjMwQ3UwUlBmbzR6VmY3dU1BNFlsaE1kanIiLCJjcmVhdGVkX2F0IjoiMjAyMS0wOS0wOFQwODoyMjo0MiswMDowMCIsImlhdCI6MTYzMTA4OTM2Mn0.ewnPV8hDPSAzDBcnyeUhCMF5exsY-q6JvuL1KdPtO1I
            `
        }
    };
    axios.request(options).then(function (response) {
        console.log(response.data);
        blagueTitle.innerHTML = response.data.joke;
        blagueAnswer.innerHTML = response.data.answer;
    }).catch(function (error) {
        console.error(error);
    });
}
actualiseJoke();