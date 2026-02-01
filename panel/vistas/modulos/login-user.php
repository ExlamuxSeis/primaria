<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg my-5">
                <div class="card-header text-center bg-primary text-white">
                    <h4>Iniciar Sesión</h4>
                </div>
                <div class="card-body">
                    <form method="post" class="needs-validation" novalidate>
                        <!-- Imagen de perfil -->
                        <div class="text-center mb-4">
                            <img src="vistas/img/login.png"
                                class="img-fluid profile-image-pic img-thumbnail rounded-circle"
                                alt="profile" width="150">
                        </div>

                        <!-- Campo de Usuario -->
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Nombre de Usuario</label>
                            <input type="text"
                                class="form-control"
                                id="usuario"
                                name="usuario"
                                placeholder="Ingrese su usuario"
                                required>
                            <div class="invalid-feedback">
                                Debe ingresar un usuario válido.
                            </div>
                        </div>

                        <!-- Campo de Contraseña -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password"
                                class="form-control"
                                id="password"
                                name="password"
                                placeholder="Ingrese su contraseña"
                                required>
                            <div class="invalid-feedback">
                                Debe ingresar una contraseña.
                            </div>
                        </div>

                        <!-- Botón de Enviar -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-100">
                                Iniciar Sesión
                            </button>
                        </div>
                        <?php
                        $login = new ControladorLogin();
                        $login->ctrIngresarUsuario();
                        ?>
                    </form>
                </div>
                <!-- Footer del formulario -->
                <div class="card-footer text-center">
                    <a href="../" class="btn btn-success">
                        Regresar al inicio
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
