<div class="col-md-4 couchSearchForm-container">
    <div class="row couchSearchForm">

        <form class="form-block" role="form" data-toggle="validator" action="couchSearch.php" method="post" name="couchSearchForm" id="couchSearchForm">

            <div class="form-group">
            <label for="couchCountry" class="couchSearchFormLabel">Ad&oacute;nde vas?</label>
            <div class="form-group has-feedback has-warning">
                <label for="couchCountry" class="sr-only">Pais</label>
                <select class="form-control" name="formCountry" id="formCountry" data-error="Seleccione un pais!" required onchange="showCities()">
                    <option selected hidden value>Pais</option>
                    <?php
                        $query = "SELECT p.idpais, p.nombre FROM pais p";
                        $result = queryAllByAssoc($query);
                        foreach ($result as $row) {
                            echo "<option value=".$row['idpais'].">".$row['nombre']."</option>";
                        }
                    ?>
                </select>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group has-feedback has-warning">
                <label for="couchCity" class="sr-only">Ciudad</label>
                <select class="form-control" name="formCity" id="formCity" data-error="Seleccione una ciudad!" required>
                    <option selected hidden value>Ciudad</option>
                </select>
                <div class="help-block with-errors"></div>
            </div>
            </div>

            <hr class="couchSearchFormHr">

            <div class="form-group has-feedback has-success">
                <label for="couchType" class="sr-only">Tipo</label>
                <select class="form-control" name="couchType" id="couchType" data-error="Seleccione un tipo!">
                    <option selected hidden value>Tipo de Couch</option>
                    <?php
                        $query = "SELECT t.idtipo, t.descripcion FROM tipo t";
                        $result = queryAllByAssoc($query);
                        foreach ($result as $row) {
                            echo "<option value=".$row['idtipo'].">".$row['descripcion']."</option>";
                        }
                    ?>
                </select>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group has-feedback has-success">
                <label for="couchCapacity" class="sr-only">Capacidad</label>
                <input type="text" pattern="^[0-9\s]+$" class="form-control" name="couchCapacity" id="couchCapacity" placeholder="Cantidad de personas" data-error="Ingrese un numero!"></input>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group has-feedback has-success">
                <label for="couchTitle" class="sr-only">Titulo</label>
                <input type="text" class="form-control" name="couchTitle" id="couchTitle" placeholder="Titulo del Couch" data-error="Ingrese un titulo!"></input>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group has-feedback has-success">
                <label for="couchDescription" class="sr-only">Descripcion</label>
                <textarea class="form-control" rows="3" name="couchDescription" id="couchDescription" placeholder="Descripcion del Couch" data-error="Ingrese una descripcion!"></textarea>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                <div class="help-block with-errors"></div>
            </div>

            <div class="checkbox collapse" id="caracteristicas">
                <label>
                    <input type="checkbox" value="1">
                    Caracteristica 1
                </label><br/>
                <label>
                    <input type="checkbox" value="2">
                    Caracteristica 2
                </label><br/>
                <label>
                    <input type="checkbox" value="3">
                    Caracteristica 3
                </label><br/>
                <label>
                    <input type="checkbox" value="4">
                    Caracteristica 4
                </label><br/>
                <label>
                    <input type="checkbox" value="5">
                    Caracteristica 5
                </label><br/>
            </div>

            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
            <a href="#caracteristicas" role="button" data-toggle="collapse" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></a>
        </form>

    </div>
</div>