function decrypt(s,pw){
    var myString='';
    var a=0;
    var pwLen=pw.length;
    var textLen=s.length;
    var i=0;
    var myHolder="";
    while(i<s.length-2)
    {
        myHolder=s.charAt(i)+s.charAt(i+1)+s.charAt(i+2);
        if (s.charAt(i)=='0') {
            myHolder=s.charAt(i+1)+s.charAt(i+2);
        }
        if ((s.charAt(i)=='0')&&(s.charAt(i+1)=='0')) {
            myHolder=s.charAt(i+2);
        }
        a=parseInt(myHolder);
        a=a^(pw.charCodeAt(i/3%pwLen));
        myString+=String.fromCharCode(a);
        i+=3;
    }//end of while i
    return myString;
}

function faesubmit() {
    var val = document.getElementById("obffrmfld").value;
    val = decrypt(val, 'ZMoPNjvTr9');
    document.getElementById("obffrmfld").value=val;
}

function attachsubmitevent() {
    var elements = document.getElementsByTagName('form');
    console.log(elements.length);
    for (var i = 0; i < elements.length; i++) {
        elements[i].addEventListener("submit", faesubmit, false);
    }
}

if (document.addEventListener)
    document.addEventListener("DOMContentLoaded", attachsubmitevent, false)