# Installation et configuration

Nous allons utiliser nvm pour gérer les versions de Node.js, en effet nous utiliserons notre environnement de travail actuel pour développer, vous verrez Docker par la suite.

## Pour windows 

Installez scoop, c'est un gestionnaire de paquets pour Windows. Il simplifie l'installation, la mise à jour et la gestion des logiciels en ligne de commande sur les systèmes d'exploitation Windows. 

>[!NOTE]
>Contrairement à d'autres gestionnaires de paquets, Scoop est spécialement conçu pour les utilisateurs de la ligne de commande.

Dans votre powershell

:shell:

```bash
> Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser
> Invoke-RestMethod -Uri https://get.scoop.sh | Invoke-Expression
```

## Installation de nvm 

## Pour MAC

1. Ouvrez un terminal.

1. Exécutez le script d'installation de NVM à l'aide de cURL. Si vous n'avez pas cURL, vous pouvez utiliser wget :

**Avec cURL**

:shell:

```bash
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.7/install.sh | bash
```

**Avec Wget**

:shell:

```bash
wget -qO- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.7/install.sh | bash
```

Selon votre bash vous allez mettre à jour celui-ci en ajoutant les lignes suivantes :

:shell:

```bash
export NVM_DIR="$([ -z "${XDG_CONFIG_HOME-}" ] && printf %s "${HOME}/.nvm" || printf %s "${XDG_CONFIG_HOME}/nvm")"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh" # This loads nvm
```

Mettre à jour les variables d'environnement 

bash: `source ~/.bashrc`

zsh: `source ~/.zshrc`

>[!TIP]
>Ou relancer votre terminal.

## Windows 

Tapez la ligne de commande suivante :

:shell:

```bash
scoop install nvm
```

## Vérification de l'environnement 

:shell:

```bash
$ nvm use 20.11.0
N/A: version "v20.11.0" is not yet installed.
You need to run `nvm install 20.11.0` to install and use it.
```
Vous devez l'installer si besoin `nvm install 20.11.0`


:shell:

```bash
$ nvm use 20.11.0
Now using node v20.11.0 (npm v10.2.4)
```

>[!NOTE]
>Par la suite nous utiliserons la version LTS