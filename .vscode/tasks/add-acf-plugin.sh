TOKEN=$1
NAME="advanced-custom-fields-pro"
DOWNLOAD_TARGET="${PWD}/${NAME}.zip"
TARGET_FOLDER="${PWD}/wp-content/plugins"

curl "https://connect.advancedcustomfields.com/index.php?p=pro&a=download&k=${TOKEN}" > $DOWNLOAD_TARGET && \
unzip $DOWNLOAD_TARGET && \
rm -rf "${TARGET_FOLDER}/${NAME}" && \
mv "${PWD}/${NAME}" $TARGET_FOLDER && \
rm -f $DOWNLOAD_TARGET && \
rm -rf "${PWD}/${NAME}"