    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tabla de contenido de los usuarios</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Usuarios</h6>
            </div>
            <div>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuarios">
                    Nuevo
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Icono</th>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>Rol</th>
                                <th>Editar</th>
                                <th>eliminar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Icono</th>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>Rol</th>
                                <th>Editar</th>
                                <th>eliminar</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $item = null;
                            $datos = ControladorUsuarios::ctrMostrarUsuarios($item);

                            foreach ($datos as $dato):
                            ?>
                                <tr>
                                    <td><?= $dato->id ?></th>
                                    <td><img src="<?= $dato->logo ?>" width="50px" alt="logo"></th>
                                    <td><?= $dato->usuario ?></th>
                                    <td><?= $dato->nombre ?></th>
                                    <td><?= $dato->estado ? "Activo" : "No activo"; ?></td>
                                    <td><?= $dato->rol ? "Administrador" : "Editor"; ?></td>
                                    <th><button class="btn btnEditarUsuarios" idUsuario="<?= $dato->id ?>" data-toggle="modal" data-target="#modalEditarUsuarios">🖊</button></th>
                                    <th>
                                        <button class="btn btnEliminarUsuario" idUsuario="<?= htmlspecialchars($dato->id) ?>" logoUsuario="<?= htmlspecialchars($dato->logo) ?>">
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


    <!-- Modal Para Agregar Usuario-->
    <div class="modal fade" id="modalAgregarUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="user" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">❌</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-sm-12 py-2">
                                <input type="text" name="usuario" class="form-control form-control-user" placeholder="Usuario">
                            </div>
                            <div class="col-sm-6 py-2">
                                <input type="file" name="icono" class="form-control form-control-user logoFoto"
                                    placeholder="Agrega un icono">
                                <p>Peso máximo del logo 2MB</p>
                            </div>
                            <div class="col-sm-6 py-2">
                                <img src="vistas/img/undraw_profile.svg" width="50%" class="img-thumbnail previsualizarIcono">
                            </div>
                            <div class="col-sm-12 py-2">
                                <input type="text" name="nombre" class="form-control form-control-user" placeholder="Nombre">
                            </div>
                            <div class="col-sm-12 py-2">
                                <input type="password" name="password" class="form-control form-control-user"
                                    placeholder="Contraseña">
                            </div>
                            <div class="col-sm-12 py-2">
                                <select class="form-control" name="estado">
                                    <option selected disabled>Estado de usuario</option>
                                    <option value="1">Activado</option>
                                    <option value="0">Desactivado</option>
                                </select>
                            </div>
                            <div class="col-sm-12 py-2">
                                <select class="form-control" name="rol">
                                    <option selected disabled>Rol de usuario</option>
                                    <option value="1">Administrador</option>
                                    <option value="0">Editor</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-success" type="submit">Guardar</button>
                    </div>
                </form>
                <?php
                $crearUsuario = new ControladorUsuarios();
                $crearUsuario->ctrCrearUsuario();
                ?>
            </div>
        </div>
    </div>


    <!-- Modal Para Editar Usuario-->
    <div class="modal fade" id="modalEditarUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="user" method="post" enctype="multipart/form-data">
                    <!-- CABEZA DEL MODAL -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">❌</span>
                        </button>
                    </div>
                    <!-- TERMINA CABEZA DEL MODAL -->

                    <!-- CUERPO DEL MODAL -->
                    <div class="modal-body">
                        <div class="form-group row">
                            <!-- CAMPO USUARIO -->
                            <div class="col-sm-12 mb-3 mb-sm-0 py-2">
                                <input type="number" name="id" id="editarId">
                                <input type="text" name="Editarusuario" id="Editarusuario"
                                    class="form-control form-control-user" placeholder="Usuario">
                            </div>
                            <!-- TERMINA CAMPO USUARIO -->
                            <!-- CAMPO LOGO -->
                            <div class="col-sm-12 mb-3 mb-sm-0 py-2 row">
                                <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                    <input type="file" name="Editaricono" id="Editaricono"
                                        class="form-control form-control-user logoFoto" placeholder="Agrega un icono">
                                    <p>Peso maximo del logo 2MB</p>
                                    <input type="text" name="iconoActual" id="iconoActual">
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                    <img src="vistas/img/logo/us.png" width="50%" class="img-thumbnail previsualizarIcono">
                                </div>
                            </div>
                            <!-- TERMINA CAMPO LOGO -->
                            <!-- CAMPO NOMBRE -->
                            <div class="col-sm-12 mb-3 mb-sm-0 py-2">
                                <input type="text" name="Editarnombre" id="Editarnombre"
                                    class="form-control form-control-user" placeholder="Nombre">
                            </div>
                            <!-- TERMINA CAMPO NOMBRE -->
                            <!-- CAMPO CONTRASEÑA -->
                            <div class="col-sm-12 mb-3 mb-sm-0 py-2">
                                <input type="hidden" name="Editarpassword" id="Editarpassword"
                                    class="form-control form-control-user"
                                    placeholder="Contraseña">
                                <input type="text" name="Actualpassword" id="Actualpassword"
                                    class="form-control form-control-user"
                                    placeholder="Contraseña">
                            </div>
                            <!-- TERMINA CAMPO CONTRASEÑA -->
                            <!-- CAMPO TIPO -->
                            <div class="col-sm-12 mb-3 mb-sm-0 py-2">
                                <select class="form-control" name="Editarestado" id="Editarestado">
                                    <option selected disabled>Estado de usuario</option>
                                    <option value="1">Activado</option>
                                    <option value="0">Desactivado</option>
                                </select>
                            </div>
                            <!-- TERMINA CAMPO TIPO -->
                            <!-- CAMPO ROL -->
                            <div class="col-sm-12 py-2">
                                <select class="form-control" name="Editarrol" id="Editarrol">
                                    <option selected disabled>Rol de usuario</option>
                                    <option value="1">Administrador</option>
                                    <option value="0">Editor</option>
                                </select>
                            </div>
                            <!-- TERMINA CAMPO ROL -->
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
                $editarUsuario = new ControladorUsuarios();
                $editarUsuario->ctrEditarUsuario();
                ?>
            </div>
        </div>
    </div>

    <?php
    $borrarUsuario = new ControladorUsuarios();
    $borrarUsuario->ctrBorrarUsuario();
    ?>