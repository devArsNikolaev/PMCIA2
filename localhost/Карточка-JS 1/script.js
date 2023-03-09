function fun(a,b,c){
return (b*b-Math.PI)/(Math.abs(a-4))+7*Math.sqrt(c+Math.PI);	
}

function returnFun(){

var a = prompt("Введите a: ");
var b = prompt("Введите b: ");
var c = prompt("Введите c: ");
let result = fun(a,b,c);
alert(result);
	
}
