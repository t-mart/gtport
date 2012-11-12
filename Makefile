SERVER_USER=psmith44
SERVER=psmith44.webfactional.com
APP_PATH=fill-this-in

#will need password at prompt
deploy: 
	scp * $(SERVER_USER)@$(PROD_SERVER):$(APP_PATH)
