
let but=document.getElementById("downsub");

but.addEventListener("click",()=>{

    let content=document.getElementById("msgContent").value;
    let subject=document.getElementById("msgSubject").value;
   
    if(!isNaN(subject)){
        alert("please enter a subject");
    }
    else if(!isNaN(content))
    {
        alert("please enter a body");
    
    }
   else{
        alert("your subject: "+subject+" - has been delivered -- "+content);
   }
});