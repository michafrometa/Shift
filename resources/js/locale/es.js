import VeeValidate from "vee-validate";

const messages = {
    _default: (field) => `El campo ${field} no es válido.`,
    after: (field, [target, inclusion]) => `El campo ${field} debe ser posterior ${inclusion ? 'o igual ' : ''}a ${target}.`,
    alpha: (field) => `El campo ${field} solo debe contener letras.`,
    alpha_dash: (field) => `El campo ${field} solo debe contener letras, números y guiones.`,
    alpha_num: (field) => `El campo ${field} solo debe contener letras y números.`,
    alpha_spaces: (field) => `El campo ${field} solo debe contener letras y espacios.`,
    before: (field, [target, inclusion]) => `El campo ${field} debe ser anterior ${inclusion ? 'o igual ' : ''}a ${target}.`,
    between: (field, [min, max]) => `El campo ${field} debe estar entre ${min} y ${max}.`,
    confirmed: (field) => `El campo ${field} no coincide.`,
    credit_card: (field) => `El campo ${field} es inválido.`,
    date_between: (field, [min, max]) => `El campo ${field} debe estar entre ${min} y ${max}.`,
    date_format: (field, [format]) => `El campo ${field} debe tener formato formato ${format}.`,
    decimal: (field, [decimals = '*'] = []) => `El campo ${field} debe ser numérico y contener ${decimals === '*' ? '' : decimals} puntos decimales.`,
    digits: (field, [length]) => `El campo ${field} debe ser numérico y contener exactamente ${length} dígitos.`,
    dimensions: (field, [width, height]) => `El campo ${field} debe ser de ${width} píxeles por ${height} píxeles.`,
    email: (field) => `El campo ${field} debe ser un correo electrónico válido.`,
    excluded: (field) => `El campo ${field} debe ser un valor válido.`,
    ext: (field) => `El campo ${field} debe ser un archivo válido.`,
    image: (field) => `El campo ${field} debe ser una imagen.`,
    included: (field) => `El campo ${field} debe ser un valor válido.`,
    integer: (field) => `El campo ${field} debe ser un entero.`,
    ip: (field) => `El campo ${field} debe ser una dirección ip válida.`,
    length: (field, [length, max]) => {
        if (max) {
            return `El largo del campo ${field} debe estar entre ${length} y ${max}.`;
        }

        return `El largo del campo ${field} debe ser ${length}.`;
    },
    max: (field, [length]) => `El campo ${field} no debe ser mayor a ${length} caracteres.`,
    max_value: (field, [max]) => `El campo ${field} debe de ser ${max} o menor.`,
    mimes: (field) => `El campo ${field} debe ser un tipo de archivo válido.`,
    min: (field, [length]) => `El campo ${field} debe tener al menos ${length} caracteres.`,
    min_value: (field, [min]) => `El campo ${field} debe ser ${min} o superior.`,
    numeric: (field) => `El campo ${field} debe contener solo caracteres numéricos.`,
    regex: (field) => `El formato del campo ${field} no es válido.`,
    required: (field) => `El campo ${field} es obligatorio.`,
    size: (field, [size]) => `El campo ${field} debe ser menor a.`,
    url: (field) => `El campo ${field} no es una URL válida.`
};

const locale = {
    name: 'es',
    messages,
    attributes: {
        name: 'nombre',
        username: 'usuario',
        email: 'correo electrónico',
        first_name: 'nombre',
        last_name: 'apellido',
        password: 'contraseña',
        password_confirmation: 'confirmación de la contraseña',
        city: 'ciudad',
        country: 'país',
        address: 'dirección',
        phone: 'teléfono',
        mobile: 'móvil',
        age: 'edad',
        sex: 'sexo',
        gender: 'género',
        year: 'año',
        month: 'mes',
        day: 'día',
        days: 'días',
        hour: 'hora',
        minute: 'minuto',
        second: 'segundo',
        title: 'título',
        content: 'contenido',
        body: 'contenido',
        description: 'descripción',
        excerpt: 'extracto',
        date: 'fecha',
        time: 'hora',
        subject: 'asunto',
        message: 'mensaje',
        shortname: 'abreviatura',
        ministry_id: 'organismo',
        entity_id: 'entidad',
        code: 'código',
        gender_id: 'género',
        country_id: 'país',
        area_id: 'area',
        responsability_id: 'cargo',
        fullname: 'nombre completo',
        phones: 'teléfono',
        person_id: 'persona',
        ministry_value: 'organismo',
        entity_value: 'entidad',
        passwordNewConfirmation: 'confirmación de contraseña',
        passwordNew: 'contraseña',
        passwordNewConfirmation2: 'confirmación de contraseña',
        role_id: 'rol',
        passwordActual: 'contraseña actual',
        receiver_id: 'destinatario',
        documentclassification_id: 'clasificación',
        service_order: 'orden de servicio',
        patient: 'paciente',
        doctor: 'doctor',
        post_collection: 'captura posterior',
        agreement: 'acuerdo',
        exam: 'examen',
        sector: 'sector',
        biologic_material: 'material biológico',
        neighborhood: 'vecindario',
        specialty: 'especialidad',
        federated_unit: 'unidad federativa'
    }
};

VeeValidate.Validator.localize('es', locale);

export default locale;