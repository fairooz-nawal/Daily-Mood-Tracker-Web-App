![2](https://github.com/user-attachments/assets/e7d98480-d8f3-469d-b494-d39f1831feb6)# 🌤️ Daily Mood Tracker

A web application built with **Laravel 12**, **Blade**, **Bootstrap 5**, and **Chart.js** that allows users to track their daily mood, review their mood history, visualize emotional trends, and more.

---

## 🧩 Features

### ✅ User Authentication
- Register & login using **phone number** and **password**
- Secure authentication via **Laravel Breeze**
- Logout functionality
- Each user has access to **only their own mood data**

### 📅 Mood Entry (CRUD)
- Select **one mood per day** (e.g., Happy, Sad, Angry, Excited)
- Add an optional short note
- Prevent multiple entries for the same day
- **Edit** or **soft delete** entries

### 🕓 Mood History
- Chronological list (latest first) of mood entries
- **Filter by date range**
- View as **table or timeline**

### 📊 Weekly Mood Summary
- Dynamic bar chart using **Chart.js**
- Visualizes total moods selected from **Monday to Sunday**
- Each mood type appears as a distinct bar

### 🗑️ Soft Delete & Restore
- Soft delete any mood entry
- Option to **restore deleted** entries from trash

### 🔥 Streak Badge
- Automatically shows a **"Streak Badge"** if a user logs moods for **3+ consecutive days**

---

## 🌟 Bonus Features

- **Mood of the Month**: Displays the most frequently selected mood in the last 30 days
- **Export to PDF**: Export your entire mood log as a formatted PDF

---

## 🛠️ Tech Stack

| Layer       | Technology        |
|-------------|-------------------|
| Backend     | Laravel 12        |
| Frontend    | Blade, Bootstrap 5|
| Charts      | Chart.js          |
| Auth        | Laravel Breeze    |
| Database    | MySQL / PostgreSQL|

---

## 📲 UI/UX Highlights

- Fully **responsive** and **mobile-friendly**
- Built with modern UI using **Bootstrap 5**
- Uses **modals** and **smooth transitions** for user interactions

---

## ScreenShots

![1](https://github.com/user-attachments/assets/7c45bb5b-98ab-4f05-a508-a22f85862c41)
![2](https://github.com/user-attachments/assets/16ef8813-0c32-45b2-aea2-6f8523af3d60)
![3](https://github.com/user-attachments/assets/b7d66170-fe66-4e30-ac8a-26bb569070d0)
![4](https://github.com/user-attachments/assets/5acd41e6-e14c-4027-b080-13a79debfdac)
![5](https://github.com/user-attachments/assets/59ce40dc-49ff-453c-818f-5637c48d593a)


## 🚀 Getting Started

### 📦 Installation

```bash
git clone https://github.com/your-username/daily-mood-tracker.git
cd daily-mood-tracker

# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install && npm run build

# Create environment file
cp .env.example .env

# Generate application key
php artisan key:generate
