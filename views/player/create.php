<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Agregar jugador</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/team">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="/team">Equipos</a></li>
                    <li class="breadcrumb-item">
                        <a href="<?= '/team/' . $this->team->id ?>"><?= $this->team->name ?></a>
                    </li>
                    <li class="breadcrumb-item active">Agregar jugador</li>
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
                    <form method="post" action="<?= '/team/' . $this->team->id . '/player' ?>">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4 offset-md-2">
                                    <label for="first_name">Nombre</label>
                                    <input class="form-control" id="first_name" name="first_name"
                                           value="<?= (isset($this->oldInput['first_name'])) ? $this->oldInput['first_name'] : '' ?>"
                                           required/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="last_name">Apellido</label>
                                    <input class="form-control" id="last_name" name="last_name"
                                           value="<?= (isset($this->oldInput['last_name'])) ? $this->oldInput['last_name'] : '' ?>"
                                           required/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-2 offset-md-2">
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="is_captain" name="is_captain">
                                        <label for="is_captain">
                                            Es capit&aacute;n
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="number">N&uacute;mero</label>
                                    <input class="form-control" id="number" name="number"
                                           value="<?= (isset($this->oldInput['number'])) ? $this->oldInput['number'] : '' ?>"
                                           required/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="foundation_date">Fecha de nacimiento</label>
                                    <div class="input-group date" id="birth_date" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input"
                                               name="birth_date" data-target="#birth_date"
                                               value="<?= (isset($this->oldInput['birth_date'])) ? $this->oldInput['birth_date'] : '' ?>"
                                        />
                                        <div class="input-group-append" data-target="#birth_date"
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
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->