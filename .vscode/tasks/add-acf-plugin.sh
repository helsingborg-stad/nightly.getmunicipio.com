NAME="advanced-custom-fields-pro"
DOWNLOAD_TARGET="${PWD}/${NAME}.zip"
TARGET_FOLDER="${PWD}/wp-content/plugins"

export $(cat .env | xargs) && \
[ -z "$ACF_TOKEN" ] && echo "Environment variable ACF_TOKEN is missing. Please verify that your .env file is not missing." && exit 1

curl "https://connect.advancedcustomfields.com/index.php?p=pro&a=download&k=${ACF_TOKEN}" > $DOWNLOAD_TARGET && \
unzip $DOWNLOAD_TARGET && \
rm -rf "${TARGET_FOLDER}/${NAME}" && \
mv "${PWD}/${NAME}" $TARGET_FOLDER && \
rm -f $DOWNLOAD_TARGET && \
rm -rf "${PWD}/${NAME}"