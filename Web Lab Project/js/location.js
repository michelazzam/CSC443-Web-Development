
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


function show(event){
    let reg=document.getElementById(event);
  const style=reg.style.display;

  if(style === "block")
    {
        reg.style.display="none";   
    }else{
        reg.style.display= 'block';
    }
};

let compStar=document.getElementById("comp_rat").getAttribute("value");
const rating=parseInt(compStar);
for(let i=0; i < rating;i++)
{
    const star=document.querySelector("._c"+i);
     star.classList.add('checked');
}


    let packageStar=document.querySelectorAll("#pack_rat");
    for(p of packageStar)
    {
        const rat=parseInt(p.getAttribute("value"));
       const id=p.getAttribute("name");

        for(let i=0; i < rat;i++)
        {
          
            const star=document.querySelector("._p"+id+"p"+i);
            star.classList.add('checked');
        }

        $("#datetimepicker"+id).datetimepicker({
            // disableEntry:true,
           step: 5
        });
        
    
    }
