# 🤝 SocialAids
### *Automating, Managing, and Facilitating Charitable Giveaways*

SocialAids is a full-stack web application designed to bridge the gap between donors and those in need. Built with **Symfony 5.4**, it provides a secure, automated, and transparent ecosystem for managing charitable campaigns and gift distributions.

---

[![Symfony](https://img.shields.io/badge/Symfony-5.4-black.svg?style=for-the-badge&logo=symfony)](https://symfony.com/)
[![PHP](https://img.shields.io/badge/PHP-7.4%2B-777bb4.svg?style=for-the-badge&logo=php)](https://www.php.net/)
[![Composer](https://img.shields.io/badge/Composer-Dependency%20Manager-blue.svg?style=for-the-badge&logo=composer)](https://getcomposer.org/)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg?style=for-the-badge)](https://opensource.org/licenses/MIT)

---

## 🌟 Key Features

* **🎯 Giveaway Automation**: Intelligent logic to handle campaign lifecycles from creation to winner selection.
* **👤 Advanced User Management**: Secure registration and role-based access control (RBAC) for donors and admins.
* **📦 Resource Tracking**: Real-time inventory management for physical and monetary donations.
* **🛡️ Enterprise-Grade Security**: Protection against XSS, CSRF, and SQL injection using Symfony's security components.
* **📊 Transparency Engine**: Built-in reporting to track the impact of every donation made through the platform.

---

## 🛠 Tech Stack

| Layer | Technology |
| :--- | :--- |
| **Backend** | PHP 7.4+ / Symfony 5.4 (LTS) |
| **Architecture** | MVC / SOLID Principles |
| **Database** | MySQL / PostgreSQL (via Doctrine ORM) |
| **Templating** | Twig Engine |
| **Frontend** | Bootstrap 5, Custom CSS, JavaScript |
| **DevOps** | Composer, Symfony CLI, Git |

---

## 🚀 Getting Started

### 📋 Prerequisites
* **PHP** 7.4 or higher
* **Composer** (Global installation)
* **MySQL** or **MariaDB**
* **Symfony CLI** (Recommended for local development)

### 🔧 Installation

1.  **Clone the Repository**
    ```bash
    git clone [https://github.com/ala-kad/SocialAids.git](https://github.com/ala-kad/SocialAids.git)
    cd SocialAids
    ```

2.  **Install PHP Dependencies**
    ```bash
    composer install
    ```

3.  **Environment Setup**
    Configure your database credentials in the `.env` or `.env.local` file:
    ```bash
    # .env.local
    DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/social_aids?serverVersion=8.0"
    ```

4.  **Database Migration**
    ```bash
    php bin/console doctrine:database:create
    php bin/console doctrine:migrations:migrate
    ```

5.  **Run Local Server**
    ```bash
    symfony server:start
    ```
    > Access the application at: `http://localhost:8000`

---

## 🏗 System Architecture

SocialAids follows a strictly decoupled **Service-Oriented Architecture** within the Symfony ecosystem.

* **Entities**: Domain models representing Donors, Giveaways, and Beneficiaries.
* **Controllers**: Lean entry points handling request/response lifecycles.
* **Services**: Centralised business logic for giveaway automation and data processing.
* **Security**: Authentication providers and voters for fine-grained permission management.

---

## 🤝 Contributing

We welcome contributions to make SocialAids even more impactful!
1.  **Fork** the project.
2.  Create your **Feature Branch** (`git checkout -b feature/AmazingFeature`).
3.  **Commit** your changes (`git commit -m 'Add some AmazingFeature'`).
4.  **Push** to the branch (`git push origin feature/AmazingFeature`).
5.  Open a **Pull Request**.

---

## 📄 License
Distributed under the **MIT License**. See `LICENSE` for more information.

---

**Developed with ❤️ by [Ala Kaddachi](https://github.com/ala-kad)**
