wp search-replace 'modul-test.helsingborg.io' 'localhost:9123' --recurse-objects --all-tables --network --skip-columns=guid --allow-root && \
wp search-replace 'https://localhost:9123' 'http://localhost:9123' --recurse-objects --all-tables --network --skip-columns=guid --allow-root && \
wp cache flush --allow-root