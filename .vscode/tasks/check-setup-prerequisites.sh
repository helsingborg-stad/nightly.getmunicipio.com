export $(cat .env | xargs) && \
[ -z "$GITHUB_TOKEN" ] && echo "❌ Environment variable GITHUB_TOKEN found." && exit 1
echo "✅ Environment variable GITHUB_TOKEN found." && \

[ ! -f "wp-cli.yml" ] && "❌ File wp-cli.yml not found." && exit 1
echo "✅ File wp-cli.yml found." && \

[ ! -f "wp-cli.yml" ] && "❌ File wp-cli.yml not found." && exit 1
echo "✅ File wp-cli.yml found." && \

exit 0;