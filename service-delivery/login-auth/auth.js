function domaine_activite1(){

    var a,b,c,ptest;
    a=document.getElementById('grp1');
    b=document.getElementById('cli');
    c=document.getElementById('prest');
    ptest=document.getElementById('ptest');
    if(b.checked){
        ptest.innerHTML="client";
        

    }else{
        ptest.innerHTML="prestateur"
    }
}
function domaine_activite(){

    var a,b,c,ptest,idselect1;
    a=document.getElementById('grp1');
    b=document.getElementById('cli');
    c=document.getElementById('prest');
    ptest=document.getElementById('ptest');
    idselect1=document.getElementById('idselect1');
    if(b.checked){
        idselect1.style.display='none';
    }else{
        idselect1.style.display='block';
    }
}