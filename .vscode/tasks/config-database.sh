SOURCE="${PWD}/.vscode/tasks/templates/database.php"
FILE="${PWD}/config/database.php"
cp $SOURCE $FILE
echo -e "✔️ Database file generated (${FILE})\r\n"