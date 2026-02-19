# SIGIS — Sistema Integrado de Gestão Institucional (ACSV)

Sistema institucional modular para a **Associação Comunidade Verde e Sustentável (Moçambique)**.

## O que foi corrigido nesta iteração
- Estrutura do projecto ajustada para um esqueleto Laravel executável (`artisan`, `bootstrap/app.php`, `public/index.php`, `config/*`, `Kernel`, middlewares e providers).
- Módulos, controllers, models, rotas e views mantidos e organizados para evolução por departamento.
- Dashboard executivo com indicadores e gráficos Chart.js.
- Migração central com tabelas normalizadas e preparação para RBAC (`created_by`, `actor_id`) e auditoria (`audit_logs`).

## Requisitos
- PHP 8.2+
- Composer 2+
- MySQL 8+

## Dependências PHP
Definidas em `composer.json`:
- `laravel/framework:^10.0`
- `barryvdh/laravel-dompdf:^2.0`
- `maatwebsite/excel:^3.1`

## Instalação
```bash
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan serve
```

## Notas importantes desta execução
Durante esta execução, a instalação automática via Composer foi tentada, mas o ambiente bloqueou saída para Packagist/GitHub com `CONNECT tunnel failed, response 403`.

Quando esse bloqueio de rede for removido, os comandos acima concluem a instalação completa.

## Módulos estruturados
- Dashboard Executivo
- Projectos
- Plano de Actividades
- Administração e Finanças
- Jurídico
- Relatórios Departamentais
- Marketing e Comunicação
- Economia Circular
- Assembleia Geral
- Conselho Fiscal
- Gestão Documental
