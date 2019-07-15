<?php
include "header.php";
?>

<div class="container-fluid login">
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
      <h3>Login:</h3>
    </div>
    <div class="col-sm-6"></div>
  </div>
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
      <form action="fazlogin.php"  method="POST" name="formulario">
        <div class="form-group">
          <label>E-MAIL:</label>
          <input type="text" name="email" class="form-control " id="email" placeholder="E-MAIL" required="" >    
        </div>
        <div class="form-group">
          <label>SENHA:</label>  
          <input type="password" name="senha" class="form-control" id="senha" placeholder="SENHA" required="" >
        </div> 
        <div class="form-group">
          <input type="submit"  value="Login" class="btn btn-info">
        </div>
        <div class="form-group">
          <input type="reset" value="Esqueceu sua senha?" class="btn btn-info"> 
        </div>
    </div>
    <div class="col-sm-3"></div>
  </div>
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="form-group d-flex justify-content-center">
            <label for="usuario">Quem é você:</label>
            <select name="usuario">
                <option value="cliente">Cliente</option> 
                <option value="medico">Médico</option>
                <option value="clinicapj">Clínica (PJ)</option>
            </select>
        </div>
      <div class="form-group form-check d-flex justify-content-center">
        <label class="form-check-label"><input type="radio" class="form-check-input" value="">Lembre-me</label>	 
      </div>
      <div class="form-group d-flex justify-content-center">
            <label>Cadastrar:</label>
            <input type="submit" value="Cliente" class="btn btn-info cadastrar" onclick="window.location='cadastracliente.php';"/>
            <input type="submit" value="Médico" class="btn btn-info cadastrar" onclick="window.location='cadastramedico.php';"/>
            <input type="submit" value="Clínica (PJ)" class="btn btn-info cadastrar" onclick="window.location='cadastrapj.php';"/>
      </div>
    </div>
    </form>
    <div class="col-sm-4"></div>
  </div>
</div>

<?php
include "footer.php";
?>