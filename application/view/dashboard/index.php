<div class="container">
    <h1>Pacientes</h1>
    <hr>
    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link shadow-sm border mr-2 active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Pacientes datos iniciales</a>
            <a class="nav-item nav-link shadow-sm border mr-2" id="nav-clinico-tab" data-toggle="tab" href="#nav-clinico" role="tab" aria-controls="nav-clinico" aria-selected="true">Datos Clínicos</a>
            <a class="nav-item nav-link shadow-sm border mr-2" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Reservas de atención</a>
            <a class="nav-item nav-link shadow-sm border" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Resumen</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row pt-2">
                <div class="col-10">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pacientes</h5>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="inputEmail4">RUT</label>
                                <input type="text" class="form-control" id="inputEmail4">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputPassword4">Nombre</label>
                                <input type="text" class="form-control" id="inputPassword4">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputEmail4">Apellidos</label>
                                <input type="text" class="form-control" id="inputEmail4">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="inputPassword4">Teléfono</label>
                                <input type="number" class="form-control" id="inputPassword4">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" id="inputEmail4">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputPassword4">Prevision</label>
                                <select id="prevision" class="form-control">
                                    <option selected>Elegir...</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="inputEmail4">Ciudad</label>
                                <select id="ciudad" class="form-control">
                                    <option selected>Elegir...</option>
                                </select>
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputPassword4">Lugar de control</label>
                                <select id="lugar" class="form-control">
                                    <option selected>Elegir...</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="inputEmail4">Profesional referente</label>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                <label class="form-check-label" for="gridRadios1">
                                    Médico
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                <label class="form-check-label" for="gridRadios2">
                                    Matrona
                                </label>
                                </div>
                                <div class="form-check disabled">
                                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
                                <label class="form-check-label" for="gridRadios3">
                                    Otros
                                </label>
                                </div>
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputPassword4">Nombre del profesional</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Elegir...</option>
                                    <option>...</option>
                                </select>
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputEmail4">Acompañantes</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Elegir...</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="btn-group-vertical" role="group">
                        <button type="button" class="btn btn-primary">Nuevo</button>
                        <button type="button" class="btn btn-secondary">Modificar</button>
                        <button type="button" class="btn btn-secondary">Guardar</button>
                        <button type="button" class="btn btn-secondary">Cancelar</button>
                        <button type="button" class="btn btn-secondary">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-clinico" role="tabpanel" aria-labelledby="nav-clinico-tab">
            <div class="row pt-2">
                <div class="col-10">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Datos Clinicos</h5>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="inputEmail4">Fecha de nacimiento</label>
                                <input type="text" class="form-control" id="inputEmail4">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputPassword4">Edad Materna</label>
                                <input type="text" class="form-control" id="inputPassword4">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="inputEmail4">FUR Referida</label>
                                <input type="text" class="form-control" id="inputEmail4">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputPassword4">Edad Gestacional</label>
                                <input type="number" class="form-control" id="inputPassword4">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputPassword4">Fecha probable de parto</label>
                                <select id="lugar" class="form-control">
                                    <option selected>Elegir...</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="inputEmail4">Talla materna</label>
                                <input type="email" class="form-control" id="inputEmail4">
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputPassword4">Peso materno</label>
                                <select id="prevision" class="form-control">
                                    <option selected>Elegir...</option>
                                </select>
                                </div>
                                <div class="form-group col-md-4">
                                <label for="inputEmail4">Estado nutricional</label>
                                <select id="ciudad" class="form-control">
                                    <option selected>Elegir...</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="inputPassword4">Gestas previas</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Elegir...</option>
                                    <option>...</option>
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="btn-group-vertical" role="group">
                        <button type="button" class="btn btn-primary">Nuevo</button>
                        <button type="button" class="btn btn-secondary">Modificar</button>
                        <button type="button" class="btn btn-secondary">Guardar</button>
                        <button type="button" class="btn btn-secondary">Cancelar</button>
                        <button type="button" class="btn btn-secondary">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row pt-2">
                <div class="col-10">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Horas de atención</h5>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="btn-group-vertical" role="group">
                        <button type="button" class="btn btn-primary">Nuevo</button>
                        <button type="button" class="btn btn-secondary">Modificar</button>
                        <button type="button" class="btn btn-secondary">Guardar</button>
                        <button type="button" class="btn btn-secondary">Cancelar</button>
                        <button type="button" class="btn btn-secondary">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="row pt-2">
                <div class="col-10">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Resumen</h5>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="btn-group-vertical" role="group">
                        <button type="button" class="btn btn-primary">Nuevo</button>
                        <button type="button" class="btn btn-secondary">Modificar</button>
                        <button type="button" class="btn btn-secondary">Guardar</button>
                        <button type="button" class="btn btn-secondary">Cancelar</button>
                        <button type="button" class="btn btn-secondary">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        loadData();
    });

    function loadData(){

        let args = {
            action: "get"
        }

        $.post("<?php echo Config::get('URL'); ?>ciudad/api", args).done(function(data){
            $('#ciudad').empty();
            if (Object.keys(data).length > 0) {
                for (let i = 0; i < data.length; i++) {
                    let response = '<option value="' + data[i][Object.keys(data[i])[0]] + '">' + data[i][Object.keys(data[i])[1]];
                    response += '</option>';
                    $('#ciudad').append(response);
                }
            }
        });

        $.post("<?php echo Config::get('URL'); ?>prevision/api", args).done(function(data){
            $('#prevision').empty();
            if (Object.keys(data).length > 0) {
                for (let i = 0; i < data.length; i++) {
                    let response = '<option value="' + data[i][Object.keys(data[i])[0]] + '">' + data[i][Object.keys(data[i])[1]];
                    response += '</option>';
                    $('#prevision').append(response);
                }
            }
        });

        $.post("<?php echo Config::get('URL'); ?>lugar/api", args).done(function(data){
            $('#lugar').empty();
            if (Object.keys(data).length > 0) {
                for (let i = 0; i < data.length; i++) {
                    let response = '<option value="' + data[i][Object.keys(data[i])[0]] + '">' + data[i][Object.keys(data[i])[1]];
                    response += '</option>';
                    $('#lugar').append(response);
                }
            }
        });
    }
</script>