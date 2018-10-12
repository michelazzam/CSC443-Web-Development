class Card{

    constructor (src){
        this.src=src;
        this.front="yellow.png";
        this.imgHtml=document.createElement('img');
        this.imgHtml.src=this.front;

        this.imgHtml.addEventListener("click", this.switchCard());
        // this.switchCard.bind(this);
    this.switchCard=this.switchCard.bind(this);
    }


     switchCard(){
        this.imgHtml.src=this.src;
     }
}