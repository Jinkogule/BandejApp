<div align="center">
<img style="" src="https://github.com/Jinkogule/BandejApp/blob/main/public/images/bandejapp-logo.png" width="250px;" alt=""/>
<br>

[![Release](https://img.shields.io/github/v/release/Jinkogule/BandejApp?style=for-the-badge)](https://github.com/Jinkogule/BandejApp/releases)
[![License](https://img.shields.io/github/license/Jinkogule/BandejApp?style=for-the-badge)](LICENSE)<br>
![Status](https://img.shields.io/badge/STATUS-COMPLETED%20|%20UPDATING-brightgreen?style=for-the-badge)
</div>

<p align="center">
  <a href="#-about-the-project">About</a> •
  <a href="#-documentation">Documentation</a> •
  <a href="#-development">Development</a> •
  <a href="#-technologies">Technologies</a> •
  <a href="#-layout">Layout</a> •
  <a href="#-authors">Authors</a> •
  <a href="#-certifications">Certifications</a> •
  <a href="#-license">License</a>
  <br>
  <a href="./README.pt.md">Português (BR)</a> •
  <a href="./README.md">English</a>
</p>

---

## 💻 About the Project

**BandejApp** is a management system for university restaurants designed to reduce food waste by providing more efficient management. The application allows users to pre-register their meals, confirm attendance, evaluate service quality, and submit improvement suggestions. Administrators have access to detailed data on the number of people who registered and confirmed their attendance, enabling better planning of the food quantities to be prepared and redistributed among the university restaurant’s units. Additionally, administrators can publish announcements and view user suggestions and reviews.

This project was conceived by **[Letícia de Oliveira Gago](http://lattes.cnpq.br/3212258897513521)** and, under the guidance of **[Flávio Luiz Seixas](http://lattes.cnpq.br/4319951805195534)**, several meetings were conducted to develop a technological solution to reduce food waste in university restaurants, ultimately leading to the creation of BandejApp. After the application was fully operational, a usability test was conducted using the SUS (System Usability Scale), which yielded satisfactory results. (**[more details](https://github.com/Jinkogule/BandejApp/raw/main/public/documents/documentations/Desenvolvimento_de_sistema_para_confirmacao_do_uso_do_restaurante_universitario_pela_comunidade_academica.pdf)**).

The project was presented to the Superintendency of Information Technology at the Fluminense Federal University for incorporation into the university restaurant’s official application. Currently, this integration is in the implementation phase.

Project available at: **https://bandejapp.free.nf**.

## 📋 Documentation

-   **[Undergraduate thesis on the first version](https://github.com/Jinkogule/BandejApp/raw/main/public/documents/documentations/Desenvolvimento_de_sistema_para_confirmacao_do_uso_do_restaurante_universitario_pela_comunidade_academica.pdf)**
-   **[Wiki](https://github.com/Jinkogule/BandejApp/wiki)**

## 🧑🏻‍💻 Development

-   **[Source Code](https://github.com/Jinkogule/BandejApp)**
-   **[Issue Tracking](https://github.com/Jinkogule/BandejApp/issues)**

## 🛠 Technologies

### **Website**  **([PHP](https://www.php.net/)**  +  **[Laravel](https://laravel.com/))**

-   **[PHP 8.3](https://www.php.net/)**
-   **[Laravel 8.8](https://laravel.com/)**
-   **[Composer 2.7](https://getcomposer.org/)**

> For more details on the project's configurations, refer to **[composer.json](https://github.com/Jinkogule/BandejApp/blob/main/composer.json)**.

### **Database**

- **Currently**
  - ✅ **[MariaDB 10.6.19](https://mariadb.org/)**

- **Previously**
  - ❌ **[PostgreSQL 16.3](https://www.postgresql.org/)** (until version **[v1.2.0](https://github.com/Jinkogule/BandejApp/releases/tag/v1.2.0)**)

### **Hosting**

- **Currently**
  - ✅ **[InfinityFree](https://www.infinityfree.com/)** → **[BandejApp](https://bandejapp.free.nf)**

- **Previously**
  - ❌ **[Heroku](https://www.heroku.com/)** (until version **[v1.2.0](https://github.com/Jinkogule/BandejApp/releases/tag/v1.2.0)**)

### **Serviços e Add-ons**

- **Currently**
  - ✅ **[Mailgun](https://devcenter.heroku.com/articles/mailgun)**

- **Previously**
  - ❌ **[Heroku Postgres](https://devcenter.heroku.com/articles/heroku-postgresql)** (until version **[v1.2.0](https://github.com/Jinkogule/BandejApp/releases/tag/v1.2.0)**)
  - ❌ **[Heroku Scheduler](https://devcenter.heroku.com/articles/scheduler)** (until version **[v1.2.0](https://github.com/Jinkogule/BandejApp/releases/tag/v1.2.0)**)

### **Utilitários**

- **Prototype**  
    - **[Figma](https://www.figma.com/)**  →  **[Prototype (BandejApp)](https://www.figma.com/design/HAcWO9GlJnCcDmHjk9JoVk/BandejApp?node-id=419-31&t=l5nULhkPCV4Q3s4N-1)**

- **Icons**
    - **[Flaticon](https://www.flaticon.com/)**

- **Fonts**  
    - **[Bahnschrift](https://learn.microsoft.com/en-us/typography/font-list/bahnschrift)**

## 🎨 Layout

The application layout is available on Figma:

<a href="https://www.figma.com/design/HAcWO9GlJnCcDmHjk9JoVk/BandejApp?node-id=419-31&t=DjFmhk3wbzDHxSC4-0">
  <img alt="" src="https://img.shields.io/badge/Access%20Layout%20-Figma-%2304D361?style=for-the-badge">
</a>

### Authentication Screens (Mobile)
<table align="center">
  <tr>
    <td align="center">
      <img src="/public/images/screenshots/bandejapp - login.png" alt="" title="Login" width="300px">
      <br>
      <em>Login</em>
    </td>
    <td align="center">
      <img src="/public/images/screenshots/bandejapp - cadastro.png" alt="" title="Sign up" width="300px">
      <br>
      <em>Sign up</em>
    </td>
  </tr>
</table>

### User Screens (Mobile)
<table align="center">
  <tr>
    <td align="center">
      <img src="/public/images/screenshots/user/bandejapp - planejamento mensal.png" alt="" title="Monthly planning (register meals)" width="300px">
      <br>
      <em>Monthly planning (register meals)</em>
    </td>
    <td align="center">
      <img src="/public/images/screenshots/user/bandejapp - dashboard (proximas refeicoes).png" alt="" title="Dashboard (upcoming meals)" width="300px">
      <br>
      <em>Dashboard (upcoming meals)</em>
    </td>
      <td align="center">
      <img src="/public/images/screenshots/user/bandejapp - avaliacao de refeicao.png" alt="" title="Meal review" width="300px">
      <br>
      <em>Meal review</em>
    </td>
  </tr>
  <tr>
    </td>
      <td align="center">
      <img src="/public/images/screenshots/user/bandejapp - sugestao de melhoria.png" alt="" title="Improvement suggestions" width="300px">
      <br>
      <em>Improvement suggestions</em>
    </td>
    <td align="center">
      <img src="/public/images/screenshots/user/bandejapp - avisos informativos.png" alt="" title="Informative notices" width="300px">
      <br>
      <em>Informative notices</em>
    </td>
    </td>
      <td align="center">
      <img src="/public/images/screenshots/user/bandejapp - menu usuario.png" alt="" title="Menu (user)" width="300px">
      <br>
      <em>Menu (user)</em>
    </td>
  </tr>
</table>

### Admin Screens (Mobile)
<table align="center">
  <tr>
    <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - dashboard com cardapio nao definido.png" alt="" title="Dashboard (menus not defined)" width="300px">
      <br>
      <em>Dashboard (menus not defined)</em>
    </td>
    <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - tabela de registrados e confirmados.png" alt="" title="Table of registered and confirmed users" width="300px">
      <br>
      <em>Table of registered and confirmed users</em>
    </td>
      <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - definir cardapio.png" alt="" title="Menu definition" width="300px">
      <br>
      <em>Menu definition</em>
    </td>
  </tr>
  <tr>
    </td>
      <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - alterar cardapio.png" alt="" title="Menu editing" width="300px">
      <br>
      <em>Menu editing</em>
    </td>
    <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - dashboard com cardapio definido.png" alt="" title="Dashboard (menu set)" width="300px">
      <br>
      <em>Dashboard (menu set)</em>
    </td>
    </td>
      <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - visualizar cardapio.png" alt="" title="Menu viewing" width="300px">
      <br>
      <em>Menu viewing</em>
    </td>
  </tr>
    <tr>
    </td>
      <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - publicar aviso.png" alt="" title="Notice publishing" width="300px">
      <br>
      <em>Notice publishing</em>
    </td>
    <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - visualizar sugestoes de melhorias.png" alt="" title="Improvement suggestions" width="300px">
      <br>
      <em>Improvement suggestions</em>
    </td>
    </td>
      <td align="center">
      <img src="/public/images/screenshots/admin/bandejapp - menu admin.png" alt="" title="Menu (admin)" width="300px">
      <br>
      <em>Menu (admin)</em>
    </td>
  </tr>
</table>

## ✒ Authors

<table>
  <tr>
    <td align="center">
      Lucas Pimenta
      <br>
      <a href="https://github.com/Jinkogule">
        <img src="https://avatars.githubusercontent.com/u/52849575?v=4" width="100px;" alt="Lucas Pimenta"/>
      </a>
      <br>
      <a href="https://github.com/Jinkogule">
        <img src="https://img.shields.io/badge/-Github-black?style=flat-square&logo=Github&logoColor=white">
      </a>
    </td>
    <td align="center">
      Letícia Gago
      <br>
      <a href="http://lattes.cnpq.br/3212258897513521">
        <img src="https://www.w3schools.com/w3images/avatar6.png" width="100px;" alt="Letícia Gago"/>
      </a>
      <br>
      <a href="http://lattes.cnpq.br/3212258897513521">
        <img src="https://img.shields.io/badge/-Lattes-black?style=flat-square&logo=GoogleScholar&logoColor=white">
      </a>
    </td>
    <td align="center">
      Flávio Seixas
      <br>
      <a href="http://lattes.cnpq.br/4319951805195534">
        <img src="https://www.w3schools.com/w3images/avatar2.png" width="100px;" alt="Flávio Seixas"/>
      </a>
      <br>
      <a href="http://lattes.cnpq.br/4319951805195534">
        <img src="https://img.shields.io/badge/-Lattes-black?style=flat-square&logo=GoogleScholar&logoColor=white">
      </a>
    </td>
  </tr>
</table>

## 📜 Certifications

This software is protected by copyright, according to the following certifications issued by INPI:

- **[Computer Program Registration Certificate](https://github.com/Jinkogule/BandejApp/raw/main/public/documents/certifications/BandejApp-Certificado_de_Registro_de_Programa_de_Computador_-_INPI_-_1.0.0.pdf)** - Related to version **[1.0.0](https://github.com/Jinkogule/BandejApp/tree/v1.0.0)**.
- **[Computer Program Registration Certificate](https://github.com/Jinkogule/BandejApp/raw/main/public/documents/certifications/BandejApp-Certificado_de_Registro_de_Programa_de_Computador_-_INPI_-_1.2.0.pdf)** - Related to version **[1.2.0](https://github.com/Jinkogule/BandejApp/tree/v1.2.0)**.

## 📝 License

This project is licensed under the **[GNU Affero General Public License v3.0 (AGPLv3)](./LICENSE)**.
