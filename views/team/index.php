<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Equipos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/team">Inicio</a></li>
                    <li class="breadcrumb-item active">Equipos</li>
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
                        <h3 class="card-title float-sm-right">
                            <a href="/team/create" title="Nuevo equipo">
                                <i class="fa fa-plus-circle text-gray-dark"></i>
                            </a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <table id="teams" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Deporte</th>
                                <th>Ciudad</th>
                                <th>Fecha de fundación</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            /** @var \App\Model\Team $team */
                            foreach ($this->teams as $team) {
                                ?>
                                <tr>
                                    <td><?= $team->name ?></td>
                                    <td><?= $team->sport()->value('name') ?></td>
                                    <td><?= $team->city ?></td>
                                    <td><?= ($team->foundation_date) ?
                                            \Carbon\Carbon::parse($team->foundation_date)->format('d-m-Y') :
                                            '' ?></td>
                                    <td class="text-right">
                                        <a href="<?= '/team/' . $team->id ?>"> <i class="fa fa-eye text-info"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Deporte</th>
                                <th>Ciudad</th>
                                <th>Fecha de fundación</th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
