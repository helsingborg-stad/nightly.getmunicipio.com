NAME="advanced-custom-fields-pro"
DOWNLOAD_TARGET="${PWD}/wp-paid-plugins/acf.zip"
TARGET_FOLDER="${PWD}/wp-content/plugins"

git clone git@github.com:helsingborg-stad/wp-paid-plugins.git && \
unzip $DOWNLOAD_TARGET && \
rm -rf "${TARGET_FOLDER}/${NAME}" && \
mv "${PWD}/${NAME}" $TARGET_FOLDER && \
rm -f $DOWNLOAD_TARGET && \
rm -rf "${PWD}/wp-paid-plugins"
rm -rf "${PWD}/${NAME}"