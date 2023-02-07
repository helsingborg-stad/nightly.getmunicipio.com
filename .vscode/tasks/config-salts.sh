FILE="${PWD}/config/salts.php"
rm -f $FILE && \
echo "<?php" >> $FILE && \
wget https://api.wordpress.org/secret-key/1.1/salt/ --quiet -O ->> $FILE && \
echo -e "✔️ Salts generated and stored in ${FILE}\r\n"