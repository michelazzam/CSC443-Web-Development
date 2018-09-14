
var error = "not";


while (error === "not")
    {
        var str = prompt("Enter a Palindrome");

       for(var i=0;i<str.length;i++)
       {
     
            if(str[i]===str[(str.length-1)-i])
            {
                if(i===(str.length-1)/2)
                {
                    alert("great Job!");
                    error ="yes";
                }
            }
            else{
                alert("not a Palindrome! try again");
                i=str.length;
            }
       }
    }
