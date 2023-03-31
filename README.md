
## Instalando o projeto

Para instalar o projeto na máquina e operá-lo, serão necessários alguns comandos a serem executados em sua pasta com o cmd após o pull, estes são:

- composer install
- cp .env.example .env
- php artisan key:generate
- npm install && npm run build

Após isso, basta configurar o arquivo .env com o respectivo banco de dados(+sua possível senha) que será utilizado, rodando então os últimos comandos:

- php artisan migrate
- php artisan serve

Por fim, entre na aplicação através do link disponibilizado em seu terminal.

## Sobre o projeto

Quanto às funcionalidades requeridas, apenas a particularidade do horário de atualização do valor do produto que acabou por não ser colocada, porém, todas as outras foram implementadas e estão funcionando no programa.
De início, é preciso criar um user, entrando no link para o form de registro na página inicial, e logando logo depois. O registro/login foi feito com o StarterKit Laravel Breeze, a fim de otimizar o tempo com as outras demandas e manter uma boa aparência para o sistema.
Para adicionar um produto, basta clicar no botão do canto superior direito da tabela, logo acima dela.
Para ativar/desativar produtos, basta apertar o botão "power" do mesmo.
Para deletar produtos, basta selecionar os produtos a serem deletados e apertar o botão "Deletar Selecionados"
Para editar basta apertar no lápis e fazer as alterações

## Tecnologias Utilizadas

- MySQL
- Laravel (+StarterKit Breeze)
- TailwindCSS
- JavaScript
 
