
var autor=[];
var i=0;
function pegar(a){
    autor[i]=a;
    i=i+1;
    
}

function autores(){
    apagar();
    var f=0;
    var au=[];
for(var x=0;x<autor.length;x++){
    var r = autor[x];
   
    if(au.indexOf(autor[x])==-1){   
        au[f]=autor[x];
        f++;
    }
}
for(var x=0;x<au.length;x++){
    var novaDiv=`<button class="arr" onclick="location.href='index.php?p=autores&ar=${au[x]}'"}>${au[x]}</button>`
$("#bobu").append(novaDiv);
}

}
function apagar(){
    $(".arr").remove();
}