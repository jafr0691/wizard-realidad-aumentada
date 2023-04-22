$(document).ready(function(){

  jQuery.validator.addMethod("text_only", function(value, element) {
  return this.optional(element) || /^[a-zñÑáéíóúÁÉÍÓÚ ]*$/i.test(value);
}, "Letters only please.")

//[A-Za-z]{3}[0-9]{4}
  jQuery.validator.addMethod("license_plate", function(value, element) {
    return this.optional(element) || /^[A-Za-z0-9-]*$/i.test(value);
  }, "Ingrese una placa válida")

  // Older "accept" file extension method. Old docs: http://docs.jquery.com/Plugins/Validation/Methods/accept
  $.validator.addMethod( "extension", function( value, element, param ) {
    param = typeof param === "string" ? param.replace( /,/g, "|" ) : "png|jpe?g|gif";
    return this.optional( element ) || value.match( new RegExp( "\\.(" + param + ")$", "i" ) );
  }, $.validator.format( "Please enter a value with a valid extension." ) );

  $('#login').validate({
  rules:{
    username: {
      required: true
    },
    password: {
      required: true
    }
  },
  messages: {
    username: {
      required: 'Este campo es requerido'
    },
    password: {
      required: 'Este campo es requerido'
    }
  }
})

$('#register').validate({
  rules:{
    name: {
      required: true,
      text_only: true
    },
    lastName: {
      required: true,
      text_only: true
    },
    username: {
      required: true
    },
    email: {
      required: true,
      email: true
    },
    password: {
      required: true
    },
    repassword: {
      equalTo: '#password'
    }
  },
  messages: {
    name: {
      required: 'Este campo es requerido',
      text_only: 'Este campo es invalido'
    },
    lastName: {
      required: 'Este campo es requerido',
      text_only: 'Este campo es invalido'
    },
    username: {
      required: 'Este campo es requerido'
    },
    email: {
      required: 'Este campo es requerido',
      email: 'Ingrese un email valido'
    },
    password: {
      required: 'Este campo es requerido'
    },
    repassword: {
      equalTo: 'Este campo debe ser igual a la contraseña'
    }
  }
})

$('#comment').validate({
  rules:{
    comment: {
      required: true
    },
    author: {
      required: true,
    },
    email: {
      required: true,
      email: true
    }
  },
  messages: {
    comment: {
      required: 'Este campo es requerido'
    },
    author: {
      required: 'Este campo es requerido',
    },
    email: {
      required: 'Este campo es requerido',
      email: 'Ingrese un email valido'
    }
  }
})

  $('#postImg').submit(function(e) {
    var image = $('#file').val();

    if (image == null || image == "" ) {
      alert("Seleccione una fotografía")
      return false;
    }
  });

$('#postImg').validate({
  rules:{
    file:{
      required: true,
      extension: "jpg|jpeg",
    },
    img: {
      required: true,
    },
    licensePlate: {
      required: true,
      maxlength: 9,
      license_plate: true
    },
    author: {
      required: true,
      text_only: true
    },
    estado: {
      required: true,
      number: true
    },
    ciudad: {
      required: true,
      number: true
    },
    businessText: {
      required: function(element) {
        return $("#businessSelect").val() == 1 || $("#businessSelect").val() == null;
      }
    },

    carroceriaText: {
      required: function(element) {
        return $("#carroceriaSelect").val() == 1 || $("#carroceriaSelect").val() == null;
      }
    },
    chasisSelect: {
      required: true,
    },
    chasisText: {
      required: function(element) {
        return $("#chasisSelect").val() == 1 || $("#chasisSelect").val() == null;
      }
    }
  },
  messages: {
    file:{
      required: "Este campo es requerido",
      extension: "Solo se permiten archivos de tipo jpg y jpeg",
    },
    img: {
      required: 'Este campo es requerido',
    },
    licensePlate: {
      required: 'Este campo es requerido',
      maxlength: 'Debe tener un maximo de 7 caracteres'
    },
    author: {
      required: 'Este campo es requerido',
      text_only: 'Este campo es invalido'
    },
    estado: {
      required: 'Este campo es requerido',
      number: 'Debe seleccionar una ciudad'
    },
    ciudad: {
      required: 'Este campo es requerido',
      number: 'Debe seleccionar un estado'
    },
    businessText: {
      required: 'Este campo es requerido',
    },

    carroceriaText: {
      required: 'Este campo es requerido'
    },

    chasisText: {
      required: 'Este campo es requerido'
    }
  }
})
})
