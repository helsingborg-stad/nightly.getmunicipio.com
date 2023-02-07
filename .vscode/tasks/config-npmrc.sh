TOKEN=$1
TEMPLATE="${PWD}/.vscode/tasks/templates/.npmrc"
TARGET="${HOME}/.npmrc"
cp $TEMPLATE $TARGET && \
sed -i "s/GH_TOKEN/${TOKEN}/g" $TARGET