compose_file := "docker-compose.yml"
php_service := "php"

up:
	@docker-compose -f $(compose_file) up -d

composer:
	@docker-compose -f $(compose_file) exec $(php_service) sh -c "composer $(CMD)"
