<div class="container ">
        <div class="row d-flex  justify-content-center mt-4">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Autenticación</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="controller/login/autenticar.php" method ="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Usuario" name="usuario" type="text" autofocus required >
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block"> Enviar</button>
                          
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>