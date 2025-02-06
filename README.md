# 🏆 Meu Campeonato API

API desenvolvida em Laravel para simulação de campeonatos de futebol, onde os jogos são gerados automaticamente seguindo critérios de pontuação.

## 🚀 Tecnologias Utilizadas

-   Laravel 10
-   MySQL (ou PostgreSQL)
-   Swagger (L5-Swagger) para documentação
-   PHPUnit para testes
-   Python para simulação de placares

## ⚙️ Como Executar o Projeto

### 1️⃣ Clone o repositório

```bash
git clone https://github.com/isacfc45/api-meu-campeonato/
cd api-meu-campeonato
```

### 2️⃣ Instale as dependências

```bash
composer install
```

### 3️⃣ Configure o ambiente

Crie um arquivo `.env` e defina as variáveis do banco de dados:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=meu_campeonato
DB_USERNAME=root
DB_PASSWORD=senha
```

### 4️⃣ Rode as migrations

```bash
php artisan migrate --seed
```

### 5️⃣ Inicie o servidor

```bash
php artisan serve
```

Acesse: [http://localhost:8000](http://localhost:8000)

## 📌 Endpoints Principais

### ➤ Times

| Método | Endpoint          | Descrição                |
| ------ | ----------------- | ------------------------ |
| GET    | `/api/times`      | Lista todos os times     |
| POST   | `/api/times`      | Cria um novo time        |
| GET    | `/api/times/{id}` | Obtém um time específico |
| PUT    | `/api/times/{id}` | Atualiza um time         |
| DELETE | `/api/times/{id}` | Deleta um time           |

### ➤ Campeonatos

| Método | Endpoint                   | Descrição                       |
| ------ | -------------------------- | ------------------------------- |
| POST   | `/api/campeonatos/simular` | Simula um campeonato            |
| GET    | `/api/campeonatos`         | Lista todos os campeonatos      |
| GET    | `/api/campeonatos/{id}`    | Obtém detalhes de um campeonato |

## 🔍 Testes

Rodar todos os testes:

```bash
php artisan test
```

Rodar um teste específico:

```bash
php artisan test --filter TimeTest
```

## 📄 Documentação da API (Swagger)

Acesse a documentação gerada automaticamente:
[http://localhost:8000/api/documentation](http://localhost:8000/api/documentation)
