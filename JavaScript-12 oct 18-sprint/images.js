var choice=0;

while(parseInt(choice)<1 || parseInt(choice)>5)
{
choice=prompt("pick a number between 1 and 5");
    if(parseInt(choice)>0 && parseInt(choice)<6)
    {
        var score=0;
        var imgNb=parseInt(choice);
       
        var image=["image1.JPG","image2.JPG","image3.JPG","image4.JPG","image5.JPG"];
     

        var card=[],index;
        var l=image.length;


        while(l>=0)
        {
            let temp;
            index = Math.floor((Math.random() * 10) );
            if(index<5){
                temp=image[image.length-1];
                image[image.length-1]=image[index];
                image[index]=temp;
                l--;
            }
        }
        //now images are shuffled
        //then added to a new array depending on the input number of the user
        var images= addit();
        function addit(){
             let temp=[];
             for(let i=0;i<imgNb;i++){
                 temp.push(image[i]);
             }
             return temp;
         }

        for(let i=0;i<images.length;i++){
            card.push(new Card(images[i]));
            
        }
         l=images.length;
        //now the neww array images is shuffled aggain added again this while loop, can be add in a function that returns the new array
        while(l>=0)
        {
            let temp;
            index = Math.floor((Math.random() * 10));
            if(index<images.length){
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
                        if(card[i].clicked===card[j].clicked && card[i].clicked===1 )
                        {
                            if(card[i].src===card[j].src)
                            {
                            setTimeout(remove,500);
                            function remove(){

                                card[i].clicked=0;
                                card[j].clicked=0;

                                card[i].imgHtml.style.display="none";
                                card[j].imgHtml.style.display="none";
        
                               score=parseInt(score)+3;

                               let sc=document.querySelector('.scorre');
                               sc.innerHTML="score: "+score;
                                }
                                
                            }
                            else{
                                setTimeout(hide,500);
                                function hide(){

                                    card[i].imgHtml.src=card[i].front;
                                    card[j].imgHtml.src=card[j].front;
                
                                    card[i].clicked=0;
                                    card[j].clicked=0;

                                    if(score>0)
                                    {
                                    score=parseInt(score)-1;

                                    let sc=document.querySelector('.scorre');
                                    sc.innerHTML="score: "+score;
                                    }
                                }
                        
                            }
                        }
                    }
                }
            }
        }
    }
    
}