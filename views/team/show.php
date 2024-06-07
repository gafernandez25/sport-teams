<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $this->team->name ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/team">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="/team">Equipos</a></li>
                    <li class="breadcrumb-item active"><?= $this->team->name ?></li>
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
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h3 class="col-12">Deporte: <b><?= $this->team->sport()->value('name') ?></b></h3>
                                <h4 class="col-12">Capit&aacute;n: <b></b></h4>
                                <h5 class="col-12">Ciudad: <b><?= $this->team->city ?></b></h5>
                                <h6 class="col-12">Fecha de fundación: <b>
                                    <?= ($this->team->foundation_date) ?
                                        \Carbon\Carbon::parse($this->team->foundation_date)->format(
                                            'd-m-Y'
                                        ) :
                                        '' ?>
                                    </b>
                                </h6>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="/player/create" title="Nuevo jugador">
                                    <i class="fa fa-plus-circle text-gray-dark"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3>Jugadores</h3>
                        <table id="players" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Fecha de nacimiento</th>
                                <th>Dorsal</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Fecha de nacimiento</th>
                                <th>Dorsal</th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->