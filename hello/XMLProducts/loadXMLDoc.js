function loadXMLDoc(Products)
{

if (window.XMLHttpRequest)
{
xhttp=new XMLHttpRequest();
}
else // code for IE5 and IE6
{
xhttp=new ActiveXObject("Microsoft.XMLHTTP");
}

xhttp.open("GET",Products,false);
xhttp.send();
return xhttp.responseXML;
}
