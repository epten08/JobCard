# Job Card Management System

This is a Laravel-based Job Card Management System with admin approval workflows, reports, and role-based access using Spatie Laravel Permission.

---

## 💼 Requirements

- PHP >= 8.x
- Composer
- Node.js + npm
- MySQL or PostgreSQL

---

## ⚡ Option 1: Setup From ZIP + Provided Database

If you received the zipped project **with its database**:

1️⃣ Unzip the project.

2️⃣ Import the provided `.sql` database dump into your local database:
```bash
mysql -u your_user -p your_database < provided_dump.sql
```

3️⃣ Copy `.env.example` to `.env`:
```bash
cp .env.example .env
```

4️⃣ Update `.env` with **your local DB name, username, password**.

5️⃣ Install PHP dependencies:
```bash
composer install
```

6️⃣ Install frontend assets:
```bash
npm install && npm run dev
```

7️⃣ Generate app key:
```bash
php artisan key:generate
```

8️⃣ Serve the project:
```bash
php artisan serve
```

✅ **Ready!** You can now log in using:
- Admin → `admin@example.com` / `password`
- User1 → `user1@example.com` / `password`
- User2 → `user2@example.com` / `password`

---

## ⚙ Option 2: Clone From Repository + Fresh Install

If you are cloning from the repository:

1️⃣ Clone the repo:
```bash
git clone your-repo-url.git
cd project-folder
```

2️⃣ Copy `.env.example` to `.env`:
```bash
cp .env.example .env
```

3️⃣ Update `.env` with **your local DB name, username, password**.

4️⃣ Install PHP dependencies:
```bash
composer install
```

5️⃣ Install frontend assets:
```bash
npm install && npm run dev
```

6️⃣ Generate app key:
```bash
php artisan key:generate
```

7️⃣ Run migrations:
```bash
php artisan migrate
```

8️⃣ Seed the database:
```bash
php artisan db:seed
```

✅ **Ready!** You can now log in using:
- Admin → `admin@example.com` / `password`
- User1 → `user1@example.com` / `password`
- User2 → `user2@example.com` / `password`

---

## 📌 Notes

- You can access reports and approvals from the navigation.
- Role management is powered by **Spatie Laravel Permission**.
- Make sure your local environment has the correct PHP and Node versions.

---

Happy coding! 🚀
