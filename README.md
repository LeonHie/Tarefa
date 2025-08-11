 
  Este projeto sobe um ambiente docker Nginx que acessa e disponibiliza o arquivo "index.php" do container PHP-FPM na porta 80. 
 O aquivo "index.php" retorna "Olá, mundo!" e algumas outras informações armazenadas no banco de dados MySql.
 
  O ambiente utilisa três imagens docker:
> 	1 - nginx:alpine		-	Servidor Nginx utilizado como Proxy que aponta para o servidor php.

>	2 - php:fpm				-	Servidor PHP para hospedar o arquivo "index.php".

>	3 - mysql:latest		-	Servidor de Banco de Dados acessado pelo arquivo "index.php".

  É composto pelo arquivo "docker.compose.yml", utilizado para iniciar o ambiente, este arquivo "README.md", e uma estrutara de pastas e arquivos para configuraçãod os containers.
 
 
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
	│       ├── Dockerfile
	│       └── php.ini
	├── docker-compose.yml
	├── README.md
	└── src
	    ├── index.php
	    └── info.php


 > Este Projeto foi originalmente desenvolvido num ambiente Linux Kubuntu

 
## -------------  Instalando o Docker e Docker-Compose no Linux:  ---------------
  Você precisa instalar o Docker antes de poder executar o projeto.
  Abra o terminal(Konsole) e digite os seguintes comandos:
 
	1 - Instalando chave gpg do repositorio official do docker:
		$ sudo apt-get install curl														
		$ sudo curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /etc/apt/keyrings/docker.gpg
		$ echo "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.gpg] https://download.docker.com/linux/ubuntu \
	       $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null

	2 - Instalando o Docker:
		$ sudo apt update																// Atualiza lista de pacotes do sistema disponíveis.
		$ sudo apt upgrade 																// Opcional, atualiza todo o sistema.
		$ sudo apt install docker-ce docker-ce-cli containerd.io docker-compose-plugin	// Instala componentes do docker.
	
	3 - Adicionando usuário ao grupo do docker (evita ter que usar sudo):
		$ sudo usermod -aG docker $USER									// Adiciona o usuario atual ao grupo do docker.
		$ newgrp docker													// Atualiza permissões do grupo.
	
	4 - Verificando a instalação:
		$  docker version												// Mostra a versão do docker Instalada.
		$  docker run hello-world										// Baixa e executa uma imagem de exemplo que escreve "Hello from Docker!" na tela.
		$  docker ps													// Lista os containers em execução.
		$  docker ps -a													// Lista containers em execução e parados.
		
	
## -----------   Baixando e Utilizando os Arquivos deste Repositório:  ------------
 
	1 - Instale o git:
		$ sudo apt update
		$ sudo apt install git
		$ sudo git version

	2 - Crie uma pasta para baixar os arquivos do Projeto no seu ambiente de trabalho. Exemplo:
		$ cd /
		$ mkdir Projetos
		$ cd Projetos
		
	3 - Baixe o repositório com o comando "git clone":
		/Projetos/$ git clone https://github.com/LeonHie/Tarefa.git
		
	4 - Verfique se os arquivos foram baixados:
		/Projetos$ ls -lahs Tarefa/
		
	5 -	Entre na pasta do Projeto e execute o comando "docker compose build" para criar os containers:
		 Projetos$ cd Tarefa/
		 /Projetos/Tarefa$	docker compose build
		 
	6 - Execute o comando "docker compose up" para subir o ambiente (inicializar containers):
		 /Projetos/Tarefa$	docker compose up -d     // Obs: Utilize -d para executar no modo "detached" (tela desconectada)
		 
	7 - Teste a conexão utilizando um navegador de internet:
		a) Acesse "http://localhost" se estiver na mesma máquina em que está rodando o ambiente docker.
		b) Acesse "http://ipdamaquina" se estiver acessando de outra máquina. Exemplo: "http://10.0.0.51" 
		
> Se tudo estiver certo será carregado o arquivo "index.php" com a mensagem "Olá, Mundo!" e uma Tabela mostrando as 10 Musicas da Playlist.
		
	8 - Para parar o ambiente execute o comando "docker compose down":
		/Projetos/Tarefa$	docker compose down
> Caso Iniciou o ambeinente coma opção "-d" (detached), basta apertar a combinção de teclas "CTRL + C".		
		
		