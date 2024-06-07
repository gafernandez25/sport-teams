<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Crear equipo</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/team">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="/team">Equipos</a></li>
                    <li class="breadcrumb-item active">Crear</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php
                if ($this->errorMessages !== null) {
                    ?>
                    <div class="alert alert-danger alert-dismissible col-12">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                        </button>
                        <h5><i class="icon fas fa-ban"></i> Hay errores en el formulario</h5>
                        <?php
                        foreach ($this->errorMessages as $errorMessage) {
                            echo '<p>' . $errorMessage . '</p>';
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
                <div class="card">
                    <form method="post" action="/team">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4 offset-md-2">
                                    <label for="name">Nombre</label>
                                    <input class="form-control" id="name" name="name"
                                           value="<?= (isset($this->oldInput['name'])) ? $this->oldInput['name'] : '' ?>" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="city">Ciudad</label>
                                    <input class="form-control" id="city" name="city"
                                           value="<?= (isset($this->oldInput['city'])) ? $this->oldInput['city'] : '' ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4 offset-md-2">
                                    <label for="sport">Deporte</label>
                                    <select class="form-control select2bs4" id="sport" name="sport"
                                            style="width: 100%;" required>
                                        <option selected="selected" value=""></option>
                                        <?php
                                        /** @var \App\Model\Sport $sport */
                                        foreach ($this->sports as $sport) {
                                            ?>
                                            <option value="<?= $sport->id ?>"
                                                <?= (isset($this->oldInput['sport']) && $this->oldInput['sport'] == $sport->id) ? 'selected' : '' ?>
                                            ><?= $sport->name ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="foundation_date">Fecha de fundación</label>
                                    <div class="input-group date" id="foundation_date" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input"
                                               name="foundation_date" data-target="#foundation_date"
                                               value="<?= (isset($this->oldInput['foundation_date'])) ? $this->oldInput['foundation_date'] : '' ?>"
                                               required
                                        />
                                        <div class="input-group-append" data-target="#foundation_date"
                                             data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-success text-center">Guardar</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

