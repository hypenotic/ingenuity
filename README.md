
<h1 align="center">
    <br>
    <a href="https://ingenuity.ca"><img src="https://styleguide.ingenuity.ca/custom/uploads/2015/11/Ingenuity_bgfill_wplumbbob_yellow_500px.png" alt="Ingenuity" width="200"></a>
    <br>
    Ingenuity
    <br>
</h1>

<p align="center">Ingenuity's website built with Nuxt.js and WordPress.</p>

<p align="center">
    <a href="https://github.com/hypenotic/ingenuity/releases">
        <img src="https://img.shields.io/badge/release-v4.0-blue.svg" alt="release badge version 4.0">
    </a>
    <a href="https://github.com/nuxt/nuxt.js">
        <img src="https://img.shields.io/badge/nuxt.js-2.8.1-blue.svg" alt="nuxt.js badge version 2.8.1">
    </a>
    <a href="https://github.com/WordPress/WordPress">
        <img src="https://img.shields.io/badge/WP-5.2.2-blue.svg" alt="WordPress badge version 5.2.2">
    </a>
    <a href="https://hypenotic.com">
        <img src="https://img.shields.io/badge/%3C%2F%3E%20with%20%E2%99%A5%EF%B8%8E%20by-hypenotic-red.svg" alt="hypenotic badge">
    </a>
    
</p>

<p align="center">
  <a href="#installation">Installation</a> |
  <a href="#server-setup">Server Setup</a> |
  <a href="#credits">Credits</a> 
</p>

## Installation

To clone and run this application, you'll need [Git](https://git-scm.com) and [Node.js](https://nodejs.org/en/download/) (which comes with [npm](http://npmjs.com)) installed on your computer. 

```bash
# Clone this repository
$ git clone https://github.com/hypenotic/ingenuity.git
```

### WordPress

```bash
# Go into the repository and the cms dir
$ cd ingenuity/cms

# Go into the custom dir. Clone WP. Create a working branch from the right release.
$ cd custom
$ mkdir wordpress
$ cd wordpress
$ git clone https://github.com/WordPress/WordPress .
$ git checkout tags/5.2.2
$ git checkout -b stable-5.2.2
```

### Nuxt

```bash
# Go into the repository and the app dir
$ cd ingenuity/app

# Install dependencies
$ npm install

# create an .env file
$ touch .env
# There should be variables BASE_ROUTER and DB_URL
# Ask the squad for the values

# Run the app
$ npm start
```

## Server Setup

Link to docs coming soon.

## Credits

Badges in this read me provided by [shields.io](https://shields.io/#your-badge).



