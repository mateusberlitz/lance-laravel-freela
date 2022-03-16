## Descrição da tarefa

O Objetivo é criar as rotas de CRUD das entitades listadas na sequência. Isso inclui as migrations, models e controllers necessários pra ter tudo funcionando.

Segue o exemplo de como deve ficar o acesso as rotas:

<img src="https://cdn.discordapp.com/attachments/415479229858185218/953632901554143232/unknown.png" width="400">
<img src="https://cdn.discordapp.com/attachments/415479229858185218/953633406737076255/unknown.png" width="400">

Esquema de relacionamentos:
https://whimsical.com/estrutura-do-sistema-TZiVrm6R4vkUbCj3NBmRoK

## Entidades
 - [Customers]: Nome completo, email, telefone, cpf, cnpj, data de nascimento, estado civil, país, cidade, cep, endereço, número;
 - [Contracts]: Número, cliente;
 - [Quotas]: Número, cliente, empresa, filial, vendedor, credito, parcelas pagas, grupo, cota, data de contemplação, data da venda, tipo da venda, tipo de consórcio;
 - [CommissionRules]: Empresa, filial, meia parcela ou parcela cheia, pagar na contemplação(boolean), percentual pago na contemplação, tipo de extorno;
 - [CommissionParcels]: Regra, número(da parcela), percentual a ser pago, percentual de extorno;
 - [CompanyCommissions]: Contrato, Cota, Empresa, Filial, Vendedor, Valor(pode ser negativo), Data de comissão, Período, Meia parcela(boolean), Valor base, Percentual;
 - [Commissions]: Comissão da empresa, regra, valor;

Todas entidades devem possuir por padrão, data de criação e atualização (Laravel fornece), id, e onde se repetem em outra tabelas é por que são relacionamentos. Por exemplo: A tabela de comissão, que é referente a comissão dos vendedores da empresa, possui uma relação com a comissão da empresa que foi recebida, por tanto, ao listar cada comissão de vendedor, ela deve trazer no conjunto de dados as informações da comissão da empresa a qual ela se relaciona.
