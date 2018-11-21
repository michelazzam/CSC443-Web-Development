let express = require('express');
let jokes= require('give-me-a-joke');
let cat=require('cat-me');
let bodyParser = require('body-parser');

let request=require('request');
let data;

let url="http://api.afmdate.com/ahbaab/v1/home/settings";

let app= express();
app.use(bodyParser.urlencoded({extended:true}));

let students=['charboul','ninja','king','gueen'];

//requesting an api, then parsing the body and adding it to a global variable
request(url,function(error,response,body){
    if(error)
    {
        console.log("----------------------------------------------")
        console.log(error);
    }
    else if(response.statusCode===200){
        // console.log(body);
   data= (JSON.parse(body)).data.contactWays;
        // console.log("***************************************************");
        // console.log(body);
       
    }
});


//to output the data in html
app.get('/data',(req,res)=>{
    res.render('home.ejs',{dataAll:data});
});

//-------home in here is a route 
app.get('/',function(req,res){
    res.send('Hello world');
});


// app.get('/home',(req,res)=>{
//    let name="chady";
//  res.render('home.ejs',{namez : name});
// });
app.get('/ninja/3',(req,res)=>{
    res.send('ninjaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
})

app.get('/students',(req,res)=>{
    res.render('home.ejs',{student:students})
});

app.post('/addStudent',(req,res)=>{
    let name=req.body.name;
    students.push(name);
    // start();
    res.send(students);
   });
   
 let start= ()=>{
    app.get('/users',(req,res)=>{
        let names=['michel','ninja'];
        let x="";
        
        for(name of names)
        {
            x+=name+`<br/>`;
        }
        res.send(x);
    
    });
 };


//output in the console a random cat
app.get('/drawCat',(req,res)=>{
console.log(cat());
});

//get dynamic name
app.get('/welcome/:name',(req,res)=>{
    res.render('home.ejs',{namez : req.params.name});
});

//error if anything else was input
app.get('*',(req,res)=>{
    // res.send("404 --- not found");
     console.log(req);
})

app.listen(3000, function(){
    console.log("server running");
      //  jokes is a package
    jokes.getRandomDadJoke (function(joke) {
        console.log(joke);
    });

});


