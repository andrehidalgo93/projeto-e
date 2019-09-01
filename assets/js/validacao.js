$("#form1").validate({
    rules: {
        nome: {
        required: true,
        minlength: 2
        }, 
        cep: {
            required: true
        },
        rua: {
            required: true
        },
        numero: {
            required: true
        },
        bairro: {
            required: true
        },
        cidade: {
            required: true
        },
        uf: {
            required: true,
            maxlength: 2
        },
        email: {
            required: true,
            email: true
        },
        cnpj: {
            required: true,
            cnpjBR: true
        },
        cpf: {
            required: true,
            cpfBR: true
        },
        rg: {
            required: true
        },
        telefone: {
            required: true,
            minlength: 14
        },
        celular: {
            required: true,
            minlength: 14
        },
        inscricao_estadual: {
            required: true,
            minlength: 12
        }
    }
});