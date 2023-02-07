DB_FILE="${PWD}/database.sql"
DB_FILE_GZ="${PWD}/database.sql.gz"

if test -f "$DB_FILE"; then
    echo "Importing database from ${DB_FILE}" && \
    wp db import $DB_FILE --allow-root
elif test -f "$DB_FILE_GZ"; then
    echo "Importing database from ${DB_FILE_GZ}" && \
    gunzip < $DB_FILE_GZ | wp db import --allow-root -
else
    echo "Database import file not found, attempted to find files: ${DB_FILE} and ${DB_FILE_GZ}" && \
    exit 1
fi