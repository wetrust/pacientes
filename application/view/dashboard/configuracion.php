<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Configuración</h5>
            <div class="btn-group" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-secondary" id="ciudad">Ciudades</button>
                <button type="button" class="btn btn-secondary" id="prevision">Prevision</button>
                <button type="button" class="btn btn-secondary" id="lugar">Lugar de control</button>
            </div>
            <div id="contenedor">
            </div>
        </div>
    </div>
</div>
<script>
    var _api, view, wtInterface;

    $(document).ready(function(){
        $("#ciudad").on("click", function(){
            $("#contenedor").empty();
            _api = "<?php echo Config::get('URL'); ?>ciudad/api";
            view = {
                titulo: "Ciudad",
                inputs: {
                    ciudad_id: {
                        name: "#",
                        type: "hidden"
                    },
                    ciudad_name: {
                        name: "Ciudad",
                        type: "text"
                    }
                }
            };
            wtInterface = NULL;
            wtInterface = new CRUDInterface;
            wtInterface.html("#contenedor");
        });

        $("#prevision").on("click", function(){
            $("#contenedor").empty();
            _api = "<?php echo Config::get('URL'); ?>prevision/api";
            view = {
                titulo: "Prevision",
                inputs: {
                    prevision_id: {
                        name: "#",
                        type: "hidden"
                    },
                    prevision_name: {
                        name: "Prevision",
                        type: "text"
                    }
                }
            };
            wtInterface = NULL;
            wtInterface = new CRUDInterface;
            wtInterface.html("#contenedor");
        });

        $("#lugar").on("click", function(){
            $("#contenedor").empty();
            _api = "<?php echo Config::get('URL'); ?>lugar/api";
            view = {
                titulo: "Lugar de control",
                inputs: {
                    lugar_id: {
                        name: "#",
                        type: "hidden"
                    },
                    lugar_name: {
                        name: "Lugar",
                        type: "text"
                    }
                }
            };
            wtInterface = NULL;
            wtInterface = new CRUDInterface;
            wtInterface.html("#contenedor");
        });
    });
</script>