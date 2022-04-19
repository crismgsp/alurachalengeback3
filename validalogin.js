const init = () => {
    
    const validaEmail = (evento) => {
        const input = evento.currentTarget;
        const emailvalido = 'lojista@teste.com'; /*mexer nesta logica aqui pra algo do banco de dados ..talvez renomear o arquivo pra php e adaptar a logica*/
        
        if(input.value != emailvalido) {
            submitButton.setAttribute('disabled', 'disabled');
        }
        else {
            submitButton.removeAttribute('disabled');
        }
    }

    const validaSenha = (evento) => {
        const input = evento.currentTarget;
        const senhavalida = '12345678'
        
        if(input.value != senhavalida) {
            submitButton.setAttribute('disabled', 'disabled');
        }
        else {
            submitButton.removeAttribute('disabled', 'disabled');
        }
    }
    
    const inputEmail = document.querySelector('[data-email]')
    const inputSenha = document.querySelector('[data-senha]')
    const submitButton = document.querySelector('[data-entrar]')

    inputEmail.addEventListener('input', validaEmail);

    inputSenha.addEventListener('input', validaSenha);

    if (submitButton) {
        submitButton.addEventListener('click', (evento) => {
           evento.preventDefault();
                   
           window.location.href = 'importacoes.php'   /*além de encaminhar pra esta página colocar na opção de importação a verificação se ta logado */
   
        })

    }
    

}    

window.onload = init;