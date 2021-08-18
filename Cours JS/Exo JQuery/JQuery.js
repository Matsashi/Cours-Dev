// $('p').text("Je suis un test");
// $('p').after("<div>div après</div>");
// $('p').before("<div>div avant</div>");
// $('p:first-of-type').before("<a href='https://google.fr' target='blank'>Ceci est un lien vers mon site</a>");
// $("a").attr("href","https://longdogechallenge.com");
// $('p:nth(1)').css("color", "red");
// $('p:nth(1)').addClass("css-modifier");
// $('.css-modifier').css({"text-decoration":"underline", "font-weight": "bold"});
// $('.css-modifier').removeClass("css-modifier");
// $('div').remove();
// $("p").on("click", function (){
//     $("p").css({"color":"red","text-decoration":"underline", "font-size":"larger"})
// })
function toggleElement(){
    $('p').toggle();
    $('button').toggle();
}
$('button').on("click", function(){
    $('h1').animate({
        marginLeft: "200px",
    }, "slow");
    setTimeout(function(){
        $('p').toggle();
        $('button').toggle();
    }
    ,800);
    setTimeout(() => {
        $('h1').animate({
            marginTop: "200px"
        }, "slow"); 
    }, 900);   
});
$(document).on("mousemove",function (e){
    setTimeout(() => {
        $('#pacman').css({left:e.pageX, top:e.pageY})
    }, 100);    
})

// $.ajax({
//     url : "https://api.nasa.gov/planetary/apod?api_key=9XK8hahtD9cEkqsmOkp4dQUITgdgUchEbcoJCpTG",
//     type : "GET",
//     datatype : "JSON",
//     success : (data) => {
//         console.log(data);
//         $('p:last-of-type').after("<h2>"+ data.title + "</h2>");
//         $('h2').after("<img src="+data.url+">");
//         $('img').attr("alt",data.title);
//         $('img').after(data.explanation);
//     },
//     error: (data) => {
//         console.log("errorAPI")
//     }
// });
