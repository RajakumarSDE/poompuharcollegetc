# Poompuhar College TC Portal

Official online Transfer Certificate (TC) portal for Poompuhar College, developed and maintained by Raja Groups.

## Overview

This repository contains a small portal with:
- a PHP-based admin login page
- a main TC portal landing page
- two TC generator pages for regular and self-finance sections
- client-side Firebase integration for storing/generating certificate data


## Files

- `admin-tc-login.php`
  - Admin login page with hardcoded credentials
  - Uses PHP session handling and redirects to a remote TC home URL on successful login
- `tc-home.html`
  - Portal landing page for selecting TC generator sections
- `regular-section-tc.html`
  - Regular section Transfer Certificate generator
  - Uses Firebase with project `poompuhar-tc`
- `self-finance-section-tc.html`
  - Self-finance section Transfer Certificate generator
  - Uses Firebase with project `onlinetc`
- `README.md`
  - Project documentation

## Features

- Static HTML/CSS UI for the TC portal
- Firebase Realtime Database support in the generator pages
- Client-side printing and PDF/export support via `html2canvas` and `jsPDF`
- Responsive, modern portal design

## Usage

### Preview static pages

Open `tc-home.html`, `regular-section-tc.html`, or `self-finance-section-tc.html` in a browser.

### Run the admin login page

Serve `admin-tc-login.php` from a PHP-enabled web server, for example:

```bash
php -S localhost:8000
```

Then open `http://localhost:8000/admin-tc-login.php`.

### Admin credentials

- Email: `admin@poompuharcollege.ac.in`
- Password: `admin1234`

## Notes

- No build tools or package manager are required; the project uses CDN-hosted JavaScript and CSS.
- The admin login page currently stores credentials directly in the PHP file. This is not secure for production and should be replaced with a proper authentication system.

- The two generator pages each use a separate Firebase configuration.
- `admin-tc-login.php` redirects to `https://poompuharcollege.fwh.is/tc/home01.html` on successful login.

## Recommendations

- Remove hardcoded admin credentials before deploying.
- Replace direct Firebase configuration with environment-specific settings if needed.
- Use a proper backend auth flow for admin access.

