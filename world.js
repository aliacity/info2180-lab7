const httprequest= new XMLHttpRequest();
const field = document.getElementById("country")
const result = document.getElementById("result")

document.getElementById("lookup").addEventListener("click", function (){
   httprequest.open("GET",`world.php?country=${field.value}`,true)
    
   httprequest.send()
   httprequest.onreadystatechange= function(){
       if (httprequest.readyState=== XMLHttpRequest.DONE){
         if(httprequest.status===200)  {
             
       result.innerHTML=httprequest.responseText
         }
       }
   }
});
