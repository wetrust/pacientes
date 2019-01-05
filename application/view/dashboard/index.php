<div class="container-fluid">
    <div class="row flex-xl-nowrap">
        <div class="col-12 col-md-3 col-xl-2 border-right bg-white">
            <hr>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-dark" data-toggle="tab" href="#nav-home" role="tab"><strong>Pacientes</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" data-toggle="tab" href="#nav-profile" role="tab"><strong>Reservas</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" data-toggle="tab" href="#nav-contact" role="tab"><strong>Reporte</strong></a>
                </li>
            </ul>
        </div>
        <div class="col-12 col-md-9 col-xl-10 py-md-3 pl-md-5">
            <!-- echo out the system feedback (error and success messages) -->
            <?php $this->renderFeedbackMessages(); ?>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <div class="col-6">
                            <h1>Pacientes</h1>
                        </div>
                        <div class="col-6">
                        </div>
                    </div>
                    <hr>
                    <ul class="nav my-2">
                        <li class="nav-item">
                            <button type="button" id="paciente.nuevo" class="btn btn-primary mx-1">Nuevo</button>
                        </li>
                        <li class="nav-item">
                        <button type="button" id="paciente.modificar" class="btn btn-secondary mx-1 d-none">Modificar</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" id="paciente.guardar" class="btn btn-secondary mx-1 d-none">Guardar</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" id="paciente.cancelar" class="btn btn-secondary mx-1 d-none">Cancelar</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" id="paciente.eliminar" class="btn btn-secondary mx-1 d-none">Eliminar</button>
                        </li>                
                    </ul>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Datos iniciales</h5>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">RUT</label>
                                    <input type="text" class="form-control" id="rut" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                        <label for="inputPassword4">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" disabled>
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="inputEmail4">Apellidos</label>
                                        <input type="text" class="form-control" id="apellido" disabled>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                        <label for="inputPassword4">Teléfono</label>
                                        <input type="number" class="form-control" id="telefono" disabled>
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="inputEmail4">Email</label>
                                        <input type="email" class="form-control" id="email" disabled>
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="inputPassword4">Prevision</label>
                                        <select id="prevision" class="form-control" disabled>
                                            <option selected>Elegir...</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                        <label for="inputEmail4">Ciudad</label>
                                        <select id="ciudad" class="form-control" disabled>
                                            <option selected>Elegir...</option>
                                        </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="inputPassword4">Lugar de control</label>
                                        <select id="lugar" class="form-control" disabled>
                                            <option selected>Elegir...</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                        <label for="inputEmail4">Profesional referente</label>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="referentes" id="gridRadios1" value="medico" checked disabled>
                                        <label class="form-check-label" for="gridRadios1">
                                            Médico
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="referentes" id="gridRadios2" value="matrona" disabled>
                                        <label class="form-check-label" for="gridRadios2">
                                            Matrona
                                        </label>
                                        </div>
                                        <div class="form-check disabled">
                                        <input class="form-check-input" type="radio" name="referentes" id="gridRadios3" value="otros" disabled>
                                        <label class="form-check-label" for="gridRadios3">
                                            Otros
                                        </label>
                                        </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="inputPassword4">Nombre del profesional</label>
                                        <select id="profesional" class="form-control" disabled>
                                            <option selected>Elegir...</option>
                                        </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="inputEmail4">Acompañantes</label>
                                        <select id="acompanantes" class="form-control" disabled>
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
                            <div class="card my-2">
                                <div class="card-body">
                                    <h5 class="card-title">Datos clinicos</h5>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                        <label for="inputEmail4">Fecha de nacimiento</label>
                                        <input type="date" class="form-control" id="inputEmail4">
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="inputPassword4">Edad Materna</label>
                                        <input type="text" class="form-control" id="inputPassword4" disabled>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                        <label for="inputEmail4">FUR Referida</label>
                                        <input type="date" class="form-control" id="inputEmail4">
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="inputPassword4">Edad Gestacional</label>
                                        <input type="number" class="form-control" id="inputPassword4" disabled>
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="inputPassword4">Fecha probable de parto</label>
                                        <input type="date" class="form-control" id="inputEmail4">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                        <label for="inputEmail4">Talla materna</label>
                                        <select id="tallamaterna" class="form-control">
                                            <option selected>Elegir...</option>
                                        </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="inputPassword4">Peso materno</label>
                                        <select id="pesomaterno" class="form-control">
                                            <option selected>Elegir...</option>
                                        </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="inputEmail4">IMC</label>
                                        <input type="date" class="form-control" id="inputEmail4" disabled>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                        <label for="inputPassword4">Gestas previas</label>
                                        <select id="inputState" class="form-control">
                                            <option selected>Elegir...</option>
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">RUT</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Apellidos</th>
                                            </tr>
                                        </thead>
                                        <tbody id="pacientes.tabla">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <h1>Horas de atención</h1>
                    <hr>
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
                                <button type="button" class="btn btn-secondary d-none">Modificar</button>
                                <button type="button" class="btn btn-secondary d-none">Guardar</button>
                                <button type="button" class="btn btn-secondary d-none">Cancelar</button>
                                <button type="button" class="btn btn-secondary d-none">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <h1>Reportes</h1>
                    <hr>
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
                                <button type="button" class="btn btn-secondary d-none">Modificar</button>
                                <button type="button" class="btn btn-secondary d-none">Guardar</button>
                                <button type="button" class="btn btn-secondary d-none">Cancelar</button>
                                <button type="button" class="btn btn-secondary d-none">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var args = {
        action: "get"
    }
    
    $(document).ready(function(){
        loadData();
        tablaPacientes();
        let i;

        for (i = 135; i < 186; i++) {
            let option = '<option val="' + i + '">' + i + '</option>';
            $("#tallamaterna").append(option);
        }

        for (i = 35; i < 141; i++) {
            let option = '<option val="' + i + '">' + i + '</option>';
            $("#pesomaterno").append(option);
        }

        $("input[name='referentes']").on("click", function(){
            if ($(this).val() == "medico"){
                $.post("<?php echo Config::get('URL'); ?>medicos/api", args).done(function(data){
                    $('#profesional').empty();
                    if (Object.keys(data).length > 0) {
                        for (let i = 0; i < data.length; i++) {
                            let response = '<option value="' + data[i][Object.keys(data[i])[0]] + '">' + data[i][Object.keys(data[i])[1]];
                            response += '</option>';
                            $('#profesional').append(response);
                        }
                    }
                });
            }
            else if ($(this).val() == "matrona"){
                $.post("<?php echo Config::get('URL'); ?>matronas/api", args).done(function(data){
                    $('#profesional').empty();
                    if (Object.keys(data).length > 0) {
                        for (let i = 0; i < data.length; i++) {
                            let response = '<option value="' + data[i][Object.keys(data[i])[0]] + '">' + data[i][Object.keys(data[i])[1]];
                            response += '</option>';
                            $('#profesional').append(response);
                        }
                    }
                });
            }
            else{
                $("#profesional").empty();
            }
        });

        $("#gridRadios1").trigger("click");

        $("#paciente\\.nuevo").on("click", function(){
            $("#rut").attr("disabled", false).val("");
            $("#nombre").attr("disabled", false).val("");
            $("#apellido").attr("disabled", false).val("");
            $("#telefono").attr("disabled", false).val("");
            $("#email").attr("disabled", false).val("");
            $("#prevision").attr("disabled", false).val("");
            $("#ciudad").attr("disabled", false).val("");
            $("#lugar").attr("disabled", false).val("");
            $("#gridRadios1").attr("disabled", false);
            $("#gridRadios2").attr("disabled", false);
            $("#gridRadios3").attr("disabled", false);
            $("#profesional").attr("disabled", false).val("");
            $("#acompanantes").attr("disabled", false).val("");

            $("#paciente\\.nuevo").addClass("d-none");
            $("#paciente\\.modificar").addClass("d-none");
            $("#paciente\\.guardar").removeClass("d-none");
            $("#paciente\\.cancelar").removeClass("d-none");
        });

        $("#paciente\\.modificar").on("click", function(){
            $("#rut").attr("disabled", false);
            $("#nombre").attr("disabled", false);
            $("#apellido").attr("disabled", false);
            $("#telefono").attr("disabled", false);
            $("#email").attr("disabled", false);
            $("#prevision").attr("disabled", false);
            $("#ciudad").attr("disabled", false);
            $("#lugar").attr("disabled", false);
            $("#gridRadios1").attr("disabled", false);
            $("#gridRadios2").attr("disabled", false);
            $("#gridRadios3").attr("disabled", false);
            $("#profesional").attr("disabled", false);
            $("#acompanantes").attr("disabled", false);

            $("#paciente\\.nuevo").addClass("d-none");
            $("#paciente\\.modificar").addClass("d-none");
            $("#paciente\\.guardar").removeClass("d-none");
            $("#paciente\\.cancelar").removeClass("d-none");
        });

        $("#paciente\\.guardar").on("click", function(){
            $("#rut").attr("disabled", true);
            $("#nombre").attr("disabled", true);
            $("#apellido").attr("disabled", true);
            $("#telefono").attr("disabled", true);
            $("#email").attr("disabled", true);
            $("#prevision").attr("disabled", true);
            $("#ciudad").attr("disabled", true);
            $("#lugar").attr("disabled", true);
            $("#gridRadios1").attr("disabled", true);
            $("#gridRadios2").attr("disabled", true);
            $("#gridRadios3").attr("disabled", true);
            $("#profesional").attr("disabled", true);
            $("#acompanantes").attr("disabled", true);

            $("#paciente\\.nuevo").removeClass("d-none");
            $("#paciente\\.modificar").removeClass("d-none");
            $("#paciente\\.guardar").addClass("d-none");
            $("#paciente\\.cancelar").addClass("d-none");

            let args = {
                action: "new",
                paciente_rut: $("#rut").val(),
                paciente_nombre: $("#nombre").val(),
                paciente_apellido: $("#apellido").val(),
                paciente_telefono: $("#telefono").val(),
                paciente_email: $("#email").val(),
                paciente_prevision: $("#prevision").val(),
                paciente_ciudad: $("#ciudad").val(),
                paciente_lugar: $("#lugar").val(),
                paciente_profesional: $("#profesional").val(),
                paciente_acompanantes: $("#acompanantes").val(),
            }
            
            $.post("<?php echo Config::get('URL'); ?>pacientes/api", args).done(function(data){
                tablaPacientes();
            });

        });

        $("#paciente\\.cancelar").on("click", function(){
            $("#rut").attr("disabled", true);
            $("#nombre").attr("disabled", true);
            $("#apellido").attr("disabled", true);
            $("#telefono").attr("disabled", true);
            $("#email").attr("disabled", true);
            $("#prevision").attr("disabled", true);
            $("#ciudad").attr("disabled", true);
            $("#lugar").attr("disabled", true);
            $("#gridRadios1").attr("disabled", true);
            $("#gridRadios2").attr("disabled", true);
            $("#gridRadios3").attr("disabled", true);
            $("#profesional").attr("disabled", true);
            $("#acompanantes").attr("disabled", true);

            $("#paciente\\.nuevo").removeClass("d-none");
            $("#paciente\\.modificar").removeClass("d-none");
            $("#paciente\\.guardar").addClass("d-none");
            $("#paciente\\.cancelar").addClass("d-none");
        });
        
    });

    function loadData(){

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

    function tablaPacientes(){

        var send = {
            action: "get"
        }

        $.post("<?php echo Config::get('URL'); ?>pacientes/api", send).done(function(data){
            $('#pacientes\\.tabla').empty();
            if (Object.keys(data).length > 0) {
                $.each(data, function(index, element){
                    let response = '<tr data-id="' + element.paciente_id +'"><td>'+element.paciente_id+'</td><td>'+element.paciente_rut+'</td><td>'+element.paciente_nombre+'</td><td>'+element.paciente_apellido+'</td></tr>';
                    $('#pacientes\\.tabla').append(response);
                });

                $('#pacientes\\.tabla > tr').on("click", function(){
                    var paciente_id = $(this).data("id");
                    let send = {
                        action: "read",
                        paciente_rut: paciente_id
                    }

                    //vaciar los inputs
                    $("#rut").val("");
                    $("#nombre").val("");
                    $("#apellido").val("");
                    $("#telefono").val("");
                    $("#email").val("");
                    $("#prevision").val("");
                    $("#ciudad").val("");
                    $("#lugar").val("");
                    $("#gridRadios1");
                    $("#gridRadios2");
                    $("#gridRadios3");
                    $("#profesional").val("");
                    $("#acompanantes").val("");

                    $("#paciente\\.modificar").addClass("d-none");
                    $("#paciente\\.eliminar").addClass("d-none");

                    $.post("<?php echo Config::get('URL'); ?>pacientes/api", send).done(function(data){
                        if (Object.keys(data).length > 0) {
                            $("#rut").val(data.paciente_rut);
                            $("#nombre").val(data.paciente_nombre);
                            $("#apellido").val(data.paciente_apellido);
                            $("#telefono").val(data.paciente_telefono);
                            $("#email").val(data.paciente_email);
                            $("#prevision").val(data.paciente_prevision);
                            $("#ciudad").val(data.paciente_ciudad);
                            $("#lugar").val(data.paciente_lugar);
                            $("#profesional").val(data.paciente_profesional);
                            $("#acompanantes").val(data.paciente_acompanantes);
                            $("#paciente\\.modificar").removeClass("d-none");
                            $("#paciente\\.eliminar").removeClass("d-none");
                        }
                    });
                })
            }
        });
    }
</script>