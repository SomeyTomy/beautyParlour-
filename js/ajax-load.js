document.getElementById("employee").addEventListener('change',loadTime);


function loadTime(){

   let empId = document.getElementById("employee").value;
   const checkDate = document.getElementById("datemin").value;

   
   const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){

       if(this.readyState == 4 && this.status == 200){

                 // const returnData = JSON.parse(this.responseText);

                 document.getElementById('loadTime').innerHTML = this.responseText;

       }

   }

   xhr.open("GET",`functions/ajax_function.php?id=${empId}&empdate=${checkDate}`,true);

   xhr.send();


  

   

}