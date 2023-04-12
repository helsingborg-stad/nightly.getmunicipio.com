<img alt="Helsingborg stad logo" src="https://helsingborg.se/wp-content/uploads/2017/05/helsingborg-1.svg" width="300" />

The official repository for the site modul-test. Based on municipio theme and modularity among other plugins. 

## Building assets
To build the current assets of helsingborg.se run below command.

```
npm run build
```

## Building dependencies
To build the current version of helsingborg.se run below command.

```
composer install
```

## General build

The complete package can be built with github actions. Specifications is embedded in .github folder. 

## Want to create your own site? 

To start a website like this, use our boilerplate located in https://github.com/helsingborg-stad/Municipio-boilerplate. 

## Development environment
The default and recommended development environment is using devcontainers which easily can be run in VSCode or in a JetBrains IDE.

### Prerequisites
* GitHub token with read:packages permission.
* SSH access for the server where the staging site is hosted.

### Getting started (VS Code)
1. Clone this repository, and open it up in VS Code.
1. VS Code should suggest to open the repository in a development container. Otherwise, from the command palette, run the command: "Open in devcontainer".
1. Copy `.env-example` to `.env` and populate the predefined variables inside with valid values.
1. Copy `wp-cli-example.yml` to `wp-cli.yml` and populate the predefined variables inside with valid values to fetch a db export from the staging site.
1. Run the task named "setup". **This will take some time to execute. About 20 minutes.**
1. When the setup task has completed, run the "start server" task.

> **Note**:
> During the "setup" task a `sunrise.php` will be placed in the wp-content folder. The code in this file will be executed on every visit to the local site. If you wish to disable it, change the value of the `SUNRISE` constant in the `config/developer.php` file.

### Suggested workflow
This project consists of multiple wordpress plugins as well as a theme that is developed and maintained by Helsingborgs Stad.
The idea with this development setup is that you should be able to make changes to any of these from this environment.

When setting up the environment a `composer install` is performed. This however does not install the source of the plugins or theme.
To be able to work in one of the sub-repos that holds a plugin or theme, you should install that specific composer package source.

#### Example showing how to get the source for the `municipio` theme.
Run the following command in the project root.
```sh
composer reinstall helsingborg-stad/municipio --prefer-source
```

From now on you should be able to work directly on the municipio theme repo from inside the theme folder `wp-content/themes/municipio`.

> Please note that you will need to run `composer install` as well as `npm install` inside the package that you have just required the source for. And to run any required build scripts inside.