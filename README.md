<h1 align="center"><strong>Chalenge Backend 3 da Alura.</strong></h1>

(Resumo) O objetivo deste chalenge foi criar um sistema com as seguintes opções: parte dos usuários: login e logout de usuarios, um lugar no sistema pra cadastrar, editar e excluir os usuários de forma lógica (sem excluir de verdade, apenas deixar inativo, não pode fazer login). Parte das transações financeiras: No sistema tem que ter um local para fazer upload de arquivos no formato csv (e xml tambem), este arquivo ao passar pelas validações irá ser cadastrado no banco de dados criado para o projeto. Também há uma tela onde é possível ver as importações feitas e um botão em cada linha que direciona para uma tela que detalha cada importação. Há um lugar especifico onde é possível ver as transacoes suspeitas ocorridas no mês escolhido.


Opnião pessoal: Comecei o chalenge com uma noção de PHP e já tinha tido algum contato com banco de dados(em outra área que eu trabalhava, mas com consultas simples). A minha intenção em participar do Chalenge foi aprender mais (e colocar o php que já  aprendi até o momento em prática), e ter um contato com a área de backend e ver as dificuldades. Foi um grande desafio e terminei com algumas pendencias, e pretendo criar um novo repositório com esta aplicaçao melhorada, pretendo avançar no php e aprender a usar um framework e arrumar alguns detalhes da visualização. Se quiser acessar a minha aplicação o link está abaixo: utilize o seguintes usuário e senha:
admin@email.com.br    senha: 123999   (abaixo relato um probleminha que ocorreu ao hospedar o site que ainda não resolvi)


<p align="center"><strong>Link de acesso a esta pagina:</strong></p>
https://analisesdetransacoes.crismgsp.com/ <br>

OBS: Na parte dos usuarios em meu computador está funcionando tudo (usando xampp, apache, mariadb)...criar, editar...excluir com lógica  mas nesta pagina acima a parte de usuarios esta funcionando parcialmente,  pra incluir está ok, pra  excluir (que deste jeito que foi pedido é uma forma de editar tambem e está ok), mas não sei por qual motivo pra editar não está funcionando no site (mesmo estando com versoes diferentes de servidor...a função pra editar e pra excluir neste exemplo é bem parecida, e só uma delas está funcionando normalmente no site... )<br>

se quiser ver a parte de usuário funcionando no meu computador clique neste vídeo:

<p><iframe src='/assets/imagens/Partedosusuariosmeucomputador.WEBM' alt="video da parte dos usuarios"/> Video </iframe></p>

<p align="center"><strong>O que tem neste projeto até este momento (de forma mais detalhada que no resumo):</strong></p>

<strong>Banco de dados:</strong> Um banco de dados com 2 tabelas, uma pra armazenar as informações dos usuários e outra pra armazenar as informações das importações<br>

<strong>Tela inicial:</strong> onde o usuario acessa a pagina de  login para acessar outras telas<br>

<strong>Tela de login:</strong> Usuario digita login e senha, e os dados sao checados no banco de dados, se tiver tudo ok,e o status do usuario for 1, o login é efetuado, a parte de logou está pronta. <br>

<strong>Tela de importacões:</strong>Ao fazer o login o usuario e direcionado para uma tela onde pode importar transacoes, por enquanto somente no formato csv, tem as seguintes validações antes de importar o arquivo no moemnto: faz uma checagem se o arquivo
está no formato csv e se ainda não existe a data da primeira linha do arquivo do upload no banco de dados . Ao importar estas tabelas elas vao para o banco de dados, onde também sao inseridos (além dos dados do arquivo importado) o horario e a data  de importação e o usuario logado em colunas especificas.<br>
Nesta mesma tela a pessoa pode acessar outras 2 telas, uma chama importacoesfeitas e outra chamada cadastrar usuarios.<br>

<strong>Tela de importacões feitas:</strong> Nesta tela da para ver as datas das transacoes e a data de importacao das importacoes que ja foram feitas, e na frente de cada tem um link, que quando o usuario clica, puxa os dados do banco de dados e mostra todas as colunas daquela transacao especifica, elas ficam na tela de transacoes detalhadas<br>

<strong>Tela de transações suspeitas:</strong> Nesta tela aparecem as transacoes suspeitas, na tela de cima a pessoa escolhe um mes (preciso melhorar o jeito da pessoa selecionar o mes) caso seja feita uma transação com valor maior do que 100.000 aparece na tela do mes da transacao, caso uma conta bancaria tenha feito no mes todo transacoes (tanto de entrada como de saida) no valor total maior que 1000000 aparece na tabela abaixo, e caso a soma total de transacoes de uma agencia seja maior que 1 bilhao no mes aparece na terceira tabela desta pagina.<br>

<strong>Cadastrar usuarios</strong> Nesta tela, tem um formulario, em que é possivel para o usuario logado, cadastrar outro usuario, digitando, nome, email, status e senha. Esta senha fica criptografada no banco de dados. Nesta página tambem tem um botão onde é possível acessar os usuários já cadastrados: tela usuarios cadastrados.<br>

<strong>Usuarios cadastrados</strong> Nesta tela aparecem todos os usuarios cadastrados, e há na frente de cada nome os botoes editar e excluir que levam para outras telas, no caso do editar é possivel editar nome, email e senha do usuario, e no caso do botao excluir é possivel mudar o status, se mudar de 1 para 2 o login fica inacessivel  para o usuario, pois foi pedido para nao excluir totalmente para nao gerar problemas caso o usuario tenha postado tabelas, o nome dele ser puxado do banco de dados normalmente, mesmo apos o acesso ficar inacessivel. O usuário não pode se excluir e nenhum usuário pode excluir o admin.
<br>

<p align="center"><strong>Ainda preciso aprender para este projeto:</strong></p>

<p><strong>Semana 1:</strong></p> 
Validação de dados: falta fazer a parte de checar dentro do arquivo a ser importado se existe data diferente da primeira linha, se existir esta linha não é pra ser importada.
<p><strong>Semana2:</strong></p> 
Semana 2 Concluida <br>
<p><strong>Semanas 3 e 4:</strong> </p> 
Concluida, falta só melhorar a visualização, tem uma tabela na parte de importações feitas, que preciso melhorar.
 <br>



<p align="center"><strong>Ferramentas e linguagens utilizadas até agora:</strong></p>
<p><img src='/assets/imagens/php.png' alt="simbolo PHP criado por Freepik - Flaticon"/> PHP </p>
<p><img src='/assets/imagens/html.png' alt="simbolo HTML criado por Freepik - Flaticon"/> HTML </p>
<p><img src='/assets/imagens/css.png' alt="simbolo CSS criado por Freepik - Flaticon"/> CSS </p>
<p><img src='/assets/imagens/mariadb.png'alt="simbolo MariaDB"/> Banco de dados MariaDB </p>
<p><img src='/assets/imagens/phpmyadmin.png' alt=" Imagem relacionada a PHPMyAdmin"/>PHPMyAdmin (pra acessar o MariaDB)  </p>
<p><img src='/assets/imagens/vscode.png' alt="simbolo VSCODE"/> Visual Studio Code </p>
<p><img src='/assets/imagens/xampp.png' alt="simbolo XAMPP"/> XAMPP <br> </p>



<p>Referencias das imagens para credito:</p>
PHP -> https://www.flaticon.com/br/icones-gratis/php

HTML -> https://www.flaticon.com/free-icons/html

CSS -> https://www.flaticon.com/free-icons/css-3













