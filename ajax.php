<script type="text/javascript">
var XMLHttpRequestObject=false; //creer var
if(window.XMLHttpRequest){
  XMLHttpRequestObject=new XMLHttpRequest();
}else if(window.ActiveXObject){
  XMLHttpRequestObject=new ActiveXObject("Microsoft.XMLHTTP");
}
                //the functionS
                function getSectors(){
                  if(XMLHttpRequestObject){
                    XMLHttpRequestObject.open("POST","ajaxControler.php");
                    XMLHttpRequestObject.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                    XMLHttpRequestObject.onreadystatechange=function(){


                    if(XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status==200){
                      var datar=XMLHttpRequestObject.responseText;
                      var divsee=document.getElementById("display");/// la ou ca va afficher
                      divsee.innerHTML=datar;
                    }
                }
                    //les variables a etre envoyer et utiliser
                    var dist=document.getElementById("district").value;
                   // var data=report+'|'+stat+'|'+dat1+'|'+dat2+'|'; //pour concatener plusieures variables
                    XMLHttpRequestObject.send("data=" + dist); // Send variables
                  }
                  return false;
                }
                //the function to search
                function make_search(){
                  if(XMLHttpRequestObject){
                    XMLHttpRequestObject.open("POST","ajaxControler.php");
                    XMLHttpRequestObject.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                    XMLHttpRequestObject.onreadystatechange=function(){

                    if(XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status==200){
                      var datar=XMLHttpRequestObject.responseText;
                      var divsee=document.getElementById("getSearch");/// la ou ca va afficher
                      divsee.innerHTML=datar;
                    }
                }
                    //les variables a etre envoyer et utiliser
                    var dist=document.getElementById("district").value;
                    var sec=document.getElementById("display").value;
                    var locat=document.getElementById("location").value;
                    var category=document.getElementById("type").value;
                    var data=dist+'|'+sec+'|'+locat+'|'+category+'|'; //pour concatener plusieures variables
                    XMLHttpRequestObject.send("search=" + data); // Send variables
                  }
                  return false;
                }

</script>
