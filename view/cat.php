<?php
include 'view/base/base.php';
?>
<div class="container-fluid">
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Cat</label>
    <input type="text" class="form-control" id="cat" aria-describedby="catHelp" placeholder="Enter categorie">
    <small id="pseudoHelp" class="form-text text-muted">We'll never share your pseudo with anyone else.</small>
    <div class="alert alert-warning d-none" id='msgPseudo' role="alert">
  This is a warning alert—check it out!
</div>
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="description" aria-describedby="descriptionHelp" placeholder="Enter description">
    <small id="descriptionHelp" class="form-text text-muted">We'll never share your pseudo with anyone else.</small>
    <div class="alert alert-warning d-none" id='msgDescription' role="alert">
  This is a warning alert—check it out!
</div>
  </div>
  
  <button class="btn btn-primary" id='submit'>Submit</button>
</form>

</div>
<div class="row" id="cats">

</div>
<script src="ajax.js"></script>
<script>




maj=document.getElementById("submit");
cat=document.getElementById("cat");
maj.addEventListener("click", function(){
    ajaxGet("http://localhost:8888/routeur/model/categoriesManager.php?action=maj", function (reponse) {
    data=JSON.parse(reponse);
        data.forEach(cat => {
            document.getElementById('cats').innerHTML+='<div class="card" style="width: 18rem;"><div class="card-body" id="'+cat.id+'">';
            document.getElementById(cat.id).innerHTML='<h5 class="card-title">'+cat.nom+'</h5>';
            document.getElementById(cat.id).innerHTML+='<p class="card-text">'+cat.description+'</p>';
            document.getElementById(cat.id).innerHTML+='<a href="#" class="btn btn-primary">Go somewhere</a></div></div>';
        });
    });
});
cat.addEventListener("click", function(){
    ajaxGet("http://localhost:8888/routeur/model/categoriesManager.php?action=add", function (reponse) {
    data=JSON.parse(reponse);
        data.forEach(cat => {
            console.log(cat);
        });
    });
});




</script>
