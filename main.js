 function show() {
    document.getElementById('sidebar').classList.toggle('active');

 }

 /* When the user clicks on the button,
            toggle between hiding and showing the dropdown content */
 function myFunction() {
     document.getElementById("myDropdown").classList.toggle("show");
 }

/* Events */
var i =0;
var imagens =[];
var time= 2000;

 imagens[0]="images/events.jpg";
 imagens[1]="images/events2.jpg";
 imagens[2]="images/events3.jpg";

 function changeImage(){
     document.slide.src =imagens[i];
     if(i< imagens.length -1){
        i++;
     } else{
         i=0;
     }
     setTimeout("changeImage()", time);
 }
window.onload=changeImage;

 function Get(yourUrl){
     var Httpreq = new XMLHttpRequest(); // a new request
     Httpreq.open("GET",yourUrl,false);
     Httpreq.send(null);
     return Httpreq.responseText;
 }

 var json = [];

 for(var i=10000; i<10010; i++) {
     json.push(JSON.parse(Get("https://collectionapi.metmuseum.org/public/collection/v1/objects/" + i)))
 }

 for(var i=0; i<json.length - 1; i++) {
     console.log(json[i])
     document.querySelector("#artists").innerHTML += "<div class='test'>" + json[i].title + "</div>"
     document.querySelector("#artists").innerHTML += "<img width='200' src='" + json[i].primaryImage + "'>"
 }

