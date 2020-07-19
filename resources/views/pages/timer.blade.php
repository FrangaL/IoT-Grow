<form id="form">
  @csrf
  <div class="row justify-content-center ">
    <div class="input-group clock col-md-4">
      <input id="encendido" type="text" name="encendido" placeholder="Hora encendido" />
    </div>
    <div class="input-group clock col-md-4">
      <input id="apagado" type="text" name="apagado" placeholder="Hora apagado" />
    </div>
  </div>
  <hr align="center" noshade="noshade" size="1" width="99%" />
  <label>Seleccionar sector</label>
  <section class="section-preview">
    <div class="custom-control custom-radio custom-control-inline">
      <input type="checkbox" class="custom-control-input" id="defaultInline0" name="zone0" checked="true" required>
      <label class="custom-control-label" for="defaultInline0">Todos</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
      <input type="checkbox" class="checkChild custom-control-input" id="defaultInline1" name="zone1">
      <label class="custom-control-label" for="defaultInline1">1</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
      <input type="checkbox" class="checkChild custom-control-input" id="defaultInline2" name="zone2">
      <label class="custom-control-label" for="defaultInline2">2</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
      <input type="checkbox" class="checkChild custom-control-input" id="defaultInline3" name="zone3">
      <label class="custom-control-label" for="defaultInline3">3</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
      <input type="checkbox" class="checkChild custom-control-input" id="defaultInline4" name="zone4">
      <label class="custom-control-label" for="defaultInline4">4</label>
    </div>
  </section>
  <div class="form-group">
    <label for="retardo">Retardo de encendido</label>
    <div class="quantity">
      <input type="number" name="retardo" min="0" max="15" step="1" placeholder="Escriba el numero de minutos">
    </div>
  </div>
  <br />
  <div class="justify-content-right mt-3">
    <div class="form-group">
      <div class="btn-group">
        <button type="button" id="showprog" class="btn btn-outline-secondary showprog mr-1">Ver programación</button>
        <button class="btn btn-outline-success btn-submit mr-1" id="programareloj" disabled>Guardar programación</button>
        <button type="button" class="btn btn-outline-primary" id="changemode" value="0">Modo manual</button>
      </div>
    </div>
  </div>
</form>
