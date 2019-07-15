<?php
include "header.php";
?>

<body>
    <div class="container-fluid login">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h3>Área Administrativa:</h3>
            </div>
            <div class="col-sm-6"></div>
        </div>
        <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
      <form action="fazloginadm.php"  method="POST" name="formulario">
        <div class="form-group">
          <label>E-Mail:</label>
          <input type="text" name="email" class="form-control " id="email" placeholder="E-MAIL" required="" >    
        </div>
        <div class="form-group">
          <label>Senha:</label>  
          <input type="password" name="senha" class="form-control" id="senha" placeholder="SENHA" required="" >
        </div> 
        <div class="form-group">
          <input type="submit"  value="Login" class="btn btn-info">
        </div>
      </form>
    </div>
    <div class="col-sm-3"></div>
  </div>
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
     <form>
      <div class="form-group form-check d-flex justify-content-center">
        <label class="form-check-label"><input type="radio" class="form-check-input" value="">Lembre-me</label>	 
      </div>
	 </form>
    </div>
    <div class="col-sm-4"></div>
  </div>
</body>

<?php
include "footer.php";
?>