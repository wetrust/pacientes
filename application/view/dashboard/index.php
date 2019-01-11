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
                            <div class="card">
                                <div class="card-body p-2">
                                    <div class="form-group row mb-0">
                                        <label for="paciente.busqueda" class="col-sm-7 col-form-label">Buscar paciente (RUT o Apellido)</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="paciente.busqueda" list="paciente.busqueda.list">
                                            <datalist id="paciente.busqueda.list"></datalist>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                        <label for="inputEmail4">FUR Referida</label>
                                        <input type="date" class="form-control" id="fur" disabled>
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="inputPassword4">Edad Gestacional</label>
                                        <input type="text" class="form-control" id="eg" disabled>
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="inputPassword4">Fecha probable de parto</label>
                                        <input type="date" class="form-control" id="fpp" disabled>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4 d-none">
                                        <label for="inputEmail4">Fecha de nacimiento</label>
                                        <input type="date" class="form-control" id="nacimiento" disabled>
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="inputPassword4">Edad Materna</label>
                                        <select id="edad" class="form-control" disabled></select>
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="gestas">Gestas previas</label>
                                        <select id="gestas" class="form-control" disabled>
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
                                        <div class="form-group col-md-4">
                                        <label for="partos">Partos</label>
                                        <select id="partos" class="form-control" disabled>
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                        <label for="tallamaterna">Talla materna</label>
                                        <select id="tallamaterna" class="form-control" disabled>
                                            <option selected>Elegir...</option>
                                        </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="pesomaterno">Peso materno</label>
                                        <select id="pesomaterno" class="form-control" disabled>
                                            <option selected>Elegir...</option>
                                        </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                        <label for="imc">IMC</label>
                                        <input type="text" class="form-control" id="imc" disabled>
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
                                            <th scope="col">FUR</th>
                                            <th scope="col">EG</th>
                                            <th scope="col">FPP</th> 
                                            </tr>
                                        </thead>
                                        <tbody id="pacientes.tabla">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row">
                        <div class="col-8">
                            <h1>Horas de atención</h1>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body p-2">
                                    <div class="form-group row mb-0">
                                        <label for="inputPassword" class="col-sm-5 col-form-label">Fecha</label>
                                        <div class="col-sm-7">
                                            <input type="date" class="form-control" id="horas.busqueda.fecha">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <ul class="nav my-2">
                        <li class="nav-item">
                            <button type="button" id="horas.nuevo" class="btn btn-primary mx-1">Reservar hora</button>
                        </li>
                        <li class="nav-item">
                        <button type="button" id="horas.modificar" class="btn btn-secondary mx-1 d-none">Modificar</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" id="horas.guardar" class="btn btn-secondary mx-1 d-none">Guardar</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" id="horas.cancelar" class="btn btn-secondary mx-1 d-none">Cancelar</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" id="horas.eliminar" class="btn btn-secondary mx-1 d-none">Eliminar</button>
                        </li>                
                    </ul>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-none" id="horas.formulario">
                                <h5 class="card-title">Reserva de horas</h5>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                    <label for="inputEmail4">RUT</label>
                                    <input type="text" class="form-control" id="horas.rut">
                                    </div>
                                    <div class="form-group col-md-4">
                                    <label for="inputPassword4">Nombre</label>
                                    <input type="text" class="form-control" id="horas.nombre" disabled>
                                    </div>
                                    <div class="form-group col-md-4">
                                    <label for="inputPassword4">Apellido</label>
                                    <input type="text" class="form-control" id="horas.apellido" disabled>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                    <label for="inputEmail4">Atencion de tipo</label>
                                    <select id="horas.atencion" class="form-control">
                                        <option value="Obstétrica">Obstétrica</option>
                                        <option value="Obstétrica Abto.">Obstétrica Abto.</option>
                                        <option value="Obstétrica Doppler">Obstétrica Doppler</option>
                                        <option value="Obstétrica 3D 4D">Obstétrica 3D 4D</option>
                                        <option value="Ginecológica TV">Ginecológica TV</option>
                                        <option value="Ginecológica Abd">Ginecológica Abd</option>
                                    </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                    <label for="inputPassword4">Tipo de ecografía</label>
                                    <select id="horas.tipo" class="form-control">
                                        <option value="Confirmación de Embarazo">Confirmación de Embarazo</option>
                                        <option value="Eco. Evaluación de 1er Trimestre">Eco. Evaluación de 1er Trimestre</option>
                                        <option value="Eco. Evaluación de 2° - 3° Trimestre">Eco. Evaluación de 2° - 3° Trimestre</option>
                                        <option value="Doppler Materno/Fetal">Doppler Materno/Fetal</option>
                                        <option value="Ecografía 3D 4D">Ecografía 3D 4D</option>
                                        <option value="Completar Visión 3D de Eco Previa">Completar Visión 3D de Eco Previa</option>
                                        <option value="Evaluación de. Examenes">Evaluación de. Examenes</option>
                                        <option value="Eco Ginecologica">Eco Ginecologica</option>
                                    </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                    <label for="horas.hora">Hora de atención</label>
                                    <select id="horas.hora" class="form-control">
                                        <option value="08:00:00">08:00</option>
                                        <option value="08:15:00">08:15</option>
                                        <option value="08:30:00">08:30</option>
                                        <option value="08:45:00">08:45</option>
                                        <option value="08:00:00">09:00</option>
                                        <option value="08:15:00">09:15</option>
                                        <option value="08:30:00">09:30</option>
                                        <option value="08:45:00">09:45</option>
                                        <option value="08:00:00">10:00</option>
                                        <option value="08:15:00">10:15</option>
                                        <option value="08:30:00">10:30</option>
                                        <option value="08:45:00">10:45</option>
                                        <option value="08:00:00">11:00</option>
                                        <option value="08:15:00">11:15</option>
                                        <option value="08:30:00">11:30</option>
                                        <option value="08:45:00">11:45</option>
                                        <option value="08:00:00">12:00</option>
                                        <option value="08:15:00">12:15</option>
                                        <option value="08:30:00">12:30</option>
                                        <option value="08:45:00">12:45</option>
                                        <option value="08:00:00">13:00</option>
                                        <option value="08:15:00">13:15</option>
                                        <option value="08:30:00">13:30</option>
                                        <option value="08:45:00">13:45</option>
                                        <option value="08:00:00">14:00</option>
                                        <option value="08:15:00">14:15</option>
                                        <option value="08:30:00">14:30</option>
                                        <option value="08:45:00">14:45</option>
                                        <option value="08:00:00">15:00</option>
                                        <option value="08:15:00">15:15</option>
                                        <option value="08:30:00">15:30</option>
                                        <option value="08:45:00">15:45</option>
                                        <option value="08:00:00">16:00</option>
                                        <option value="08:15:00">16:15</option>
                                        <option value="08:30:00">16:30</option>
                                        <option value="08:45:00">16:45</option>
                                        <option value="08:00:00">17:00</option>
                                        <option value="08:15:00">17:15</option>
                                        <option value="08:30:00">17:30</option>
                                        <option value="08:45:00">17:45</option>
                                        <option value="08:00:00">18:00</option>
                                        <option value="08:15:00">18:15</option>
                                        <option value="08:30:00">18:30</option>
                                        <option value="08:45:00">18:45</option>
                                        <option value="08:00:00">19:00</option>
                                        <option value="08:15:00">19:15</option>
                                        <option value="08:30:00">19:30</option>
                                        <option value="08:45:00">19:45</option>
                                        <option value="08:00:00">20:00</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                    <label for="horas.cancelacion">Cancelacion</label>
                                    <select id="horas.cancelacion" class="form-control">
                                        <option value="Bono Isapre">Bono Isapre</option>
                                        <option value="Bono Fonasa">Bono Fonasa</option>
                                        <option value="Bono Electrónico">Bono Electrónico</option>
                                        <option value="Efectivo">Efectivo</option>
                                        <option value="Exenta">Exenta</option>
                                        <option value="Garantía">Garantía</option>
                                        <option value="Pendiente">Pendiente</option>
                                        <option value="Repetición sin costo">Repetición sin costo</option>
                                    </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                    <label for="inputPassword4">Valor cancelado</label>
                                    <input type="number" class="form-control" id="horas.cancelado">
                                    </div>
                                    <div class="form-group col-md-4">
                                    <label for="inputPassword4">Ad. Doppler</label>
                                    <input type="number" class="form-control" id="horas.adicional">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                    <label for="inputEmail4">Situación final</label>
                                    <select id="horas.situacion" class="form-control">
                                        <option value="Atendida">Atendida</option>
                                        <option value="Confirmada">Confirmada</option>
                                        <option value="En reserva">En reserva</option>
                                        <option value="No asistió">No asistió</option>
                                    </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                    <label for="inputPassword4">Ecografista Dr.(a)</label>
                                    <select class="form-control" id="horas.ecografista"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Hora</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">Prevision</th>
                                        <th scope="col">Motivo Atencion</th>
                                        <th scope="col">Ciudad</th>
                                        <th scope="col">Situación</th>
                                        <th scope="col">Ecografista</th>
                                        <th scope="col">Valor cancelado</th>
                                    </tr>
                                </thead>
                                <tbody id="horas.tabla">
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="row">
                        <div class="col-6">
                            <h1>Reportes</h1>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body p-2">
                                    <div class="form-group row mb-0">
                                        <label for="paciente.busqueda" class="col-sm-7 col-form-label">Periodo desde</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="paciente.busqueda" list="paciente.busqueda.list">
                                            <datalist id="paciente.busqueda.list"></datalist>
                                        </div>
                                        <label for="paciente.busqueda" class="col-sm-7 col-form-label">hasta</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="paciente.busqueda" list="paciente.busqueda.list">
                                            <datalist id="paciente.busqueda.list"></datalist>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <ul class="nav my-2">
                        <li class="nav-item">
                            <button type="button" id="horas.nuevo" class="btn btn-primary mx-1">Imprimir</button>
                        </li>               
                    </ul>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Hora</th>
                                            <th scope="col">Ecografista</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Apellido</th>
                                            <th scope="col">RUT</th>
                                            <th scope="col">Ciudad</th>
                                            <th scope="col">Motivo atención</th>
                                            <th scope="col">Previsión</th>
                                            <th scope="col">Modalidad</th>
                                            <th scope="col">Situación final</th>
                                            <th scope="col">Cancelado</th>
                                            <th scope="col">Prof. Ref.</th>
                                        </tr>
                                    </thead>
                                    <tbody id="reporte.tabla">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="filtro.ecografista">Ecografista</label>
                                                <select id="filtro.ecografista" class="form-control"></select>
                                            </div>
                                            <div class="form-group">
                                                <label for="filtro.cancelacion">Cancelación</label>
                                                <select id="filtro.cancelacion" class="form-control"></select>
                                            </div>
                                            <div class="form-group">
                                                <label for="filtro.prevision">Prevision</label>
                                                <select id="filtro.prevision" class="form-control"></select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="filtro.ecografista">Ganancias en el periodo</label>
                                                <input type="number" class="form-control" id="filtro.ecografista" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="filtro.cancelacion">Tipo de profesional referente</label>
                                                <select id="filtro.cancelacion" class="form-control">
                                                    <option value="medico">Médico</option>
                                                    <option value="matrona">Matrona</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="filtro.prevision">Nombre profesional referente</label>
                                                <select id="filtro.prevision" class="form-control"></select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Modalidad de pago</th>
                                                <th scope="col">N° de acciones</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Ad. Doppler</th>
                                            </tr>
                                        </thead>
                                        <tbody id="reporte.tabla.resumen">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dialog.title"></h5>
      </div>
      <div class="modal-body" id="dialog.body">
      </div>
      <div class="modal-footer" id="dialog.footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

        for (i = 10; i < 70; i++) {
            let option = '<option val="' + i + '">' + i + '</option>';
            $("#edad").append(option);
        }

        for (i = 135; i < 186; i++) {
            let option = '<option val="' + i + '">' + i + '</option>';
            $("#tallamaterna").append(option);
        }

        for (i = 35; i < 141; i++) {
            let option = '<option val="' + i + '">' + i + '</option>';
            $("#pesomaterno").append(option);
        }

        let fecha = new Date();
        fecha =  fecha.getFullYear() + '-' + ("0" + (fecha.getMonth() +1)).slice("-2") + '-' +  ("0" + fecha.getDate()).slice("-2");
        $("#horas\\.busqueda\\.fecha").val(fecha);
        tablaHoras();

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

        $("#paciente\\.busqueda").on("keyup", function(e){
            let contenido = $("#paciente\\.busqueda").val();
            if (contenido.length > 0){
                let tipo = contenido.substr(0,1);

                if (tipo == "0" || tipo == "1"|| tipo == "2" || tipo == "3" || tipo == "4" || tipo == "5" || tipo == "6" || tipo == "7" || tipo == "8" || tipo == "9"){
                    let enviar = {
                        action: "rut",
                        paciente_rut: $("#paciente\\.busqueda").val()
                    }

                    $.post("<?php echo Config::get('URL'); ?>pacientes/api", enviar).done(function(respuesta){
                        $("#paciente\\.busqueda\\.list").empty();
                        if (respuesta.response == true){
                            $.each(respuesta.data, function(index, element){
                                let response = '<option value="' + element.paciente_rut + '"></option>';
                                $('#paciente\\.busqueda\\.list').append(response);
                            });
                        }
                    });
                }
                else if (typeof tipo == "string"){
                    let enviar = {
                        action: "apellido",
                        paciente_apellido: $("#paciente\\.busqueda").val()
                    }

                    $.post("<?php echo Config::get('URL'); ?>pacientes/api", enviar).done(function(respuesta){
                        $("#paciente\\.busqueda\\.list").empty();
                        if (respuesta.response == true){
                            $.each(respuesta.data, function(index, element){
                                let response = '<option value="' + element.paciente_apellido + '"></option>';
                                $('#paciente\\.busqueda\\.list').append(response);
                            });
                        }
                    });
                }
            }
        });

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

            $("#nacimiento").attr("disabled", false).val("");
            $("#edad").attr("disabled", false).val("");
            $("#fur").attr("disabled", false).val("");
            $("#tallamaterna").attr("disabled", false).val("");
            $("#pesomaterno").attr("disabled", false).val("");
            $("#gestas").attr("disabled", false).val("");
            $("#partos").attr("disabled", false).val("");

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

            $("#nacimiento").attr("disabled", false);
            $("#edad").attr("disabled", false);
            $("#fur").attr("disabled", false);
            $("#tallamaterna").attr("disabled", false);
            $("#pesomaterno").attr("disabled", false);
            $("#gestas").attr("disabled", false);
            $("#partos").attr("disabled", false);

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

            $("#nacimiento").attr("disabled", true);
            $("#edad").attr("disabled", true);
            $("#fur").attr("disabled", true);
            $("#tallamaterna").attr("disabled", true);
            $("#pesomaterno").attr("disabled", true);
            $("#gestas").attr("disabled", true);
            $("#partos").attr("disabled", true);

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
                paciente_fur: $("#fur").val(),
                paciente_eg: $("#eg").val(),
                paciente_fpp: $("#fpp").val(),
                paciente_edadmaterna: $("#edad").val(),
                paciente_gestasprevias: $("#gestas").val(),
                paciente_partos: $("#partos").val(),
                paciente_talla: $("#tallamaterna").val(),
                paciente_peso: $("#pesomaterno").val(),
                paciente_imc: $("#imc").val()
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

            $("#nacimiento").attr("disabled", true);
            $("#edad").attr("disabled", true);
            $("#fur").attr("disabled", true);
            $("#tallamaterna").attr("disabled", true);
            $("#pesomaterno").attr("disabled", true);
            $("#gestas").attr("disabled", true);

            $("#paciente\\.nuevo").removeClass("d-none");
            $("#paciente\\.modificar").removeClass("d-none");
            $("#paciente\\.guardar").addClass("d-none");
            $("#paciente\\.cancelar").addClass("d-none");
        });

        $("#paciente\\.eliminar").on("click", function(){
            $("#dialog\\.title").html("Eliminar");
            $("#dialog\\.body").html("<p>¿Está seguro de eliminar a " + $("#nombre").val() + " " + $("#apellido").val()+ "?</p>");
            $("#dialog\\.footer").html('<button type="button" class="btn btn-warning" id="dialog.eliminar">ELIMINAR</button>');
            $("#dialog\\.eliminar").on("click", function(){
                paciente_id = $("#rut").val();

                let send = {
                    action: "delete",
                    paciente_rut: paciente_id
                }

                $.post("<?php echo Config::get('URL'); ?>pacientes/api", send).done(function(data){
                    if (Object.keys(data).length > 0) {
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

                        $("#nacimiento").val("");
                        $("#edad").val("");
                        $("#fur").val("");
                        $("#tallamaterna").val("");
                        $("#pesomaterno").val("");
                        $("#gestas").val("");
                        $("#partos").val("");

                        $("#paciente\\.modificar").addClass("d-none");
                        $("#paciente\\.eliminar").addClass("d-none");
                    }
                });

            });
            $("#dialog").modal("show");
        });

        $("#nacimiento").on("change", function(){
            var FExamen, FUM, EdadGestacional;
            var undia = 1000 * 60 * 60 * 24;
            var unasemana = undia * 7;
            var unano = undia * 365;

            FUM = new Date($(this).val());
            FExamen = new Date();

            EdadGestacional = ((FExamen.getTime() - FUM.getTime()) / unano).toFixed(0);
            $("#edad").val(EdadGestacional + " años");
        });

        $("#fur").on("change", function(){
            var FExamen, FUM, EdadGestacional;
            var undia = 1000 * 60 * 60 * 24;
            var unasemana = undia * 7;

            FUM = new Date($(this).val());
            FExamen = new Date();

            EdadGestacional = ((FExamen.getTime() - FUM.getTime()) / unasemana).toFixed(1);
            FPP = ((FUM.getTime() + (unasemana * 40)));
            FPP = new Date(FPP);
            $("#eg").val(EdadGestacional + " semanas");
            let fppdata =  FPP.getFullYear() + '-' + ("0" + (FPP.getMonth() +1)).slice("-2") + '-' +  ("0" + FPP.getDate()).slice("-2");
            $("#fpp").val(fppdata);
        });

        $("#tallamaterna").on("click", function(){
            $('#imc').val(imc($("#tallamaterna").val(), $('#pesomaterno').val()) + ' kl/m2');
        }).on("change", function(){
            $('#imc').val(imc($("#tallamaterna").val(), $('#pesomaterno').val()) + ' kl/m2');
        });

        $("#pesomaterno").on("click", function(){
            $('#imc').val(imc($("#tallamaterna").val(), $('#pesomaterno').val()) + ' kl/m2');
        }).on("change", function(){
            $('#imc').val(imc($("#tallamaterna").val(), $('#pesomaterno').val()) + ' kl/m2');
        });

        //horas

        $("#horas\\.busqueda\\.fecha").on("change", function(){
            tablaHoras();
        });

        $("#horas\\.nuevo").on("click", function(){
            $("#horas\\.nuevo").addClass("d-none");
            $("#horas\\.modificar").addClass("d-none");
            $("#horas\\.guardar").removeClass("d-none");
            $("#horas\\.cancelar").removeClass("d-none");
            $("#horas\\.eliminar").addClass("d-none");

            $("#horas\\.formulario").removeClass("d-none");

            $("#horas\\.atencion").val("");
            $("#horas\\.tipo").val("");
            $("#horas\\.hora").val("");
            $("#horas\\.cancelacion").val("");
            $("#horas\\.cancelado").val("");
            $("#horas\\.adicional").val("");
            $("#horas\\.situacion").val("");
            $("#horas\\.ecografista").val("");
        });

        $("#horas\\.modificar").on("click", function(){
            $("#horas\\.nuevo").addClass("d-none");
            $("#horas\\.modificar").addClass("d-none");
            $("#horas\\.guardar").removeClass("d-none");
            $("#horas\\.cancelar").removeClass("d-none");
            $("#horas\\.eliminar").addClass("d-none");

            $("#horas\\.formulario").removeClass("d-none");
        });

        $("#horas\\.guardar").on("click", function(){
            $("#horas\\.nuevo").removeClass("d-none");
            $("#horas\\.guardar").addClass("d-none");
            $("#horas\\.cancelar").addClass("d-none");

            $("#horas\\.formulario").addClass("d-none");

            let envio = {
                action: "new",
                hora_rut: $("#horas\\.rut").val(),
                hora_fecha: $("#horas\\.busqueda\\.fecha").val(),
                hora_atencion: $("#horas\\.atencion").val(),
                hora_tipo: $("#horas\\.tipo").val(),
                hora_hora: $("#horas\\.hora").val(),
                hora_cancelacion: $("#horas\\.cancelacion").val(),
                hora_cancelado: $("#horas\\.cancelado").val(),
                hora_adicional: $("#horas\\.adicional").val(),
                hora_situacion: $("#horas\\.situacion").val(),
                hora_ecografista: $("#horas\\.ecografista").val()
            }

            $.post("<?php echo Config::get('URL'); ?>horas/api", envio).done(function(data){
                $("#horas\\.atencion").val("");
                $("#horas\\.tipo").val("");
                $("#horas\\.hora").val("");
                $("#horas\\.cancelacion").val("");
                $("#horas\\.cancelado").val("");
                $("#horas\\.adicional").val("");
                $("#horas\\.situacion").val("");
                $("#horas\\.ecografista").val("");
                tablaHoras();
            });
        });

        $("#horas\\.cancelar").on("click", function(){
            $("#horas\\.nuevo").removeClass("d-none");
            $("#horas\\.guardar").addClass("d-none");
            $("#horas\\.cancelar").addClass("d-none");

            $("#horas\\.formulario").addClass("d-none");

            $("#horas\\.atencion").val("");
            $("#horas\\.tipo").val("");
            $("#horas\\.hora").val("");
            $("#horas\\.cancelacion").val("");
            $("#horas\\.cancelado").val("");
            $("#horas\\.adicional").val("");
            $("#horas\\.situacion").val("");
            $("#horas\\.ecografista").val("");
        });

        $("#horas\\.eliminar").on("click", function(){
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

        $.post("<?php echo Config::get('URL'); ?>ecografista/api", args).done(function(data){
            $('#horas\\.ecografista').empty();
            if (Object.keys(data).length > 0) {
                $.each(data, function(index, element){
                    let response = '<option value="' + element.ecografista_id + '">' + element.ecografista_name + '</option>';
                    $('#horas\\.ecografista').append(response);
                });
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
                    let response = '<tr data-id="' + element.paciente_id +'"><td>'+element.paciente_id+'</td><td>'+element.paciente_rut+'</td><td>'+element.paciente_nombre+'</td><td>'+element.paciente_apellido+'</td><td>' + element.paciente_fur +'</td><td>'+ element.paciente_eg +'</td><td>'+ element.paciente_fpp +'</td></tr>';
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

                    $("#nacimiento").val("");
                    $("#edad").val("");
                    $("#fur").val("");
                    $("#tallamaterna").val("");
                    $("#pesomaterno").val("");
                    $("#gestas").val("");
                    $("#partos").val("");

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

                            $("#fur").val(data.paciente_fur);
                            $("#eg").val(data.paciente_eg);
                            $("#fpp").val(data.paciente_fpp);
                            $("#edad").val(data.paciente_edadmaterna);
                            $("#gestas").val(data.paciente_gestasprevias);
                            $("#partos").val(data.paciente_partos);
                            $("#tallamaterna").val(data.paciente_talla);
                            $("#pesomaterno").val(data.paciente_peso);
                            $("#imc").val(data.paciente_imc);

                            $("#paciente\\.modificar").removeClass("d-none");
                            $("#paciente\\.eliminar").removeClass("d-none");

                            //para hora
                            $("#horas\\.rut").val(data.paciente_rut);
                            $("#horas\\.nombre").val(data.paciente_nombre);
                            $("#horas\\.apellido").val(data.paciente_apellido);
                        }
                    });
                });
            }
        });
    }

    function tablaHoras(){

        var send = {
            action: "get",
            hora_fecha: $("#horas\\.busqueda\\.fecha").val()
        }

        $.post("<?php echo Config::get('URL'); ?>horas/api", send).done(function(data){
            $('#horas\\.tabla').empty();
            if (Object.keys(data).length > 0) {
                $.each(data, function(index, element){
                    let response = '<tr data-id="' + element.hora_id +'"><td>'+element.hora_id+'</td><td>'+element.hora_hora+'</td><td>' + element.paciente_nombre +'</td><td>' + element.paciente_apellido +'</td><td>' + element.paciente_prevision +'</td><td>' + element.hora_atencion +'</td><td>' + element.paciente_ciudad +'</td><td>'+ element.hora_situacion +'</td><td>'+element.ecografista_name+'</td><td> $ '+element.hora_cancelado+'</td></tr>';
                    $('#horas\\.tabla').append(response);
                });

                $('#horas\\.tabla > tr').on("click", function(){
                    var paciente_id = $(this).data("id");
                    let send = {
                        action: "read",
                        hora_id: hora_id
                    }

                    //vaciar los inputs
                    $("#horas\\.atencion").val("");
                    $("#horas\\.tipo").val("");
                    $("#horas\\.hora").val("");
                    $("#horas\\.cancelacion").val("");
                    $("#horas\\.cancelado").val("");
                    $("#horas\\.adicional").val("");
                    $("#horas\\.situacion").val("");
                    $("#horas\\.ecografista").val("");

                    $("#horas\\.modificar").addClass("d-none");
                    $("#horas\\.eliminar").addClass("d-none");

                    $.post("<?php echo Config::get('URL'); ?>pacientes/api", send).done(function(data){
                        if (Object.keys(data).length > 0) {
                            let send = {
                                action: "read",
                                paciente_rut: data.hora_rut
                            }

                            $.post("<?php echo Config::get('URL'); ?>pacientes/api", send).done(function(datA){
                                if (Object.keys(data).length > 0) {
                                    $("#rut").val(datA.paciente_rut);
                                    $("#nombre").val(datA.paciente_nombre);
                                    $("#apellido").val(datA.paciente_apellido);
                                    $("#telefono").val(datA.paciente_telefono);
                                    $("#email").val(datA.paciente_email);
                                    $("#prevision").val(datA.paciente_prevision);
                                    $("#ciudad").val(datA.paciente_ciudad);
                                    $("#lugar").val(datA.paciente_lugar);
                                    $("#profesional").val(datA.paciente_profesional);
                                    $("#acompanantes").val(datA.paciente_acompanantes);

                                    $("#fur").val(datA.paciente_fur);
                                    $("#eg").val(datA.paciente_eg);
                                    $("#fpp").val(datA.paciente_fpp);
                                    $("#edad").val(datA.paciente_edadmaterna);
                                    $("#gestas").val(datA.paciente_gestasprevias);
                                    $("#partos").val(datA.paciente_partos);
                                    $("#tallamaterna").val(datA.paciente_talla);
                                    $("#pesomaterno").val(datA.paciente_peso);
                                    $("#imc").val(datA.paciente_imc);

                                    $("#paciente\\.modificar").removeClass("d-none");
                                    $("#paciente\\.eliminar").removeClass("d-none");

                                    //para hora
                                    $("#horas\\.rut").val(datA.paciente_rut);
                                    $("#horas\\.nombre").val(datA.paciente_nombre);
                                    $("#horas\\.apellido").val(datA.paciente_apellido);
                                }
                            });

                            $("#horas\\.busqueda\\.fecha").val(data.hora_fecha);
                            $("#horas\\.atencion").val(data.hora_atencion);
                            $("#horas\\.tipo").val(data.hora_tipo);
                            $("#horas\\.hora").val(data.hora_hora);
                            $("#horas\\.cancelacion").val(data.hora_cancelacion);
                            $("#horas\\.cancelado").val(data.hora_cancelado);
                            $("#horas\\.adicional").val(data.hora_adicional);
                            $("#horas\\.situacion").val(data.hora_situacion);
                            $("#horas\\.ecografista").val(data.hora_ecografista);

                            $("#horas\\.modificar").removeClass("d-none");
                            $("#horas\\.eliminar").removeClass("d-none");
                        }
                    });
                });
            }
        });
    }

    function imc(talla, peso) {
        var tallapeso = peso / Math.pow(talla, 2);
        var IMC = tallapeso * 10000;
        return IMC.toFixed(1);
    }
</script>