# 📚 Repositório de Eventos UNISAVE

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

## 📋 Sobre o Projeto

Sistema de gerenciamento de eventos acadêmicos desenvolvido por [Onésimo Nuvunga](https://github.com/Onesimo23) para a Universidade Save (UniSave). Esta plataforma permite o controle, organização e acompanhamento de eventos institucionais.

### 🚀 Funcionalidades Principais

-   Cadastro e gerenciamento de eventos
-   Controle de inscrições
-   Emissão de certificados
-   Gestão de participantes
-   Relatórios e métricas

## 🛠️ Tecnologias Utilizadas

-   **PHP 8.2**
-   **Laravel 12.0**
-   **MySQL**
-   **Tailwind CSS**
-   **Vite**

## ⚙️ Requisitos do Sistema

-   PHP >= 8.2
-   Composer
-   Node.js
-   MySQL/MariaDB

## 🔧 Instalação

1. Clone o repositório:

```bash
git clone https://github.com/Onesimo23/repositorio-eventos-unisave.git
cd repositorio-eventos-unisave
```

2. Instale as dependências:

```bash
composer install
npm install
```

3. Configure o ambiente:

```bash
cp .env.example .env
php artisan key:generate
```

4. Configure o banco de dados no arquivo `.env`

5. Execute as migrações:

```bash
php artisan migrate
```

6. Inicie o servidor:

```bash
php artisan serve
npm run dev
```

## 📝 Configuração do Ambiente

### Variáveis de Ambiente Importantes

```env
APP_NAME="Eventos UNISAVE"
APP_ENV=local
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

## 👥 Contribuição

1. Faça um Fork do projeto
2. Crie sua Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a Branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 👨‍💻 Desenvolvedor

**Onésimo Nuvunga**

-   GitHub: [@Onesimo23](https://github.com/Onesimo23)
-   Email: [onesimonuvunga@gmail.com](mailto:onesimonuvunga@gmail.com)

## 📞 Suporte

Para suporte e dúvidas, entre em contato através de:

-   Email: [onesimonuvunga@gmail.com](mailto:onesimonuvunga@gmail.com)
-   Issues do GitHub: [Reportar um problema](https://github.com/Onesimo23/repositorio-eventos-unisave/issues)

---

<p align="center">
  Desenvolvido com ❤️ por Onésimo Nuvunga para a Universidade Save
</p>
