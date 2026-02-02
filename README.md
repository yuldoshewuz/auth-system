# Auth System

A robust and modern authentication system built with Laravel 12, featuring multi-provider social authentication, mandatory password setup for social users, and a fully responsive dashboard.

## Features

* **Social Authentication:** Seamless integration with Google and GitHub using Laravel Socialite.
* **Unified Account System:** Automatically links social profiles to existing accounts based on email.
* **Security First:** Forces users to set a password upon their first social login to ensure account recovery.
* **Email Verification:** Auto-verifies email addresses for users coming from trusted social providers.
* **Responsive Dashboard:** A mobile-friendly user interface built with Tailwind CSS and Alpine.js.
* **Account Management:** Includes password updates and secure account deletion features.

---


## 🌐 Live Demo

You can test the application live at the following link:

[auth.yuldoshew.uz](https://auth.yuldoshew.uz)

---

## Installation Guide

### 1. Clone the Repository

```bash
git clone https://github.com/yuldoshewuz/auth-system.git
cd auth-system
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Environment Setup

Copy the `.env.example` file to create your `.env` file:

```bash
cp .env.example .env
php artisan key:generate
```

---

## Configuration & API Keys

### Google OAuth Setup

1. Go to the [Google Cloud Console](https://console.cloud.google.com/).
2. Create a new project and navigate to **APIs & Services > Credentials**.
3. Click **Create Credentials > OAuth client ID** (Select *Web application*).
4. Under **Authorized redirect URIs**, add: `http://127.0.0.1:8000/auth/google/callback`.
5. Copy the **Client ID** and **Client Secret** to your `.env` file.

### GitHub OAuth Setup

1. Go to GitHub **Settings > Developer settings > OAuth Apps**.
2. Click **New OAuth App**.
3. Set **Authorization callback URL** to: `http://127.0.0.1:8000/auth/github/callback`.
4. Generate a **Client Secret** and copy both keys to your `.env` file.

---

## .env File Settings

### Database Configuration

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=auth_system
DB_USERNAME=root
DB_PASSWORD=
```

### Mail Configuration

For testing, you can use [Mailtrap](https://mailtrap.io).

```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
```

### Socialite Credentials

```env
GOOGLE_CLIENT_ID=your_google_client_id
GOOGLE_CLIENT_SECRET=your_google_client_secret
GOOGLE_REDIRECT_URI=http://127.0.0.1:8000/auth/google/callback

GITHUB_CLIENT_ID=your_github_client_id
GITHUB_CLIENT_SECRET=your_github_client_secret
GITHUB_REDIRECT_URI=http://127.0.0.1:8000/auth/github/callback
```

---

## Database Migration

Once the `.env` is configured, run the migrations:

```bash
php artisan migrate
```

## Running the Application

Start the local development server:

```bash
php artisan serve
```

Access the application at `http://127.0.0.1:8000`.

---

## Developer Info

* **Developer:** [Fozilbek Yuldoshev](https://yuldoshew.uz)
* **GitHub:** [@yuldoshewuz](https://github.com/yuldoshewuz)
