#  Sobre este Projeto: 

###  Este projeto sobe um ambiente Docker que disponibiliza, na porta 80, uma página "index.php" que retorna "Olá, mundo!" e uma lista de músicas que é consultada num banco de dados local. Utiliza o PHP-FPM como Servidor PHP e o Nginx como Proxy.
 
 ### O ambiente se baseia em três imagens docker:
>
 	1 - nginx:alpine		-	WEB Proxy que aponta para o servidor php.

	2 - php:fpm				-	Servidor PHP para hospedar a página "index.php".

	3 - mysql:latest		-	Banco de dados MySQL contendo a lista de músicas.

 ## A Estrutura de arquivos é composta por:
  
 ###  	- Pastas com os "Dockerfile" e arquivos de configuração para a criação das imagens referentes a cada serviço.
 ### 	- A pasta "src" aonde ficará o "index.php".
 ### 	- O arquivo "docker-compose.yml", utilizado para configurar e iniciar o ambiente.
 ### 	- Este arquivo "README.md".
 
 ## Estrutura de Pastas:
	├── docker
	│   ├── mysql
	│   │   ├── database1.sql
	│   │   └── Dockerfile
	│   ├── nginx
	│   │   ├── default.conf
	│   │   └── Dockerfile
	│   └── phpfpm
	│       ├── custom-fpm.ini
	│       ├── custom-mysqli.ini
	│       └── Dockerfile
	├── docker-compose.yml
	├── README.md
	└── src
	    ├── index.php
	    └── info.php

##	Descrição detalhada dos arquivos:

### - ./docker/mysql
 -	"database1.sql" ---> Script para criar o Banco "Playlist", a Tabela "Musicas", e as entradas da tabela.
 -	"Dockerfile" -------> Define a senha do banco e carrega o script "database1.sql" durante a criação da imagem MySQL.

### - ./docker/nginx
 -	"default.conf"	----> Configura local "root", nome do servidor", sequência da busca de arquivos, e parâmetros php.
 -	"Dockerfile" ------> Carrega "default.conf" durante a criação da imagem Ninx.

### - ./docker/phpfpm
 -	"custom-fpm.ini" -----> Força ativação da extensão "mysqli" que será utilizada para acesso ao banco.
 -	"custom-mysqli.ini" --> Configura alguns parâmetros do mysqli.
 -	"Dockerfile" ---------> Configura instalação dos componentes do mysqli durante a criação da imagem PHP-FPM.

### - ./src
 - "index.php" -> Página php que mostrará o texto "Olá, mundo!" e a tabela das músicas consultadas no banco.
 - "info.php"   -> Pagina para consulta das configurações do servidor PHP.
 - Estes arquivos podem ser modificados que sua atualização acontecerá em tempo real.

### - .
 - "docker-compose.yml" -> Arquivo utilizado pelo Docker Compose para configurar e iniciar os Containers.
 - "README.md" -> Este arquivo que você está lendo!


## Informações sobre os serviços do "docker-compose.yml":
>### - Services: 	

>### - mysql: 	
  > Configura para usar a imagem "mysql:latest", define local do Dockerfile, conecta à rede "internal", e expõe a porta 3306.

>### - nginx:
 	> Configura para usar a imagem "nginx:alpine", define local do Dockerfile, conecta à rede "internal", expõe a porta 80, e carrega arquivos ".php".

>### - php:	
	> Configura para usar a imagem "php:fpm", define local do Dockerfile, conecta à rede "internal", e carrega arquivos ".ini" e ".php".

>### networks: 
	> Cria rede "internal" no modo bridge, usada para comunicação entre os containers.


 	>	Para poder executar este projeto você precisa primeiro instalar os componentes do Docker.

## Instalando o Docker e Docker-Compose no Linux:
 > - Este tutorial de instalação é para versões Debian, Ubuntu, e seus derivados.

>
  	Abra o terminal(Konsole) e digite os seguintes comandos:
 
	1 - Instalando chave gpg do repositorio official do docker:

					$ sudo apt-get install curl														

					$ sudo curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg

			$ echo "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/ubuntu \
	       $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null


	2 - Instalando o Docker:

						$ sudo apt update											// Atualiza lista de pacotes disponíveis.

						$ sudo apt upgrade 											// Opcional, atualiza todo o sistema.

						$ sudo apt install docker-ce docker-ce-cli containerd.io docker-compose-plugin		  // Instala componentes do docker.
	

	3 - Adicionando usuário ao grupo do docker (evita ter que usar sudo):

						$ sudo usermod -aG docker $USER								// Adiciona o usuario atual ao grupo do docker.

						$ newgrp docker												// Atualiza permissões do grupo.
	

	4 - Verificando a instalação:

						$  docker version								// Mostra a versão do docker Instalada.

						$  docker run hello-world						// Baixa e executa uma imagem que escreve "Hello from Docker!" na tela.

						$  docker ps									// Lista os containers em execução.

						$  docker ps -a									// Lista containers em execução e parados.
		
	
## Baixando e utilizando os arquivos deste Repositório:
 
	1 - Instale o git:

								$ sudo apt update

								$ sudo apt install git

								$ sudo git version


 	2 - Crie uma pasta para baixar os arquivos do Projeto no seu ambiente de trabalho. Exemplo:

								$ cd /

								$ mkdir Projetos

								$ cd Projetos
		

	3 - Baixe o repositório com o comando "git clone":

		/Projetos/ 				$ git clone https://github.com/LeonHie/Tarefa.git


	4 - Verfique se os arquivos foram baixados:

		/Projetos/ 				$ ls -lahs Tarefa/


	5 -	Entre na pasta do projeto e execute o comando "docker compose build" para criar os containers:

		/Projetos/ 				$ cd Tarefa/

		/Projetos/Tarefa/		$ docker compose build


	6 - Execute o comando "docker compose up" para subir o ambiente:

		/Projetos/Tarefa/		$ docker compose up -d     			// Utilize "-d" para executar no modo "detached" (tela desconectada)




## Testando:
>
 -	Para testar o projeto abra um navegador de internet e acesse:
	- "http://localhost"   - se estiver na mesma máquina em que está rodando o ambiente docker.
	- "http://ipdamaquina" - se estiver acessando de outra máquina. Exemplo: "http://10.0.0.51" 
	- Se tudo estiver certo será exibida a mensagem "Olá, Mundo!" e uma Tabela mostrando as músicas da playlist.

## Parando a Execução do Ambiente:
>		
 - Caso tenha subido o ambiente com a opção "-d" , para pará-lo execute o comando "docker compose down":

		/Projetos/Tarefa$	docker compose down

 - Caso subiu o ambiente sem opção "-d", basta apertar a combinação de teclas "CTRL + C" no terminal.		
	>		"CTRL + C"
		
		