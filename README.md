# Sistema de Reservas de Salas — PHP + MySQL + Bootstrap

Este projeto é um sistema completo para **agendamento de salas de reunião, equipamentos e recursos**, inspirado na UX do Airbnb.  
Desenvolvido em **PHP (Arquitetura MVC)**, com banco de dados **MySQL** rodando no XAMPP e front-end estilizado com **Bootstrap 5**.

O sistema permite que usuários cadastrem, consultem e reservem salas em tempo real, verificando disponibilidade por dia e horário.

---

## 🚀 Funcionalidades

### 🔐 Autenticação
- Tela de Login  
- Tela de Cadastro  
- Validação de credenciais via banco de dados  
- Sessão ativa e logout

### 🏢 Gestão de Recursos (Salas / Equipamentos)
- Listagem de salas e recursos disponíveis  
- Formulário de cadastro (apenas admins)  
- Upload de imagens  
- Edição e remoção  
- Armazenamento no banco de dados  
- Exibição com cards estilo Airbnb

### 📅 Reservas
- Tela com calendário/datas disponíveis  
- Exibição de horários por sala  
- Formulário de reserva  
- Bloqueio automático de horários já reservados  
- Tela de confirmação da reserva  
- Listagem de reservas do usuário

### 🎨 Front-End
- Totalmente estilizado com **Bootstrap 5**  
- Layout responsivo  
- Navbar compartilhada  
- Footer fixo ao final da página  
- Cards limpos e modernos

---

## 🛠️ Tecnologias Utilizadas

- **PHP 8**  
- **MySQL (MariaDB via XAMPP)**  
- **Bootstrap 5.3**  
- **HTML5 / CSS3 / JS**  
- **Arquitetura MVC**  
- **Apache (XAMPP)**

---

## 📂 Estrutura do Projeto

```plaintext
sistema_salas/
│
├── controllers/
│   ├── AuthController.php
│   ├── RecursosController.php
│   └── ReservasController.php
│
├── models/
│   ├── User.php
│   ├── Recurso.php
│   └── Reserva.php
│
├── views/
│   ├── auth/
│   │   ├── login.php
│   │   └── register.php
│   ├── recursos/
│   │   ├── index.php
│   │   ├── form.php
│   │   └── admin.php
│   ├── reservas/
│   │   ├── home.php
│   │   ├── reservar.php
│   │   ├── horarios.php
│   │   ├── minhas.php
│   │   └── confirmacao.php
│   ├── partials/
│   │   ├── header.php
│   │   ├── navbar.php
│   │   └── footer.php
│   └── index.php
│
├── config/
│   └── Database.php
│
├── public/
│   ├── css/
│   ├── js/
│   └── uploads/
│
└── index.php
🗄️ Configuração do Banco de Dados
Abra o phpMyAdmin:

arduino
Copiar código
http://localhost/phpmyadmin
Crie o banco:

nginx
Copiar código
sistema_salas
Importe o arquivo SQL fornecido:

Cria as tabelas: usuarios, recursos, reservas

Ajuste o arquivo:

arduino
Copiar código
config/Database.php
conforme suas credenciais do XAMPP:

php
Copiar código
private $host = "localhost";
private $db_name = "sistema_salas";
private $username = "root";
private $password = "";
▶ Como Rodar o Projeto
Instale o XAMPP

Coloque o projeto em:

makefile
Copiar código
C:\xampp\htdocs\sistema_salas
Inicie o Apache e MySQL no XAMPP

Abra no navegador:

arduino
Copiar código
http://localhost/sistema_salas
👨‍💻 Como Contribuir
Faça o fork

Crie uma nova branch

Faça suas alterações

Envie um pull request

📖 Licença
