<script type="text/javascript">
var XMLHttpRequestObject=false; //creer var
if(window.XMLHttpRequest){
  XMLHttpRequestObject=new XMLHttpRequest();
}else if(window.ActiveXObject){
  XMLHttpRequestObject=new ActiveXObject("Microsoft.XMLHTTP");
}

                //the functionS 
                function getSubCategory(){
                  if(XMLHttpRequestObject){
                    XMLHttpRequestObject.open("POST","getSubCategory.php");
                    XMLHttpRequestObject.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                    XMLHttpRequestObject.onreadystatechange=function(){

                    
                    if(XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status==200){
                      var quantityEntered=document.getElementById("prixUniqqq").value;
                      var datar=XMLHttpRequestObject.responseText;
                      var divsee=document.getElementById("getSubCat");/// la ou ca va afficher 
                      divsee.innerHTML=datar;
                    }
                }
                    //les variables a etre envoyer et utiliser
                    var cat=document.getElementById("categoryID").value;
                   // var data=report+'|'+stat+'|'+dat1+'|'+dat2+'|'; //pour concatener plusieures variables
                    XMLHttpRequestObject.send("data=" + cat); // Send variables
                  }
                  return false;
                }
</script>