function diffdate(){

var date_1 = document.getElementById('datedebut').value;
var date_2 = document.getElementById('datefin').value;
var total=document.getElementById('total').value;
var prix=document.getElementById('prix').innerText;
var co=document.getElementById('co');
var inputtest=document.getElementById('inputtest');
//var inputtest=document.getElementById('inputtest').value;


const dateOne=new Date(date_1);
const dateTwo=new Date(date_2);
const time= Math.abs(dateTwo-dateOne);
const days= Math.ceil(time / (1000 * 60 * 60 * 24));


const totalttcc=total*days*prix*1;


co.value=totalttcc;
}


