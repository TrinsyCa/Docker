# <div align="center">🚀 TrinsyCa Docker Setup 🚀</div>
<div align="center">

Welcome to the **Trinsyca Docker** project<br>
Please choose your preferred language

[<kbd> <br> English <br> </kbd>][EN]
[<kbd> <br> Turkish <br> </kbd>][TR]

[TR]: README.tr.md
[EN]: https://github.com/TrinsyCa/Docker/tree/main?tab=readme-ov-file#-trinsyca-docker-setup-
</div>

## What is this project for?

- **This project allows you to easily set up Docker configurations for your PHP projects.**
- **You can integrate frontend, backend, or full-stack setups with just a few commands!**

## Installation 🚀

**To integrate this project into your own, simply run the following command:**
```bash
composer require trinsyca/docker
```
**This will add the necessary Docker files and configurations to your project.**

## Available Commands ⚙️

**Once installed, use the following Composer commands to set up the Docker configurations for your project:**

### For Frontend Docker Setup:
- ```bash
  composer trinsy:docker-frontend
  ```

### For Backend Docker Setup:
- ```bash
  composer trinsy:docker-backend
  ```

### For Fullstack Docker Setup (Frontend & Backend):
- ```bash
  composer trinsy:docker-fullstack
  ```

### To Remove Docker Files:
- ```bash
  composer trinsy:docker-remove
  ```

## How It Works 🔧

- **Frontend**: Adds Docker configuration for frontend development.
- **Backend**: Adds Docker configuration for backend services, including database and API setup.
- **Fullstack**: Combines both frontend and backend Docker setups.
- **Remove**: Safely removes the Docker-related files from your project.

## Note 📌

**Before removing Docker files, you will be prompted with a confirmation to ensure you want to proceed.**
