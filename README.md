# BandejApp
O **BandejApp** é um sistema de gestão para restaurantes universitários, cujo propósito é reduzir o desperdício de alimentos ao proporcionar uma gestão mais eficiente. A aplicação permite que os usuários registrem suas refeições previamente, confirmem presença, avaliem a qualidade do serviço e enviem sugestões de melhorias. Os administradores têm acesso a dados detalhados sobre o número de pessoas que registraram e confirmaram presença, permitindo que haja um melhor planejamento sobre a quantidade de comida a ser preparada e redistribuída entre as unidades que o restaurante universitário possui. Além disso, os administradores também podem publicar avisos e visualizar sugestões e avaliações dos usuários.

Este projeto foi idealizado por [Letícia de Oliveira Gago](http://lattes.cnpq.br/3212258897513521) e, com a orientação de de [Flávio Luiz Seixas](http://lattes.cnpq.br/4319951805195534), foram realizadas reuniões a fim de desenvolver uma solução tecnológica para reduzir o desperdício de alimentos em restaurantes universitários, culminando no BandejApp. Após a aplicação ter ficado funcional, foi realizado um teste de usabilidade utilizando o SUS (System Usability Scale), obtendo resultados satisfatórios (mais detalhes [aqui](https://app.uff.br/riuff/handle/1/30498)).

A proposta deste projeto foi apresentada à Superintendência de Tecnologia da Informação da Universidade Federal Fluminense para sua incorporação ao aplicativo do Restaurante Universitário da universidade. Atualmente, essa integração está em fase de implementação.

Projeto hospedado em: https://bandejapp.herokuapp.com/

## Tecnologias Utilizadas
* PHP 8.3
* Laravel 8.8
* Composer 2.7
* PostgreSQL 16.3

## Capturas de Tela

### Telas de autenticação (Mobile)
<table>
  <tr>
    <td align="center">
      <img src="/public/images/screenshots/bandejapp - login.png" alt="" title="Login">
      <br>
      <em>Login</em>
    </td>
    <td align="center">
      <img src="/public/images/screenshots/bandejapp - cadastro.png" alt="" title="Cadastro">
      <br>
      <em>Cadastro</em>
    </td>
  </tr>
</table>

### Telas de usuário (Mobile)
<table>
  <tr>
    <td align="center">
      <img src="/public/images/screenshots/user/bandejapp - planejamento mensal.png" alt="" title="Planejamento mensal (registrar refeições)">
      <br>
      <em>Planejamento mensal (registrar refeições)</em>
    </td>
    <td align="center">
      <img src="/public/images/screenshots/user/bandejapp - dashboard (proximas refeicoes).png" alt="" title="Dashboard (proximas refeições)">
      <br>
      <em>Dashboard (proximas refeições)</em>
    </td>
      <td align="center">
      <img src="/public/images/screenshots/user/bandejapp - avaliacao de refeicao.png" alt="" title="Avaliação de refeição">
      <br>
      <em>Avaliação de refeição</em>
    </td>
  </tr>
  <tr>
    </td>
      <td align="center">
      <img src="/public/images/screenshots/user/bandejapp - sugestao de melhoria.png" alt="" title="Sugestão de melhorias">
      <br>
      <em>Sugestão de melhorias</em>
    </td>
    <td align="center">
      <img src="/public/images/screenshots/user/bandejapp - avisos informativos.png" alt="" title="Avisos informativos">
      <br>
      <em>Avisos informativos</em>
    </td>
    </td>
      <td align="center">
      <img src="/public/images/screenshots/user/bandejapp - menu usuario.png" alt="" title="Menu (usuário)">
      <br>
      <em>Menu (usuário)</em>
    </td>
  </tr>
</table>

### Telas de administrador (Mobile)
<table>
  <tr>
    <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - dashboard com cardapio nao definido.png" alt="" title="Dashboard (cardápios não definidos)">
      <br>
      <em>Dashboard (cardápios não definidos)</em>
    </td>
    <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - tabela de registrados e confirmados.png" alt="" title="Tabela de registrados e confirmados">
      <br>
      <em>Tabela de registrados e confirmados</em>
    </td>
      <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - definir cardapio.png" alt="" title="Definição de cardápio">
      <br>
      <em>Definição de cardápio</em>
    </td>
  </tr>
  <tr>
    </td>
      <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - alterar cardapio.png" alt="" title="Alteração de cardápio">
      <br>
      <em>Alteração de cardápio</em>
    </td>
    <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - dashboard com cardapio definido.png" alt="" title="Dashboard (cardápio definido)">
      <br>
      <em>Dashboard (cardápio definido)</em>
    </td>
    </td>
      <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - visualizar cardapio.png" alt="" title="Visualização de cardápio">
      <br>
      <em>Visualização de cardápio</em>
    </td>
  </tr>
    <tr>
    </td>
      <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - publicar aviso.png" alt="" title="Publicação de aviso">
      <br>
      <em>Publicação de aviso</em>
    </td>
    <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - visualizar sugestoes de melhorias.png" alt="" title="Sugestões de melhorias">
      <br>
      <em>Sugestões de melhorias</em>
    </td>
    </td>
      <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - menu admin.png" alt="" title="Menu (administrador)">
      <br>
      <em>Menu (administrador)</em>
    </td>
  </tr>
</table>

## Licença

Este projeto está licenciado sob uma Licença Proprietária. Todos os direitos estão reservados ao proprietário dos direitos autorais. Para obter permissão para usar, copiar, distribuir ou modificar este software, entre em contato com [Lucas Pimenta](mailto:lucaspimenta21@gmail.com).

Para mais detalhes, veja o arquivo [LICENSE](LICENSE).
