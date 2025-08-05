 
  Este projeto sobe um ambiente docker Nginx que acessa e disponibiliza o arquivo "index.php" do container PHP-FPM na porta 80. 
 O aquivo "index.php" retorna "Olá, mundo!" e algumas outras informações armazenadas no banco de dados MySql.
 
  É composto pelo arquivo docker.compose.yml, utilisado para iniciar o ambiente, este arquivo "README.md", e arquivos de configuração dos containers.
 
  O ambiente utilisa três imagens docker:
 	1 - nginx:alpine		-	Servidor Nginx
	2 - php-fpm:alpine		-	Servidor PHP para hospedar o arquivo "index.php"
	3 - mysql:				-	Servidor de banco de dados acessado pelo arquivo "index.php"
 
 > Este Projeto foi originalmente desenvolvido num ambiente Linux Kubuntu

 
#################  Instalando o Docker e Docker-Compose no Linux: ##################
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
		
	
## -------------  Baixando e utilizando os arquivos deste Repositório: -------------- ## 
 
	1 - Instale o git:
		$ sudo apt update
		$ sudo apt install git
		$ sudo git version

	2 - Crie uma pasta para baixar os arquivos do Projeto no seu ambiente de trabalho. Exemplo:
		$ cd /
		$ mkdir Projeto1
		$ cd Projeto1
		
	3 - Baixe o repositório com o comando "git clone"
		/Projeto1/$ git clone https://github.com/LeonHie/Tarefa.git
		
	4 - Verfique se os arquivos foram baixados:
		/Projeto1$ ls -lahs Tarefa/
		
	5 -	Entre na pasta do Projeto e execute o "git status":
		/Projeto1$ cd Tarefa
		/Projeto1/Tarefa$ git status
		
	6 - Execute o comando build do docker compose para baixar as imagens necessárias:
		 /Projeto1/Tarefa$	docker compose build
		 
	7 - Execute o comando up do docker compose subir o ambiente (iniciar containers):
		 /Projeto1/Tarefa$	docker compose up -d     // Obs: Utilize -d para executar no modo "detached" (tela desconectada)
		 
	8 - Teste a conexão utilizando um navegador de internet:
		a) Acesse "http://localhost" se estiver na mesma máquina em que está rodando o ambiente docker.
		b) Acesse "http://ipdamaquina" se estiver acessando de outra máquina. Exemplo: "http://10.0.0.51" 
		
		-> Se tudo estiver certo será carregado o arquivo "index.php" com a mensagem "Olá, Mundo!"
		
		
	
		
		