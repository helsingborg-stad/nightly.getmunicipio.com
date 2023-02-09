TEMPLATE="${PWD}/.vscode/tasks/templates/.npmrc"
TARGET="${HOME}/.npmrc"

export $(cat .env | xargs) && \
[ -z "$GITHUB_TOKEN" ] && echo "Environment variable GITHUB_TOKEN is missing. Please verify that your .env file is not missing." && exit 1

cp $TEMPLATE $TARGET && \
sed -i "s/GH_TOKEN/${GITHUB_TOKEN}/g" $TARGET