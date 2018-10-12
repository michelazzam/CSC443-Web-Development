var images=["image1.JPEG","image2.JPEG","image3.JPEG","image4.JPEG","image5.JPEG"];

var card=[],index,cardOriginal=[];
var l=images.length;


for(let i=0;i<l;i++){
  card.push(new Card(images[i]));
}



while(l>0)
{
    let temp;
    index = Math.floor((Math.random() * 10) + 1);
    if(index<6){
        temp=images[images.length-1];
        images[images.length-1]=images[index];
        images[index]=temp;
        l--;
    }
}
//now images are shuffled
for(let i=0;i<images.length;i++){
    cardOriginal.push(new Card(images[i]));
  }

const c=document.querySelector('.constructor');

for(let i=0;i<card.length;i++)
 {
     c.appendChild(card[i].imgHtml);
 }

 for(let i=0;i<cardOriginal.length;i++)
 {
     c.appendChild(cardOriginal[i].imgHtml);
 }

  //card[1].addEventListener("click", card[1].switchCard);
 
