# Yummy Food – Restaurant E-commerce & Blog Platform

Yummy Food is a full-featured restaurant e-commerce and blog platform built with Laravel (PHP) and Vue.js, using MongoDB as the primary database. The system supports multi-role authentication, a rich admin dashboard, product and order management, blogging, real-time notifications, and a modern, responsive UI for both customers and administrators.

---

## Features

### General
- **Multi-role authentication**: Separate flows for users and admins, with email verification and password reset.
- **Localization**: Multi-language support (English, Arabic) with dynamic locale switching.
- **Responsive UI**: Modern, mobile-friendly design using Bootstrap and Vue.js.

### E-commerce
- **Product catalog**: Categories, subcategories, product variants (size, color, toppings), images, and discounts.
- **Cart & Wishlist**: Add to cart/wishlist, update quantities, remove items, and calculate subtotals.
- **Order management**: Checkout, order history, order details, and shipping calculation.
- **Product reviews**: Users can rate and review products, with average ratings displayed.

### Blog
- **Blog posts**: Create, edit, and delete posts with categories, tags, images, and comments.
- **Commenting**: Users can comment on blog posts.
- **Tag & category management**: Organize blog content for easy discovery.

### Admin Dashboard
- **Product management**: CRUD for products, images, variants, and categories.
- **Blog management**: CRUD for blog posts, categories, and tags.
- **People management**: Manage team members or staff profiles.
- **Order management**: View and manage all orders.
- **Real-time notifications**: Event-driven updates for new products, orders, etc.

### Other
- **About & Contact pages**: Editable company info, Google Maps integration for location.
- **Working hours**: Manage and display business hours.
- **API support**: RESTful API endpoints for mobile or external integrations.
- **CORS & CSRF protection**: Secure API and web interactions.

---

## Tech Stack

- **Backend**: Laravel (PHP), Passport (API auth), Jenssegers/Mongodb (MongoDB Eloquent)
- **Frontend**: Vue.js (SPA components), Bootstrap, Vuelidate, VeeValidate, VueI18n
- **Database**: MongoDB
- **Real-time**: Laravel Echo, Pusher
- **Other**: Google Maps API, Axios, Laravel Broadcasting

---

## Project Structure

```
app/
  ├── Console/Commands/         # Custom artisan commands (e.g., MongoDB Passport fix)
  ├── Events/                   # Real-time event broadcasting
  ├── Exceptions/               # Custom exception handling
  ├── Http/
  │   ├── Controllers/          # API, admin, front controllers (auth, product, blog, cart, etc.)
  │   ├── Middleware/           # Custom and core middleware (auth, locale, CORS, etc.)
  ├── Models/                   # Eloquent models (Product, Category, Blog, User, etc.)
  ├── Providers/                # Laravel service providers
database/
  ├── migrations/               # Migration files (for reference, MongoDB is used)
  ├── seeds/                    # Database seeders
resources/
  ├── js/                       # Vue.js SPA components, bootstrap, i18n
  ├── views/                    # Blade templates for admin and front
routes/
  ├── api.php                   # API routes
  ├── web.php                   # Web routes
public/
  ├── admin/                    # Uploaded images (product, people, etc.)
  ├── assets/                   # Admin panel assets
.env.example                     # Example environment config
```

---

## Setup Instructions

### Prerequisites

- PHP >= 7.2
- Composer
- Node.js & npm/yarn
- MongoDB
- [Pusher account](https://pusher.com/) (for real-time features)
- Google Maps API key (for About/Contact page)

### Installation

1. **Clone the repository**
   ```bash
   git clone <repo-url>
   cd old/yummy-food-vuejs
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   # or
   yarn install
   ```

4. **Copy and configure environment**
   ```bash
   cp .env.example .env
   # Edit .env for MongoDB, Pusher, and other settings
   ```

5. **Generate application key**
   ```bash
   php artisan key:generate
   ```

6. **Set up MongoDB**
   - Ensure MongoDB is running and configured in `.env`:
     ```
     DB_CONNECTION=mongodb
     DB_HOST=127.0.0.1
     DB_PORT=27017
     DB_DATABASE=yummyfood
     DB_USERNAME=
     DB_PASSWORD=
     ```

7. **(Optional) Run migrations and seeders**
   - Migrations are for reference; collections are created dynamically.
   - Seeders can be run if provided:
     ```bash
     php artisan db:seed
     ```

8. **Build frontend assets**
   ```bash
   npm run dev
   # or
   yarn dev
   ```

9. **Set up storage link**
   ```bash
   php artisan storage:link
   ```

10. **Start the application**
    ```bash
    php artisan serve
    ```

11. **Access the app**
    - Admin panel: `http://localhost:8000/en/adminpanel`
    - Frontend: `http://localhost:8000/en/`

---

## Notable Code & Customizations

- **MongoDB Passport Fix**: Custom artisan command to patch Laravel Passport for MongoDB compatibility (`app/Console/Commands/MongoDBPassportFix.php`).
- **Vue.js SPA Components**: Located in `resources/js/components/`, used in both admin and front views.
- **Real-time Events**: `app/Events/MessageEvent.php` and Echo/Pusher integration for notifications.
- **Localization**: `resources/js/vue-i18n-locales.generated.js` and `SetLocaleLanguage` middleware.
- **Image Uploads**: Handled in models and controllers, stored in `public/admin/`.
- **Validation**: Both backend (Laravel validation) and frontend (Vuelidate, VeeValidate).

---

## Extensibility & Customization

- **Add new languages**: Update `config/app.php` and `resources/js/vue-i18n-locales.generated.js`.
- **Add new admin features**: Create new Vue components and corresponding Laravel controllers/routes.
- **API integration**: Use Passport for secure API access.
- **Switch to SQL**: Refactor models and config to use Eloquent with MySQL/PostgreSQL if needed.

---

## License

This project is for educational and demonstration purposes. For commercial use, please contact the author.

---

## Credits

- Built by [mohamedjs](https://github.com/mohamedjs)
- Uses [Laravel](https://laravel.com/), [Vue.js](https://vuejs.org/), [Bootstrap](https://getbootstrap.com/), [Jenssegers/Mongodb](https://github.com/jenssegers/laravel-mongodb), [Pusher](https://pusher.com/), and more. 
