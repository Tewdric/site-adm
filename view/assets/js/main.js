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


function criarUsuario(){
    const dialog = document.createElement('dialog')
    const btnClose = document.createElement('button')
    btnClose.classList.add('close')

      
    dialog.innerHTML = `<form method="POST" action="../../router/cadastroRouter.php?acao=create">
                                   
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="">
        <label for="email">Email:</label>
        <input type="text" name="email" value="">
        <button type="submit">Salvar</button>
    </form>`
    document.body.appendChild(dialog)

    dialog.showModal()

    btnClose.textContent = 'X'

    btnClose.addEventListener('click', () => {
    dialog.close()
    })
    dialog.appendChild(btnClose)

}


function criarCategoria(){
    const dialog = document.createElement('dialog')
    const btnClose = document.createElement('button')
    btnClose.classList.add('close')

      
    dialog.innerHTML = `<form method="POST" action="../../router/categoriaRouter.php?acao=create">
                                   
        <label for="nome">Categoria:</label>
        <input type="text" name="categoria" value="">
        <button type="submit">Salvar</button>
    </form>`
    document.body.appendChild(dialog)

    dialog.showModal()

    btnClose.textContent = 'X'

    btnClose.addEventListener('click', () => {
    dialog.close()
    })
    dialog.appendChild(btnClose)

}

function editarUsuario(id, nome, email) {
    const valor = document.querySelector('.editar').getAttribute('value')
    const dialog = document.createElement('dialog')
    const btnClose = document.createElement('button')
    btnClose.classList.add('close')

   
    switch (valor) {
        case 'usuario':
            dialog.innerHTML = `<form method="POST" action="../../router/cadastroRouter.php?acao=update">
                                   
                                    <label for="id">ID:</label>
                                    <input type="text" name="id" value="${id}">
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
        
    }
}

function editarCategoria(id, nome ) {
    const valor = document.querySelector('.editar').getAttribute('value')
    const dialog = document.createElement('dialog')
    const btnClose = document.createElement('button')
    btnClose.classList.add('close')

   
    switch (valor) {
        case 'categoria':
            dialog.innerHTML = `<form method="POST" action="../../router/categoriaRouter.php?acao=update">
                                    <label for="id">Id:</label>
                                    <input type="text" name="id" value="${id}">
                                    <label for="categoria">Categoria:</label>
                                    <input type="text" name="categoria" value="${nome}">
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

async function editarArtigo(id, texto, categoriaId, autorId) {
    const valor = document.querySelector('.editar').getAttribute('value');
    const dialog = document.createElement('dialog');
    const btnClose = document.createElement('button');
    btnClose.classList.add('close');

    switch (valor) {
        case 'artigo':
            // Buscar categorias e autores via API
            let response = await fetch("../../router/get_categorias_autores.php");
            let data = await response.json();

            console.log(data)

          

            let autoresOptions = data.autores.map(autor => `
                <option value="${autor.id}" ${autor.id == autorId ? "selected" : ""}>
                    ${autor.nome}
                </option>
            `).join("");
            let categoriasOptions = data.categorias.map(categoria => `
                <option value="${categoria.id}" ${categoria.id == categoriaId ? "selected" : ""}>
                    ${categoria.categoria}
                </option>
            `).join("");

            dialog.innerHTML = `
                <form method="POST" action="../../router/artigoRouter.php?acao=update">
                    <label for="id">Id:</label>
                    <input type="block" name="id" value="${id}" readonly>

                    <label for="texto">Texto:</label>
                    
                    <textarea>
                    "${texto}"
                    </textarea>

                    <label for="categoria">Categoria:</label>
                    <select name="categoria">${categoriasOptions}</select>

                    <label for="autor">Autor:</label>
                    <select name="autor">${autoresOptions}</select>

                    <button type="submit">Salvar</button>
                </form>
            `;

            document.body.appendChild(dialog);

            dialog.showModal();
            btnClose.textContent = 'X';
            btnClose.addEventListener('click', () => {
                dialog.close();
            });

            dialog.appendChild(btnClose);
            break;
    }

}



async function cadastrarArtigo(categoriaId, autorId) {
    const valor = document.querySelector('.editar').getAttribute('value');
    const dialog = document.createElement('dialog');
    const btnClose = document.createElement('button');
    btnClose.classList.add('close');

    switch (valor) {
        case 'artigo':
            // Buscar categorias e autores via API
            let response = await fetch("../../router/get_categorias_autores.php");
            let data = await response.json();
          

            let autoresOptions = data.autores.map(autor => `
                <option value="${autor.id}" ${autor.id == autorId ? "selected" : ""}>
                    ${autor.nome}
                </option>
            `).join("");
            let categoriasOptions = data.categorias.map(categoria => `
                <option value="${categoria.id}" ${categoria.id == categoriaId ? "selected" : ""}>
                    ${categoria.categoria}
                </option>
            `).join("");

            dialog.innerHTML = `
                <form method="POST" action="../../router/artigoRouter.php?acao=create">

                    <label for="texto">Texto:</label>
                    <input type="text" name="texto" value="" placeholder="Digite seu texto!">

                    <label for="categoria">Categoria:</label>
                    <select name="categoria">${categoriasOptions}</select>

                    <label for="autor">Autor:</label>
                    <select name="autor">${autoresOptions}</select>

                    <button type="submit">Salvar</button>
                </form>
            `;

            document.body.appendChild(dialog);

            dialog.showModal();
            btnClose.textContent = 'X';
            btnClose.addEventListener('click', () => {
                dialog.close();
            });

            dialog.appendChild(btnClose);
            break;
    }

}


