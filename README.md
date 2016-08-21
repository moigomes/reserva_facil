
Sistema desenvolvido utilizando o Framework CodeIgniter e bootstrap 3.

O sistema possui dois níveis de acesso:

Admin:
Acesso total (cadastro e exclusão de reservas;
cadastro, edição e exclusão de salas;
cadastro e edição de usuários);

Usuário: Acesso limitado(cadastro e exclusão de reservas; alteração de 
senha )

De acordo com o nível de acesso do usuário logado, o sistema irá mostrar ou ocultar opções no menu.

Na tela de login o usuário também pode usar a opção de recuperar senha, a mesma será enviada para o e-mail solicitado(o usuário já tem que estar cadastrado no sistema ).


TELAS:(Reservas)

MINHAS RESERVAS: Mostra todas as reservas cadastras pelo usuário logado.


TODAS RESERVAS: Mostra todas as reservas cadastras por todos usuários. 

CADASTRO DE RESERVAS: Tela para o preenchimento dos dados para o cadastro da reserva. 
Depois de selecionado a sala e a data, é utilizado Ajax para atualizar o campo de horários disponíveis.
Também é verificado se o usuário já não reservou outra sala no mesmo horário e data selecionado.

-----------------------------------------------------------------------------------------------

A configuração do BANCO DE DADOS é feita no arquivo application\config\database.php
OBS: está configurado como reserva_facil

------------------------------------------------------------------------------------------------
PARA ACESSAR O SISTEMA:

Admin:
email: admin@admin.com
senha: admin

Usuário:
email: usuario@usuario.com
senha: usuario
----------------------------------------------------------------------------------------------------
https://github.com/moigomes/reserva_facil

Qualquer dúvida, estou a disposição...

Abraço



 

  

Em 5 de agosto de 2016 09:55, Cícero Augusto <cicero@ditech.com.br> escreveu:
Olá Moisés! 

Ficamos felizes com seu interesse em participar deste processo! Obrigado! :)
Conforme combinamos, seguem abaixo as instruções desta etapa: 
Você deverá desenvolver um sistema em PHP que resolva o problema descrito no PDF em anexo;
O sistema deverá ser versionado no gitlab.com ou github.com;
Seu prazo é até o dia 07/08, às 23h59;
Após realizar o desafio, você deverá encaminhar por e-mail o link para acessarmos seu projeto. 
Pedimos que você confirme o recebimento deste e-mail, dizendo também se está de acordo com as instruções deste desafio. Se tiver alguma dúvida ou dificuldade, fique à vontade para entrar em contato. 
Boa sorte!

-- 
Cícero Augusto de Melo
Administrativo
Ditech Studio Web Ltda.
Tel.: +55 51 3021-2215
Skype: cicero.ditech
www.ditech.com.br

