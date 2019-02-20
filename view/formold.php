<?php
include 'view/base/base.php';
?>
<div class="container-fluid">
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Pseudo</label>
    <input type="text" class="form-control" id="pseudo" aria-describedby="pseudoHelp" placeholder="Enter pseudo">
    <small id="pseudoHelp" class="form-text text-muted">We'll never share your pseudo with anyone else.</small>
    <div class="alert alert-warning d-none" id='msgPseudo' role="alert">
  This is a warning alert—check it out!
</div>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="pwd" placeholder="Password">
    <div class="alert alert-warning d-none" id='msgPwd' role="alert">

  </div>
 


  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>



<script src="ajax.js"></script>
<script>
pseudo=document.getElementById("pseudo");
pwd=document.getElementById("pwd");

pwd.addEventListener("focusout", CheckForm);

pseudo.addEventListener("focusout", function(){
    ajaxGet("http://localhost:8888/routeur/model/fruitExist.php?fruit="+this.value, function (reponse) {
    data=JSON.parse(reponse);
    console.log(data[0]);
    if (data[0]=='true'){
        document.getElementById('msgPseudo').classList.remove('d-none');
    }else{
        document.getElementById('msgPseudo').classList.add('d-none');

    }
    });
});

function CheckForm() {
    var pwd = document.getElementById("pwd").value;
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
    for (var i = 0; i < listRe.length; i++) {
        var item = listRe[i];
        var match = pwd.match(item.re);
        console.log(match);
        if (null === match || match.length < item.count) {
            document.getElementById('msgPwd').classList.remove('d-none');
            document.getElementById('msgPwd').innerHTML=item.msg;
        }else{
            document.getElementById('msgPwd').classList.add('d-none');
        }
    }
}




</script>
