FROM mysql:5.7

# ENV MYSQL_DATABASE=<schema_name> \
#     MYSQL_ROOT_PASSWORD=<password>

ADD script.sql /docker-entrypoint-initdb.d

EXPOSE 3306