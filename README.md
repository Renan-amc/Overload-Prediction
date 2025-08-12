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
