/* MODIFICAR ARCHIVO */
$(document).ready(function () {
    $('#eje1').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'far fa-check-circle',
            invalid: 'fas fa-exclamation-circle',
            validating: 'fas fa-check-circle'
        },
        fields: {
            nombre: {
                validators: {
                    notEmpty: {
                        message: 'Se requiere el nombre de archivo.'
                    }
                }
            },
            op: {
                validators: {
                    notEmpty: {
                        message: 'Debe seleccionar el tipo de usuario.'
                    }
                }
            },
            pass: {
                validators: {
                    notEmpty: {
                        message: 'Debe ingresar una contraseña.'
                    }
                }
            }
        },
    });
});
/* COMPARTIR ARCHIVO */
$(document).ready(function () {
    $('#eje2').bootstrapValidator({
        message: 'Este valor no es valido',
        feedbackIcons: {
            valid: 'far fa-check-circle',
            invalid: 'fas fa-exclamation-circle',
            validating: 'fas fa-check-circle'
        },
        fields: {
            customFileLang: {
                validators: {
                    notEmpty: {
                        message: 'Se requiere seleccionar un archivo.'
                    }
                }
            },
            nombre: {
                validators: {
                    notEmpty: {
                        message: 'Se requiere el nombre de archivo.'
                    }
                }
            },
            op: {
                validators: {
                    notEmpty: {
                        message: 'Debe seleccionar el tipo de usuario.'
                    }
                }
            },
            pass: {
                validators: {
                    notEmpty: {
                        message: 'Debe ingresar una contraseña.'
                    }
                }
            }
        },
    });
});
