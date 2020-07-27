echo 'keys abrservice_database_*' | redis-cli | sed 's/^/get /' | redis-cli
