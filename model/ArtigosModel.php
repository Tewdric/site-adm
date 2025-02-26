<?php

class ArtigosModel {

    public static $artigo = [

        [
            'id' => 1,
            'texto'=>'O desenvolvimento web é a área da tecnologia responsável pela criação de sites, aplicativos e sistemas acessíveis por meio da internet. Esse processo envolve diversas tecnologias e linguagens de programação, que permitem desde a construção de páginas estáticas até aplicações complexas e interativas.',
            'id_categoria' => 1,
            'id_autor'=> 1
 
        ],
        [
            'id' => 2,
            'texto' => 'O desenvolvimento mobile é a área da tecnologia responsável pela criação de aplicativos para dispositivos móveis, como smartphones e tablets. Com o crescimento do uso desses dispositivos, os aplicativos se tornaram essenciais para empresas e usuários, oferecendo soluções rápidas e acessíveis para diversas necessidades.',
            'id_categoria' => 2,
            'id_autor'=> 2
        ],
        [
            'id' => 3,
            'texto' => 'O desenvolvimento backend é a parte do desenvolvimento de software responsável pelo funcionamento interno de um sistema. Ele lida com a lógica da aplicação, processamento de dados, integração com bancos de dados e comunicação entre o frontend e o servidor.

            Diferente do frontend, que é a interface visível para os usuários, o backend opera nos bastidores, garantindo que as informações sejam processadas corretamente e que o sistema funcione de forma segura e eficiente.',
            'id_categoria' => 3,
            'id_autor'=> 3
        ],

        [
            'id' => 4,
            'texto'=>'O desenvolvimento frontend é a parte da programação responsável pela interface visual de um site ou aplicativo. Ele define como os usuários interagem com o sistema, garantindo uma experiência fluida e intuitiva. O frontend é desenvolvido utilizando tecnologias que rodam diretamente no navegador ou no dispositivo do usuário.',
            'id_categoria' => 4,
            'id_autor'=> 4
        ],
        [
            'id' => 5,
            'texto'=>'O desenvolvimento full-stack combina as habilidades de um desenvolvedor frontend e backend, permitindo que ele construa um sistema completo, desde a interface do usuário até a lógica do servidor e banco de dados.',
            'id_categoria' => 5,
            'id_autor'=> 5
        ]
    ];
}