<div class="container">
    <h1>Pacientes</h1>
    <hr>
    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link shadow-sm border mr-2 active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Pacientes</a>
            <a class="nav-item nav-link shadow-sm border mr-2" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Horas de atención</a>
            <a class="nav-item nav-link shadow-sm border" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Resumen</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row">
                <div class="col-9">
                    <div class="card mt-2">
                        <div class="card-body">
                            <h5 class="card-title">Pacientes</h5>
                        </div>
                    </div>
                </div>
                <div class="col-3">
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
                <div class="col-9">
                    <div class="card mt-2">
                        <div class="card-body">
                            <h5 class="card-title">Horas de atención</h5>
                        </div>
                    </div>
                </div>
                <div class="col-3">
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
                <div class="col-9">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Resumen</h5>
                        </div>
                    </div>
                </div>
                <div class="col-3">
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