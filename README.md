Reserva Fácil
Sistema de fila virtual para uso de salas de reuniões


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



 

  



