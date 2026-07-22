# FallFull WordPress Project

Custom WordPress eCommerce theme and plugin ecosystem for fruits and vegetables store.

## Project Overview

**FallFull** was developed as a complete WordPress solution for e-commerce websites specializing in fruits and vegetables. It included a **Custom Theme**, a **Core Plugin**, **WooCommerce integration**, **pre-coded ACF fields**, and support for popular WordPress plugins.

## Setup Process

Install and activate **FallFull** Theme, popup on admin dashboard with plugin installation notice will appear, install all the suggested plugins and you are good to go.

## Theme Details

- **Theme Name:** FallFull
- **Type:** Custom WordPress Theme
- **Requires at least:** WordPress 5.2
- **Requires PHP:** 7.4

## Plugins Used

### FallFull Core Plugin

- The **FallFull Core Plugin** was developed to provide all the core features and functionality required by the **FallFull** custom WordPress theme.

### WooCommerce

- **WooCommerce** was used to provide **e-Commerce functionality**, enabling the website to manage products, orders, customers, etc.

### Advanced Custom Fields (ACF)

- **Advanced Custom Fields (ACF)** was used to power all dynamic content through **pre-coded ACF fields**. Installing the **FallFull Core Plugin** automatically registered all required fields, eliminating the need to create ACF fields manually or import JSON files.

### Redux Framework

- **Redux Framework** was used to implement custom dashboard settings for **non-standard content types**, including footer section content, custom-colored text, and other custom site elements that were not managed as **posts** or **pages.**

### mu-plugins (Optional)

- **mu-plugins** was used to disable some default behaviour of WordPress for security purposes. It is totally optional to use.

	- **Setup Process :** Create (or copy) a **mu-plugins** folder inside the **wp-content** directory. Then, create a `php` file (or copy from the repo) into the **mu-plugins** folder. WordPress automatically loads all **PHP** files placed in this directory, no activation, imports, or additional configuration required.
