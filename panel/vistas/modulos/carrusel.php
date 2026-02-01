    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tabla de contenido del carrusel</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Carrusel</h6>
            </div>
            <div>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCarrusel">
                    Nuevo
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Titulo</th>
                                <th>Subtitulo</th>
                                <th>Imagen</th>
                                <th>Editar</th>
                                <th>eliminar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Titulo</th>
                                <th>Subtitulo</th>
                                <th>Imagen</th>
                                <th>Editar</th>
                                <th>eliminar</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                                $item = null;
                                $datos = ControladorCarrusel::ctrMostrarCarrusel($item);

                                foreach ($datos as $dato):
                                ?>
                                <tr>
                                    <td><?= $dato->id ?></th>
                                    <td><?= $dato->titulo ?></th>
                                    <td><?= $dato->subtitulo ?></th>
                                    <td><img src="<?= $dato->imagen ?>" width="30px" alt=""></th>
                                    <th><button class="btn btnEditarCarrusel" idCarrusel="<?= $dato->id ?>" data-toggle="modal" data-target="#modalEditarCarrusel">🖊</button></th>
                                    <th>
                                        <button class="btn btnEliminarCarrusel" idCarrusel="<?= htmlspecialchars($dato->id) ?>" imagenCarrusel="<?= htmlspecialchars($dato->imagen) ?>">
                                            ❌
                                        </button>
                                    </th>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->


    <!-- Modal Para Agregar Carrausel-->
    <div class="modal fade" id="modalAgregarCarrusel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="user" method="post" enctype="multipart/form-data">
                    <!-- CABEZA DEL SLIDER -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Carrusel</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">❌</span>
                        </button>
                    </div>
                    <!-- TERMINA CABEZA DEL MODAL -->

                    <!-- CUERPO DEL MODAL -->
                    <div class="modal-body">
                        <div class="form-group row">
                            <!-- CAMPO TITULO01 -->
                            <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                <input type="text" name="titulo"
                                    class="form-control form-control-user" placeholder="Titulo Central">
                            </div>

                            <!-- CAMPO SUBTITULO -->
                            <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                <input type="text" name="subtitulo"
                                    class="form-control form-control-user" placeholder="Titulo Central">
                            </div>
                            <!-- TERMINA CAMPO SUBTITULO -->

                            <!-- CAMPO LOGO -->
                            <div class="col-sm-12 mb-3 mb-sm-0 py-2">
                                <input type="file" name="foto"
                                    class="form-control form-control-user logoCarrusel" placeholder="Agrega un slider">
                                <p>Peso maximo del logo 2MB</p>
                                <img src="vistas/img/logo/us.png" width="100px" class="img-thumbnail previsualizarCarrusel">
                            </div>
                            <!-- TERMINA CAMPO LOGO -->

                        </div>
                    </div>
                    <!-- TERMINA CUERPO DEL MODAL -->

                    <!-- FOOTER DEL MODAL -->
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-success" type="submit">Guardar</button>
                    </div>
                    <!-- TERMINA EL FOOTER -->
                </form>
                    <?php
                        $crearCarrusel = new ControladorCarrusel();
                        $crearCarrusel->ctrCrearCarrusel();
                    ?>
            </div>
        </div>
    </div>

        <!-- Modal Para Editar Carrusel-->
        <div class="modal fade" id="modalEditarCarrusel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="user" method="post" enctype="multipart/form-data">
                    <!-- CABEZA DEL SLIDER -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Carrusel</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">❌</span>
                        </button>
                    </div>
                    <!-- TERMINA CABEZA DEL MODAL -->

                    <!-- CUERPO DEL MODAL -->
                    <div class="modal-body">
                        <div class="form-group row">
                            <!-- CAMPO TITULO01 -->
                            <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                <input type="text" name="Editartitulo" id="Editartitulo"
                                    class="form-control form-control-user" placeholder="Titulo Central">
                            </div>

                            <!-- CAMPO SUBTITULO -->
                            <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                <input type="text" name="Editarsubtitulo" id="Editarsubtitulo"
                                    class="form-control form-control-user" placeholder="Titulo Central">
                                    <input type="number" name="id" id="editarId">
                            </div>
                            <!-- TERMINA CAMPO SUBTITULO -->

                            <!-- CAMPO LOGO -->
                            <div class="col-sm-12 mb-3 mb-sm-0 py-2">
                                <input type="file" name="Editarfoto" id="Editarfoto"
                                    class="form-control form-control-user logoCarrusel" placeholder="Agrega un slider">
                                <p>Peso maximo del logo 2MB</p>
                                <img src="vistas/img/logo/us.png" width="100px" class="img-thumbnail previsualizarCarrusel">
                                <input type="text" name="fotoActual" id="fotoActual">
                            </div>
                            <!-- TERMINA CAMPO LOGO -->

                        </div>
                    </div>
                    <!-- TERMINA CUERPO DEL MODAL -->

                    <!-- FOOTER DEL MODAL -->
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-success" type="submit">Guardar</button>
                    </div>
                    <!-- TERMINA EL FOOTER -->
                </form>
                    <?php
                        $editarCarrusel = new ControladorCarrusel();
                        $editarCarrusel->ctrEditarCarrusel();
                    ?>
            </div>
        </div>
    </div>


    <?php
    $borrarCarrusel = new ControladorCarrusel();
    $borrarCarrusel->ctrBorrarCarrusel();
    ?>