
var but=document.getElementsByClassName('det');

function passVal(para){
        var data = {
            regno : para
        };
        console.log(data['regno']);
        $.post("display_veh.php", data);
    }

for (var i = 0; i < but.length; i++) {
  but[i].addEventListener("click",function(){
    var regno=this.parentNode.parentNode.firstChild.childNodes[0];
    passVal(regno);
  })
}
