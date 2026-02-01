    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tabla de contenido de las noticias</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Noticias</h6>
            </div>
            <div>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarNoticias">
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
                                <th>Noticia</th>
                                <th>Nota Corta</th>
                                <th>Párrafo 1</th>
                                <th>Párrafo 2</th>
                                <th>Párrafo 3</th>
                                <th>Párrafo 4</th>
                                <th>Párrafo 5</th>
                                <th>Párrafo 6</th>
                                <th>Autor</th>
                                <th>Fecha</th>
                                <th>Imagen Portada</th>
                                <th>Imagen Horizontal</th>
                                <th>Editar</th>
                                <th>eliminar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Titulo</th>
                                <th>Noticia</th>
                                <th>Nota Corta</th>
                                <th>Párrafo 1</th>
                                <th>Párrafo 2</th>
                                <th>Párrafo 3</th>
                                <th>Párrafo 4</th>
                                <th>Párrafo 5</th>
                                <th>Párrafo 6</th>
                                <th>Autor</th>
                                <th>Fecha</th>
                                <th>Imagen Portada</th>
                                <th>Imagen Horizontal</th>
                                <th>Editar</th>
                                <th>eliminar</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $item = null;
                            $datos = ControladorNoticia::ctrMostrarNoticia($item);

                            foreach ($datos as $dato):
                            ?>
                                <tr>
                                    <td id="idNoticias"><?= $dato->id ?></th>
                                    <td><?= $dato->titulo ?></th>
                                    <td><?= $dato->nombre_noticia ?></th>
                                    <td><?= $dato->nota_corta ?></th>
                                    <td><?= $dato->p1 ?></th>
                                    <td><?= $dato->p2 ?></th>
                                    <td><?= $dato->p3 ?></th>
                                    <td><?= $dato->p4 ?></th>
                                    <td><?= $dato->p5 ?></th>
                                    <td><?= $dato->p6 ?></th>
                                    <td><?= $dato->autor ?></th>
                                    <td><?= $dato->fecha ?></th>
                                    <td><img src="<?= $dato->imagen_portada ?>" width="30px" alt=""></th>
                                    <td><img src="<?= $dato->imagen_horizontal ?>" width="30px" alt=""></th>
                                    <td><button class="btn btnEditarNoticias" idNoticias="<?= $dato->id ?>" data-toggle="modal" data-target="#modalEditarNoticias">🖊</button></th>
                                    <th>
                                        <button class="btn btnEliminarNoticia" idNoticia="<?= htmlspecialchars($dato->id) ?>" imagenPortada="<?= htmlspecialchars($dato->imagen_portada) ?>" imagenHorizontal="<?= htmlspecialchars($dato->imagen_horizontal) ?>">
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


    <!-- Modal Para Agregar Noticias-->
    <div class="modal fade" id="modalAgregarNoticias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="user" method="post" enctype="multipart/form-data">
                    <!-- CABEZA DEL MODAL -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Noticia</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">❌</span>
                        </button>
                    </div>
                    <!-- TERMINA CABEZA DEL MODAL -->

                    <!-- CUERPO DEL MODAL -->
                    <div class="modal-body">
                        <div class="form-group row">

                            <!-- CAMPO TITULO -->
                            <div class="col-sm-12 mb-3 mb-sm-0 py-2">
                                <select name="titulo" class="form-control rounded-bottom ">
                                    <option selected disabled>Tipo de noticia</option>
                                    <option value="Noticia Académicas">Noticia Académicas</option>
                                    <option value="Noticia Cultural">Noticia Cultural</option>
                                    <option value="Noticia Deportiva">Noticia Deportiva</option>
                                    <option value="Noticia Social">Noticia Social</option>
                                </select>
                            </div>
                            <!-- TERMINA CAMPO TITULO -->

                            <!-- CAMPO NOTICIA -->
                            <div class="col-sm-12 mb-3 mb-sm-0 py-2">
                                <input type="text" name="noticia"
                                    class="form-control form-control-user" placeholder="Nombre de la noticia">
                            </div>
                            <!-- TERMINA CAMPO NOTICIAS -->

                            <!-- CAMPO NOTA CORTA -->
                            <div class="col-sm-12 mb-3 mb-sm-0 py-2">
                                <input type="text" name="notaCorta"
                                    class="form-control form-control-user" placeholder="Nota corta">
                            </div>
                            <!-- TERMINA NOTA CORTA -->

                            <!-- CAMPO PARRAFO 1 -->
                            <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                <input type="text" name="p1"
                                    class="form-control form-control-user" placeholder="Párrafo 1">
                            </div>
                            <!-- TERMINA PARRAFO 1 -->

                            <!-- CAMPO PARRAFO 2 -->
                            <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                <input type="text" name="p2"
                                    class="form-control form-control-user" placeholder="Párrafo 2">
                            </div>
                            <!-- TERMINA PARRAFO 2 -->

                            <!-- CAMPO PARRAFO 3 -->
                            <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                <input type="text" name="p3"
                                    class="form-control form-control-user" placeholder="Párrafo 3">
                            </div>
                            <!-- TERMINA PARRAFO 3 -->

                            <!-- CAMPO PARRAFO 4 -->
                            <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                <input type="text" name="p4"
                                    class="form-control form-control-user" placeholder="Párrafo 4">
                            </div>
                            <!-- TERMINA PARRAFO 4 -->

                            <!-- CAMPO PARRAFO 5 -->
                            <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                <input type="text" name="p5"
                                    class="form-control form-control-user" placeholder="Párrafo 5">
                            </div>
                            <!-- TERMINA PARRAFO 5 -->

                            <!-- CAMPO PARRAFO 6 -->
                            <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                <input type="text" name="p6"
                                    class="form-control form-control-user" placeholder="Párrafo 6">
                            </div>
                            <!-- TERMINA PARRAFO 6 -->

                            <!-- CAMPO AUTOR -->
                            <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                <input type="text" name="autor"
                                    class="form-control form-control-user" placeholder="Nombre del autor">
                            </div>
                            <!-- TERMINA AUTOR -->

                            <!-- CAMPO FECHA -->
                            <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                <input type="date" name="fecha"
                                    class="form-control form-control-user" placeholder="Fecha de la noticia">
                            </div>
                            <!-- TERMINA FECHA -->

                            <!-- CAMPO IMAGEN PORTADA -->
                            <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                <input type="file" name="imagenPortada"
                                    class="form-control form-control-user portada" placeholder="Imagen de portada">
                                <p>Peso maximo del logo 2MB</p>
                                <img src="vistas/img/logo/us.png" width="100px" class="img-thumbnail previsualizarPortada">
                            </div>
                            <!-- TERMINA CAMPO IMAGEN PORTADA -->

                            <!-- CAMPO IMAGEN HORIZONTAL -->
                            <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                <input type="file" name="imagenHorizontal"
                                    class="form-control form-control-user horizontal" placeholder="Imagen horizontal">
                                <p>Peso maximo del logo 2MB</p>
                                <img src="vistas/img/logo/us.png" width="100px" class="img-thumbnail previsualizarHorizontal">
                            </div>
                            <!-- TERMINA CAMPO IMAGEN HORIZONTAL -->

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
                $crearNoticia = new ControladorNoticia();
                $crearNoticia->ctrCrearNoticia();
                ?>
            </div>
        </div>
    </div>

    <!-- Modal Para Editar Noticias-->
    <div class="modal fade" id="modalEditarNoticias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="user" method="post" enctype="multipart/form-data">
                    <!-- CABEZA DEL MODAL -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Noticia</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">❌</span>
                        </button>
                    </div>
                    <!-- TERMINA CABEZA DEL MODAL -->

                    <!-- CUERPO DEL MODAL -->
                    <div class="modal-body">
                        <div class="form-group row">

                            <!-- CAMPO TITULO -->
                            <div class="col-sm-12 mb-3 mb-sm-0 py-2">
                                <select name="Editartitulo" id="Editartitulo" class="form-control rounded-bottom ">
                                    <option selected disabled>Tipo de noticia</option>
                                    <option value="Noticia Académicas">Noticia Académicas</option>
                                    <option value="Noticia Cultural">Noticia Cultural</option>
                                    <option value="Noticia Deportiva">Noticia Deportiva</option>
                                    <option value="Noticia Social">Noticia Social</option>
                                </select>
                            </div>
                            <!-- TERMINA CAMPO TITULO -->

                            <!-- CAMPO NOTICIA -->
                            <div class="col-sm-12 mb-3 mb-sm-0 py-2">
                                <input type="text" name="Editarnoticia" id="Editarnoticia"
                                    class="form-control form-control-user" placeholder="Nombre de la noticia">
                                <input type="text" id="editarId" hidden name="editarId">
                            </div>
                            <!-- TERMINA CAMPO NOTICIAS -->

                            <!-- CAMPO NOTA CORTA -->
                            <div class="col-sm-12 mb-3 mb-sm-0 py-2">
                                <input type="text" name="EditarnotaCorta" id="EditarnotaCorta"
                                    class="form-control form-control-user" placeholder="Nota corta">
                            </div>
                            <!-- TERMINA NOTA CORTA -->

                            <!-- CAMPO PARRAFO 1 -->
                            <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                <input type="text" name="Editarp1" id="Editarp1"
                                    class="form-control form-control-user" placeholder="Párrafo 1">
                            </div>
                            <!-- TERMINA PARRAFO 1 -->

                            <!-- CAMPO PARRAFO 2 -->
                            <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                <input type="text" name="Editarp2" id="Editarp2"
                                    class="form-control form-control-user" placeholder="Párrafo 2">
                            </div>
                            <!-- TERMINA PARRAFO 2 -->

                            <!-- CAMPO PARRAFO 3 -->
                            <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                <input type="text" name="Editarp3" id="Editarp3"
                                    class="form-control form-control-user" placeholder="Párrafo 3">
                            </div>
                            <!-- TERMINA PARRAFO 3 -->

                            <!-- CAMPO PARRAFO 4 -->
                            <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                <input type="text" name="Editarp4" id="Editarp4"
                                    class="form-control form-control-user" placeholder="Párrafo 4">
                            </div>
                            <!-- TERMINA PARRAFO 4 -->

                            <!-- CAMPO PARRAFO 5 -->
                            <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                <input type="text" name="Editarp5" id="Editarp5"
                                    class="form-control form-control-user" placeholder="Párrafo 5">
                            </div>
                            <!-- TERMINA PARRAFO 5 -->

                            <!-- CAMPO PARRAFO 6 -->
                            <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                <input type="text" name="Editarp6" id="Editarp6"
                                    class="form-control form-control-user" placeholder="Párrafo 6">
                            </div>
                            <!-- TERMINA PARRAFO 6 -->

                            <!-- CAMPO AUTOR -->
                            <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                <input type="text" name="Editarautor" id="Editarautor"
                                    class="form-control form-control-user" placeholder="Nombre del autor">
                            </div>
                            <!-- TERMINA AUTOR -->

                            <!-- CAMPO FECHA -->
                            <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                <input type="date" name="Editarfecha" id="Editarfecha"
                                    class="form-control form-control-user" placeholder="Fecha de la noticia">
                            </div>
                            <!-- TERMINA FECHA -->

                            <!-- CAMPO IMAGEN PORTADA -->
                            <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                <input type="file" name="EditarimagenPortada"
                                    class="form-control form-control-user portada" placeholder="Imagen de portada">
                                <p>Peso maximo del logo 2MB</p>
                                <img src="vistas/img/logo/us.png" width="100px" class="img-thumbnail previsualizarPortada">
                                <input type="text" name="portadaActual" id="portadaActual">
                            </div>
                            <!-- TERMINA CAMPO IMAGEN PORTADA -->

                            <!-- CAMPO IMAGEN HORIZONTAL -->
                            <div class="col-sm-6 mb-3 mb-sm-0 py-2">
                                <input type="file" name="EditarimagenHorizontal"
                                    class="form-control form-control-user horizontal" placeholder="Imagen horizontal">
                                <p>Peso maximo del logo 2MB</p>
                                <img src="vistas/img/logo/us.png" width="100px" class="img-thumbnail previsualizarHorizontal">
                                <input type="text" name="horizontalActual" id="horizontalActual">
                            </div>
                            <!-- TERMINA CAMPO IMAGEN HORIZONTAL -->

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
                $crearNoticia = new ControladorNoticia();
                $crearNoticia->ctrEditarNoticia();
                ?>
            </div>
        </div>
    </div>


    <?php
    $eliminarNoticia = new ControladorNoticia();
    $eliminarNoticia->ctrBorrarNoticia();
    ?>