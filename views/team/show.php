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
                                <h3 class="col-12 text-success">Deporte: <b><?= $this->team->sport->name ?></b></h3>
                                <h4 class="col-12 text-info">Capit&aacute;n:
                                    <b><?= $this->team->captain?->first_name . ' ' . $this->team->captain?->last_name ?></b>
                                </h4>
                                <h5 class="col-12 text-orange">Ciudad: <b><?= $this->team->city ?></b></h5>
                                <h6 class="col-12 text-pink">Fecha de fundación: <b>
                                        <?= ($this->team->foundation_date) ?
                                            \Carbon\Carbon::parse($this->team->foundation_date)->format(
                                                'd-m-Y'
                                            ) :
                                            '' ?>
                                    </b>
                                </h6>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="<?= '/team/' . $this->team->id . '/player/create' ?>" title="Nuevo jugador">
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
                            <tbody>
                            <?php
                            /** @var \App\Model\Player $player */
                            foreach ($this->team->players as $player) {
                                ?>
                                <tr>
                                    <td><?= $player->first_name . ' ' . $player->last_name ?></td>
                                    <td><?= ($player->birth_date) ?
                                            \Carbon\Carbon::parse($player->birth_date)->format('d-m-Y') :
                                            '' ?></td>
                                    <td><?= $player->number ?></td>
                                    <td class="text-right">
                                        <a href="<?= '/player/' . $player->id . '/edit/' ?>"
                                           title="Editar"><i
                                                    class="fas fa-pencil-alt text-info"></i> </a>
                                        <i class="fas fa-trash-alt text-danger ml-2 cursorPointer btnDelete"
                                           data-id="<?= $player->id ?>" title="Eliminar"></i>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
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

<script>
    let indexUrlName = '/team/'.<?= $this->team->id ?>;
</script>