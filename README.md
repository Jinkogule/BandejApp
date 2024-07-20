<img style="" src="https://github.com/Jinkogule/BandejApp/blob/main/public/images/bandejapp-logo.png" width="250px;" alt=""/>

[![Release](https://img.shields.io/github/v/release/Jinkogule/BandejApp)](https://github.com/Jinkogule/BandejApp/releases)
[![License](https://img.shields.io/github/license/Jinkogule/BandejApp)](LICENSE)
  
 
<h4 align="center"> 
	🚧  BandejApp ♻️ Concluído 🚀 🚧
</h4>

<p align="center">
 <a href="#-sobre-o-projeto">Sobre</a> •
  <a href="#-tecnologias">Tecnologias</a> • 
 <a href="#-layout">Layout</a> • 
 <a href="#-como-executar-o-projeto">Como executar</a> • 
 <a href="#-autor">Autor</a> • 
 <a href="#user-content--licença">Licença</a>
</p>

## 💻 Sobre o projeto

O **BandejApp** é um sistema de gestão para restaurantes universitários, cujo propósito é reduzir o desperdício de alimentos ao proporcionar uma gestão mais eficiente. A aplicação permite que os usuários registrem suas refeições previamente, confirmem presença, avaliem a qualidade do serviço e enviem sugestões de melhorias. Os administradores têm acesso a dados detalhados sobre o número de pessoas que registraram e confirmaram presença, permitindo que haja um melhor planejamento sobre a quantidade de comida a ser preparada e redistribuída entre as unidades que o restaurante universitário possui. Além disso, os administradores também podem publicar avisos e visualizar sugestões e avaliações dos usuários.

Este projeto foi idealizado por [Letícia de Oliveira Gago](http://lattes.cnpq.br/3212258897513521) e, com a orientação de de [Flávio Luiz Seixas](http://lattes.cnpq.br/4319951805195534), foram realizadas reuniões a fim de desenvolver uma solução tecnológica para reduzir o desperdício de alimentos em restaurantes universitários, culminando no BandejApp. Após a aplicação ter ficado funcional, foi realizado um teste de usabilidade utilizando o SUS (System Usability Scale), obtendo resultados satisfatórios (mais detalhes [aqui](https://app.uff.br/riuff/handle/1/30498)).

A proposta deste projeto foi apresentada à Superintendência de Tecnologia da Informação da Universidade Federal Fluminense para sua incorporação ao aplicativo do Restaurante Universitário da universidade. Atualmente, essa integração está em fase de implementação.

---

Projeto hospedado em: https://bandejapp.herokuapp.com/

## 🛠 Tecnologias

As seguintes ferramentas foram usadas na construção do projeto:

#### **Website**  ([PHP](https://www.php.net/)  +  [Laravel](https://laravel.com/))

-   **[PHP 8.3](https://www.php.net/)**
-   **[Laravel 8.8](https://laravel.com/)**
-   **[Composer 2.7](https://getcomposer.org/)**

> Veja o arquivo  [composer.json]()

#### **Banco de Dados**

-   **[PostgreSQL 16.3](https://www.postgresql.org/)**

#### **Hospedagem**

-   **[Heroku](https://www.heroku.com/home)**: Projeto hospedado em: https://bandejapp.herokuapp.com/.

#### **Serviços e Add-ons**

-   **[Heroku Postgres](https://devcenter.heroku.com/articles/heroku-postgresql)**: Serviço gerenciado para conexão com o banco de dados PostgreSQL.
-   **[Heroku Scheduler](https://devcenter.heroku.com/articles/scheduler)**: Agendamento de tarefas para ativar as schedules do Laravel em momentos específicos do dia.
-   **[Mailgun](https://devcenter.heroku.com/articles/mailgun)**: Serviço de envio, recebimento, rastreamento e armazenamento de e-mails.

#### **Utilitários**
-   **[CSS](https://react-leaflet.js.org/en/)**
-   **[HTML](https://react-leaflet.js.org/)**
-   Protótipo:  **[Figma](https://www.figma.com/)**  →  **[Protótipo (BandejApp)](https://www.figma.com/file/1SxgOMojOB2zYT0Mdk28lB/Ecoleta)**
-   Ícones:  **[Feather Icons](https://feathericons.com/)**,  **[Font Awesome](https://fontawesome.com/)**
-   Fontes:  **[Bahnschrift](https://learn.microsoft.com/en-us/typography/font-list/bahnschrift)**

---

## 🎨 Layout

O layout da aplicação está disponível no Figma:

<a href="https://www.figma.com/design/HAcWO9GlJnCcDmHjk9JoVk/BandejApp?node-id=419-31&t=DjFmhk3wbzDHxSC4-0">
  <img alt="" src="https://img.shields.io/badge/Acessar%20Layout%20-Figma-%2304D361">
</a>

### Telas de autenticação (Mobile)
<table align="center">
  <tr>
    <td align="center">
      <img src="/public/images/screenshots/bandejapp - login.png" alt="" title="Login" width="300px">
      <br>
      <em>Login</em>
    </td>
    <td align="center">
      <img src="/public/images/screenshots/bandejapp - cadastro.png" alt="" title="Cadastro" width="300px">
      <br>
      <em>Cadastro</em>
    </td>
  </tr>
</table>

### Telas de usuário (Mobile)
<table align="center">
  <tr>
    <td align="center">
      <img src="/public/images/screenshots/user/bandejapp - planejamento mensal.png" alt="" title="Planejamento mensal (registrar refeições)" width="300px">
      <br>
      <em>Planejamento mensal (registrar refeições)</em>
    </td>
    <td align="center">
      <img src="/public/images/screenshots/user/bandejapp - dashboard (proximas refeicoes).png" alt="" title="Dashboard (proximas refeições)" width="300px">
      <br>
      <em>Dashboard (proximas refeições)</em>
    </td>
      <td align="center">
      <img src="/public/images/screenshots/user/bandejapp - avaliacao de refeicao.png" alt="" title="Avaliação de refeição" width="300px">
      <br>
      <em>Avaliação de refeição</em>
    </td>
  </tr>
  <tr>
    </td>
      <td align="center">
      <img src="/public/images/screenshots/user/bandejapp - sugestao de melhoria.png" alt="" title="Sugestão de melhorias" width="300px">
      <br>
      <em>Sugestão de melhorias</em>
    </td>
    <td align="center">
      <img src="/public/images/screenshots/user/bandejapp - avisos informativos.png" alt="" title="Avisos informativos" width="300px">
      <br>
      <em>Avisos informativos</em>
    </td>
    </td>
      <td align="center">
      <img src="/public/images/screenshots/user/bandejapp - menu usuario.png" alt="" title="Menu (usuário)" width="300px">
      <br>
      <em>Menu (usuário)</em>
    </td>
  </tr>
</table>

### Telas de administrador (Mobile)
<table align="center">
  <tr>
    <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - dashboard com cardapio nao definido.png" alt="" title="Dashboard (cardápios não definidos)" width="300px">
      <br>
      <em>Dashboard (cardápios não definidos)</em>
    </td>
    <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - tabela de registrados e confirmados.png" alt="" title="Tabela de registrados e confirmados" width="300px">
      <br>
      <em>Tabela de registrados e confirmados</em>
    </td>
      <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - definir cardapio.png" alt="" title="Definição de cardápio" width="300px">
      <br>
      <em>Definição de cardápio</em>
    </td>
  </tr>
  <tr>
    </td>
      <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - alterar cardapio.png" alt="" title="Alteração de cardápio" width="300px">
      <br>
      <em>Alteração de cardápio</em>
    </td>
    <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - dashboard com cardapio definido.png" alt="" title="Dashboard (cardápio definido)" width="300px">
      <br>
      <em>Dashboard (cardápio definido)</em>
    </td>
    </td>
      <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - visualizar cardapio.png" alt="" title="Visualização de cardápio" width="300px">
      <br>
      <em>Visualização de cardápio</em>
    </td>
  </tr>
    <tr>
    </td>
      <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - publicar aviso.png" alt="" title="Publicação de aviso" width="300px">
      <br>
      <em>Publicação de aviso</em>
    </td>
    <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - visualizar sugestoes de melhorias.png" alt="" title="Sugestões de melhorias" width="300px">
      <br>
      <em>Sugestões de melhorias</em>
    </td>
    </td>
      <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - menu admin.png" alt="" title="Menu (administrador)" width="300px">
      <br>
      <em>Menu (administrador)</em>
    </td>
  </tr>
</table>

## Autor

<a href="">
 <img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/u/52849575?v=4" width="100px;" alt=""/>
 <br />
 <sub><b>Lucas Pimenta</b></sub></a> <a href="https://lucas-pimenta-3c80fa16439e.herokuapp.com/" title="Lucas Pimenta"></a>
 <br />

[![Linkedin Badge](https://img.shields.io/badge/-Lucas-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/lucas-pimenta-0663671b1/)](https://www.linkedin.com/in/lucas-pimenta-0663671b1/) 
[![Gmail Badge](https://img.shields.io/badge/-lucaspimenta21@gmail.com-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:lucaspimenta21@gmail.com)](mailto:lucaspimenta21@gmail.com)

---

## 📝 Licença

Este projeto esta sobe a licença [MIT](./LICENSE).
