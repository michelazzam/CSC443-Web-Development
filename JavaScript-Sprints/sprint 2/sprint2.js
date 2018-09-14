var rows=prompt("how many rows do you want for a tree");


for(var i=1;i<=rows;i++)
{
			for(var k=i; k<=rows; k++)
	        {
	            document.write("&nbsp;");
	        }
			for(var j=1;j<=i;j++)
			{

				document.write("*");
			}
			document.write('<br/>');
	
}