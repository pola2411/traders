<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Perfil de: <span id="nombreTitle"></span> <span id="apellidoPatTitle"></span> <span id="apellidoMatTitle"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="PerfilForm" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="idInput" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="current_foto" id="currentPictureInput">
                    <div class="row">
                        <div class="col-12">
                            <div class="file-upload mb-3">
                                <label for="pictureInput">Foto de perfil</label>
                                <div class="image-upload-wrap">
                                    <input id="pictureInput" class="file-upload-input" type='file' name="foto"
                                        onchange="readURL(this);" accept="image/*" />
                                    <div class="drag-text">
                                        <h3>Arrastra una imagen o haz clic aquí</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="Imagen subida" />
                                    <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="remove-image">Eliminar <span
                                                class="image-title">Imagen seleccionada</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">                        
                        <div class="col-md-6 col-12">
                            <div class="form-floating mb-3">
                                <input type="text" title="Campo obligatorio / Solo letras" minlength="3" maxlength="30" pattern="[a-zA-Zá-úÁ-Ú ]+" class="form-control" placeholder="Ingresa el nombre" id="nombreInput" name="nombre" value="{{ auth()->user()->nombre }}" required>
                                <label for="floatingInput">Nombre completo</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-floating mb-3">
                                <input type="email" title="Campo obligatorio / example@uptrading.com" minlength="3" maxlength="70" class="form-control" placeholder="Ingresa el correo" id="correoiInput" name="correo" value="{{ auth()->user()->correo }}" readonly required>
                                <label for="floatingInput">Email</label>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-start">
                        <div class="col-md-6 col-12">
                            <div class="form-check form-switch mb-3 d-flex justify-content-start">
                                <input class="form-check-input" type="checkbox" role="switch" name="switch-pass" id="passInputCheck">
                                <label class="form-check-label ms-1" for="passInputCheck">Cambiar contraseña</label>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12 d-none" id="colPassOld">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control"
                                    placeholder="Ingresa tú antigua contraseña" id="passOldInput"
                                    name="pass-old">
                                <label for="passOldInput">Ingresa tu contraseña anterior</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 d-none" id="colPassNew">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control"
                                    placeholder="Ingresa tu nueva contraseña" id="passNewInput"
                                    name="pass-new" >
                                <label for="passNewInput">Ingresa tu nueva contraseña</label>
                            </div>
                        </div>
                    </div>
                    <div style="display:block !important" id="alertMessage" class="invalid-feedback"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="btnCancel" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn principal-button" id="btnSubmit">Actualizar perfil</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>