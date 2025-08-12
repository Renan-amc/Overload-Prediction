# Projeto: IA para Prevenção de Sobrecarga em Aplicações na AWS com Kubernetes

## Descrição
O projeto consiste em implementar um sistema baseado em **Inteligência Artificial** para monitoramento proativo e mitigação de sobrecarga na aplicação.  
A solução fará uso de **observabilidade** e **análise preditiva** para identificar padrões de uso que possam levar à degradação de desempenho ou indisponibilidade.

## Funcionamento
Quando um cenário de alta demanda for detectado, o sistema acionará mecanismos de **autoescalabilidade** em um ambiente **Kubernetes**, criando novas instâncias de **pods** para distribuir a carga de forma eficiente.

## Tecnologias e Serviços
- **AWS**
  - **Amazon EKS** para orquestração Kubernetes
  - **Elastic Load Balancing (ELB)** para balanceamento de requisições
  - **Amazon CloudWatch** e **AWS X-Ray** para telemetria e logging
- **Kubernetes**
  - Autoescalabilidade horizontal (HPA - Horizontal Pod Autoscaler)
  - Balanceamento interno de carga
- **IA**
  - Modelos de análise preditiva para detecção de picos de demanda
  - Automação de decisões de escalonamento

## Benefícios
- **Alta disponibilidade** e **resiliência**
- **Escalabilidade horizontal automática**
- **Balanceamento inteligente de carga**
- **Otimização de recursos computacionais**

# Como rodar o projeto Overload-Prediction localmente

## 1. Clone o repositório

```bash
git clone https://github.com/Renan-amc/Overload-Prediction.git
```

## 2. Entrar na pasta do projeto

```bash
cd Overload-Prediction
```

## 3. Instalar dependências (NECESSÁRIO COMPOSER INSTALADO)

```bash
composer install
```

## 4. Configurar o arquivo .env

```bash
cp .env.example .env
```

## 5. Gerar a chave da aplicação

```bash
php artisan key:generate
```

## 6. Rodar as migrations e seeders (se houver)

```bash
php artisan migrate
php artisan db:seed
```


## 7. Rodar o servidor local

```bash
php artisan serve
```
