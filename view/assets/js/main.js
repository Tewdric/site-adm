console.log('js foi carregado');


// Marca o menu ativo
document
	.querySelector('#nav-items')
	.querySelectorAll('.nav-link')
    .forEach((navLink) => {
        const uriAtual = window.location.pathname
        if (navLink.href.includes(uriAtual)) {
            navLink.classList.add('active')
        }
    })

const mobileMenu = document.querySelector('#menu-mobile')
const sidebar = document.querySelector('#sidebar')
mobileMenu.addEventListener('click', () => {
    sidebar.classList.toggle('open')
})


const link_editar = document.querySelector('.editar')

link_editar.addEventListener('click', () => {
    
})

function editar(nome, email, texto) {
    const valor = document.querySelector('.editar').getAttribute('value')
    const dialog = document.createElement('dialog')
    const btnClose = document.createElement('button')
    btnClose.classList.add('close')

   
    switch (valor) {
        case 'usuario':
            dialog.innerHTML = `<form method="dialog">
                                    <label for="nome">Nome:</label>
                                    <input type="text" name="nome" value="${nome}">
                                    <label for="email">Email:</label>
                                    <input type="text" name="email" value="${email}">
                                    <button type="submit">Salvar</button>
                                </form>`
            document.body.appendChild(dialog)
        
            dialog.showModal()

            btnClose.textContent = 'X'
          
            btnClose.addEventListener('click', () => {
                dialog.close()
            })
            dialog.appendChild(btnClose)
            
            break;
        case 'categoria':
           
            dialog.innerHTML = `<form method="dialog">
                                    <label for="id">Id:</label>
                                    <input type="text" name="id" value="${nome}">
                                    <label for="categoria">Categoria:</label>
                                    <input type="text" name="categoria" value="${email}">
                                    <button type="submit">Salvar</button>
                                </form>`
            document.body.appendChild(dialog)
        
            dialog.showModal()
            btnClose.textContent = 'X'
            btnClose.addEventListener('click', () => {
                dialog.close()
            })
            dialog.appendChild(btnClose)
            
            break;
        case 'artigo':
            dialog.innerHTML = `<form method="dialog">
            <label for="texto">Texto:</label>
            <input type="text" name="Texto" value="${nome}">
            <label for="categoria">Categoria:</label>
            <input type="text" name="categoria" value="${email}">
            <label for="autor">Autor:</label>
            <input type="text" name="texto" value="${texto}">
            <button type="submit">Salvar</button>
        </form>`
            document.body.appendChild(dialog)

            dialog.showModal()
            btnClose.textContent = 'X'
            btnClose.addEventListener('click', () => {
                dialog.close()
            })
            dialog.appendChild(btnClose)
            
            break;
    }
}