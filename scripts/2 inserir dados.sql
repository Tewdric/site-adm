    INSERT INTO usuarios (nome, email, telefone, data_nascimento, cpf)
    VALUES 
    ('João Silva', 'joao.silva@email.com', '123456789', '1990-04-15', '123.456.789-00'),
    ('Maria Oliveira', 'maria.oliveira@email.com', '987654321', '1985-08-22', '987.654.321-00'),
    ('Carlos Souza', 'carlos.souza@email.com', '555123456', '1992-12-03', '555.555.555-55');


    INSERT INTO categorias (categoria)
    VALUES 
    ('Tecnologia'),
    ('Saúde'),
    ('Educação');


    INSERT INTO artigos (texto, id_categoria, id_autor)
    VALUES 
    ('Este é um artigo sobre as últimas tendências em tecnologia, incluindo IA, aprendizado de máquina e computação em nuvem.', 1, 1),
    ('Artigo sobre hábitos saudáveis e como manter o corpo e a mente em equilíbrio.', 2, 2),
    ('A importância da educação a distância nos dias de hoje e como ela pode transformar a vida de muitos estudantes.', 3, 3);
