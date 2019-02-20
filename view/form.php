<?php
include 'view/base/base.php';
?>



<div class="container-fluid">
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Pseudo</label>
    <input type="text" class="form-control" id="pseudo" aria-describedby="pseudoHelp" placeholder="Enter pseudo">
    <div class="alert alert-danger d-none" role="alert" id="msgPseudo">
    
    </div>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="pwd" placeholder="Password">
    <div class="alert alert-danger d-none" role="alert" id="msgPwd">
    
    </div>
  </div>
 
  <button type="submit" class="btn btn-primary" disabled>Submit</button>


  </div>
</form>

<script>
    

    document.getElementById('pwd').addEventListener("focusout", verifPwd);

    function verifPwd(){
        var listRe = [{
        re: /[a-zA-Z]/g,
        count: 8,
        msg: "Votre mot de passe doit avoir au moins 8 lettres"
        }, {
        re: /\d/g,
        count: 1,
        msg: "Votre mot de passe doit avoir au moins 1 chiffres"
        }, {
        re: /[^A-Za-z0-9]/g,
        count: 1,
        msg: "Votre mot de passe doit posséder au moins 1 caractère spécial"
        }];
        document.getElementById('msgPwd').innerHTML="";
        for (var i = 0; i < listRe.length; i++) {
            var item = listRe[i];
            var valid=false;
            var match = document.getElementById('pwd').value.match(item.re);
            if (null === match || match.length < item.count) {
                document.getElementById('msgPwd').classList.remove('d-none');
                document.getElementById('msgPwd').innerHTML+=item.msg+'<br>';
            }else{
                valid=true;
            }
        }
        if (valid==true){
            document.getElementById('msgPwd').classList.add('d-none');
        }

    }





</script>