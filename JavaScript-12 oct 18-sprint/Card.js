class Card{

    constructor (src){
        this.src=src;
        this.front="yellow.png";
        
        this.imgHtml=document.createElement('img');
        this.imgHtml.src=this.front;

        this.switchCard=this.switchCard.bind(this);
        this.imgHtml.addEventListener("click", this.switchCard);

    }


     switchCard(){
        this.imgHtml.src=this.src;
     }
}