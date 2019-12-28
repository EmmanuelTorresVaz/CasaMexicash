var contador = 1;
function myFunction(x){
    if(contador%2!==0){
        x.classList.toggle("change");
        var a = document.getElementById('menu');
        a.style.display="block";
        contador+=1;
    }
    else{
        if(contador%2===0){
            x.classList.toggle("change");
            var a = document.getElementById('menu');
            a.style.display="none";
            contador+=1;
        }
    }
}
var cont = 1;
function menu(x, opc){

        x.classList.toggle("change");
        var a;
        switch (opc) {
            case 1:
                a = document.getElementById('empeño');
                break;
            case 2:
                a = document.getElementById('cierre');
                break;
            case 3:
                a = document.getElementById('ventas');
                break;
            case 4:
                a = document.getElementById('inventario');
                break;
            case 5:
                a = document.getElementById('reportes');
                break;
            case 6:
                a = document.getElementById('movimientos');
                break;
            case 7:
                a = document.getElementById('antilavado');
                break;
            case 8:
                a = document.getElementById('utilerias');
                break;
            case 9:
                a = document.getElementById('cuenta');
                break;
        }
        if(cont%2 !== 0){
            x.classList.toggle("change");
            a.style.display="block";
        }
        else{
            if(cont%2===0){
                x.classList.toggle("change");
                a.style.display="none";
            }
        }
        cont += 1;
}

function closeMenu(x) {
    x.classList.toggle("change");
    var wid = document.getElementById('menu');
    wid.style.display="none";
}