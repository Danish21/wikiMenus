$(document).ready(function(){function frameLooper(){if(!(myArray.length>0))return clearTimeout(loopTimer),!1;var x=document.getElementById("dynamicText");x.innerHTML+=myArray.shift()}function frameLooper2(){myArray2.length>0?(y=document.getElementById("dynamicReview"),y.innerHTML+=myArray2.shift()):1==index?(y.innerHTML=" ",myString2="World you got to check this Flavor. 5 stars!",myArray2=myString2.split(""),index=0):(y.innerHTML=" ",myString2="Worst Pizza Ever, Wil never ever eat this for the rest of my life",myArray2=myString2.split(""),index=1)}$(document).foundation();var loopTimer,myString="Where are you dining today?",myArray=myString.split("");loopTimer=setInterval(frameLooper,70),frameLooper();var loopTimer2,y,index=1,myString2="Worst Pizza Ever, Wil never ever eat this for the rest of my life",myArray2=myString2.split("");loopTimer2=setInterval(frameLooper2,70),$("a[href*=#]").click(function(event){$("html, body").animate({scrollTop:$($.attr(this,"href")).offset().top-30},500),event.preventDefault()})});