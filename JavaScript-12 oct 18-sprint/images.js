var images=["image1.JPG","image2.JPG","image3.JPG","image4.JPG","image5.JPG"];

var card=[],index;
var l=images.length;


while(l>=0)
{
    let temp;
    index = Math.floor((Math.random() * 10) );
    if(index<5){
        temp=images[images.length-1];
        images[images.length-1]=images[index];
        images[index]=temp;
        l--;
    }
}
//now images are shuffled
for(let i=0;i<images.length;i++){
    card.push(new Card(images[i]));
    
  }
  var l=images.length;
//now images are shuffled aggain added again this while loop, can be add in a function that returns the new array
while(l>=0)
  {
      let temp;
      index = Math.floor((Math.random() * 10) );
      if(index<5){
          temp=images[images.length-1];
          images[images.length-1]=images[index];
          images[index]=temp;
          l--;
      }
  }
  for(let i=0;i<images.length;i++){
    card.push(new Card(images[i]));
    
  }

const c=document.querySelector('.constructor');

for(let i=0;i<card.length;i++)
 {
     c.appendChild(card[i].imgHtml);
 }


 function check(){
     
    for(let i=0;i<card.length;i++)
    {
        for(let j=0;j<card.length;j++)
       {
           if(i===j)
           {
               break;
           }else{
                if(card[i].clicked===card[j].clicked && card[i].clicked===1 && card[j].clicked)
                {
                    if(card[i].src===card[j].src)
                    {
                       setTimeout(remove,500);
                       function remove(){
                        card[i].imgHtml.style.display="none";
                        card[j].imgHtml.style.display="none";
                       }
                        
                    }
                    else{
                        setTimeout(hide,500);
                        function hide(){

                            card[i].imgHtml.src=card[i].front;
                            card[j].imgHtml.src=card[j].front;
        
                            card[i].clicked=0;
                            card[j].clicked=0;
                        }
                 
                    }
                }
            }
        }
    }
 }

 

  //card[1].addEventListener("click", card[1].switchCard);
 
