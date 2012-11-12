SERVER_USER=psmith44
SERVER=psmith44.webfactional.com
APP_PATH=fill-this-in

#will need password at prompt
deploy: 
	scp * $(SERVER_USER)@$(PROD_SERVER):$(APP_PATH)

dev-env: 
	sudo apt-get install mysql-client mysql-server apache2 libapache2-mod-php5 libapache2-mod-auth-mysql php5-mysql
	sudo a2enmod php5
	sudo apt-get install phpmyadmin
